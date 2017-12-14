( function( wp, $ ) {
	'use strict';

	if ( ! wp ) {
		return;
	}

	$( function() {
		// Dismiss notice
		$( document ).on( 'click', '.baltic-notice .notice-dismiss', function() {
			$.ajax({
				type: 'POST',
				url: ajaxurl,
				data: {
					nonce: BalticNoticel10n.nonce,
					action: 'baltic_dismiss_notice'
				},
				dataType: 'json'
			});
		});
	});

})( window.wp, jQuery );
