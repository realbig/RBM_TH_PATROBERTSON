<?php
/**
 * Displays the home page
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

locate_template( 'partials/home/books.php', true );

locate_template( 'partials/home/newsletter.php', true );

locate_template( 'partials/home/about.php', true );

locate_template( 'partials/home/blog.php', true );

locate_template( 'partials/home/speaker.php', true );

locate_template( 'partials/home/testimonials.php', true );

get_footer();
?>