<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package m_corporate
 */

get_header(); 
?>
<div id="primary" class="content-area mt-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();
				the_content();
				// End of the loop.
			endwhile;
			?>
			</div>
		</div>
	</div>
</div><!-- .content-area -->
<?php get_footer();