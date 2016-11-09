<?php
/**
 * The theme's admin file for providing additional admin-related functionality.
 *
 * @since   1.0.0
 * @package PatRobertson
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

// Run if RBM CPTs is active
if ( class_exists( 'RBM_CPTS' ) ) {

    require_once __DIR__ . '/post-types/pat-books.php';
    require_once __DIR__ . '/post-types/pat-testimonials.php';
    
    require_once __DIR__ . '/taxonomies/pat-book-categories.php';
    
}
else {
    
    add_action( 'admin_notices', 'pat_rbm_cpts_inactive' );
    
}

// Run if RBM Field Helpers is active
if ( class_exists( 'RBM_FieldHelpers' ) ) {

    require_once __DIR__ . '/extra-meta/home.php';
    require_once __DIR__ . '/extra-meta/pat-books.php';
    
}
else {
    
    add_action( 'admin_notices', 'pat_rbm_fh_inactive' );
    
}

require_once __DIR__ . '/post-types/post.php';

require_once __DIR__ . '/tinymce/localization.php';
require_once __DIR__ . '/tinymce/pat-button-shortcode.php';

function pat_rbm_cpts_inactive() { ?>
    
    <div class="error">
        <?php echo apply_filters( 'the_content', sprintf( 
            _x( 'This theme requires %s to be installed!', 'Missing Theme Dependency Error', THEME_ID ),
            '<a href="//github.com/realbig/rbm-cpts" target="_blank"><strong>RBM Custom Post Types</strong></a>'
        ) ); ?>
    </div>
    
<?php
}

function pat_rbm_fh_inactive() { ?>
    
    <div class="error">
        <?php echo apply_filters( 'the_content', sprintf( 
            _x( 'This theme requires %s to be installed!', 'Missing Theme Dependency Error', THEME_ID ),
            '<a href="//github.com/realbig/rbm-field-helpers" target="_blank"><strong>RBM Field Helpers</strong></a>'
        ) ); ?>
    </div>
    
<?php
}