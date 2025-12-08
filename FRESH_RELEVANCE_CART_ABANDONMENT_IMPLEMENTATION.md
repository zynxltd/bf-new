# Fresh Relevance Cart Abandonment - Step-by-Step Implementation
## First Solution for GardeningDirect.co.uk

**Platform:** Fresh Relevance by dotdigital  
**Experience:** Cart Abandonment Recovery  
**Implementation Time:** 2-3 hours  
**Expected ROI:** 15-25% cart recovery rate

---

## Pre-Implementation Checklist

Before starting, ensure you have:
- [ ] Access to Fresh Relevance dashboard
- [ ] Fresh Relevance tracking code installed on site
- [ ] Analytics fields configured (see Analytics Config guide)
- [ ] Test access to GardeningDirect.co.uk site
- [ ] Admin access to make changes

---

## Implementation Steps

### PART 1: Segment Creation (15 minutes)

#### Step 1.1: Navigate to Segments

1. Log in to Fresh Relevance dashboard
2. Click on **"Segments"** in the main navigation
3. Click **"Create New Segment"** button

#### Step 1.2: Configure Segment Details

**Segment Name:** `Cart Abandoners - Active Cart`

**Description:** `Users who have items in cart but haven't completed purchase`

#### Step 1.3: Add Segment Rules

**Rule 1: Has Cart Items**
```
Field: Carted Quantity (Current Session)
Operator: Greater than or equal to
Value: 1
```

**Rule 2: Cart Has Value**
```
Field: Carted Value (Current Session)
Operator: Greater than
Value: 0
```

**Rule 3: No Recent Purchase**
```
Field: Purchased Quantity (Last 2 Hours)
Operator: Equals
Value: 0
```

**Rule 4: Recent Cart Activity**
```
Field: Last Cart Activity
Operator: Less than or equal to
Value: 1 hour ago
```

**Rule 5: Not on Checkout**
```
Field: Current Page URL
Operator: Does not contain
Value: /checkout/
```

**Rule 6: Not Completed Purchase**
```
Field: Purchase Status
Operator: Equals
Value: Not completed
```

#### Step 1.4: Save Segment

1. Review all rules
2. Click **"Save Segment"**
3. Note the Segment ID for later use

---

### PART 2: Smart Blocks Creation (30 minutes)

#### Block 1: Cart Urgency Block

**Step 2.1: Create Urgency Block**

1. Navigate to **"Smart Blocks"** or **"Components"**
2. Click **"Create New Block"**
3. Name: `Cart Urgency Block`

**Step 2.2: Configure Block Content**

**Block Type:** Banner

**HTML Content:**
```html
<div class="cart-urgency-banner" style="background: #537550; color: white; padding: 15px; text-align: center; position: relative;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div style="font-size: 18px; font-weight: bold; margin-bottom: 5px;">
            ⏰ Complete your order in the next <span id="cart-timer">15:00</span> for FREE delivery!
        </div>
        <div style="font-size: 14px; margin-bottom: 10px;">
            You have <strong>{{cart_item_count}}</strong> items in your cart worth <strong>£{{cart_total}}</strong>
        </div>
        <a href="/cart/" style="background: white; color: #537550; padding: 10px 30px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;">
            Complete Order Now →
        </a>
        <button onclick="this.parentElement.parentElement.parentElement.style.display='none'" style="position: absolute; top: 10px; right: 10px; background: transparent; border: none; color: white; font-size: 20px; cursor: pointer;">×</button>
    </div>
</div>

<script>
// Countdown timer
function startCartTimer() {
    let timeLeft = 15 * 60; // 15 minutes in seconds
    const timerElement = document.getElementById('cart-timer');
    
    const interval = setInterval(function() {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        timerElement.textContent = minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
        
        if (timeLeft <= 0) {
            clearInterval(interval);
            timerElement.textContent = '0:00';
        }
        timeLeft--;
    }, 1000);
}
startCartTimer();
</script>
```

**Step 2.3: Configure Dynamic Variables**

