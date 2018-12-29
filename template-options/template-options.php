<?php
/**
 * Theme Name: Zazil Lite
 * Author: Misho Studio
 * Author URI: http://mishostudio.com/
 *
 * @package zazil-lite
 */
if ( ! class_exists( 'Redux' ) ) {
    return;
}

$opt_name = "misho_opt";
$theme = wp_get_theme();

$args = array(
    'opt_name'             => $opt_name,
    'display_name'         => $theme->get( 'Name' ),
    'display_version'      => $theme->get( 'Version' ),
    'menu_type'            => 'menu',
    'allow_sub_menu'       => true,
    'menu_title'           => __( 'Theme Options', 'zazil-lite' ),
    'page_title'           => __( 'Theme Options', 'zazil-lite' ),
    'google_api_key'       => '',
    'google_update_weekly' => false,
    'async_typography'     => true,
    'admin_bar'            => false,
    'admin_bar_icon'       => 'dashicons-admin-customizer',
    'admin_bar_priority'   => 50,
    'global_variable'      => '',
    'dev_mode'             => false,
    'update_notice'        => true,
    'customizer'           => true,
    'page_priority'        => null,
    'page_parent'          => 'themes.php',
    'page_permissions'     => 'manage_options',
    'menu_icon'            => '',
    'last_tab'             => '',
    'page_icon'            => 'icon-themes',
    'page_slug'            => '_options',
    'save_defaults'        => true,
    'default_show'         => false,
    'default_mark'         => '',
    'show_import_export'   => true,
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    'output_tag'           => true,
    'database'             => '',
    'use_cdn'              => true,
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'light',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    )
);

$args['admin_bar_links'][] = array(
    'id'    => 'misho-support',
    'href'  => 'http://themes.mishostudio.com/downloads/zazil-wordpress-theme/?version=pro',
    'title' => __( 'Support', 'zazil-lite' ),
);

$args['share_icons'][] = array(
    'url'   => 'https://www.facebook.com/mishostudio',
    'title' => 'Like us on Facebook',
    'icon'  => 'el el-facebook'
);
$args['share_icons'][] = array(
    'url'   => 'https://twitter.com/mishostudio',
    'title' => 'Follow us on Twitter',
    'icon'  => 'el el-twitter'
);
$args['share_icons'][] = array(
    'url'   => 'https://www.instagram.com/misho.studio',
    'title' => 'Follow us on Instagram',
    'icon'  => 'el el-instagram'
);

$args['share_icons'][] = array(
    'url'   => 'https://plus.google.com/+MishostudioWeb',
    'title' => 'Follow us on Google+',
    'icon'  => 'el el-googleplus'
);

$args['intro_text'] = __( '<p><b>Need more options?, Want to support us?, Need technical support? Upgrade your theme now and get a special discount price. <a href="http://themes.mishostudio.com/downloads/zazil-wordpress-theme/?version=pro" target="_blank"><i>Claim your discount!</i></a></b></p>', 'zazil-lite' );

Redux::setArgs( $opt_name, $args );

