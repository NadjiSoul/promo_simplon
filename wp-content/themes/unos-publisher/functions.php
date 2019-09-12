<?php
/**
 *                  _   _             _   
 *  __      ___ __ | | | | ___   ___ | |_ 
 *  \ \ /\ / / '_ \| |_| |/ _ \ / _ \| __|
 *   \ V  V /| |_) |  _  | (_) | (_) | |_ 
 *    \_/\_/ | .__/|_| |_|\___/ \___/ \__|
 *           |_|                          
 *
 * :: Theme's main functions file ::::::::::::
 * :: Initialize and setup the theme :::::::::
 *
 * Hooks, Actions and Filters are used throughout this theme. You should be able to do most of your
 * customizations without touching the main code. For more information on hooks, actions, and filters
 * @see http://codex.wordpress.org/Plugin_API
 *
 * @package    Unos Publisher
 */


/* === Theme Setup === */


/**
 * Theme Setup
 *
 * @since 1.0
 * @access public
 * @return void
 */
function unospub_theme_setup(){

	// Load theme's Hootkit functions if plugin is active
	if ( class_exists( 'HootKit' ) && file_exists( hoot_data()->child_dir . 'hootkit/functions.php' ) )
		include_once( hoot_data()->child_dir . 'hootkit/functions.php' );

	// Load the about page.
	if ( apply_filters( 'unospub_load_about', file_exists( hoot_data()->child_dir . 'admin/about.php' ) ) )
		require_once( hoot_data()->child_dir . 'admin/about.php' );

}
add_action( 'after_setup_theme', 'unospub_theme_setup', 10 );

/**
 * Set dynamic css handle to child stylesheet
 * if HK active : earlier set to hootkit@parent @priority 5; set to hootkit@child @priority 9
 * This is preferred in case of pre-built child themes where we want child stylesheet to come before
 * dynamic css (not after like in the case of user blank child themes purely used for customizations)
 *
 * @since 1.0
 * @access public
 * @return string
 */
if ( !function_exists( 'unospub_dynamic_css_child_handle' ) ) :
function unospub_dynamic_css_child_handle( $handle ) {
	return 'hoot-child-style';
}
endif;
add_filter( 'hoot_style_builder_inline_style_handle', 'unospub_dynamic_css_child_handle', 7 );

/**
 * Unload Template's About Page
 *
 * @since 1.0
 * @access public
 * @return bool
 */
function unospub_unload_template_about( $load ) {
	return false;
}
add_filter( 'unos_load_about', 'unospub_unload_template_about', 5 );

/**
 * Add child theme's hook for unloading About page
 *
 * @since 1.0
 * @access public
 * @return array
 */
function unospub_unload_about( $hooks ) {
	if ( is_array( $hooks ) )
		$hooks[] = 'unospub_load_about';
	return $hooks;
}
add_filter( 'unos_unload_upsell', 'unospub_unload_about', 5 );

/**
 * Modify custom-header
 * Priority@5 to come before 10 used by unos for adding support
 *    @ref wp-includes/theme.php #2440
 *    // Merge in data from previous add_theme_support() calls.
 *    // The first value registered wins. (A child theme is set up first.)
 * For remove_theme_support, use priority@15
 *
 * @since 1.0
 * @access public
 * @return void
 */
function unospub_custom_header() {
	add_theme_support( 'custom-header', array(
		'width' => 1440,
		'height' => 500,
		'flex-height' => true,
		'flex-width' => true,
		'default-image' => '',
		'header-text' => false
	) );
}
add_filter( 'after_setup_theme', 'unospub_custom_header', 5 );


/* === Attr === */

/**
 * Loop meta attributes.
 * Priority@10: 7-> base lite ; 9-> base prim
 *
 * @since 1.0
 * @param array $attr
 * @param string $context
 * @return array
 */