Add these variables:
- `{{cart_item_count}}` - Number of items in cart
- `{{cart_total}}` - Total cart value
- `{{cart_items}}` - List of cart items

**Step 2.4: Save Block**

1. Preview the block
2. Click **"Save Block"**

---

#### Block 2: Exit Intent Discount Block

**Step 2.5: Create Discount Block**

1. Click **"Create New Block"**
2. Name: `Cart Exit Intent Discount Block`
3. Block Type: Modal/Overlay

**Step 2.6: Configure Modal Content**

**HTML Content:**
```html
<div class="exit-intent-modal" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); z-index: 9999; display: flex; align-items: center; justify-content: center;">
    <div style="background: white; padding: 40px; border-radius: 10px; max-width: 500px; width: 90%; text-align: center; position: relative;">
        <button onclick="this.closest('.exit-intent-modal').style.display='none'" style="position: absolute; top: 10px; right: 10px; background: transparent; border: none; font-size: 24px; cursor: pointer;">×</button>
        
        <div style="font-size: 32px; margin-bottom: 20px;">⏰</div>
        <h2 style="font-size: 24px; margin-bottom: 15px; color: #333;">Wait! Don't Miss Out</h2>
        <p style="font-size: 16px; margin-bottom: 20px; color: #666;">
            Complete your order and save <strong style="color: #537550; font-size: 20px;">10%</strong> on your purchase
        </p>
        
        <div style="background: #f5f5f5; padding: 20px; border-radius: 5px; margin-bottom: 20px;">
            <div style="font-size: 14px; color: #666; margin-bottom: 10px;">Use code at checkout:</div>
            <div style="font-size: 28px; font-weight: bold; color: #537550; letter-spacing: 2px; margin-bottom: 10px;">SAVE10</div>
            <div style="font-size: 12px; color: #999;">Valid for 2 hours</div>
        </div>
        
        <div style="margin-bottom: 20px; text-align: left;">
            <div style="font-size: 14px; font-weight: bold; margin-bottom: 10px;">Your cart:</div>
            <div style="font-size: 14px; color: #666;">{{cart_item_count}} items - £{{cart_total}}</div>
        </div>
        
        <a href="/cart/" style="background: #537550; color: white; padding: 15px 40px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block; font-size: 16px;">
            Complete My Order →
        </a>
        
        <div style="margin-top: 15px; font-size: 12px; color: #999;">
            <a href="#" onclick="this.closest('.exit-intent-modal').style.display='none'; return false;" style="color: #999;">No thanks, I'll continue browsing</a>
        </div>
    </div>
</div>
```

**Step 2.7: Configure Modal Styling**

- Background overlay: Semi-transparent black
- Modal background: White
- Border radius: 10px
- Max width: 500px
- Centered on screen

**Step 2.8: Save Block**

---

#### Block 3: Cart Reminder Block (Product Page)

**Step 2.9: Create Reminder Block**

1. Click **"Create New Block"**
2. Name: `Cart Reminder Sticky Block`
3. Block Type: Sticky Banner

**HTML Content:**
```html
<div class="cart-reminder-banner" style="position: fixed; top: 0; left: 0; width: 100%; background: #537550; color: white; padding: 12px; text-align: center; z-index: 9998; box-shadow: 0 2px 5px rgba(0,0,0,0.2);">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between;">
        <div style="font-size: 14px;">
            🛒 You have <strong>{{cart_item_count}}</strong> items in your cart - Total: <strong>£{{cart_total}}</strong>
        </div>
        <div>
            <a href="/cart/" style="background: white; color: #537550; padding: 8px 20px; text-decoration: none; border-radius: 5px; font-weight: bold; font-size: 14px; margin-right: 10px;">
                View Cart
            </a>
            <button onclick="this.closest('.cart-reminder-banner').style.display='none'" style="background: transparent; border: none; color: white; font-size: 18px; cursor: pointer; padding: 0 10px;">×</button>
        </div>
    </div>
</div>
```

**Step 2.10: Save Block**

---

#### Block 4: Cart Summary Block (Homepage)

**Step 2.11: Create Summary Block**

