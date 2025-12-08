# Fresh Relevance Workflow & Implementation Guide
## GardeningDirect.co.uk - Complete Experience Tree

**Platform:** Fresh Relevance by dotdigital  
**Site:** GardeningDirect.co.uk  
**Date:** December 5, 2025

---

## Table of Contents

1. [Experience Hierarchy Overview](#experience-hierarchy-overview)
2. [Segment Definitions](#segment-definitions)
3. [Experience Workflows](#experience-workflows)
4. [Smart Blocks & Slots](#smart-blocks--slots)
5. [Content Types](#content-types)
6. [Implementation Priority](#implementation-priority)
7. [First Solution: Cart Abandonment](#first-solution-cart-abandonment)
8. [Integration Steps](#integration-steps)

---

## Experience Hierarchy Overview

```
Fresh Relevance Structure:
├── Experiences (Top Level)
│   ├── Cart Abandonment Experience
│   ├── New Customer Experience
│   ├── Returning Customer Experience
│   ├── First-Time Visitor Experience
│   └── Frequent Buyer Experience
│
├── Smart Blocks (Reusable Components)
│   ├── Product Recommendations Block
│   ├── Trust Signals Block
│   ├── Discount Offer Block
│   ├── Social Proof Block
│   └── Urgency Block
│
└── Slots (Content Placement)
    ├── Header Slot
    ├── Homepage Hero Slot
    ├── Product Page Slot
    ├── Cart Page Slot
    └── Exit Intent Slot
```

---

## Segment Definitions

### 1. New Customers
**Definition:** Users who have browsed products but never purchased
**Criteria:**
- Purchased Quantity (90 Days) = 0
- Browsed Quantity (7 Days) >= 1
- Last Session Date (7 Days) <= 7 days ago

### 2. Cart Abandonment
**Definition:** Users who added items to cart but didn't complete purchase
**Criteria:**
- Carted Quantity (Current Session) >= 1
- Carted Value (Current Session) > 0
- No purchase in last 2 hours
- Last Cart Activity <= 1 hour ago

### 3. Returning Customers
**Definition:** Users who have purchased before and are back browsing
**Criteria:**
- Purchased Quantity (90 Days) >= 1
- Last Session Date (30 Days) <= 30 days ago
- Browsed Quantity (7 Days) >= 1

### 4. First-Time Visitors
**Definition:** Users visiting the site for the first time
**Criteria:**
- Number of Sessions (All Time) = 1
- Session Duration >= 10 seconds
- No purchase history

### 5. Frequent Buyers
**Definition:** High-value customers with multiple purchases
**Criteria:**
- Purchased Quantity (90 Days) >= 3
- Purchased Value (90 Days) >= £100
- Last Purchase Date (90 Days) <= 90 days ago

---

## Experience Workflows

### Experience 1: Cart Abandonment Experience

#### Workflow Tree:
```
Cart Abandonment Experience
│
├── Trigger 1: Cart Page View
│   ├── Condition: Carted Quantity >= 1
│   ├── Slot: Cart Page Banner Slot
│   ├── Smart Block: Urgency Block
│   └── Content: "Complete your order in 15 minutes for free delivery"
│
├── Trigger 2: Exit Intent (Cart Active)
│   ├── Condition: Mouse movement to browser edge
│   ├── Slot: Exit Intent Modal Slot
│   ├── Smart Block: Discount Offer Block
│   └── Content: "Don't miss out! Save 10% - Code: SAVE10"
│
├── Trigger 3: Product Page (After Cart Add)
│   ├── Condition: Carted Quantity >= 1
│   ├── Slot: Product Page Sticky Banner Slot
│   ├── Smart Block: Cart Reminder Block
│   └── Content: "You have X items in your cart - Complete your order"
│
└── Trigger 4: Homepage (Cart Active)
    ├── Condition: Carted Quantity >= 1
    ├── Slot: Homepage Sticky Header Slot
    ├── Smart Block: Cart Summary Block
    └── Content: "Your cart is waiting - Complete your order now"
```

#### Smart Blocks Used:
1. **Urgency Block** - Time-sensitive messaging
2. **Discount Offer Block** - 10% discount code
3. **Cart Reminder Block** - Cart summary with CTA
4. **Cart Summary Block** - Mini cart display

#### Content Types:
- **Banner:** Sticky top banner with countdown timer
- **Modal:** Exit intent popup with discount
- **Sticky Bar:** Persistent cart reminder
- **Email:** Automated cart abandonment sequence

---

### Experience 2: New Customer Experience

#### Workflow Tree:
```
New Customer Experience
│
├── Trigger 1: Homepage Entry
│   ├── Condition: First visit OR No purchase history
│   ├── Slot: Homepage Hero Slot
│   ├── Smart Block: Welcome Block + Trust Signals Block
│   └── Content: "Welcome! Free Delivery Over £49.99 | 11,000+ 5* Reviews"
│
├── Trigger 2: Product Page View
│   ├── Condition: Browsed Quantity (7 Days) >= 1, No purchase
│   ├── Slot: Product Page Recommendation Slot
│   ├── Smart Block: Product Recommendations Block
│   └── Content: "Based on your browsing: [Recommended Products]"
│
├── Trigger 3: Category Page View
│   ├── Condition: Browsed Quantity (7 Days) >= 1, No purchase
│   ├── Slot: Category Page Banner Slot
│   ├── Smart Block: Social Proof Block
│   └── Content: "Popular with new customers: [Best Sellers]"
│
└── Trigger 4: Exit Intent (No Purchase)
    ├── Condition: Mouse movement to browser edge
    ├── Slot: Exit Intent Modal Slot
    ├── Smart Block: Discount Offer Block
    └── Content: "New Customer? Get 10% Off - Code: WELCOME10"
```

#### Smart Blocks Used:
1. **Welcome Block** - Personalized greeting
2. **Trust Signals Block** - Reviews, guarantees, badges
3. **Product Recommendations Block** - Based on browsing
4. **Social Proof Block** - "Others also bought"
5. **Discount Offer Block** - First-time customer discount

#### Content Types:
- **Hero Banner:** Welcome message with trust signals
- **Product Recommendations:** Dynamic product carousel
- **Category Banner:** Best sellers for new customers
- **Exit Intent Modal:** Discount offer popup

---

### Experience 3: Returning Customer Experience

#### Workflow Tree:
```
Returning Customer Experience
│
├── Trigger 1: Homepage Entry
│   ├── Condition: Purchase history exists, Last visit > 7 days ago
│   ├── Slot: Homepage Personalized Banner Slot
│   ├── Smart Block: Personalized Greeting Block + Product Recommendations Block
│   └── Content: "Welcome Back, [Name]! Check out what's new"
│
├── Trigger 2: Product Page (Category Match)
│   ├── Condition: Product category matches previous purchases
│   ├── Slot: Product Page Cross-Sell Slot
│   ├── Smart Block: Frequently Bought Together Block
│   └── Content: "Customers who bought [Previous Product] also bought:"
│
├── Trigger 3: Category Page (Previous Interest)
│   ├── Condition: Category matches previous browsing
│   ├── Slot: Category Page Recommendation Slot
│   ├── Smart Block: Product Recommendations Block
│   └── Content: "You might also like: [Similar Products]"
│
└── Trigger 4: Re-engagement (30+ Days)
    ├── Condition: Last visit > 30 days ago
    ├── Slot: Homepage Re-engagement Banner Slot
    ├── Smart Block: Discount Offer Block + Product Recommendations Block
    └── Content: "We missed you! Here's 15% off - Code: COMEBACK15"
```

#### Smart Blocks Used:
1. **Personalized Greeting Block** - Name + purchase history
2. **Product Recommendations Block** - Based on purchase history
3. **Frequently Bought Together Block** - Cross-sell products
4. **Discount Offer Block** - Re-engagement discount

#### Content Types:
- **Personalized Banner:** Welcome back with name
- **Cross-Sell Widget:** "Frequently bought together"
- **Recommendation Carousel:** Similar to previous purchases
- **Re-engagement Banner:** Discount for inactive customers

---

### Experience 4: First-Time Visitor Experience

#### Workflow Tree:
```
First-Time Visitor Experience
│
├── Trigger 1: Homepage Entry
│   ├── Condition: Session count = 1
│   ├── Slot: Homepage Hero Slot
│   ├── Smart Block: Value Proposition Block + Trust Signals Block
│   └── Content: "Welcome to Gardening Direct! Free Delivery Over £49.99"
│
├── Trigger 2: Product Page View
│   ├── Condition: First session, viewing product
│   ├── Slot: Product Page Trust Slot
│   ├── Smart Block: Trust Signals Block + Social Proof Block
│   └── Content: "Trusted by 11,000+ gardeners | Double Satisfaction Guarantee"
│
├── Trigger 3: Category Page View
│   ├── Condition: First session, browsing categories
│   ├── Slot: Category Page Guide Slot
│   ├── Smart Block: Category Guide Block
│   └── Content: "New to gardening? Start here: [Beginner-Friendly Products]"
│
└── Trigger 4: Exit Intent
    ├── Condition: First session, no purchase
    ├── Slot: Exit Intent Modal Slot
    ├── Smart Block: Discount Offer Block + Newsletter Signup Block
    └── Content: "Wait! Get 10% Off Your First Order - Code: WELCOME10"
```

#### Smart Blocks Used:
1. **Value Proposition Block** - Key benefits and offers
2. **Trust Signals Block** - Reviews, guarantees, badges
3. **Social Proof Block** - Customer testimonials
4. **Category Guide Block** - Beginner-friendly recommendations
5. **Discount Offer Block** - First-order discount
6. **Newsletter Signup Block** - Email capture

#### Content Types:
- **Hero Banner:** Welcome with value proposition
- **Trust Badge:** Prominent trust signals
- **Category Guide:** Beginner-friendly product suggestions
- **Exit Intent Modal:** Discount + newsletter signup

---

### Experience 5: Frequent Buyer Experience

#### Workflow Tree:
```
Frequent Buyer Experience
│
├── Trigger 1: Homepage Entry
│   ├── Condition: Purchase count >= 3, Last purchase <= 90 days
│   ├── Slot: Homepage VIP Banner Slot
│   ├── Smart Block: VIP Status Block + Exclusive Offers Block
│   └── Content: "VIP Member: Exclusive Early Access | Free Priority Delivery"
│
├── Trigger 2: Product Page (Premium Products)
│   ├── Condition: VIP status, viewing premium products
│   ├── Slot: Product Page VIP Badge Slot
│   ├── Smart Block: VIP Discount Block
│   └── Content: "VIP Exclusive: 15% Off - Code: VIP15"
│
├── Trigger 3: Category Page
│   ├── Condition: VIP status, browsing categories
│   ├── Slot: Category Page Early Access Slot
│   ├── Smart Block: New Products Block
│   └── Content: "VIP Early Access: New [Category] Products"
│
├── Trigger 4: Cart Page
│   ├── Condition: VIP status, items in cart
│   ├── Slot: Cart Page VIP Benefits Slot
│   ├── Smart Block: VIP Benefits Block
│   └── Content: "VIP Benefits: Free Priority Delivery | 15% Off Everything"
│
└── Trigger 5: Checkout Page
    ├── Condition: VIP status, at checkout
    ├── Slot: Checkout VIP Reminder Slot
    ├── Smart Block: VIP Discount Code Block
    └── Content: "VIP Discount Applied: 15% Off - Code: VIP15"
```

#### Smart Blocks Used:
1. **VIP Status Block** - VIP badge and benefits
2. **Exclusive Offers Block** - VIP-only discounts
3. **VIP Discount Block** - Automatic discount application
4. **New Products Block** - Early access to new items
5. **VIP Benefits Block** - List of VIP perks

#### Content Types:
- **VIP Banner:** Exclusive member messaging
- **VIP Badge:** Status indicator on products
- **Early Access Banner:** New product previews
- **VIP Benefits Panel:** List of member benefits
- **Discount Reminder:** Checkout discount code

---

## Smart Blocks & Slots

### Smart Blocks (Reusable Components)

#### 1. Product Recommendations Block
**Purpose:** Show personalized product suggestions
**Data Sources:**
- Browsing history
- Purchase history
- Category preferences
- Similar products algorithm

**Content Elements:**
- Product image
- Product name
- Price
- Rating/reviews
- "Add to Cart" button
- "Quick View" option

**Variants:**
- "Based on your browsing"
- "Frequently bought together"
- "You may also like"
- "Complete the set"

---

#### 2. Trust Signals Block
**Purpose:** Build trust and credibility
**Content Elements:**
- "11,000+ Trusted 5* Reviews"
- "Double Satisfaction Guarantee"
- "Free Delivery Over £49.99"
- Trust badges (SSL, secure payment)
- Customer testimonials

**Variants:**
- Full trust panel
- Compact trust bar
- Inline trust badges
- Social proof counter

---

#### 3. Discount Offer Block
**Purpose:** Present discount codes and offers
**Content Elements:**
- Discount percentage/amount
- Discount code
- Valid until date
- Terms and conditions
- CTA button

**Variants:**
- Percentage discount (10%, 15%, 20%)
- Fixed amount discount (£5, £10)
- Free delivery offer
- Bundle discount

---

#### 4. Social Proof Block
**Purpose:** Show social validation
**Content Elements:**
- "X people viewing this"
- "Y sold in last 24 hours"
- "Z people have this in cart"
- Recent purchases ticker
- Customer photos

**Variants:**
- Live activity feed
- Purchase notifications
- View counter
- Stock level indicator

---

#### 5. Urgency Block
**Purpose:** Create urgency and scarcity
**Content Elements:**
- Countdown timer
- "Limited stock" message
- "Ending soon" indicator
- "Only X left" warning
- Time-sensitive offers

**Variants:**
- Cart abandonment timer (15 min)
- Sale countdown
- Stock level urgency
- Flash sale timer

---

#### 6. Cart Reminder Block
**Purpose:** Remind users of cart contents
**Content Elements:**
- Cart item count
- Cart total value
- Product thumbnails
- "View Cart" button
- "Checkout" button

**Variants:**
- Mini cart dropdown
- Sticky cart bar
- Cart summary panel
- Cart notification

---

#### 7. Personalized Greeting Block
**Purpose:** Personalize experience with user data
**Content Elements:**
- User name (if available)
- Personalized message
- Purchase history reference
- Recommended actions

**Variants:**
- Name-based greeting
- Purchase-based greeting
- Behavior-based greeting
- Seasonal greeting

---

#### 8. VIP Status Block
**Purpose:** Recognize and reward VIP customers
**Content Elements:**
- VIP badge/icon
- VIP status message
- Exclusive benefits list
- VIP discount code
- Early access notice

**Variants:**
- VIP banner
- VIP badge
- VIP benefits panel
- VIP exclusive section

---

### Slots (Content Placement Areas)

#### 1. Header Slot
**Location:** Top of page, below main navigation
**Use Cases:**
- Trust signals
- Promotional banners
- Cart reminders
- Discount codes

**Dimensions:**
- Desktop: Full width, 50-60px height
- Mobile: Full width, 80-100px height

---

#### 2. Homepage Hero Slot
**Location:** Above the fold, main hero area
**Use Cases:**
- Welcome messages
- Value propositions
- Featured offers
- Personalized recommendations

**Dimensions:**
- Desktop: Full width, 300-400px height
- Mobile: Full width, 250-300px height

---

#### 3. Product Page Slot
**Location:** Product page, below product title
**Use Cases:**
- Product recommendations
- Trust signals
- Social proof
- Cross-sell products

**Dimensions:**
- Desktop: Full width, flexible height
- Mobile: Full width, flexible height

---

#### 4. Cart Page Slot
**Location:** Cart page, above or below cart items
**Use Cases:**
- Cart abandonment messages
- Discount offers
- Trust signals
- Related products

**Dimensions:**
- Desktop: Full width, 100-150px height
- Mobile: Full width, 120-180px height

---

#### 5. Exit Intent Slot
**Location:** Modal overlay, center of screen
**Use Cases:**
- Exit intent popups
- Discount offers
- Newsletter signup
- Final conversion attempt

**Dimensions:**
- Desktop: 500x400px modal
- Mobile: Full screen overlay

---

#### 6. Sticky Header Slot
**Location:** Fixed position, top of viewport
**Use Cases:**
- Persistent cart reminder
- Countdown timers
- Urgency messages
- Discount codes

**Dimensions:**
- Desktop: Full width, 40-50px height
- Mobile: Full width, 60-70px height

---

## Content Types

### Content Type 1: Banner Messages

#### Cart Abandonment Banner:
```
Headline: "Complete your order in the next 15 minutes for free delivery!"
Subheadline: "You have [X] items in your cart worth £[Amount]"
CTA: "Complete Order Now"
Timer: 15-minute countdown
```

#### New Customer Banner:
```
Headline: "Welcome! Free Delivery on Orders Over £49.99"
Subheadline: "Trusted by 11,000+ Gardeners | Double Satisfaction Guarantee"
CTA: "Shop Now"
Trust Badges: Reviews, Guarantee, Free Delivery
```

#### Returning Customer Banner:
```
Headline: "Welcome Back, [Name]!"
Subheadline: "Check out our latest additions and exclusive offers"
CTA: "View New Products"
Personalization: Based on purchase history
```

#### VIP Customer Banner:
```
Headline: "VIP Member: Exclusive Early Access"
Subheadline: "Free Priority Delivery | 15% Off Everything - Code: VIP15"
CTA: "Shop VIP Collection"
Benefits: List of VIP perks
```

---

### Content Type 2: Exit Intent Modals

#### Cart Abandonment Modal:
```
Headline: "Wait! Don't Miss Out"
Body: "Complete your order and save 10% on your purchase"
Discount Code: "SAVE10"
CTA: "Complete My Order"
Show: Cart contents summary
Timer: 2-hour validity
```

#### First-Time Visitor Modal:
```
Headline: "New Customer? Get 10% Off Your First Order"
Body: "Use code WELCOME10 at checkout. Valid for 7 days."
Discount Code: "WELCOME10"
CTA: "Shop Now"
Newsletter: Optional signup checkbox
```

#### Returning Customer Modal:
```
Headline: "We Missed You! Here's 15% Off"
Body: "Welcome back! Use code COMEBACK15 for 15% off your order"
Discount Code: "COMEBACK15"
CTA: "Shop Now"
Personalization: Show recommended products
```

---

### Content Type 3: Product Recommendations

#### Based on Browsing:
```
Title: "Based on Your Browsing"
Products: 4-6 products from viewed categories
Layout: Horizontal carousel
CTA: "Add to Cart" on each product
```

#### Frequently Bought Together:
```
Title: "Frequently Bought Together"
Products: 2-3 complementary products
Layout: Side-by-side or stacked
Bundle Option: "Buy Together and Save"
```

#### Similar Products:
```
Title: "You May Also Like"
Products: 4-6 similar products
Layout: Grid or carousel
Filter: Same category, similar price range
```

---

### Content Type 4: Trust Signals

#### Trust Bar:
```
Elements:
- "11,000+ Trusted 5* Reviews"
- "Double Satisfaction Guarantee"
- "Free Delivery Over £49.99"
- Secure payment badges
Layout: Horizontal bar, compact
```

#### Trust Panel:
```
Elements:
- Customer review snippets
- Guarantee details
- Delivery information
- Security badges
- Return policy link
Layout: Expandable panel
```

---

## Implementation Priority

### Phase 1: Quick Wins (Week 1-2)
**Priority: CRITICAL**

1. **Cart Abandonment Experience** ⭐ (First Solution)
   - Cart page banner
   - Exit intent modal
   - Email sequence
   - Expected ROI: 15-25% cart recovery

2. **First-Time Visitor Experience**
   - Homepage welcome banner
   - Exit intent discount
   - Expected ROI: 5-10% conversion increase

---

### Phase 2: Core Experiences (Week 3-4)
**Priority: HIGH**

3. **New Customer Experience**
   - Product recommendations
   - Category banners
   - Re-engagement emails
   - Expected ROI: 10-15% conversion increase

4. **Returning Customer Experience**
   - Personalized greetings
   - Cross-sell products
   - Re-engagement offers
   - Expected ROI: 15-20% repeat purchase increase

---

### Phase 3: Advanced Features (Week 5-8)
**Priority: MEDIUM**

5. **Frequent Buyer Experience**
   - VIP status recognition
   - Exclusive offers
   - Early access
   - Expected ROI: 30%+ lifetime value increase

6. **Advanced Personalization**
   - Machine learning recommendations
   - Dynamic content
   - Behavioral triggers
   - Expected ROI: 20-30% overall improvement

---

## First Solution: Cart Abandonment

### Why Start Here?
- **Highest ROI:** 15-25% cart recovery rate
- **Quick Implementation:** Can be set up in 1-2 days
- **Immediate Impact:** Works from day one
- **Clear Metrics:** Easy to measure success

### Complete Cart Abandonment Setup

#### Step 1: Create Segment

**Segment Name:** "Cart Abandoners - Active Cart"

**Rules:**
```
Rule 1: Cart Activity
- Carted Quantity (Current Session) >= 1
- Carted Value (Current Session) > 0

Rule 2: No Recent Purchase
- No purchase in last 2 hours
- Last Cart Activity <= 1 hour ago

Rule 3: Exclusions
- Not on checkout page
- Not completed purchase
```

---

#### Step 2: Create Experience

**Experience Name:** "Cart Abandonment Recovery"

**Triggers:**

**Trigger 1: Cart Page Banner**
- **Type:** Page View
- **Condition:** URL contains `/cart/` or `/basket/`
- **Segment:** "Cart Abandoners - Active Cart"
- **Slot:** Cart Page Banner Slot
- **Delay:** 1 second after page load
- **Frequency:** Every page view

**Trigger 2: Exit Intent Modal**
- **Type:** Exit Intent
- **Condition:** Mouse movement to browser edge
- **Segment:** "Cart Abandoners - Active Cart"
- **Slot:** Exit Intent Modal Slot
- **Frequency:** Once per session
- **Minimum Time:** 30 seconds on site

**Trigger 3: Product Page Reminder**
- **Type:** Page View
- **Condition:** URL contains `/product/`
- **Segment:** "Cart Abandoners - Active Cart"
- **Slot:** Product Page Sticky Banner Slot
- **Delay:** 3 seconds after page load
- **Frequency:** Once per session

**Trigger 4: Homepage Sticky Bar**
- **Type:** Page View
- **Condition:** URL equals homepage
- **Segment:** "Cart Abandoners - Active Cart"
- **Slot:** Sticky Header Slot
- **Delay:** 2 seconds after page load
- **Frequency:** Once per session

---

#### Step 3: Configure Smart Blocks

**Block 1: Urgency Block (Cart Page)**
```
Content:
- Headline: "Complete your order in the next 15 minutes for free delivery!"
- Subheadline: "You have [X] items in your cart worth £[Amount]"
- Timer: 15-minute countdown
- CTA: "Complete Order Now" (links to cart)
- Style: Green background, white text, prominent
```

**Block 2: Discount Offer Block (Exit Intent)**
```
Content:
- Headline: "Wait! Don't Miss Out"
- Body: "Complete your order and save 10% on your purchase"
- Discount Code: "SAVE10" (prominently displayed)
- CTA: "Complete My Order" (links to cart)
- Cart Summary: Show cart items and total
- Timer: "Offer valid for 2 hours"
- Style: Modal overlay, centered, eye-catching
```

**Block 3: Cart Reminder Block (Product Page)**
```
Content:
- Message: "You have [X] items in your cart"
- Cart Total: "Total: £[Amount]"
- CTA: "View Cart" (links to cart)
- Style: Sticky banner, top of page, compact
```

**Block 4: Cart Summary Block (Homepage)**
```
Content:
- Message: "Your cart is waiting - [X] items"
- Cart Value: "£[Amount]"
- CTA: "Complete Order" (links to cart)
- Style: Sticky header bar, always visible
```

---

#### Step 4: Configure Slots

**Slot 1: Cart Page Banner Slot**
- **Location:** Above cart items
- **Dimensions:** Full width, 100px height
- **Style:** Green background, white text
- **Responsive:** Yes, mobile-optimized

**Slot 2: Exit Intent Modal Slot**
- **Location:** Center overlay
- **Dimensions:** 500x400px (desktop), full screen (mobile)
- **Style:** White background, shadow overlay
- **Close Button:** Yes, top-right corner

**Slot 3: Product Page Sticky Banner Slot**
- **Location:** Fixed top of viewport
- **Dimensions:** Full width, 50px height
- **Style:** Semi-transparent, subtle
- **Dismissible:** Yes, with X button

**Slot 4: Sticky Header Slot**
- **Location:** Fixed top of page
- **Dimensions:** Full width, 40px height
- **Style:** Brand colors, compact
- **Always Visible:** Yes, scrolls with page

---

#### Step 5: Email Sequence Setup

**Email 1: Immediate (1 hour after abandonment)**
```
Subject: "You Left Items in Your Cart - Complete Your Order"
Content:
- Personalized greeting
- Cart contents with images
- "Complete your order" CTA
- Link to cart
- No discount (yet)
```

**Email 2: Follow-up (24 hours after)**
```
Subject: "Last Chance: 10% Off Your Cart - Code: SAVE10"
Content:
- Reminder of cart contents
- 10% discount offer
- Discount code: SAVE10
- Urgency: "Valid for 48 hours"
- CTA: "Complete Order & Save"
```

**Email 3: Final (3 days after)**
```
Subject: "We're Holding Your Items - But Not For Long"
Content:
- Final reminder
- Stock availability warning
- 10% discount still available
- Urgency: "Limited stock"
- CTA: "Complete Order Now"
```

---

#### Step 6: Analytics & Tracking

**Metrics to Track:**
- Cart abandonment rate
- Cart recovery rate
- Discount code usage
- Email open/click rates
- Conversion from each trigger
- Average order value

**Goals:**
- 15-25% cart recovery rate
- 5-10% discount code usage
- 20%+ email open rate
- 10%+ email click rate

---

## Integration Steps

### Step 1: Fresh Relevance Account Setup

1. **Log in to Fresh Relevance Dashboard**
   - Navigate to https://app.freshrelevance.com
   - Access your GardeningDirect.co.uk account

2. **Verify Tracking Code Installation**
   - Check that Fresh Relevance tracking code is installed
   - Verify in browser console: `window.FreshRelevance`
   - Test data collection

3. **Configure Analytics Fields**
   - Go to Analytics section
   - Select required fields (see Analytics Config guide)
   - Save configuration

---

### Step 2: Create Segments

1. **Navigate to Segments**
   - Go to "Segments" or "Audiences" section
   - Click "Create New Segment"

2. **Create Cart Abandonment Segment**
   - Name: "Cart Abandoners - Active Cart"
   - Add rules as specified above
   - Save segment

3. **Test Segment**
   - Use test mode
   - Verify segment populates correctly
   - Check segment size

---

### Step 3: Create Smart Blocks

1. **Navigate to Smart Blocks**
   - Go to "Smart Blocks" or "Components" section
   - Click "Create New Block"

2. **Create Urgency Block**
   - Name: "Cart Urgency Block"
   - Type: Banner
   - Add content as specified
   - Configure styling
   - Save block

3. **Create Discount Offer Block**
   - Name: "Cart Discount Block"
   - Type: Modal
   - Add content as specified
   - Configure styling
   - Save block

4. **Repeat for all required blocks**

---

### Step 4: Create Slots

1. **Navigate to Slots**
   - Go to "Slots" or "Placements" section
   - Click "Create New Slot"

2. **Create Cart Page Banner Slot**
   - Name: "Cart Page Banner Slot"
   - Selector: `.cart-page` or `#cart`
   - Position: Above cart items
   - Dimensions: Full width, 100px height
   - Save slot

3. **Create Exit Intent Modal Slot**
   - Name: "Exit Intent Modal Slot"
   - Type: Modal/Overlay
   - Position: Center
   - Dimensions: 500x400px
   - Save slot

4. **Repeat for all required slots**

---

### Step 5: Create Experience

1. **Navigate to Experiences**
   - Go to "Experiences" or "Campaigns" section
   - Click "Create New Experience"

2. **Configure Experience**
   - Name: "Cart Abandonment Recovery"
   - Description: "Recover abandoned carts with urgency and discounts"
   - Status: Active

3. **Add Triggers**
   - Add Trigger 1: Cart Page Banner
   - Add Trigger 2: Exit Intent Modal
   - Add Trigger 3: Product Page Reminder
   - Add Trigger 4: Homepage Sticky Bar

4. **Assign Smart Blocks to Slots**
   - Cart Page Banner Slot → Urgency Block
   - Exit Intent Modal Slot → Discount Offer Block
   - Product Page Sticky Banner Slot → Cart Reminder Block
   - Sticky Header Slot → Cart Summary Block

5. **Configure Frequency Rules**
   - Max 1 experience per session
   - Max 3 experiences per day
   - 24-hour cooldown

6. **Save Experience**

---

### Step 6: Test & Launch

1. **Enable Test Mode**
   - Activate test mode in Fresh Relevance
   - Add test email addresses
   - Test all triggers

2. **Preview Experience**
   - Use preview mode
   - Test on different devices
   - Verify all blocks display correctly

3. **Soft Launch**
   - Enable for 10% of traffic
   - Monitor for 24-48 hours
   - Check for errors

4. **Full Launch**
   - Increase to 100% of traffic
   - Monitor performance
   - Optimize based on data

---

## Quick Implementation Checklist

### Cart Abandonment Experience (First Solution)

- [ ] Configure analytics fields in Fresh Relevance
- [ ] Create "Cart Abandoners - Active Cart" segment
- [ ] Create Urgency Block (cart page)
- [ ] Create Discount Offer Block (exit intent)
- [ ] Create Cart Reminder Block (product page)
- [ ] Create Cart Summary Block (homepage)
- [ ] Create Cart Page Banner Slot
- [ ] Create Exit Intent Modal Slot
- [ ] Create Product Page Sticky Banner Slot
- [ ] Create Sticky Header Slot
- [ ] Create "Cart Abandonment Recovery" experience
- [ ] Configure all 4 triggers
- [ ] Assign blocks to slots
- [ ] Set frequency rules
- [ ] Test in preview mode
- [ ] Soft launch (10% traffic)
- [ ] Monitor performance
- [ ] Full launch (100% traffic)
- [ ] Set up email sequence
- [ ] Track metrics and optimize

---

## Expected Results

### Cart Abandonment Experience:
- **Cart Recovery Rate:** 15-25%
- **Discount Code Usage:** 5-10%
- **Email Open Rate:** 20%+
- **Email Click Rate:** 10%+
- **Conversion Rate:** 2-5% of abandoned carts

### Overall Impact:
- **Revenue Recovery:** £X,XXX per month
- **Conversion Rate Increase:** 2-5%
- **Average Order Value:** Maintain or increase
- **Customer Lifetime Value:** Increase through recovery

---

**Document Version:** 1.0  
**Last Updated:** December 5, 2025  
**Platform:** Fresh Relevance by dotdigital  
**Site:** GardeningDirect.co.uk

---

*This guide provides a complete workflow structure for implementing Fresh Relevance experiences on GardeningDirect.co.uk. Start with Cart Abandonment as the first solution, then implement other experiences in priority order.*


