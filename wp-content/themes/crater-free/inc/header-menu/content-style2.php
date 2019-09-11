<?php
/**
 * Template part for displaying header menu
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package crater-free
 */

?>

<?php
	$page_val = is_front_page() ? 'home' : 'page' ;
?>
<header id="<?php echo esc_attr($page_val); ?>-inner" class="elementor-menu-anchor crater-menu-wrapper full-width-menu style2 page">
	<div class="header-wrapper">
		<div class="container">
			<div class="clearfix">      
    			<div class="logo">
           			<?php 
           				if( is_front_page()) {
           					if (has_custom_logo()){
		                		crater_free_the_custom_logo();
		                	}
           				}
           				else{
           					$inner_page_logo=esc_url(get_theme_mod( 'cr_inner_page_logo' ));
           					if(!empty($inner_page_logo)) {
           						?>
			                		<a id="logo-inner-page" class="logo-inner-page" href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url( get_theme_mod( 'cr_inner_page_logo' ) ); ?>" alt="logo"></a>
			                	<?php
           					}
           					else{
           						if (has_custom_logo()){
			                		crater_free_the_custom_logo();
			                	}
           					}
           				}	                		                	
	                ?>
	                <?php 
	                    $alt_logo=esc_url(get_theme_mod( 'cr_sticky_logo' ));
	                	if(!empty($alt_logo)) {
		                	?>
		                		<a id="logo-alt" class="logo-alt" href="<?php echo esc_url(home_url()); ?>"><img src="<?php echo esc_url( get_theme_mod( 'cr_sticky_logo' ) ); ?>" alt="logo"></a>
		                	<?php
		                }		                
		            ?>
	                <h1 class="site-title">
				        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr(bloginfo( 'name' )); ?></a>
				    </h1>
				    <?php
				        $description = esc_attr(get_bloginfo( 'description', 'display' ));
				        if ( $description || is_customize_preview() ) { 
				            ?>
				                <p class="site-description"><?php echo $description; ?></p>
				            <?php 
				        }
				    ?>
				</div>
				<nav class="crater-main-menu navbar page" id="crater-main-menu-wrapper">
					<div class="navbar-header">
				     	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
					       	<span class="sr-only"><?php _e( 'Toggle navigation', 'crater-free' ); ?></span>
					      	<span class="icon-bar"></span>
					       	<span class="icon-bar"></span>
					       	<span class="icon-bar"></span>
				     	</button>
				   	</div>
				   	
					<div class="collapse navbar-collapse page" id="navbar-collapse-1">
				   		<?php
			                wp_nav_menu( array(			                  	
			                  	'theme_location'    => 'primary',
			                  	'depth'             => 3,
			                  	'container'         => 'ul',
			                  	'container_class'   => '',
			                  	'container_id'      => 'menu-primary',
			                  	'menu_class'        => 'nav primary',
			                  	'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
			                  	'walker'            => new wp_bootstrap_navwalker())
			                );
		             	?>					
				   	</div>
				</nav>
			</div>
        </div>
    </div>
</header>
<div id="home" class="elementor-menu-anchor"></div>