1. Click **"Create New Block"**
2. Name: `Cart Summary Sticky Block`
3. Block Type: Sticky Header

**HTML Content:**
```html
<div class="cart-summary-bar" style="position: fixed; top: 0; left: 0; width: 100%; background: #2d5016; color: white; padding: 10px; text-align: center; z-index: 9997; font-size: 14px;">
    <div style="max-width: 1200px; margin: 0 auto;">
        Your cart is waiting - <strong>{{cart_item_count}} items</strong> worth <strong>£{{cart_total}}</strong>
        <a href="/cart/" style="color: white; text-decoration: underline; margin-left: 15px; font-weight: bold;">
            Complete Order →
        </a>
    </div>
</div>
```

**Step 2.12: Save Block**

---

### PART 3: Slot Creation (20 minutes)

#### Slot 1: Cart Page Banner Slot

**Step 3.1: Create Cart Page Slot**

1. Navigate to **"Slots"** or **"Placements"**
2. Click **"Create New Slot"**
3. Name: `Cart Page Banner Slot`

**Step 3.2: Configure Slot Settings**

**Selector:** `.cart-container` or `#cart` or `.woocommerce-cart`
**Position:** Before cart items (or use CSS selector)
**Insert Method:** Before selected element

**CSS Selector Examples:**
- `.cart-page .cart-items:before`
- `#cart .cart-table:before`
- `.woocommerce-cart .cart:before`

**Step 3.3: Configure Dimensions**

- Width: 100%
- Height: Auto (or 100px)
- Mobile: Full width, responsive

**Step 3.4: Save Slot**

---

#### Slot 2: Exit Intent Modal Slot

**Step 3.5: Create Exit Intent Slot**

1. Click **"Create New Slot"**
2. Name: `Exit Intent Modal Slot`
3. Slot Type: Modal/Overlay

**Step 3.6: Configure Modal Settings**

**Position:** Center of screen
**Overlay:** Yes (semi-transparent background)
**Close Button:** Yes (top-right)
**Click Outside to Close:** Yes

**Step 3.7: Configure Dimensions**

- Desktop: 500px width, auto height
- Mobile: 90% width, auto height
- Max height: 80vh

**Step 3.8: Save Slot**

---

#### Slot 3: Product Page Sticky Banner Slot

**Step 3.9: Create Sticky Banner Slot**

1. Click **"Create New Slot"**
2. Name: `Product Page Sticky Banner Slot`
3. Slot Type: Sticky/Fixed

**Step 3.10: Configure Sticky Settings**

**Position:** Fixed top
**Selector:** `body` (append to body)
**Z-index:** 9998
**Sticky:** Yes (always visible)

**Step 3.11: Save Slot**

---

#### Slot 4: Homepage Sticky Header Slot

**Step 3.12: Create Sticky Header Slot**

1. Click **"Create New Slot"**
2. Name: `Homepage Sticky Header Slot`
3. Slot Type: Sticky/Fixed

**Step 3.13: Configure Settings**

**Position:** Fixed top (below main header if exists)
**Selector:** `body` or `.site-header`
**Z-index:** 9997
**Sticky:** Yes

**Step 3.14: Save Slot**

---

### PART 4: Experience Creation (30 minutes)

#### Step 4.1: Create Experience

1. Navigate to **"Experiences"** or **"Campaigns"**
2. Click **"Create New Experience"**
3. Name: `Cart Abandonment Recovery`
4. Description: `Recover abandoned carts with urgency messaging and discounts`

#### Step 4.2: Configure Experience Settings

**Status:** Active (or Draft for testing)
**Priority:** High
**Start Date:** Today
**End Date:** None (ongoing)

#### Step 4.3: Add Segment

1. Click **"Add Segment"**
2. Select: `Cart Abandoners - Active Cart`
3. Save

#### Step 4.4: Add Trigger 1 - Cart Page Banner

1. Click **"Add Trigger"**
2. **Trigger Type:** Page View
3. **Trigger Name:** `Cart Page Banner Trigger`

