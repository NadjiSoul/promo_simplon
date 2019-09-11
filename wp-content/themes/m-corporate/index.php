<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package m_corporate
 */

get_header(); 
?>
<div class="container">
	<div class="row">
		<div class="col-sm-8 main-blog">
		<?php 
		if ( have_posts() ) { 
		
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'default' );
				wp_link_pages( 
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'm-corporate' ),
						'after'  => '</div>',
					) 
				);
			endwhile;
		} 
		the_posts_pagination();
		?>
		</div><!-- /.blog-main -->
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer();