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
    wp_enqueue_style( 'zazil-lite-font-awesome', get_template_directory_uri() . '/css/fontawesome.css', array(), '5.0.10', 'all' );
	wp_enqueue_style( 'zazil-lite-style', get_stylesheet_uri() );
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
        array(
            'name'      => 'Page Builder by SiteOrigin',
            'slug'      => 'siteorigin-panels',
            'required'  => false,
        ),
        array(
            'name'      => 'SiteOrigin Widgets Bundle',
            'slug'      => 'so-widgets-bundle',
            'required'  => false,
        ),
        array(
            'name'      => 'Livemesh SiteOrigin Widgets',
            'slug'      => 'livemesh-siteorigin-widgets',
            'required'  => false,
        ),
        array(
            'name'      => 'Crelly Slider',
            'slug'      => 'crelly-slider',
            'required'  => false,
        ),
        array(
            'name'      => 'Better Font Awesome',
            'slug'      => 'better-font-awesome',
            'required'  => false,
        ),
        array(
            'name'      => 'One Click Demo Import',
            'slug'      => 'one-click-demo-import',
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

if ( ! function_exists( 'remove_demo' ) ) {
    function remove_demo() {
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
add_action( 'redux/loaded', 'remove_demo' );

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
                <h2 class="hndle"><span><?php esc_html_e( 'Installation: Plugins', 'zazil-lite' ); ?></span></h2>
                <div class="inside">
                    <ol>
                        <li><?php esc_html_e( 'Click Begin Installing Plugins on the notice displayed in the welcome page.', 'zazil-lite' ); ?></li>
                        <li><?php esc_html_e( 'Select all plugins and choose Install on Bulk Actions. Click Apply.', 'zazil-lite' ); ?></li>
                        <li><?php esc_html_e( 'After install click Return to Required Plugins Installer.', 'zazil-lite' ); ?></li>
                        <li><?php esc_html_e( 'Select all plugins and choose Activate on Bulk Actions. Click Apply.', 'zazil-lite' ); ?></li>
                        <ol>
                            <li><?php esc_html_e( 'After activation, Livemesh SiteOrigin Widgets plugin will ask you for tracking data. Choose any.', 'zazil-lite' ); ?></li>
                            <li><?php esc_html_e( 'Then Livemesh SiteOrigin Widgets plugin will redirect you to its Control Panel.', 'zazil-lite' ); ?></li>
                            <li><?php esc_html_e( 'Click Activate All Plugin Widgets, click Save Settings and that\'s all.', 'zazil-lite' ); ?></li>
                        </ol>
                    </ol>
                </div>
            </div>
            <div class="postbox">
                <h2 class="hndle"><span><?php esc_html_e( 'Installation: Demo Data', 'zazil-lite' ); ?></span></h2>
                <div class="inside">
                    <ol>
                        <li><?php esc_html_e( 'In your admin panel, go to Appearance > Import Demo Data.', 'zazil-lite' ); ?></li>
                        <li><?php esc_html_e( 'Then click Import Demo Data.', 'zazil-lite' ); ?></li>
                        <li><?php esc_html_e( 'Go to Crelly Slider and click Import Slider.', 'zazil-lite' ); ?></li>
                        <li><?php esc_html_e( 'Select the slider you need according to the demo that you selected.', 'zazil-lite' ); ?></li>
                        <li><?php esc_html_e( 'Go to Settings > Reading choose A Static Page on Your Homepage Displays.', 'zazil-lite' ); ?></li>
                        <li><?php esc_html_e( 'Set Home for Homepage and Blog for Posts Page and that\'s all.', 'zazil-lite' ); ?></li>
                    </ol>

                    <b><?php esc_html_e( 'Notes:', 'zazil-lite' ); ?></b>
                    <ol>
                        <li><i><?php esc_html_e( 'Images shown in the previews are not included in the Demo Data for protecting against Copyright issues.', 'zazil-lite' ); ?></i></li>
                        <li><i><?php esc_html_e( 'Download sliders (if not included) from our repository: ', 'zazil-lite' ); ?><a target="_blank" href="https://github.com/MishoStudio/zazil-lite-sliders"><?php esc_html_e( 'https://github.com/MishoStudio/zazil-lite-sliders', 'zazil-lite' ); ?></a></i></li>
                    </ol>
                </div>
            </div>
            <div class="postbox">
                <h2 class="hndle"><span><?php esc_html_e( 'Installation Video', 'zazil-lite' ); ?></span></h2>
                <div class="inside">
                    <p>
                        <iframe width="100%" height="600px"
                                src="https://www.youtube.com/embed/iLgRBOgFLs0?rel=0&amp;controls=0&amp;showinfo=0"
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
                        <b><?php esc_html_e( '60+ Widgets', 'zazil-lite' ); ?></b><br>
                        <?php esc_html_e( 'More than sixty widgets to choose from.', 'zazil-lite' ); ?>
                    </td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
                </tr>
                <tr>
                    <td>
                        <b><?php esc_html_e( 'One Click Install', 'zazil-lite' ); ?></b><br>
                        <?php esc_html_e( 'Install any of our demos with just one click.', 'zazil-lite' ); ?>
                    </td>
                    <td style="text-align: center"><span class="dashicons dashicons-yes"></span></td>
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
                    <td>
                        <b><?php esc_html_e( 'Page Builder', 'zazil-lite' ); ?></b><br>
                        <?php esc_html_e( 'You just need to drag and drop.', 'zazil-lite' ); ?>
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

function zazil_lite_ocdi_import_files() {
    return array(
        array(
            'import_file_name'             => 'Demo One',
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo/01-one/demo-content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo/01-one/widgets.json',
            'local_import_redux'           => array(
                array(
                    'file_path'   => trailingslashit( get_template_directory() ) . 'demo/01-one/redux.json',
                    'option_name' => 'misho_opt',
                ),
            ),
            'import_preview_image_url'     => get_template_directory_uri() . '/demo/01-one/screenshot.png',
            'import_notice'                => __( 'Don\'t forget to import the <b>Slider One</b> separately using the Crelly Slider plugin.', 'zazil-lite' ),
            'preview_url'                  => 'http://themes.mishostudio.com/showcase/zazil/zazil-theme-one/',
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'zazil_lite_ocdi_import_files' );

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