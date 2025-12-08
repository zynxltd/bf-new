# Cookiebot Setup Guide

## Implementation Complete ✅

Cookiebot has been successfully added to your site with **Auto Blocking Mode** for GDPR compliance.

**Location:** `resources/views/layouts/app.blade.php`

**Script Added:**
```html
<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="1b14093a-5243-4fdf-9a56-455f93e17d85" data-blockingmode="auto" type="text/javascript"></script>
```

## Next Steps - Cookiebot Dashboard Configuration

### 1. Configure Cookie Categories

In your Cookiebot dashboard (https://manage.cookiebot.com), you need to categorize your cookies and scripts:

**Necessary Cookies (Always Active):**
- Session cookies
- Authentication cookies
- Security cookies
- Load balancing cookies

**Statistics Cookies (Requires Consent):**
- Google Analytics 4 (`G-NH00CZ6T7P`)
- Any analytics scripts

**Marketing Cookies (Requires Consent):**
- Advertising scripts
- Remarketing pixels
- Social media tracking

**Preferences Cookies (Requires Consent):**
- Language preferences
- User settings

### 2. Customize Cookie Banner (Important for CRO!)

Based on the CRO audit, the cookie banner should be **non-intrusive**. In Cookiebot dashboard:

1. **Go to:** Settings → Cookie Declaration → Cookie Banner
2. **Recommended Settings:**
   - **Position:** Bottom of page (not center popup)
   - **Style:** Minimal, non-blocking
   - **Options:** "Accept All" and "Customize" buttons
   - **Auto-hide:** After user makes a choice

### 3. Configure Script Blocking

With auto blocking mode, Cookiebot will automatically block scripts until consent is given. However, you may need to:

1. **Tag scripts with data attributes:**
   ```html
   <!-- For Statistics cookies -->
   <script data-cookieconsent="statistics" ...>
   
   <!-- For Marketing cookies -->
   <script data-cookieconsent="marketing" ...>
   ```

2. **Or configure in Cookiebot dashboard:**
   - Go to Settings → Cookie Declaration
   - Add your scripts/cookies and assign categories

### 4. Test the Implementation

1. Clear your browser cookies
2. Visit your site
3. Verify the cookie banner appears
4. Test that Google Analytics is blocked until consent
5. Accept cookies and verify analytics starts tracking

## Alternative: Manual Blocking Mode

If you prefer **manual blocking mode** (less intrusive, but requires more configuration), you can change the script to:

```html
<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="1b14093a-5243-4fdf-9a56-455f93e17d85" type="text/javascript"></script>
```

**Note:** With manual mode, you'll need to manually configure which scripts to block in your Cookiebot dashboard.

## Current Scripts That Need Categorization

Based on your current implementation:

1. **Google Analytics 4** (`G-NH00CZ6T7P`)
   - Category: Statistics
   - Action: Configure in Cookiebot dashboard or add `data-cookieconsent="statistics"` attribute

2. **Feefo Widgets**
   - Category: Statistics (if used for analytics) or Necessary (if core functionality)
   - Action: Review and categorize appropriately

3. **Google Maps** (if used)
   - Category: Preferences or Necessary
   - Action: Review usage and categorize

## CRO Optimization Recommendations

As per the CRO audit:

1. ✅ **Use non-blocking banner** (bottom of page, not center popup)
2. ✅ **Simplify consent options** (Accept All / Customize)
3. ✅ **Pre-approve necessary cookies** (site should function immediately)
4. ✅ **Make banner dismissible** (don't force interaction before viewing content)

## Support

- Cookiebot Documentation: https://www.cookiebot.com/en/developer/
- Cookiebot Dashboard: https://manage.cookiebot.com
- Your Cookiebot ID: `1b14093a-5243-4fdf-9a56-455f93e17d85`



