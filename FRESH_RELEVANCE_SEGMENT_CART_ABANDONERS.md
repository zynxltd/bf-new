# Fresh Relevance Segment Configuration
## Cart Abandoners - Active Cart

**Segment Name:** `CART ABANDONERS - ACTIVE CART`  
**Platform:** Fresh Relevance by dotdigital  
**Date:** December 5, 2025

---

## Segment Rules Configuration

Based on the Fresh Relevance interface, here are the exact rules to configure:

---

## Rule 1: Has Carted Items (Primary Rule)

### Configuration:
1. **Category:** Person History (clock icon)
2. **Rule Type:** `Has Carted`
3. **Time Period:** `Within the last 30 days` (or adjust as needed)

**Current Setting (from image):**
- ✅ "Carted anything within the last 30 days"

**Options to Consider:**
- **30 days** - Good for general cart abandonment
- **7 days** - For more recent/active cart abandoners
- **1 day** - For very recent/high-intent abandoners

**Recommendation:** Start with **30 days**, then create additional segments for 7 days and 1 day for different messaging.

---

## Rule 2: Has NOT Purchased (Exclusion Rule)

### Configuration:
1. **Category:** Person History (clock icon)
2. **Rule Type:** `Has Purchased`
3. **Logic:** **NOT** (exclude users who have purchased)
4. **Time Period:** `Within the last 30 days` (or `Within the last 90 days`)

**To Add This Rule:**
- Click on `Has Purchased` from Person History
- Configure as: **"Has NOT Purchased within the last 30 days"**
- This ensures we only target users who haven't completed a purchase

**Alternative:** Use `Within the last 90 days` to exclude anyone who purchased in the last 3 months.

---

## Rule 3: Recent Cart Activity (Optional - For Active Cart)

### Configuration:
1. **Category:** Person History (clock icon)
2. **Rule Type:** `Has Carted`
3. **Time Period:** `Within the last 1 day` OR `Within the last 7 days`

**Purpose:** To focus on users with very recent cart activity (higher intent)

**Logic:** 
- Use **AND** logic to combine with Rule 1
- This creates: "Has carted within 30 days **AND** has carted within 1 day"

**Alternative Approach:**
- Create separate segments:
  - "Cart Abandoners - Active (1 day)"
  - "Cart Abandoners - Recent (7 days)"
  - "Cart Abandoners - General (30 days)"

---

## Complete Segment Logic Flow

### Recommended Configuration:

```
CART ABANDONERS - ACTIVE CART
│
├── Rule 1: Has Carted (within last 30 days) ✅
│   └── This is already configured
│
├── Rule 2: Has NOT Purchased (within last 30 days) ⚠️ ADD THIS
│   └── Excludes users who completed purchase
│
└── IN SEGMENT
    └── Users who meet all criteria
```

### Advanced Configuration (Optional):

```
CART ABANDONERS - ACTIVE CART
│
├── Rule 1: Has Carted (within last 30 days) ✅
│
├── Rule 2: Has NOT Purchased (within last 30 days) ⚠️
│
├── Rule 3: Has Carted (within last 1 day) ⚠️ OPTIONAL
│   └── For "active" cart abandoners only
│
└── IN SEGMENT
```

---

## Step-by-Step Configuration in Fresh Relevance

### Step 1: Add Exclusion Rule (Has NOT Purchased)

1. **In the "Add rules" tab:**
   - Scroll to **"Person History"** section (clock icon)
   - Click on **"Has Purchased"**

2. **Configure the Rule:**
   - Time Period: Select **"Within the last 30 days"**
   - **IMPORTANT:** Use **NOT** logic (exclude)
   - This should create: "Has NOT Purchased within the last 30 days"

3. **Add to Segment:**
   - Drag the rule to the segment flow
   - Connect it with **AND** logic to the existing "Has Carted" rule

### Step 2: Verify Segment Logic

**Your segment flow should look like:**

```
CART ABANDONERS - ACTIVE CART
    ↓
Has Carted (within last 30 days)
    ↓ (AND)
Has NOT Purchased (within last 30 days)
    ↓
IN SEGMENT
```

### Step 3: Optional - Add Recent Activity Rule

**For "Active Cart" focus:**

1. Add another **"Has Carted"** rule
2. Set time period to **"Within the last 1 day"** or **"Within the last 7 days"**
3. Connect with **AND** logic

**Result:**
```
CART ABANDONERS - ACTIVE CART
    ↓
Has Carted (within last 30 days)
    ↓ (AND)
Has Carted (within last 1 day) ← Active cart focus
    ↓ (AND)
Has NOT Purchased (within last 30 days)
    ↓
IN SEGMENT
```

---

## Alternative Segment Variations

### Segment 1: Cart Abandoners - Active (1 Day)
**Use Case:** High-intent, very recent cart activity
**Rules:**
- Has Carted (within last 1 day)
- Has NOT Purchased (within last 30 days)

**Messaging:** Urgent, time-sensitive offers

---

### Segment 2: Cart Abandoners - Recent (7 Days)
**Use Case:** Recent cart activity, still engaged
**Rules:**
- Has Carted (within last 7 days)
- Has NOT Purchased (within last 30 days)

**Messaging:** Reminder with discount offer

---

### Segment 3: Cart Abandoners - General (30 Days)
**Use Case:** All cart abandoners, broader reach
**Rules:**
- Has Carted (within last 30 days)
- Has NOT Purchased (within last 30 days)

