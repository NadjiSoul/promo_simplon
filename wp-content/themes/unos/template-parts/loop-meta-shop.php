<?php

// Apply this to only woocommerce pages
if ( !is_woocommerce() )
	return;

/**
 * Template modification Hooks
 */
$display_loop_meta = apply_filters( 'unos_woo_display_loop_meta', true );
do_action( 'unos_woo_loop_meta', 'start' );

if ( !$display_loop_meta )
	return;

/**z
 * If viewing a multi product page 
 */
if ( !is_product() && !is_singular() ) :

	$display_title = apply_filters( 'unos_woo_loop_meta_display_title', true, 'plural' );
	if ( $display_title !== 'hide' ) :

		// Display Featured Image in header if present (static/parallax)
		$wrap_attr = hoot_data( 'loop-meta-wrap' );
		hoot_unset_data( 'loop-meta-wrap' );
		?>

		<div <?php hoot_attr( 'loop-meta-wrap', 'woocommerce', $wrap_attr ); ?>>
			<div class="hgrid">

				<div <?php hoot_attr( 'loop-meta', '', 'hgrid-span-12' ); ?>>

					<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
						<h1 <?php hoot_attr( 'loop-title' ); ?>><?php woocommerce_page_title(); ?></h1>
					<?php endif; ?>
					<div <?php hoot_attr( 'loop-description' ); ?>>
						<?php do_action( 'woocommerce_archive_description' ); ?>
					</div><!-- .loop-description -->

				</div><!-- .loop-meta -->

			</div>
		</div>

	<?php
	endif;

/**
 * If viewing a single product
 */
elseif ( is_product() ) :

	add_filter( 'unos_loop_meta_display_title', 'unos_woo_loop_hide_product_meta' );
	get_template_part( 'template-parts/loop-meta' );

endif;

/**
 * Template modification Hooks
 */
do_action( 'unos_woo_loop_meta', 'end' );