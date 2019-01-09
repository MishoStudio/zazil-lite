<?php
/**
 * Theme Name: Zazil Lite
 * Author: Misho Studio
 * Author URI: http://mishostudio.com/
 *
 * @package zazil-lite
 */
if ( ! function_exists( 'zazil_lite_setup' ) ) :
	function zazil_lite_setup() {
		load_theme_textdomain( 'zazil-lite', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
        add_theme_support( 'customize-selective-refresh-widgets' );
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
		register_nav_menus( array(
			'Primary' => esc_html__( 'Primary', 'zazil-lite' ),
		) );
	}
endif;
add_action( 'after_setup_theme', 'zazil_lite_setup' );

function zazil_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'zazil_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'zazil_lite_content_width', 0 );

function zazil_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'zazil-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'zazil-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'zazil_lite_widgets_init' );

function zazil_lite_scripts() {
	wp_enqueue_script( 'zazil-lite-navigation', get_template_directory_uri() . '/js/navigation.js', false, '20151215', true );
	wp_enqueue_script( 'zazil-lite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', false, '20151215', true );
    wp_register_script( 'zazil-lite-waypoints', get_template_directory_uri() . '/js/jquery.waypoints.js', array( 'jquery' ), '4.0.1', true );
    wp_register_script( 'zazil-lite-masonry', get_template_directory_uri() . '/js/jquery.masonry.js', array( 'jquery' ), '4.2.1', true );
    wp_enqueue_script( 'zazil-lite-functions', get_template_directory_uri() . '/js/functions.js', array( 'zazil-lite-waypoints', 'zazil-lite-masonry', 'jquery' ), '1.0.0', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'zazil_lite_scripts' );

function zazil_lite_styles() {
    wp_enqueue_style( 'zazil-lite-font-awesome', get_template_directory_uri() . '/webfonts/all.css', array(), '5.0.10', 'all' );
    wp_enqueue_style( 'zazil-lite-style', get_stylesheet_uri() );

    global $misho_opt;
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
    }

    $inline_css = "
        body {
        background-color: $first_color;
        background-image: linear-gradient( 165deg, $first_color, $gradient_color_a );
        }
    
        body,
        button,
        input,
        select,
        optgroup,
        textarea {
        font-family: $font_family;
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
        input[type=\"button\"],
        input[type=\"reset\"],
        input[type=\"submit\"],
        ul.social-share li a,
        #edd_checkout_cart td,
        #edd_checkout_cart th,
        #edd_checkout_form_wrap span.edd-description,
        #edd_checkout_form_wrap #edd-login-account-wrap,
        #edd_checkout_form_wrap #edd-new-account-wrap,
        #edd_checkout_form_wrap #edd_final_total_wrap,
        #edd_checkout_form_wrap #edd_show_discount,
        #edd_checkout_form_wrap .edd-cart-adjustment {
        color: $color!important;
        }
    
        .lsow-team-members.lsow-style2 .lsow-team-member-wrapper .lsow-team-member-text .lsow-title,
        .lsow-team-members.lsow-style2 .lsow-team-member-wrapper .lsow-team-member-text .lsow-team-member-position,
        .lsow-odometers .lsow-odometer .lsow-stats-title {
        color: $color!important;
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
        background: $first_color!important;
        color: #ffffff!important;
        }
    
        .lsow-odometers .lsow-odometer * {
        color: $first_color;
        }
    
        .lsow-dark-bg .lsow-testimonials-slider .lsow-testimonial-text i {
        color: $first_color!important;
        }
    
        input[type=\"text\"],
        input[type=\"email\"],
        input[type=\"url\"],
        input[type=\"password\"],
        input[type=\"search\"],
        input[type=\"number\"],
        input[type=\"tel\"],
        input[type=\"range\"],
        input[type=\"date\"],
        input[type=\"month\"],
        input[type=\"week\"],
        input[type=\"time\"],
        input[type=\"datetime\"],
        input[type=\"datetime-local\"],
        input[type=\"color\"],
        textarea {
        color: #666666;
        border: 1px solid #cccccc;
        }
    
        input[type=\"text\"]:focus,
        input[type=\"email\"]:focus,
        input[type=\"url\"]:focus,
        input[type=\"password\"]:focus,
        input[type=\"search\"]:focus,
        input[type=\"number\"]:focus,
        input[type=\"tel\"]:focus,
        input[type=\"range\"]:focus,
        input[type=\"date\"]:focus,
        input[type=\"month\"]:focus,
        input[type=\"week\"]:focus,
        input[type=\"time\"]:focus,
        input[type=\"datetime\"]:focus,
        input[type=\"datetime-local\"]:focus,
        input[type=\"color\"]:focus,
        textarea:focus {
        border-color: $first_color!important;
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
        background: $third_color;
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
        background: $fourth_color;
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
        color: $first_color;
        }
    
        .site-content .widget-area ul li:hover {
        border-bottom: 1px solid $first_color;
        }
    
        .scroll-top-button,
        .scroll-top-button:hover,
        .scroll-top-button:focus,
        .widget_price_filter .ui-slider .ui-slider-handle,
        .widget_price_filter .ui-slider .ui-slider-range {
        background: $first_color!important;
        }
    
        #page .site-content .widget-area .widget {
        background-image: linear-gradient( -165deg, $second_color, $gradient_color_b );
        }
    
        .lsow-team-members.lsow-style1 .lsow-team-member-wrapper .lsow-team-member .lsow-team-member-text,
        .grid-item .container .overlay {
        opacity: 0.8;
        background: $third_color;
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
        }";
    wp_add_inline_style( 'zazil-lite-style', $inline_css );
}
add_action( 'wp_enqueue_scripts', 'zazil_lite_styles' );

function zazil_lite_admin_styles() {
    wp_enqueue_style( 'zazil-lite-admin-styles', get_template_directory_uri().'/admin.css', array(), '1.0.0', 'all' );
}
add_action( 'admin_enqueue_scripts', 'zazil_lite_admin_styles' );

function zazil_lite_register_required_plugins() {
    $plugins = array(
        array(
            'name'      => 'Redux Framework',
            'slug'      => 'redux-framework',
            'required'  => false,
        ),
    );

    $config = array(
        'id'           => 'zazil-lite',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'parent_slug'  => 'themes.php',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => false,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
    );

    tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'zazil_lite_register_required_plugins' );

if ( ! function_exists( 'zazil_lite_remove_demo' ) ) {
    function zazil_lite_remove_demo() {
        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
            ), null, 2 );

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
        }
    }
}
add_action( 'redux/loaded', 'zazil_lite_remove_demo' );

function zazil_lite_override_redux_message() {
    update_option( 'ReduxFrameworkPlugin_ACTIVATED_NOTICES', [] );
}
add_action( 'admin_init', 'zazil_lite_override_redux_message', 30 );

function zazil_lite_upgrade_button( $wp_admin_bar ) {
    $args = array(
        'id' => 'upgrade-button',
        'title' => __( 'Upgrade Theme', 'zazil-lite' ),
        'href' => 'http://themes.mishostudio.com/downloads/zazil-wordpress-theme/?version=pro',
        'meta' => array(
            'class' => 'upgrade-button',
            'target' => '_blank'
        )
    );
    $wp_admin_bar->add_node( $args );
}
add_action( 'admin_bar_menu', 'zazil_lite_upgrade_button', 500 );

function zazil_lite_about_theme() { ?>
    <div class="wrap misho-about">
        <h1 class="wp-heading-inline"><?php esc_html_e( 'Zazil Lite by Misho Studio', 'zazil-lite' ); ?></h1>
        <div id="poststuff">
            <table class="wp-list-table widefat go-pro misho-table">
                <tbody>
                <tr>
                    <td>
                        <p>
                            <b><?php esc_html_e( 'Need more options?, Want to support us?, Need technical support? Upgrade your theme now and get a special discount price.', 'zazil-lite' ); ?> <a href="#zazil-prices"><i><?php esc_html_e( 'Check all the features', 'zazil-lite' ); ?></i></a>.</b>
                        </p>
                    </td>
                    <td style="text-align: right">
                        <a href="http://themes.mishostudio.com/downloads/zazil-wordpress-theme/?version=pro" target="_blank" class="button button-primary button-large"><?php esc_html_e( 'Claim your discount!', 'zazil-lite' ); ?></a>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="postbox">
                <div class="inside">
                    <p class="misho-gradient"><a target="_blank" href="http://themes.mishostudio.com/"><img
                                    src="<?php echo get_template_directory_uri(); ?>/images/mishostudio.png"/></a></p>
                </div>
            </div>
            <div class="postbox">
                <div class="inside">
                    <p><img src="<?php echo get_template_directory_uri(); ?>/images/mishostudio_zazil-theme.png"/></p>
                </div>
            </div>
            <div class="postbox misho-description">
                <h2 class="hndle"><span><?php esc_html_e( 'Description', 'zazil-lite' ); ?></span></h2>
                <div class="inside">
                    <p>
                       <?php esc_html_e( 'Zazil is a new multipurpose theme that makes use of the latest design trends: bright and vivid, colors, gradients, broken grid layout and mobile first.', 'zazil-lite' ); ?><br/>
                       <?php esc_html_e( ' Just download, customize and go. Create each part of your website using an intuitive interface without the need to write a single line of code.', 'zazil-lite' ); ?><br/>
                       <?php esc_html_e( 'Give your project a clean, fresh and renewed image.', 'zazil-lite' ); ?>
                    </p>
                </div>
            </div>
            <div class="postbox">
                <h2 class="hndle"><span><?php esc_html_e( 'Demostration video', 'zazil-lite' ); ?></span></h2>
                <div class="inside">
                    <p>
                        <iframe width="100%" height="600px"
                                src="https://www.youtube.com/embed/KBv7LiPDngs?rel=0&amp;controls=0&amp;showinfo=0"
                                frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </p>
                </div>
            </div>
            <a id="zazil-prices"></a>
            <table class="wp-list-table widefat striped misho-features">
                <thead>
                <tr>
                    <th style="padding: 0"><h2><?php esc_html_e( 'Features', 'zazil-lite' ); ?></h2></th>
                    <th style="padding: 0; text-align: center" width="15%"><h2><?php esc_html_e( 'Lite', 'zazil-lite' ); ?></h2></th>
                    <th style="padding: 0; text-align: center" width="15%"><h2><?php esc_html_e( 'PRO', 'zazil-lite' ); ?></h2></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <b><?php esc_html_e( 'Enable Search', 'zazil-lite' ); ?></b><br>
                        <?php esc_html_e( 'Enable or disable default search form.', 'zazil-lite' ); ?>
                    </td>
                    <td style="text-align: center"><span class="dashicons dashicons-no-alt"></span></td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <b><?php esc_html_e( 'SEO - Echo Meta Tags', 'zazil-lite' ); ?></b><br>
                        <?php esc_html_e( 'Zazil Theme generates it\'s own SEO meta tags.', 'zazil-lite' ); ?>
                    </td>
                    <td style="text-align: center"><span class="dashicons dashicons-no-alt"></span></td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <b><?php esc_html_e( 'Copyright Text', 'zazil-lite' ); ?></b><br>
                        <?php esc_html_e( 'Customize footer text.', 'zazil-lite' ); ?>
                    </td>
                    <td style="text-align: center"><span class="dashicons dashicons-no-alt"></span></td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <b><?php esc_html_e( 'Custom CSS', 'zazil-lite' ); ?></b><br>
                        <?php esc_html_e( 'Enter your custom CSS code.', 'zazil-lite' ); ?>
                    </td>
                    <td style="text-align: center"><span class="dashicons dashicons-no-alt"></span></td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <b><?php esc_html_e( 'Custom Code', 'zazil-lite' ); ?></b><br>
                        <?php esc_html_e( 'Enter your custom JavaScript code.', 'zazil-lite' ); ?>
                    </td>
                    <td style="text-align: center"><span class="dashicons dashicons-no-alt"></span></td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <b><?php esc_html_e( 'Google Analytics', 'zazil-lite' ); ?></b><br>
                        <?php esc_html_e( 'Enter your Google Analytics tracking code.', 'zazil-lite' ); ?>
                    </td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <b><?php esc_html_e( 'Favicon', 'zazil-lite' ); ?></b><br>
                        <?php esc_html_e( 'Upload your favicon (.ico)', 'zazil-lite' ); ?>
                    </td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <b><?php esc_html_e( 'Logo Image', 'zazil-lite' ); ?></b><br>
                        <?php esc_html_e( 'Upload your logo.', 'zazil-lite' ); ?>
                    </td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <b><?php esc_html_e( 'Scroll Top Button', 'zazil-lite' ); ?></b><br>
                        <?php esc_html_e( 'Enable Scroll Top button.', 'zazil-lite' ); ?>
                    </td>
                    <td style="text-align: center"><span class="dashicons dashicons-no-alt"></span></td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <b><?php esc_html_e( 'Custom Color Selection', 'zazil-lite' ); ?></b><br>
                        <?php esc_html_e( 'Colorize your theme with any color.', 'zazil-lite' ); ?>
                    </td>
                    <td style="text-align: center"><span class="dashicons dashicons-no-alt"></span></td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <b><?php esc_html_e( '5+ Palette Colors', 'zazil-lite' ); ?></b><br>
                        <?php esc_html_e( 'Up to ten color palettes to choose from.', 'zazil-lite' ); ?>
                    </td>
                    <td style="text-align: center"><span class="dashicons dashicons-no-alt"></span></td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <b><?php esc_html_e( 'Google Fonts', 'zazil-lite' ); ?></b><br>
                        <?php esc_html_e( 'Dozens of fonts in any color.', 'zazil-lite' ); ?>
                    </td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <b><?php esc_html_e( 'Custom Error Page', 'zazil-lite' ); ?></b><br>
                        <?php esc_html_e( 'Publish your own error message.', 'zazil-lite' ); ?>
                    </td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <b><?php esc_html_e( '3+ Social Accounts Links', 'zazil-lite' ); ?></b><br>
                        <?php esc_html_e( 'Up to nine social accounts to choose from.', 'zazil-lite' ); ?>
                    </td>
                    <td style="text-align: center"><span class="dashicons dashicons-no-alt"></span></td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <b><?php esc_html_e( '2+ Social Sharing Buttons', 'zazil-lite' ); ?></b><br>
                        <?php esc_html_e( 'Up to six social share buttons to choose from.', 'zazil-lite' ); ?>
                    </td>
                    <td style="text-align: center"><span class="dashicons dashicons-no-alt"></span></td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <b><?php esc_html_e( 'Control Panel', 'zazil-lite' ); ?></b><br>
                        <?php esc_html_e( 'Customize your website using an intuitive interface.', 'zazil-lite' ); ?>
                    </td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td style="text-align: right" colspan="3">
                        <a href="http://themes.mishostudio.com/downloads/zazil-wordpress-theme/?version=pro" target="_blank" class="button button-primary button-large"><?php esc_html_e( 'Claim your discount!', 'zazil-lite' ); ?></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}
add_action( 'admin_menu', 'zazil_lite_about_theme_menu' );

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

function zazil_lite_about_theme_menu() {
    add_theme_page( 'Zazil Lite by Misho Studio', 'About Zazil Lite', 'edit_theme_options', 'about-theme', 'zazil_lite_about_theme' );
}

if ( is_admin() && isset( $_GET['activated'] ) ){
    wp_redirect( admin_url( "themes.php?page=about-theme" ) );
}

require_once ( dirname(__FILE__) . '/template-options/template-options.php' );
require_once get_template_directory() . '/tgm-plugin-activation.php';

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}