Redux::setSection( $opt_name, array(
    'title'      => __( 'General', 'zazil-lite' ),
    'id'         => 'general-options',
    'icon'   => 'el el-cogs',
    'fields'     => array(

        array(
            'id'       => 'google-analytics',
            'type'     => 'textarea',
            'title'    => __( 'Google Analytics', 'zazil-lite' ),
            'subtitle' => __( 'Google Analytics tracking code.', 'zazil-lite' ),
        ),
        array(
            'id'       => 'logo-image',
            'type'     => 'media',
            'url'      => true,
            'title'    => __( 'Logo Image', 'zazil-lite' ),
            'compiler' => 'true',
            'mode'      => 'image',
            'subtitle' => __( 'Upload your logo image.', 'zazil-lite' ),
            'default'  => array( 'url' => get_template_directory_uri() . '/images/mishostudio.png' ),
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title' => __( 'Colors', 'zazil-lite' ),
    'id'    => 'color',
    'desc'  => __( '', 'zazil-lite' ),
    'icon'  => 'el el-brush'
) );

Redux::setSection( $opt_name, array(
    'title'      => __( 'Palette Colors', 'zazil-lite' ),
    'id'         => 'color-palette',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'opt-palette-color',
            'type'     => 'palette',
            'title'    => __( 'Palette Color Options', 'zazil-lite' ),
            'subtitle' => __( 'Select a color palette.', 'zazil-lite' ),
            'default'  => 'b',
            'palettes' => array(
                //Palettes a, b, c, g, h on PRO version.
                'a'  => array(
                    '#FC5C7D',
                    '#6A82FB',
                    '#CDD5FE',
                    '#FED1DA',
                    '#9A4C95',
                    '#4D2D52',
                ),
                'b' => array(
                    '#22C1C3',
                    '#FDBB2D',
                    '#CCF6F6',
                    '#FFF1D5',
                    '#FF5F1E',
                    '#136B6C',
                ),
                'c' => array(
                    '#FF070B',
                    '#E5008D',
                    '#FFC3E8',
                    '#D3ECFB',
                    '#043451',
                    '#043451',
                ),
                'g'  => array(
                    '#C02425',
                    '#F0CB35',
                    '#C8FFD7',
                    '#F3BDBD',
                    '#00B733',
                    '#00B733',
                ),
                'h' => array(
                    '#FC00FF',
                    '#00DBDE',
                    '#FEBBFF',
                    '#BCFEFF',
                    '#00A9AB',
                    '#870088',
                ),
            )
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'  => __( 'Typography', 'zazil-lite' ),
    'id'     => 'typography',
    'icon'   => 'el el-font',
    'fields' => array(
        array(
            'id'       => 'main-font-family',
            'type'     => 'typography',
            'title'    => __( 'Font Family', 'zazil-lite' ),
            'subtitle' => __( 'Select a main font-family.', 'zazil-lite' ),
            'text-align' => false,
            'font-size' => false,
            'font-weight' => false,
            'font-style' => false,
            'subsets' => false,
            'line-height' => false,
            'google' => true,
            'default' => array(
                'color'       => '#404040',
                'font-family' => 'Open Sans',
            ),
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'     => __( '404', 'zazil-lite' ),
    'id'        => '404',
    'icon'      => 'el el-warning-sign',
    'fields'    => array(
        array(
            'id'       => 'page-title',
            'type'     => 'text',
            'title'    => __( 'Page Title', 'zazil-lite' ),
            'subtitle' => __( 'Set title for error page.', 'zazil-lite' ),
            'default'  => __( 'Oops! That page can&rsquo;t be found.', 'zazil-lite' ),
        ),
        array(
            'id'         => 'page-content',
            'type'       => 'editor',
            'title'      => __( 'Page Content', 'zazil-lite' ),
            'subtitle' => __( 'Set content for error page.', 'zazil-lite' ),
            'default'  => __( 'It looks like nothing was found at this location.', 'zazil-lite' ),
        ),
        array(
            'id'       => 'page-enable-search',
            'type'     => 'switch',
            'title'    => __( 'Enable Search', 'zazil-lite' ),
            'subtitle' => __( 'Enable or disable default search form.', 'zazil-lite' ),
            'default'  => true,
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'     => __( 'Social Accounts', 'zazil-lite' ),
    'id'        => 'social_accounts',
    'icon'      => 'el el-facebook',
    'fields'    => array(
        array(
            'id'       => 'social-facebook',
            'type'     => 'text',
            'title'    => __( 'Facebook', 'zazil-lite' ),
            'subtitle' => __( 'Enter full link to your account (including http://)', 'zazil-lite' ),
        ),
        array(
            'id'       => 'social-twitter',
            'type'     => 'text',
            'title'    => __( 'Twitter', 'zazil-lite' ),
            'subtitle' => __( 'Enter full link to your account (including http://)', 'zazil-lite' ),
        ),
        array(
            'id'       => 'social-googleplus',
            'type'     => 'text',
            'title'    => __( 'Google Plus', 'zazil-lite' ),
            'subtitle' => __( 'Enter full link to your account (including http://)', 'zazil-lite' ),
        ),
        array(
            'id'       => 'open-link-new-tab',
            'type'     => 'switch',
            'title'    => __( 'Open Social link in new tab?', 'zazil-lite' ),
            'subtitle' => __( 'Enable link in new tab.', 'zazil-lite' ),
            'default'  => true,
        ),
    )
) );

Redux::setSection( $opt_name, array(
    'title'     => __( 'Social Sharing', 'zazil-lite' ),
    'id'        => 'social_sharing',
    'icon'      => 'el el-share',
    'fields'    => array(
        array(
            'id'       => 'social-sharing-facebook',
            'type'     => 'switch',
            'title'    => __( 'Facebook Share', 'zazil-lite' ),
            'subtitle' => __( 'Enable Facebook Share button.', 'zazil-lite' ),
            'default'  => true,
        ),
        array(
            'id'       => 'social-sharing-twitter',
            'type'     => 'switch',
            'title'    => __( 'Twitter Share', 'zazil-lite' ),
            'subtitle' => __( 'Enable Twitter Share button.', 'zazil-lite' ),
            'default'  => true,
        ),
    )
) );