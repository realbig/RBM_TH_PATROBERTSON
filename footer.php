<?php
/**
 * The theme's footer file that appears on EVERY page.
 * 
 * @since 1.0.0
 * @package PatRobertson
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}
?>

</section><!-- #site-content -->

<footer id="site-footer">
    
    <div class="row">
    
        <?php 

        $footer_sidebars = array(
            'footer-left',
            'footer-center',
            'footer-right',
        ); 

        foreach ( $footer_sidebars as $sidebar ) : ?>

            <div class="small-12 medium-4 columns">

                <?php dynamic_sidebar( $sidebar ); ?>

            </div>

        <?php endforeach; ?>
        
    </div>

</footer>

<div class="footer-logo" style="background-image: url( '<?php echo wp_get_attachment_image_url( get_theme_mod( 'pat_footer_image', 1 ), 'full' ); ?>' );">
                        
    <div class="footer-content">
        <?php echo apply_filters( 'the_content', get_theme_mod( 'pat_footer_text', _x( '<h1>When life knocks you down <br />get up and dance!</h1>', 'Default Customizer Footer Text', THEME_ID ) ) ); ?>
    </div>

</div>

</div><!-- .off-canvas-content -->

</div><!-- #wrapper -->

<?php wp_footer(); ?>

</body>

</html>