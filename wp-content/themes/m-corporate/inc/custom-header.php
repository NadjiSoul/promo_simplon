<?php
/**
 * Custom Header functionality for MCorporate
 *
 * Set up the WordPress core custom header feature.
 *
 */

function mcorporate_customizer_settings($wp_customize) {
	// hero section options for homepage
	$wp_customize->add_section('homepage_hero_section', array(
	  'title'   => esc_html__( 'Homepage Hero Section', 'm-corporate' )
	 ));
	
	// sanitization checkbox callback function
	function mcorporate_sanitize_checkbox( $input ){
		//returns true if checkbox is checked
		return ( ( isset( $input ) && true == $input ) ? true : false );
	}
	
	$wp_customize->add_setting('show_hero_section', array(
		'default'	=> false,
		'sanitize_callback' => 'mcorporate_sanitize_checkbox',
	)); 
	
	$wp_customize->add_control('show_hero_section', array(
		'label'   => esc_html__( 'Show hero section on Homepage', 'm-corporate' ),
		'section' => 'homepage_hero_section',
		'type'    => 'checkbox',
		'transport' => 'refresh',
	));
	
	$wp_customize->add_setting('hero_logo', array(
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_url_raw',
	)); 
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'hero_logo', array(
		'label'   => esc_html__( 'Logo', 'm-corporate' ),
		'section' => 'homepage_hero_section',
		
	  )
	));
	
	$wp_customize->add_setting('heading_text', array(
			'default' => esc_html__( 'Heading Text', 'm-corporate' ),
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		));
	$wp_customize->add_control('heading_text', array(
		'label'   => esc_html__( 'Heading Text', 'm-corporate' ),
		'section' => 'homepage_hero_section',
		'type'    => 'text',
		'transport' => 'refresh',
	));
	
	//Heading text color
	$wp_customize->add_setting( 'heading_color', array(
			'default' => '#000000',
			'sanitize_callback' => 'sanitize_hex_color' //validates 3 or 6 digit HTML hex color code
		)
	);
	  
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'heading_color', 
			array(              
				'label' => __( 'Heading Text color', 'm-corporate' ),
				'section' => 'homepage_hero_section'       
			)
		) 
	); 
	
	$wp_customize->add_setting('subheading_text', array(
			'default' => esc_html__( 'Sub Heading', 'm-corporate' ),
			'sanitize_callback' => 'wp_filter_nohtml_kses',
		)); 
	
	$wp_customize->add_control('subheading_text', array(
		'label'   => esc_html__( 'Hero Section Sub-Heading', 'm-corporate' ),
		'section' => 'homepage_hero_section',
		'type'    => 'text',
		'transport' => 'refresh',
	));
	
	// Sub Heading text color
	$wp_customize->add_setting( 'subheading_color', array(
			'default' => '#979797',
			'sanitize_callback' => 'sanitize_hex_color' //validates 3 or 6 digit HTML hex color code
		)
	);
	  
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'subheading_color', 
			array(              
				'label' => __( 'Sub-Heading Text color', 'm-corporate' ),
				'section' => 'homepage_hero_section'       
			)
		) 
	); 
	
	$wp_customize->add_setting('readmore_link', array(
			'default' => esc_html__( 'URL', 'm-corporate' ),
			'sanitize_callback' => 'esc_url_raw',
		)); 
	
	$wp_customize->add_control('readmore_link', array(
		'label'   => esc_html__( 'Readmore URL', 'm-corporate' ),
		'section' => 'homepage_hero_section',
		'type'    => 'url',
		'transport' => 'refresh',
	));
	
	$wp_customize->add_setting('show_scroll', array(
			'default'	=> false,
			'sanitize_callback' => 'mcorporate_sanitize_checkbox',
		)); 
	
	$wp_customize->add_control('show_scroll', array(
		'label'   => esc_html__( 'Show scroll to main content', 'm-corporate' ),
		'section' => 'homepage_hero_section',
		'type'    => 'checkbox',
		'transport' => 'refresh',
	));
	
	// footer section [social media links]
	
	$wp_customize->add_section('footer_social_icons', array(
	  'title'   => esc_html__( 'Footer Social Icons', 'm-corporate' )
	 ));
	
	//adding facebook url box
	$wp_customize->add_setting('facebook_url', array(
			'default' => esc_html__( 'Facebook URL', 'm-corporate' ),
			'sanitize_callback' => 'esc_url_raw',
		));
	$wp_customize->add_control('facebook_url', array(
		'label'   => esc_html__( 'Facebook', 'm-corporate' ),
		'section' => 'footer_social_icons',
		'type'    => 'url',
		'transport' => 'refresh',
	));
	//adding twitter url box
	$wp_customize->add_setting('twitter_url', array(
			'default' => esc_html__( 'Twitter URL', 'm-corporate' ),
			'sanitize_callback' => 'esc_url_raw',
		));
	$wp_customize->add_control('twitter_url', array(
		'label'   => esc_html__( 'Twitter', 'm-corporate' ),
		'section' => 'footer_social_icons',
		'type'    => 'url',
	));
	//adding linkedin url box
	$wp_customize->add_setting('linkedin_url', array(
			'default' => esc_html__( 'Linkedin URL', 'm-corporate' ),
			'sanitize_callback' => 'esc_url_raw',
		));
	$wp_customize->add_control('linkedin_url', array(
		'label'   => esc_html__( 'Linkedin', 'm-corporate' ),
		'section' => 'footer_social_icons',
		'type'    => 'url',
	));
}
add_action('customize_register', 'mcorporate_customizer_settings');

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses mcorporate_header_style()
 */
