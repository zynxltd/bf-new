/* Template	:	AppsLand v1.1 */
;(function($){
	'use strict';
	var $win = $(window), $body = $('body');
	// Smooth scrolling using jQuery easing
	$('a.nav-item[href*="#"]:not([href="#"])').on("click", function() {
		if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
		  var toHash = $(this.hash), toHashN = (this.hash.slice(1)) ? $('[name=' + this.hash.slice(1) + ']') : false;
		  toHash = toHash.length ? toHash : toHashN;
		  if (toHash.length) {
			$('html, body').animate({
			  scrollTop: (toHash.offset().top - 70)
			}, 1000, "easeInOutExpo");
			return false;
		  }
		}
	});
	
	// Nav collapse
	$('.nav-item').on("click",function() {
		$('.navbar-collapse').collapse('hide');
		$('.dropdown').removeClass('open').children('.dropdown-menu').removeAttr('style');
	});
	
	// Bootstrap Dropdown 
	var $dropdown_menu = $('.dropdown');	
	if ($dropdown_menu.length > 0 ) {
		$dropdown_menu.on("mouseover",function(){
			if ($win.width() > 991) {
				$('.dropdown-menu', this).not('.in .dropdown-menu').stop().fadeIn("400");
				$(this).addClass('open'); 
			}
		});
		$dropdown_menu.on("mouseleave",function(){
			if ($win.width() > 991) {
				$('.dropdown-menu', this).not('.in .dropdown-menu').stop().fadeOut("400");
				$(this).removeClass('open'); 
			}
		});
		$dropdown_menu.on("click",function(){
			if ($win.width() < 991) {
				$(this).children('.dropdown-menu').slideToggle(500);
				return false;
			}
		});
	}
	$win.on('resize', function() {
		$('.navbar-collapse').removeClass('in');
		$dropdown_menu.children('.dropdown-menu').fadeOut("400");
	});
	
	// navigation ScrolSpy
	$body.scrollspy({
		target: '#navigation',
		offset: 90
	});
	
	// Add scroll class to navigation for glass effect
	function updateNavigationScroll() {
		if ($win.scrollTop() > 50) {
			$('#navigation').addClass('scrolled');
		} else {
			$('#navigation').removeClass('scrolled');
		}
	}
	
	$win.on('scroll', updateNavigationScroll);
	$win.on('load', updateNavigationScroll);
	
	// Trigger on page load if already scrolled
	$(document).ready(function() {
		updateNavigationScroll();
		// Also check after a short delay to ensure it works
		setTimeout(updateNavigationScroll, 100);
		setTimeout(updateNavigationScroll, 300);
		
		// Desktop Slide-Out Menu
		function initDesktopMenu() {
			var $desktopMenuToggle = $('#desktopMenuToggle');
			var $desktopSlideMenu = $('#desktopSlideMenu');
			var $desktopMenuOverlay = $('#desktopMenuOverlay');
			var $desktopMenuClose = $('#desktopMenuClose');
			
			// Check if elements exist
			if ($desktopMenuToggle.length === 0 || $desktopSlideMenu.length === 0) {
				console.log('Desktop menu elements not found');
				return;
			}
			
			// Flag to prevent document click from closing menu immediately after opening
			var menuJustOpened = false;
			
			function openDesktopMenu() {
				menuJustOpened = true;
				$desktopMenuToggle.addClass('active');
				$desktopSlideMenu.addClass('active');
				$desktopMenuOverlay.addClass('active');
				$('body').css('overflow', 'hidden');
				// Reset flag after a short delay
				setTimeout(function() {
					menuJustOpened = false;
				}, 200);
			}
			
			function closeDesktopMenu() {
				$desktopMenuToggle.removeClass('active');
				$desktopSlideMenu.removeClass('active');
				$desktopMenuOverlay.removeClass('active');
				$('body').css('overflow', '');
			}
			
			// Remove any existing handlers and attach new ones
			$desktopMenuToggle.off('click').on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();
				e.stopImmediatePropagation();
				console.log('Hamburger clicked');
				if ($desktopSlideMenu.hasClass('active')) {
					closeDesktopMenu();
				} else {
					openDesktopMenu();
				}
				return false;
			});
			
			if ($desktopMenuClose.length > 0) {
				$desktopMenuClose.off('click').on('click', function(e) {
					e.preventDefault();
					e.stopPropagation();
					closeDesktopMenu();
				});
			}
			
			if ($desktopMenuOverlay.length > 0) {
				$desktopMenuOverlay.off('click').on('click', function(e) {
					e.preventDefault();
					e.stopPropagation();
					closeDesktopMenu();
				});
			}
			
			// Close menu when clicking outside (on the page/document)
			$(document).off('click.desktopMenu').on('click.desktopMenu', function(e) {
				// Skip if menu was just opened
				if (menuJustOpened) {
					return;
				}
				
				// Only close if menu is active and click is outside the menu
				if ($desktopSlideMenu.hasClass('active')) {
					// Check if click is outside the menu and not on the toggle button
					if (!$desktopSlideMenu.is(e.target) && 
						$desktopSlideMenu.has(e.target).length === 0 && 
						!$desktopMenuToggle.is(e.target) && 
						$desktopMenuToggle.has(e.target).length === 0 &&
						!$(e.target).closest('#desktopMenuToggle').length) {
						closeDesktopMenu();
					}
				}
			});
			
			// Prevent clicks inside the menu from closing it
			$desktopSlideMenu.off('click').on('click', function(e) {
				e.stopPropagation();
			});
			
			// Close menu when clicking nav links
			$('.desktop-slide-menu-nav a').off('click').on('click', function() {
				closeDesktopMenu();
			});
			
			// Close menu on ESC key
			$(document).off('keydown.desktopMenu').on('keydown.desktopMenu', function(e) {
				if (e.key === 'Escape' && $desktopSlideMenu.hasClass('active')) {
					closeDesktopMenu();
				}
			});
		}
		
		// Initialize desktop menu
		initDesktopMenu();
		
		// Also try after a short delay in case DOM isn't fully ready
		setTimeout(initDesktopMenu, 100);
		setTimeout(initDesktopMenu, 500);
		
		// Also initialize on window load
		$(window).on('load', function() {
			setTimeout(initDesktopMenu, 100);
		});
		
		// Use event delegation as fallback - this should always work
		$(document).off('click', '#desktopMenuToggle').on('click', '#desktopMenuToggle', function(e) {
			e.preventDefault();
			e.stopPropagation();
			e.stopImmediatePropagation();
			console.log('Hamburger clicked via delegation');
			
			var $menu = $('#desktopSlideMenu');
			var $toggle = $('#desktopMenuToggle');
			var $overlay = $('#desktopMenuOverlay');
			
			console.log('Menu element:', $menu.length, 'Toggle:', $toggle.length, 'Overlay:', $overlay.length);
			
			if ($menu.length === 0 || $overlay.length === 0) {
				console.error('Menu elements not found!');
				return false;
			}
			
			if ($menu.hasClass('active')) {
				console.log('Closing menu');
				$toggle.removeClass('active');
				$menu.removeClass('active');
				$overlay.removeClass('active');
				$('body').css('overflow', '');
			} else {
				console.log('Opening menu');
				$toggle.addClass('active');
				$menu.addClass('active');
				$overlay.addClass('active');
				$('body').css('overflow', 'hidden');
			}
			
			return false;
		});
		
		// Also add vanilla JS fallback
		document.addEventListener('DOMContentLoaded', function() {
			var toggle = document.getElementById('desktopMenuToggle');
			var menu = document.getElementById('desktopSlideMenu');
			var overlay = document.getElementById('desktopMenuOverlay');
			
			if (toggle && menu && overlay) {
				toggle.addEventListener('click', function(e) {
					e.preventDefault();
					e.stopPropagation();
					e.stopImmediatePropagation();
					console.log('Hamburger clicked via vanilla JS');
					
					if (menu.classList.contains('active')) {
						toggle.classList.remove('active');
						menu.classList.remove('active');
						overlay.classList.remove('active');
						document.body.style.overflow = '';
					} else {
						toggle.classList.add('active');
						menu.classList.add('active');
						overlay.classList.add('active');
						document.body.style.overflow = 'hidden';
					}
					
					return false;
				}, true); // Use capture phase
			}
		});
	});
	
	//magnificPopup	Video
	var $video_play = $('.video-play');
	if ($video_play.length > 0 ) {
		$video_play.magnificPopup({
			type: 'iframe',
			removalDelay: 160,
			preloader: true,
			fixedContentPos: false
		});
	}
	
	//magnificPopup	Content
	var $content_popup = $('.content-popup');
	if ($content_popup.length > 0 ) {
		$content_popup.magnificPopup({
			type: 'inline',
			preloader: true,
			removalDelay: 400,
			mainClass: 'mfp-fade bg-gradiant'
		});
	}
	
	
	//Carousel
	var $has_carousel = $('.has-carousel');
	if ($has_carousel.length > 0 ) {
		$has_carousel.each(function(){
		  var $self = $(this);
		  var c_item = ($self.data('items')) ? $self.data('items') : 4;
		  var c_item_t = (c_item >= 3) ? 3 : c_item;
		  var c_item_m = (c_item_t >= 2) ? 2 : c_item_t;
		  var c_delay =($self.data('delay')) ? $self.data('delay') : 6000;
		  var c_auto =($self.data('auto')) ? true : false;
		  var c_loop =($self.data('loop')) ? true : false;
		  var c_dots = ($self.data('dots')) ? true : false;
		  var c_navs = ($self.data('navs')) ? true : false;
		  var c_ctr = ($self.data('center')) ? true : false;
		  var c_mgn = ($self.data('margin')) ? $self.data('margin') : 30;
		  var c_animateOut = ($self.data('animateOut')) ? $self.data('animateOut') : 'fadeOut';
		  $self.owlCarousel({
			navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
			items: c_item, loop: c_loop, nav: c_navs, dots: c_dots, margin: c_mgn, center: c_ctr, animateOut: c_animateOut, 
			autoplay: c_auto, autoplayTimeout: c_delay, autoplaySpeed: 300, 
			responsive:{ 0:{ items:1 }, 480:{ items: c_item_m }, 768:{ items: c_item_t }, 1170:{ items: c_item } }
		  });
		});
	}

	//ImageBG
	var $imageBG = $('.imagebg');
	if ($imageBG.length > 0) {
		$imageBG.each(function(){
			var $this = $(this), 
				$that = $this.parent(),
				overlay = $this.data('overlay'),
				image = $this.children('img').attr('src');
			var olaytyp = (typeof overlay!=='undefined' && overlay!=='') ? overlay.split('-') : false;
			
			// If image found
			if (typeof image!=='undefined' && image !==''){
				if (!$that.hasClass('has-bg-image')) {
					$that.addClass('has-bg-image');
				}
				if ( olaytyp!=='' && (olaytyp[0]==='dark') ) {
					if (!$that.hasClass('light')) {
						$that.addClass('light');
					}
				}
				$this.css("background-image", 'url("'+ image +'")').addClass('bg-image-loaded');
			}
		});
	}

	// FORMS
	var quoteForm = $('#contact-form');
	if (quoteForm.length > 0) {
	  if( !$().validate || !$().ajaxSubmit ) {
		  console.log('quoteForm: jQuery Form or Form Validate not Defined.');
		  return true;
	  }
	  // Quote Form - home page
	  if (quoteForm.length > 0) {
		  var selectRec = quoteForm.find('select.required'), 
		  qf_results = quoteForm.find('.form-results');
		  quoteForm.validate({
			invalidHandler: function () { qf_results.slideUp(400); },
			submitHandler: function(form) {
			  qf_results.slideUp(400);
			  $(form).ajaxSubmit({
				target: qf_results, dataType: 'json',
				success: function(data) {
				  var type = (data.result==='error') ? 'alert-danger' : 'alert-success';
				  qf_results.removeClass( 'alert-danger alert-success' ).addClass( 'alert ' + type ).html(data.message).slideDown(400);
				  if (data.result !== 'error') { $(form).clearForm(); }
				}
			  });
			}
		  });
		  selectRec.on('change', function() { $(this).valid(); });
	  }
	}
	
	// Preloader is now handled by inline script in app.blade.php
	// Disabled to prevent conflicts with the delayed preloader
	// var $preload = $('#preloader');
	// var preloaderHidden = false;
	// 
	// var hidePreloader = function() {
	// 	if (preloaderHidden) return;
	// 	preloaderHidden = true;
	// 	
	// 	var preloader = document.getElementById('preloader');
	// 	if (preloader) {
	// 		preloader.classList.add('fade-out');
	// 		setTimeout(function() {
	// 			if (preloader && preloader.parentNode) {
	// 				preloader.remove();
	// 			}
	// 			document.body.style.overflow = 'visible';
	// 			$('body').css({'overflow':'visible'});
	// 		}, 150);
	// 	}
	// };
	// 
	// if ($preload.length > 0) {
	// 	// Immediate fallback - hide after 300ms no matter what
	// 	setTimeout(hidePreloader, 300);
	// 	
	// 	// Hide on window load
	// 	$(window).on('load', function() {
	// 		setTimeout(hidePreloader, 50);
	// 	});
	// 	
	// 	// Also hide when DOM is ready
	// 	$(document).ready(function() {
	// 		setTimeout(hidePreloader, 200);
	// 	});
	// 	
	// 	// Final fallback after 1 second
	// 	setTimeout(hidePreloader, 1000);
	// }
	
	//WOW init
	new WOW().init();
	
	// particlesJS
	var $particles_js = $('#particles-js');
	if ($particles_js.length > 0 ) {
		particlesJS('particles-js',
		// Update your personal code.
        {
		  "particles": {
			"number": {
			  "value": 80,
			  "density": {
				"enable": true,
				"value_area": 800
			  }
			},
			"color": {
			  "value": "#ffffff"
			},
			"shape": {
			  "type": "circle",
			  "stroke": {
				"width": 0,
				"color": "#000000"
			  },
			  "polygon": {
				"nb_sides": 5
			  },
			  "image": {
				"src": "img/github.svg",
				"width": 100,
				"height": 100
			  }
			},
			"opacity": {
			  "value": 0.5,
			  "random": false,
			  "anim": {
				"enable": false,
				"speed": 1,
				"opacity_min": 0.1,
				"sync": false
			  }
			},
			"size": {
			  "value": 3,
			  "random": true,
			  "anim": {
				"enable": false,
				"speed": 40,
				"size_min": 0.1,
				"sync": false
			  }
			},
			"line_linked": {
			  "enable": true,
			  "distance": 150,
			  "color": "#ffffff",
			  "opacity": 0.4,
			  "width": 1.3
			},
			"move": {
			  "enable": true,
			  "speed": 6,
			  "direction": "none",
			  "random": false,
			  "straight": false,
			  "out_mode": "out",
			  "bounce": false,
			  "attract": {
				"enable": false,
				"rotateX": 600,
				"rotateY": 1200
			  }
			}
		  },
		  "interactivity": {
			"detect_on": "canvas",
			"events": {
			  "onhover": {
				"enable": true,
				"mode": "repulse"
			  },
			  "onclick": {
				"enable": true,
				"mode": "push"
			  },
			  "resize": true
			},
			"modes": {
			  "grab": {
				"distance": 400,
				"line_linked": {
				  "opacity": 1
				}
			  },
			  "bubble": {
				"distance": 400,
				"size": 40,
				"duration": 2,
				"opacity": 8,
				"speed": 3
			  },
			  "repulse": {
				"distance": 200,
				"duration": 0.4
			  },
			  "push": {
				"particles_nb": 4
			  },
			  "remove": {
				"particles_nb": 2
			  }
			}
		  },
		  "retina_detect": true
		}
		// Stop here.
      );
	}
	
	// Active page menu when click
	var url = window.location.href;
	var $nav_link = $(".dropdown li a");
	$nav_link.each(function() {
		if (url === (this.href)) {
			$(this).closest("li").addClass("active");
		}
	});
})(jQuery);