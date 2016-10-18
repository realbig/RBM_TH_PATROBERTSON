<?php
/**
 * Books CPT
 *
 * @since   1.0.0
 * @package PatRobertson
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class RBM_CPT_Pat_Books extends RBM_CPT {

    public $post_type = 'pat-books';
    public $label_singular = null;
    public $label_plural = null;
    public $labels = array();
    public $icon = 'book';
    public $post_args = array(
        'supports' => array( 'title', 'editor', 'author', 'thumbnail' ),
        'menu_position' => 20,
        'has_archive' => true,
        'rewrite' => array(
            'slug' => 'books',
            'with_front' => false,
            'feeds' => false,
            'pages' => true
        ),
    );

    function __construct() {

        // This allows us to Localize the Labels
        $this->label_singular = _x( 'Book', 'Books Label Singular', THEME_ID );
        $this->label_plural = _x( 'Books', 'Books Label Plural', THEME_ID );

        $this->labels = array(
            'menu_name' => _x( 'Books', 'Books Menu Name', THEME_ID ),
            'all_items' => _x( 'All Books', 'Books All Items', THEME_ID ),
        );

        parent::__construct();

    }

}

$pat_books = new RBM_CPT_Pat_Books();



/**
 * Force 404 on Single Templates that should be redirecting to Amazon
 * This cannot go in the Hooks File as it loads within the Template itself, by then it is too late
 * 
 * @param       string $template Path to Template File
 *                                                
 * @since       1.0.0
 * @return      string Modified Template File Path
 */
function pat_books_force_404( $template ) {
    
    global $wp_query;
    global $post;
    
    if ( is_single() && get_post_type() == 'pat-books' ) {
        
        if ( $amazon_link = get_post_meta( $post->ID, '_rbm_pat_books_amazon_link', true ) ) {
            
            $wp_query->set_404();
            
            return get_query_template( '404' );
            
        }
        
    }
    
    return $template;
    
}
add_filter( 'template_include', 'pat_books_force_404' );