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

// Remove unneeded Default Meta/Supports for the Home Page
add_action( 'init', 'pat_remove_home_supports' );
add_action( 'do_meta_boxes', 'pat_remove_home_metaboxes' );

// Add the Metaboxes that we want for the Home Page
add_action( 'add_meta_boxes', 'pat_add_home_metaboxes' );

/**
 * Remove Supports from the Home Page
 * 
 * @since       1.0.0
 * @return      void
 */
function pat_remove_home_supports() {
    
    if ( is_admin() && isset( $_REQUEST['post'] ) && $_REQUEST['post'] == get_option( 'page_on_front' ) ) {

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
    
    if ( is_admin() && isset( $_REQUEST['post'] ) && $_REQUEST['post'] == get_option( 'page_on_front' ) ) {
    
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
    
    if ( is_admin() && isset( $_REQUEST['post'] ) && $_REQUEST['post'] == get_option( 'page_on_front' ) ) {

        add_meta_box(
            'pat-home-about',
            _x( 'About Section', 'Home About Metabox Title', THEME_ID ),
            'pat_home_about_metabox_content',
            'page',
            'normal'
        );
        
        add_meta_box(
            'pat-home-speaker',
            _x( 'Speaker Section', 'Home Speaker Metabox Title', THEME_ID ),
            'pat_home_speaker_metabox_content',
            'page',
            'normal'
        );
        
    }
    
}

/**
 * Put fields in the About Metabox
 * 
 * @since       1.0.0
 * @return      void
 */
function pat_home_about_metabox_content() {
    
    rbm_do_field_text(
        'pat_home_about_title',
        _x( 'Title', 'Home About Title', THEME_ID ),
        false,
        array(
            'default' => _x( 'About Patricia', 'Default Home About Title Text', THEME_ID ),
        )
    );
    
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
        array(
            'default' => _x( 'The introverted wallflower who prefers to work behind the scenes rather than to be out front. I am a woman, loved by God, called to grow in my relationship with God and help others with their relationships through writing, teaching, pastoral counseling and right relationships.<blockquote>Writing words of hope to those who have given up their dreams or misplaced them. Patricia writes for ordinary people, living extraordinary lives.</blockquote>', 'Default Home About Content', THEME_ID ),
        )
    );
    
}

/**
 * Put fields in the Speaker Metabox
 * 
 * @since       1.0.0
 * @return      void
 */
function pat_home_speaker_metabox_content() {
    
    rbm_do_field_text(
        'pat_home_speaker_title',
        _x( 'Title', 'Home Speaker Title Label', THEME_ID ),
        false,
        array(
            'default' => _x( 'Book me as a speaker!', 'Default Home Speaker Title Text', THEME_ID ),
        )
    );
    
    rbm_do_field_text(
        'pat_home_speaker_button_text',
        _x( 'Button Text', 'Home Speaker Button Text Label', THEME_ID ),
        false,
        array(
            'default' => _x( 'Book Me Now', 'Default Home Speaker Button Text', THEME_ID ),
        )
    );
    
    rbm_do_field_text(
        'pat_home_speaker_button_link',
        _x( 'Button Link', 'Home Speaker Button Link Label', THEME_ID ),
        false,
        array(
            'default' => _x( '#', 'Default Home Speaker Button Link', THEME_ID ),
            'input_atts' => array(
                'placeholder' => _x( 'http://', 'Home Speaker Button Link Placeholder', THEME_ID ),
            ),
        )
    );
    
    rbm_do_field_media(
        'pat_home_speaker_image',
        _x( 'Image', 'Home Speaker Image Label', THEME_ID ),
        false,
        array(
            'type' => 'image',
            'button_text' => _x( 'Upload/Choose Image', 'Home Speaker Image Upload Button Text', THEME_ID ),
            'button_remove_text' => _x( 'Remove Image', 'Home Speaker Image Remove Button Text', THEME_ID ),
            'window_title' => _x( 'Choose Image', 'Home Speaker Image Window Title', THEME_ID ),
            'window_button_text' => _x( 'Use Image', 'Home Speaker Image Select Button Text', THEME_ID ),
        )
    );
    
}