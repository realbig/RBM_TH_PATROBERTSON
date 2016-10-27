<?php
/**
 * Footer Banner Image
 *
 * @since       1.0.0
 * @package     PatRobertson
 * @subpackage  PatRobertson/partials/static
 */

?>

<div class="footer-logo" style="background-image: url( '<?php echo wp_get_attachment_image_url( get_theme_mod( 'pat_footer_image', 1 ), 'full' ); ?>' );">
                        
    <div class="footer-content">
        <h1><?php echo apply_filters( 'the_content', get_theme_mod( 'pat_footer_text', _x( '<h1>When life knocks you down <br />get up and dance!</h1>', 'Default Customizer Footer Text', THEME_ID ) ) ); ?></h1>
    </div>

</div>