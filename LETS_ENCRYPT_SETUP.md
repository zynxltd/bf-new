# Let's Encrypt SSL Setup via cPanel AutoSSL

## Quick Steps to Generate Let's Encrypt Certificate

### Step 1: Access AutoSSL in cPanel

1. **Log into cPanel**
   - URL: Your cPanel URL (usually `https://your-server-ip:2083` or your domain)
   - You're already logged in based on the screenshot

2. **Navigate to AutoSSL**
   - In cPanel, search for "AutoSSL" in the search bar (top right)
   - OR go to: **Security** → **SSL/TLS Status**
   - OR go to: **Security** → **AutoSSL**

### Step 2: Run AutoSSL

1. **Click "Run AutoSSL" button**
   - This will automatically detect your domain (`bloomingfast.com`)
   - AutoSSL will attempt to install Let's Encrypt certificates for all domains

2. **Wait for the process to complete**
   - AutoSSL will:
     - Verify domain ownership (via HTTP challenge)
     - Generate Let's Encrypt certificate
     - Install the certificate automatically
     - Set up auto-renewal (certificates renew every 60 days)

### Step 3: Verify Installation

1. **Check SSL/TLS Status**
   - Go to: **Security** → **SSL/TLS Status**
   - You should see `bloomingfast.com` with a valid Let's Encrypt certificate
   - Status should show "Valid" with expiration date (90 days from now)

2. **Test the certificate**
   - Visit: `https://bloomingfast.com`
   - The browser should show a valid SSL certificate (green padlock)
   - No security warnings should appear

### Step 4: Install for www subdomain (if needed)

1. **Go to SSL/TLS Status**
2. **Select `www.bloomingfast.com`**
3. **Click "Run AutoSSL" again** to install certificate for www subdomain

## Alternative: Manual Let's Encrypt Installation

If AutoSSL doesn't work, you can manually install:

1. **Go to: Security → SSL/TLS → Manage SSL Sites**
2. **Click "Run AutoSSL"** or **"Install Let's Encrypt"**
3. **Select domain:** `bloomingfast.com`
4. **Click "Run AutoSSL"**

## Important Notes

- **DNS must be correct:** Domain must point to server IP (92.205.12.15)
- **Port 80 must be open:** Let's Encrypt needs HTTP access for verification
- **Domain must be accessible:** The domain should be reachable via HTTP
- **Auto-renewal:** AutoSSL automatically renews certificates every 60 days

## Troubleshooting

### If AutoSSL fails:

1. **Check DNS:**
   ```bash
   dig +short bloomingfast.com A
   # Should return: 92.205.12.15
   ```

2. **Verify domain is accessible:**
   - Visit: `http://bloomingfast.com`
   - Should load your website (not show errors)

3. **Check cPanel error logs:**
   - Go to: **Metrics** → **Errors**
   - Look for SSL/AutoSSL related errors

4. **Contact hosting support:**
   - If AutoSSL is not available, contact your hosting provider
   - They may need to enable AutoSSL for your account

## After SSL Installation

Once the certificate is installed, update your Laravel `.env`:

```env
APP_URL=https://bloomingfast.com
FORCE_HTTPS=true
```

Then clear Laravel cache:
```bash
php artisan config:clear
php artisan cache:clear
```

