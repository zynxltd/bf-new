@extends('layouts.app')

@section('title', 'Blogs Management')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Blogs Management</h1>
                <div>
                    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">Add New Blog Post</a>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Manage Products</a>
                    <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Published Date</th>
                            <th>Status</th>
                            <th>Reading Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($blogs as $blog)
                        <tr>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->category ?? 'N/A' }}</td>
                            <td>{{ $blog->published_date->format('M d, Y') }}</td>
                            <td>
                                @if($blog->is_published)
                                    <span class="badge bg-success">Published</span>
                                @else
                                    <span class="badge bg-secondary">Draft</span>
                                @endif
                            </td>
                            <td>{{ $blog->reading_time }} min</td>
                            <td>
                                <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this blog post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No blog posts found. <a href="{{ route('admin.blogs.create') }}">Create one now</a>.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

