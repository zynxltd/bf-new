@extends('layouts.admin')

@section('title', 'Edit Product')

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
        <h1>Edit Product</h1>
        <div class="admin-actions">
            <a href="{{ route('admin.products.index') }}" class="btn-admin btn-admin-secondary">Back to Products</a>
        </div>
    </div>

            <form action="{{ route('admin.products.update', $product) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group-admin">
                    <label class="form-label-admin" for="title">Title *</label>
                    <input type="text" class="form-control-admin" id="title" name="title" value="{{ old('title', $product->title) }}" required>
                </div>

                <div class="form-group-admin">
                    <label class="form-label-admin" for="description">Description</label>
                    <textarea class="form-control-admin" id="description" name="description" rows="3">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="form-group-admin">
                    <label class="form-label-admin" for="full_description">Full Description</label>
                    <textarea class="form-control-admin" id="full_description" name="full_description" rows="15" style="font-family: monospace; font-size: 13px;">{{ old('full_description', $product->full_description) }}</textarea>
                    <small class="form-text text-muted">Full detailed description shown in the product modal. Supports line breaks and paragraphs.</small>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group-admin">
                            <label class="form-label-admin" for="image">Image Path</label>
                            <input type="text" class="form-control-admin" id="image" name="image" value="{{ old('image', $product->image) }}" placeholder="images/product.jpg">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group-admin">
                            <label class="form-label-admin" for="image_2">Image 2 Path</label>
                            <input type="text" class="form-control-admin" id="image_2" name="image_2" value="{{ old('image_2', $product->image_2) }}" placeholder="images/product2.jpg">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group-admin">
                            <label class="form-label-admin" for="image_3">Image 3 Path</label>
                            <input type="text" class="form-control-admin" id="image_3" name="image_3" value="{{ old('image_3', $product->image_3) }}" placeholder="images/product3.jpg">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group-admin">
                            <label class="form-label-admin" for="image_4">Image 4 Path</label>
                            <input type="text" class="form-control-admin" id="image_4" name="image_4" value="{{ old('image_4', $product->image_4) }}" placeholder="images/product4.jpg">
                        </div>
                    </div>
                </div>

                <div class="form-group-admin">
                    <label class="form-label-admin" for="video">Video URL</label>
                    <input type="text" class="form-control-admin" id="video" name="video" value="{{ old('video', $product->video) }}" placeholder="https://vimeo.com/123456">
                </div>

                <div class="form-group-admin">
                    <label class="form-label-admin" for="videos">Videos HTML</label>
                    <textarea class="form-control-admin" id="videos" name="videos" rows="3">{{ old('videos', $product->videos) }}</textarea>
                    <small class="form-text text-muted">HTML for video embeds</small>
                </div>

                <div class="form-group-admin">
                    <label class="form-label-admin" for="reviews">Reviews</label>
                    <textarea class="form-control-admin" id="reviews" name="reviews" rows="3">{{ old('reviews', $product->reviews) }}</textarea>
                    <small class="form-text text-muted">HTML or Feefo embed URL (feefo-embed:URL or feefo:PRODUCT_ID)</small>
                </div>

                <div class="form-group-admin">
                    <label class="form-label-admin" for="delivery_info">Delivery Information</label>
                    <textarea class="form-control-admin" id="delivery_info" name="delivery_info" rows="8" style="font-family: monospace; font-size: 13px;">{{ old('delivery_info', $product->delivery_info) }}</textarea>
                    <small class="form-text text-muted">Delivery information shown in the product modal.</small>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-admin">
                            <label class="form-label-admin" for="badge_1"><strong>Badge 1</strong> (max 10 characters)</label>
                            <input type="text" class="form-control-admin" id="badge_1" name="badge_1" value="{{ old('badge_1', $product->badge_1 ?? '') }}" placeholder="1.5kg" maxlength="10">
                            <small class="form-text text-muted">First badge shown on product card</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-admin">
                            <label class="form-label-admin" for="badge_2"><strong>Badge 2</strong> (max 10 characters)</label>
                            <input type="text" class="form-control-admin" id="badge_2" name="badge_2" value="{{ old('badge_2', $product->badge_2 ?? '') }}" placeholder="Resealable" maxlength="10">
                            <small class="form-text text-muted">Second badge shown on product card</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group-admin">
                            <label class="form-label-admin" for="sku">SKU (Product Code)</label>
                            <input type="text" class="form-control-admin" id="sku" name="sku" value="{{ old('sku', $product->sku ?? '') }}" placeholder="100196">
                            <small class="form-text text-muted">For Feefo reviews widget</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group-admin">
                            <label class="form-label-admin" for="npk">NPK</label>
                            <input type="text" class="form-control-admin" id="npk" name="npk" value="{{ old('npk', $product->npk) }}" placeholder="18:18:24">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group-admin">
                            <label class="form-label-admin" for="makes">Makes</label>
                            <input type="text" class="form-control-admin" id="makes" name="makes" value="{{ old('makes', $product->makes) }}" placeholder="500 litres">
                        </div>
                    </div>
                </div>

                <div class="form-group-admin">
                    <label class="form-label-admin" for="features">Features</label>
                    <textarea class="form-control-admin" id="features" name="features" rows="8" style="font-family: monospace; font-size: 13px;">{{ old('features', $product->features) }}</textarea>
                    <small class="form-text text-muted">One feature per line. Each line will become a bullet point in the Key Features section.</small>
                </div>

                <div class="form-group-admin">
                    <label class="form-label-admin" for="application">Application Instructions</label>
                    <textarea class="form-control-admin" id="application" name="application" rows="8" style="font-family: monospace; font-size: 13px;">{{ old('application', $product->application) }}</textarea>
                    <small class="form-text text-muted">Detailed application instructions shown in the product modal.</small>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-admin">
                            <label class="form-label-admin" for="yg_link">YouGarden Link</label>
                            <input type="url" class="form-control-admin" id="yg_link" name="yg_link" value="{{ old('yg_link', $product->yg_link) }}" placeholder="https://www.yougarden.com/item-p-100062/...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-admin">
                            <label class="form-label-admin" for="amazon_link">Amazon Link</label>
                            <input type="url" class="form-control-admin" id="amazon_link" name="amazon_link" value="{{ old('amazon_link', $product->amazon_link) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-admin">
                            <label class="form-label-admin" for="sort_order">Sort Order</label>
                            <input type="number" class="form-control-admin" id="sort_order" name="sort_order" value="{{ old('sort_order', $product->sort_order) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-admin">
                            <label class="form-label-admin" for="is_active">Status</label>
                            <select class="form-control-admin" id="is_active" name="is_active">
                                <option value="1" {{ old('is_active', $product->is_active) ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('is_active', $product->is_active) === false ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-admin btn-admin-primary">Update Product</button>
            </form>
</div>
@endsection

