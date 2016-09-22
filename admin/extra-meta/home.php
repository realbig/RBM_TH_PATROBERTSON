<?php
/**
 * Home extra meta.
 *
 * @since   1.0.0
 * @package PatRobertson
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

$home_page = get_option( 'page_on_front' );

// Remove unneeded Default Meta/Supports for the Home Page
add_action( 'update_post_meta', 'pat_remove_home_supports' );
add_action( 'do_meta_boxes', 'pat_remove_home_metaboxes' );

// Add the Metaboxes that we want for the Home Page
add_action( 'add_meta_boxes', 'pat_add_home_metaboxes' );

/**
 * update_post_meta is at just the right position to have access to the Post ID as well as remove Supports
 * 
 * @since       1.0.0
 * @return      void
 */
function pat_remove_home_supports() {
    
    global $post;
    global $home_page;
    
    if ( $post->ID == $home_page ) {

        remove_post_type_support( 'page', 'thumbnail' );
        remove_post_type_support( 'page', 'editor' );
        
    }
    
}

/**
 * Needs to be called at do_meta_boxes since it is created at a different time than Supports Metaboxes
 * 
 * @since       1.0.0
 * @return      void
 */
function pat_remove_home_metaboxes() {
    
    global $post;
    global $home_page;
    
    if ( $post->ID == $home_page ) {
    
        // "Attributes" Meta Box
        remove_meta_box( 'pageparentdiv', 'page', 'side' );
        
    }
    
}

/**
 * Create Metaboxes for the Home Page
 * 
 * @since       1.0.0
 * @return      void
 */
function pat_add_home_metaboxes() {
    
    global $post;
    global $home_page;
    
    if ( $post->ID == $home_page ) {
    
        add_filter( 'rbm_load_select2', '__return_true' );

        add_meta_box(
            'pat-home-about',
            _x( 'About Section', 'Home About Metabox Title', THEME_ID ),
            'pat_home_about_metabox_content',
            'page',
            'normal'
        );
        
    }
    
}

/**
 * Put fields in the Metabox
 * 
 * @since       1.0.0
 * @return      void
 */
function pat_home_about_metabox_content() {
    
    rbm_do_field_media(
        'pat_home_about_image',
        _x( 'Image', 'Home About Image Label', THEME_ID ),
        false,
        array(
            'type' => 'image',
            'button_text' => _x( 'Upload/Choose Image', 'Home About Image Upload Button Text', THEME_ID ),
            'button_remove_text' => _x( 'Remove Image', 'Home About Image Remove Button Text', THEME_ID ),
            'window_title' => _x( 'Choose Image', 'Home About Image Window Title', THEME_ID ),
            'window_button_text' => _x( 'Use Image', 'Home About Image Select Button Text', THEME_ID ),
        )
    );
    
    rbm_do_field_wysiwyg(
        'pat_home_about_text',
        _x( 'Content', 'Home About Content', THEME_ID ),
        false,
        array()
    );
    
}