<?php
/**
 * About Blurb on the Home Page
 *
 * @since       1.0.0
 * @package     PatRobertson
 * @subpackage  PatRobertson/partials/home
 */

?>

<div class="pat-about row expanded" data-equalizer>

    <div class="small-12 medium-3 medium-push-9 columns image-container" data-equalizer-watch>

        <?php echo wp_get_attachment_image( get_post_meta( get_the_ID(), '_rbm_pat_home_about_image', true ), 'full' ); ?>

    </div>

    <div class="small-12 medium-9 medium-pull-3 columns text-container" data-equalizer-watch>

        <h1><?php echo get_post_meta( get_the_ID(), '_rbm_pat_home_about_title', true ); ?></h1>

        <?php echo apply_filters( 'the_content', get_post_meta( get_the_ID(), '_rbm_pat_home_about_text', true ) ); ?>

    </div>

</div>