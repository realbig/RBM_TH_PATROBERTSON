<?php
/**
 * Adds a Widget Area to throw in a MailChimp Widget Form
 *
 * @since       1.0.0
 * @package     PatRobertson
 * @subpackage  PatRobertson/partials/home
 */

defined( 'ABSPATH' ) || die();

?>

<?php if ( is_active_sidebar( 'sidebar-newsletter' ) ) : ?>

    <div class="pat-newsletter">
        
        <div class="row">
        
            <div class="small-12 medium-10 medium-offset-1 columns">

                <?php dynamic_sidebar( 'sidebar-newsletter' ); ?>

            </div>
            
        </div>

    </div>

<?php endif; ?>