(function( $ ) {// jscs:ignore validateLineBreaks
  /*
   Welcome
   ------------------------------
   Enable/Disable Section */
  wp.customize( 'bonkers_addons[bonkers_addons_welcome_enable]', function( value ) {
    value.bind( function( to ) {
      if ( true === to ) {
        $( '.bonkers-welcome-section' ).show();
      } else {
        $( '.bonkers-welcome-section' ).hide();
      }
    } );
  } );

  /*
   Services
   ------------------------------
   Enable/Disable Section */
  wp.customize( 'bonkers_addons[bonkers_addons_services_enable]', function( value ) {
    value.bind( function( to ) {
      if ( true === to ) {
        $( '.bonkers-services-section' ).show();
      } else {
        $( '.bonkers-services-section' ).hide();
      }
    } );
  } );

  /*
   Image
   ------------------------------
   Enable/Disable Section */
  wp.customize( 'bonkers_addons[bonkers_addons_image_enable]', function( value ) {
    value.bind( function( to ) {
      if ( true === to ) {
        $( '.bonkers-image-section' ).show();
      } else {
        $( '.bonkers-image-section' ).hide();
      }
    } );
  } );

  /*
   Phone
   ------------------------------
   Enable/Disable Section */
  wp.customize( 'bonkers_addons[bonkers_addons_phone_enable]', function( value ) {
    value.bind( function( to ) {
      if ( true === to ) {
        $( '.bonkers-phone-section' ).show();
      } else {
        $( '.bonkers-phone-section' ).hide();
      }
    } );
  } );

  /*
   Call To Action
   ------------------------------
   Enable/Disable Section */
  wp.customize( 'bonkers_addons[bonkers_addons_cta_enable]', function( value ) {
    value.bind( function( to ) {
      if ( true === to ) {
        $( '.bonkers-cta-section' ).show();
      } else {
        $( '.bonkers-cta-section' ).hide();
      }
    } );
  } );

  /*
   Video
   ------------------------------
   Enable/Disable Section */
  wp.customize( 'bonkers_addons[bonkers_addons_video_enable]', function( value ) {
    value.bind( function( to ) {
      if ( true === to ) {
        $( '.bonkers-video-section' ).show();
      } else {
        $( '.bonkers-video-section' ).hide();
      }
    } );
  } );

  /*
   Team
   ------------------------------
   Enable/Disable Section */
  wp.customize( 'bonkers_addons[bonkers_addons_team_enable]', function( value ) {
    value.bind( function( to ) {
      if ( true === to ) {
        $( '.bonkers-team-section' ).show();
      } else {
        $( '.bonkers-team-section' ).hide();
      }
    } );
  } );

  /*
   Subscribe
   ------------------------------
   Enable/Disable Section */
  wp.customize( 'bonkers_addons[bonkers_addons_subscribe_enable]', function( value ) {
    value.bind( function( to ) {
      if ( true === to ) {
        $( '.bonkers-subscribe-section' ).show();
      } else {
        $( '.bonkers-subscribe-section' ).hide();
      }
    } );
  } );

  /*
   Contact
   ------------------------------
   Enable/Disable Section */
  wp.customize( 'bonkers_addons[bonkers_addons_contact_enable]', function( value ) {
    value.bind( function( to ) {
      if ( true === to ) {
        $( '.bonkers-contact-section' ).show();
      } else {
        $( '.bonkers-contact-section' ).hide();
      }
    } );
  } );

})( jQuery );
