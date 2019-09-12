<?php

/**
 * Blog Section widget.
 */


if( ! class_exists('CraterFree_Blog_Section_Widget')) :

class CraterFree_Blog_Section_Widget extends WP_Widget {

	var $defaults;

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'crater_free_blog_widget', // Base ID
			__( 'Crater: Blog Section', 'crater-free' ), // Name
			array( 'description' => __( 'Adds Blog section.', 'crater-free'), ) // Args
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
		
	    $noc = ! empty( $instance['noc'] ) ? $instance['noc'] : '2';	    

	    $options = array(
        	'post_type' => 'post',
        	'posts_per_page' => $noc,
    	);       

	    // set columns based on the input value
    	if ( esc_attr($noc) == '4') {
			$cols = 'col-md-3';		
		} elseif ( esc_attr($noc) == '3') {
			$cols = 'col-md-4';
		} elseif ( esc_attr($noc) == '2') {
			$cols = 'col-md-6';
		} else {
			$cols = 'col-md-12';
		}

    	$query = new WP_Query( $options );
    	// run the loop based on the query
    	if ( $query->have_posts() ) { 
       		?>
       			<section id="blog-page-section" class="blog-widget">
       				<div class="blog-content">
		                <div class="container">		                    
		                    <div class="row">
		                    	<?php
									while ( $query->have_posts() ) {
										$query->the_post();
										$postid = get_the_ID();

										?>
											<div class="<?php echo esc_attr($cols); ?>">
					                            <article>
					                                <div class="blog-wrapper-section" >
					                                    <?php
											                if ( has_post_thumbnail()) {
											                    ?>
											                        <div class="image">
											                            <?php
											                                the_post_thumbnail('full');
											                            ?>
											                        </div>                      
											                    <?php                    
											                }                   
											            ?>
											            <div class="meta-wrapper">
											                <div class="meta">
											                    <?php
											                        if(is_sticky()){
											                            ?>                                        
											                                <span class="meta-item">
											                                    <i class="fa fa-thumb-tack"></i><?php _e('Sticky Post','crater-free') ?>
											                                </span> 
											                            <?php       
											                        }                                
											                    ?>              
											                    <span class="meta-item">
											                        <i class="fa fa-clock-o"></i><?php the_time(get_option('date_format')) ?>
											                    </span>                                            
											                    <span class="meta-item">
											                        <i class="fa fa-user"></i><a class="author-post-url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php the_author() ?></a>
											                    </span>                        
											                    <span class="meta-item">
											                        <i class="fa fa-comment"></i><?php comments_number('0','1','%'); ?> <?php _e('Comments','crater-free'); ?>
											                    </span>
											                </div>  
											            </div>					                                    
					                                    <div class="blog-content">
					                                        <div class="heading">
					                                            <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					                                        </div>
					                                        <div class="blog-excerpt">
					                                            <p><?php the_excerpt(); ?></p>
					                                        </div>
					                                    </div>
					                                    <div class="read-more">
					                                        <a href="<?php the_permalink() ?>"><?php _e('READ MORE ','crater-free'); ?></a>
					                                    </div>
					                                </div>
					                            </article>
					                        </div>
										<?php
									}
								?>
		                    </div>
		                </div>
		            </div>
       			</section>
       		<?php
    	}
    	wp_reset_postdata();
    }
	
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {				
	    $noc = isset( $instance['noc'] ) ? $instance['noc'] : '2';    
	  
	    ?>     	  	    	
		    <p>
		        <label for="<?php echo $this->get_field_id('noc'); ?>"><?php _e('Number of Columns:','crater-free'); ?></label>
		        <input class="widefat" id="<?php echo $this->get_field_id('noc'); ?>" name="<?php echo $this->get_field_name('noc'); ?>" type="text" value="<?php echo $noc; ?>" />
		    </p>

		    <p>
		        <label><?php _e('Maximum number of Columns is 4','crater-free'); ?></label>
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
     	$instance['noc'] = absint( $new_instance['noc'] );       

    	return $instance;
	}
}
endif;

if( ! function_exists('crater_free_register_blog_section_widget')) :
// register widget
function crater_free_register_blog_section_widget() {
    register_widget( 'CraterFree_Blog_Section_Widget' );
}
endif;

add_action( 'widgets_init', 'crater_free_register_blog_section_widget' );