**Messaging:** Re-engagement with stronger offers

---

## Additional Rules to Consider

### Rule: Session Count (Optional)
**Category:** Person History
**Rule Type:** `Session Count`
**Configuration:**
- Greater than or equal to 2
- **Purpose:** Target users who have visited multiple times (higher engagement)

### Rule: Has Browsed (Optional)
**Category:** Person History
**Rule Type:** `Has Browsed`
**Configuration:**
- Within the last 7 days
- **Purpose:** Ensure user is still active/engaged

### Rule: Disengaged Visitor (Exclude)
**Category:** Person
**Rule Type:** `Disengaged Visitor`
**Configuration:**
- Use **NOT** logic
- **Purpose:** Exclude users who are disengaged

---

## Segment Logic Examples

### Example 1: Basic Cart Abandonment
```
CART ABANDONERS - ACTIVE CART
    ↓
Has Carted (within last 30 days)
    ↓ (AND)
Has NOT Purchased (within last 30 days)
    ↓
IN SEGMENT
```

### Example 2: Active Cart Abandonment (Recommended)
```
CART ABANDONERS - ACTIVE CART
    ↓
Has Carted (within last 30 days)
    ↓ (AND)
Has Carted (within last 1 day) ← Active focus
    ↓ (AND)
Has NOT Purchased (within last 30 days)
    ↓
IN SEGMENT
```

### Example 3: Engaged Cart Abandonment
```
CART ABANDONERS - ACTIVE CART
    ↓
Has Carted (within last 30 days)
    ↓ (AND)
Has NOT Purchased (within last 30 days)
    ↓ (AND)
Session Count >= 2 ← Multiple visits
    ↓
IN SEGMENT
```

---

## Configuration Checklist

### Required Rules:
- [x] Has Carted (within last 30 days) - **Already configured**
- [ ] Has NOT Purchased (within last 30 days) - **ADD THIS**

### Optional Rules (Choose based on needs):
- [ ] Has Carted (within last 1 day) - For active focus
- [ ] Has Carted (within last 7 days) - For recent focus
- [ ] Session Count >= 2 - For engaged users
- [ ] Has Browsed (within last 7 days) - For active users
- [ ] NOT Disengaged Visitor - Exclude disengaged

---

## Next Steps After Configuration

1. **Click "GENERATE SEGMENT"** button
2. **Review segment size** - Check how many users match
3. **Test segment** - Verify it's working correctly
4. **Save segment** - Click "SAVED" to confirm
5. **Use in Experience** - Assign to Cart Abandonment Experience

---

## Segment Testing

### How to Test:

1. **Add items to cart** on GardeningDirect.co.uk
2. **Don't complete purchase**
3. **Wait for segment to update** (may take a few minutes)
4. **Check segment** in Fresh Relevance
5. **Verify you appear** in the segment

### Expected Results:

- Segment should populate within 5-15 minutes
- Users with active carts should appear
- Users who completed purchase should NOT appear
- Segment size should match cart abandonment rate

---

## Troubleshooting

### Issue: Segment Not Populating

**Solutions:**
1. Check "Has Carted" rule is configured correctly
2. Verify time period (30 days should capture most)
3. Check if "Has NOT Purchased" is excluding too many
4. Verify Fresh Relevance tracking is working
5. Wait 15-30 minutes for data to sync

### Issue: Segment Too Large

**Solutions:**
1. Add "Has Carted (within last 1 day)" for active focus
2. Add "Session Count >= 2" for engaged users
3. Reduce time period from 30 to 7 days

### Issue: Segment Too Small

**Solutions:**
1. Increase time period from 30 to 90 days
2. Remove "Has NOT Purchased" rule (if appropriate)
3. Check if tracking is capturing cart events

---

## Recommended Final Configuration

### For "Cart Abandoners - Active Cart":

```
Segment Name: CART ABANDONERS - ACTIVE CART

Rules:
1. Has Carted (within last 30 days) ✅
2. Has NOT Purchased (within last 30 days) ⚠️ ADD
3. Has Carted (within last 1 day) ⚠️ OPTIONAL (for "active" focus)

Logic: AND (all rules must be true)
```

**This configuration will:**
- Target users who have items in cart
- Exclude users who already purchased
- Focus on recent/active cart activity (if Rule 3 added)
- Provide good segment size for targeting

---

## Additional Segments to Create

### Segment 2: Cart Abandoners - Recent (7 Days)
```
Rules:
- Has Carted (within last 7 days)
- Has NOT Purchased (within last 30 days)
```

### Segment 3: Cart Abandoners - High Value
```
Rules:
- Has Carted (within last 30 days)
- Cart Value >= £50 (if available)
- Has NOT Purchased (within last 30 days)
```

### Segment 4: Cart Abandoners - Multiple Sessions
```
Rules:
- Has Carted (within last 30 days)
- Session Count >= 2
- Has NOT Purchased (within last 30 days)
```

---

**Configuration Guide Version:** 1.0  
**Last Updated:** December 5, 2025  
**Based on:** Fresh Relevance Interface Screenshots

---

*Use this guide to configure the "Cart Abandoners - Active Cart" segment in Fresh Relevance. The key addition is the "Has NOT Purchased" exclusion rule to ensure you're only targeting users who haven't completed a purchase.*


