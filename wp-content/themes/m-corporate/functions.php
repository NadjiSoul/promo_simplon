<?php
/**
 * Enqueue styles.
 */
function mcorporate_enqueue_styles() {
	// bootstrap css.
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', '', '4.3.1' );
	// font awesome css.
	wp_register_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', '', '4.7.0' );
	// google fonts.
	wp_register_style( 'mcorporate-lato-font', 'https://fonts.googleapis.com/css?family=Lato' );
	wp_register_style( 'montserrat-font', 'https://fonts.googleapis.com/css?family=Montserrat:400,600i,700' );
	$dependencies = array( 'bootstrap', 'font-awesome', 'mcorporate-lato-font', 'montserrat-font' );
	wp_enqueue_style( 'style', get_stylesheet_uri(), $dependencies ); 
}
/**
 * Enqueue scripts.
 */
function mcorporate_enqueue_scripts() {
	$dependencies = array( 'jquery' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', $dependencies, '4.3.1', true );
	wp_enqueue_script( 'scroll-script', get_template_directory_uri() . '/js/scroll-down.js', 'scroll-down', '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
// add bootstrap framework.
add_action( 'wp_enqueue_scripts', 'mcorporate_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'mcorporate_enqueue_scripts' );

/*
*	set content width
*/
function mcorporate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mcorporate_content_width', 1140 );
}
add_action( 'after_setup_theme', 'mcorporate_content_width', 0 );

/**
 * Implement the Custom Header feature.
 *
 * @since M Corporate 2.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Setup MCorporate theme.
 */
function mcorporate_wp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'm-corporate', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	/* Let WordPress manage the document title. */
	add_theme_support( 'title-tag' );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( 
		array(
			'top'    => esc_html__( 'Top Menu', 'm-corporate' ),
			'footer' => esc_html__( 'Footer Menu', 'm-corporate' ),
		) 
	);
	
	/*
	 * Enable support for custom logo.
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 64,
		'width'       => 64,
		'flex-height' => true,
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
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css' ) );
}
//setup the theme
add_action( 'after_setup_theme', 'mcorporate_wp_setup' );

/*
*	Widget
*/
function mcorporate_widgets_init() {
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'm-corporate' ),
			'id'            => 'blog-sidebar',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'm-corporate' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) 
	);
}
add_action( 'widgets_init', 'mcorporate_widgets_init' );

// custom menu
class Mcorporate_Menu_Maker_Walker extends Walker {

	var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul>\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';        
		$classes = empty( $item->classes ) ? array() : ( array ) $item->classes;

		/* Add active class */
		if( in_array( 'current-menu-item', $classes ) ) {
			$classes[] = 'active';
			unset($classes['current-menu-item']);
		}

		/* Check for children */
		$children = get_posts( array( 'post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID ) );
		if ( !empty( $children ) ) {
			$classes[] = 'has-sub';
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) . '"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) . '"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) . '"' : '';

		$item_output = $args->before; 
		$item_output .= '<a'. $attributes .'><span>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</span></a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "</li>\n";
	}
	public static function fallback( $args ) {
		if ( current_user_can( 'edit_theme_options' ) ) {
			/* Get Arguments. */
			$container       = $args['container'];
			$container_id    = $args['container_id'];
			$container_class = $args['container_class'];
			$menu_class      = $args['menu_class'];
			$menu_id         = $args['menu_id'];
			// initialize var to store fallback html.
			$fallback_output = '';
			if ( $container ) {
				$fallback_output .= '<' . esc_attr( $container );
				if ( $container_id ) {
					$fallback_output .= ' id="' . esc_attr( $container_id ) . '"';
				}
				if ( $container_class ) {
					$fallback_output .= ' class="' . esc_attr( $container_class ) . '"';
				}
				$fallback_output .= '>';
			}
			$fallback_output .= '<ul';
			if ( $menu_id ) {
				$fallback_output .= ' id="' . esc_attr( $menu_id ) . '"'; }
			if ( $menu_class ) {
				$fallback_output .= ' class="' . esc_attr( $menu_class ) . '"'; }
			$fallback_output .= '>';
			$fallback_output .= '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" title="' . esc_attr__( 'Add a menu', 'm-corporate' ) . '">' . esc_html__( 'Add a menu', 'm-corporate' ) . '</a></li>';
			$fallback_output .= '</ul>';
			if ( $container ) {
				$fallback_output .= '</' . esc_attr( $container ) . '>';
			}
			// if $args has 'echo' key and it's true echo, otherwise return.
			if ( array_key_exists( 'echo', $args ) && $args['echo'] ) {
				echo $fallback_output; // WPCS: XSS OK.
			} else {
				return $fallback_output;
			}
		}
	}
}
/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function mcorporate_skip_link_focus() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'mcorporate_skip_link_focus' );