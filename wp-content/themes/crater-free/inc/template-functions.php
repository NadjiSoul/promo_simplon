<?php
/**
 * @package crater-free
 */

/**
 * Footer
 */

if ( ! function_exists( 'crater_free_footer_copyrights' ) ) :
function crater_free_footer_copyrights() {
	?>
		<div class="row">
            <div class="copyrights">
                <p><?php echo esc_attr(get_theme_mod( 'cr_copyright_text', __('Copyrights Crater.','crater-free')) ); ?><span><?php _e(' | Theme by ','crater-free') ?><a href="https://www.spiraclethemes.com/" target="_blank"><?php _e('Spiracle Themes','crater-free') ?></a></span></p>
            </div>
        </div>
	<?php
}
endif;


if ( ! function_exists( 'crater_free_action_footer_hook' ) ) :
function crater_free_action_footer_hook() {
	add_action( 'crater_free_action_footer', 'crater_free_footer_copyrights' );	
}
endif;
add_action( 'wp', 'crater_free_action_footer_hook' );


/**
* Custom excerpt length.
*/
if ( ! function_exists( 'crater_free_my_excerpt_length' ) ) :
function crater_free_my_excerpt_length($length) {
	if ( is_admin() ) {
		return $length;
	}
  	return absint(get_theme_mod( 'cr_excerpt_length',70));
}
endif;
add_filter('excerpt_length', 'crater_free_my_excerpt_length');


/**
 * Menu Search
 */
if ( ! function_exists( 'crater_free_menu_search' ) ) :
function crater_free_menu_search($items, $args) {
	if( $args->theme_location == 'primary' )
        return $items.'<li class="menu-header-search">
    					<div id="search-toggle" class="menu-search hidden-xs"></div>
						<div id="search-box" class="clearfix hidden-xs">
							<form role="search" method="get" id="searchformmenu" class="searchformmenu" action="' . esc_url(home_url( '/' )) . '">
    							<div class="search">
      								<input type="text" value="" class="blog-search" name="s" id="smenu" placeholder="'. esc_attr__( 'Search here','crater-free' ) .'">
      								<label for="searchsubmit" class="search-icon"><i class="fa fa-search"></i></label>
      								<input type="submit" id="searchsubmitmenu" value="'. esc_attr__( 'Search','crater-free' ) .'">
    							</div>
    						</form>
						</div>
    				</li>';
 
    return $items;
}
endif;

if ( ! function_exists( 'crater_free_filter_menu_search_hook' ) ) :
function crater_free_filter_menu_search_hook() {
	if(true===get_theme_mod('cr_menu_search',true)) {
	 	add_filter('wp_nav_menu_items','crater_free_menu_search', 10, 2); 	
	}
}
endif;
add_action( 'wp', 'crater_free_filter_menu_search_hook' );
