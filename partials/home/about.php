<?php
/**
 * About Blurb on the Home Page
 *
 * @since       1.0.0
 * @package     PatRobertson
 * @subpackage  PatRobertson/partials/home
 */

defined( 'ABSPATH' ) || die();

?>

<div class="pat-about row expanded" data-equalizer data-equalize-on="medium">

    <div class="small-12 medium-6 medium-push-6 columns image-container" data-equalizer-watch>

        <?php echo wp_get_attachment_image( get_post_meta( get_the_ID(), '_rbm_pat_home_about_image', true ), 'full' ); ?>

    </div>

    <div class="small-12 medium-6 medium-pull-6 columns text-container" data-equalizer-watch>

        <h1><?php echo get_post_meta( get_the_ID(), '_rbm_pat_home_about_title', true ); ?></h1>

        <?php echo apply_filters( 'the_content', get_post_meta( get_the_ID(), '_rbm_pat_home_about_text', true ) ); ?>

    </div>

</div>