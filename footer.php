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
    
    <div class="row">
        <div class="small-12 columns text-center">
            <?php echo sprintf( _x( 'Site by %s', 'Site By Footer Text', THEME_ID ), '<a href="//realbigmarketing.com/" target="_blank">Real Big Marketing</a>' ); ?>
            <br />
            <?php echo sprintf( _x( 'Copyright &copy; %s Pat Robertson', 'Copyright Footer Text', THEME_ID ), date( 'Y' ) ); ?>
        </div>
    </div>

</footer>

<?php locate_template( 'partials/static/footer-logo.php', true ); ?>

</div><!-- .off-canvas-content -->

</div><!-- #wrapper -->

<?php wp_footer(); ?>

</body>

</html>