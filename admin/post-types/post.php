<?php
/**
 * Modifying the Post CPT
 *
 * @since   1.0.0
 * @package PatRobertson
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

add_filter( 'post_type_labels_post', 'pat_modify_post_labels' );
add_filter( 'register_post_type_args', 'pat_modify_post_args', 10, 2 );
    
/**
 * Relabel the Posts Post Type
 * 
 * @param  object $labels Post Type Labels casted to an Object for some reason
 * @return object Post Type Labels
 *                     
 * @since 1.0.0
 */
function pat_modify_post_labels( $labels ) {
    
    $labels->name = _x( 'Blog', 'Posts Name', THEME_ID );
    $labels->all_items = _x( 'All Blog Posts', 'Posts All Items', THEME_ID );
    $labels->singular_name = _x( 'Blog Post', 'Posts Singular Name', THEME_ID );
    $labels->add_new = _x( 'Add Blog Post', 'Posts Add New', THEME_ID );
    $labels->add_new_item = _x( 'Add Blog Post', 'Posts Add New Item', THEME_ID );
    $labels->edit_item = _x( 'Edit Blog Post', 'Posts Edit Item', THEME_ID );
    $labels->new_item = _x( 'Blog Blog Post', 'Posts New Item', THEME_ID );
    $labels->view_item = _x( 'View Blog Post', 'Posts View Item', THEME_ID );
    $labels->search_items = _x( 'Search Blog Posts', 'Posts Search Items', THEME_ID );
    $labels->not_found = _x( 'No Blog Posts found', 'Posts Not Found', THEME_ID );
    $labels->not_found_in_trash = _x( 'No Blog Posts found in trash', 'Posts Not Found in Trash', THEME_ID );
    $labels->parent_item_colon = _x( 'Parent Blog Post:', 'Posts Parent Item Colon', THEME_ID );
    $labels->menu_name = _x( 'Blog', 'Posts Menu Name', THEME_ID );
    $labels->name_admin_bar = _x( 'Blog Post', 'Posts Admin Bar Name', THEME_ID );
    $labels->archives = _x( 'Blog Archives', 'Posts Archives', THEME_ID );
    
    return $labels;
    
}

/**
 * Switch Menu Icon for Posts Post Type
 * 
 * @param  array $args Post Type Args
 * @param  string $post_type Post Type Key
 * @return array Post Type Args
 *                    
 * @since 1.0.0
 */
function pat_modify_post_args( $args, $post_type ) {
    
    if ( $post_type == 'post' ) {
        
        $args['menu_icon'] = 'dashicons-edit';
        
    }
    
    return $args;
    
}