# Fresh Relevance Setup Guide
## New Customer Experience - Browsed But Not Purchased

**Platform:** Fresh Relevance  
**Experience Type:** New Customer Re-engagement  
**Target:** Visitors who browsed products but haven't purchased within X days

---

## Table of Contents

1. [Analytics Configuration](#1-analytics-configuration)
2. [Segment Creation](#2-segment-creation)
3. [Trigger Setup](#3-trigger-setup)
4. [Content Configuration](#4-content-configuration)
5. [Optimization Settings](#5-optimization-settings)
6. [Testing & Validation](#6-testing--validation)

---

## 1. Analytics Configuration

### Step 1: Navigate to Analytics Settings

1. Go to **Analytics** section in Fresh Relevance
2. Click on **"Map analytics for the fields you want in your ESP"**

### Step 2: Select Analytics Fields

Based on your requirements, select the following fields:

#### **24 Hours Analytics** (Select these):
- ✅ **Browsed Quantity** - Track products viewed
- ✅ **Browsed Value** - Total value of products browsed
- ✅ **Last Browsed Date** - When they last viewed products
- ✅ **Number of Sessions** - Session count in last 24 hours
- ✅ **Last Session Date** - Most recent visit

#### **7 Days Analytics** (Select these):
- ✅ **Browsed Quantity** - Products viewed in last week
- ✅ **Browsed Value** - Total browsed value
- ✅ **Last Browsed Date** - Last browse date
- ✅ **Carted Quantity** - Items added to cart
- ✅ **Carted Value** - Total cart value
- ✅ **Number of Sessions** - Sessions in last 7 days
- ✅ **Last Session Date** - Most recent session

#### **30 Days Analytics** (Select these):
- ✅ **Browsed Quantity** - Monthly browse activity
- ✅ **Browsed Value** - Monthly browsed value
- ✅ **Last Browsed Date** - Last browse within 30 days
- ✅ **Carted Quantity** - Cart activity
- ✅ **Carted Value** - Cart value
- ✅ **Number of Sessions** - Monthly session count
- ✅ **Last Session Date** - Last visit date

#### **90 Days Analytics** (Select these - Optional):
- ✅ **Browsed Quantity** - Quarterly activity
- ✅ **Browsed Value** - Quarterly value
- ✅ **Last Browsed Date** - Last browse date
- ✅ **Purchased Quantity** - To exclude purchasers (should be 0)
- ✅ **Purchased Value** - To exclude purchasers (should be 0)
- ✅ **Number of Sessions** - Quarterly sessions

### Step 3: Device Type Analytics (Optional but Recommended)

Select device type limitations if you want device-specific experiences:
- ✅ **Mobile** - Track mobile users
- ✅ **Tablet** - Track tablet users
- ✅ **PC** - Track desktop users

### Step 4: Save Analytics Configuration

1. Review all selected fields
2. Click **"Save"** or **"Apply"**
3. Wait for analytics to start collecting data (may take 24-48 hours)

---

## 2. Segment Creation

### Step 1: Create New Segment

1. Navigate to **"Segments"** or **"Audiences"** in Fresh Relevance
2. Click **"Create New Segment"**
3. Name: **"New Customers - Browsed Not Purchased"**

### Step 2: Define Segment Rules

#### Rule 1: No Purchase History
```
Condition: Purchased Quantity (90 Days) = 0
AND
Condition: Purchased Value (90 Days) = 0
```

#### Rule 2: Has Browsed Products
```
Condition: Browsed Quantity (7 Days) >= 1
OR
Condition: Browsed Quantity (30 Days) >= 1
```

#### Rule 3: Recent Activity (Choose one time frame)

**Option A: Active in Last 7 Days**
```
Condition: Last Browsed Date (7 Days) <= 7 days ago
AND
Condition: Last Session Date (7 Days) <= 7 days ago
```

**Option B: Active in Last 30 Days**
```
Condition: Last Browsed Date (30 Days) <= 30 days ago
AND
Condition: Last Session Date (30 Days) <= 30 days ago
```

**Option C: Active in Last 24 Hours (High Intent)**
```
Condition: Last Browsed Date (24 Hours) <= 24 hours ago
AND
Condition: Number of Sessions (24 Hours) >= 1
```

### Step 3: Additional Segment Filters (Optional)

#### Filter by Engagement Level:
```
High Engagement:
- Number of Sessions (7 Days) >= 3
- Browsed Quantity (7 Days) >= 5

Medium Engagement:
- Number of Sessions (7 Days) >= 2
- Browsed Quantity (7 Days) >= 2

Low Engagement:
- Number of Sessions (7 Days) >= 1
- Browsed Quantity (7 Days) >= 1
```

#### Filter by Cart Activity:
```
Has Carted Items:
- Carted Quantity (7 Days) >= 1
- Carted Value (7 Days) > 0

No Cart Activity:
- Carted Quantity (7 Days) = 0
```

#### Filter by Device Type:
```
Mobile Users:
- Device Type = Mobile

Desktop Users:
- Device Type = PC
```

### Step 4: Save Segment

1. Review all conditions
2. Click **"Save Segment"**
3. Note the segment ID for use in experiences

---

## 3. Trigger Setup

### Step 1: Create New Experience

1. Navigate to **"Experiences"** or **"Campaigns"**
2. Click **"Create New Experience"**
3. Name: **"New Customer Welcome - Browsed Not Purchased"**

### Step 2: Configure Triggers

#### Trigger 1: Homepage Entry (Primary)

**Trigger Type:** Page View
**Trigger Conditions:**
- Page URL contains: `/` (homepage)
- OR Page URL equals: `https://www.yougarden.com/`
- Segment: **"New Customers - Browsed Not Purchased"**
- Frequency: Once per session
- Delay: 2 seconds after page load

**Settings:**
- ✅ Show on first page view
- ✅ Respect user preferences
- ❌ Don't show if dismissed

#### Trigger 2: Product Page View (Secondary)

**Trigger Type:** Page View
**Trigger Conditions:**
- Page URL contains: `/product/` or `/products/`
- Segment: **"New Customers - Browsed Not Purchased"**
- Frequency: Once per session
- Delay: 3 seconds after page load

#### Trigger 3: Category Page View (Tertiary)

**Trigger Type:** Page View
**Trigger Conditions:**
- Page URL contains: `/category/` or `/categories/`
- Segment: **"New Customers - Browsed Not Purchased"**
- Frequency: Once per session
- Delay: 2 seconds after page load

#### Trigger 4: Exit Intent (High Priority)

**Trigger Type:** Exit Intent
**Trigger Conditions:**
- Mouse movement toward browser edge
- Segment: **"New Customers - Browsed Not Purchased"**
- Frequency: Once per session
- Minimum time on site: 30 seconds

**Settings:**
- ✅ Show exit intent popup
- ✅ Include discount offer
- ❌ Don't show if already converted

#### Trigger 5: Cart Page (If Has Cart Items)

**Trigger Type:** Page View
**Trigger Conditions:**
- Page URL contains: `/cart/` or `/basket/`
- Segment: **"New Customers - Browsed Not Purchased"**
- Additional: Carted Quantity (7 Days) >= 1
- Frequency: Every page view
- Delay: 1 second after page load

### Step 3: Trigger Priority Order

Set trigger priority (highest to lowest):
1. **Exit Intent** (highest priority)
2. **Cart Page** (if has items)
3. **Homepage Entry**
4. **Product Page View**
5. **Category Page View**

### Step 4: Frequency Rules

**Per User:**
- Maximum 1 experience per session
- Maximum 3 experiences per day
- Maximum 10 experiences per week

**Cooldown Period:**
- 24 hours between same experience
- 1 hour between different experiences

---

## 4. Content Configuration

### Step 1: Homepage Banner Content

#### Variant A: Welcome Message
**Headline:** "Welcome Back! We've Got Products You'll Love"
**Subheadline:** "Free Delivery on Orders Over £49.99 | Trusted by 11,000+ Gardeners"
**CTA Button:** "Shop Now"
**CTA Link:** `/products/` or `/categories/`
**Background Color:** Brand green (#537550)
**Text Color:** White
**Dismissible:** Yes (with cookie)

#### Variant B: Personalized Recommendations
**Headline:** "Based on Your Browsing: [Dynamic Product Category]"
**Subheadline:** "Discover products similar to what you viewed"
**CTA Button:** "View Recommendations"
**CTA Link:** Dynamic based on browsing history
**Show:** 3-5 recommended products

#### Variant C: Discount Offer
**Headline:** "New Customer? Get 10% Off Your First Order"
**Subheadline:** "Use Code: WELCOME10 at Checkout"
**CTA Button:** "Shop Now & Save"
**CTA Link:** `/products/`
**Discount Code:** WELCOME10
**Valid For:** 7 days

### Step 2: Exit Intent Popup Content

**Headline:** "Wait! Don't Miss Out"
**Body Text:** "Complete your order and save 10% on your first purchase"
**Discount Code:** WELCOME10
**CTA Button:** "Claim My Discount"
**CTA Link:** `/cart/` or last browsed product
**Show Cart Items:** Yes (if available)
**Background:** Semi-transparent overlay
**Popup Size:** 500x400px (desktop), full-width (mobile)

### Step 3: Product Page Content

**Banner Message:** "New to YouGarden? This product is perfect for beginners!"
**Show:** Below product title
**Include:** Trust badges, reviews count, free delivery message
**CTA:** "Add to Cart" (enhanced)

### Step 4: Dynamic Content Personalization

#### Show Recently Browsed Products:
```
IF Browsed Quantity (7 Days) > 0 THEN
  Show: "You Recently Viewed: [Product Names]"
  Link: To last browsed products
END
```

#### Show Similar Products:
```
IF Last Browsed Category exists THEN
  Show: "More [Category] Products You'll Love"
  Products: From same category as last browsed
END
```

#### Show Cart Reminder (if has carted items):
```
IF Carted Quantity (7 Days) > 0 THEN
  Show: "You have [X] items in your cart - Complete your order!"
  Link: To cart page
END
```

### Step 5: Mobile-Specific Content

**Optimizations:**
- Simplified messaging (shorter text)
- Larger touch targets (44x44px minimum)
- Thumb-friendly placement
- Quick-loading, lightweight
- Full-width banners on mobile

---

## 5. Optimization Settings

### Step 1: A/B Testing Setup

#### Test 1: Message Variants
**Variant A:** "Welcome Back! We've Got Products You'll Love"
**Variant B:** "New Customer? Get 10% Off Your First Order"
**Split:** 50/50
**Metric:** Click-through rate, conversion rate
**Duration:** 2 weeks

#### Test 2: CTA Button Text
**Variant A:** "Shop Now"
**Variant B:** "Discover Products"
**Variant C:** "Get Started"
**Split:** 33/33/34
**Metric:** Click-through rate
**Duration:** 2 weeks

#### Test 3: Discount Amount
**Variant A:** 10% off (Code: WELCOME10)
**Variant B:** 15% off (Code: WELCOME15)
**Variant C:** Free delivery only
**Split:** 33/33/34
**Metric:** Conversion rate, average order value
**Duration:** 3 weeks

### Step 2: Personalization Rules

#### Rule 1: High Engagement Users
```
IF Number of Sessions (7 Days) >= 3 
AND Browsed Quantity (7 Days) >= 5 THEN
  Show: "You're clearly interested! Here are our best sellers"
  Offer: 15% off (higher discount)
END
```

#### Rule 2: Cart Abandoners
```
IF Carted Quantity (7 Days) >= 1 
AND Carted Value (7 Days) > 0 THEN
  Show: "Complete your order and save 10%"
  Link: Direct to cart
  Urgency: "Limited time offer"
END
```

#### Rule 3: Category-Specific
```
IF Last Browsed Category = "Flowering Plants" THEN
  Show: "Flowering Plant Enthusiast? Discover Our Premium Collection"
  Products: Show flowering plant products
END
```

#### Rule 4: Time-Based
```
IF Last Session Date (24 Hours) <= 24 hours ago THEN
  Show: "You were just here! Check out what's new"
  Urgency: "Fresh stock just arrived"
END

IF Last Session Date (7 Days) > 3 days ago THEN
  Show: "We missed you! Here's 10% off to welcome you back"
  Offer: Re-engagement discount
END
```

### Step 3: Exclusion Rules

**Don't Show Experience If:**
- User has already purchased (Purchased Quantity > 0)
- User has dismissed the experience (check cookie)
- User is on checkout page
- User is logged in as admin/staff
- User is a bot (if detectable)
- Experience shown 3+ times today (frequency cap)

### Step 4: Performance Optimization

**Settings:**
- ✅ Lazy load content
- ✅ Cache segment data
- ✅ Minimize JavaScript
- ✅ Optimize images
- ✅ Use CDN for assets
- ✅ Async loading where possible

---

## 6. Testing & Validation

### Step 1: Test Mode Setup

1. Enable **"Test Mode"** in Fresh Relevance
2. Add test email addresses or user IDs
3. Configure test segment with your test users
4. Preview experience in test environment

### Step 2: Validation Checklist

#### Segment Validation:
- [ ] Segment correctly identifies users with no purchases
- [ ] Segment correctly identifies users who browsed
- [ ] Segment respects time window (7/30 days)
- [ ] Segment excludes purchasers
- [ ] Segment updates in real-time

#### Trigger Validation:
- [ ] Homepage trigger fires correctly
- [ ] Product page trigger fires correctly
- [ ] Exit intent trigger fires correctly
- [ ] Frequency limits work (once per session)
- [ ] Cooldown periods work

#### Content Validation:
- [ ] Messages display correctly
- [ ] CTAs link to correct pages
- [ ] Discount codes work
- [ ] Dynamic content personalizes
- [ ] Mobile version displays correctly

#### Analytics Validation:
- [ ] Analytics fields populate correctly
- [ ] Browsed quantity tracks accurately
- [ ] Session data is correct
- [ ] Date fields are accurate
- [ ] Device type detection works

### Step 3: Live Testing

1. **Soft Launch:**
   - Enable for 10% of traffic
   - Monitor for 48 hours
   - Check for errors/issues

2. **Gradual Rollout:**
   - Increase to 25% of traffic
   - Monitor for 24 hours
   - Increase to 50% of traffic
   - Monitor for 24 hours
   - Full rollout to 100%

3. **Monitoring:**
   - Check Fresh Relevance dashboard daily
   - Monitor conversion rates
   - Track click-through rates
   - Watch for technical issues
   - Review user feedback

### Step 4: Success Metrics

**Track These KPIs:**
- **Impression Rate:** % of segment who see experience
- **Click-Through Rate:** % who click CTA
- **Conversion Rate:** % who make purchase
- **Average Order Value:** AOV of converted users
- **Discount Code Usage:** % using WELCOME10
- **Cart Recovery Rate:** % who return to cart
- **Time to Convert:** Days from first browse to purchase

**Target Metrics:**
- Click-through rate: >5%
- Conversion rate: >2%
- Average order value: Maintain or increase
- Cart recovery: >15%

---

## 7. Advanced Configuration

### Step 1: Multi-Step Experience

**Step 1: Homepage Banner (Day 1)**
- Welcome message
- No discount (build interest)

**Step 2: Exit Intent (Day 1)**
- 5% discount offer
- If not converted

**Step 3: Email Follow-up (Day 2)**
- 10% discount
- Personalized recommendations

**Step 4: Retargeting (Day 3-7)**
- 15% discount (final offer)
- Urgency messaging

### Step 2: Behavioral Triggers

#### Browse Depth Trigger:
```
IF Browsed Quantity (Session) >= 5 THEN
  Show: "You're clearly interested! Get 10% off now"
  Urgency: "Limited stock on items you viewed"
END
```

#### Time on Site Trigger:
```
IF Time on Site >= 3 minutes THEN
  Show: "Take your time! Here's 10% off when you're ready"
  Offer: Persistent banner
END
```

#### Scroll Depth Trigger:
```
IF Scroll Depth >= 75% THEN
  Show: "You're almost done browsing! Complete your order"
  CTA: "View Cart" or "Checkout"
END
```

### Step 3: Integration with Email Marketing

**Sync Segment to ESP:**
1. Export segment from Fresh Relevance
2. Import to email platform (Mailchimp, Klaviyo, etc.)
3. Set up automated email campaigns:
   - Day 1: Welcome email
   - Day 3: Product recommendations
   - Day 7: Discount offer
   - Day 14: Final chance offer

---

## 8. Maintenance & Optimization

### Weekly Tasks:
- [ ] Review performance metrics
- [ ] Check for technical issues
- [ ] Monitor conversion rates
- [ ] Review A/B test results

### Monthly Tasks:
- [ ] Analyze segment performance
- [ ] Optimize underperforming variants
- [ ] Update content/messaging
- [ ] Review and update rules
- [ ] Check analytics accuracy

### Quarterly Tasks:
- [ ] Comprehensive performance review
- [ ] Update personalization strategy
- [ ] Refresh content and offers
- [ ] Review and optimize all rules
- [ ] Plan new test variants

---

## 9. Troubleshooting

### Common Issues:

#### Issue 1: Segment Not Populating
**Solution:**
- Check analytics configuration
- Verify data collection (wait 24-48 hours)
- Review segment rules for errors
- Check date ranges

#### Issue 2: Experience Not Showing
**Solution:**
- Verify trigger conditions
- Check frequency limits
- Review exclusion rules
- Test in preview mode
- Check browser console for errors

#### Issue 3: Analytics Not Updating
**Solution:**
- Verify tracking code is installed
- Check data collection settings
- Review API connections
- Contact Fresh Relevance support

#### Issue 4: High Bounce Rate
**Solution:**
- Review message relevance
- Test different messaging
- Check timing (may be too early)
- Optimize for mobile
- Reduce frequency

---

## 10. Quick Reference Checklist

### Initial Setup:
- [ ] Configure analytics fields (24hr, 7d, 30d)
- [ ] Create segment "New Customers - Browsed Not Purchased"
- [ ] Set segment rules (no purchase + browsed + time window)
- [ ] Create experience "New Customer Welcome"
- [ ] Configure triggers (homepage, exit intent, product pages)
- [ ] Set up content variants
- [ ] Configure A/B tests
- [ ] Set frequency limits
- [ ] Enable test mode
- [ ] Validate in preview
- [ ] Soft launch (10% traffic)
- [ ] Monitor and optimize
- [ ] Full rollout

### Analytics Fields Selected:
- [x] 24 Hours: Browsed Quantity, Browsed Value, Last Browsed Date, Number of Sessions, Last Session Date
- [x] 7 Days: Browsed Quantity, Browsed Value, Last Browsed Date, Carted Quantity, Carted Value, Number of Sessions, Last Session Date
- [x] 30 Days: Browsed Quantity, Browsed Value, Last Browsed Date, Carted Quantity, Carted Value, Number of Sessions, Last Session Date
- [x] 90 Days: Browsed Quantity, Purchased Quantity (to exclude), Purchased Value (to exclude)

---

## 11. Example Configuration Summary

### Segment Configuration:
```
Name: "New Customers - Browsed Not Purchased (7 Days)"
Rules:
  - Purchased Quantity (90 Days) = 0
  - Purchased Value (90 Days) = 0
  - Browsed Quantity (7 Days) >= 1
  - Last Browsed Date (7 Days) <= 7 days ago
  - Last Session Date (7 Days) <= 7 days ago
```

### Experience Configuration:
```
Name: "New Customer Welcome - 7 Day Window"
Triggers:
  1. Homepage entry (2s delay, once per session)
  2. Exit intent (30s minimum, once per session)
  3. Product page (3s delay, once per session)
Content:
  - Variant A: "Welcome Back! We've Got Products You'll Love"
  - Variant B: "New Customer? Get 10% Off - Code: WELCOME10"
Frequency:
  - Max 1 per session
  - Max 3 per day
  - 24h cooldown
```

---

**Document Version:** 1.0  
**Last Updated:** December 5, 2025  
**Platform:** Fresh Relevance

---

*This guide provides step-by-step instructions for configuring Fresh Relevance experiences for new customers who have browsed but not purchased. Adjust time windows and rules based on your specific business needs and performance data.*


