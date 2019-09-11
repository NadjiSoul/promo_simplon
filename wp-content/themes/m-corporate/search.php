<?php
/**
 * The template for displaying search results pages.
 *
 * @package m_corporate
 */

get_header(); ?>
<section class="search-container mt-3">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-page-form" id="ss-search-page-form"><?php get_search_form(); ?></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 mt-4">
			<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<span class="search-page-title"><?php printf( esc_html__( 'Search Results for: %s', 'm-corporate' ), '<strong>' . get_search_query() . '</strong>' ); ?></span>
				</header><!-- .page-header -->
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); 
				$content = substr( get_the_content(), 0, 400 );
				?>
				<div class="result_item mb-3 mt-2">
					<h5 class="search-post-title"><a href="<?php echo esc_url( get_the_permalink() ); ?>"><?php the_title(); ?></a></h5>
					<div class="search-post-excerpt"><?php echo wp_kses_post( strip_tags( $content ) ); ?></div> 
				</div>
				<?php endwhile; ?>
				<div class="clearfix"></div>
				<?php the_posts_pagination(); ?>
			<?php else : ?>
				<h2 class="page-title"><?php echo esc_html__( 'Nothing Found', 'm-corporate' ); ?></h2>
				<p><?php echo esc_html__( "We're Sorry, but no results found for your search. Please try again with some different keywords.", 'm-corporate' ); ?></p>
			<?php endif; ?>
			</div>
		</div>
	</div><!-- .container -->
</section>
<?php get_footer();