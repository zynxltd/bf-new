# Renew SSL Certificate in cPanel - Step by Step

## Current Location
You're on: **SSL/TLS → View Private Key**

## Steps to Install Let's Encrypt Certificate

### Step 1: Navigate to AutoSSL
1. **Click "Go Back"** (top right of current page)
2. **Or use the cPanel search bar** (top right):
   - Type: `AutoSSL`
   - Click on: **"SSL/TLS Status"** or **"AutoSSL"**

### Step 2: Run AutoSSL
1. On the **SSL/TLS Status** or **AutoSSL** page, you'll see:
   - A list of your domains
   - Current SSL certificate status
   - A **"Run AutoSSL"** button

2. **Click "Run AutoSSL"** or **"Run AutoSSL for All Domains"**

3. **Wait 1-2 minutes** - AutoSSL will:
   - Detect your domains (`bloomingfast.com`, `www.bloomingfast.com`)
   - Remove the expired self-signed certificate
   - Generate new Let's Encrypt certificates
   - Install them automatically
   - Set up auto-renewal (certificates renew every 60 days)

### Step 3: Verify Installation
1. **Check SSL/TLS Status page** - You should see:
   - Issuer: **"Let's Encrypt"** (not "self-signed")
   - Status: **"Valid"**
   - Expiration: ~90 days from today

2. **Test the website:**
   - Visit: `https://bloomingfast.com`
   - Visit: `https://www.bloomingfast.com`
   - Should show valid SSL (green padlock)
   - No security warnings

## Alternative: If AutoSSL Button is Not Visible

1. **Go to: Security → SSL/TLS → Manage SSL Sites**
2. **Look for "Run AutoSSL" button** on that page
3. **Or look for "Let's Encrypt" or "Free SSL" option**

## Important Notes

- **Don't delete the private key** - AutoSSL will handle certificate replacement
- **DNS must be correct** - Domain must point to server IP (92.205.12.15) ✓
- **Domain must be accessible** - Should be reachable via HTTP ✓
- **Auto-renewal** - AutoSSL automatically renews certificates every 60 days

## Troubleshooting

If AutoSSL fails:
- Ensure domain is accessible: `http://bloomingfast.com`
- Check DNS: Domain should point to 92.205.12.15
- Contact hosting support if AutoSSL is not available

