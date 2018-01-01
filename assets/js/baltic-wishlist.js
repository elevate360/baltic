( function( $ ) {

	var balticWishListCount = balticWishListCount || {};

	balticWishListCount.updateWishList = function(){

		var counter = $( '.header-wishlist > span.total' );

		$.ajax({
			url: Balticl10n.ajax_url,
			data: {
				action: 'baltic_wcwl_update_count'
			},
			dataType: 'json',
			success: function( data ) {
				if ( data.count == 0 ) {
					counter.addClass( 'hide' );
				} else {
					counter.removeClass( 'hide' );
					counter.html( data.count );
				}
			}
		});

	};

	$( document ).ready( function() {
		balticWishListCount.updateWishList();
	});

	$( document ).on( 'added_to_wishlist removed_from_wishlist added_to_cart', function() {
		balticWishListCount.updateWishList();
	});

})( jQuery );
