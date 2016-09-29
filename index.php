<?php
/**
 * Displays archive of posts.
 *
 * @since   1.0.0
 * @package PatRobertson
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

get_header();

get_template_part( 'partials/loop/loop', get_post_type() );

get_footer();