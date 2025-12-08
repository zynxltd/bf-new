# Fresh Relevance Cart Urgency Block
## Enhanced Version for GardeningDirect.co.uk

**Block Type:** Cart Abandonment Urgency Banner  
**Theme:** GardeningDirect.co.uk Brand Consistency  
**Purpose:** Recover abandoned carts with urgency messaging

---

## Complete Code for Code Editor

**IMPORTANT:** This code will automatically show in Fresh Relevance preview mode. If preview doesn't show, check that `meta.preview` is set to "true" in Fresh Relevance.

```html
{# Cart Urgency Block - GardeningDirect.co.uk Theme #}

{% if meta.preview == "true" %}
	<meta name="viewport" content="width=device-width, initial-scale=1">
{% endif %}

<div id="{{ safeid }}__cart-urgency" class="{{ safeid }}__cart-urgency-banner {{ safeid }}__animated" {% if meta.preview == 'true' %}style="display: block !important;"{% else %}style="display: none;"{% endif %}>
	<div class="{{ safeid }}__urgency-container">
		{# Close Button #}
		<button class="{{ safeid }}__close-button" onclick="{{ safeid }}__dismissBanner()" aria-label="Close banner">
			<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M15 5L5 15M5 5L15 15" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
			</svg>
		</button>

		{# Main Content #}
		<div class="{{ safeid }}__urgency-content">
			{# Timer Icon & Countdown #}
			<div class="{{ safeid }}__timer-section">
				<div class="{{ safeid }}__timer-icon">⏰</div>
				<div class="{{ safeid }}__timer-text">
					<span class="{{ safeid }}__timer-label">Complete your order in the next</span>
					<span class="{{ safeid }}__countdown" id="{{ safeid }}__countdown">15:00</span>
					<span class="{{ safeid }}__timer-label">for <strong>FREE delivery!</strong></span>
				</div>
			</div>

			{# Cart Summary #}
			<div class="{{ safeid }}__cart-summary">
				<div class="{{ safeid }}__cart-items">
					<span class="{{ safeid }}__cart-icon">🛒</span>
					<span class="{{ safeid }}__cart-text">
						You have <strong id="{{ safeid }}__item-count">{% if meta.preview == 'true' %}3{% else %}{{cart_item_count|default('X')}}{% endif %}</strong> 
						item{% if meta.preview == 'true' or cart_item_count != 1 %}s{% endif %} in your cart
					</span>
				</div>
				<div class="{{ safeid }}__cart-value">
					Total: <strong id="{{ safeid }}__cart-total">{% if meta.preview == 'true' %}£49.99{% else %}£{{cart_total|default('0.00')}}{% endif %}</strong>
				</div>
			</div>

			{# Trust Signals #}
			<div class="{{ safeid }}__trust-signals">
				<span class="{{ safeid }}__trust-item">✓ Free Delivery Over £49.99</span>
				<span class="{{ safeid }}__trust-item">✓ Double Satisfaction Guarantee</span>
				<span class="{{ safeid }}__trust-item">✓ 11,000+ Trusted 5* Reviews</span>
			</div>

			{# CTA Button #}
			<div class="{{ safeid }}__cta-section">
				<a href="/cart/" class="{{ safeid }}__cta-button" onclick="{{ safeid }}__trackClick()">
					Complete Order Now →
				</a>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
	/* GardeningDirect.co.uk Brand Colors */
	:root {
		--gd-primary-green: #537550;
		--gd-dark-green: #2d5016;
		--gd-light-green: #6b8e66;
		--gd-white: #ffffff;
		--gd-text-dark: #333333;
		--gd-text-light: #666666;
		--gd-border: #e0e0e0;
		--gd-shadow: rgba(0, 0, 0, 0.1);
	}

	/* Main Banner Container */
	.{{ safeid }}__cart-urgency-banner {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		background: linear-gradient(135deg, var(--gd-primary-green) 0%, var(--gd-dark-green) 100%);
		color: var(--gd-white);
		z-index: 9999;
		box-shadow: 0 4px 12px var(--gd-shadow);
		font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
		{% if meta.preview == 'true' %}display: block !important;{% else %}display: none;{% endif %}
	}

	.{{ safeid }}__urgency-container {
		max-width: 1200px;
		margin: 0 auto;
		padding: 20px 60px 20px 20px;
		position: relative;
	}

	/* Close Button */
	.{{ safeid }}__close-button {
		position: absolute;
		top: 15px;
		right: 15px;
		background: transparent;
		border: none;
		color: var(--gd-white);
		cursor: pointer;
		padding: 5px;
		width: 30px;
		height: 30px;
		display: flex;
		align-items: center;
		justify-content: center;
		border-radius: 50%;
		transition: background-color 0.3s ease;
		opacity: 0.8;
	}

	.{{ safeid }}__close-button:hover {
		background: rgba(255, 255, 255, 0.2);
		opacity: 1;
	}

	/* Main Content Layout */
	.{{ safeid }}__urgency-content {
		display: flex;
		flex-direction: column;
		gap: 15px;
		align-items: center;
		text-align: center;
	}

	/* Timer Section */
	.{{ safeid }}__timer-section {
		display: flex;
		align-items: center;
		justify-content: center;
		gap: 12px;
		flex-wrap: wrap;
	}

	.{{ safeid }}__timer-icon {
		font-size: 32px;
		line-height: 1;
		animation: pulse 2s infinite;
	}

	@keyframes pulse {
		0%, 100% { transform: scale(1); }
		50% { transform: scale(1.1); }
	}

	.{{ safeid }}__timer-text {
		display: flex;
		align-items: center;
		gap: 8px;
		flex-wrap: wrap;
		justify-content: center;
		font-size: 18px;
		line-height: 1.4;
	}

	.{{ safeid }}__timer-label {
		font-size: 16px;
		font-weight: 400;
	}

	.{{ safeid }}__countdown {
		display: inline-block;
		background: var(--gd-white);
		color: var(--gd-primary-green);
		padding: 8px 16px;
		border-radius: 6px;
		font-size: 24px;
		font-weight: 700;
		font-family: 'Courier New', monospace;
		min-width: 70px;
		text-align: center;
		box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
		animation: countdownPulse 1s infinite;
	}

	@keyframes countdownPulse {
		0%, 100% { box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2); }
		50% { box-shadow: 0 2px 12px rgba(255, 255, 255, 0.4); }
	}

	/* Cart Summary */
	.{{ safeid }}__cart-summary {
		display: flex;
		align-items: center;
		justify-content: center;
		gap: 20px;
		flex-wrap: wrap;
		padding: 12px 20px;
		background: rgba(255, 255, 255, 0.15);
		border-radius: 8px;
		backdrop-filter: blur(10px);
	}

	.{{ safeid }}__cart-items {
		display: flex;
		align-items: center;
		gap: 8px;
		font-size: 16px;
	}

	.{{ safeid }}__cart-icon {
		font-size: 20px;
	}

	.{{ safeid }}__cart-text {
		font-weight: 400;
	}

	.{{ safeid }}__cart-text strong {
		font-weight: 700;
		color: var(--gd-white);
	}

	.{{ safeid }}__cart-value {
		font-size: 18px;
		font-weight: 600;
		padding-left: 20px;
		border-left: 2px solid rgba(255, 255, 255, 0.3);
	}

	.{{ safeid }}__cart-value strong {
		font-size: 22px;
		font-weight: 700;
		color: var(--gd-white);
	}

	/* Trust Signals */
	.{{ safeid }}__trust-signals {
		display: flex;
		align-items: center;
		justify-content: center;
		gap: 20px;
		flex-wrap: wrap;
		font-size: 13px;
		opacity: 0.95;
	}

	.{{ safeid }}__trust-item {
		display: flex;
		align-items: center;
		gap: 6px;
	}

	/* CTA Button */
	.{{ safeid }}__cta-section {
		margin-top: 5px;
	}

	.{{ safeid }}__cta-button {
		display: inline-block;
		background: var(--gd-white);
		color: var(--gd-primary-green);
		padding: 14px 32px;
		border-radius: 6px;
		text-decoration: none;
		font-size: 16px;
		font-weight: 700;
		transition: all 0.3s ease;
		box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
		border: 2px solid var(--gd-white);
	}

	.{{ safeid }}__cta-button:hover {
		background: var(--gd-light-green);
		color: var(--gd-white);
		transform: translateY(-2px);
		box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
	}

	.{{ safeid }}__cta-button:active {
		transform: translateY(0);
	}

	/* Animations */
	.{{ safeid }}__animated {
		animation-duration: 0.5s;
	}

	.{{ safeid }}__animate--slideDown {
		animation-name: slideDown;
	}

	@keyframes slideDown {
		from {
			opacity: 0;
			transform: translateY(-100%);
		}
		to {
			opacity: 1;
			transform: translateY(0);
		}
	}

	.{{ safeid }}__animate--slideUp {
		animation-name: slideUp;
	}

	@keyframes slideUp {
		from {
			opacity: 1;
			transform: translateY(0);
		}
		to {
			opacity: 0;
			transform: translateY(-100%);
		}
	}

	/* Mobile Responsive */
	@media (max-width: 768px) {
		.{{ safeid }}__urgency-container {
			padding: 15px 50px 15px 15px;
		}

		.{{ safeid }}__timer-text {
			font-size: 16px;
			flex-direction: column;
			gap: 6px;
		}

		.{{ safeid }}__timer-label {
			font-size: 14px;
		}

		.{{ safeid }}__countdown {
			font-size: 20px;
			padding: 6px 12px;
			min-width: 60px;
		}

		.{{ safeid }}__cart-summary {
			flex-direction: column;
			gap: 12px;
			padding: 12px 15px;
		}

		.{{ safeid }}__cart-value {
			padding-left: 0;
			border-left: none;
			border-top: 2px solid rgba(255, 255, 255, 0.3);
			padding-top: 12px;
		}

		.{{ safeid }}__trust-signals {
			flex-direction: column;
			gap: 8px;
			font-size: 12px;
		}

		.{{ safeid }}__cta-button {
			padding: 12px 24px;
			font-size: 15px;
			width: 100%;
			max-width: 300px;
		}

		.{{ safeid }}__close-button {
			top: 10px;
			right: 10px;
			width: 28px;
			height: 28px;
		}
	}

	@media (max-width: 480px) {
		.{{ safeid }}__urgency-container {
			padding: 12px 45px 12px 12px;
		}

		.{{ safeid }}__timer-icon {
			font-size: 24px;
		}

		.{{ safeid }}__timer-text {
			font-size: 14px;
		}

		.{{ safeid }}__countdown {
			font-size: 18px;
			padding: 5px 10px;
		}

		.{{ safeid }}__cart-items {
			font-size: 14px;
		}

		.{{ safeid }}__cart-value {
			font-size: 16px;
		}

		.{{ safeid }}__cart-value strong {
			font-size: 20px;
		}
	}

	/* Print & Reduced Motion */
	@media print, (prefers-reduced-motion: reduce) {
		.{{ safeid }}__animated {
			animation-duration: 0.01ms !important;
			animation-iteration-count: 1 !important;
		}

		.{{ safeid }}__timer-icon {
			animation: none;
		}

		.{{ safeid }}__countdown {
			animation: none;
		}
	}
</style>

<script type="text/javascript">
(function() {
	'use strict';

	// Variables
	const {{ safeid }}__banner = document.getElementById('{{ safeid }}__cart-urgency');
	const {{ safeid }}__countdownEl = document.getElementById('{{ safeid }}__countdown');
	const {{ safeid }}__cookieName = '{{ safeid }}__cart_urgency_dismissed';
	const {{ safeid }}__timerMinutes = 15; // 15 minutes countdown
	let {{ safeid }}__countdownInterval = null;
	let {{ safeid }}__timeLeft = {{ safeid }}__timerMinutes * 60; // seconds

	// Check if banner should be shown
	function {{ safeid }}__shouldShowBanner() {
		{% if meta.preview == 'true' %}
		// Always show in preview mode
		return true;
		{% else %}
		// Check cookie
		if (document.cookie.indexOf({{ safeid }}__cookieName + '=true') > -1) {
			return false;
		}

		// Check if cart has items (you may need to adjust this based on your cart implementation)
		// This is a placeholder - adjust based on your site's cart structure
		const cartItems = {{ safeid }}__getCartItemCount();
		return cartItems > 0;
		{% endif %}
	}

	// Get cart item count (adjust based on your site structure)
	function {{ safeid }}__getCartItemCount() {
		// Option 1: If Fresh Relevance provides cart data
		{% if cart_item_count %}
			return {{ cart_item_count }};
		{% else %}
			// Option 2: Check DOM for cart count
			const cartCountEl = document.querySelector('.cart-count, .basket-count, [data-cart-count]');
			if (cartCountEl) {
				const count = parseInt(cartCountEl.textContent) || 0;
				return count;
			}
			// Option 3: Check localStorage/sessionStorage
			try {
				const cartData = JSON.parse(localStorage.getItem('cart') || sessionStorage.getItem('cart') || '{}');
				return cartData.items ? cartData.items.length : 0;
			} catch(e) {
				return 0;
			}
		{% endif %}
	}

	// Get cart total (adjust based on your site structure)
	function {{ safeid }}__getCartTotal() {
		{% if cart_total %}
			return '{{ cart_total }}';
		{% else %}
			const cartTotalEl = document.querySelector('.cart-total, .basket-total, [data-cart-total]');
			if (cartTotalEl) {
				return cartTotalEl.textContent.trim();
			}
			return '£0.00';
		{% endif %}
	}

	// Update cart display
	function {{ safeid }}__updateCartDisplay() {
		const itemCount = {{ safeid }}__getCartItemCount();
		const cartTotal = {{ safeid }}__getCartTotal();

		const itemCountEl = document.getElementById('{{ safeid }}__item-count');
		const cartTotalEl = document.getElementById('{{ safeid }}__cart-total');

		if (itemCountEl) {
			itemCountEl.textContent = itemCount;
			// Update plural
			const cartText = itemCountEl.parentElement;
			if (cartText) {
				const pluralText = cartText.textContent.includes('items') ? 'items' : 'item';
				if (itemCount === 1 && pluralText === 'items') {
					cartText.innerHTML = cartText.innerHTML.replace('items', 'item');
				} else if (itemCount !== 1 && pluralText === 'item') {
					cartText.innerHTML = cartText.innerHTML.replace('item', 'items');
				}
			}
		}

		if (cartTotalEl) {
			cartTotalEl.textContent = cartTotal;
		}

		// Hide banner if cart is empty
		if (itemCount === 0) {
			{{ safeid }}__hideBanner();
		}
	}

	// Start countdown timer
	function {{ safeid }}__startCountdown() {
		if ({{ safeid }}__countdownInterval) {
			clearInterval({{ safeid }}__countdownInterval);
		}

		{{ safeid }}__countdownInterval = setInterval(function() {
			{{ safeid }}__timeLeft--;

			if ({{ safeid }}__timeLeft <= 0) {
				clearInterval({{ safeid }}__countdownInterval);
				{{ safeid }}__countdownEl.textContent = '0:00';
				// Optionally hide banner or show expired message
				return;
			}

			const minutes = Math.floor({{ safeid }}__timeLeft / 60);
			const seconds = {{ safeid }}__timeLeft % 60;
			{{ safeid }}__countdownEl.textContent = minutes + ':' + (seconds < 10 ? '0' : '') + seconds;

			// Change color when under 5 minutes
			if ({{ safeid }}__timeLeft < 300) {
				{{ safeid }}__countdownEl.style.background = '#ff6b6b';
				{{ safeid }}__countdownEl.style.color = '#ffffff';
			}
		}, 1000);
	}

	// Show banner
	function {{ safeid }}__showBanner() {
		if (!{{ safeid }}__banner || !{{ safeid }}__shouldShowBanner()) {
			return;
		}

		{{ safeid }}__updateCartDisplay();
		{{ safeid }}__banner.style.display = 'block';
		{{ safeid }}__banner.classList.add('{{ safeid }}__animate--slideDown');
		{{ safeid }}__startCountdown();

		// Track banner shown
		try {
			if (typeof $TB !== 'undefined' && typeof $TB.popoverShown === 'function') {
				$TB.popoverShown('{{ slotid }}');
			}
		} catch(e) {}
	}

	// Hide banner
	function {{ safeid }}__hideBanner() {
		if (!{{ safeid }}__banner) return;

		{{ safeid }}__banner.classList.add('{{ safeid }}__animate--slideUp');
		setTimeout(function() {
			{{ safeid }}__banner.style.display = 'none';
			{{ safeid }}__banner.classList.remove('{{ safeid }}__animate--slideDown', '{{ safeid }}__animate--slideUp');
		}, 500);
	}

	// Dismiss banner (with cookie)
	window.{{ safeid }}__dismissBanner = function() {
		// Set cookie (expires in 24 hours)
		const expires = new Date();
		expires.setTime(expires.getTime() + (24 * 60 * 60 * 1000));
		document.cookie = {{ safeid }}__cookieName + '=true;expires=' + expires.toUTCString() + ';path=/';

		{{ safeid }}__hideBanner();

		// Track dismissal
		try {
			if (typeof $TB !== 'undefined' && typeof $TB.popoverDismissed === 'function') {
				$TB.popoverDismissed('{{ slotid }}');
			}
		} catch(e) {}
	};

	// Track CTA click
	window.{{ safeid }}__trackClick = function() {
		try {
			if (typeof $TB !== 'undefined' && typeof $TB.popoverEvent === 'function') {
				$TB.popoverEvent('{{ uniqueid }}', 19); // Event type 19 = CTA click
			}
		} catch(e) {}
	};

	// Initialize
	function {{ safeid }}__init() {
		{% if meta.preview == 'true' %}
		// Preview mode - always show
		if ({{ safeid }}__banner) {
			{{ safeid }}__banner.style.display = 'block';
			{{ safeid }}__banner.classList.add('{{ safeid }}__animate--slideDown');
			{{ safeid }}__startCountdown();
			// Set preview data
			if ({{ safeid }}__countdownEl) {
				{{ safeid }}__countdownEl.textContent = '15:00';
			}
			const itemCountEl = document.getElementById('{{ safeid }}__item-count');
			const cartTotalEl = document.getElementById('{{ safeid }}__cart-total');
			if (itemCountEl) itemCountEl.textContent = '3';
			if (cartTotalEl) cartTotalEl.textContent = '£49.99';
		}
		{% else %}
		// Production mode - check conditions
		// Wait for DOM to be ready
		if (document.readyState === 'loading') {
			document.addEventListener('DOMContentLoaded', function() {
				setTimeout({{ safeid }}__showBanner, 1000); // Show after 1 second
			});
		} else {
			setTimeout({{ safeid }}__showBanner, 1000);
		}

		// Update cart display periodically (every 5 seconds)
		setInterval({{ safeid }}__updateCartDisplay, 5000);

		// Listen for cart updates (adjust event name based on your site)
		document.addEventListener('cartUpdated', {{ safeid }}__updateCartDisplay);
		document.addEventListener('basketUpdated', {{ safeid }}__updateCartDisplay);
		{% endif %}
	}

	// Start initialization
	{{ safeid }}__init();

	// Cleanup on page unload
	window.addEventListener('beforeunload', function() {
		if ({{ safeid }}__countdownInterval) {
			clearInterval({{ safeid }}__countdownInterval);
		}
	});

})();
</script>
```

