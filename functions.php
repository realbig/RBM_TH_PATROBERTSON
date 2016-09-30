<?php
/**
 * The theme's functions file that loads on EVERY page, used for uniform functionality.
 *
 * @since   1.0.0
 * @package PatRobertson
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

// Make sure PHP version is correct
if ( ! version_compare( PHP_VERSION, '5.3.0', '>=' ) ) {
	wp_die( 'ERROR in Pat Robertson theme: PHP version 5.3 or greater is required.' );
}

// Make sure no theme constants are already defined (realistically, there should be no conflicts)
if ( defined( 'THEME_VERSION' ) || defined( 'THEME_ID' ) || isset( $theme_fonts ) ) {
    wp_die( 'ERROR in Pat Robertson theme: There is a conflicting constant. Please either find the conflict or rename the constant.' );
}

/**
 * Define Constants based on our Stylesheet Header. Update things only once!
 * 
 * @since 1.0.0
 * @return void
 */
add_action( 'init', function() {

    $theme_header = wp_get_theme();

    define( 'THEME_ID', $theme_header->get( 'TextDomain' ) );
    define( 'THEME_VERSION', $theme_header->get( 'Version' ) );

} );

/**
 * Fonts for the theme. Must be hosted font (Google fonts for example).
 */
$theme_fonts = array(
	'open-sans' => '//fonts.googleapis.com/css?family=Open+Sans:300italic,700,300,800',
    'satisfy' => '//fonts.googleapis.com/css?family=Satisfy',
    'font-awesome' => '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css',
);

/**
 * Register theme files.
 *
 * @since 1.0.0
 */
add_action( 'init', function () {

	global $theme_fonts;

	// Theme styles
	wp_register_style(
		THEME_ID,
		get_template_directory_uri() . '/style.css',
		null,
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : THEME_VERSION
	);

	// Theme script
	wp_register_script(
		THEME_ID,
		get_template_directory_uri() . '/assets/js/script.js',
		array( 'jquery' ),
		defined( 'WP_DEBUG' ) && WP_DEBUG ? time() : THEME_VERSION,
		true
	);

	// Theme fonts
	if ( ! empty( $theme_fonts ) ) {
		foreach ( $theme_fonts as $ID => $link ) {
			wp_register_style(
				THEME_ID . "-font-$ID",
				$link
			);
		}
	}
} );

/**
 * Enqueue theme files.
 *
 * @since 1.0.0
 */
add_action( 'wp_enqueue_scripts', function () {

	global $theme_fonts;

	// Theme styles
	wp_enqueue_style( THEME_ID );

	// Theme script
	wp_enqueue_script( THEME_ID );

	// Theme fonts
	if ( ! empty( $theme_fonts ) ) {
		foreach ( $theme_fonts as $ID => $link ) {
			wp_enqueue_style( THEME_ID . "-font-$ID" );
		}
	}
} );

/**
 * Register nav menus.
 *
 * @since 1.0.0
 */
add_action( 'after_setup_theme', function () {
	register_nav_menu( 'primary', 'Primary Menu' );
} );

/**
 * Register sidebars.
 *
 * @since 1.0.0
 */
add_action( 'widgets_init', function () {

    // Footer left
    register_sidebar( array(
    	'name' => 'Footer Left',
    	'id' => 'footer-left',
    	'description' => 'Displays in the left side of the footer.',
    	'before_title' => '<h3 class="footer-widget-title">',
    	'after_title' => '</h3>',
    ) ); 
    
    // Footer center
    register_sidebar( array(
    	'name' => 'Footer Center',
    	'id' => 'footer-center',
    	'description' => 'Displays in the center of the footer.',
    	'before_title' => '<h3 class="footer-widget-title">',
    	'after_title' => '</h3>',
    ) ); 
    
    // Footer right
    register_sidebar( array(
    	'name' => 'Footer Right',
    	'id' => 'footer-right',
    	'description' => 'Displays in the right side of the footer.',
    	'before_title' => '<h3 class="footer-widget-title">',
    	'after_title' => '</h3>',
    ) );
    
} );

