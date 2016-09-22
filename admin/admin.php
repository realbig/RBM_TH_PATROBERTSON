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

// Require files
require_once __DIR__ . '/extra-meta/home.php';

require_once __DIR__ . '/post-types/pat-books.php';
require_once __DIR__ . '/post-types/pat-testimonials.php';
require_once __DIR__ . '/post-types/post.php';