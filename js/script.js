
// Align Sub Sub Menu
function alignSubSubMenu() {
    var windowWidth = jQuery( window ).width();
    if( jQuery( '#header #site-navigation ul li.menu-item-has-children' ).length ) {
        var subSubMenu = jQuery( '#header #site-navigation ul li.menu-item-has-children ul' );

        jQuery( subSubMenu ).each( function() {
            var width = jQuery( this ).width();
            if( ( windowWidth - jQuery( this ).offset()['left'] ) < width ) {
                jQuery( this ).addClass( 'align-right' )
            }
        });
    }
}

jQuery(document).ready(function($) {


    $("body").on('click', '#primary-menu > li > a[href^="#"]', function(event) {
        event.preventDefault();
        /* Act on the event */
        $("html, body").animate({
            scrollTop: $( $(this).attr('href') ).offset().top
        }, 1000);
    });

    /*
    // Team Section
    //===========================================================
    */
    var $bonkers_team_wrap = $('.bonkers-team-wrap');
    $bonkers_team_wrap.imagesLoaded(  function( $images, $proper, $broken ) {
        $bonkers_team_wrap.flickity({
            contain: true,
            cellSelector: '.widget',
            cellAlign: 'left',
            prevNextButtons: false,
            pageDots: false,
            imagesLoaded: true,
            percentPosition: true
        });
    });//images loaded

    if ( 'undefined' !== typeof wp && wp.customize && wp.customize.selectiveRefresh ) {
        wp.customize.selectiveRefresh.bind( 'sidebar-updated', function( sidebarPartial ) {
            if ( 'team-section' === sidebarPartial.sidebarId ) {
                jQuery('.bonkers-team-wrap').flickity('reloadCells');
            }
        } );
    }

    /*
    // Clients Section
    //===========================================================
    */
    var $bonkers_clients_wrap = $('.bonkers-clients-wrap');
    $bonkers_clients_wrap.imagesLoaded(  function( $images, $proper, $broken ) {
        $bonkers_clients_wrap.flickity({
            contain: true,
            cellSelector: '.widget',
            cellAlign: 'left',
            prevNextButtons: false,
            pageDots: false,
            imagesLoaded: true,
            autoPlay: true,
            percentPosition: true
        });
    });//images loaded

    if ( 'undefined' !== typeof wp && wp.customize && wp.customize.selectiveRefresh ) {
        wp.customize.selectiveRefresh.bind( 'sidebar-updated', function( sidebarPartial ) {
            if ( 'clients-section' === sidebarPartial.sidebarId ) {
                jQuery('.bonkers-clients-wrap').flickity('reloadCells');
            }
        } );
    }


    $(".ql_scroll_top").click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, "slow");
        return false;
    });

    $('.dropdown-toggle').dropdown();
    $('*[data-toggle="tooltip"]').tooltip();

    alignSubSubMenu();

});

jQuery(document).resize(function(){
    alignSubSubMenu();
});















