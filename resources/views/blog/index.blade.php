@extends('layouts.app')

@section('title', 'Blog - Blooming Fast Plant Foods')

@section('content')
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
                $articles = [
                    [
                        'slug' => 'complete-guide-to-plant-fertilizers',
                        'title' => 'The Complete Guide to Plant Fertilizers: Understanding NPK and Essential Nutrients',
                        'excerpt' => 'Discover everything you need to know about plant fertilizers, from understanding NPK ratios to choosing the right nutrients for your garden. Learn how to feed your plants for optimal growth and stunning blooms.',
                        'image' => asset('images/superiorV4.png'),
                        'date' => '2024-12-15',
                        'category' => 'Gardening Tips',
                        'reading_time' => 12
                    ],
                    [
                        'slug' => 'maximizing-plant-growth-with-superior-fertilizers',
                        'title' => 'Maximizing Plant Growth: How Superior Fertilizers Transform Your Garden',
                        'excerpt' => 'Learn how professional-grade fertilizers can dramatically improve your garden\'s performance. From root development to flower production, discover the science behind superior plant nutrition.',
                        'image' => asset('images/bloom-booster-p1.jpg'),
                        'date' => '2024-12-10',
                        'category' => 'Plant Care',
                        'reading_time' => 10
                    ]
                ];
            @endphp

            @foreach($articles as $article)
            <div class="col-md-6 mb-40">
                <article class="blog-card white-bg">
                    <div class="blog-image">
                        <a href="{{ route('blog.show', $article['slug']) }}">
                            <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}" class="img-responsive" />
                        </a>
                        <div class="blog-category">{{ $article['category'] }}</div>
                    </div>
                    <div class="blog-content p-30">
                        <div class="blog-meta mb-15">
                            <span class="blog-date"><i class="fa fa-calendar"></i> {{ date('F j, Y', strtotime($article['date'])) }}</span>
                            <span class="blog-reading-time"><i class="fa fa-clock-o"></i> {{ $article['reading_time'] }} min read</span>
                        </div>
                        <h2 class="blog-title mb-15">
                            <a href="{{ route('blog.show', $article['slug']) }}">{{ $article['title'] }}</a>
                        </h2>
                        <p class="blog-excerpt mb-20">{{ $article['excerpt'] }}</p>
                        <a href="{{ route('blog.show', $article['slug']) }}" class="button button-primary">Read More</a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End .blog-section -->
@endsection

