( function( $ ) {

	$.fn.parallax = function () {
		var window_width = $(window).width();
		// Parallax Scripts
		return this.each(function(i) {
			var $this = $(this);
			$this.addClass('parallax');

			function updateParallax(initial) {
				var container_height;
				if (window_width < 601) {
					container_height = ($this.height() > 0) ? $this.height() : $this.children("img").height();
				}
				else {
					container_height = ($this.height() > 0) ? $this.height() : 500;
				}

				var $img = $this.children("img").first();
				var img_height = $img.height();
				var parallax_dist = img_height - container_height;
				var bottom = $this.offset().top + container_height;
				var top = $this.offset().top;
				var scrollTop = $(window).scrollTop();
				var windowHeight = window.innerHeight;
				var windowBottom = scrollTop + windowHeight;
				var percentScrolled = (windowBottom - top) / (container_height + windowHeight);
				var parallax = Math.round((parallax_dist * percentScrolled));

				if (initial) {
					$img.css('display', 'block');
				}
				if ((bottom > scrollTop) && (top < (scrollTop + windowHeight))) {
					$img.css('transform', "translate3D(-50%," + parallax + "px, 0)");
				}

			}

			// Wait for image load
			$this.children("img").one("load", function() {
			updateParallax(true);
			}).each(function() {
				if (this.complete) $(this).trigger("load");
			});

			$(window).scroll(function() {
				window_width = $(window).width();
				updateParallax(false);
			});

			$(window).resize(function() {
				window_width = $(window).width();
				updateParallax(false);
			});

		});

	};

	/*
	 * Test if inline SVGs are supported.
	 * @link https://github.com/Modernizr/Modernizr/
	 */
	function supportsInlineSVG() {
		var div = document.createElement( 'div' );
		div.innerHTML = '<svg/>';
		return 'http://www.w3.org/2000/svg' === ( 'undefined' !== typeof SVGRect && div.firstChild && div.firstChild.namespaceURI );
	}

	function _headerMenuToggle() {

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

	}

	function _subMenuToggle() {

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

	}

	// Smooth scroll
	function _smoothScroll() {

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

	}

	function _fitVids() {
		$( '#page' ).fitVids({
			customSelector: 'iframe[src^="https://videopress.com"]'
		});
	}

	function _headerParallax() {
		$( '.page-header' ).each( function(){
			var $this = $(this);
			var $hasPostThumbnail = $this.find( 'figure.page-header-thumbnail' );
			var headerHeight = $( '.site-header' ).height();

			if ( $hasPostThumbnail.length !== 0 ) {
				$this.addClass( 'has-archive-thumbnail' );
				$this.css( 'min-height', 'calc( 60vh - '+ headerHeight +'px )' );
			}

			$hasPostThumbnail.parallax();

		});
	}

	function _matchHeightElements() {
		var	$matchHeight 		= $( '.columns' ).find( '.entry-inner' ),
			$matchHeightProduct = $( 'ul.products' ).find( '.entry-product' );

		$matchHeight.matchHeight();
		$matchHeightProduct.matchHeight();
	}

	function _returnTop() {
		$returnTop 			= $( '.return-to-top' );
		$(window).scroll(function () {

		    if ($(this).scrollTop() > 250) {
		        $returnTop.removeClass( 'off' ).addClass( 'on' );
		    }
		    else {
		        $returnTop.removeClass( 'on' ).addClass( 'off' );
		    }

		});
	}

	function _headerCartToggle() {

		var $cartLink 	= $( 'a.header-cart-link' ),
			$widget 	= $( '.header-cart-content' );

		$cartLink.on( 'click', function( e ) {
			e.stopPropagation();
			e.preventDefault();
			$(this).addClass( 'toggled' );
			$widget.toggleClass( 'show' );
		});

		$( 'html' ).click( function( e ) {

			if ( $cartLink.hasClass( 'show' ) || $widget.hasClass( 'show' ) ) {
				if( !$(e.target).is( '.header-cart-content, .header-cart-content *' ) ){
					$cartLink.removeClass( 'toggled' );
					$widget.removeClass( 'show' );
				}
			}

		});

	}

	function _stickyCheckout() {
		$( '#order_review' ).stickit({
			screenMinWidth: 782,
			top: 60,
			zIndex: 0
		});
	}

	$( window ).on( 'load', function() {
		$( '.site-preloader' ).fadeOut(500);
		$( '.preloader-enabled' ).delay(500).css({ 'overflow':'visible' });
	});

	$( document ).ready( function() {

		if ( true === supportsInlineSVG() ) {
			document.documentElement.className = document.documentElement.className.replace( /(\s*)no-svg(\s*)/, '$1svg$2' );
		}

		$( '.site-header' ).stickit({
			screenMinWidth: 782,
			zIndex: 5
		});

		_headerMenuToggle();
		_subMenuToggle();

		_fitVids();
		_smoothScroll();
		_headerParallax();
		_headerCartToggle();
		_returnTop();

		_matchHeightElements();

		_stickyCheckout();

	});

	$( document.body ).on( 'wc_fragments_refreshed', function () {
		_stickyCheckout();
	});

	$( document.body).on( 'lazyload', function() {
		_fitVids();
		_headerParallax();
	});

} )( jQuery );
