# Fresh Relevance Analytics Configuration
## Quick Reference for New Customer Experience

---

## Analytics Fields to Select

### ✅ 24 Hours Analytics (Select These)

**Required Fields:**
- ✅ **Browsed Quantity** - Track products viewed in last 24 hours
- ✅ **Browsed Value** - Total value of products browsed
- ✅ **Last Browsed Date** - When they last viewed products
- ✅ **Number of Sessions** - Session count in last 24 hours
- ✅ **Last Session Date** - Most recent visit timestamp

**Why:** For high-intent users who visited recently (within 24 hours)

---

### ✅ 7 Days Analytics (Select These)

**Required Fields:**
- ✅ **Browsed Quantity** - Products viewed in last 7 days
- ✅ **Browsed Value** - Total browsed value in last week
- ✅ **Last Browsed Date** - Last browse date within 7 days
- ✅ **Carted Quantity** - Items added to cart in last 7 days
- ✅ **Carted Value** - Total cart value in last 7 days
- ✅ **Number of Sessions** - Sessions in last 7 days
- ✅ **Last Session Date** - Most recent session date

**Why:** Primary time window for "recently browsed" segment

---

### ✅ 30 Days Analytics (Select These)

**Required Fields:**
- ✅ **Browsed Quantity** - Monthly browse activity
- ✅ **Browsed Value** - Monthly browsed value
- ✅ **Last Browsed Date** - Last browse within 30 days
- ✅ **Carted Quantity** - Cart activity in last 30 days
- ✅ **Carted Value** - Cart value in last 30 days
- ✅ **Number of Sessions** - Monthly session count
- ✅ **Last Session Date** - Last visit date

**Why:** Extended window for re-engagement campaigns

---

### ✅ 90 Days Analytics (Select These)

**Required Fields:**
- ✅ **Browsed Quantity** - Quarterly activity tracking
- ✅ **Browsed Value** - Quarterly browsed value
- ✅ **Last Browsed Date** - Last browse date
- ✅ **Purchased Quantity** - **CRITICAL: To exclude purchasers (should be 0)**
- ✅ **Purchased Value** - **CRITICAL: To exclude purchasers (should be 0)**
- ✅ **Number of Sessions** - Quarterly sessions

**Why:** 
- Track longer-term browsing patterns
- **Exclude users who have purchased** (Purchased Quantity = 0 is key rule)

---

### ⚠️ 1 Year Analytics (Optional)

**Only if needed for long-term analysis:**
- ⚠️ **Browsed Quantity** - Annual activity
- ⚠️ **Purchased Quantity** - Annual purchase exclusion

**Why:** Usually not needed for "new customer" segment, but useful for VIP/loyalty programs

---

## Device Type Analytics (Recommended)

### Select All Device Types:
- ✅ **Mobile** - Track mobile users separately
- ✅ **Tablet** - Track tablet users separately  
- ✅ **PC** - Track desktop users separately

**Why:** Enable device-specific personalization and optimization

---

## Configuration Summary

### Minimum Required Selection:

```
24 Hours (5 fields):
  ✅ Browsed Quantity
  ✅ Browsed Value
  ✅ Last Browsed Date
  ✅ Number of Sessions
  ✅ Last Session Date

7 Days (7 fields):
  ✅ Browsed Quantity
  ✅ Browsed Value
  ✅ Last Browsed Date
  ✅ Carted Quantity
  ✅ Carted Value
  ✅ Number of Sessions
  ✅ Last Session Date

30 Days (7 fields):
  ✅ Browsed Quantity
  ✅ Browsed Value
  ✅ Last Browsed Date
  ✅ Carted Quantity
  ✅ Carted Value
  ✅ Number of Sessions
  ✅ Last Session Date

90 Days (6 fields):
  ✅ Browsed Quantity
  ✅ Browsed Value
  ✅ Last Browsed Date
  ✅ Purchased Quantity (for exclusion rule)
  ✅ Purchased Value (for exclusion rule)
  ✅ Number of Sessions

Device Types (3 fields):
  ✅ Mobile
  ✅ Tablet
  ✅ PC
```

**Total Fields Selected: 28**

---

## How to Configure in Fresh Relevance

### Step-by-Step:

1. **Navigate to Analytics Section**
   - Click on "Analytics" in main menu
   - Look for "Map analytics for the fields you want in your ESP"

2. **Select Time Windows**
   - Click on "24 Hours" tab
   - Select required fields (checkboxes)
   - Repeat for "7 Days", "30 Days", "90 Days"

3. **Select Device Types**
   - Scroll to device type section
   - Select Mobile, Tablet, PC

4. **Review Selection**
   - Check that all required fields are selected
   - Total should show: "Analytics selected: 28 of 20" (or similar)

5. **Save Configuration**
   - Click "Save" or "Apply" button
   - Wait for confirmation message

6. **Wait for Data Collection**
   - Analytics may take 24-48 hours to start populating
   - Check back after 24 hours to verify data

---

## Field Usage in Segment Rules

### Example Segment Rules Using These Fields:

#### Rule 1: No Purchase (Exclusion)
```
Purchased Quantity (90 Days) = 0
AND
Purchased Value (90 Days) = 0
```

#### Rule 2: Has Browsed (Inclusion)
```
Browsed Quantity (7 Days) >= 1
OR
Browsed Quantity (30 Days) >= 1
```

#### Rule 3: Recent Activity
```
Last Browsed Date (7 Days) <= 7 days ago
AND
Last Session Date (7 Days) <= 7 days ago
```

#### Rule 4: Engagement Level
```
Number of Sessions (7 Days) >= 2
AND
Browsed Quantity (7 Days) >= 3
```

#### Rule 5: Cart Activity
```
Carted Quantity (7 Days) >= 1
AND
Carted Value (7 Days) > 0
```

---

## Limitations to Note

### Field Limitations:
- Some fields may have data collection limitations
- Check Fresh Relevance documentation for specific limits
- Historical data may not be available immediately
- Real-time updates may have slight delays

### Best Practices:
- Start with 7-day and 30-day windows (most useful)
- Add 24-hour for high-intent targeting
- Use 90-day for exclusion rules (purchase history)
- Monitor data quality after 48 hours

---

## Quick Copy-Paste Checklist

Use this when configuring:

```
☐ 24 Hours: Browsed Quantity
☐ 24 Hours: Browsed Value
☐ 24 Hours: Last Browsed Date
☐ 24 Hours: Number of Sessions
☐ 24 Hours: Last Session Date

☐ 7 Days: Browsed Quantity
☐ 7 Days: Browsed Value
☐ 7 Days: Last Browsed Date
☐ 7 Days: Carted Quantity
☐ 7 Days: Carted Value
☐ 7 Days: Number of Sessions
☐ 7 Days: Last Session Date

☐ 30 Days: Browsed Quantity
☐ 30 Days: Browsed Value
☐ 30 Days: Last Browsed Date
☐ 30 Days: Carted Quantity
☐ 30 Days: Carted Value
☐ 30 Days: Number of Sessions
☐ 30 Days: Last Session Date

☐ 90 Days: Browsed Quantity
☐ 90 Days: Browsed Value
☐ 90 Days: Last Browsed Date
☐ 90 Days: Purchased Quantity ⚠️ (for exclusion)
☐ 90 Days: Purchased Value ⚠️ (for exclusion)
☐ 90 Days: Number of Sessions

☐ Device: Mobile
☐ Device: Tablet
☐ Device: PC
```

---

**Configuration Date:** December 5, 2025  
**Purpose:** New Customer Experience - Browsed But Not Purchased  
**Platform:** Fresh Relevance



