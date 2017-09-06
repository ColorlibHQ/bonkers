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
            cellSelector: '.bonkers-team-member',
            cellAlign: 'left',
            prevNextButtons: false,
            pageDots: false,
            imagesLoaded: true,
            percentPosition: true
        });
    });//images loaded

    /*
    // Clients Section
    //===========================================================
    */
    var $bonkers_clients_wrap = $('.bonkers-clients-wrap');
    $bonkers_clients_wrap.imagesLoaded(  function( $images, $proper, $broken ) {
        $bonkers_clients_wrap.flickity({
            contain: true,
            cellSelector: '.bonkers-clients-logo',
            cellAlign: 'left',
            prevNextButtons: false,
            pageDots: false,
            imagesLoaded: true,
            autoPlay: true,
            percentPosition: true
        });
    });//images loaded


    $(".ql_scroll_top").click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, "slow");
        return false;
    });

    $('.dropdown-toggle').dropdown();
    $('*[data-toggle="tooltip"]').tooltip();


});

















