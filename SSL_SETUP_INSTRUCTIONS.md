# Let's Encrypt SSL Setup for bloomingfast.com

## DNS Records Required

Before setting up SSL, ensure these DNS records are configured:

### A Records (IPv4)
```
Type: A
Name: @ (or bloomingfast.com)
Value: 92.205.12.15
TTL: 3600 (or default)

Type: A
Name: www
Value: 92.205.12.15
TTL: 3600 (or default)
```

### Optional: CNAME (if preferred)
```
Type: CNAME
Name: www
Value: bloomingfast.com
TTL: 3600
```

## Setup Methods

### Method 1: cPanel SSL/TLS Interface (Recommended)

1. **Log into cPanel**
   - URL: `https://92.205.12.15:2083` or your cPanel URL
   - Username: `vwyrnm0aw1jf`

2. **Navigate to SSL/TLS**
   - In cPanel, search for "SSL/TLS" or find it under "Security"

3. **Install Let's Encrypt Certificate**
   - Click on "Manage SSL Sites" or "Let's Encrypt"
   - Select your domain: `bloomingfast.com`
   - Click "Run AutoSSL" or "Install Let's Encrypt"
   - Also install for `www.bloomingfast.com` if needed

4. **Force HTTPS Redirect**
   - In cPanel, go to "Redirects"
   - Create a redirect from `http://bloomingfast.com` to `https://bloomingfast.com`
   - Do the same for `www` subdomain if applicable

### Method 2: AutoSSL (Automatic)

If AutoSSL is enabled in cPanel:
1. Go to "SSL/TLS Status" in cPanel
2. Click "Run AutoSSL"
3. It will automatically detect and install Let's Encrypt certificates

### Method 3: Command Line (if cPanel method doesn't work)

```bash
# Install certbot (if not available)
# Note: On cPanel, use the cPanel interface instead

# For manual DNS verification (if HTTP verification fails)
certbot certonly --manual --preferred-challenges dns -d bloomingfast.com -d www.bloomingfast.com
```

## Verification Steps

1. **Check DNS Records**
   ```bash
   dig +short bloomingfast.com A
   # Should return: 92.205.12.15
   
   dig +short www.bloomingfast.com A
   # Should return: 92.205.12.15
   ```

2. **Test SSL Certificate**
   - Visit: `https://www.ssllabs.com/ssltest/analyze.html?d=bloomingfast.com`
   - Should show valid Let's Encrypt certificate

3. **Check Certificate Expiry**
   - Certificates auto-renew every 90 days via AutoSSL
   - Manual renewal: cPanel → SSL/TLS → Manage SSL Sites → Renew

## Laravel Configuration Updates

After SSL is installed, update your `.env` file:

```env
APP_URL=https://bloomingfast.com
APP_ENV=production
APP_DEBUG=false

# Force HTTPS in Laravel
FORCE_HTTPS=true
```

Update `AppServiceProvider.php` to force HTTPS:

```php
public function boot(): void
{
    if (config('app.env') === 'production') {
        \URL::forceScheme('https');
    }
}
```

## Troubleshooting

1. **DNS not propagating?**
   - Wait 24-48 hours for DNS propagation
   - Use `dig` or `nslookup` to check DNS records

2. **Certificate installation fails?**
   - Ensure domain points to server IP (92.205.12.15)
   - Check port 80 is open for HTTP verification
   - Verify domain is accessible via HTTP

3. **Mixed content warnings?**
   - Update all internal links to use HTTPS
   - Update asset URLs to use HTTPS
   - Check browser console for HTTP resources

## Current Server Information

- **Server IP:** 92.205.12.15
- **Domain:** bloomingfast.com
- **Server Type:** cPanel/WHM
- **Hostname:** sxb1plzcpnl503971.prod.sxb1.secureserver.net