function unospub_attr_premium_loop_meta_wrap( $attr, $context ) {
	$attr['class'] = ( empty( $attr['class'] ) ) ? '' : $attr['class'];

	/* Overwrite all and apply background class for both */
	$attr['class'] = str_replace( array( 'loop-meta-wrap pageheader-bg-default', 'loop-meta-wrap pageheader-bg-stretch', 'loop-meta-wrap pageheader-bg-incontent', 'loop-meta-wrap pageheader-bg-both', 'loop-meta-wrap pageheader-bg-none', ), '', $attr['class'] );
	$attr['class'] .= ' loop-meta-wrap pageheader-bg-both';

	return $attr;
}
add_filter( 'hoot_attr_loop-meta-wrap', 'unospub_attr_premium_loop_meta_wrap', 10, 2 );


/* === Dynamic CSS === */


/**
 * Custom CSS built from user theme options
 * For proper sanitization, always use functions from library/sanitization.php
 * Priority@6: 5-> base lite ; 7-> base prim prepare (rules removed) ;
 *             9-> base prim ; 10-> base hootkit lite/prim
 *
 * @since 1.0
 * @access public
 */
function unospub_dynamic_cssrules() {

	global $hoot_style_builder;

	// Get user based style values
	$styles = unos_user_style(); // echo '<!-- '; print_r($styles); echo ' -->';
	extract( $styles );

	hoot_add_css_rule( array(
						'selector'  => 'body.wordpress input[type="submit"], body.wordpress #submit, body.wordpress .button',
						'property'  => array(
							'border-color' => array( $accent_color, 'accent_color' ),
							'color'        => array( $accent_color, 'accent_color' ),
							'background'   => array( $accent_font, 'accent_font' ),
							),
					) );

	hoot_add_css_rule( array(
						'selector'  => 'body.wordpress input[type="submit"]:hover, body.wordpress #submit:hover, body.wordpress .button:hover',
						'property'  => array(
							'background' => array( $accent_color, 'accent_color' ),
							'color'      => array( $accent_font, 'accent_font' ),
							),
					) );

	$headingproperty = array();
	if ( 'fontos' == $headings_fontface )
		$headingproperty['font-family'] = array( '"Open Sans", sans-serif' );
	elseif ( 'fontcf' == $headings_fontface )
		$headingproperty['font-family'] = array( '"Comfortaa", sans-serif' );
	elseif ( 'fontow' == $headings_fontface )
		$headingproperty['font-family'] = array( '"Oswald", sans-serif' );
	elseif ( 'fontlo' == $headings_fontface )
		$headingproperty['font-family'] = array( '"Vidaloka", serif' );
	elseif ( 'fontsl' == $headings_fontface )
		$headingproperty['font-family'] = array( '"Slabo 27px", serif' );
	elseif ( 'fontgr' == $headings_fontface )
		$headingproperty['font-family'] = array( 'Georgia, serif' );
	if ( 'uppercase' == $headings_fontface_style )
		$headingproperty['text-transform'] = array( 'uppercase' );
	else
		$headingproperty['text-transform'] = array( 'none' );
	if ( !empty( $headingproperty ) ) {
		hoot_add_css_rule( array(
						'selector'  => 'h1, h2, h3, h4, h5, h6, .title, .titlefont',
						'property'  => $headingproperty,
					) ); // Removed in prim
	}

	hoot_add_css_rule( array(
						'selector'  => '#topbar',
						'property'  => array(
							'background' => array( 'none' ),    // $accent_color
							'color'      => array( 'inherit' ), // $accent_font
							),
					) );

	hoot_add_css_rule( array(
						'selector'  => '#topbar.js-search .searchform.expand .searchtext',
						'property'  => 'background',
						'value'     => $content_bg_color, // $accent_color
					) );
	hoot_add_css_rule( array(
						'selector'  => '#topbar.js-search .searchform.expand .searchtext' . ',' . '#topbar .js-search-placeholder',
						'property'  => 'color',
						'value'     => 'inherit', // $accent_font
					) );

	$logoproperty = array();
	if ( 'fontos' == $logo_fontface )
		$logoproperty['font-family'] = array( '"Open Sans", sans-serif' );
	elseif ( 'fontcf' == $logo_fontface )
		$logoproperty['font-family'] = array( '"Comfortaa", sans-serif' );
	elseif ( 'fontow' == $logo_fontface )
		$logoproperty['font-family'] = array( '"Oswald", sans-serif' );
	elseif ( 'fontlo' == $logo_fontface )
		$logoproperty['font-family'] = array( '"Vidaloka", serif' );
	elseif ( 'fontsl' == $logo_fontface )
		$logoproperty['font-family'] = array( '"Slabo 27px", serif' );
	elseif ( 'fontgr' == $logo_fontface )
		$logoproperty['font-family'] = array( 'Georgia, serif' );
	if ( 'uppercase' == $logo_fontface_style )
		$logoproperty['text-transform'] = array( 'uppercase' );
	else
		$logoproperty['text-transform'] = array( 'none' );
	if ( !empty( $logoproperty ) ) {
		hoot_add_css_rule( array(
						'selector'  => '#site-title',
						'property'  => $logoproperty,
					) ); // Removed in prim
	}

	$sitetitleheadingfont = '';
	if ( 'fontos' == $headings_fontface )
		$sitetitleheadingfont = '"Open Sans", sans-seriff';
	elseif ( 'fontcf' == $headings_fontface )
		$sitetitleheadingfont = '"Comfortaa", sans-serif';
	elseif ( 'fontow' == $headings_fontface )
		$sitetitleheadingfont = '"Oswald", sans-serif';
	elseif ( 'fontlo' == $headings_fontface )
		$sitetitleheadingfont = '"Vidaloka", serif';
	elseif ( 'fontsl' == $headings_fontface )
		$sitetitleheadingfont = '"Slabo 27px", serif';
	elseif ( 'fontgr' == $headings_fontface )
		$sitetitleheadingfont = 'Georgia, serif';
	hoot_add_css_rule( array(
						'selector'  => '.site-title-heading-font',
						'property'  => 'font-family',
						'value'     => $sitetitleheadingfont,
					) ); // Overridden in prim
	hoot_add_css_rule( array(
						'selector'  => '.entry-grid .more-link',
						'property'  => 'font-family',
						'value'     => $sitetitleheadingfont,
					) ); // Overridden in prim

	$hoot_style_builder->remove( array(
		'.menu-items li.current-menu-item, .menu-items li.current-menu-ancestor, .menu-items li:hover',
		'.menu-items li.current-menu-item > a, .menu-items li.current-menu-ancestor > a, .menu-items li:hover > a',
	) );
	hoot_add_css_rule( array(
						'selector'  => '#header' . ',' . '.menu-items > li.current-menu-item:after, .menu-items > li.current-menu-ancestor:after, .menu-items > li:hover:after' . ',' . '.header-supplementary .menu-area-wrap',
						'property'  => 'border-color',
						'value'     => $accent_color,
						'idtag'     => 'accent_color'
					) );
	hoot_add_css_rule( array(
						'selector'  => '.menu-items ul li.current-menu-item, .menu-items ul li.current-menu-ancestor, .menu-items ul li:hover',
						'property'  => 'background',
						'value'     => $accent_font,
						'idtag'     => 'accent_font'
					) );
	hoot_add_css_rule( array(
						'selector'  => '.menu-items ul li.current-menu-item > a, .menu-items ul li.current-menu-ancestor > a, .menu-items ul li:hover > a',
						'property'  => 'color',
						'value'     => $accent_color,
						'idtag'     => 'accent_color'
					) );

	hoot_add_css_rule( array(
						'selector'  => '.sidebar .widget-title' . ',' . '.sub-footer .widget-title, .footer .widget-title',
						'property'  => array(
							'background' => array( $accent_font, 'accent_font' ),
							'color'      => array( $accent_color, 'accent_color' ),
							'border-color' => array( $accent_color, 'accent_color' ),
							),
					) );
	hoot_add_css_rule( array(
						'selector'  => '.sidebar .widget:hover .widget-title, .sub-footer .widget:hover .widget-title, .footer .widget:hover .widget-title',
						'property'  => array(
							'background' => array( $accent_color, 'accent_color' ),
							'color'      => array( $accent_font, 'accent_font' ),
							),
					) );

	$halfwidgetmargin = false;
	if ( intval( $widgetmargin ) )
		$halfwidgetmargin = ( intval( $widgetmargin ) / 2 > 25 ) ? ( intval( $widgetmargin ) / 2 ) . 'px' : '25px';
	if ( $halfwidgetmargin )
		hoot_add_css_rule( array(
						'selector'  => '#below-header + .main > .loop-meta-wrap, #below-header + .main > .entry-featured-img-headerwrap' . ',' . '.main > .main-content-grid:first-child' . ',' . '.content-frontpage > .frontpage-area-boxed:first-child',
						'property'  => 'margin-top',
						'value'     => $halfwidgetmargin,
					) );

}
add_action( 'hoot_dynamic_cssrules', 'unospub_dynamic_cssrules', 6 );


