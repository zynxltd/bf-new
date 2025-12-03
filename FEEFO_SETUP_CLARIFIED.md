# Feefo Widget Setup - Clarified

## Main Script (Required)
**Location**: `resources/views/layouts/app.blade.php` (Line ~105)

```html
<script src="https://api.feefo.com/api/javascript/you-garden" async></script>
```

This is the main Feefo widget initialization script. It must be loaded on every page where Feefo widgets are used.

## Widget Implementations

### 1. Product Stars/Badge Widget
**Format**:
```html
<div class="feefo-review-badge-wrapper-product" data-product-sku="PRODUCT_SKU"></div>
```

**Usage**:
- Displays product star rating and badge
- Requires `data-product-sku` attribute with the product SKU
- Automatically loads when the main script is present

**Locations**:
- Testimonials section: `resources/views/home.blade.php` (Line ~305)
- Product modal: Dynamically generated in JavaScript (Line ~1101)

### 2. Product Reviews Widget
**Format**:
```html
<div id="feefo-product-review-widgetId" class="feefo-review-widget-product" data-product-sku="PRODUCT_SKU"></div>
```

**Usage**:
- Displays full product reviews
- Requires `data-product-sku` attribute with the product SKU
- ID should be unique if multiple widgets on same page (use suffixes like `-modal-{sku}`)

**Locations**:
- Testimonials section: `resources/views/home.blade.php` (Line ~310)
- Product modal: Dynamically generated in JavaScript (Line ~1104)

## Current Setup

### Testimonials Section ("What Our Customers Say")
**Location**: `resources/views/home.blade.php` (Line ~302-314)

```html
<div class="feefo-widget-container mb-40">
    <!-- Product Stars Widget -->
    <div class="feefo-review-badge-wrapper-product" data-product-sku="100046"></div>
    
    <!-- Product Review Widget -->
    <div id="feefo-product-review-widgetId" class="feefo-review-widget-product" data-product-sku="100046"></div>
</div>
```

**Product SKU**: 100046 (Fish Blood & Bone)

### Product Modal Reviews
**Location**: `resources/views/home.blade.php` (JavaScript ~1100-1105)

Dynamically generates widgets based on product SKU:
- Product Stars: `<div class="feefo-review-badge-wrapper-product" data-product-sku="{sku}"></div>`
- Product Reviews: `<div id="feefo-product-review-widgetId-modal-{sku}" class="feefo-review-widget-product" data-product-sku="{sku}"></div>`

**Supported Product SKUs**:
- 100196 - Ultimate Rose Bloom Booster
- 100118 - SwellGell
- 100062 - Superior Soluble Fertiliser
- 100016 - Citrus Feed
- 100105 - Acer Feed
- 100106 - Clematis Feed
- 100046 - Fish Blood & Bone

## Additional Scripts (Supporting)
These scripts are also loaded to support widget functionality:

1. `//register.feefo.com//feefo-widget-v2/js/feefo-widget.js` - Core widget library
2. `https://api.feefo.com/feefo-widgets-data/loader/widgets/you-garden` - Widget data loader
3. `https://register.feefo.com/feefo-widgets-app/feefo_widgets_loader.js` - Widget loader
4. `https://register.feefo.com/badge-ui/feefo_adaptive_badges.js` - Badge UI library

## Widget Initialization

The widgets automatically initialize when:
1. The main script (`api/javascript/you-garden`) is loaded
2. The widget elements are present in the DOM
3. The `data-product-sku` attribute is set correctly

For dynamically loaded widgets (like in modals), the JavaScript calls `Feefo.init()` after adding widgets to the DOM.

## Troubleshooting

### Widgets Not Showing:
1. Check browser console for errors
2. Verify the main script is loaded: `https://api.feefo.com/api/javascript/you-garden`
3. Ensure `data-product-sku` attribute is set correctly
4. Check that product SKU exists in Feefo system
5. Verify merchant identifier is `you-garden`

### Common Issues:
- **404 Error**: Check script URL is correct (`javascript` not `javscript`)
- **Widgets Not Loading**: Ensure `Feefo.init()` is called after DOM is ready
- **No Reviews**: Product SKU might not have reviews in Feefo system

## Notes
- All widgets use the `you-garden` merchant account
- Product SKUs must match the SKUs in the YouGarden/Feefo system
- Widgets are initialized both on page load and dynamically when modals open

