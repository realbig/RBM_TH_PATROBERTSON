<?php
/**
 * Header Banner Image
 *
 * @since       1.0.0
 * @package     PatRobertson
 * @subpackage  PatRobertson/partials/static
 */

?>

<div class="header-logo" style="background-image: url( '<?php echo wp_get_attachment_image_url( get_theme_mod( 'pat_header_image', 1 ), 'full' ); ?>' );">

    <div class="header-content">
        <h1><?php echo apply_filters( 'the_content', html_entity_decode( get_bloginfo( 'description' ) ) ); ?></h1>
    </div>

</div>