/* === Customizer Options === */


/**
 * Update theme defaults
 * Prim @priority 5
 *
 * @since 1.0
 * @access public
 * @return array
 */
if ( !function_exists( 'unospub_default_style' ) ) :
function unospub_default_style( $defaults ){
	$defaults = array_merge( $defaults, array(
		'logo_fontface'        => 'fontlo',
		'headings_fontface'    => 'fontgr',
	) );
	return $defaults;
}
endif;
add_filter( 'unos_default_style', 'unospub_default_style', 7 );

/**
 * Add Options (settings, sections and panels) to Hoot_Customize class options object
 *
 * Parent Lite/Prim add options using 'init' hook both at priority 0. Currently there is no way
 * to hook in between them. Hence we hook in later at 5 to be able to remove options if needed.
 * The only drawback is that options involving widget areas cannot be modified/created/removed as
 * those have already been used during widgets_init hooked into init at priority 1. For adding options
 * involving widget areas, we can alterntely hook into 'after_setup_theme' before lite/prim options
 * are built. Modifying/removing such options from lite/prim still needs testing.
 *
 * @since 1.0
 * @access public
 */
if ( !function_exists( 'unospub_add_customizer_options' ) ) :
function unospub_add_customizer_options() {

	$hoot_customize = Hoot_Customize::get_instance();

	// Modify Options
	$hoot_customize->remove_settings( array( 'logo_tagline_size', 'logo_tagline_style' ) );
	$hoot_customize->remove_settings( 'pageheader_background_location' );

	// Define Options
	$options = array(
		'settings' => array(),
		'sections' => array(),
		'panels' => array(),
	);
	// $options['settings']['logo_tagline_size'] = array(
	// 	'label'       => esc_html__( 'Logo Tagline Size', 'unos-publisher' ),
	// 	'section'     => 'logo',
	// 	'type'        => 'select',
	// 	'priority'    => '185',
	// 	'choices'     => array(
	// 		'small'  => esc_html__( 'Small', 'unos-publisher' ),
	// 		'medium' => esc_html__( 'Medium', 'unos-publisher' ),
	// 		'large'  => esc_html__( 'Large', 'unos-publisher' ),
	// 	),
	// 	'default'     => 'medium',
	// );

	// Add Options
	$hoot_customize->add_options( array(
		'settings' => $options['settings'],
		'sections' => $options['sections'],
		'panels' => $options['panels'],
		) );

}
endif;
add_action( 'init', 'unospub_add_customizer_options', 5 );

