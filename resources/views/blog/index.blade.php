@extends('layouts.app')

@php
use Illuminate\Support\Str;
@endphp

@section('title', 'Blog - Blooming Fast Plant Foods')

@section('content')
<!-- Navigation -->
<div id="navigation" class="navigation is-transparent" data-spy="affix" data-offset-top="5">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#site-collapse-nav" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img class="logo logo-light" src="{{ asset('images/logo.png') }}" alt="logo" />
                    <img class="logo logo-color" src="{{ asset('images/logo.png') }}" alt="logo" />
                </a>
            </div>
            <div class="collapse navbar-collapse" id="site-collapse-nav">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('home') }}#home" class="nav-item">Home</a></li>
                    <li><a href="{{ route('home') }}#about" class="nav-item">About</a></li>
                    <li><a href="{{ route('home') }}#features" class="nav-item">Features</a></li>
                    <li><a href="{{ route('home') }}#products" class="nav-item">Products</a></li>
                    <li><a href="{{ route('home') }}#videos" class="nav-item">Videos</a></li>
                    <li><a href="{{ route('home') }}#faq" class="nav-item">FAQ</a></li>
                    <li><a href="{{ route('blog.index') }}" class="nav-item">Blog</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!-- Start .blog-section -->
<div class="blog-section section white-bg pt-120 pb-120">
    <div class="container">
        <div class="section-head text-center mb-60">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="heading">Blooming Fast <span>Blog</span></h1>
                    <p class="lead">Expert gardening tips, plant care guides, and insights to help you grow a thriving garden</p>
                </div>
            </div>
        </div>

        <div class="row">
            @php
                $articles = \App\Models\Blog::where('is_published', true)
                    ->orderBy('published_date', 'desc')
                    ->orderBy('sort_order', 'asc')
                    ->get();
            @endphp

            @forelse($articles as $article)
            <div class="col-md-6 mb-40">
                <article class="blog-card white-bg">
                    <div class="blog-image">
                        <a href="{{ route('blog.show', $article->slug) }}">
                            <img src="{{ $article->image ? asset($article->image) : asset('images/superiorV4.png') }}" alt="{{ $article->title }}" class="img-responsive" />
                        </a>
                        @if($article->category)
                        <div class="blog-category">{{ $article->category }}</div>
                        @endif
                    </div>
                    <div class="blog-content p-30">
                        <div class="blog-meta mb-15">
                            <span class="blog-date"><i class="fa fa-calendar"></i> {{ $article->published_date->format('F j, Y') }}</span>
                            <span class="blog-reading-time"><i class="fa fa-clock-o"></i> {{ $article->reading_time }} min read</span>
                        </div>
                        <h2 class="blog-title mb-15">
                            <a href="{{ route('blog.show', $article->slug) }}">{{ $article->title }}</a>
                        </h2>
                        <p class="blog-excerpt mb-20">{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 150) }}</p>
                        <a href="{{ route('blog.show', $article->slug) }}" class="button button-primary">Read More</a>
                    </div>
                </article>
            </div>
            @empty
            <div class="col-md-12">
                <p class="text-center">No blog posts available yet. Check back soon!</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
<!-- End .blog-section -->

<!-- Footer -->
@include('partials.footer')
@endsection

