<?php
/**
 * Books extra meta.
 *
 * @since   1.0.0
 * @package PatRobertson
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

// Add the Metaboxes that we want for the Home Page
add_action( 'add_meta_boxes', 'pat_add_books_metaboxes' );

// Have the Permalink show the Amazon URL if applicable
add_filter( 'get_sample_permalink_html', 'pat_books_alter_permalink_html', 10, 5 );

/**
 * Create Metaboxes for the Books Post Type
 * 
 * @since       1.0.0
 * @return      void
 */
function pat_add_books_metaboxes() {

    add_meta_box(
        'pat-books-amazon',
        _x( 'External Link', 'Books External Link Metabox Title', THEME_ID ),
        'pat_books_external_link_metabox_content',
        'pat-books',
        'side'
    );
    
}

/**
 * Put fields in the Metabox
 * 
 * @since       1.0.0
 * @return      void
 */
function pat_books_external_link_metabox_content() {
    
    rbm_do_field_text(
        'pat_books_amazon_link',
        _x( 'Amazon Link for this Book', 'Books Amazon Link Label', THEME_ID ),
        false,
        array(
            'description' => _x( "This overrides the default WordPress Permalink. This Book's link will automatically direct to Amazon if set.", 'Books Amazon Link Description', THEME_ID ),
        )
    );
    
}

// Force a 404 on Book Single pages that should redirect to Amazon
// This cannot go in the Hooks File as it loads within the Template itself, by then it is too late
add_filter( 'template_include', 'pat_books_force_404' );

/**
 * Show the Amazon URL as the Permalink Sample if this Book has one set
 * 
 * @param       string  $return    Sample HTML Markup
 * @param       integer $post_id   Post ID
 * @param       string  $new_title New Sample Permalink Title
 * @param       string  $new_slug  New Sample Permalnk Slug
 * @param       object  $post      WP Post Object
 *                                         
 * @since       1.0.0
 * @return      string  Modified HTML Markup
 */
function pat_books_alter_permalink_html( $return, $post_id, $new_title, $new_slug, $post ) {
    
    // No sense in a database query if it isn't the correct Post Type
    if ( $post->post_type == 'pat-books' ) {
    
        if ( $amazon_link = get_post_meta( $post_id, '_rbm_pat_books_amazon_link', true ) ) {

            $return = preg_replace( '/<a.*<\/a>/', '<a href="' . $amazon_link . '">' . $amazon_link . '</a>', $return );

            $return = str_replace( '<span id="edit-slug-buttons"><button type="button" class="edit-slug button button-small hide-if-no-js" aria-label="Edit permalink">Edit</button></span>', '', $return );

        }
        
    }
    
    return $return;
    
}