<?php
/**
 * Adding a Category Taxonomy for Books
 *
 * @since   1.0.0
 * @package PatRobertson
 * @subpackage  PatRobertson/admin/taxonomies
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_action( 'init', 'pat_book_categories' );

function pat_book_categories() {

    // Add new Book Category, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Book Categories', 'Book Category General Name', THEME_ID ),
        'singular_name'     => _x( 'Book Category', 'Book Category Singular Name', THEME_ID ),
        'search_items'      => _x( 'Search Book Categories', 'Book Category Search Text', THEME_ID ),
        'all_items'         => _x( 'All Book Categories', 'All Book Categories Text', THEME_ID ),
        'parent_item'       => _x( 'Parent Book Category', 'Parent Book Category Text', THEME_ID ),
        'parent_item_colon' => _x( 'Parent Book Category:', 'Parent Book Category Text with a Colon', THEME_ID ),
        'edit_item'         => _x( 'Edit Book Category', 'Edit Book Category Text', THEME_ID ),
        'update_item'       => _x( 'Update Book Category', 'Update Book Category Text', THEME_ID ),
        'add_new_item'      => _x( 'Add New Book Category', 'Add New Book Category Text', THEME_ID ),
        'new_item_name'     => _x( 'New Book Category Name', 'New Book Category Name Text', THEME_ID ),
        'menu_name'         => _x( 'Book Categories', 'Book Category Menu Name', THEME_ID ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array(
            'slug' => 'book-category'
        ),
    );

    register_taxonomy( 'pat-book-categories', array( 'pat-books' ), $args );

}