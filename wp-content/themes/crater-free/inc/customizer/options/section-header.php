<?php
/**
 * Theme Customizer Controls
 *
 * @package crater-free
 */


if ( ! function_exists( 'crater_free_customizer_header_register' ) ) :
function crater_free_customizer_header_register( $wp_customize ) {


    // Header settings
    CraterFree_Kirki::add_section( 'crater_free_header_settings', array(
        'title'          => __( 'Header Settings', 'crater-free' ),
        'priority'       => 20,
    ) );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_fp_header_settings',
        'label'       => '',
        'section'     => 'crater_free_header_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . __( 'Front Page Header Settings', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    // Header styles
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'radio',
        'settings' => 'cr_header_menu_style',
        'label'    => __( 'Select header style:', 'crater-free' ),
        'section'  => 'crater_free_header_settings',
        'default'  => 'style1',
        'choices'     => [
            'style1'   => __( 'Default', 'crater-free' ),
            'style2' => __( 'Transparent', 'crater-free' ),
        ],
    ] );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_ip_header_settings',
        'label'       => '',
        'section'     => 'crater_free_header_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . __( 'Inner Pages Header Settings', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    // Header styles
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'radio',
        'settings' => 'cr_ip_header_menu_style',
        'label'    => __( 'Select header style:', 'crater-free' ),
        'section'  => 'crater_free_header_settings',
        'default'  => 'style1',
        'choices'     => [
            'style1'   => __( 'Default', 'crater-free' ),
            'style2' => __( 'Transparent', 'crater-free' ),
        ],
    ] );

}
endif;

add_action( 'init', 'crater_free_customizer_header_register' );