**Conditions:**
- Page URL contains: `/cart/` OR `/basket/`
- Segment: `Cart Abandoners - Active Cart`

**Settings:**
- Delay: 1 second
- Frequency: Every page view
- Priority: High

**Assign Slot & Block:**
- Slot: `Cart Page Banner Slot`
- Block: `Cart Urgency Block`

**Save Trigger**

---

#### Step 4.5: Add Trigger 2 - Exit Intent Modal

1. Click **"Add Trigger"**
2. **Trigger Type:** Exit Intent
3. **Trigger Name:** `Exit Intent Discount Trigger`

**Conditions:**
- Mouse movement to browser edge
- Segment: `Cart Abandoners - Active Cart`
- Minimum time on site: 30 seconds

**Settings:**
- Frequency: Once per session
- Priority: Very High

**Assign Slot & Block:**
- Slot: `Exit Intent Modal Slot`
- Block: `Cart Exit Intent Discount Block`

**Save Trigger**

---

#### Step 4.6: Add Trigger 3 - Product Page Reminder

1. Click **"Add Trigger"**
2. **Trigger Type:** Page View
3. **Trigger Name:** `Product Page Cart Reminder`

**Conditions:**
- Page URL contains: `/product/` OR `/products/`
- Segment: `Cart Abandoners - Active Cart`

**Settings:**
- Delay: 3 seconds
- Frequency: Once per session
- Priority: Medium

**Assign Slot & Block:**
- Slot: `Product Page Sticky Banner Slot`
- Block: `Cart Reminder Sticky Block`

**Save Trigger**

---

#### Step 4.7: Add Trigger 4 - Homepage Sticky Bar

1. Click **"Add Trigger"**
2. **Trigger Type:** Page View
3. **Trigger Name:** `Homepage Cart Summary`

**Conditions:**
- Page URL equals: Homepage (exact match)
- Segment: `Cart Abandoners - Active Cart`

**Settings:**
- Delay: 2 seconds
- Frequency: Once per session
- Priority: Medium

**Assign Slot & Block:**
- Slot: `Homepage Sticky Header Slot`
- Block: `Cart Summary Sticky Block`

**Save Trigger**

---

#### Step 4.8: Configure Frequency Rules

**Per User:**
- Maximum experiences per session: 1
- Maximum experiences per day: 3
- Maximum experiences per week: 10

**Cooldown:**
- Same experience: 24 hours
- Different experiences: 1 hour

#### Step 4.9: Configure Exclusions

**Don't Show If:**
- User is on checkout page
- User has completed purchase
- Experience shown 3+ times today
- User has dismissed (check cookie)

#### Step 4.10: Save Experience

1. Review all triggers
2. Preview experience
3. Click **"Save Experience"**
4. Click **"Activate"** (or keep as Draft for testing)

---

### PART 5: Testing (30 minutes)

#### Step 5.1: Enable Test Mode

1. In Fresh Relevance, enable **"Test Mode"**
2. Add your test email address
3. Or use preview mode

#### Step 5.2: Test Cart Page Banner

1. Add items to cart on GardeningDirect.co.uk
2. Navigate to cart page
3. Wait 1 second
4. Verify urgency banner appears
5. Check countdown timer works
6. Test "Complete Order" button
7. Test dismiss button

#### Step 5.3: Test Exit Intent Modal

1. Add items to cart
2. Browse to any page
3. Move mouse to top of browser (exit intent)
4. Verify modal appears
5. Check discount code displays
6. Test "Complete Order" button
7. Test close button
8. Test "No thanks" link

#### Step 5.4: Test Product Page Reminder

1. Add items to cart
2. Navigate to a product page
3. Wait 3 seconds
4. Verify sticky banner appears at top
5. Check cart summary displays correctly
6. Test "View Cart" button
7. Test dismiss button

#### Step 5.5: Test Homepage Sticky Bar

1. Add items to cart
2. Navigate to homepage
3. Wait 2 seconds
4. Verify sticky bar appears
5. Check it stays visible when scrolling
6. Test "Complete Order" link

#### Step 5.6: Test Frequency Limits

