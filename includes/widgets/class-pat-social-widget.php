<?php
/**
 * Adds the [pat_button] shortcode
 *
 * @since   1.0.0
 * @package PatRobertson
 * @subpackage  PatRobertson/includes/widgets
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class Pat_Social_Widget extends WP_Widget {

    /**
	 * Register widget with WordPress.
	 */
    function __construct() {
        parent::__construct(
            'pat_social_widget', // Base ID
            _x( 'Pat Social Icons', 'Social Widget Name', THEME_ID ), // Name
            array( 
                'classname' => 'pat-social-widget',
                'description' => _x( 'A Widget that shows Social Icons', 'Social Widget Description', THEME_ID ),
            ) // Args
        );
    }

    /**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
    public function widget( $args, $instance ) {

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Archives' ) : $instance['title'], $instance, $this->id_base );
        
		echo $args['before_widget'];
        
		if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        if ( ! empty( $instance['facebook'] ) ) : ?>

            <p>
                <a href="<?php echo $instance['facebook']; ?>" target="_blank">
                    <span class="fa-stack fa-2x">
                        <span class="fa fa-facebook-square fa-stack-2x"></span>
                    </span>
                </a>
            </p>

        <?php endif;
        
        if ( ! empty( $instance['email'] ) ) : ?>

            <p>
                <a href="mailto:<?php echo $instance['email']; ?>">
                    
                    <span class="fa-stack fa-2x">
                        <span class="fa fa-square fa-stack-2x"></span>
                        <span class="fa fa-envelope fa-inverse fa-stack-1x"></span>
                    </span>
                    
                </a>
            </p>

        <?php endif;
        
        echo $args['after_widget'];
        
    }

    /**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
    public function form( $instance ) {
        
        $facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] : '';
        $email = ! empty( $instance['email'] ) ? $instance['email'] : '';
        
        ?>

        <p>
            <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php echo _x( 'Facebook URL:', 'Facebook Widget Label', THEME_ID ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php echo _x( 'E-mail Address:', 'E-mail Widget Label', THEME_ID ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
        </p>

    <?php 
    }

    /**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
    public function update( $new_instance, $old_instance ) {
        
        $instance = array();
        $instance['facebook'] = ( ! empty( $new_instance['facebook'] ) ) ? strip_tags( $new_instance['facebook'] ) : '';
        $instance['email'] = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';

        return $instance;
        
    }

}