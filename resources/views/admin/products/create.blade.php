@extends('layouts.admin')

@section('title', 'Create Product')

@section('content')
<div class="admin-card">
    <div class="row">
        <div class="col-md-12">
    <div class="admin-header">
        <div>
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Blooming Fast Logo">
            </div>
        </div>
        <h1>Create New Product</h1>
        <div class="admin-actions">
            <a href="{{ route('admin.products.index') }}" class="btn-admin btn-admin-secondary">Back to Products</a>
        </div>
    </div>

            <form action="{{ route('admin.products.store') }}" method="POST">
                @csrf
                
                <div class="form-group-admin">
                    <label for="title" class="form-label-admin">Title *</label>
                    <input type="text" class="form-control-admin" id="title" name="title" value="{{ old('title') }}" required>
                </div>

                <div class="form-group-admin">
                    <label for="description" class="form-label-admin">Description</label>
                    <textarea class="form-control-admin" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                </div>

                <div class="form-group-admin">
                    <label for="full_description" class="form-label-admin">Full Description</label>
                    <textarea class="form-control-admin" id="full_description" name="full_description" rows="5">{{ old('full_description') }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group-admin">
                            <label for="image" class="form-label-admin">Image Path</label>
                            <input type="text" class="form-control-admin" id="image" name="image" value="{{ old('image') }}" placeholder="images/product.jpg">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group-admin">
                            <label for="image_2" class="form-label-admin">Image 2 Path</label>
                            <input type="text" class="form-control-admin" id="image_2" name="image_2" value="{{ old('image_2') }}" placeholder="images/product2.jpg">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group-admin">
                            <label for="image_3" class="form-label-admin">Image 3 Path</label>
                            <input type="text" class="form-control-admin" id="image_3" name="image_3" value="{{ old('image_3') }}" placeholder="images/product3.jpg">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group-admin">
                            <label for="image_4" class="form-label-admin">Image 4 Path</label>
                            <input type="text" class="form-control-admin" id="image_4" name="image_4" value="{{ old('image_4') }}" placeholder="images/product4.jpg">
                        </div>
                    </div>
                </div>

                <div class="form-group-admin">
                    <label for="video" class="form-label-admin">Video URL</label>
                    <input type="text" class="form-control-admin" id="video" name="video" value="{{ old('video') }}" placeholder="https://vimeo.com/123456">
                </div>

                <div class="form-group-admin">
                    <label for="videos" class="form-label-admin">Videos HTML</label>
                    <textarea class="form-control-admin" id="videos" name="videos" rows="3">{{ old('videos') }}</textarea>
                    <small style="color: #666; font-size: 13px; margin-top: 5px; display: block;">HTML for video embeds</small>
                </div>

                <div class="form-group-admin">
                    <label for="reviews" class="form-label-admin">Reviews</label>
                    <textarea class="form-control-admin" id="reviews" name="reviews" rows="3">{{ old('reviews') }}</textarea>
                    <small style="color: #666; font-size: 13px; margin-top: 5px; display: block;">HTML or Feefo embed URL (feefo-embed:URL or feefo:PRODUCT_ID)</small>
                </div>

                <div class="form-group-admin">
                    <label for="delivery_info" class="form-label-admin">Delivery Information</label>
                    <textarea class="form-control-admin" id="delivery_info" name="delivery_info" rows="2">{{ old('delivery_info') }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-admin">
                            <label for="badge_1" class="form-label-admin"><strong>Badge 1</strong> (max 10 characters)</label>
                            <input type="text" class="form-control-admin" id="badge_1" name="badge_1" value="{{ old('badge_1') }}" placeholder="1.5kg" maxlength="10">
                            <small style="color: #666; font-size: 13px; margin-top: 5px; display: block;">First badge shown on product card</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-admin">
                            <label for="badge_2" class="form-label-admin"><strong>Badge 2</strong> (max 10 characters)</label>
                            <input type="text" class="form-control-admin" id="badge_2" name="badge_2" value="{{ old('badge_2') }}" placeholder="Resealable" maxlength="10">
                            <small style="color: #666; font-size: 13px; margin-top: 5px; display: block;">Second badge shown on product card</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group-admin">
                            <label for="sku" class="form-label-admin">SKU (Product Code)</label>
                            <input type="text" class="form-control-admin" id="sku" name="sku" value="{{ old('sku') }}" placeholder="100196">
                            <small style="color: #666; font-size: 13px; margin-top: 5px; display: block;">For Feefo reviews widget</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group-admin">
                            <label for="npk" class="form-label-admin">NPK</label>
                            <input type="text" class="form-control-admin" id="npk" name="npk" value="{{ old('npk') }}" placeholder="18:18:24">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group-admin">
                            <label for="makes" class="form-label-admin">Makes</label>
                            <input type="text" class="form-control-admin" id="makes" name="makes" value="{{ old('makes') }}" placeholder="500 litres">
                        </div>
                    </div>
                </div>

                <div class="form-group-admin">
                    <label for="features" class="form-label-admin">Features</label>
                    <textarea class="form-control-admin" id="features" name="features" rows="3">{{ old('features') }}</textarea>
                    <small style="color: #666; font-size: 13px; margin-top: 5px; display: block;">Separate with | (pipe)</small>
                </div>

                <div class="form-group-admin">
                    <label for="application" class="form-label-admin">Application Instructions</label>
                    <textarea class="form-control-admin" id="application" name="application" rows="3">{{ old('application') }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-admin">
                            <label for="yg_link" class="form-label-admin">YouGarden Link</label>
                            <input type="url" class="form-control-admin" id="yg_link" name="yg_link" value="{{ old('yg_link') }}" placeholder="https://www.yougarden.com/item-p-100062/...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-admin">
                            <label for="amazon_link" class="form-label-admin">Amazon Link</label>
                            <input type="url" class="form-control-admin" id="amazon_link" name="amazon_link" value="{{ old('amazon_link') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group-admin">
                            <label for="sort_order" class="form-label-admin">Sort Order</label>
                            <input type="number" class="form-control-admin" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group-admin">
                            <label for="is_active" class="form-label-admin">Status</label>
                            <select class="form-control-admin" id="is_active" name="is_active">
                                <option value="1" {{ old('is_active', true) ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('is_active') === false ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div style="display: flex; gap: 10px; margin-top: 30px;">
                    <button type="submit" class="btn-admin btn-admin-primary">
                        <i class="fa fa-save"></i> Create Product
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="btn-admin btn-admin-secondary">Cancel</a>
                </div>
            </form>
</div>
@endsection


