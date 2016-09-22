<?php
/**
 * Hooks and actions shared across all "Books" pages.
 *
 * @since   1.0.0
 * @package PatRobertson
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

// Alter all calls to the_permalink() and get_permalink() on the Frontend
add_filter( 'the_permalink', 'pat_books_the_permalink' );
add_filter( 'post_type_link', 'pat_books_get_permalink', 10, 4 );

/**
 * Replace the_permalink() calls on the Frontend with the Amazon URL
 * 
 * @param       string $url The Post URL
 *                    
 * @since       1.0.0
 * @return      string Modified URL
 */
function pat_books_the_permalink( $url ) {
    
    if ( get_post_type() == 'pat-books' ) {
    
        if ( $amazon_link = get_post_meta( get_the_ID(), '_rbm_pat_books_amazon_link', true ) ) {

            $url = $amazon_link;

        }
        
    }
    
    return $url;
    
}

/**
 * Replace get_peramlink() calls on the Frontend with the Amazon URL
 * 
 * @param       string  $url       The Post URL
 * @param       object  $post      WP Post Object
 * @param       boolean $leavename Whether to leave the Post Name
 * @param       boolean $sample    Is it a sample permalink?
 *                                                
 * @since       1.0.0
 * @return      string  Modified URL
 */
function pat_books_get_permalink( $url, $post, $leavename = false, $sample = false ) {
    
    if ( $post->post_type == 'pat-books' ) {
    
        if ( $amazon_link = get_post_meta( get_the_ID(), '_rbm_pat_books_amazon_link', true ) ) {

            $url = $amazon_link;

        }
        
    }
    
    return $url;
    
}