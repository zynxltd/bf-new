# Personalization Quick Reference Guide
## Key Segments, Messages & Rules

---

## 🎯 Top 5 Priority Segments

### 1. Cart Abandoners (CRITICAL)
**Detection:** Items in cart + no purchase + time > 5 min
**Message:** "Complete Your Order & Save 10% - Code: SAVE10"
**Trigger:** Exit intent popup + Email sequence (1hr, 24hr, 3 days)
**Expected Impact:** 15-25% cart recovery

### 2. Returning Browsers (VERY HIGH)
**Detection:** 2+ visits + 0 purchases
**Message:** "Welcome Back! We've Got New Products You'll Love"
**Trigger:** Homepage banner + Email after 3 days
**Expected Impact:** 10-20% conversion increase

### 3. First-Time Visitors (HIGH)
**Detection:** Session count = 1
**Message:** "Welcome! Free Delivery on Orders Over £49.99"
**Trigger:** Homepage banner + Exit intent with 10% off
**Expected Impact:** 5-15% conversion increase

### 4. Seasonal Gardeners (HIGH)
**Detection:** Current month + purchase history patterns
**Message:** "[Season] Planting Season! Get Your [Products] Now"
**Trigger:** Homepage banner + Seasonal email campaigns
**Expected Impact:** 20-30% seasonal sales increase

### 5. VIP Customers (VERY HIGH)
**Detection:** 6+ purchases
**Message:** "VIP Exclusive: 15% Off Everything - Code: VIP15"
**Trigger:** Homepage banner + Exclusive emails
**Expected Impact:** 30%+ lifetime value increase

---

## 📋 Quick Rule Reference

### Rule Priority Order
1. **Cart Abandoner** (highest priority)
2. **VIP Customer**
3. **Returning Browser**
4. **First-Time Visitor**
5. **Seasonal**
6. **Category Enthusiast**
7. **Price-Sensitive**
8. **Mobile-Only**

### Message Display Rules
- **One message per session** (highest priority wins)
- **Dismissible** with cookie memory
- **Show after 2 seconds** on page load
- **Mobile-optimized** versions

---

## 💬 Message Templates

### Homepage Banners

```
First-Time Visitor:
"Welcome! Free Delivery on Orders Over £49.99 | Trusted by 11,000+ Gardeners"

Returning Browser:
"Welcome Back! We've Got New Products You'll Love | Free Delivery Over £49.99"

Cart Abandoner:
"Complete Your Order in the Next 15 Minutes & Get Free Delivery!"

VIP Customer:
"VIP Member: Exclusive Early Access to New Products | Free Priority Delivery"

Spring (March-May):
"Spring Planting Season! Get Your Bulbs & Bedding Plants Now"

Autumn (Sept-Nov):
"Autumn Planting Time! Plant Now for Spring Blooms"
```

### Exit Intent Popups

```
First-Time Visitor:
"Wait! Get 10% Off Your First Order - Use Code: WELCOME10"

Cart Abandoner:
"Don't Miss Out! Complete Your Order & Save 10% - Code: SAVE10"
```

### Email Subject Lines

```
Cart Abandonment (1hr):
"You Left Items in Your Cart"

Cart Abandonment (24hr):
"Last Chance: 10% Off Your Cart - Code: SAVE10"

Re-engagement (30 days):
"We Miss You! Here's 15% Off - Code: COMEBACK15"

Seasonal:
"Spring Gardening Guide: What to Plant Now"
```

---

## 🔧 Implementation Quick Start

### Step 1: Basic Segment Detection (JavaScript)

```javascript
// Detect user segment
function getSegment() {
    const sessionCount = parseInt(localStorage.getItem('session_count') || '1');
    const hasCart = document.querySelector('.cart-items')?.textContent > 0;
    const purchaseCount = parseInt(localStorage.getItem('purchase_count') || '0');
    
    if (hasCart) return 'cart-abandoner';
    if (purchaseCount >= 6) return 'vip-customer';
    if (sessionCount >= 2 && purchaseCount === 0) return 'returning-browser';
    if (sessionCount === 1) return 'first-time-visitor';
    
    return 'default';
}

// Show personalized message
function showMessage(segment) {
    const messages = {
        'cart-abandoner': 'Complete Your Order & Save 10% - Code: SAVE10',
        'vip-customer': 'VIP Exclusive: 15% Off Everything - Code: VIP15',
        'returning-browser': 'Welcome Back! We\'ve Got New Products',
        'first-time-visitor': 'Welcome! Free Delivery on Orders Over £49.99'
    };
    
    const message = messages[segment];
    if (message && !localStorage.getItem(`dismissed_${segment}`)) {
        displayBanner(message);
    }
}
```

### Step 2: Laravel Backend Service

