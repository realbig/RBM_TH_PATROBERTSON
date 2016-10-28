<?php
/**
 * Book Me as a Speaker Blurb on the Home Page
 *
 * @since       1.0.0
 * @package     PatRobertson
 * @subpackage  PatRobertson/partials/home
 */

defined( 'ABSPATH' ) || die();

?>

<div class="pat-speaker row expanded">
    
    <div class="small-12 medium-5 medium-push-2 large-7 large-push-2 columns text-container">

        <h1><?php echo get_post_meta( get_the_ID(), '_rbm_pat_home_speaker_title', true ); ?></h1>

    </div>

    <div class="small-12 medium-2 medium-pull-5 large-2 large-pull-7 columns megaphone-container">

        <span class="fa fa-4x fa-bullhorn"></span>

    </div>

    <div class="small-12 medium-4 medium-pull-5 large-3 large-pull-7 columns button-container">

        <a class="secondary large hollow button" data-open="booking-modal">
            <?php echo get_post_meta( get_the_ID(), '_rbm_pat_home_speaker_button_text', true ); ?>
        </a>

    </div>
    
    <div class="small-12 medium-5 large-3 columns image-container">

        <?php echo wp_get_attachment_image( get_post_meta( get_the_ID(), '_rbm_pat_home_speaker_image', true ), 'medium' ); ?>

    </div>

</div>