---

## Key Features

### ✅ Brand Consistency
- **Colors:** Uses GardeningDirect.co.uk brand green (#537550)
- **Typography:** Inter font family (matches site)
- **Trust Signals:** Includes "Free Delivery Over £49.99", "Double Satisfaction Guarantee", "11,000+ Trusted 5* Reviews"

### ✅ Urgency Elements
- **Countdown Timer:** 15-minute countdown with visual pulse
- **Timer Changes Color:** Red when under 5 minutes
- **Animated Icons:** Pulsing timer icon for attention

### ✅ Cart Information
- **Dynamic Cart Count:** Shows number of items
- **Cart Total:** Displays total value
- **Auto-Updates:** Refreshes when cart changes

### ✅ User Experience
- **Dismissible:** Close button with cookie memory (24 hours)
- **Mobile Responsive:** Optimized for all screen sizes
- **Smooth Animations:** Slide down/up animations
- **Accessibility:** ARIA labels, keyboard support

### ✅ Integration Ready
- **Fresh Relevance Events:** Tracks banner shown, dismissed, CTA clicked
- **Cookie Management:** Remembers dismissal for 24 hours
- **Cart Detection:** Multiple methods to detect cart items

---

## Customization Options

### Adjust Countdown Time
Change line: `const {{ safeid }}__timerMinutes = 15;` to desired minutes

### Change Colors
Update CSS variables at the top:
```css
--gd-primary-green: #537550;
--gd-dark-green: #2d5016;
```

### Modify Trust Signals
Edit the trust signals section in HTML to match your messaging

### Adjust Display Delay
Change `setTimeout({{ safeid }}__showBanner, 1000);` to desired delay in milliseconds

---

## Testing Checklist

- [ ] Banner appears when cart has items
- [ ] Countdown timer works correctly
- [ ] Cart count updates dynamically
- [ ] Cart total displays correctly
- [ ] Close button works and sets cookie
- [ ] Banner doesn't show again after dismissal (24 hours)
- [ ] CTA button links to cart page
- [ ] Mobile responsive design works
- [ ] Animations are smooth
- [ ] Trust signals display correctly

---

## Troubleshooting: Preview Not Showing

If the preview doesn't show in Fresh Relevance, try these fixes:

### Fix 1: Check Preview Mode
Make sure you're in **Preview Mode** in Fresh Relevance. The code checks for `meta.preview == "true"`.

### Fix 2: Force Display (Temporary)
If preview still doesn't show, temporarily change this line:
```html
<div id="{{ safeid }}__cart-urgency" class="{{ safeid }}__cart-urgency-banner {{ safeid }}__animated" style="display: block !important;">
```
Remove the conditional and use `style="display: block !important;"` directly.

### Fix 3: Check JavaScript Errors
Open browser console (F12) and check for JavaScript errors. The code should work even if some functions fail.

### Fix 4: Verify Safe ID
Make sure `{{ safeid }}` is being replaced by Fresh Relevance. If not, the CSS won't apply correctly.

### Fix 5: Minimal Test Version
If nothing works, try this minimal version first:
```html
<div style="background: #537550; color: white; padding: 20px; text-align: center;">
	<h2>Cart Urgency Banner - Preview Test</h2>
	<p>If you see this, the block is working!</p>
</div>
```

### Fix 6: Check Fresh Relevance Settings
- Ensure the block type is set to "HTML" or "Code"
- Check that preview mode is enabled
- Verify the slot is assigned to the experience

---

**Block Version:** 1.1  
**Last Updated:** December 5, 2025  
**Theme:** GardeningDirect.co.uk  
**Compatibility:** Fresh Relevance by dotdigital  
**Preview Mode:** Fixed - Now shows automatically in preview

