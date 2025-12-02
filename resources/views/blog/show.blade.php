@extends('layouts.app')

@php
    $slug = request()->route('slug');
    $article = \App\Models\Blog::where('slug', $slug)
        ->where('is_published', true)
        ->first();
    
    if (!$article) {
        abort(404);
    }
    
    $readingTime = $article->reading_time ?? max(1, ceil(str_word_count(strip_tags($article->content)) / 200));
    
    // Generate table of contents from headings and add IDs to headings
    $content = $article->content;
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
@endphp

@section('title', $article->title . ' - Blooming Fast Blog')

@section('content')
<!-- Start .blog-post-section -->
<div class="blog-post-section section white-bg pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- Blog Post Header -->
                <header class="blog-post-header mb-40">
                    <div class="blog-meta mb-20">
                        @if($article->category)
                        <span class="blog-category-badge">{{ $article->category }}</span>
                        @endif
                        <span class="blog-date"><i class="fa fa-calendar"></i> {{ $article->published_date->format('F j, Y') }}</span>
                        <span class="blog-reading-time"><i class="fa fa-clock-o"></i> {{ $readingTime }} min read</span>
                    </div>
                    <h1 class="blog-post-title">{{ $article->title }}</h1>
                    @if($article->image)
                    <div class="blog-featured-image mt-30 mb-30">
                        <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="img-responsive" />
                    </div>
                    @endif
                </header>

                <div class="row">
                    <!-- Main Content -->
                    <div class="col-md-9">
                        <article class="blog-post-content">
                            {!! $article->content !!}
                        </article>
                    </div>

                    <!-- Sidebar with Table of Contents -->
                    <div class="col-md-3">
                        <aside class="blog-sidebar">
                            @if(count($toc) > 0)
                            <div class="toc-widget">
                                <h3 class="toc-title">Table of Contents</h3>
                                <nav class="toc-nav">
                                    <ul>
                                        @foreach($toc as $item)
                                        <li class="toc-level-{{ $item['level'] }}">
                                            <a href="#{{ $item['id'] }}">{{ $item['text'] }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                            @endif

                            <div class="blog-cta-widget mt-30">
                                <h4>Shop Our Products</h4>
                                <p>Discover our range of premium plant foods and fertilizers</p>
                                <a href="#products" class="button button-primary">View Products</a>
                            </div>
                        </aside>
                    </div>
                </div>

                <!-- Back to Blog -->
                <div class="text-center mt-60">
                    <a href="{{ route('blog.index') }}" class="button button-secondary">
                        <i class="fa fa-arrow-left"></i> Back to Blog
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End .blog-post-section -->
@endsection

