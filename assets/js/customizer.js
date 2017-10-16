jQuery( window ).load( function() {// jscs:ignore validateLineBreaks

  (function( $ ) {
    var $frontPageSections = $( '#sub-accordion-panel-bonkers_addons_front_page_sections' );
    var sortText = '<div class="sortable-sections-desc description customize-section-description">' + bonkersCustomizerAdmin.sortableText + '</div>';

    $( 'body' ).on( 'click', '#sub-accordion-panel-bonkers_addons_front_page_sections .control-subsection .accordion-section-title', function( event ) {

      var sectionID = $( this ).parent( '.control-subsection' ).attr( 'id' );
      scrollToSection( sectionID );
    } );

    function scrollToSection( sectionID ) {
      var sectionClass = 'welcome-section';
      var $contents = $( '#customize-preview iframe' ).contents();
      switch ( sectionID ) {
        case 'accordion-section-bonkers_addons_welcome_section':
          sectionClass = 'bonkers-welcome-section';
          break;
        case 'accordion-section-bonkers_addons_services_section':
          sectionClass = 'bonkers-services-section';
          break;
        case 'accordion-section-bonkers_addons_image_section':
          sectionClass = 'bonkers-image-section';
          break;
        case 'accordion-section-bonkers_addons_phone_section':
          sectionClass = 'bonkers-phone-section';
          break;
        case 'accordion-section-bonkers_addons_cta_section':
          sectionClass = 'bonkers-cta-section';
          break;
        case 'accordion-section-bonkers_addons_video_section':
          sectionClass = 'bonkers-video-section';
          break;
        case 'accordion-section-bonkers_addons_team_section':
          sectionClass = 'bonkers-team-section';
          break;
        case 'accordion-section-bonkers_addons_subscribe_section':
          sectionClass = 'bonkers-subscribe-section';
          break;
        case 'accordion-section-bonkers_addons_clients_section':
          sectionClass = 'bonkers-clients-section';
          break;
        case 'accordion-section-bonkers_addons_contact_section':
          sectionClass = 'bonkers-contact-section';
          break;
      }
      $contents.find( 'html, body' ).animate( {
        scrollTop: $contents.find( '.' + sectionClass ).offset().top - 30
      }, 1000 );

    }

    /*
     * Make Front Page Sections Sortable
     */

    $frontPageSections.append( sortText );
    $frontPageSections.sortable( {
      helper: 'clone',
      items: '> li.control-section'
    } );
    $frontPageSections.on( 'sortupdate', function( event, ui ) {
      var itemsAr = $frontPageSections.sortable( 'toArray' ),
          i;
      $frontPageSections.find( '.sortable-sections-desc' ).prepend( '<img src="' + bonkersCustomizerAdmin.adminURL + '/images/wpspin_light.gif" /> ' );
      for ( i = 0; i < itemsAr.length; i++ ) {
        itemsAr[ i ] = itemsAr[ i ].replace( 'accordion-section-', '' );
      }
      $.ajax( {
        url: bonkersCustomizerAdmin.ajaxURL,
        type: 'post',
        dataType: 'json',
        data: {
          action: 'bonkers_addons_save_sortable',
          items: itemsAr
        }
      } ).done( function( data ) {
        $frontPageSections.find( '.sortable-sections-desc img' ).remove();
        wp.customize.previewer.refresh();
      } );

    } );

  })( jQuery );
} );

wp.customize.controlConstructor[ 'bonkers-checkbox-multiple' ] = wp.customize.Control.extend( {
  ready: function() {
    var control = this;
    var values = [];
    control.container.on( 'change', '.bonkers-multi-checkbox', function() {
      values = [];
      control.container.find( '.bonkers-multi-checkbox' ).each( function() {
        if ( jQuery( this ).is( ':checked' ) ) {
          values.push( jQuery( this ).val() );
        }
      } );
      control.setting( values );
    } );
  }
} );
