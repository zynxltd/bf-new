<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ConvertImagesToWebP extends Command
{
    protected $signature = 'images:convert-webp {--path=public/images : Path to images directory}';
    protected $description = 'Convert images to WebP format for better performance';

    public function handle()
    {
        $path = $this->option('path');
        $fullPath = base_path($path);
        
        if (!File::exists($fullPath)) {
            $this->error("Directory not found: {$fullPath}");
            return 1;
        }
        
        $this->info("Converting images in: {$fullPath}");
        
        $images = File::glob($fullPath . '/*.{jpg,jpeg,png}', GLOB_BRACE);
        $converted = 0;
        $skipped = 0;
        
        foreach ($images as $image) {
            $webpPath = preg_replace('/\.(jpg|jpeg|png)$/i', '.webp', $image);
            
            // Skip if WebP already exists
            if (File::exists($webpPath)) {
                $this->line("Skipping (WebP exists): " . basename($image));
                $skipped++;
                continue;
            }
            
            try {
                // Note: This requires intervention/image package
                // For now, we'll use GD library directly
                $imageInfo = getimagesize($image);
                if (!$imageInfo) {
                    $this->warn("Could not read: " . basename($image));
                    continue;
                }
                
                $mime = $imageInfo['mime'];
                $source = null;
                
                switch ($mime) {
                    case 'image/jpeg':
                        $source = imagecreatefromjpeg($image);
                        break;
                    case 'image/png':
                        $source = imagecreatefrompng($image);
                        break;
                    default:
                        $this->warn("Unsupported format: " . basename($image));
                        continue 2;
                }
                
                if ($source && function_exists('imagewebp')) {
                    imagewebp($source, $webpPath, 85); // 85% quality
                    imagedestroy($source);
                    $this->info("Converted: " . basename($image) . " -> " . basename($webpPath));
                    $converted++;
                } else {
                    $this->warn("WebP support not available. Install GD with WebP support.");
                }
            } catch (\Exception $e) {
                $this->error("Error converting " . basename($image) . ": " . $e->getMessage());
            }
        }
        
        $this->info("\nConversion complete!");
        $this->info("Converted: {$converted}");
        $this->info("Skipped: {$skipped}");
        
        return 0;
    }
}
