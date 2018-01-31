// jscs:ignore validateLineBreaks
// Align Sub Sub Menu
function bonkersAlignSubSubMenu() {
  var windowWidth = jQuery( window ).width(),
      subSubMenu;
  if ( jQuery( '#header #site-navigation ul li.menu-item-has-children' ).length ) {
    subSubMenu = jQuery( '#header #site-navigation ul li.menu-item-has-children ul' );

    jQuery( subSubMenu ).each( function() {
      var width = jQuery( this ).width();
      if ( ( windowWidth - jQuery( this ).offset().left ) < width ) {
        jQuery( this ).addClass( 'align-right' );
      }
    } );
  }
}

jQuery( document ).ready( function( $ ) {

  var $bonkersTeamWrap, $bonkersClientsWrap;

  $( 'body' ).on( 'click', '#primary-menu > li > a[href^="#"]', function( event ) {
    event.preventDefault();

    /* Act on the event */
    $( 'html, body' ).animate( {
      scrollTop: $( $( this ).attr( 'href' ) ).offset().top
    }, 1000 );
  } );

  /*
   // Team Section
   //===========================================================
   */
  $bonkersTeamWrap = $( '.bonkers-team-wrap' );
  $bonkersTeamWrap.imagesLoaded( function( $images, $proper, $broken ) {
    $bonkersTeamWrap.flickity( {
      contain: true,
      cellSelector: '.widget',
      cellAlign: 'left',
      prevNextButtons: false,
      pageDots: false,
      imagesLoaded: true,
      percentPosition: true
    } );
  } );

  if ( 'undefined' !== typeof wp && wp.customize && wp.customize.selectiveRefresh ) {
    wp.customize.selectiveRefresh.bind( 'sidebar-updated', function( sidebarPartial ) {
      if ( 'team-section' === sidebarPartial.sidebarId ) {
        jQuery( '.bonkers-team-wrap' ).flickity( 'reloadCells' );
      }
    } );
  }

  /*
   // Clients Section
   //===========================================================
   */
  $bonkersClientsWrap = $( '.bonkers-clients-wrap' );
  $bonkersClientsWrap.imagesLoaded( function( $images, $proper, $broken ) {
    $bonkersClientsWrap.flickity( {
      contain: true,
      cellSelector: '.widget',
      cellAlign: 'left',
      prevNextButtons: false,
      pageDots: false,
      imagesLoaded: true,
      autoPlay: true,
      percentPosition: true
    } );
  } );

  if ( 'undefined' !== typeof wp && wp.customize && wp.customize.selectiveRefresh ) {
    wp.customize.selectiveRefresh.bind( 'sidebar-updated', function( sidebarPartial ) {
      if ( 'clients-section' === sidebarPartial.sidebarId ) {
        jQuery( '.bonkers-clients-wrap' ).flickity( 'reloadCells' );
      }
    } );
  }

  $( '.ql_scroll_top' ).click( function() {
    $( 'html, body' ).animate( {
      scrollTop: 0
    }, 'slow' );
    return false;
  } );

  $( '.dropdown-toggle' ).dropdown();
  $( '*[data-toggle="tooltip"]' ).tooltip();

  bonkersAlignSubSubMenu();

} );

jQuery( document ).resize( function() {
  bonkersAlignSubSubMenu();
} );