/**
 * Setup theme properties and stuff
 * 
 * @since 1.0.0
 * @return void
 */
add_action( 'after_setup_theme', function () {

    // Add theme support
    require_once __DIR__ . '/includes/theme-support.php';

    // Nav Walker for Foundation
    require_once __DIR__ . '/includes/class-foundation-nav-walker.php';
    
    // Add Customizer Controls
    add_action( 'customize_register', 'pat_customize_register' );

    // Allow shortcodes in text widget
    add_filter( 'widget_text', 'do_shortcode' );

} );

/**
 * Make YouTube videos not show suggested videos at the end
 * 
 * @param string $return HTML
 * @param object $data Data Object returned from oEmbed provider
 * @param string $url URL String
 * 
 * @since 1.0.0
 * @return HTML
 */
add_filter( 'oembed_dataparse', function( $return, $data, $url ) {
    
    if ( $data->provider_name == 'YouTube' ) {
        
        $return = str_replace( '?feature=oembed"', '?feature=oembed&rel=0" class="youtube-embed"', $return );
    }
    
    return $return;
    
}, 10, 3 );

/**
 * Adds custom Customizer Controls.
 *
 * @since 0.1.0
 */
function pat_customize_register( $wp_customize ) {
    
    require_once __DIR__ . '/includes/customizer/class-text-editor-custom-control.php';
    
    // General Theme Options
    $wp_customize->add_section( 'pat_customizer_section' , array(
            'title'      => _x( 'Pat Robertson Settings', 'Customizer Section Label', THEME_ID ),
            'priority'   => 30,
        ) 
    );
    
    $wp_customize->add_setting( 'pat_header_image', array(
            'default' => 1,
            'transport' => 'refresh',
        ) 
    );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'pat_header_image_settings', array(
        'label' => _x( 'Header Image', 'Header Image Customizer Label', THEME_ID ),
        'section' => 'pat_customizer_section',
        'settings' => 'pat_header_image',
        'mime_type' => 'image',
    ) ) );
    
    $wp_customize->add_setting( 'pat_header_text', array(
            'default' => _x( '<h1>Unlocking the Extraordinary <br />from the Everyday</h1>', 'Default Customizer Header Text', THEME_ID ),
            'transport' => 'refresh',
        )
    );
    $wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'pat_header_text_settings', array(
        'label' => _x( 'Header Text', 'Header Text Customizer Label', THEME_ID ),
        'section' => 'pat_customizer_section',
        'settings' => 'pat_header_text',
    ) ) );
    
    $wp_customize->add_setting( 'pat_footer_image', array(
            'default' => 1,
            'transport' => 'refresh',
        ) 
    );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'pat_footer_image_settings', array(
        'label' => _x( 'Footer Image', 'Footer Image Customizer Label', THEME_ID ),
        'section' => 'pat_customizer_section',
        'settings' => 'pat_footer_image',
        'mime_type' => 'image',
    ) ) );
    
    $wp_customize->add_setting( 'pat_footer_text_settings', array(
            'default' =>  _x( '<h1>When life knocks you down <br />get up and dance!</h1>', 'Default Customizer Header Text', THEME_ID ),
            'transport' => 'refresh',
        )
    );
    $wp_customize->add_control( new Text_Editor_Custom_Control( $wp_customize, 'pat_footer_text_settings', array(
        'label' => _x( 'Footer Text', 'Footer Text Customizer Label', THEME_ID ),
        'section' => 'pat_customizer_section',
        'settings' => 'pat_footer_text',
    ) ) );
    
}

add_action( 'widgets_init', 'pat_register_widgets' );
function pat_register_widgets() {
    
    require_once __DIR__ . '/includes/widgets/class-pat-social-widget.php';
    
    register_widget( 'Pat_Social_Widget' );
    
}

require_once __DIR__ . '/admin/admin.php';