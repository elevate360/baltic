( function( $ ) {

	var baltic = baltic || {};

	baltic.init = function() {

		baltic.$body 	= $( document.body ),
		baltic.$window 	= $( window ),
		baltic.$html 	= $( 'html' );

		this.inlineSVG();
		//this.preloader();
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

		$( '.site-header' ).stickit({
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
			var headerHeight = $( '.site-header' ).height();

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

		baltic.$body.on( 'wc_fragments_refreshed', function () {
			baltic.stickyOrder();
		});

		baltic.$body.on( 'lazyload', function() {
			baltic.fitVids();
		});

		baltic.$window.on( 'load', function() {
			baltic.preloader();
		});

	};

	/** Initialize baltic.init() */
	$( function() {
		baltic.init();
	});



} )( jQuery );
