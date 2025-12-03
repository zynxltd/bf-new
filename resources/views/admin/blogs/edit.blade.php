@extends('layouts.admin')

@section('title', 'Edit Blog Post')

@section('content')
<div class="admin-card">
    <div class="admin-header">
        <div>
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Blooming Fast Logo">
            </div>
        </div>
        <h1>Edit Blog Post</h1>
        <div class="admin-actions">
            <a href="{{ route('admin.blogs.index') }}" class="btn-admin btn-admin-secondary">
                <i class="fa fa-arrow-left"></i> Back to Blogs
            </a>
        </div>
    </div>

            <form action="{{ route('admin.blogs.update', $blog) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group-admin">
                    <label class="form-label-admin" for="title">Title *</label>
                    <input type="text" class="form-control-admin @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $blog->title) }}" required>
                    @error('title')
                        <div style="color: #dc3545; font-size: 13px; margin-top: 6px;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group-admin">
                    <label class="form-label-admin" for="slug">Slug</label>
                    <input type="text" class="form-control-admin @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $blog->slug) }}">
                    @error('slug')
                        <div style="color: #dc3545; font-size: 13px; margin-top: 6px;">{{ $message }}</div>
                    @enderror
                    <small style="color: #666; font-size: 13px; margin-top: 5px; display: block;">Leave empty to auto-generate from title</small>
                </div>

                <div class="form-group-admin">
                    <label class="form-label-admin" for="excerpt">Excerpt</label>
                    <textarea class="form-control-admin @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" rows="3">{{ old('excerpt', $blog->excerpt) }}</textarea>
                    @error('excerpt')
                        <div style="color: #dc3545; font-size: 13px; margin-top: 6px;">{{ $message }}</div>
                    @enderror
                    <small style="color: #666; font-size: 13px; margin-top: 5px; display: block;">Short description for blog listing</small>
                </div>

                <div class="form-group-admin">
                    <label class="form-label-admin" for="content">Content *</label>
                    <textarea class="form-control-admin @error('content') is-invalid @enderror" id="content" name="content" rows="20" required>{{ old('content', $blog->content) }}</textarea>
                    @error('content')
                        <div style="color: #dc3545; font-size: 13px; margin-top: 6px;">{{ $message }}</div>
                    @enderror
                    <small style="color: #666; font-size: 13px; margin-top: 5px; display: block;">Full blog post content (HTML allowed)</small>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-admin">
                            <label class="form-label-admin" for="image">Image Path</label>
                            <input type="text" class="form-control-admin @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $blog->image) }}" placeholder="images/blog-image.jpg">
                            @error('image')
                                <div style="color: #dc3545; font-size: 13px; margin-top: 6px;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-admin">
                            <label class="form-label-admin" for="category">Category</label>
                            <input type="text" class="form-control-admin @error('category') is-invalid @enderror" id="category" name="category" value="{{ old('category', $blog->category) }}" placeholder="Gardening Tips">
                            @error('category')
                                <div style="color: #dc3545; font-size: 13px; margin-top: 6px;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group-admin">
                            <label class="form-label-admin" for="published_date">Published Date *</label>
                            <input type="date" class="form-control-admin @error('published_date') is-invalid @enderror" id="published_date" name="published_date" value="{{ old('published_date', $blog->published_date->format('Y-m-d')) }}" required>
                            @error('published_date')
                                <div style="color: #dc3545; font-size: 13px; margin-top: 6px;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group-admin">
                            <label class="form-label-admin" for="reading_time">Reading Time (minutes)</label>
                            <input type="number" class="form-control-admin @error('reading_time') is-invalid @enderror" id="reading_time" name="reading_time" value="{{ old('reading_time', $blog->reading_time) }}" min="1" placeholder="Auto-calculated">
                            @error('reading_time')
                                <div style="color: #dc3545; font-size: 13px; margin-top: 6px;">{{ $message }}</div>
                            @enderror
                            <small style="color: #666; font-size: 13px; margin-top: 5px; display: block;">Leave empty to auto-calculate</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group-admin">
                            <label class="form-label-admin" for="sort_order">Sort Order</label>
                            <input type="number" class="form-control-admin @error('sort_order') is-invalid @enderror" id="sort_order" name="sort_order" value="{{ old('sort_order', $blog->sort_order) }}">
                            @error('sort_order')
                                <div style="color: #dc3545; font-size: 13px; margin-top: 6px;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group-admin">
                    <div class="form-check-admin">
                        <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published', $blog->is_published) ? 'checked' : '' }}>
                        <label class="form-label-admin" class="form-check-label" for="is_published">
                            Publish this post
                        </label>
                    </div>
                </div>

                <div style="display: flex; gap: 10px; margin-top: 30px;">
                    <button type="submit" class="btn-admin btn-admin-primary">
                        <i class="fa fa-save"></i> Update Blog Post
                    </button>
                    <a href="{{ route('admin.blogs.index') }}" class="btn-admin btn-admin-secondary">Cancel</a>
                </div>
            </form>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    // Auto-generate slug from title if slug is empty
    $('#title').on('input', function() {
        if ($('#slug').val() === '' || $('#slug').data('auto-generated')) {
            var title = $(this).val();
            var slug = title.toLowerCase()
                .replace(/[^\w\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim();
            $('#slug').val(slug);
            $('#slug').data('auto-generated', true);
        }
    });
    
    // Allow manual slug editing
    $('#slug').on('input', function() {
        $(this).data('auto-generated', false);
    });
});
</script>
@endpush
@endsection

