<?php
/**
 * The theme's 404 page for showing not found pages.
 *
 * @since 1.0.0
 * @package PatRobertson
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

get_header();

the_post();
?>

<div class="row">

    <article id="page-404" class="columns small-12">

        <h1 class="page-title">
            <?php echo _x( '404 - Not Found', '404 Page Title', THEME_ID ); ?>
        </h1>

        <p>
            <?php echo _x( "Sorry, but there's nothing here.", '404 Error Message', THEME_ID ); ?>
        </p>

    </article>
    
</div>

<?php
get_footer();