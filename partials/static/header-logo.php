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
        <?php echo apply_filters( 'the_content', get_theme_mod( 'pat_header_text', _x( '<h1>Unlocking the Extraordinary <br />from the Everyday</h1>', 'Default Customizer Header Text', THEME_ID ) ) ); ?>
    </div>

</div>