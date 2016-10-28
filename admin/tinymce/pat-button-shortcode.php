<?php
/**
 * Add a TinyMCE button to create [pat_button] Shortcodes
 *
 * @since   1.0.0
 * @package PatRobertson
 * @subpackage  PatRobertson/admin/tinymce
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Add Button Shortcode to TinyMCE
 *
 * @since       1.0.0
 * @return      void
 */
add_action( 'admin_init', 'add_pat_button_tinymce_filters' );
function add_pat_button_tinymce_filters() {
    
    if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
        
        add_filter( 'mce_buttons', function( $buttons ) {
            array_push( $buttons, 'pat_button_shortcode' );
            return $buttons;
        } );
        
        // Attach script to the button rather than enqueueing it
        add_filter( 'mce_external_plugins', function( $plugin_array ) {
            $plugin_array['pat_button_shortcode_script'] = get_stylesheet_directory_uri() . '/assets/js/tinymce/button-shortcode.js';
            return $plugin_array;
        } );
        
    }
    
}

/**
 * Add Localized Text for our TinyMCE Button
 *
 * @since       1.0.0
 * @return      Array Localized Text
 */
add_filter( 'pat_tinymce_l10n', 'pat_tinymce_l10n' );
function pat_tinymce_l10n( $l10n ) {
    
    $l10n['pat_button_shortcode'] = array(
        'tinymce_title' => _x( 'Add Button', 'Button Shortcode TinyMCE Button Text', THEME_ID ),
        'button_text' => array(
            'label' => _x( 'Button Text', "Button's Text", THEME_ID ),
        ),
        'button_url' => array(
            'label' => _x( 'Button Link', 'Link for the Button', THEME_ID ),
        ),
        'colors' => array(
            'label' => _x( 'Color', 'Button Color Selection Label', THEME_ID ),
            'default' => 'primary',
            'choices' => array(
                'primary' => _x( 'Dark Orange', 'Primary Theme Color', THEME_ID ),
                'secondary' => _x( 'Light Orange', 'Secondary Theme Color', THEME_ID ),
            ),
        ),
        'size' => array(
            'label' => _x( 'Size', 'Button Size Selection Lable', THEME_ID ),
            'default' => 'small',
            'choices' => array(
                'tiny' => _x( 'Tiny', 'Tiny Button Size', THEME_ID ),
                'small' => _x( 'Small', 'Small Button Size', THEME_ID ),
                'medium' => _x( 'Medium', 'Medium Button Size', THEME_ID ),
                'large' => _x( 'Large', 'Large Button Size', THEME_ID ),
            ),
        ),
        'hollow' => array(
            'label' => _x( 'Hollow/"Ghost" Button?', 'Hollow Button Style', THEME_ID ),
        ),
        'expand' => array(
            'label' => _x( 'Full Width?', 'Full Width Button', THEME_ID ),
        ),
        'new_tab' => array(
            'label' => __( 'Open Link in a New Tab?', THEME_ID ),
        ),
    );
    
    return $l10n;
    
}