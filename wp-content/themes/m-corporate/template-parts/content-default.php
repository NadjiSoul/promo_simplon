<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package m_corporate
 */
$format = get_post_format() ? : 'standard';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($format); ?>>
	<?php if ( has_post_thumbnail() ): ?>
		<div class="blog-img">
			<img class="img-fluid" alt="<?php echo esc_attr(get_the_title()); ?>" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" >
		</div>
	<?php endif; 
	the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	?>
	<div><?php echo esc_html(get_the_excerpt()); ?></div>
	<div class="meta-desc">
		<div class="post-info text-left">
			<?php echo esc_html__('By', 'm-corporate'); ?> <span><?php the_author(); ?></span> | <?php echo esc_html( the_time( get_option( 'date_format' ) ) ); ?>
		</div>
		<div class="post-readmore text-right">
			<a href="<?php echo esc_url(get_the_permalink()); ?>" class="readmore"><?php echo esc_html__('Read More >', 'm-corporate'); ?></a>
		</div>
	</div>
</article><!-- #post-## -->