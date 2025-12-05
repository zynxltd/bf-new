@extends('layouts.admin')

@section('title', 'View Blog Post')

@section('content')
<div class="admin-card">
    <div class="admin-header">
        <div>
            <div class="logo">
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="Blooming Fast Logo">
                </a>
            </div>
        </div>
        <h1>View Blog Post</h1>
        <div class="admin-actions">
            <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn-admin btn-admin-primary">
                <i class="fa fa-edit"></i> Edit
            </a>
            <a href="{{ route('admin.blogs.index') }}" class="btn-admin btn-admin-secondary">
                <i class="fa fa-arrow-left"></i> Back to Blogs
            </a>
            @if($blog->slug && $blog->category_slug)
                <a href="{{ route('blog.show', ['category_slug' => $blog->category_slug, 'slug' => $blog->slug]) }}" class="btn-admin btn-admin-secondary" target="_blank">
                    <i class="fa fa-eye"></i> View on Site
                </a>
            @endif
        </div>
    </div>

    <div class="admin-blog-detail">
        <div class="admin-blog-header">
            <h2>{{ $blog->title }}</h2>
            <div class="admin-blog-meta">
                <span class="admin-badge {{ $blog->is_published ? 'admin-badge-success' : 'admin-badge-secondary' }}">
                    {{ $blog->is_published ? 'Published' : 'Draft' }}
                </span>
                @if($blog->category)
                    <span class="admin-badge admin-badge-info">{{ $blog->category }}</span>
                @endif
                @if($blog->published_date)
                    <span><i class="fa fa-calendar"></i> {{ $blog->published_date->format('M j, Y') }}</span>
                @endif
                @if($blog->reading_time)
                    <span><i class="fa fa-clock-o"></i> {{ $blog->reading_time }} min read</span>
                @endif
            </div>
        </div>

        @if($blog->image)
            <div class="admin-blog-image">
                <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" style="max-width: 100%; height: auto; border-radius: 8px;">
            </div>
        @endif

        @if($blog->excerpt)
            <div class="admin-blog-excerpt">
                <h3>Excerpt</h3>
                <p>{{ $blog->excerpt }}</p>
            </div>
        @endif

        <div class="admin-blog-content">
            <h3>Content</h3>
            <div class="admin-blog-content-body">
                {!! $blog->content !!}
            </div>
        </div>

        <div class="admin-blog-details">
            <h3>Details</h3>
            <table class="admin-detail-table">
                <tr>
                    <td><strong>Slug:</strong></td>
                    <td>{{ $blog->slug ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><strong>Category Slug:</strong></td>
                    <td>{{ $blog->category_slug ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><strong>Template:</strong></td>
                    <td>{{ $blog->template ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td><strong>Sort Order:</strong></td>
                    <td>{{ $blog->sort_order ?? 0 }}</td>
                </tr>
                <tr>
                    <td><strong>Created:</strong></td>
                    <td>{{ $blog->created_at ? $blog->created_at->format('M j, Y g:i A') : 'N/A' }}</td>
                </tr>
                <tr>
                    <td><strong>Updated:</strong></td>
                    <td>{{ $blog->updated_at ? $blog->updated_at->format('M j, Y g:i A') : 'N/A' }}</td>
                </tr>
            </table>
        </div>

        @if($blog->json_schema)
            <div class="admin-blog-schema">
                <h3>JSON Schema</h3>
                <pre style="background: #f5f5f5; padding: 15px; border-radius: 8px; overflow-x: auto; font-size: 12px;">{{ json_encode(json_decode($blog->json_schema), JSON_PRETTY_PRINT) }}</pre>
            </div>
        @endif
    </div>
</div>
@endsection

@push('styles')
<style>
.admin-blog-detail {
    margin-top: 20px;
}

.admin-blog-header h2 {
    font-size: 32px;
    font-weight: 700;
    color: #333;
    margin-bottom: 15px;
}

.admin-blog-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    align-items: center;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 1px solid #e9ecef;
}

.admin-blog-meta span {
    color: #666;
    font-size: 14px;
}

.admin-blog-meta i {
    margin-right: 5px;
}

.admin-blog-image {
    margin-bottom: 30px;
}

.admin-blog-excerpt {
    margin-bottom: 30px;
    padding: 20px;
    background: #f8f9fa;
    border-radius: 8px;
    border-left: 4px solid #19B2EB;
}

.admin-blog-excerpt h3 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
    color: #333;
}

.admin-blog-excerpt p {
    color: #666;
    line-height: 1.8;
    margin: 0;
}

.admin-blog-content {
    margin-bottom: 30px;
}

.admin-blog-content h3 {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 15px;
    color: #333;
}

.admin-blog-content-body {
    padding: 20px;
    background: #fff;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    line-height: 1.8;
    color: #333;
}

.admin-blog-details {
    margin-bottom: 30px;
}

.admin-blog-details h3 {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 15px;
    color: #333;
}

.admin-detail-table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    overflow: hidden;
}

.admin-detail-table tr {
    border-bottom: 1px solid #f0f0f0;
}

.admin-detail-table tr:last-child {
    border-bottom: none;
}

.admin-detail-table td {
    padding: 12px 15px;
    vertical-align: top;
}

.admin-detail-table td:first-child {
    width: 200px;
    font-weight: 600;
    color: #333;
}

.admin-detail-table td:last-child {
    color: #666;
}

.admin-blog-schema {
    margin-bottom: 30px;
}

.admin-blog-schema h3 {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 15px;
    color: #333;
}

@media (max-width: 768px) {
    .admin-blog-header h2 {
        font-size: 24px;
    }
    
    .admin-blog-meta {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .admin-detail-table td:first-child {
        width: 150px;
    }
}
</style>
@endpush

