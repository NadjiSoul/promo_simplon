<?php
/**
 * Theme Customizer Controls
 *
 * @package crater-free
 */

if ( ! function_exists( 'crater_free_customizer_sticky_header_register' ) ) :
function crater_free_customizer_sticky_header_register( $wp_customize ) {

    // Menu settings
    CraterFree_Kirki::add_section( 'crater_free_sticky_header_settings', array(
        'title'          => __( 'Sticky Header Settings', 'crater-free' ),
        'priority'       => 20,
    ) );


    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_sticky_header',
        'label'       => '',
        'section'     => 'crater_free_sticky_header_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . __( 'Sticky Header', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    // Toggle for sticky header 
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'toggle',
        'settings' => 'cr_sticky_menu',
        'label'    => __( 'Enable Sticky Header Feature:', 'crater-free' ),
        'description'   => __( 'Choose whether to enable a sticky header feature for the site', 'crater-free' ),
        'section'  => 'crater_free_sticky_header_settings',
        'default'  => 0,
    ] );

    // Logo for sticky header
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'image',
        'settings' => 'cr_sticky_logo',
        'label'    => __( 'Logo for Sticky Header', 'crater-free' ),
        'description'   => __( 'Upload logo for Sticky Header. Recommended height is 50px.', 'crater-free' ),
        'section'  => 'crater_free_sticky_header_settings',
        'default'  => '',
    ] );

    // Logo height sticky header
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'slider',
        'settings' => 'cr_sticky_logo_height',
        'label'    => __( 'Sticky Logo Height', 'crater-free' ),
        'description'   => __( 'Increase or decrease logo height. Default height is 50px. Applies only if you upload a logo for sticky header', 'crater-free' ),
        'section'  => 'crater_free_sticky_header_settings',
        'default'  => 50,
        'choices'  => [
            'min'  => 0,
            'max'  => 150,
            'step' => 1,
        ],
    ] );

    // Set menu padding for sticky header
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'slider',
        'settings' => 'cr_sticky_menu_pad',
        'label'    => __( 'Menu Padding Value', 'crater-free' ),
        'description'   => __( 'Choose padding value to adjust your stikcy header menu. This value either increase or decrease the menu height. Default value is 20', 'crater-free' ),
        'section'  => 'crater_free_sticky_header_settings',
        'default'  => 20,
        'choices'  => [
            'min'  => 0,
            'max'  => 100,
            'step' => 1,
        ],
    ] );

}
endif;

add_action( 'init', 'crater_free_customizer_sticky_header_register' );