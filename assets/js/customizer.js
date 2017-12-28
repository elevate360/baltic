/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $, api ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	api( 'show_preloader', function( value ) {
		value.bind( function( to ) {
			if ( to == true ){
				$( '.site-preloader' ).css({ 'display': 'block' });
				$( '.js .preloader-enabled' ).css({ 'overflow':'hidden' });
			} else {
				$( '.site-preloader' ).css({ 'display': 'none' });
				$( '.js .preloader-enabled' ).css({ 'overflow':'visible' });
			}
		} );
	} );

	api( 'meta_date', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.entry-meta .posted-on' ).css( {
					'display': 'inline-block'
				} );
			} else {
				$( '.entry-meta .posted-on' ).css( {
					'display': 'none'
				} );
			}
		} );
	} );

	api( 'meta_author', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.entry-meta .byline' ).css( {
					'display': 'inline-block'
				} );
			} else {
				$( '.entry-meta .byline' ).css( {
					'display': 'none'
				} );
			}
		} );
	} );

	api( 'meta_categories', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.entry-footer .cat-links' ).css( {
					'display': 'inline-block'
				} );
			} else {
				$( '.entry-footer .cat-links' ).css( {
					'display': 'none'
				} );
			}
		} );
	} );

	api( 'meta_tags', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.entry-footer .tags-links' ).css( {
					'display': 'inline-block'
				} );
			} else {
				$( '.entry-footer .tags-links' ).css( {
					'display': 'none'
				} );
			}
		} );
	} );

	api( 'meta_comment', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.entry-footer .comments-link' ).css( {
					'display': 'inline-block'
				} );
			} else {
				$( '.entry-footer .comments-link' ).css( {
					'display': 'none'
				} );
			}
		} );
	} );

	api( 'author_profile', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.author-info' ).css( {
					'display': 'block'
				} );
			} else {
				$( '.author-info' ).css( {
					'display': 'none'
				} );
			}
		} );
	} );

	api.selectiveRefresh.bind( 'partial-content-rendered', function( placement ) {

		$(window).scroll(function () {

		    if ( $(this).scrollTop() > 250 ) {
		        $( '.return-to-top' ).removeClass('off').addClass('on');
		    }
		    else {
		        $( '.return-to-top' ).removeClass('on').addClass('off');
		    }

		});

		$( window ).resize();

	});

} )( jQuery, wp.customize );
