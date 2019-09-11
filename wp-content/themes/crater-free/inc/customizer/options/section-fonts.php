<?php
/**
 * Theme Customizer Controls
 *
 * @package crater-free
 */


if ( ! function_exists( 'crater_free_customizer_fonts_register' ) ) :
function crater_free_customizer_fonts_register( $wp_customize ) {


    // Typography Settings panel
    CraterFree_Kirki::add_panel( 'crater_free_fonts_panel', array(
        'title'          => __( 'Typography Settings', 'crater-free' ),
        'priority'       => 25,
    ) );

    // Font Families
    CraterFree_Kirki::add_section( 'crater_free_font_families_settings', array(
        'panel'          => 'crater_free_fonts_panel',
        'title'          => __( 'Fonts Families', 'crater-free' ),
    ) );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_headings_font_family',
        'label'       => '',
        'section'     => 'crater_free_font_families_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . __( 'Headings Fonts', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );
    
    // Headings
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'        => 'typography',
        'settings'    => 'cr_heading_fonts_settings',
        'section'     => 'crater_free_font_families_settings',
        'default'     => [
            'font-family'    => 'Roboto',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'h1,h2,h3,h4,h5,h6,.site-title',
            ],
        ],
    ] );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_body_font_family',
        'label'       => '',
        'section'     => 'crater_free_font_families_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . __( 'Body Fonts', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    // Body
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'        => 'typography',
        'settings'    => 'cr_body_fonts_settings',
        'section'     => 'crater_free_font_families_settings',
        'default'     => [
            'font-family'    => 'Roboto',
            'variant'        => 'regular',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'body',
            ],
        ],
    ] );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_menu_font_family',
        'label'       => '',
        'section'     => 'crater_free_font_families_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . __( 'Menu Fonts', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    // Menu
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'        => 'typography',
        'settings'    => 'cr_menu_headings_fonts_settings',
        'section'     => 'crater_free_font_families_settings',
        'default'     => [
            'font-family'    => 'Roboto',
            'variant'        => 'regular',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '#crater-main-menu-wrapper .nav>li>a',
            ],
            [
                'element' => '#crater-main-menu-wrapper .nav>li.dropdown .dropdown-menu li a',
            ],
        ],
    ] );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_sidebar_headings_font_family',
        'label'       => '',
        'section'     => 'crater_free_font_families_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . __( 'Sidebar Headings Fonts', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    // Sidebar Headings
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'        => 'typography',
        'settings'    => 'cr_sidebar_widgets_headings_fonts_settings',
        'section'     => 'crater_free_font_families_settings',
        'default'     => [
            'font-family'    => 'Roboto',
            'variant'        => 'regular',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'aside .widget-title',
            ],
        ],
    ] );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_footer_headings_font_family',
        'label'       => '',
        'section'     => 'crater_free_font_families_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . __( 'Footer Headings Fonts', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    // Footer Headings
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'        => 'typography',
        'settings'    => 'cr_footer_widgets_headings_fonts_settings',
        'section'     => 'crater_free_font_families_settings',
        'default'     => [
            'font-family'    => 'Roboto',
            'variant'        => 'regular',
        ],
        'priority'    => 10,
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => 'footer h4.widget-title',
            ],
        ],
    ] );

    // Font sizes
    CraterFree_Kirki::add_section( 'crater_free_font_sizes_settings', array(
        'panel'          => 'crater_free_fonts_panel',
        'title'          => __( 'Fonts Sizes', 'crater-free' ),
    ) );

    //General
    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_general_font_sizes',
        'label'       => '',
        'section'     => 'crater_free_font_sizes_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . __( 'General', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'slider',
        'settings' => 'cr_body_font_size',
        'label'    => __( 'Body', 'crater-free' ),
        'description'   => __( 'Set body font size (px)', 'crater-free' ),
        'section'  => 'crater_free_font_sizes_settings',
        'default'  => 14,
        'choices'  => [
            'min'  => 5,
            'max'  => 100,
            'step' => 1,
        ],
        'transport'   => 'auto',
        'output'      => array(
            array(
                'element'  => 'body p',
                'property' => 'font-size',
                'units'    => 'px',
            ),
            array(
                'element'  => 'body li',
                'property' => 'font-size',
                'units'    => 'px',
            ),
            array(
                'element'  => 'body li span',
                'property' => 'font-size',
                'units'    => 'px',
            ),
        ),
    ] );

    //Site title and description
    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_site_title_font_size',
        'label'       => '',
        'section'     => 'crater_free_font_sizes_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . __( 'Site Title & Description', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'slider',
        'settings' => 'cr_site_title_font_size',
        'label'    => __( 'Site Title', 'crater-free' ),
        'description'   => __( 'Set site title font size (px)', 'crater-free' ),
        'section'  => 'crater_free_font_sizes_settings',
        'default'  => 18,
        'choices'  => [
            'min'  => 5,
            'max'  => 100,
            'step' => 1,
        ],
        'transport'   => 'auto',
        'output'      => array(
            array(
                'element'  => '.site-title a',
                'property' => 'font-size',
                'units'    => 'px',
            ),
        ),
    ] );

    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'slider',
        'settings' => 'cr_site_desc_font_size',
        'label'    => __( 'Site Description', 'crater-free' ),
        'description'   => __( 'Set site description font size (px)', 'crater-free' ),
        'section'  => 'crater_free_font_sizes_settings',
        'default'  => 10,
        'choices'  => [
            'min'  => 5,
            'max'  => 100,
            'step' => 1,
        ],
        'transport'   => 'auto',
        'output'      => array(
            array(
                'element'  => 'p.site-description',
                'property' => 'font-size',
                'units'    => 'px',
            ),
        ),
    ] );

    //Menu
    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_menu_font_size',
        'label'       => '',
        'section'     => 'crater_free_font_sizes_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . __( 'Menu', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'slider',
        'settings' => 'cr_menu_font_size',
        'label'    => __( 'Menu', 'crater-free' ),
        'description'   => __( 'Set menu font size (px)', 'crater-free' ),
        'section'  => 'crater_free_font_sizes_settings',
        'default'  => 13,
        'choices'  => [
            'min'  => 2,
            'max'  => 100,
            'step' => 1,
        ],
        'transport'   => 'auto',
        'output'      => array(
            array(
                'element'  => '#crater-main-menu-wrapper .nav>li>a',
                'property' => 'font-size',
                'units'    => 'px',
            ),
        ),
    ] );

    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'slider',
        'settings' => 'cr_dropdown_menu_font_size',
        'label'    => __( 'Dropdown Menu', 'crater-free' ),
        'description'   => __( 'Set dropdown menu font size (px)', 'crater-free' ),
        'section'  => 'crater_free_font_sizes_settings',
        'default'  => 13,
        'choices'  => [
            'min'  => 2,
            'max'  => 100,
            'step' => 1,
        ],
        'transport'   => 'auto',
        'output'      => array(
            array(
                'element'  => '#crater-main-menu-wrapper .nav>li.dropdown .dropdown-menu li a',
                'property' => 'font-size',
                'units'    => 'px',
            ),
        ),
    ] );


    //Sidebar
    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_sidebar_font_size',
        'label'       => '',
        'section'     => 'crater_free_font_sizes_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . __( 'Sidebar', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'slider',
        'settings' => 'cr_sidebar_headings_font_size',
        'label'    => __( 'Sidebar Headings', 'crater-free' ),
        'description'   => __( 'Set Sidebar Headings font size (px)', 'crater-free' ),
        'section'  => 'crater_free_font_sizes_settings',
        'default'  => 15,
        'choices'  => [
            'min'  => 2,
            'max'  => 100,
            'step' => 1,
        ],
        'transport'   => 'auto',
        'output'      => array(
            array(
                'element'  => 'aside .widget-title',
                'property' => 'font-size',
                'units'    => 'px',
            ),
        ),
    ] );

    //Footer
    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_footer_font_size',
        'label'       => '',
        'section'     => 'crater_free_font_sizes_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . __( 'Footer', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'slider',
        'settings' => 'cr_footer_headings_font_size',
        'label'    => __( 'Footer Headings', 'crater-free' ),
        'description'   => __( 'Set Footer Headings font size (px)', 'crater-free' ),
        'section'  => 'crater_free_font_sizes_settings',
        'default'  => 15,
        'choices'  => [
            'min'  => 2,
            'max'  => 100,
            'step' => 1,
        ],
        'transport'   => 'auto',
        'output'      => array(
            array(
                'element'  => 'footer h4.widget-title',
                'property' => 'font-size',
                'units'    => 'px',
            ),
        ),
    ] );

    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'slider',
        'settings' => 'cr_footer_text_font_size',
        'label'    => __( 'Footer Text', 'crater-free' ),
        'description'   => __( 'Set Footer content font size (px)', 'crater-free' ),
        'section'  => 'crater_free_font_sizes_settings',
        'default'  => 13,
        'choices'  => [
            'min'  => 2,
            'max'  => 100,
            'step' => 1,
        ],
        'transport'   => 'auto',
        'output'      => array(
            array(
                'element'  => 'footer#footer',
                'property' => 'font-size',
                'units'    => 'px',
            ),
            array(
                'element'  => 'footer .widget-column a',
                'property' => 'font-size',
                'units'    => 'px',
            ),
        ),
    ] );

    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'slider',
        'settings' => 'cr_footer_copyrights_font_size',
        'label'    => __( 'Footer Copyrights', 'crater-free' ),
        'description'   => __( 'Set Footer Copyrights font size (px)', 'crater-free' ),
        'section'  => 'crater_free_font_sizes_settings',
        'default'  => 13,
        'choices'  => [
            'min'  => 2,
            'max'  => 100,
            'step' => 1,
        ],
        'transport'   => 'auto',
        'output'      => array(
            array(
                'element'  => 'footer .copyrights p',
                'property' => 'font-size',
                'units'    => 'px',
            ),
        ),
    ] );


}
endif;

add_action( 'init', 'crater_free_customizer_fonts_register' );