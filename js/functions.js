/**
 * Theme Name: Zazil Lite
 * Author: Misho Studio
 * Author URI: http://mishostudio.com/
 *
 * @package zazil-lite
 */
( function( $ ) {
    var secondarySection = $( 'aside#secondary section' );
    var pixel = $( '.pixel' );
    var windowWidth = $( window ).width();
    var scrollTopButton = $( '.scroll-top-button' );
    var sectionsHeight = 0;
    var attr = $( '.siteorigin-panels-stretch' ).attr( 'data-stretch-type' );

    $( window ).scroll( function() {
        if( $( window ).scrollTop() + $( window ).height() > $( document ).height() - 100) {
            scrollTopButton.css( 'display', 'inline-block' );
        } else {
            scrollTopButton.css( 'display', 'none' );
        }
    });

    secondarySection.each( function() {
        sectionsHeight += $( this ).outerHeight();
    } );

    if ( typeof attr !== typeof undefined && attr !== false ) {
        $( 'body' ).addClass( 'no-top-margin' );
        $( '.siteorigin-panels-stretch' ).parent().addClass( 'no-shadow' );
    }

    $( '.ow-pt-title, .ow-pt-button a' ).each( function(){
        var css = $( this ).css( 'background-image' );
        var gradient = css.split( ' ' );
        var color = gradient[8].replace( "to(", '' ) + gradient[9] + gradient[10].replace( "))", '' );

        $( this ).css( {
            'background-color': color,
            'background-image': 'none'
        } );

        if ( $( this ).is( '.ow-pt-title' ) && color === 'rgb(101,112,127)') {
            $( this ).css( {
                'background-color': 'rgba(0,0,0,0.4)',
                'background-image': 'none'
            } );
        }
    } );

    $( 'a.ow-button-hover' ).each( function() {
        var color = $( this ).css( 'background-color' );

        $( this ).hover( function() {
            $( this ).css( {
                'background-color': color,
                'border-bottom-color': color
            } );
        });
    } );

    $( '.buttons-container > li.social-accounts > div.container' ).css( 'width',
        function() {
            var social_accounts = $( this ).find( 'a' ).length;
            return ( 0.8 * 5 ) * social_accounts + 'rem';
        } );

    $( '.search-button' ).on( 'hover', function () {
        $( this ).find( '.search-field' ).focus();
    } );

    $( window ).on( 'load', function() {
        $( '.content-masonry' ).parent().each( function () {
            $( this ).wrapInner( "<div class='grid'></div>").find( '.grid' ).prepend( '<div class="grid-sizer"></div>' );
        } );

        $( '.grid' ).masonry( {
            columnWidth: '.grid-sizer',
            itemSelector: '.grid-item',
            percentPosition: true
        } );
    } );

    $( window ).on( 'resize', function() {
        if ( ( $( window ).width() > 768 || windowWidth > 768 ) && $( 'aside#secondary' ).length ) {
            location.reload();
        }
    } );
} )( jQuery );