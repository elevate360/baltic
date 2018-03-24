( function( $ ) {

	var baltic = baltic || {};

	baltic.init = function() {

		baltic.$body 	= $( document.body ),
		baltic.$window 	= $( window ),
		baltic.$html 	= $( 'html' ),
		baltic.$header  = $( '.site-header' );

		this.inlineSVG();
		this.fitVids();
		this.smoothScroll();
		this.stickyHeader();
		this.headerMenuToggle();
		this.subMenuToggle();
		this.jumbotronHeader();
		this.headerCartToggle();
		this.matchHeight();
		this.returnToTop();
		this.stickyOrder();
		this.homepageSlider();
		this.productsSlider();
		this.tweetsSlider();
		this.wcQuickView();
		this.bind();

	};

	baltic.supportsInlineSVG = function() {

		var div = document.createElement( 'div' );
		div.innerHTML = '<svg/>';
		return 'http://www.w3.org/2000/svg' === ( 'undefined' !== typeof SVGRect && div.firstChild && div.firstChild.namespaceURI );

	};

	baltic.inlineSVG = function() {

		if ( true === baltic.supportsInlineSVG() ) {
			document.documentElement.className = document.documentElement.className.replace( /(\s*)no-svg(\s*)/, '$1svg$2' );
		}

	};

	baltic.preloader = function() {

		$( '.site-preloader' ).fadeOut(500);
		$( '.preloader-enabled' ).delay(500).css({ 'overflow':'visible' });

	};

	baltic.fitVids = function() {

		$( '#page' ).fitVids({
			customSelector: 'iframe[src^="https://videopress.com"]'
		});

	};

	baltic.smoothScroll = function() {

		var $smoothScroll 		= $( 'a[href*="#page"], a[href*="#content"], a[href*="#site-navigation"], a[href*="#secondary"], a[href*="#tertiary"]' );

		$smoothScroll.click(function(event) {
	        // On-page links
	        if (
	            location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') &&
	            location.hostname === this.hostname
	        ) {
	            // Figure out element to scroll to
	            var target = $(this.hash);
	            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
	            // Does a scroll target exist?
	            if (target.length) {
	                // Only prevent default if animation is actually gonna happen
	                event.preventDefault();
	                $('html, body').animate({
	                    scrollTop: target.offset().top
	                }, 500, function() {
	                    // Callback after animation
	                    // Must change focus!
	                    var $target = $(target);
	                    $target.focus();
	                    if ($target.is(':focus')) { // Checking if the target was focused
	                        return false;
	                    } else {
	                        $target.attr( 'tabindex', '-1' ); // Adding tabindex for elements not focusable
	                        $target.focus(); // Set focus again
	                    }
	                });
	            }
	        }
		});

	};

	baltic.stickyHeader = function() {

		baltic.$header.stickit({
			screenMinWidth: 782,
			zIndex: 5
		});

	};

	baltic.headerMenuToggle = function() {

		var $headerMenuToggle 	= $( '.header-menu-toggle' ),
			$mainNav 			= $( '.main-navigation, .site-header-cart' );

		$headerMenuToggle.on( 'click', function( e ){

			e.preventDefault();
			$(this).toggleClass( 'toggled' );
			$mainNav.attr( 'aria-expanded', function( index, value ) {
				return 'false' === value ? 'true' : 'false';
			});
			$mainNav.toggleClass( 'show' );

		});

	};

	baltic.subMenuToggle = function() {

		$( '.sub-menu-toggle' ).on( 'click', function( e ) {
			e.preventDefault();
			var $this = $( this );
			$this.attr( 'aria-expanded', function( index, value ) {
				return 'false' === value ? 'true' : 'false';
			});
			$this.toggleClass( 'toggled' );
			var toggleElement = $this.closest( 'li' ).children( '.sub-menu' );
			toggleElement.slideToggle(0);
		});

	};

	baltic.jumbotronHeader = function() {

		$( '.jumbotron-header' ).each( function(){

			var $this = $(this);
			var $hasPostThumbnail = $this.find( '.jumbotron-header-thumbnail' );
			var headerHeight = baltic.$header.height();

			if ( $hasPostThumbnail.length !== 0 ) {
				$this.addClass( 'has-archive-thumbnail' );
				if ( baltic.$window.width() > 768 ) {
					$this.css( 'min-height', 'calc( 75vh - '+ headerHeight +'px )' );
				}
			}

		});

	};

	baltic.headerCartToggle = function() {

		var $cartLink 	= $( 'a.header-cart-link' ),
			$widget 	= $( '.header-cart-content' );

		$cartLink.on( 'click', function( e ) {
			e.stopPropagation();
			e.preventDefault();
			$(this).addClass( 'toggled' );
			$widget.toggleClass( 'show' );
		});

		baltic.$html.click( function( e ) {

			if ( $cartLink.hasClass( 'toggled' ) || $widget.hasClass( 'show' ) ) {
				if( !$( e.target ).is( '.header-cart-content, .header-cart-content *' ) ){
					$cartLink.removeClass( 'toggled' );
					$widget.removeClass( 'show' );
				}
			}

		});

	};

	baltic.matchHeight = function() {

		var	$matchHeight 		= $( '.columns' ).find( '.entry-inner' ),
			$matchHeightProduct = $( 'ul.products' ).find( '.entry-product' );

		$matchHeight.matchHeight();
		$matchHeightProduct.matchHeight();

	};

	baltic.returnToTop = function() {

		var $returnTop = $( '.return-to-top' );

		baltic.$window.scroll( function () {

		    if ( $(this).scrollTop() > 250 ) {
		        $returnTop.removeClass( 'off' ).addClass( 'on' );
		    }
		    else {
		        $returnTop.removeClass( 'on' ).addClass( 'off' );
		    }

		});

	};

	baltic.stickyOrder = function() {

		$( '#order_review' ).stickit({
			screenMinWidth: 782,
			top: 60,
			zIndex: 0
		});

	};

	baltic.homepageSlider = function() {

		var $slide = $( '.baltic-homepage-slider-container' ),
			effect = $slide.parent().data( 'fade' ),
			headerHeight = baltic.$header.height();

		if ( baltic.$window.width() > 768 ) {
			$( '.slide-inner' ).css( 'min-height', 'calc( 100vh - '+ headerHeight +'px )' );
		}

		$( '.baltic-homepage-slider-container' ).not('.slick-initialized').slick({
			lazyLoad: 'progressive',
			infinite: true,
			adaptiveHeight: true,
			slidesToScroll: 1,
			fade: effect,
			slidesToShow: 1,
			autoplay: true,
			autoplaySpeed: 5000,
			arrows: true,
            dots: true,
            pauseOnHover: false,
            dotsClass: 'baltic-slick-dots',
            prevArrow: Balticl10n.sliderPrevBtn,
            nextArrow: Balticl10n.sliderNextBtn,
			responsive: [
				{
					breakpoint: 788,
					settings: {
						fade: true,
						slidesToShow: 1
					}
				}
			]
		});

	};

	baltic.productsSlider = function() {

		var $slider 	 = $( '.homepage-section.slider' );

	    if ( 'undefined' === typeof $slider ) {
	        return;
	    }

		$slider.each( function(){

			var $this 		 = $(this),
				sliderID 	 = $this.attr('id'),
				columns 	 = $this.data('columns');

			$( '#' + sliderID + ' .products' ).not('.slick-initialized').slick({
				lazyLoad: 'progressive',
				infinite: true,
				adaptiveHeight: true,
				slidesToScroll: 1,
				fade: false,
				slidesToShow: columns,
				autoplay: true,
				autoplaySpeed: 5000,
				arrows: false,
	            dots: true,
	            pauseOnHover: false,
	            dotsClass: 'baltic-slick-dots',
				responsive: [
					{
						breakpoint: 788,
						settings: {
							fade: false,
							slidesToShow: 2
						}
					}
				]
			});

		});

	};

	baltic.tweetsSlider = function() {

		var $slider 	 = $( '.homepage-section.slider' );

	    if ( 'undefined' === typeof $slider ) {
	        return;
	    }

	    $slider.each( function() {

			var $this 		 = $(this),
				sliderID 	 = $this.attr('id'),
				columns 	 = $this.data('columns');

			$( '#' + sliderID + ' .baltic-twitter' ).not('.slick-initialized').slick({
				lazyLoad: 'progressive',
				infinite: true,
				adaptiveHeight: true,
				slidesToScroll: 1,
				fade: false,
				slidesToShow: columns,
				autoplay: true,
				autoplaySpeed: 5000,
				arrows: false,
	            dots: true,
	            pauseOnHover: false,
	            dotsClass: 'baltic-slick-dots',
				responsive: [
					{
						breakpoint: 788,
						settings: {
							fade: false,
							slidesToShow: 2
						}
					}
				]
			});

	    });

	};

	baltic.wcQuickView = function() {

		var $body 				= $( 'body' ),
			$quickView			= $( 'a.ajax-quick-view' ),
			$quickViewContainer = $( '#quick-view-container' ),
			$closeQuickView		= $( '.close-quick-view'),
			$quickViewContent 	= $( '#quick-view-content');

		$quickView.on( 'click', function( e ){

			e.preventDefault();

			$body.css({ 'overflow':'hidden' });
			$quickViewContainer.removeClass( 'hide' ).addClass( 'show' );
			$quickViewContainer.attr( 'tabindex', '-1' );
			$quickViewContainer.focus();

			$quickViewContainer.append( '<div class="quick-view-ajax-loader spinner">'+ Balticl10n.loader +'</div>' );

	        $.ajax({

	            url: Balticl10n.ajax_url,
	            data: {
	                action: 'baltic_product_quick_view',
	                product_id: $(this).attr('data-product_id')
	            },
	            dataType: 'html',
	            type: 'POST',
	            success: function ( data ) {

	            	$('.quick-view-ajax-loader').fadeOut( 'slow', function(){
	            		$(this).remove();
	            	});
	            	$quickViewContent.html(data).addClass( 'shadow' );

					var form_variation = $quickViewContent.find( '.variations_form' );
					form_variation.wc_variation_form();
					form_variation.trigger( 'check_variations' );

					var product_gallery = $quickViewContent.find( '.woocommerce-product-gallery' );
					product_gallery.each( function() {
						$( this ).wc_product_gallery();
						$( this ).ajaxComplete( function(){
							$(this).trigger( 'woocommerce_gallery_reset_slide_position' );
						});
					} );

	            }

			});
		});

		$closeQuickView.on( 'click', function( e ){

			e.preventDefault();

			$quickViewContent.removeClass( 'shadow' );
			$quickViewContainer.removeClass( 'show' ).addClass( 'hide' );
			$body.css({ 'overflow':'visible' });
			$( '#quick-view-modal > .product' ).remove();

		});

	};

	baltic.bind = function() {

		baltic.$window.on( 'load', function() {
			baltic.preloader();
		});

		baltic.$body.on( 'lazyload', function() {
			baltic.fitVids();
		});

		baltic.$body.on( 'wc_fragments_refreshed', function () {
			baltic.stickyOrder();
		});

	    if ( 'undefined' === typeof jetpackLazyImagesModule ) {
	        return;
	    }

		baltic.$body.on( 'afterChange', function () {
			jetpackLazyImagesModule( $ );
			baltic.matchHeight();
		});

	};

	$( window ).on( 'load', function() {
		baltic.preloader();
	});

	/** Initialize baltic.init() */
	$( function() {

		baltic.init();

	    if ( 'undefined' === typeof wp || ! wp.customize || ! wp.customize.selectiveRefresh ) {
	        return;
	    }

	    wp.customize.selectiveRefresh.bind( 'partial-content-rendered', function( placement ) {

	        if ( placement.container ) {

	            baltic.homepageSlider();
	            baltic.productsSlider();
	            baltic.tweetsSlider();
	            baltic.matchHeight();

	        }

	    } );

	});

} )( jQuery );

/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var container, button, menu, links, i, len;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}

	/**
	 * Toggles `focus` class to allow submenu access on tablets.
	 */
	( function( container ) {
		var touchStartFn, i,
			parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

		if ( 'ontouchstart' in window ) {
			touchStartFn = function( e ) {
				var menuItem = this.parentNode, i;

				if ( ! menuItem.classList.contains( 'focus' ) ) {
					e.preventDefault();
					for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
						if ( menuItem === menuItem.parentNode.children[i] ) {
							continue;
						}
						menuItem.parentNode.children[i].classList.remove( 'focus' );
					}
					menuItem.classList.add( 'focus' );
				} else {
					menuItem.classList.remove( 'focus' );
				}
			};

			for ( i = 0; i < parentLink.length; ++i ) {
				parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
			}
		}
	}( container ) );
} )();

/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
( function() {
	var isIe = /(trident|msie)/i.test( navigator.userAgent );

	if ( isIe && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var id = location.hash.substring( 1 ),
				element;

			if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
				return;
			}

			element = document.getElementById( id );

			if ( element ) {
				if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
} )();
