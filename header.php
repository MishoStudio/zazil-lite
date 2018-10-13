<?php
/**
 * Theme Name: Zazil Lite
 * Author: Misho Studio
 * Author URI: http://mishostudio.com/
 *
 * @package zazil-lite
 */
global $misho_opt; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    if ( empty( $misho_opt ) ) { ?>
        <link rel="icon" type="image/x-icon" href="<?php echo esc_url( get_stylesheet_directory_uri() ) . '/images/favicon.ico'; ?>" />
    <?php
    } else if ( !empty( $misho_opt ) && empty( $misho_opt[ 'favicon' ][ 'url' ] ) ) { ?>
        <link rel="icon" type="image/x-icon" href="" />
    <?php
    } else { ?>
        <link rel="icon" type="image/x-icon" href="<?php echo $misho_opt[ 'favicon' ][ 'url' ]; ?>" />
    <?php
    } ?>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
    wp_head(); ?>
    <style type="text/css" media="all">
        <?php
        $pallettes = [ 'a', 'b', 'c', 'g', 'h' ];
        if ( !empty( $misho_opt ) && in_array( $misho_opt[ 'opt-palette-color' ], $pallettes ) == true ) {
            //Palettes a, b, c, g, h on PRO version.
            if ( $misho_opt[ 'opt-palette-color' ] == 'a' ) {
                $first_color = '#FC5C7D';
                $gradient_color_a = '#6A82FB';
                $second_color =  '#CDD5FE';
                $gradient_color_b = '#FED1DA';
                $third_color = '#9A4C95';
                $fourth_color = '#4D2D52';
                $color = $misho_opt[ 'main-font-family' ][ 'color' ];
                $font_family = $misho_opt[ 'main-font-family' ][ 'font-family' ];
            } elseif ( $misho_opt[ 'opt-palette-color' ] == 'b' ) {
                $first_color = '#22C1C3';
                $gradient_color_a = '#FDBB2D';
                $second_color = '#CCF6F6';
                $gradient_color_b = '#FFF1D5';
                $third_color = '#FF5F1E';
                $fourth_color = '#136B6C';
                $color = $misho_opt[ 'main-font-family' ][ 'color' ];
                $font_family = $misho_opt[ 'main-font-family' ][ 'font-family' ];
            } elseif ( $misho_opt[ 'opt-palette-color' ] == 'c' ) {
                $first_color = '#FF070B';
                $gradient_color_a = '#E5008D';
                $second_color = '#FFC3E8';
                $gradient_color_b = '#D3ECFB';
                $third_color = '#043451';
                $fourth_color = '#043451';
                $color = $misho_opt[ 'main-font-family' ][ 'color' ];
                $font_family = $misho_opt[ 'main-font-family' ][ 'font-family' ];
            } elseif ( $misho_opt[ 'opt-palette-color' ] == 'g' ) {
                $first_color = '#C02425';
                $gradient_color_a = '#F0CB35';
                $second_color = '#C8FFD7';
                $gradient_color_b = '#F3BDBD';
                $third_color = '#00B733';
                $fourth_color = '#00B733';
                $color = $misho_opt[ 'main-font-family' ][ 'color' ];
                $font_family = $misho_opt[ 'main-font-family' ][ 'font-family' ];
            } elseif ( $misho_opt[ 'opt-palette-color' ] == 'h' ) {
                $first_color = '#FC00FF';
                $gradient_color_a = '#00DBDE';
                $second_color = '#FEBBFF';
                $gradient_color_b = '#BCFEFF';
                $third_color = '#00A9AB';
                $fourth_color = '#870088';
                $color = $misho_opt[ 'main-font-family' ][ 'color' ];
                $font_family = $misho_opt[ 'main-font-family' ][ 'font-family' ];
            }
        } else {
            $first_color = '#22C1C3';
            $gradient_color_a = '#FDBB2D';
            $second_color = '#CCF6F6';
            $gradient_color_b = '#FFF1D5';
            $third_color = '#FF5F1E';
            $fourth_color = '#136B6C';
            $color = '#404040';
            $font_family = '"Open Sans", sans-serif';
        } ?>
        body {
            background-color: <?php echo $first_color ?>;
            background-image: linear-gradient( 165deg, <?php echo $first_color ?>, <?php echo $gradient_color_a ?> );
        }

        body,
        button,
        input,
        select,
        optgroup,
        textarea {
            font-family: <?php echo $font_family; ?>;
        }

        body,
        button,
        input,
        select,
        optgroup,
        textarea,
        .entry-title,
        .entry-title a,
        .entry-title a:visited,
        .entry-title a:hover,
        p.stars a:before,
        p.stars a:hover a:before,
        p.stars.selected a.active a:before,
        .page-links,
        article .entry-wrapper-content .entry-content .more-link,
        .lsow-testimonials-slider .lsow-testimonial-text,
        .widget .sow-testimonials .sow-testimonial-text,
        .main-navigation ul li a,
        article.sticky .entry-header:after,
        article .entry-footer .edit-link a,
        article .entry-footer .comments-link a,
        .comments-area .navigation .nav-previous a,
        .comments-area .navigation .nav-next a,
        .comments-area .comment-list .comment article .reply a,
        .comments-area .comments-list .pingback article .reply a,
        .comments-area .comment-list .comment article .comment-meta .comment-metadata a,
        .comments-area .comment-list .pingback article .comment-meta .comment-metadata a,
        .comments-area .comment-list .pingback .comment-edit-link,
        .comments-area .comment-respond .comment-reply-title #cancel-comment-reply-link,
        button,
        input[type="button"],
        input[type="reset"],
        input[type="submit"],
        ul.social-share li a,
        #edd_checkout_cart td,
        #edd_checkout_cart th,
        #edd_checkout_form_wrap span.edd-description,
        #edd_checkout_form_wrap #edd-login-account-wrap,
        #edd_checkout_form_wrap #edd-new-account-wrap,
        #edd_checkout_form_wrap #edd_final_total_wrap,
        #edd_checkout_form_wrap #edd_show_discount,
        #edd_checkout_form_wrap .edd-cart-adjustment {
            color: <?php echo $color; ?>!important;
        }

        .lsow-team-members.lsow-style2 .lsow-team-member-wrapper .lsow-team-member-text .lsow-title,
        .lsow-team-members.lsow-style2 .lsow-team-member-wrapper .lsow-team-member-text .lsow-team-member-position,
        .lsow-odometers .lsow-odometer .lsow-stats-title {
            color: <?php echo $color; ?>!important;
        }

        article.sticky .entry-header:after,
        .widget.widget_sow-features .sow-more-text a,
        #edd-purchase-button,
        .edd-submit,
        [type=submit].edd-submit,
        .edd-add-to-cart,
        #edd-purchase-button:hover,
        .edd-submit:hover,
        [type=submit].edd-submit:hover,
        .edd-add-to-cart:hover {
            background: <?php echo $first_color ?>!important;
            color: #ffffff!important;
        }

        .lsow-odometers .lsow-odometer * {
            color: <?php echo $first_color ?>;
        }

        .lsow-dark-bg .lsow-testimonials-slider .lsow-testimonial-text i {
            color: <?php echo $first_color ?>!important;
        }

        input[type="text"],
        input[type="email"],
        input[type="url"],
        input[type="password"],
        input[type="search"],
        input[type="number"],
        input[type="tel"],
        input[type="range"],
        input[type="date"],
        input[type="month"],
        input[type="week"],
        input[type="time"],
        input[type="datetime"],
        input[type="datetime-local"],
        input[type="color"],
        textarea {
            color: #666666;
            border: 1px solid #cccccc;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="url"]:focus,
        input[type="password"]:focus,
        input[type="search"]:focus,
        input[type="number"]:focus,
        input[type="tel"]:focus,
        input[type="range"]:focus,
        input[type="date"]:focus,
        input[type="month"]:focus,
        input[type="week"]:focus,
        input[type="time"]:focus,
        input[type="datetime"]:focus,
        input[type="datetime-local"]:focus,
        input[type="color"]:focus,
        textarea:focus {
            border-color: <?php echo $first_color ?>!important;
        }

        select {
            border: 1px solid #cccccc;
        }

        abbr, acronym {
            border-bottom: 1px dotted #666666;
        }

        article .entry-wrapper-header .entry-date-wrapper,
        .navigation.posts-navigation .nav-previous a,
        .navigation.posts-navigation .nav-next a,
        .navigation.post-navigation .nav-previous a,
        .navigation.post-navigation .nav-next a,
        #page .site-header .site-branding {
            background: <?php echo $third_color ?>;
        }

        #page .site-footer,
        .search .site-footer,
        .grid-item .container h3 a,
        .lsow-team-members.lsow-style1 .lsow-team-member-wrapper .lsow-team-member .lsow-image-wrapper .lsow-sociial-wrap,
        .lsow-testimonials-slider .lsow-testimonial-user,
        .widget .sow-testimonials .sow-testimonial-wrapper.sow-layout-side.sow-user-left .sow-testimonial-user,
        .widget .sow-testimonials .sow-testimonial-wrapper.sow-layout-side.sow-user-middle .sow-testimonial-user,
        .widget .sow-headline,
        #page .widget-title,
        .lsow-team-members.lsow-style1 .lsow-team-member-wrapper .lsow-team-member .lsow-image-wrapper .lsow-social-wrap {
            background: <?php echo $fourth_color ?>;
        }

        #page .site-header,
        .siteorigin-panels .panel-grid,
        .main-navigation ul li {
            background: #ffffff;
        }

        article.sticky .entry-header:after {
            color: #ffffff!important;
        }

        .siteorigin-panels article .entry-header h1,
        .scroll-top-button:hover,
        .scroll-top-button:focus,
        .scroll-top-button:visited,
        .edd-submit.button,
        .edd-submit.button:active,
        .edd-submit.button:focus,
        .edd-submit.button:hover {
            color: #ffffff;
        }

        article .entry-wrapper-header .post-thumbnail,
        article .entry-wrapper-header .entry-header,
        .search article .entry-wrapper-header .entry-header,
        comments-area .comments-title,
        .comments-area .comment-list .comment .comment-respond,
        .comments-area .comment-list .pingback .comment-respond,
        .main-navigation .menu-toggle,
        .main-navigation .social-search-toggle,
        .main-navigation .buttons-container li .container,
        .main-navigation .buttons-container li .container.search-form input,
        .main-navigation ul li.page_item_has_children:hover,
        .main-navigation ul li.menu_item_has_children:hover,
        .main-navigation ul li a:hover,
        .main-navigation ul ul.children li,
        .main-navigation ul ul.sub-menu li,
        #edd_checkout_form_wrap #edd-login-account-wrap,
        #edd_checkout_form_wrap #edd-new-account-wrap,
        #edd_checkout_form_wrap #edd_final_total_wrap,
        #edd_checkout_form_wrap #edd_show_discount,
        #edd_checkout_form_wrap .edd-cart-adjustment {
            background: #eeeeee;
        }

        .main-navigation .menu-toggle:hover,
        .main-navigation .social-search-toggle:hover,
        .main-navigation .buttons-container li .container a:hover,
        .main-navigation ul ul.children li a:hover,
        .main-navigation ul ul.sub-menu li a:hover {
            background: #e5e5e5;
        }

        .screen-reader-text:focus,
        .star-rating span:before,
        p.stars:hover a:before,
        p.stars.selected a.active:before,
        p.stars.selected a:not(.active):before,
        .lsow-testimonials-slider .lsow-flex-direction-nav a,
        .lsow-testimonials-slider .lsow-flex-direction-nav a:hover,
        .lsow-testimonials-slider .lsow-testimonial-text i,
        a,
        a:visited,
        a:hover,
        a:focus,
        a:active {
            color: <?php echo $first_color ?>;
        }

        .site-content .widget-area ul li:hover {
            border-bottom: 1px solid <?php echo $first_color ?>;
        }

        .scroll-top-button,
        .scroll-top-button:hover,
        .scroll-top-button:focus,
        .widget_price_filter .ui-slider .ui-slider-handle,
        .widget_price_filter .ui-slider .ui-slider-range {
            background: <?php echo $first_color ?>!important;
        }

        #page .site-content .widget-area .widget {
            background-image: linear-gradient( -165deg, <?php echo $second_color ?>, <?php echo $gradient_color_b ?> );
        }

        .lsow-team-members.lsow-style1 .lsow-team-member-wrapper .lsow-team-member .lsow-team-member-text,
        .grid-item .container .overlay {
            opacity: 0.8;
            background: <?php echo $third_color; ?>
        }

        .grid-item .container .overlay {
            opacity: 0.5;
        }

        .grid-item .container .overlay:hover {
            opacity: 0;
        }

        @media screen and (max-width: 960px) {
            .main-navigation #primary-menu,
            .main-navigation #primary-menu::-webkit-scrollbar-track,
            .main-navigation #primary-menu ul li {
                background: #eeeeee;
            }

            .main-navigation #primary-menu ul li a:hover {
                background: #e5e5e5;
            }
        }

        @media screen and (max-width: 768px) {
            #page .site-content .entry-wrapper-header .post-thumbnail {
                background: #eeeeee;
            }
        }
    </style>
    <?php
    if ( $misho_opt[ 'google-analytics' ] != null ) {
        $analytics = $misho_opt[ 'google-analytics' ];
        echo $analytics;
    } ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'zazil-lite' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="site-branding">
            <?php
            if ( $misho_opt[ 'logo-image' ][ 'url' ] != null ) {
                if ( is_front_page() && is_home() ) { ?>
                    <img src="<?php echo $misho_opt[ 'logo-image' ][ 'url' ]; ?>" />
                    <?php
                } else { ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php echo $misho_opt[ 'logo-image' ][ 'url' ]; ?>" />
                    </a>
                    <?php
                }
            } else {
                if ( is_front_page() && is_home() ) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
                endif;

                $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                    <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                    <?php
                endif;
            } ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<?php
            wp_nav_menu( array(
                'theme_location' => 'Primary',
                'menu_id'        => 'primary-menu',
            ) ); ?>
            <ul class="buttons-container">
                <?php
                if (
                    $misho_opt[ 'social-facebook' ] != null ||
                    $misho_opt[ 'social-twitter' ] != null ||
                    $misho_opt[ 'social-googleplus' ] != null
                ) { ?>
                    <li class="social-accounts">
                        <button class="social-search-toggle" aria-expanded="false">
                            <i class="fas fa-heart"></i>
                        </button>
                        <div class="container">
                            <?php
                            if ( $misho_opt[ 'open-link-new-tab' ] == true ) {
                                $open_link_new_tab = ' target="_blank"';
                            } else {
                                $open_link_new_tab = '';
                            }
                            if ( $misho_opt[ 'social-facebook' ] == true ) { ?>
                                <a href="<?php echo $misho_opt[ 'social-facebook' ]; ?>"<?php echo $open_link_new_tab; ?>><i class="fab fa-facebook-square"></i></a>
                                <?php
                            }
                            if ( $misho_opt[ 'social-twitter' ] == true ) { ?>
                                <a href="<?php echo $misho_opt[ 'social-twitter' ]; ?>"<?php echo $open_link_new_tab; ?>><i class="fab fa-twitter"></i></a>
                                <?php
                            }
                            if ( $misho_opt[ 'social-googleplus' ] == true ) { ?>
                                <a href="<?php echo $misho_opt[ 'social-googleplus' ]; ?>"<?php echo $open_link_new_tab; ?>><i class="fab fa-google-plus"></i></a>
                                <?php
                            } ?>
                        </div>
                    </li>
                <?php
                } ?>
                    <li class="search-button">
                        <button class="social-search-toggle" aria-expanded="false">
                            <i class="fas fa-search"></i>
                        </button>
                        <div class="container search-form">
                            <?php get_search_form(); ?>
                        </div>
                    </li>
                <li>
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="true"><i class="fas fa-bars"></i></button>
                </li>
            </ul>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<div id="content" class="site-content">