function mcorporate_custom_header_setup() {
	/**
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type int    $width                  Width in pixels of the custom header image. Default 954.
	 *     @type int    $height                 Height in pixels of the custom header image. Default 1300.
	 *     @type string $wp-head-callback       Callback function used to styles the header image and text
	 *                                          displayed on the blog.
	 * }
	 */
	add_theme_support(
		'custom-header',
		apply_filters(
			'mcorporate_custom_header_args',
			array(
				'width'              => 1350,
				'height'             => 65,
				'wp-head-callback'   => 'mcorporate_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'mcorporate_custom_header_setup' );
if ( ! function_exists( 'mcorporate_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 */
	function mcorporate_header_style() {
		$header_image = get_header_image();
		// If no custom options for text are set, let's bail.
		if ( empty( $header_image ) && display_header_text() ) {
			return;
		}
		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css" id="mcorporate-header-css">
		<?php
		// Has a Custom Header been added?
		if ( ! empty( $header_image ) ) :
			?>
		.main-header {

			/*
			 * No shorthand so the Customizer can override individual properties.
			 * @see https://core.trac.wordpress.org/ticket/31460
			 */
			background-image: url(<?php header_image(); ?>);
			background-repeat: no-repeat;
			background-position: 50% 50%;
			-webkit-background-size: cover;
			-moz-background-size:    cover;
			-o-background-size:      cover;
			background-size:         cover;
		}

		@media screen and (min-width: 59.6875em) {
			body:before {

				/*
				 * No shorthand so the Customizer can override individual properties.
				 * @see https://core.trac.wordpress.org/ticket/31460
				 */
				background-image: url(<?php header_image(); ?>);
				background-repeat: no-repeat;
				background-position: 100% 50%;
				-webkit-background-size: cover;
				-moz-background-size:    cover;
				-o-background-size:      cover;
				background-size:         cover;
				border-right: 0;
			}

			.site-header {
				background: transparent;
			}
		}
			<?php
		endif;

		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
		.site-title,
		.site-description {
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
	<?php endif; ?>
	</style>
		<?php
	}
endif; // mcorporate_header_style
function mcorporate_get_customizer_css(){
	?>
	<style>
		<?php
		// heading color for Hero Section
		$heading_color = get_theme_mod( 'heading_color', '' );
		if(!empty($heading_color)){ ?>
			.intro h1{
				color: <?php echo esc_attr( $heading_color );  ?>;
			}
		<?php 
		}
		$subheading_color = get_theme_mod( 'subheading_color', '' );
		if(!empty($heading_color)){ ?>
			.intro h3{
				color: <?php echo esc_attr( $subheading_color ); ?> !important;
			}
		<?php 
		}		
	?>
	</style>
	<?php
}
function mcorporate_theme_styles() {
  wp_enqueue_style( 'mcorporate-customizer-styles', get_stylesheet_uri() ); // This is where you enqueue your theme's main stylesheet
  $custom_css = mcorporate_get_customizer_css();
  wp_add_inline_style( 'mcorporate-customizer-styles', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'mcorporate_theme_styles' );