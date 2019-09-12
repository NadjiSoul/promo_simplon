<?php
/**
 * Theme Customizer Controls
 *
 * @package crater-free
 */


if ( ! function_exists( 'crater_free_customizer_color_register' ) ) :
function crater_free_customizer_color_register( $wp_customize ) {


    // Color panel
    CraterFree_Kirki::add_panel( 'crater_free_colors_panel', array(
        'title'          => __( 'Color Settings', 'crater-free' ),
        'priority'       => 25,
    ) );

    // General / Header
    CraterFree_Kirki::add_section( 'crater_free_general_color_settings', array(
        'panel'          => 'crater_free_colors_panel',
        'title'          => __( 'Header', 'crater-free' ),
    ) );

     // Header background color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_header_bg_color',
        'label'    => __( 'Header Background:', 'crater-free' ),
        'section'  => 'crater_free_general_color_settings',
        'default'  => '#fff',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'header.crater-menu-wrapper.style1',
                'property' => 'background',
            ),
        ),
    ] );

    // Site title
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_site_title_color',
        'label'    => __( 'Site Title:', 'crater-free' ),
        'section'  => 'crater_free_general_color_settings',
        'default'  => '#000',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => ' .site-title a, 
                                .site-title a:hover, 
                                .site-title a:focus, 
                                .site-title a:visited',
                'property' => 'color',
            ),
        ),
    ] );

    // Site description
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_site_desc_color',
        'label'    => __( 'Site description:', 'crater-free' ),
        'section'  => 'crater_free_general_color_settings',
        'default'  => '#000',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => '.crater-menu-wrapper.page p.site-description',
                'property' => 'color',
            ),
        ),
    ] );

    // Top menu color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_top_menu_color',
        'label'    => __( 'Top Menu:', 'crater-free' ),
        'section'  => 'crater_free_general_color_settings',
        'default'  => '#000',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => ' #crater-main-menu-wrapper .nav>li>a,
                                #crater-main-menu-wrapper .nav>li.dropdown .dropdown-menu li a,
                                #crater-main-menu-wrapper .nav>li.active .dropdown-menu a,
                                .navbar-toggle',
                'property' => 'color',
            ),
            array(
                'element'  => '.menu-search:before',
                'property' => 'border-color',
            ),
            array(
                'element'  => '.menu-search:after,
                               .menu-search-x:before,
                               .menu-search-x:after',
                'property' => 'background-color',
            ),
        ),
    ] );

    // Top menu active color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color-alpha',
        'settings' => 'cr_top_active_menu_color',
        'label'    => __( 'Top Menu Active:', 'crater-free' ),
        'section'  => 'crater_free_general_color_settings',
        'default'  => '#e02f2f',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => ' #crater-main-menu-wrapper .nav>li.active',
                'property' => 'background',
            ),
        ),
    ] );

    // Top menu active underline color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color-alpha',
        'settings' => 'cr_top_menu_bb_color',
        'label'    => __( 'Top Menu Active Underline:', 'crater-free' ),
        'section'  => 'crater_free_general_color_settings',
        'default'  => '#b91313',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => '#crater-main-menu-wrapper .nav>li.active',
                'property' => 'border-bottom-color',
            ),
            array(
                'element'  => '#crater-main-menu-wrapper .nav>li:hover',
                'property' => 'border-bottom-color',
            ),
        ),
    ] );

    // Dropdown color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color-alpha',
        'settings' => 'cr_dropdown_bg_color',
        'label'    => __( 'Dropdown background:', 'crater-free' ),
        'section'  => 'crater_free_general_color_settings',
        'default'  => '#fff',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'header.style1 #crater-main-menu-wrapper .nav>li.dropdown .dropdown-menu',
                'property' => 'background',
            ),

            array(
                'element'  => 'header.style1 #crater-main-menu-wrapper .nav>li.dropdown .dropdown-menu .dropdown-menu',
                'property' => 'background',
            ),
            array(
                'element'  => 'header.style2 #crater-main-menu-wrapper .nav>li.dropdown .dropdown-menu',
                'property' => 'background',
            ),

            array(
                'element'  => 'header.style2 #crater-main-menu-wrapper .nav>li.dropdown .dropdown-menu .dropdown-menu',
                'property' => 'background',
            ),
        ),
    ] );

    // Toggle button color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_toggle_button_color',
        'label'    => __( 'Toggle button color:', 'crater-free' ),
        'section'  => 'crater_free_general_color_settings',
        'default'  => '#555',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => '.crater-main-menu.page .navbar-toggle .icon-bar',
                'property' => 'background',
            ),
        ),
    ] );

    // Home section background content color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_home_bg_content_color',
        'label'    => __( 'Home Background Section content color:', 'crater-free' ),
        'section'  => 'crater_free_general_color_settings',
        'default'  => '#fff',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => '.slide-bg-section h1',
                'property' => 'color',
            ),
            array(
                'element'  => '.slide-bg-section p',
                'property' => 'color',
            ),
        ),
    ] );


    // Blog
    CraterFree_Kirki::add_section( 'crater_free_blog_color_settings', array(
        'panel'          => 'crater_free_colors_panel',
        'title'          => __( 'Blog', 'crater-free' ),
    ) );

    // Sidebar items border color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_sb_items_border_color',
        'label'    => __( 'Sidebar Items Left Border:', 'crater-free' ),
        'section'  => 'crater_free_blog_color_settings',
        'default'  => '#ff0000',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'aside .widget li',
                'property' => 'border-left-color',
            ),
            array(
                'element'  => 'article h3 a',
                'property' => 'border-left-color',
            ),
        ),
    ] );

    // Links color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_link_color',
        'label'    => __( 'Links:', 'crater-free' ),
        'section'  => 'crater_free_blog_color_settings',
        'default'  => '#444',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'a',
                'property' => 'color',
            ),
        ),
    ] );

    // Links hover color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_link_hover_color',
        'label'    => __( 'Links Hover:', 'crater-free' ),
        'section'  => 'crater_free_blog_color_settings',
        'default'  => '#000',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'a:hover',
                'property' => 'color',
            ),
        ),
    ] );

    // Headings color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_heading_color',
        'label'    => __( 'Headings:', 'crater-free' ),
        'section'  => 'crater_free_blog_color_settings',
        'default'  => '#444',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'aside .widget-title',
                'property' => 'color',
            ),
        ),
    ] );

    // Headings hover color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_heading_hover_color',
        'label'    => __( 'Headings Hover:', 'crater-free' ),
        'section'  => 'crater_free_blog_color_settings',
        'default'  => '#dd3333',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'aside h4.widget-title:hover',
                'property' => 'color',
            ),
        ),
    ] );

    // Buttons color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_button_color',
        'label'    => __( 'Buttons:', 'crater-free' ),
        'section'  => 'crater_free_blog_color_settings',
        'default'  => '#fe7237',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => '.slide-bg-section .read-more a',
                'property' => 'background',
            ),
            array(
                'element'  => '.slider .slider-button .read-more a',
                'property' => 'background',
            ),
            array(
                'element'  => 'button',
                'property' => 'background',
            ),
            array(
                'element'  => 'input[type=submit]',
                'property' => 'background',
            ),
            array(
                'element'  => 'article .read-more a',
                'property' => 'background',
            ),
        ),
    ] );

    // Buttons hover color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_button_hover_color',
        'label'    => __( 'Buttons Hover:', 'crater-free' ),
        'section'  => 'crater_free_blog_color_settings',
        'default'  => '#db5218',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => '.slide-bg-section .read-more a:hover',
                'property' => 'background',
            ),
            array(
                'element'  => '.slider .slider-button .read-more a:hover',
                'property' => 'background',
            ),
            array(
                'element'  => 'button:hover',
                'property' => 'background',
            ),
            array(
                'element'  => 'input[type=submit]:hover',
                'property' => 'background',
            ),
            array(
                'element'  => 'article .read-more a:hover',
                'property' => 'background',
            ),
        ),
    ] );


    // Footer
    CraterFree_Kirki::add_section( 'crater_free_footer_color_settings', array(
        'panel'          => 'crater_free_colors_panel',
        'title'          => __( 'Footer', 'crater-free' ),
    ) );

    // Footer background color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_footer_bg_color',
        'label'    => __( 'Footer background:', 'crater-free' ),
        'section'  => 'crater_free_footer_color_settings',
        'default'  => '#fff',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'footer#footer',
                'property' => 'background',
            ),
        ),
    ] );

    // Footer headings color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_footer_headings_color',
        'label'    => __( 'Footer Headings:', 'crater-free' ),
        'section'  => 'crater_free_footer_color_settings',
        'default'  => '#555',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'footer h4',
                'property' => 'color',
            ),
        ),
    ] );

    // Footer content color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_footer_content_color',
        'label'    => __( 'Footer Content:', 'crater-free' ),
        'section'  => 'crater_free_footer_color_settings',
        'default'  => '#b3b3b3',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'footer#footer',
                'property' => 'color',
            ),
        ),
    ] );

    // Footer links color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_footer_links_color',
        'label'    => __( 'Footer Links:', 'crater-free' ),
        'section'  => 'crater_free_footer_color_settings',
        'default'  => '#b3b3b3',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'footer#footer a',
                'property' => 'color',
            ),
        ),
    ] );

    // Footer links hover color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_footer_links_hover_color',
        'label'    => __( 'Footer Links Hover:', 'crater-free' ),
        'section'  => 'crater_free_footer_color_settings',
        'default'  => '#000',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'footer#footer a:hover',
                'property' => 'color',
            ),
        ),
    ] );

    // Sticky header
    CraterFree_Kirki::add_section( 'crater_free_sticky_header_color_settings', array(
        'panel'          => 'crater_free_colors_panel',
        'title'          => __( 'Sticky Header', 'crater-free' ),
    ) );

    // Header background color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_sticky_header_bg_color',
        'label'    => __( 'Header Background:', 'crater-free' ),
        'section'  => 'crater_free_sticky_header_color_settings',
        'default'  => '#fff',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'header#home-inner.style1.fixed.crater-menu-wrapper',
                'property' => 'background',
            ),
            array(
                'element'  => 'header#home-inner.style2.fixed.crater-menu-wrapper',
                'property' => 'background',
            ),
            array(
                'element'  => 'header#page-inner.style1.fixed.crater-menu-wrapper',
                'property' => 'background',
            ),
            array(
                'element'  => 'header#page-inner.style2.fixed.crater-menu-wrapper',
                'property' => 'background',
            ),
        ),
    ] );

    // Site title
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_sticky_site_title_color',
        'label'    => __( 'Site Title:', 'crater-free' ),
        'section'  => 'crater_free_sticky_header_color_settings',
        'default'  => '#000',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'header#home-inner.style1.fixed .site-title a, 
                               header#home-inner.style1.fixed .site-title a:hover, 
                               header#home-inner.style1.fixed .site-title a:focus, 
                               header#home-inner.style1.fixed .site-title a:visited',
                'property' => 'color',
            ),
            array(
                'element'  => 'header#home-inner.style2.fixed .site-title a, 
                               header#home-inner.style2.fixed .site-title a:hover, 
                               header#home-inner.style2.fixed .site-title a:focus, 
                               header#home-inner.style2.fixed .site-title a:visited',
                'property' => 'color',
            ),
            array(
                'element'  => 'header#page-inner.style1.fixed .site-title a, 
                               header#page-inner.style1.fixed .site-title a:hover, 
                               header#page-inner.style1.fixed .site-title a:focus, 
                               header#page-inner.style1.fixed .site-title a:visited',
                'property' => 'color',
            ),
            array(
                'element'  => 'header#page-inner.style2.fixed .site-title a, 
                               header#page-inner.style2.fixed .site-title a:hover, 
                               header#page-inner.style2.fixed .site-title a:focus, 
                               header#page-inner.style2.fixed .site-title a:visited',
                'property' => 'color',
            ),
        ),
    ] );

    // Site description
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_sticky_site_desc_color',
        'label'    => __( 'Site description:', 'crater-free' ),
        'section'  => 'crater_free_sticky_header_color_settings',
        'default'  => '#000',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'header#home-inner.style1.fixed p.site-description',
                'property' => 'color',
            ),
            array(
                'element'  => 'header#home-inner.style2.fixed p.site-description',
                'property' => 'color',
            ),
            array(
                'element'  => 'header#page-inner.style1.fixed p.site-description',
                'property' => 'color',
            ),
            array(
                'element'  => 'header#page-inner.style2.fixed p.site-description',
                'property' => 'color',
            ),
        ),
    ] );

    // Menu color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_sticky_menu_color',
        'label'    => __( 'Top Menu:', 'crater-free' ),
        'section'  => 'crater_free_sticky_header_color_settings',
        'default'  => '#000',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'header#home-inner.style1.fixed #crater-main-menu-wrapper .nav>li a',
                'property' => 'color',
            ),
            array(
                'element'  => 'header#home-inner.style2.fixed #crater-main-menu-wrapper .nav>li a',
                'property' => 'color',
            ),
            array(
                'element'  => 'header#page-inner.style1.fixed #crater-main-menu-wrapper .nav>li a',
                'property' => 'color',
            ),
            array(
                'element'  => 'header#page-inner.style2.fixed #crater-main-menu-wrapper .nav>li a',
                'property' => 'color',
            ),
            array(
                'element'  => 'header#page-inner.style2.fixed #crater-main-menu-wrapper .nav>li.active .dropdown-menu a',
                'property' => 'color',
            ),
        ),
    ] );

    // Top menu active color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_sticky_top_active_menu_color',
        'label'    => __( 'Top Menu Active:', 'crater-free' ),
        'section'  => 'crater_free_sticky_header_color_settings',
        'default'  => '#e02f2f',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'header#home-inner.fixed #crater-main-menu-wrapper .nav>li.active',
                'property' => 'background',
            ),
            array(
                'element'  => 'header#page-inner.fixed #crater-main-menu-wrapper .nav>li.active',
                'property' => 'background',
            ),
        ),
    ] );

    // Top menu active underline color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_sticky_top_menu_bb_color',
        'label'    => __( 'Top Menu Active Underline:', 'crater-free' ),
        'section'  => 'crater_free_sticky_header_color_settings',
        'default'  => '#b91313',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'header#home-inner.fixed #crater-main-menu-wrapper .nav>li.active',
                'property' => 'border-bottom-color',
            ),
            array(
                'element'  => 'header#home-inner.fixed #crater-main-menu-wrapper .nav>li:hover',
                'property' => 'border-bottom-color',
            ),
            array(
                'element'  => 'header#page-inner.fixed #crater-main-menu-wrapper .nav>li.active',
                'property' => 'border-bottom-color',
            ),
            array(
                'element'  => 'header#page-inner.fixed #crater-main-menu-wrapper .nav>li:hover',
                'property' => 'border-bottom-color',
            ),
        ),
    ] );

    // Dropdown color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color-alpha',
        'settings' => 'cr_sticky_dropdown_bg_color',
        'label'    => __( 'Dropdown background:', 'crater-free' ),
        'section'  => 'crater_free_sticky_header_color_settings',
        'default'  => '#fff',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'header#home-inner.style1.fixed #crater-main-menu-wrapper .nav>li.dropdown .dropdown-menu',
                'property' => 'background',
            ),

            array(
                'element'  => 'header#home-inner.style1.fixed #crater-main-menu-wrapper .nav>li.dropdown .dropdown-menu .dropdown-menu',
                'property' => 'background',
            ),
            array(
                'element'  => 'header#home-inner.style2.fixed #crater-main-menu-wrapper .nav>li.dropdown .dropdown-menu',
                'property' => 'background',
            ),

            array(
                'element'  => 'header#home-inner.style2.fixed #crater-main-menu-wrapper .nav>li.dropdown .dropdown-menu .dropdown-menu',
                'property' => 'background',
            ),
            array(
                'element'  => 'header#page-inner.style1.fixed #crater-main-menu-wrapper .nav>li.dropdown .dropdown-menu',
                'property' => 'background',
            ),

            array(
                'element'  => 'header#page-inner.style1.fixed #crater-main-menu-wrapper .nav>li.dropdown .dropdown-menu .dropdown-menu',
                'property' => 'background',
            ),
            array(
                'element'  => 'header#page-inner.style2.fixed #crater-main-menu-wrapper .nav>li.dropdown .dropdown-menu',
                'property' => 'background',
            ),

            array(
                'element'  => 'header#page-inner.style2.fixed #crater-main-menu-wrapper .nav>li.dropdown .dropdown-menu .dropdown-menu',
                'property' => 'background',
            ),
        ),
    ] );

    // Inner Pages
    CraterFree_Kirki::add_section( 'crater_free_inner_pages_color_settings', array(
        'panel'          => 'crater_free_colors_panel',
        'title'          => __( 'Inner Pages Header', 'crater-free' ),
    ) );

    // Header background color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_ip_header_bg_color',
        'label'    => __( 'Header Background:', 'crater-free' ),
        'section'  => 'crater_free_inner_pages_color_settings',
        'default'  => '#fff',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'header#page-inner.crater-menu-wrapper',
                'property' => 'background',
            ),
        ),
    ] );

    // Site title
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_ip_site_title_color',
        'label'    => __( 'Site Title:', 'crater-free' ),
        'section'  => 'crater_free_inner_pages_color_settings',
        'default'  => '#000',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'header#page-inner .site-title a, 
                               header#page-inner .site-title a:hover, 
                               header#page-inner .site-title a:focus, 
                               header#page-inner .site-title a:visited',
                'property' => 'color',
            ),
        ),
    ] );

    // Site description
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_ip_site_desc_color',
        'label'    => __( 'Site description:', 'crater-free' ),
        'section'  => 'crater_free_inner_pages_color_settings',
        'default'  => '#000',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'header#page-inner p.site-description',
                'property' => 'color',
            ),
        ),
    ] );

    // Menu color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_ip_menu_color',
        'label'    => __( 'Top Menu:', 'crater-free' ),
        'section'  => 'crater_free_inner_pages_color_settings',
        'default'  => '#000',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'header#page-inner #crater-main-menu-wrapper .nav>li a',
                'property' => 'color',
            ),
            array(
                'element'  => 'header#page-inner #crater-main-menu-wrapper .nav>li.active .dropdown-menu a',
                'property' => 'color',
            ),
        ),
    ] );

    // Top menu active color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color-alpha',
        'settings' => 'cr_ip_top_active_menu_color',
        'label'    => __( 'Top Menu Active:', 'crater-free' ),
        'section'  => 'crater_free_inner_pages_color_settings',
        'default'  => '#e02f2f',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'header#page-inner #crater-main-menu-wrapper .nav>li.active',
                'property' => 'background',
            ),
        ),
    ] );

    // Top menu active underline color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color-alpha',
        'settings' => 'cr_ip_top_menu_bb_color',
        'label'    => __( 'Top Menu Active Underline:', 'crater-free' ),
        'section'  => 'crater_free_inner_pages_color_settings',
        'default'  => '#b91313',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'header#page-inner #crater-main-menu-wrapper .nav>li.active',
                'property' => 'border-bottom-color',
            ),
            array(
                'element'  => 'header#page-inner #crater-main-menu-wrapper .nav>li:hover',
                'property' => 'border-bottom-color',
            ),
        ),
    ] );

    // Dropdown color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color-alpha',
        'settings' => 'cr_ip_dropdown_bg_color',
        'label'    => __( 'Dropdown background:', 'crater-free' ),
        'section'  => 'crater_free_inner_pages_color_settings',
        'default'  => '#fff',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'header#page-inner #crater-main-menu-wrapper .nav>li.dropdown .dropdown-menu',
                'property' => 'background',
            ),

            array(
                'element'  => 'header#page-inner #crater-main-menu-wrapper .nav>li.dropdown .dropdown-menu .dropdown-menu',
                'property' => 'background',
            ),
        ),
    ] );

    // Toggle button color
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'color',
        'settings' => 'cr_toggle_button_color_ip',
        'label'    => __( 'Toggle button color:', 'crater-free' ),
        'section'  => 'crater_free_inner_pages_color_settings',
        'default'  => '#555',
        'transport'  => 'auto',
        'output' => array(
            array(
                'element'  => 'header#page-inner .crater-main-menu.page .navbar-toggle .icon-bar',
                'property' => 'background',
            ),
        ),
    ] );
    
}
endif;

add_action( 'init', 'crater_free_customizer_color_register' );