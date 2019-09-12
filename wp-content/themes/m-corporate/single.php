<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package m_corporate
 */

get_header(); 
?>
<section id="single-post">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12">
				<?php
				if ( have_posts() ) :
					// Start the Loop.
					while ( have_posts() ) : the_post(); ?>
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<?php if ( has_post_thumbnail() ){ ?>
							<p class='text-center'>
								<img class="img-fluid" alt="<?php echo esc_attr( get_the_title() ); ?>" src="<?php echo esc_url( get_the_post_thumbnail_url() ); ?>" >
							</p>
						<?php } 
						the_content(); 
					endwhile;
				endif;
				?>
			<?php
			the_tags();
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer();