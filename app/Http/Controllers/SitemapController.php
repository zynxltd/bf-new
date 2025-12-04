<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"';
        $sitemap .= ' xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"';
        $sitemap .= ' xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">' . "\n";

        // Home page - highest priority
        $sitemap .= $this->urlElement(
            url('/'),
            now()->toAtomString(),
            'daily',
            '1.0'
        );

        // Blog index page
        $sitemap .= $this->urlElement(
            route('blog.index'),
            now()->toAtomString(),
            'daily',
            '0.9'
        );

        // Legal pages
        $legalPages = [
            ['url' => route('legal.privacy'), 'priority' => '0.5'],
            ['url' => route('legal.terms'), 'priority' => '0.5'],
            ['url' => route('legal.cookies'), 'priority' => '0.5'],
        ];

        foreach ($legalPages as $page) {
            $sitemap .= $this->urlElement(
                $page['url'],
                now()->toAtomString(),
                'monthly',
                $page['priority']
            );
        }

        // Published blog posts
        $blogs = Blog::where('is_published', true)
            ->orderBy('published_date', 'desc')
            ->get();

        foreach ($blogs as $blog) {
            $lastmod = $blog->updated_at ? $blog->updated_at->toAtomString() : $blog->published_date->toAtomString();
            
            $sitemap .= '  <url>' . "\n";
            $sitemap .= '    <loc>' . htmlspecialchars(route('blog.show', [
                'category_slug' => $blog->category_slug,
                'slug' => $blog->slug
            ])) . '</loc>' . "\n";
            $sitemap .= '    <lastmod>' . $lastmod . '</lastmod>' . "\n";
            $sitemap .= '    <changefreq>weekly</changefreq>' . "\n";
            $sitemap .= '    <priority>0.8</priority>' . "\n";
            
            // Add image if available
            if ($blog->image) {
                $imageUrl = asset($blog->image);
                $sitemap .= '    <image:image>' . "\n";
                $sitemap .= '      <image:loc>' . htmlspecialchars($imageUrl) . '</image:loc>' . "\n";
                $sitemap .= '      <image:title>' . htmlspecialchars($blog->title) . '</image:title>' . "\n";
                if ($blog->excerpt) {
                    $sitemap .= '      <image:caption>' . htmlspecialchars(strip_tags($blog->excerpt)) . '</image:caption>' . "\n";
                }
                $sitemap .= '    </image:image>' . "\n";
            }
            
            $sitemap .= '  </url>' . "\n";
        }

        $sitemap .= '</urlset>';

        return response($sitemap, 200)
            ->header('Content-Type', 'application/xml');
    }

    private function urlElement($url, $lastmod, $changefreq, $priority)
    {
        $element = '  <url>' . "\n";
        $element .= '    <loc>' . htmlspecialchars($url) . '</loc>' . "\n";
        $element .= '    <lastmod>' . $lastmod . '</lastmod>' . "\n";
        $element .= '    <changefreq>' . $changefreq . '</changefreq>' . "\n";
        $element .= '    <priority>' . $priority . '</priority>' . "\n";
        $element .= '  </url>' . "\n";
        
        return $element;
    }
}
