/**
 * Theme Name: Zazil Lite
 * Author: Misho Studio
 * Author URI: http://mishostudio.com/
 *
 * @package zazil-lite
 */
( function( $ ) {
    var primaryMain = $( 'div#primary main' );
    var siteFooter = $( 'footer.site-footer' );
    var secondarySection = $( 'aside#secondary section' );
    var asideSecondary = $( 'aside#secondary' );
    var pixel = $( '.pixel' );
    var windowWidth = $( window ).width();

    if ( siteFooter.length ) {
        var footerHeight = siteFooter.outerHeight() + Number( siteFooter.css( 'margin-bottom' ).replace( 'px', '' ) );
    } else {
        var footerHeight = 0;
    }

    if ( asideSecondary.length ) {
        var secondarySectionPadding = secondarySection.parent().parent().find( '#primary' ).offset().left + 'px';
    } else {
        var secondarySectionPadding = 0;
    }

    var sectionsHeight = 0;

    secondarySection.each( function() {
        sectionsHeight += $( this ).outerHeight();
    } );

    var contentTopMargin = Number( primaryMain.parent().parent().css( 'margin-top' ).replace( 'px', '' ) );
    var primaryMainWidth = primaryMain.outerWidth();
    var widgetWidth = secondarySection.last().outerWidth();
    var primaryHeight = primaryMain.outerHeight() + contentTopMargin;
    var secondaryHeight = sectionsHeight + contentTopMargin;

    function waypoints() {
        if ( asideSecondary.length ) {
            pixel.css( { 'height' : sectionsHeight + contentTopMargin + ( Number( secondarySection.last().css( 'margin-bottom' ).replace( 'px', '' ) ) * 4 ) + 'px' } );
        } else {
            pixel.css( { 'height' : 0 } );
        }

        if ( asideSecondary.length ) {
            if ( primaryHeight < secondaryHeight ) {
                primaryMain.waypoint( function( direction ) {
                    var primaryMargin = Number( primaryMain.parent().parent().css( 'margin-top' ).replace( 'px', '' ) );
                    var primaryHeight = primaryMain.height() + primaryMargin;

                    if ( direction === 'up' ) {
                        primaryMain.removeClass( 'primary-fixed' ).removeAttr( 'style' ).css( { 'width' : primaryMainWidth } );
                    } else {
                        primaryMain.addClass( 'primary-fixed' ).removeAttr( 'style' ).css( { 'width' : primaryMainWidth } );
                    }

                    if ( primaryHeight < $( window ).height() ) {
                        primaryMain.addClass( 'primary-fixed' );
                    }
                }, { offset: 'bottom-in-view' } );

                siteFooter.waypoint( function( direction ) {
                    if ( direction === 'up' ) {
                        primaryMain.removeAttr( 'style' ).removeClass('fixed-reset-primary').css( { 'width' : primaryMainWidth } );
                    } else {
                        primaryMain.removeAttr( 'style' ).addClass( 'fixed-reset-primary' ).css( { 'width' : primaryMainWidth } );
                    }
                }, { offset: $( window ).height() } );
            } else {
                if ( ( secondaryHeight + footerHeight ) < $( window ).height() ) {
                    secondarySection.css( { 'margin-left' : 0 } ).parent().addClass( 'secondary-fixed' ).css( { 'width' : widgetWidth + 'px', 'right' : secondarySectionPadding, 'top' : contentTopMargin + 'px' } );
                } else {
                    siteFooter.waypoint( function( direction ) {
                        if ( direction === 'up' ) {
                            secondarySection.css( { 'margin-left' : 0 } );
                            asideSecondary.removeAttr( 'style' ).css( { 'right' : secondarySectionPadding, 'width' : widgetWidth + 'px', 'margin-left:' : 0 } );
                        } else {
                            secondarySection.removeAttr( 'style' );
                            asideSecondary.removeAttr( 'style' ).css( { 'position' : 'absolute', 'right' : 0, 'bottom' : '0', 'width' : '100%', 'margin-left:' : 0  } );
                        }
                    }, { offset: $( window ).height() } );

                    pixel.waypoint( function( direction ) {
                        if ( direction === 'up' ) {
                            secondarySection.removeAttr('style').parent().removeClass( 'secondary-fixed' ).css( { 'width' : 'auto' } );
                        } else {
                            secondarySection.css( { 'margin-left' : 0 } ).parent().addClass( 'secondary-fixed' ).css( { 'width' : widgetWidth + 'px', 'right' : secondarySectionPadding } );
                        }
                    }, { offset: 'bottom-in-view' } );
                }
            }
        }
    }

    if ( $( window ).width() > 768 ) {
        waypoints();
    } else {
        asideSecondary.css( 'margin-bottom', 0 );
    }

    var attr = $( '.siteorigin-panels-stretch' ).attr( 'data-stretch-type' );

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

    $( '#page' ).waypoint( function( direction ) {
        if ( $( 'body' ).height() >= $( window ).height() ) {
            if ( direction === 'up' ) {
                $( '.scroll-top-button' ).css( 'display', 'none' );
            } else {
                $( '.scroll-top-button' ).css( 'display', 'inline-block' );
            }
        }
    }, { offset: 'bottom-in-view' } );

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