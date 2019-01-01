jQuery( document ).ready( function ( $ ) {
    'use strict';
    // Menu fixes
    $( function () {
        if ( $( window ).width() > 767 ) {
            $( ".dropdown, .dropdown-submenu" ).hover(
                function () {
                    $( this ).addClass( 'open' )
                },
                function () {
                    $( this ).removeClass( 'open' )
                }
            );
        }
    } );
    $( '.navbar .dropdown-toggle' ).hover( function () {
        $( this ).addClass( 'disabled' );
    } );
    $( window ).scroll( function () {
        var $unstick = $( 'body.unstick-menu' );
        if ( ! $unstick.length ) {
            var topmenu = $( '#top-navigation' ).outerHeight();
            var header = $( '.site-header' ).outerHeight();
            if ( $( document ).scrollTop() > ( topmenu + header + 50 ) ) {
                $( 'nav#site-navigation' ).addClass( 'shrink' );
            } else {
                $( 'nav#site-navigation' ).removeClass( 'shrink' );
            }
        }
    } );
    
    var $myDiv = $( '#futurio-floating' );
    if ( $myDiv.length ) {
        $( window ).scroll( function () {
            var distanceTop = $myDiv.prev().position().top + $myDiv.prev().height() + 80;

            if ( $( document ).scrollTop() > distanceTop ) {
                $myDiv.addClass( 'floating-element' );
            } else {
                $myDiv.removeClass( 'floating-element' );
            }
        } );
    }

    $( '.open-panel' ).each( function () {
        var menu = $( this ).data( 'panel' );
        if ($(window).width() < 768) {
            $( "#" + menu ).click( function () {
                $( "#blog" ).toggleClass( "openNav" );
                $( "#" + menu + ".open-panel" ).toggleClass( "open" );
            } );
            $( "#site-navigation a" ).click( function () {
                $( "#blog" ).toggleClass( "openNav" );
                $( "#" + menu + ".open-panel" ).toggleClass( "open" );
            } );
        }
    } );

    $( '.top-search-icon .fa' ).click( function () {
        $( ".top-search-box" ).toggle( 'slow' );
        $( ".top-search-icon .fa" ).toggleClass( "fa-times fa-search" );
    } );

    $( '.offcanvas-sidebar-toggle' ).on( 'click', function () {
        $( 'body' ).toggleClass( 'offcanvas-sidebar-expanded' );
    } );
    $( '.offcanvas-sidebar-close' ).on( 'click', function () {
        $( 'body' ).toggleClass( 'offcanvas-sidebar-expanded' );
    } );

    $('body').addClass('loaded');
    
    var sections = $( 'section' )
        , nav = $( '#site-navigation .nav' )
        , nav_height = nav.outerHeight();

    $( window ).on( 'scroll', function () {
        var cur_pos = $( this ).scrollTop();

        sections.each( function () {
            var top = $( this ).offset().top - nav_height - 30,
                bottom = top + $( this ).outerHeight();

            if ( cur_pos >= top && cur_pos <= bottom ) {
                nav.find( 'a' ).parent().removeClass( 'active' );
                sections.removeClass( 'active' );

                $( this ).addClass( 'active' );
                nav.find( 'a[href="#' + $( this ).attr( 'id' ) + '"]' ).parent().addClass( 'active' );
            }
        } );
    } );
    
    $( document ).on( 'click', '.button.ajax_add_to_cart', function(e) {
        e.preventDefault();
        $('body.open-head-cart').addClass('product-added-to-cart');
    });
    $( document ).on( 'mouseover', '.product-added-to-cart ul.site-header-cart', function(e) {
        e.preventDefault();
        $('body.open-head-cart').removeClass('product-added-to-cart');
    });
} );

