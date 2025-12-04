# Install Let's Encrypt SSL via cPanel Web Interface

Since command-line SSL installation requires root access, use cPanel's web interface:

## Method 1: AutoSSL (Easiest - Recommended)

1. **Log into cPanel**
   - Go to your cPanel URL
   - You're already logged in

2. **Navigate to AutoSSL:**
   - In the cPanel search bar (top right), type: **"AutoSSL"**
   - Click on **"SSL/TLS Status"** or **"AutoSSL"**

3. **Run AutoSSL:**
   - Click the **"Run AutoSSL"** button
   - This will automatically:
     - Remove the expired certificate
     - Generate a new Let's Encrypt certificate
     - Install it automatically
     - Set up auto-renewal

4. **Wait 1-2 minutes** for the process to complete

5. **Verify:**
   - Go back to **SSL/TLS Status**
   - You should see:
     - Issuer: "Let's Encrypt" (not "self-signed")
     - Status: "Valid"
     - Expiration: ~90 days from today

## Method 2: Manual SSL Installation

If AutoSSL doesn't work:

1. **Remove Expired Certificate:**
   - Go to: **Security → SSL/TLS → Manage SSL Sites**
   - Find `bloomingfast.com`
   - Click **"Delete"** or clear all certificate fields
   - Click **"Save Certificate"**

2. **Install Let's Encrypt:**
   - Still in **Manage SSL Sites**
   - Look for **"Run AutoSSL"** button
   - OR look for **"Let's Encrypt"** or **"Free SSL"** option
   - Click it to install

## Method 3: Contact Hosting Support

If neither method works, contact your hosting provider and ask them to:
- Enable AutoSSL for your account
- Install a Let's Encrypt certificate for `bloomingfast.com`

## After SSL Installation

Once the certificate is installed, update your Laravel `.env`:

```env
APP_URL=https://bloomingfast.com
FORCE_HTTPS=true
```

Then run on the server:
```bash
cd ~/bf
php artisan config:clear
php artisan cache:clear
```

## Verify SSL is Working

1. Visit: `https://bloomingfast.com`
2. Check for green padlock in browser
3. No security warnings should appear
4. Test SSL: https://www.ssllabs.com/ssltest/analyze.html?d=bloomingfast.com