/**
 * Modify Lite customizer options
 * Prim hooks in later at priority 9
 *
 * @since 1.0
 * @access public
 */
function unospub_modify_customizer_options( $options ){
	if ( isset( $options['settings']['logo_fontface'] ) ) {
		$options['settings']['logo_fontface']['choices']['fontlo'] = esc_html__( 'Heading Font 1 (Vidaloka)', 'unos-publisher');
		$options['settings']['logo_fontface']['choices']['fontgr'] = esc_html__( 'Heading Font 3 (Georgia)', 'unos-publisher');
	}
	if ( isset( $options['settings']['headings_fontface'] ) ) {
		$options['settings']['headings_fontface']['choices']['fontlo'] = esc_html__( 'Heading Font 1 (Vidaloka)', 'unos-publisher');
		$options['settings']['headings_fontface']['choices']['fontgr'] = esc_html__( 'Heading Font 3 (Georgia)', 'unos-publisher');
	}
	if ( isset( $options['settings']['menu_location'] ) )
		$options['settings']['menu_location']['default'] = 'bottom';
	if ( isset( $options['settings']['logo_side'] ) )
		$options['settings']['logo_side']['default'] = 'none';
	if ( isset( $options['settings']['logo_size'] ) )
		$options['settings']['logo_size']['default'] = 'medium';
	return $options;
}
add_filter( 'unos_customizer_options', 'unospub_modify_customizer_options', 7 );

