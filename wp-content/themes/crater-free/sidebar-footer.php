<?php
/**
 *
 * @package crater-free
 */

//Return if the first widget area has no widgets
if ( !is_active_sidebar( 'footer-1' ) ) {
	return;
} ?>

<?php //user selected widget columns

	$crater_widget_num = esc_attr(get_theme_mod('cr_footer_widgets', '4'));

	if ($crater_widget_num == '4') {
		$crater_cols = 'col-md-3';		
	} elseif ($crater_widget_num == '3') {
		$crater_cols = 'col-md-4';
	} elseif ($crater_widget_num == '2') {
		$crater_cols = 'col-md-6';
	} else {
		$crater_cols = 'col-md-12';
	}
?>
		
<?php 
	if ( is_active_sidebar( 'footer-1' ) ){
		?>
			<div class="widget-column <?php echo esc_attr($crater_cols); ?>">
				<?php dynamic_sidebar( 'footer-1'); ?>
			</div>
		<?php
	}
	if ( is_active_sidebar( 'footer-2' ) ){
		?>
			<div class="widget-column <?php echo esc_attr($crater_cols); ?>">
				<?php dynamic_sidebar( 'footer-2'); ?>
			</div>
		<?php
	}
	if ( is_active_sidebar( 'footer-3' ) ){
		?>
			<div class="widget-column <?php echo esc_attr($crater_cols); ?>">
				<?php dynamic_sidebar( 'footer-3'); ?>
			</div>
		<?php
	}
	if ( is_active_sidebar( 'footer-4' ) ){
		?>
			<div class="widget-column <?php echo esc_attr($crater_cols); ?>">
				<?php dynamic_sidebar( 'footer-4'); ?>
			</div>
		<?php
	}
?>