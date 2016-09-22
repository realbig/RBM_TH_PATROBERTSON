<?php
/**
 * Testimonials CPT
 *
 * @since   1.0.0
 * @package PatRobertson
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class RBM_CPT_Pat_Testimonials extends RBM_CPT {

    public $post_type = 'pat-testimonials';
    public $label_singular = null;
    public $label_plural = null;
    public $labels = array();
    public $icon = 'awards';
    public $post_args = array(
        'supports' => array( 'title', 'editor', 'author', 'thumbnail' ),
        'public' => false,
        'publicly_queryable' => false,
        'menu_position' => 20,
        'rewrite' => array(
            'slug' => 'testimonials',
            'with_front' => false,
            'feeds' => false,
            'pages' => true
        ),
    );

    function __construct() {

        // This allows us to Localize the Labels
        $this->label_singular = _x( 'Testimonial', 'Testimonials Label Singular', THEME_ID );
        $this->label_plural = _x( 'Testimonials', 'Testimonials Label Plural', THEME_ID );

        $this->labels = array(
            'menu_name' => _x( 'Testimonials', 'Testimonials Menu Name', THEME_ID ),
            'all_items' => _x( 'All Testimonials', 'Testimonials All Items', THEME_ID ),
        );

        parent::__construct();

    }

}

$pat_testimonials = new RBM_CPT_Pat_Testimonials();