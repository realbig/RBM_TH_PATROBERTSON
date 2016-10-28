<?php
/**
 * The theme's page file use for displaying pages.
 * 
 * @since   1.0.0
 * @package PatRobertson
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

// Load any post-type specific hooks, if they exist
locate_template( '/includes/hooks/' . get_post_type() . '-hooks.php', true, true );

get_header();

the_post();
?>

<div class="row expanded">

    <article id="page-<?php the_ID(); ?>" <?php post_class( array( 
        'columns',
        'small-12',
        is_active_sidebar( 'sidebar-main' ) ? 'medium-9': 'no-sidebar',
    ) ); ?>>

        <h1 class="page-title">
            <?php the_title(); ?>
        </h1>

        <?php the_content(); ?>

    </article>
    
    <?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
    
        <div class="small-12 medium-3 columns">
            
            <?php dynamic_sidebar( 'sidebar-main' ); ?>
            
        </div>
    
    <?php endif; ?>
    
</div>

<?php
get_footer();