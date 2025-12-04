# Free SSL Certificate Renewal - Let's Encrypt via cPanel

## Current Status
- All certificates expired on **November 27, 2024**
- Certificates are currently **self-signed** (causing browser warnings)
- Need to install **Let's Encrypt** certificates (free, auto-renewing)

## Method 1: AutoSSL (Recommended - Easiest)

AutoSSL automatically installs and renews Let's Encrypt certificates for all your domains.

### Steps:

1. **Navigate to AutoSSL in cPanel**
   - In cPanel, search for "AutoSSL" or go to: **Security → SSL/TLS Status**
   - Or directly: **Security → AutoSSL**

2. **Run AutoSSL**
   - Click the **"Run AutoSSL"** button
   - This will automatically:
     - Detect all your domains
     - Request Let's Encrypt certificates
     - Install them automatically
     - Set up auto-renewal (every 90 days)

3. **Wait for Processing**
   - AutoSSL may take 5-15 minutes to complete
   - You'll see progress indicators
   - Check back in a few minutes

4. **Verify Installation**
   - Go back to **SSL/TLS Status**
   - Certificates should show as "Valid" with Let's Encrypt as issuer
   - Expiration should be ~90 days from now

## Method 2: Manual Let's Encrypt Installation

If AutoSSL doesn't work, use this method:

### Steps:

1. **Navigate to SSL/TLS**
   - Go to: **Security → SSL/TLS**
   - Click **"Manage SSL Sites"** or **"Install and Manage SSL for your site (HTTPS)"**

2. **Select Domain**
   - In the dropdown, select: **bloomingfast.com**
   - Click **"Autofill by Domain"**

3. **Use Let's Encrypt**
   - Click **"Run AutoSSL"** button at the top
   - OR click **"Browse Certificates"** → Select **"Let's Encrypt"** → Click **"Use Certificate"**

4. **Install Certificate**
   - The certificate will be automatically generated and installed
   - Repeat for **www.bloomingfast.com** if needed

## Method 3: Command Line (If cPanel methods fail)

If you have SSH access and cPanel methods don't work:

```bash
# Install certbot (if not available)
# On cPanel, this is usually handled by the interface

# For manual installation via SSH (if needed)
# Note: This requires root access or cPanel API access
```

## Important Notes

### DNS Requirements
Before installing SSL, ensure:
- ✅ `bloomingfast.com` A record points to `92.205.12.15`
- ✅ `www.bloomingfast.com` A record points to `92.205.12.15`
- ✅ DNS has propagated (can take up to 48 hours)

### Verification
After installation, verify:
1. Visit: `https://bloomingfast.com`
2. Check browser shows green padlock (not "Not Secure")
3. Test SSL: `https://www.ssllabs.com/ssltest/analyze.html?d=bloomingfast.com`
4. Should show "Let's Encrypt" as issuer

### Auto-Renewal
- Let's Encrypt certificates expire every **90 days**
- AutoSSL automatically renews them **30 days before expiration**
- No manual intervention needed

### Troubleshooting

**Issue: AutoSSL fails**
- Check DNS records are correct
- Ensure domain is accessible via HTTP (port 80)
- Wait 24-48 hours after DNS changes
- Contact hosting support if issues persist

**Issue: Certificate shows as self-signed**
- Uninstall old self-signed certificate first
- Then run AutoSSL to install Let's Encrypt

**Issue: Browser still shows "Not Secure"**
- Clear browser cache
- Wait for certificate propagation (can take a few minutes)
- Check certificate is installed for both `bloomingfast.com` and `www.bloomingfast.com`

## Quick Action Steps

1. **Go to cPanel → Security → AutoSSL**
2. **Click "Run AutoSSL"**
3. **Wait 5-15 minutes**
4. **Check SSL/TLS Status to verify**
5. **Test website: https://bloomingfast.com**

## After SSL is Installed

Update your Laravel `.env` file:
```env
APP_URL=https://bloomingfast.com
FORCE_HTTPS=true
```

And update `AppServiceProvider.php` to force HTTPS:
```php
public function boot(): void
{
    if (config('app.env') === 'production') {
        \URL::forceScheme('https');
    }
}
```

