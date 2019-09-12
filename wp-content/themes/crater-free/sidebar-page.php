<?php
/**
 *
 * @package crater-free
 */


if ( ! is_active_sidebar( 'page' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'page' ); ?>
</aside><!-- #secondary -->

