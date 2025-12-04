<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy('published_date', 'desc')->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'template' => 'nullable|string|max:255',
            'json_schema' => 'nullable|string',
            'image' => 'nullable|string',
            'category' => 'required|string|max:255',
            'category_slug' => 'nullable|string|max:255',
            'published_date' => 'required|date',
            'reading_time' => 'nullable|integer|min:1',
            'is_published' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }
        
        if (empty($validated['category_slug']) && !empty($validated['category'])) {
            $validated['category_slug'] = Str::slug($validated['category']);
        }

        // Generate filename from slug
        $filename = $validated['slug'] . '.blade.php';
        $articlesPath = resource_path('views/blog/articles');
        
        // Ensure directory exists
        if (!File::exists($articlesPath)) {
            File::makeDirectory($articlesPath, 0755, true);
        }
        
        $filePath = $articlesPath . '/' . $filename;
        
        // Create Blade file with content wrapped in div
        $bladeContent = '<div class="blog-article-content">' . "\n" . 
                       $validated['content'] . "\n" . 
                       '</div>';
        
        File::put($filePath, $bladeContent);
        
        // Set template field to the new filename
        $validated['template'] = $filename;

        // Calculate reading time if not provided
        if (empty($validated['reading_time'])) {
            $wordCount = str_word_count(strip_tags($validated['content']));
            $validated['reading_time'] = max(1, ceil($wordCount / 200));
        }

        Blog::create($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog post created successfully. Blade file created at: ' . $filename);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        // Load content from Blade file if template exists
        if ($blog->template) {
            $filePath = resource_path('views/blog/articles/' . $blog->template);
            if (File::exists($filePath)) {
                $fileContent = File::get($filePath);
                // Remove the wrapper div tags
                $fileContent = preg_replace('/^<div class="blog-article-content">\s*/', '', $fileContent);
                $fileContent = preg_replace('/\s*<\/div>\s*$/', '', $fileContent);
                $blog->content = trim($fileContent);
            }
        }
        
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug,' . $blog->id,
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'template' => 'nullable|string|max:255',
            'json_schema' => 'nullable|string',
            'image' => 'nullable|string',
            'category' => 'required|string|max:255',
            'category_slug' => 'nullable|string|max:255',
            'published_date' => 'required|date',
            'reading_time' => 'nullable|integer|min:1',
            'is_published' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $oldSlug = $blog->slug;
        $oldTemplate = $blog->template;
        
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }
        
        if (empty($validated['category_slug']) && !empty($validated['category'])) {
            $validated['category_slug'] = Str::slug($validated['category']);
        }

        $articlesPath = resource_path('views/blog/articles');
        $oldFilePath = null;
        $newFilePath = null;
        
        // If slug changed, we need to rename the file
        if ($oldSlug !== $validated['slug']) {
            // Delete old file if it exists
            if ($oldTemplate) {
                $oldFilePath = $articlesPath . '/' . $oldTemplate;
                if (File::exists($oldFilePath)) {
                    File::delete($oldFilePath);
                }
            }
            
            // Create new file with new slug
            $filename = $validated['slug'] . '.blade.php';
            $newFilePath = $articlesPath . '/' . $filename;
            $validated['template'] = $filename;
        } else {
            // Use existing template filename or create new one
            if ($oldTemplate && File::exists($articlesPath . '/' . $oldTemplate)) {
                $newFilePath = $articlesPath . '/' . $oldTemplate;
                $validated['template'] = $oldTemplate;
            } else {
                $filename = $validated['slug'] . '.blade.php';
                $newFilePath = $articlesPath . '/' . $filename;
                $validated['template'] = $filename;
            }
        }
        
        // Ensure directory exists
        if (!File::exists($articlesPath)) {
            File::makeDirectory($articlesPath, 0755, true);
        }
        
        // Update Blade file with new content
        $bladeContent = '<div class="blog-article-content">' . "\n" . 
                       $validated['content'] . "\n" . 
                       '</div>';
        
        File::put($newFilePath, $bladeContent);

        // Calculate reading time if not provided
        if (empty($validated['reading_time'])) {
            $wordCount = str_word_count(strip_tags($validated['content']));
            $validated['reading_time'] = max(1, ceil($wordCount / 200));
        }

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog post updated successfully. Blade file updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        // Delete associated Blade file
        if ($blog->template) {
            $filePath = resource_path('views/blog/articles/' . $blog->template);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }
        
        $blog->delete();

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog post and associated Blade file deleted successfully.');
    }
}
