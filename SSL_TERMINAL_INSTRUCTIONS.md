# Install Let's Encrypt SSL via cPanel (Terminal Instructions)

## Important Note
SSL certificate installation on cPanel servers requires root access or cPanel API access. Regular SSH users cannot install SSL certificates directly via terminal.

## Recommended Method: Use cPanel Web Interface

Since terminal access doesn't have the required permissions, use the cPanel web interface:

### Step 1: Access cPanel
1. Log into cPanel at your cPanel URL
2. Navigate to: **Security → SSL/TLS Status** or **Security → AutoSSL**

### Step 2: Run AutoSSL
1. Click **"Run AutoSSL"** or **"Run AutoSSL for All Domains"**
2. This will automatically:
   - Detect `bloomingfast.com` and `www.bloomingfast.com`
   - Generate Let's Encrypt certificates
   - Install them automatically
   - Set up auto-renewal

### Step 3: Verify
- Check SSL/TLS Status page
- Visit `https://bloomingfast.com` and `https://www.bloomingfast.com`
- Should show valid SSL certificates

## Alternative: Contact Hosting Provider

If AutoSSL is not available in your cPanel:
1. Contact your hosting provider
2. Ask them to install Let's Encrypt certificates for:
   - `bloomingfast.com`
   - `www.bloomingfast.com`
3. They can do this via WHM (Web Host Manager) which has root access

## Why Terminal Doesn't Work

- SSL installation requires root/system-level access
- cPanel's SSL management is integrated with the control panel
- Let's Encrypt certificates need to be installed via cPanel's SSL system
- Regular SSH users don't have permission to modify SSL certificates

## What You Can Do via Terminal

You can verify SSL status:
```bash
# Check if SSL is installed
openssl s_client -connect bloomingfast.com:443 -servername bloomingfast.com < /dev/null 2>/dev/null | openssl x509 -noout -dates

# Check certificate details
curl -vI https://bloomingfast.com 2>&1 | grep -i "certificate\|ssl"
```

But installation must be done via cPanel web interface or by hosting provider.