/**
 * Modify Customizer Link Section
 *
 * @since 1.0
 * @access public
 */
function unospub_customizer_option_linksection( $lcontent ){
	if ( is_array( $lcontent ) ) {
		if ( !empty( $lcontent['demo'] ) )
			$lcontent['demo'] = str_replace( 'demo.wphoot.com/unos', 'demo.wphoot.com/unos-publisher', $lcontent['demo'] );
		if ( !empty( $lcontent['rateus'] ) )
			$lcontent['rateus'] = str_replace( 'wordpress.org/support/theme/unos', 'wordpress.org/support/theme/unos-publisher', $lcontent['rateus'] );
	}
	return $lcontent;
}
add_filter( 'unos_customizer_option_linksection', 'unospub_customizer_option_linksection' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 1.0
 * @return void
 */
function unospub_customize_preview_js() {
	if ( file_exists( hoot_data()->child_dir . 'admin/customize-preview.js' ) )
		wp_enqueue_script( 'unospub-customize-preview', hoot_data()->child_uri . 'admin/customize-preview.js', array( 'hoot-customize-preview', 'customize-preview' ), hoot_data()->childtheme_version, true );
}
add_action( 'customize_preview_init', 'unospub_customize_preview_js', 12 );

/**
 * Enqueue custom scripts to customizer screen
 * Library files and localize data (Customizer Interface) @priority 11
 * Include styles/scripts (theme specific) @priority 12
 *
 * @since 1.0
 * @return void
 */
function unospub_customizer_enqueue_scripts() {
	if ( file_exists( hoot_data()->child_dir . 'admin/customize-controls.js' ) )
		wp_enqueue_script( 'unospub-customize-controls', hoot_data()->child_uri . 'admin/customize-controls.js', array( 'unos-customize-controls' ), hoot_data()->childtheme_version, true );
}
add_action( 'customize_controls_enqueue_scripts', 'unospub_customizer_enqueue_scripts', 15 );

/**
 * Add style tag to support dynamic css via postMessage script in customizer preview
 *
 * @since 2.7
 * @access public
 */

function unospub_customize_dynamic_selectors( $settings ) {
	if ( !is_array( $settings ) ) return $settings;
	$hootpload = ( function_exists( 'hoot_lib_premium_core' ) ) ? 1 : '';

	$modify = array(
		'box_background_color' => array(
			'color'			=> array( 'remove' => array(), 'add' => array(), ),
			'background'	=> array( 'remove' => array(), 'add' => array(), ),
		),
		'accent_color' => array(
			'color' => array(
				'remove' => array(
					'body.wordpress input[type="submit"]:hover, body.wordpress #submit:hover, body.wordpress .button:hover',
				),
				'add' => array(
					'body.wordpress input[type="submit"], body.wordpress #submit, body.wordpress .button',
					'.menu-items ul li.current-menu-item > a, .menu-items ul li.current-menu-ancestor > a, .menu-items ul li:hover > a',
					'.sidebar .widget-title' . ',' . '.sub-footer .widget-title, .footer .widget-title',
					'.social-icons-icon',
				),
			),
			'background' => array(
				'remove' => array(
					'body.wordpress input[type="submit"], body.wordpress #submit, body.wordpress .button',
					'.menu-items li.current-menu-item, .menu-items li.current-menu-ancestor, .menu-items li:hover',
					'.sidebar .widget-title' . ',' . '.sub-footer .widget-title, .footer .widget-title',
					'.social-icons-icon',
				),
				'add' => array(
					'body.wordpress input[type="submit"]:hover, body.wordpress #submit:hover, body.wordpress .button:hover',
					'.sidebar .widget:hover .widget-title, .sub-footer .widget:hover .widget-title, .footer .widget:hover .widget-title',
				),
			),
			'border-color' => array(
				'add' => array(
					'#header' . ',' . '.menu-items > li.current-menu-item:after, .menu-items > li.current-menu-ancestor:after, .menu-items > li:hover:after' . ',' . '.header-supplementary .menu-area-wrap',
					'.sidebar .widget-title' . ',' . '.sub-footer .widget-title, .footer .widget-title',
					'.social-icons-icon',
				),
			),
		),
		'accent_font' => array(
			'color' => array(
				'remove' => array(
					'body.wordpress input[type="submit"], body.wordpress #submit, body.wordpress .button',
					'.menu-items li.current-menu-item > a, .menu-items li.current-menu-ancestor > a, .menu-items li:hover > a',
					'.sidebar .widget-title' . ',' . '.sub-footer .widget-title, .footer .widget-title',
					'.social-icons-icon',
				),
				'add' => array(
					'body.wordpress input[type="submit"]:hover, body.wordpress #submit:hover, body.wordpress .button:hover',
					'.sidebar .widget:hover .widget-title, .sub-footer .widget:hover .widget-title, .footer .widget:hover .widget-title',
				),
			),
			'background' => array(
				'remove' => array(
					'body.wordpress input[type="submit"]:hover, body.wordpress #submit:hover, body.wordpress .button:hover',
				),
				'add' => array(
					'body.wordpress input[type="submit"], body.wordpress #submit, body.wordpress .button',
					'.menu-items ul li.current-menu-item, .menu-items ul li.current-menu-ancestor, .menu-items ul li:hover',
					'.sidebar .widget-title' . ',' . '.sub-footer .widget-title, .footer .widget-title',
					'.social-icons-icon',
				),
			),
		),
	);

	if ( !$hootpload ) {
		array_push( $modify['accent_color']['background']['remove'], '#topbar', '#topbar.js-search .searchform.expand .searchtext' );
		array_push( $modify['accent_font']['color']['remove'], '#topbar', '#topbar.js-search .searchform.expand .searchtext', '#topbar .js-search-placeholder' );
		array_push( $modify['box_background_color']['background']['add'], '#topbar.js-search .searchform.expand .searchtext' );
	}

	foreach ( $modify as $id => $props ) {
		foreach ( $props as $prop => $ops ) {
			foreach ( $ops as $op => $values ) {
				if ( $op == 'remove' ) {
					foreach ( $values as $val ) {
						$akey = array_search( $val, $settings[$id][$prop] );
						if ( $akey !== false ) unset( $settings[$id][$prop][$akey] );
					}
				} elseif ( $op == 'add' ) {
					foreach ( $values as $val ) {
						$settings[$id][$prop][] = $val;
					}
				}
			}
		}
	}

	return $settings;
}
add_filter( 'hoot_customize_dynamic_selectors', 'unospub_customize_dynamic_selectors', 5 );


/* === Fonts === */


/**
 * Build URL for loading Google Fonts
 * @credit http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 * Priority@5 : Prim loads at priority 10
 *
 * @since 1.0
 * @access public
 * @return void
 */
function unospub_google_fonts_enqueue_url_args() {
	$fonts_url = '';
	$query_args = array();

		/* Translators: If there are characters in your language that are not
		* supported by this font, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$fontos = _x( 'on', 'Open Sans font: on or off', 'unos-publisher' );
 
		/* Translators: If there are characters in your language that are not
		* supported by this font, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$fontcf = ( 'fontcf' == hoot_get_mod( 'logo_fontface' ) || 'fontcf' == hoot_get_mod( 'headings_fontface' ) ) ?
					_x( 'on', 'Comfortaa font: on or off', 'unos-publisher' ) : 'off';
		$fontow = ( 'fontow' == hoot_get_mod( 'logo_fontface' ) || 'fontow' == hoot_get_mod( 'headings_fontface' ) ) ?
					_x( 'on', 'Oswald font: on or off', 'unos-publisher' ) : 'off';
		$fontlo = ( 'fontlo' == hoot_get_mod( 'logo_fontface' ) || 'fontlo' == hoot_get_mod( 'headings_fontface' ) ) ?
					_x( 'on', 'Vidaloka font: on or off', 'unos-publisher' ) : 'off';
		$fontsl = ( 'fontsl' == hoot_get_mod( 'logo_fontface' ) || 'fontsl' == hoot_get_mod( 'headings_fontface' ) ) ?
					_x( 'on', 'Slabo 27px font: on or off', 'unos-publisher' ) : 'off';

		if ( 'off' !== $fontos || 'off' !== $fontcf || 'off' !== $fontow || 'off' !== $fontlo || 'off' !== $fontsl ) {
			$font_families = array();

			if ( 'off' !== $fontos ) {
				$font_families[] = 'Open Sans:300,400,400i,500,600,700,700i,800';
			}

			if ( 'off' !== $fontcf ) {
				$font_families[] = 'Comfortaa:400,700';
			}

			if ( 'off' !== $fontow ) {
				$font_families[] = 'Oswald:400';
			}

			if ( 'off' !== $fontlo ) {
				$font_families[] = 'Vidaloka:400,400i';
			}

			if ( 'off' !== $fontsl ) {
				$font_families[] = 'Slabo 27px:400';
			}

			if ( !empty( $font_families ) )
				$query_args = array(
					'family' => rawurlencode( implode( '|', $font_families ) ),
					'subset' => rawurlencode( 'latin' ), // rawurlencode( 'latin,latin-ext' ),
				);

			$query_args = apply_filters( 'unos_google_fonts_query_args', $query_args, $font_families );

		}

	return $query_args;
}
add_filter( 'unos_google_fonts_enqueue_url_args', 'unospub_google_fonts_enqueue_url_args', 5 );

/**
 * Modify the font (websafe) list
 * Font list should always have the form:
 * {css style} => {font name}
 * 
 * Even though this list isn't currently used in customizer options (no typography options)
 * this is still needed so that sanitization functions recognize the font.
 * Priority@15 to overwrite Lite @priority 10
 *
 * @since 1.0
 * @access public
 * @return array
 */
function unospub_fonts_list( $fonts ) {
	if ( !function_exists( 'hoot_lib_premium_core' ) ){
		if ( isset( $fonts['"Lora", serif'] ) )
			unset( $fonts['"Lora", serif'] );
		$fonts['"Vidaloka", serif'] = 'Vidaloka';
	} else {
		// let those fonts occur in their natural order as stated in hoot_googlefonts_list()
		return $fonts;
	}
	return $fonts;
}
add_filter( 'hoot_fonts_list', 'unospub_fonts_list', 15 );