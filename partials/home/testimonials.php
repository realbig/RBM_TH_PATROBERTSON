<?php
/**
 * Testimonials on the Home Page
 *
 * @since       1.0.0
 * @package     PatRobertson
 * @subpackage  PatRobertson/partials/home
 */

defined( 'ABSPATH' ) || die();

$testimonials = new WP_Query( array(
    'post_type' => 'pat-testimonials',
    'posts_per_page' => 4,
) );

$testimonials_count = count( $testimonials->posts );

if ( $testimonials_count == 1 ) {
    $medium_class = 'medium-12';
}
else if ( $testimonials_count == 3 ) {
    $medium_class = 'medium-4';
}
else {
    $medium_class = 'medium-6';
}

if ( $testimonials->have_posts() ) : ?>

    <div class="pat-testimonials row expanded">

    <?php while ( $testimonials->have_posts() ) :
        $testimonials->the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( array(
            'columns',
            'small-12',
            $medium_class,
        ) ); ?>>

            <div class="media-object stack-for-small">
                <div class="media-object-section">
                    <div class="thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </div>
                </div>
                <div class="media-object-section main-section">
                    <h4 class="post-title">
                            <?php the_title(); ?>
                    </h4>
                    <?php the_content(); ?>
                </div>
            </div>

        </article>
    <?php endwhile; ?>
        
    </div>

<?php else: ?>

    <div class="pat-testimonials row">

        <div class="columns small-12">
            <?php echo _x( 'No Testimonials Currently Added.', 'No Testimonials Found Text', THEME_ID ); ?>
        </div>
        
    </div>

<?php endif;

wp_reset_postdata();