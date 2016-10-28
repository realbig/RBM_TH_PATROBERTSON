<?php
/**
 * Holds Booking Form Modal
 *
 * @since       1.0.0
 * @package     PatRobertson
 * @subpackage  PatRobertson/partials/home
 */

defined( 'ABSPATH' ) || die();

?>

<div class="reveal large" id="booking-modal" data-reveal>
    
    <h1><?php echo get_post_meta( get_the_ID(), '_rbm_pat_home_speaker_title', true ); ?></h1>
    
    <?php $contact_form = get_post_meta( get_the_ID(), '_rbm_pat_home_speaker_contact_form', true ); ?>
    
    <?php if ( $contact_form ) : 
    
        echo do_shortcode( '[contact-form-7 id="' . $contact_form . '"]' );
    
    else : 
    
        echo _x( 'No Contact Form set for Booking. Edit this Page to set one', 'No Booking Form Error', THEME_ID );
    
    endif; ?>
    
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    
</div>