<?php
/**
 * Hooks and actions shared across all Pages
 *
 * @since   1.0.0
 * @package PatRobertson/includes/hooks
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( is_front_page() ) {
    add_action( 'wp_footer', 'pat_inject_booking_modal' );
}

function pat_inject_booking_modal() {
 
    locate_template( 'partials/home/booking-modal.php', true );
    
}