1. Trigger experience multiple times
2. Verify frequency limits work
3. Check cooldown periods
4. Verify "once per session" works

#### Step 5.7: Test Mobile Responsiveness

1. Test on mobile device or emulator
2. Verify all blocks display correctly
3. Check touch targets are large enough
4. Verify modals are mobile-friendly
5. Test sticky elements work on mobile

---

### PART 6: Launch (15 minutes)

#### Step 6.1: Final Review

- [ ] All segments created and tested
- [ ] All smart blocks created and styled
- [ ] All slots created and configured
- [ ] All triggers added to experience
- [ ] Frequency rules configured
- [ ] Exclusions set up
- [ ] Tested in preview mode
- [ ] Tested on desktop
- [ ] Tested on mobile

#### Step 6.2: Soft Launch

1. Set experience to **"Active"**
2. Configure traffic percentage: **10%**
3. Monitor for 24-48 hours
4. Check for errors in Fresh Relevance dashboard
5. Monitor analytics

#### Step 6.3: Monitor Performance

**Key Metrics to Watch:**
- Impressions (how many see the experience)
- Click-through rate (CTR)
- Cart recovery rate
- Discount code usage
- Conversion rate

**Check Daily:**
- Fresh Relevance dashboard
- Error logs
- User feedback
- Conversion metrics

#### Step 6.4: Full Launch

After 24-48 hours of successful soft launch:

1. Increase traffic to **50%**
2. Monitor for 24 hours
3. If successful, increase to **100%**
4. Continue monitoring

---

## Post-Implementation

### Week 1: Monitor & Optimize

**Daily Tasks:**
- Check Fresh Relevance dashboard
- Monitor conversion rates
- Review error logs
- Check user feedback

**Optimizations:**
- Adjust messaging based on performance
- Test different discount amounts
- Optimize timing (delays)
- Refine frequency rules

### Week 2-4: Analyze & Refine

**Metrics to Analyze:**
- Cart recovery rate (target: 15-25%)
- Discount code usage (target: 5-10%)
- Average order value
- Conversion rate improvement

**A/B Tests to Run:**
- Different discount amounts (10% vs 15%)
- Different messaging
- Different timing
- Different triggers

---

## Troubleshooting

### Issue: Experience Not Showing

**Solutions:**
1. Check segment is populating (verify users match criteria)
2. Verify triggers are configured correctly
3. Check frequency limits (may have hit limit)
4. Verify slots are correctly configured
5. Check browser console for errors
6. Verify Fresh Relevance tracking code is installed

### Issue: Blocks Not Displaying Correctly

**Solutions:**
1. Check CSS conflicts with site styles
2. Verify z-index values (may be behind other elements)
3. Check responsive styles for mobile
4. Review HTML structure
5. Test in different browsers

### Issue: Dynamic Variables Not Working

**Solutions:**
1. Verify variable names match Fresh Relevance format
2. Check data is available in segment
3. Test with static values first
4. Review Fresh Relevance variable documentation

---

## Success Metrics

### Target KPIs:

- **Cart Recovery Rate:** 15-25%
- **Discount Code Usage:** 5-10%
- **Click-Through Rate:** 10-15%
- **Conversion Rate:** 2-5% of abandoned carts
- **Revenue Recovery:** Track monthly recovered revenue

### Measurement:

Track these in Fresh Relevance dashboard:
- Experience impressions
- Click-through rate
- Conversion rate
- Revenue attributed to experience

---

## Next Steps

After Cart Abandonment is live and performing:

1. **Implement Email Sequence** (see Email Setup guide)
2. **Set up First-Time Visitor Experience**
3. **Implement New Customer Experience**
4. **Add Returning Customer Experience**
5. **Create Frequent Buyer Experience**

---

**Implementation Guide Version:** 1.0  
**Last Updated:** December 5, 2025  
**Estimated Implementation Time:** 2-3 hours  
**Expected ROI:** 15-25% cart recovery rate

---

*Follow this guide step-by-step to implement the Cart Abandonment experience in Fresh Relevance. This is your first solution with the highest expected ROI.*