```php
// app/Services/PersonalizationService.php
class PersonalizationService
{
    public function detectSegment($userId = null, $sessionId = null)
    {
        $sessionCount = $this->getSessionCount($sessionId);
        $purchaseCount = $userId ? $this->getPurchaseCount($userId) : 0;
        $cartItems = $this->getCartItems($sessionId);
        
        // Priority order
        if (count($cartItems) > 0) {
            return 'cart-abandoner';
        }
        
        if ($purchaseCount >= 6) {
            return 'vip-customer';
        }
        
        if ($sessionCount >= 2 && $purchaseCount === 0) {
            return 'returning-browser';
        }
        
        if ($sessionCount === 1) {
            return 'first-time-visitor';
        }
        
        return 'default';
    }
    
    public function getMessage($segment)
    {
        return [
            'cart-abandoner' => 'Complete Your Order & Save 10% - Code: SAVE10',
            'vip-customer' => 'VIP Exclusive: 15% Off Everything - Code: VIP15',
            'returning-browser' => 'Welcome Back! We\'ve Got New Products',
            'first-time-visitor' => 'Welcome! Free Delivery on Orders Over £49.99'
        ][$segment] ?? null;
    }
}
```

### Step 3: Blade Template Integration

```blade
{{-- resources/views/partials/personalized-banner.blade.php --}}
@php
    $segment = app(\App\Services\PersonalizationService::class)
        ->detectSegment(auth()->id(), session()->getId());
    $message = app(\App\Services\PersonalizationService::class)
        ->getMessage($segment);
@endphp

@if($message && !session("dismissed_banner_{$segment}"))
    <div class="personalized-banner" data-segment="{{ $segment }}">
        <div class="banner-content">
            {{ $message }}
            <button class="banner-dismiss" data-segment="{{ $segment }}">×</button>
        </div>
    </div>
@endif
```

---

## 📊 Key Metrics to Track

### Segment Performance
- Segment distribution (% of traffic)
- Segment conversion rate
- Segment average order value
- Segment lifetime value

### Message Performance
- Message display rate
- Message click-through rate
- Message conversion rate
- Dismissal rate

### Business Impact
- Overall conversion rate
- Cart abandonment rate
- Average order value
- Customer lifetime value

---

## 🚀 Quick Wins (Implement First)

1. **Cart Abandonment Email** (Highest ROI)
   - 1 hour after abandonment
   - 10% discount code
   - Expected: 15-25% recovery

2. **First-Time Visitor Discount**
   - Exit intent popup
   - 10% off code: WELCOME10
   - Expected: 5-10% conversion increase

3. **Returning Visitor Re-engagement**
   - Email after 3 days
   - Personalized recommendations
   - Expected: 10-15% conversion increase

4. **Seasonal Messaging**
   - Homepage banner
   - Seasonal product highlights
   - Expected: 20-30% seasonal sales increase

5. **VIP Exclusive Offers**
   - Exclusive discount codes
   - Early access to sales
   - Expected: 30%+ lifetime value increase

---

## 📧 Email Campaign Schedule

### Automated Campaigns

| Trigger | Timing | Segment | Subject |
|---------|--------|---------|---------|
| Cart Abandonment | 1 hour | Cart Abandoner | "You Left Items in Your Cart" |
| Cart Abandonment | 24 hours | Cart Abandoner | "Last Chance: 10% Off Your Cart" |
| Cart Abandonment | 3 days | Cart Abandoner | "We're Holding Your Items" |
| Re-engagement | 30 days | At-Risk | "We Miss You! 15% Off" |
| Seasonal | Start of season | Seasonal | "[Season] Gardening Guide" |
| New Products | Weekly | Engaged | "New Products You'll Love" |
| VIP Exclusive | Monthly | VIP | "VIP Exclusive: Early Access" |

---

## 🎨 Design Guidelines

### Banner Design
- **Height:** 50-60px (desktop), 80-100px (mobile)
- **Position:** Top of page, sticky
- **Colors:** Brand colors with high contrast
- **CTA:** Clear, action-oriented button
- **Dismiss:** × button in top-right corner

### Exit Intent Popup
- **Size:** 500x400px (desktop), full-width (mobile)
- **Position:** Centered overlay
- **Background:** Semi-transparent overlay
- **Content:** Clear headline, benefit, CTA, discount code
- **Dismiss:** X button or click outside

### Mobile Considerations
- Larger touch targets (44x44px minimum)
- Simplified messaging
- Thumb-friendly placement
- Quick-loading, lightweight

---

## ✅ Implementation Checklist

### Week 1: Foundation
- [ ] Set up session tracking
- [ ] Implement basic segment detection
- [ ] Create banner display component
- [ ] Test first-time visitor detection

### Week 2: Core Features
- [ ] Cart abandonment detection
- [ ] Exit intent popup
- [ ] Email trigger system
- [ ] Returning visitor detection

### Week 3: Advanced
- [ ] Purchase history segmentation
- [ ] Seasonal detection
- [ ] VIP customer detection
- [ ] Email campaigns setup

### Week 4: Optimization
- [ ] A/B testing framework
- [ ] Analytics tracking
- [ ] Performance monitoring
- [ ] Message optimization

---

## 🔗 Related Documents

- **Full Strategy:** `PERSONALIZATION_STRATEGY.md`
- **CRO Audit:** `CRO_AUDIT_REPORT.md`
- **Implementation Code:** See `app/Services/PersonalizationService.php` (to be created)

---

**Quick Reference Version:** 1.0  
**Last Updated:** December 5, 2025


