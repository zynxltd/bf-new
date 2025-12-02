@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Create New Product</h1>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary mb-3">Back to Products</a>

            <form action="{{ route('admin.products.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="title">Title *</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="full_description">Full Description</label>
                    <textarea class="form-control" id="full_description" name="full_description" rows="5">{{ old('full_description') }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Image Path</label>
                            <input type="text" class="form-control" id="image" name="image" value="{{ old('image') }}" placeholder="images/product.jpg">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image_2">Image 2 Path</label>
                            <input type="text" class="form-control" id="image_2" name="image_2" value="{{ old('image_2') }}" placeholder="images/product2.jpg">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="video">Video URL</label>
                    <input type="text" class="form-control" id="video" name="video" value="{{ old('video') }}" placeholder="https://vimeo.com/123456">
                </div>

                <div class="form-group">
                    <label for="videos">Videos HTML</label>
                    <textarea class="form-control" id="videos" name="videos" rows="3">{{ old('videos') }}</textarea>
                    <small class="form-text text-muted">HTML for video embeds</small>
                </div>

                <div class="form-group">
                    <label for="reviews">Reviews</label>
                    <textarea class="form-control" id="reviews" name="reviews" rows="3">{{ old('reviews') }}</textarea>
                    <small class="form-text text-muted">HTML or Feefo embed URL (feefo-embed:URL or feefo:PRODUCT_ID)</small>
                </div>

                <div class="form-group">
                    <label for="delivery_info">Delivery Information</label>
                    <textarea class="form-control" id="delivery_info" name="delivery_info" rows="2">{{ old('delivery_info') }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="specs">Specs</label>
                            <input type="text" class="form-control" id="specs" name="specs" value="{{ old('specs') }}" placeholder="500g, NPK 18:18:24">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="npk">NPK</label>
                            <input type="text" class="form-control" id="npk" name="npk" value="{{ old('npk') }}" placeholder="18:18:24">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="makes">Makes</label>
                            <input type="text" class="form-control" id="makes" name="makes" value="{{ old('makes') }}" placeholder="500 litres">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="features">Features</label>
                    <textarea class="form-control" id="features" name="features" rows="3">{{ old('features') }}</textarea>
                    <small class="form-text text-muted">Separate with | (pipe)</small>
                </div>

                <div class="form-group">
                    <label for="application">Application Instructions</label>
                    <textarea class="form-control" id="application" name="application" rows="3">{{ old('application') }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="yg_link">YouGarden Link</label>
                            <input type="url" class="form-control" id="yg_link" name="yg_link" value="{{ old('yg_link') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="amazon_link">Amazon Link</label>
                            <input type="url" class="form-control" id="amazon_link" name="amazon_link" value="{{ old('amazon_link') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sort_order">Sort Order</label>
                            <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="is_active">Status</label>
                            <select class="form-control" id="is_active" name="is_active">
                                <option value="1" {{ old('is_active', true) ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('is_active') === false ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Create Product</button>
            </form>
        </div>
    </div>
</div>
@endsection

