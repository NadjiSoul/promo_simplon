<?php

/**
 * Footer Social widget.
 */


if( ! class_exists('CraterFree_Footer_Social_Widget')) :

class CraterFree_Footer_Social_Widget extends WP_Widget {

	var $defaults;

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'crater_free_footer_social_widget', // Base ID
			__( 'Crater: Footer Social Widget', 'crater-free' ), // Name
			array( 'description' => __( 'Adds Social icons to footer widgets.', 'crater-free'), ) // Args
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
		extract( $args );
		extract( wp_parse_args( $instance, $this->defaults ) ); 

		$social_menu = ! empty( $instance['social_menu'] ) ? wp_get_nav_menu_object( $instance['social_menu'] ) : false;
        if ( !$social_menu )
            return;
        $instance['title'] = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
        if ( !empty($instance['title']) )
            echo $args['before_title'] . esc_attr($instance['title']) . $args['after_title'];
        ?>
        <?php wp_nav_menu(
            array(
                'fallback_cb' => false,
                'menu' => $social_menu,
                'link_before' => '<span class="social-menu-wrap">',
                'link_after' => '</span>',
                'menu_class' => 'footer-menu social-menu-list clearfix'
            )
        );
    }
	
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
	    $title 		= isset( $instance['title'] ) ? $instance['title'] : '';
        $social_menu 	= isset( $instance['social_menu'] ) ? $instance['social_menu'] : ''; 
        $menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );
        if ( !$menus ) {
            echo '<p>'. sprintf( __('No menus yet.', 'crater-free') .'<a href="%s">'. __('Create New Menu','crater-free').'</a>', admin_url('nav-menus.php') ) .'</p>';
            return;
        }
	    ?>     	  	    	
		    <p>
		        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','crater-free'); ?></label>
		        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		    </p>
		    <p>
            <label for="<?php echo $this->get_field_id('social_menu'); ?>"><?php _e('Select your social menu:', 'crater-free'); ?></label>
            <select id="<?php echo $this->get_field_id('social_menu'); ?>" name="<?php echo $this->get_field_name('social_menu'); ?>">
                <option value="0"><?php _e( 'Select', 'crater-free' ) ?></option>
                <?php
                	foreach ( $menus as $menu ) {
                    	echo '<option value="' . $menu->term_id . '"'. selected( $social_menu, $menu->term_id, false ). '>'. esc_html( $menu->name ) . '</option>';
                	}
                ?>
            </select>
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
		$instance = $old_instance;	
		$instance['title'] = sanitize_text_field( $new_instance['title'] );       			
     	$instance['social_menu'] = (int)( $new_instance['social_menu'] );
    	return $instance;
	}

}
endif;

if( ! function_exists('crater_free_register_footer_social_widget')) :
// register widget
function crater_free_register_footer_social_widget() {
    register_widget( 'CraterFree_Footer_Social_Widget' );
}
endif;

add_action( 'widgets_init', 'crater_free_register_footer_social_widget' );
