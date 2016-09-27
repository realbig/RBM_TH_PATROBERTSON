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

<?php locate_template( 'partials/static/footer-logo.php', true ); ?>

</div><!-- .off-canvas-content -->

</div><!-- #wrapper -->

<?php wp_footer(); ?>

</body>

</html>