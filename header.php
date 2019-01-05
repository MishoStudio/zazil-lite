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
    if ( false === get_option( 'site_icon', false ) ) { ?>
        <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    <?php
    } ?>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
    wp_head();

    if ( $misho_opt[ 'google-analytics' ] != null ) {
        $analytics = $misho_opt[ 'google-analytics' ];
        echo $analytics;
    }
    ?>
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
                        <div class="container social">
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