<?php
/**
 * Books extra meta.
 *
 * @since   1.0.0
 * @package PatRobertson
 * @subpackage  PatRobertson/admin/extra-meta
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

// Add the Metaboxes that we want for the Home Page
add_action( 'add_meta_boxes', 'pat_add_books_metaboxes' );

/**
 * Create Metaboxes for the Books Post Type
 * 
 * @since       1.0.0
 * @return      void
 */
function pat_add_books_metaboxes() {

    add_meta_box(
        'pat-books-amazon',
        _x( 'Amazon Information', 'Amazon Information Metabox Title', THEME_ID ),
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
    
    rbm_do_field_checkbox(
        'pat_books_amazon_sale',
        _x( 'Is this Book on Sale?', 'Books Amazon Sale Label', THEME_ID ),
        false,
        array()
    );
    
}