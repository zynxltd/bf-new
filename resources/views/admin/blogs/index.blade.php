@extends('layouts.admin')

@php
    use Illuminate\Support\Str;
@endphp

@section('title', 'Blogs Management')

@section('content')
<div class="admin-card">
    <div class="admin-header">
        <div>
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Blooming Fast Logo">
            </div>
        </div>
        <h1>Blogs Management</h1>
        <div class="admin-actions">
            <a href="{{ route('admin.blogs.create') }}" class="btn-admin btn-admin-primary">
                <i class="fa fa-plus"></i> Add New Blog Post
            </a>
            <a href="{{ route('admin.products.index') }}" class="btn-admin btn-admin-secondary">
                <i class="fa fa-cube"></i> Manage Products
            </a>
            <a href="{{ route('blog.index') }}" class="btn-admin btn-admin-secondary" target="_blank">
                <i class="fa fa-eye"></i> View Blog
            </a>
            <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn-admin btn-admin-secondary">
                    <i class="fa fa-sign-out"></i> Logout
                </button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="admin-alert admin-alert-success">
            <i class="fa fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @php
        $publishedCount = $blogs->where('is_published', true)->count();
        $draftCount = $blogs->where('is_published', false)->count();
        $totalCount = $blogs->count();
    @endphp

    <!-- Statistics Cards -->
    <div class="admin-stats-grid">
        <div class="admin-stat-card">
            <div class="admin-stat-icon" style="background: linear-gradient(135deg, #70D969 0%, #19B2EB 100%);">
                <i class="fa fa-file-text"></i>
            </div>
            <div class="admin-stat-content">
                <h3>{{ $totalCount }}</h3>
                <p>Total Posts</p>
            </div>
        </div>
        <div class="admin-stat-card">
            <div class="admin-stat-icon" style="background: #28a745;">
                <i class="fa fa-check-circle"></i>
            </div>
            <div class="admin-stat-content">
                <h3>{{ $publishedCount }}</h3>
                <p>Published</p>
            </div>
        </div>
        <div class="admin-stat-card">
            <div class="admin-stat-icon" style="background: #6c757d;">
                <i class="fa fa-edit"></i>
            </div>
            <div class="admin-stat-content">
                <h3>{{ $draftCount }}</h3>
                <p>Drafts</p>
            </div>
        </div>
    </div>

    <!-- Blog Posts Table -->
    <div class="admin-table-container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Template</th>
                    <th>Published Date</th>
                    <th>Reading Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogs as $blog)
                    <tr>
                        <td>{{ $blog->id }}</td>
                        <td>
                            <strong>{{ Str::limit($blog->title, 50) }}</strong>
                            @if($blog->slug)
                            <br><small style="color: #666;">/blog/{{ $blog->slug }}</small>
                            @endif
                        </td>
                        <td>
                            @if($blog->category)
                                <span class="admin-badge admin-badge-info">{{ $blog->category }}</span>
                            @else
                                <span style="color: #999;">N/A</span>
                            @endif
                        </td>
                        <td>
                            @if($blog->template)
                                <span class="admin-badge admin-badge-success">{{ Str::limit($blog->template, 20) }}</span>
                            @else
                                <span style="color: #999;">Default</span>
                            @endif
                        </td>
                        <td>
                            @if($blog->published_date)
                                @if($blog->published_date instanceof \Carbon\Carbon)
                                    {{ $blog->published_date->format('M j, Y') }}
                                @else
                                    {{ \Carbon\Carbon::parse($blog->published_date)->format('M j, Y') }}
                                @endif
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $blog->reading_time ?? 'N/A' }} min</td>
                        <td>
                            <span class="admin-badge {{ $blog->is_published ? 'admin-badge-success' : 'admin-badge-secondary' }}">
                                {{ $blog->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td>
                            <div class="admin-action-buttons">
                                <a href="{{ route('admin.blogs.show', $blog) }}" class="admin-btn-icon" title="View Details">
                                    <i class="fa fa-info-circle"></i>
                                </a>
                                @if($blog->slug && $blog->category_slug)
                                    <a href="{{ route('blog.show', ['category_slug' => $blog->category_slug, 'slug' => $blog->slug]) }}" class="admin-btn-icon" target="_blank" title="View on Site">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @endif
                                <a href="{{ route('admin.blogs.edit', $blog) }}" class="admin-btn-icon admin-btn-edit" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this blog post? This will also delete the associated Blade file.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-btn-icon admin-btn-delete" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center" style="padding: 40px;">
                            <i class="fa fa-file-text" style="font-size: 48px; color: #ddd; margin-bottom: 15px; display: block;"></i>
                            <p style="color: #999; margin-bottom: 20px;">No blog posts found.</p>
                            <a href="{{ route('admin.blogs.create') }}" class="btn-admin btn-admin-primary">
                                <i class="fa fa-plus"></i> Create Your First Blog Post
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('styles')
<style>
.admin-stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.admin-stat-card {
    background: #fff;
    border: 1px solid #e9ecef;
    border-radius: 12px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 15px;
    transition: all 0.3s ease;
}

.admin-stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.admin-stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 24px;
    flex-shrink: 0;
}

.admin-stat-content h3 {
    font-size: 32px;
    font-weight: 700;
    color: #333;
    margin: 0 0 5px 0;
}

.admin-stat-content p {
    font-size: 14px;
    color: #666;
    margin: 0;
}

.admin-table-container {
    overflow-x: auto;
    border-radius: 8px;
    border: 1px solid #e9ecef;
}

.admin-table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
}

.admin-table thead {
    background: #f8f9fa;
}

.admin-table th {
    padding: 15px;
    text-align: left;
    font-weight: 600;
    color: #333;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-bottom: 2px solid #e9ecef;
}

.admin-table td {
    padding: 15px;
    border-bottom: 1px solid #f0f0f0;
    vertical-align: middle;
}

.admin-table tbody tr:hover {
    background: #f8f9fa;
}

.admin-badge {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.admin-badge-success {
    background: #d4edda;
    color: #155724;
}

.admin-badge-secondary {
    background: #e2e3e5;
    color: #383d41;
}

.admin-badge-info {
    background: #d1ecf1;
    color: #0c5460;
}

.admin-action-buttons {
    display: flex;
    gap: 8px;
}

.admin-btn-icon {
    width: 32px;
    height: 32px;
    border-radius: 6px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: #fff;
    font-size: 14px;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.admin-btn-icon:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    color: #fff;
}

.admin-btn-icon {
    background: #6c757d;
}

.admin-btn-edit {
    background: #ffc107;
}

.admin-btn-edit:hover {
    background: #e0a800;
}

.admin-btn-delete {
    background: #dc3545;
}

.admin-btn-delete:hover {
    background: #c82333;
}

.admin-alert {
    padding: 15px 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.admin-alert-success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

@media (max-width: 768px) {
    .admin-stats-grid {
        grid-template-columns: 1fr;
    }
    
    .admin-table-container {
        overflow-x: scroll;
    }
}
</style>
@endpush
