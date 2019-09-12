<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package m_corporate
 */

get_header();
?>
<div class="centering">
<div class="fullwidth container-fluid" >
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 text-center" style="margin:20px 0;">
				<h1 class="title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'm-corporate' ); ?></h1>		
				<p><?php esc_html_e( "It looks like nothing was found at this location. Maybe try a search?", 'm-corporate' ); ?></p>		
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>				
</div>
</div>
<?php get_footer(); 