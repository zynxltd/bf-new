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
    public function index()
    {
        $articles = Blog::where('is_published', true)
            ->orderBy('published_date', 'desc')
            ->orderBy('sort_order', 'asc')
            ->get(['id', 'title', 'slug', 'excerpt', 'image', 'category', 'published_date', 'reading_time']);
        
        return view('blog.index', compact('articles'));
    }

    /**
     * Display the specified blog post.
     */
    public function show($slug)
    {
        $article = Blog::where('slug', $slug)
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
            ->get(['id', 'title', 'slug', 'excerpt', 'image', 'category', 'published_date', 'reading_time']);
        
        // If not enough related articles, get latest articles
        if ($relatedArticles->count() < 3) {
            $additionalArticles = Blog::where('is_published', true)
                ->where('id', '!=', $article->id)
                ->whereNotIn('id', $relatedArticles->pluck('id'))
                ->orderBy('published_date', 'desc')
                ->limit(3 - $relatedArticles->count())
                ->get(['id', 'title', 'slug', 'excerpt', 'image', 'category', 'published_date', 'reading_time']);
            
            $relatedArticles = $relatedArticles->merge($additionalArticles);
        }
        
        return view('blog.show', compact('article', 'toc', 'readingTime', 'relatedArticles'));
    }
}

