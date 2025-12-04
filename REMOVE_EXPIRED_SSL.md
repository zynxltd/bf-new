# Remove Expired SSL Certificate and Install Let's Encrypt

## Steps to Remove Expired Certificate and Install Let's Encrypt

### Step 1: Remove the Expired Certificate

1. **In cPanel, go to: Security → SSL/TLS → Manage SSL Sites**
   - You should see the expired certificate for `bloomingfast.com`

2. **Delete the Expired Certificate:**
   - Find `bloomingfast.com` in the list
   - Click "Delete" or "Remove" next to the expired certificate
   - Confirm the deletion

3. **Alternative: Clear the Certificate Fields:**
   - In "Manage SSL Sites", select `bloomingfast.com`
   - Clear/delete the contents of:
     - Certificate (CRT) field
     - Private Key (KEY) field
     - Certificate Authority Bundle (CABUNDLE) field (if any)
   - Click "Save Certificate" or "Update Certificate"

### Step 2: Install Let's Encrypt via AutoSSL

1. **Go to: Security → SSL/TLS Status** or **Security → AutoSSL**

2. **Click "Run AutoSSL"**
   - This will automatically:
     - Detect that no certificate exists
     - Generate a new Let's Encrypt certificate
     - Install it automatically
     - Set up auto-renewal

3. **Wait for completion** (1-2 minutes)

### Step 3: Verify New Certificate

1. **Check SSL/TLS Status:**
   - Go to: Security → SSL/TLS Status
   - You should see:
     - Issuer: "Let's Encrypt" (not "self-signed")
     - Status: "Valid"
     - Expiration: ~90 days from today

2. **Test the website:**
   - Visit: `https://bloomingfast.com`
   - Should show valid SSL (green padlock)
   - No security warnings

## If AutoSSL Doesn't Work

### Manual Let's Encrypt Installation:

1. **Go to: Security → SSL/TLS → Manage SSL Sites**

2. **Click "Run AutoSSL" button** (if available)

3. **Or use "Let's Encrypt" option:**
   - Look for "Let's Encrypt" or "Free SSL" option
   - Select `bloomingfast.com`
   - Click "Install" or "Generate"

## Troubleshooting

If you still see the expired certificate:

1. **Clear browser cache** and refresh cPanel
2. **Wait a few minutes** after deletion before running AutoSSL
3. **Check if domain is accessible:**
   - Visit: `http://bloomingfast.com` (without https)
   - Should load your website

4. **Contact hosting support** if AutoSSL is not available in your cPanel

