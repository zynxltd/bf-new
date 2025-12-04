<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of published blog posts.
     */
    public function index(Request $request)
    {
        $query = Blog::where('is_published', true);
        
        // Search functionality
        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('excerpt', 'like', '%' . $searchTerm . '%')
                  ->orWhere('content', 'like', '%' . $searchTerm . '%');
            });
        }
        
        // Filter by category slug if provided
        if ($request->has('category') && $request->category) {
            $query->where('category_slug', $request->category);
        }
        
        // Get all categories with slugs for filter
        $categories = Blog::where('is_published', true)
            ->whereNotNull('category')
            ->whereNotNull('category_slug')
            ->distinct()
            ->orderBy('category', 'asc')
            ->get(['category', 'category_slug'])
            ->mapWithKeys(function ($item) {
                return [$item->category_slug => $item->category];
            });
        
        // Paginate with 6 articles per page
        $articles = $query->orderBy('published_date', 'desc')
            ->orderBy('sort_order', 'asc')
            ->paginate(6, ['id', 'title', 'slug', 'excerpt', 'image', 'category', 'category_slug', 'published_date', 'reading_time']);
        
        // Append query string to pagination links
        $articles->appends($request->query());
        
        $selectedCategory = $request->query('category');
        $searchTerm = $request->query('search');
        
        return view('blog.index', compact('articles', 'categories', 'selectedCategory', 'searchTerm'));
    }

    /**
     * Display the specified blog post.
     */
    public function show($category_slug, $slug)
    {
        $article = Blog::where('slug', $slug)
            ->where('category_slug', $category_slug)
            ->where('is_published', true)
            ->firstOrFail();
        
        // If template is specified, use template file; otherwise use database content
        $templateContent = null;
        $content = $article->content;
        
        if ($article->template) {
            $templatePath = 'blog.articles.' . str_replace('.blade.php', '', $article->template);
            if (view()->exists($templatePath)) {
                $templateContent = view($templatePath)->render();
                $content = $templateContent;
            }
        }
        
        $readingTime = $article->reading_time ?? max(1, ceil(str_word_count(strip_tags($content)) / 200));
        
        // Generate table of contents from headings and add IDs to headings
        preg_match_all('/<h([2-3])[^>]*>(.*?)<\/h[2-3]>/i', $content, $headings, PREG_SET_ORDER);
        $toc = [];
        
        foreach ($headings as $index => $match) {
            $level = $match[1];
            $headingText = strip_tags($match[2]);
            $id = 'heading-' . ($index + 1);
            $toc[] = [
                'id' => $id,
                'text' => $headingText,
                'level' => $level
            ];
            
            // Add ID to heading in content if not already present
            $fullMatch = $match[0];
            if (strpos($fullMatch, 'id=') === false) {
                $replacement = str_replace('<h' . $level, '<h' . $level . ' id="' . $id . '"', $fullMatch);
                $content = str_replace($fullMatch, $replacement, $content);
            }
        }
        
        $article->content = $content;
        
        // Get related articles (same category, excluding current)
        $relatedArticles = Blog::where('is_published', true)
            ->where('id', '!=', $article->id)
            ->where(function($query) use ($article) {
                if ($article->category) {
                    $query->where('category', $article->category);
                }
            })
            ->orderBy('published_date', 'desc')
            ->limit(3)
            ->get(['id', 'title', 'slug', 'excerpt', 'image', 'category', 'category_slug', 'published_date', 'reading_time']);
        
        // If not enough related articles, get latest articles to ensure minimum of 3
        if ($relatedArticles->count() < 3) {
            $needed = 3 - $relatedArticles->count();
            $excludeIds = $relatedArticles->pluck('id')->toArray();
            $excludeIds[] = $article->id;
            
            $additionalArticles = Blog::where('is_published', true)
                ->where('id', '!=', $article->id)
                ->whereNotIn('id', $excludeIds)
                ->orderBy('published_date', 'desc')
                ->limit($needed)
                ->get(['id', 'title', 'slug', 'excerpt', 'image', 'category', 'category_slug', 'published_date', 'reading_time']);
            
            if ($additionalArticles->count() > 0) {
                $relatedArticles = $relatedArticles->merge($additionalArticles);
            }
        }
        
        // Ensure we have at least 3 articles (or as many as available if less than 3 total)
        $relatedArticles = $relatedArticles->take(3);
        
        return view('blog.show', compact('article', 'toc', 'readingTime', 'relatedArticles'));
    }

    /**
     * Legacy route handler - redirects old URLs to new format with category slug.
     */
    public function showLegacy($slug)
    {
        $article = Blog::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();
        
        if ($article->category_slug) {
            return redirect()->route('blog.show', [
                'category_slug' => $article->category_slug,
                'slug' => $article->slug
            ], 301);
        }
        
        // Fallback if no category slug (shouldn't happen, but just in case)
        return $this->show($article->category_slug ?? 'uncategorized', $slug);
    }
}

