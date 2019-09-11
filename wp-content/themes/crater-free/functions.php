<?php
/**
 * Crater functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package crater-free
 */

/**
 *  Defining Constants
 */

define('CRATER_FREE_THEME_URL','https://www.spiraclethemes.com/crater-free-wordpress-theme/');
define('CRATER_FREE_THEME_PRO_URL','https://www.spiraclethemes.com/crater-premium-wordpress-theme/');
define('CRATER_FREE_THEME_DOC_URL','https://www.spiraclethemes.com/crater-documentation/');
define('CRATER_FREE_THEME_VIDEOS_URL','https://www.spiraclethemes.com/crater-video-tutorials/');
define('CRATER_FREE_THEME_SUPPORT_URL','https://wordpress.org/support/theme/crater-free/');
define('CRATER_FREE_THEME_RATINGS_URL','https://wordpress.org/support/theme/crater-free/reviews/');
define('CRATER_FREE_THEME_CHANGELOGS_URL','https://themes.trac.wordpress.org/log/crater-free/');
define('CRATER_FREE_THEME_CONTACT_URL','https://www.spiraclethemes.com/contact-us/');
define('CRATER_FREE_THEME_AUTHOR_URL','https://www.spiraclethemes.com/');


// Register Custom Navigation Walker
 require_once(get_template_directory() .'/inc/wp_bootstrap_navwalker.php');

 //Register Required plugin
require_once(get_template_directory() .'/inc/class-tgm-plugin-activation.php');

if ( ! function_exists( 'crater_free_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function crater_free_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary', 'crater-free' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(		
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Crater free theme info
	 */
	require get_template_directory() . '/inc/theme-info.php';

	/*
	* About page instance
	*/
	$config = array();
	CraterFree_About_Page::crater_free_init( $config );
}
endif;
add_action( 'after_setup_theme', 'crater_free_setup' );


/**
* Custom Logo 
*
*/
function crater_free_logo_setup() {
    add_theme_support( 'custom-logo', array(
	   'height'      => 65,
	   'width'       => 190,
	   'flex-height' => true,
	   'flex-width' => true,	   
	) );
}
add_action( 'after_setup_theme', 'crater_free_logo_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function crater_free_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'crater_free_content_width', 640 );
}
add_action( 'after_setup_theme', 'crater_free_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function crater_free_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'crater-free' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here.', 'crater-free' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'crater-free' ),
		'id'            => 'page',
		'description'   => __( 'Add widgets here.', 'crater-free' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	//Footer widget columns
	$widget_num = absint(get_theme_mod( 'cr_footer_widgets', '4' ));
	for ( $i=1; $i <= $widget_num; $i++ ) {
		register_sidebar( array(
			'name'          => __( 'Footer Column', 'crater-free' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<div id="%1$s" class="section %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}
}
add_action( 'widgets_init', 'crater_free_widgets_init' );

/**
* Admin Scripts
*/
if ( ! function_exists( 'crater_free_admin_scripts' ) ) :
function crater_free_admin_scripts($hook) {
  wp_enqueue_style( 'crater-free-info-css', get_template_directory_uri() . '/css/crater-free-theme-info.css', false ); 
}
endif;
add_action( 'admin_enqueue_scripts', 'crater_free_admin_scripts' );


/**
 * Display Dynamic CSS.
 */
function crater_free_dynamic_css_wrap() {

  require_once( get_parent_theme_file_path( '/css/dynamic.css.php' ) );  
?>
  <style type="text/css" id="custom-theme-dynamic-style">
    <?php echo crater_free_dynamic_css_stylesheet(); ?>
  </style>
<?php }
add_action( 'wp_head', 'crater_free_dynamic_css_wrap' );



function crater_free_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '3.3.7');	
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '5.0.13');
	wp_enqueue_style( 'm-customscrollbar-css', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css', array(), '1.0');		
	wp_enqueue_style( 'crater-free-responsive', get_template_directory_uri() . '/css/style-responsive.css', array(), '1.0.0');	   
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', array(), '1.0');   

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array(), '3.3.7', true );
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), '1.3', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), '2.6.2', true );
	wp_enqueue_script( 'resize-sensor', get_template_directory_uri() . '/js/ResizeSensor.js',array(),'1.0.0', true );	
	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.js',array(),'1.7.0', true );	
	wp_enqueue_script( 'crater-free-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );		
	wp_enqueue_script( 'html5shiv',get_template_directory_uri().'/js/html5shiv.js',array(), '3.7.3');
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'respond', get_template_directory_uri().'/js/respond.js' );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

}
add_action( 'wp_enqueue_scripts', 'crater_free_scripts' );


