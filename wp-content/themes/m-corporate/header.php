<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div class="site-content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package m_corporate
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
 <meta charset="<?php bloginfo( 'charset' ); ?>">   
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?> 
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'm-corporate' ); ?></a>
<header class="main-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light"> 
					<div class="site-branding">
					<?php 
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) :
							?>
							<p class="site-description">
							<?php 
								echo esc_html( $description ); 
							?>
							</p>
							<?php
						endif;
						?>
					</div>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topnavbar" aria-controls="topnavbar" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'm-corporate' ); ?>">
					<span class="navbar-toggler-icon"></span>
					</button>
					<?php 
					wp_nav_menu( 
						array(
							'theme_location'  => 'top',
							'depth' => 3, // 1 = no dropdowns, 2 = with dropdowns.
							'container'       => 'div',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'topnavbar',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => 'Mcorporate_Menu_Maker_Walker::fallback',
							'walker'          => new Mcorporate_Menu_Maker_Walker(),
						) 
					);
					?>
				</nav>
			</div>
		</div>
	</div>
</header>
<?php 
if ( is_front_page() && get_theme_mod( 'show_hero_section' ) ) : 
?>
<section class="intro">
	<div class="container text-center">
		<?php if ( get_theme_mod('hero_logo') ) { ?>
		<div><img src="<?php echo esc_url( get_theme_mod('hero_logo') ); ?>" alt="<?php esc_attr_e( 'Logo', 'm-corporate' ); ?>" class="intro-logo"></div>
		<?php }
		if( get_theme_mod( 'subheading_text' ) ){
			$subheading = get_theme_mod( 'subheading_text' ); 
			?>
			<h3 class="h4 d-inline-block text-uppercase mt-4 pb-1">
			<?php
				echo esc_html( $subheading ); 
			?>
			</h3>
		<?php }
		if( get_theme_mod( 'heading_text' ) ){
			$heading = get_theme_mod( 'heading_text' );
			?>
			<div class="my-4"><h1 class="display-4 text-uppercase font-weight-bold">
			<?php
				echo esc_html( $heading ); 
			?>
			</h1></div>
		<?php } 
		if( get_theme_mod( 'readmore_link' ) ){	// Read More link 
		?>
			<div class="links">
				<a class="continuelink btn btn-lg text-capitalize" href="<?php echo esc_url( get_theme_mod( 'readmore_link' ), 'm-corporate' ); ?>"><?php esc_html_e( 'Read More', 'm-corporate' ); ?></a>
			</div>
		<?php }
		if(get_theme_mod( 'show_scroll' )): ?>
		<!-- Scroll Down--> 
		<a href="#content" class="scrolldown v-tx-color font-weight-bold fadeInUp animated" data-v-animation="fadeInUp" data-v-animation-delay="1.8s" style="visibility: visible; animation-delay: 1.8s;"><span></span><?php esc_html_e( 'Scroll', 'm-corporate' ); ?></a>
		<!-- End Scroll Down -->
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>
<div class="site-content" id="content">