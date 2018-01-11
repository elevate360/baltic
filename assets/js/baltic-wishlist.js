( function( $ ) {

	var balticWishList = balticWishList || {};

	balticWishList.updateWishList = function(){

		var counter = $( '.header-wishlist > span.total' );

		$.ajax({
			url: Balticl10n.ajax_url,
			data: {
				action: 'baltic_wcwl_update_count'
			},
			dataType: 'json',
			success: function( data ) {

				if ( data.count === '0' || data.count === 0 ) {
					counter.addClass( 'hide' );
				} else {
					counter.removeClass( 'hide' );
					counter.html( data.count );
				}

			}
		});

	};


	balticWishList.loader = function() {

		$( '.add_to_wishlist' ).on( 'click', function(){

			var $loader = $( this ).find( '.baltic-wishlist-loader' );

			$loader.addClass( 'show' );

			$loader.on( 'added_to_wishlist', function(){
				$( this ).removeClass( 'show' );
			});

		});

	};


	$( document ).ready( function() {
		balticWishList.loader();
	});

	$( window ).on( 'load', function() {
		balticWishList.updateWishList();
	});

	$( document ).on( 'added_to_wishlist removed_from_wishlist added_to_cart', function() {
		balticWishList.updateWishList();
	});

})( jQuery );
