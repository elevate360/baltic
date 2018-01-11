( function( wp, $ ) {
	'use strict';

	if ( ! wp ) {
		return;
	}

	$( function() {

		$( document ).ready( function() {

			$( document ).on( 'click', 'a.button.baltic-install-now', function( e ) {
				var $button = $( e.target );

				e.preventDefault();

				if ( $button.hasClass( 'activate-now' ) ) {
					return true;
				}

				if ( $button.hasClass( 'updating-message' ) || $button.hasClass( 'button-disabled' ) ) {
					return;
				}

				if ( wp.updates.shouldRequestFilesystemCredentials && ! wp.updates.ajaxLocked ) {
					wp.updates.requestFilesystemCredentials( event );

					$( document ).on( 'credential-modal-cancel', function() {
						var $message = $( '.baltic-install-now.updating-message' );

						$message
							.removeClass( 'updating-message' )
							.text( wp.updates.l10n.installNow );

						wp.a11y.speak( wp.updates.l10n.updateCancel, 'polite' );
					} );
				}

				wp.updates.installPlugin( {
					slug: $button.data( 'slug' )
				} );

			});

		});

		var baltic_installer = baltic_installer || {};
		var is_loading = false;

	   /**
		* Activate the plugin
		*/
		baltic_installer.activate_plugin = function( el, plugin ) {

	      	is_loading = true;
	      	el.addClass( 'updating-message' );

			$.ajax( {
		   		type 	: 'POST',
		   		url 	: ajaxurl,
		   		data 	: {
		   			action 		: 'baltic_plugin_activation',
		   			plugin 		: plugin,
		   			nonce 		: BalticAdminl10n.installer_nonce,
		   			dataType 	: 'json'
		   		},

		   		success: function( data ) {
			   		if ( data ) {
				   		if ( data.status === 'success' ) {
					   		el.attr( 'class', 'activated button disabled' );
					   		el.html( BalticAdminl10n.activated_btn );
				   		}
			   		}
			   		is_loading = false;
		   		},

		   		error: function( xhr, status, error ) {
		      		is_loading = false;
		   		}
		   	} );

		};

		$( document ).on( 'click', '.baltic-admin-card-footer a.button.activate-now', function( e ) {
		   	var el 		= $( this ),
		   		plugin 	= el.data( 'slug' );

		   	e.preventDefault();

		   	if ( ! el.hasClass( 'disabled' ) ) {

		      	if ( is_loading ) {
		      		return false;
		      	}

			   	// Activation
			   	if ( el.hasClass( 'activate-now' ) ) {
				   	baltic_installer.activate_plugin( el, plugin );
				}
		   	}
		} );

		$( document ).on( 'click', '.baltic-admin-card-footer a.button.disabled', function( e ) {
		   	e.preventDefault();
		} );

	});

})( window.wp, jQuery );