/**
* Registers an editor stylesheet for the block editor.
*/
function crater_free_block_editor_styles() {
    wp_enqueue_style( 'crater-free-block-editor-styles', get_template_directory_uri() . '/css/style-editor.css', array(), '1.0');
}
add_action( 'enqueue_block_editor_assets', 'crater_free_block_editor_styles' );


/**
* Custom search form
*/
function crater_free_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url(home_url( '/' )) . '" >
    <div class="search">
      <input type="text" value="' . get_search_query() . '" class="blog-search" name="s" id="s" placeholder="'. esc_attr__( 'Search here','crater-free' ) .'">
      <label for="searchsubmit" class="search-icon"><i class="fas fa-search"></i></label>
      <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search','crater-free' ) .'" />
    </div>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'crater_free_search_form', 100 );


/** 
* Excerpt More
*/
function crater_free_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}
    return '&hellip;';
}
add_filter('excerpt_more', 'crater_free_excerpt_more');


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function crater_free_pingback_header() {
  if ( is_singular() && pings_open() ) {
    printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
  }
}
add_action( 'wp_head', 'crater_free_pingback_header' );

/**
 * Add sticky header
 */
function crater_free_sticky_header_script() {
 	if(true===get_theme_mod( 'cr_sticky_menu',false)) {
 		wp_enqueue_script( 'crater-free-sticky-script', get_template_directory_uri() . '/js/sticky.js', array('jquery'), '1.0.4', true );		
 	} 
}
add_action( 'wp_enqueue_scripts', 'crater_free_sticky_header_script' );


/**
 * Polylang Custom Strings additions.
 */
if ( function_exists( 'pll_register_string' ) ) :
	/**
	 * Register some string from the customizer to be translated with Polylang
	 */
	function crater_free_pll_register_string() {
		pll_register_string( 'cr_home_heading_text', esc_attr(get_theme_mod( 'cr_home_heading_text' )), 'crater-free', true );
		pll_register_string( 'cr_home_subheading_text', esc_attr(get_theme_mod( 'cr_home_subheading_text' )), 'crater-free', true );
		pll_register_string( 'cr_home_button_text', esc_attr(get_theme_mod( 'cr_home_button_text' )), 'crater-free', true );
		pll_register_string( 'cr_home_button_url', esc_attr(get_theme_mod( 'cr_home_button_url' )), 'crater-free', true );
		pll_register_string( 'cr_home_button2_text', esc_attr(get_theme_mod( 'cr_home_button2_text' )), 'crater-free', true );
		pll_register_string( 'cr_home_button2_url', esc_attr(get_theme_mod( 'cr_home_button2_url' )), 'crater-free', true );
		pll_register_string( 'cr_copyright_text', esc_attr(get_theme_mod( 'cr_copyright_text' )), 'crater-free', true );
	}
	add_action( 'after_setup_theme', 'crater_free_pll_register_string' );
endif;


/**
 *  Set homepage and blog page after demo import
 */
function crater_free_after_import_setup() {    
        
    //Assign menus to their locations
    $main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );
    set_theme_mod( 'nav_menu_locations', array(
          'primary' => $main_menu->term_id,
        )
    );

    //Assign front page
    $front_page = get_page_by_title( 'Home' );  
    $blog_page = get_page_by_title( 'Blog' );  

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page -> ID );    
    update_option( 'page_for_posts', $blog_page -> ID );     
   
}
add_action( 'pt-ocdi/after_import', 'crater_free_after_import_setup' );


/** 
*  plugins Required
*/
add_action( 'tgmpa_register', 'crater_free_register_required_plugins' );

function crater_free_register_required_plugins() {

    $plugins = array(      
      array(
          'name'               => 'Contact Form 7',
          'slug'               => 'contact-form-7',
          'source'             => '',
          'required'           => false,          
          'force_activation'   => false,
      ),
      array(
          'name'               => 'Kirki Tookit',
          'slug'               => 'kirki',
          'source'             => '',
          'required'           => false,          
          'force_activation'   => false,
      ),
      array(
          'name'               => 'Elementor Page Builder',
          'slug'               => 'elementor',
          'source'             => '',
          'required'           => false,          
          'force_activation'   => false,
      ),
      array(
          'name'               => 'One Click Demo Import',
          'slug'               => 'one-click-demo-import',
          'source'             => '',
          'required'           => false,          
          'force_activation'   => false,
      ),     
    );


    $config = array(
            'id'           => 'crater-free',
            'default_path' => '',
            'menu'         => 'tgmpa-install-plugins',
            'has_notices'  => true,
            'dismissable'  => true,
            'dismiss_msg'  => '',
            'is_automatic' => false,
            'message'      => '',
            'strings'      => array()
    );

    tgmpa( $plugins, $config );

}


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Template functions
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Extra classes for this theme.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Widgets.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Upgrade Pro
 */
require_once( trailingslashit( get_template_directory() ) . 'crater-pro/class-customize.php' );