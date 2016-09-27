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

get_header();

the_post();

locate_template( 'partials/home/about.php', true );

get_footer();
?>