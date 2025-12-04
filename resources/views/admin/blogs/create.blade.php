@extends('layouts.admin')

@section('title', 'Create Blog Post')

@section('content')
<div class="admin-card">
    <div class="admin-header">
        <div>
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Blooming Fast Logo">
            </div>
        </div>
        <h1>Create New Blog Post</h1>
        <div class="admin-actions">
            <a href="{{ route('admin.blogs.index') }}" class="btn-admin btn-admin-secondary">
                <i class="fa fa-arrow-left"></i> Back to Blogs
            </a>
        </div>
    </div>

    <form action="{{ route('admin.blogs.store') }}" method="POST">
        @csrf
        
        <div class="form-group-admin">
            <label class="form-label-admin" for="title">Title *</label>
            <input type="text" class="form-control-admin" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div style="color: #dc3545; font-size: 13px; margin-top: 6px;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group-admin">
            <label class="form-label-admin" for="slug">Slug</label>
            <input type="text" class="form-control-admin" id="slug" name="slug" value="{{ old('slug') }}">
            @error('slug')
                <div style="color: #dc3545; font-size: 13px; margin-top: 6px;">{{ $message }}</div>
            @enderror
            <small style="color: #666; font-size: 13px; margin-top: 5px; display: block;">Leave empty to auto-generate from title</small>
        </div>

        <div class="form-group-admin">
            <label class="form-label-admin" for="excerpt">Excerpt</label>
            <textarea class="form-control-admin" id="excerpt" name="excerpt" rows="3">{{ old('excerpt') }}</textarea>
            @error('excerpt')
                <div style="color: #dc3545; font-size: 13px; margin-top: 6px;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group-admin">
            <label class="form-label-admin" for="content">Content *</label>
            <textarea class="form-control-admin" id="content" name="content" rows="20" required>{{ old('content') }}</textarea>
            @error('content')
                <div style="color: #dc3545; font-size: 13px; margin-top: 6px;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group-admin">
            <label class="form-label-admin" for="image">Image Path</label>
            <input type="text" class="form-control-admin" id="image" name="image" value="{{ old('image') }}">
            @error('image')
                <div style="color: #dc3545; font-size: 13px; margin-top: 6px;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group-admin">
            <label class="form-label-admin" for="category">Category *</label>
            <input type="text" class="form-control-admin" id="category" name="category" value="{{ old('category') }}" required>
            @error('category')
                <div style="color: #dc3545; font-size: 13px; margin-top: 6px;">{{ $message }}</div>
            @enderror
            <input type="hidden" id="category_slug" name="category_slug" value="{{ old('category_slug') }}">
        </div>

        <div class="form-group-admin">
            <label class="form-label-admin" for="published_date">Published Date *</label>
            <input type="date" class="form-control-admin" id="published_date" name="published_date" value="{{ old('published_date', date('Y-m-d')) }}" required>
            @error('published_date')
                <div style="color: #dc3545; font-size: 13px; margin-top: 6px;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group-admin">
            <label class="form-label-admin" for="reading_time">Reading Time (minutes)</label>
            <input type="number" class="form-control-admin" id="reading_time" name="reading_time" value="{{ old('reading_time') }}" min="1">
            @error('reading_time')
                <div style="color: #dc3545; font-size: 13px; margin-top: 6px;">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group-admin">
            <div class="form-check-admin">
                <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1">
                <label class="form-label-admin" for="is_published">Publish this post</label>
            </div>
        </div>

        <div style="display: flex; gap: 10px; margin-top: 30px;">
            <button type="submit" class="btn-admin btn-admin-primary">
                <i class="fa fa-save"></i> Create Blog Post
            </button>
            <a href="{{ route('admin.blogs.index') }}" class="btn-admin btn-admin-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection

