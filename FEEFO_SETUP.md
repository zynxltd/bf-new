# Feefo Widget Setup - Blooming Fast

## Overview
This document outlines the Feefo review widget integration for the Blooming Fast website using the YouGarden merchant account.

## Merchant Configuration
- **Merchant Identifier**: `you-garden` (with hyphen)
- **Origin**: `www.yougarden.com`
- **API Base**: `https://api.feefo.com`

## Scripts & Stylesheets Loaded

### In `resources/views/layouts/app.blade.php`:

#### Stylesheets (Head Section):
1. `https://register.feefo.com//feefo-widget-v2/js/service-carousel-service-carousel-jsx.css`
2. `https://register.feefo.com//feefo-widget-v2/js/product-stars-widget-product-stars-widget-jsx.css`

#### JavaScript Scripts (Before closing `</body>`):
1. `//register.feefo.com//feefo-widget-v2/js/feefo-widget.js` (async)
2. `https://api.feefo.com/feefo-widgets-data/loader/widgets/you-garden` (async)
3. `https://register.feefo.com/feefo-widgets-app/feefo_widgets_loader.js`
4. `https://register.feefo.com/badge-ui/feefo_adaptive_badges.js`
5. `https://api.feefo.com/api/javascript/widget/you-garden` ⚠️ **Main widget initialization script**

## Widget Implementations

### 1. Hero Section Badge
**Location**: `resources/views/home.blade.php` (Line ~96-115)

- **Type**: Feefo badge widget (fallback display)
- **Link**: Scrolls to `#customer-reviews` section (internal anchor)
- **Element ID**: `feefo-badge-hero`
- **Initialization**: Via `loadHeroFeefoBadge()` function

### 2. Testimonials Section ("What Our Customers Say")
**Location**: `resources/views/home.blade.php` (Line ~302-314)

**Widgets Implemented**:
- **Product Stars Widget**: 
  - Class: `feefo-product-stars-widget`
  - SKU: `100046` (Fish Blood & Bone)
  - Attributes: `data-product-sku="100046"`, `data-parent-product-sku="100046"`, `data-merchant-identifier="you-garden"`

- **Product Review Widget**:
  - ID: `feefo-product-review-widgetId`
  - Class: `feefo-review-widget-product`
  - SKU: `100046`
  - Attributes: `data-product-sku="100046"`, `data-merchant-identifier="you-garden"`

- **Service Review Carousel Widget**:
  - ID: `feefo-service-review-carousel-widgetId`
  - Class: `feefo-review-carousel-widget-service`
  - Attributes: `data-merchant-identifier="you-garden"`

**Initialization**: Via `initTestimonialsFeefoWidgets()` function

### 3. Product Modal Reviews Section
**Location**: `resources/views/home.blade.php` (Line ~621-631, JavaScript ~1100-1125)

**Dynamic Widgets** (loaded per product):
- Widgets are dynamically created based on product SKU
- Same widget structure as testimonials section
- Unique IDs per modal instance: `feefo-rating-modal-{sku}`, `feefo-product-review-widgetId-modal-{sku}`, etc.

**Product SKU Mapping** (JavaScript fallback logic):
- Ultimate Rose Bloom Booster → SKU: `100196`
- SwellGell → SKU: `100118`
- Superior Soluble Fertiliser → SKU: `100062`
- Citrus Feed → SKU: `100016`
- Acer Feed → SKU: `100105`
- Clematis Feed → SKU: `100106`
- Fish Blood & Bone → SKU: `100046`

**Initialization**: 
- On modal open via `shown.bs.modal` event
- Re-initializes after 300ms delay

## JavaScript Initialization Functions

### 1. `initTestimonialsFeefoWidgets()`
- Waits for Feefo script to load
- Calls `Feefo.init()` when available
- Re-initializes after 1 second delay
- Location: `resources/views/home.blade.php` (Line ~1345-1373)

### 2. `loadHeroFeefoBadge()`
- Loads Feefo badge in hero section
- Shows fallback if badge fails to load
- Location: `resources/views/home.blade.php` (Line ~1376+)

### 3. Modal Widget Initialization
- Triggered on `#productModal` `shown.bs.modal` event
- Re-initializes Feefo widgets after modal is displayed
- Location: `resources/views/home.blade.php` (Line ~1313-1321)

## API Endpoints Reference

### Widget Initialization:
- `https://api.feefo.com/api/javascript/widget/you-garden`

### Widget Data Loader:
- `https://api.feefo.com/feefo-widgets-data/loader/widgets/you-garden`

### Translations:
- `https://api.feefo.com/api/translations/en-GB/FeefoWidget?merchant_identifier=you-garden`
- `https://api.feefo.com/api/translations/en-GB/FeefoWidget?origin=www.yougarden.com`

### Product Reviews API:
- `https://api.feefo.com/api/10/reviews/product?product_sku={SKU}&origin=www.yougarden.com&merchant_identifier=you-garden&...`

## Widget Data Attributes

### Required Attributes:
- `data-product-sku`: Product SKU (for product-specific widgets)
- `data-parent-product-sku`: Parent product SKU (for product stars widget)
- `data-merchant-identifier`: Merchant identifier (`you-garden`)

### Widget Classes:
- `feefo-product-stars-widget`: Product star rating widget
- `feefo-review-widget-product`: Full product reviews widget
- `feefo-review-carousel-widget-service`: Service reviews carousel

## Troubleshooting

### Widgets Not Loading:
1. Check browser console for 404 errors on Feefo scripts
2. Verify merchant identifier is `you-garden` (with hyphen, not `yougarden`)
3. Ensure `Feefo.init()` is called after widgets are in DOM
4. Check that product SKUs are valid and have reviews

### Common Issues:
- **404 Error**: Merchant identifier might be incorrect (should be `you-garden`)
- **Widgets Not Showing**: May need to call `Feefo.init()` after DOM is ready
- **No Reviews**: Product SKU might not have reviews in Feefo system

## Notes
- All widgets use the `you-garden` merchant identifier
- Widgets automatically fetch reviews from the YouGarden Feefo account
- Product SKUs must match the SKUs in the YouGarden/Feefo system
- Widgets are initialized both on page load and dynamically when modals open

