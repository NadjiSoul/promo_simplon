<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package m_corporate
 */

?> 
<div class="col-sm-4 blog-sidebar">
	<?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'blog-sidebar' ); ?>
	<?php else : ?>
		<div class="recent-posts">
			<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
		</div>
		<div class="recent-comments">
			<?php the_widget( 'WP_Widget_Recent_Comments' ); ?> 
		</div>
		<div class="archives">
			<?php the_widget( 'WP_Widget_Archives' ); ?>
		</div>
		
	<?php endif; ?>
</div><!-- /.blog-sidebar -->