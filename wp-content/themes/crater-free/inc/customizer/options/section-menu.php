<?php
/**
 * Theme Customizer Controls
 *
 * @package crater-free
 */


if ( ! function_exists( 'crater_free_customizer_menu_register' ) ) :
function crater_free_customizer_menu_register( $wp_customize ) {


    // Menu settings
    CraterFree_Kirki::add_section( 'crater_free_menu_settings', array(
        'title'          => __( 'Menu Settings', 'crater-free' ),
        'priority'       => 20,
    ) );

    // Set menu padding 
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'slider',
        'settings' => 'cr_menu_pad',
        'label'    => __( 'Menu Padding Value', 'crater-free' ),
        'description'   => __( 'Choose padding value to adjust your menu. This value either increase or decrease the menu height. Default value is 20', 'crater-free' ),
        'section'  => 'crater_free_menu_settings',
        'default'  => 20,
        'choices'  => [
            'min'  => 0,
            'max'  => 100,
            'step' => 1,
        ],
    ] );

    // Set site description Padding
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'slider',
        'settings' => 'cr_site_desc_pad',
        'label'    => __( 'Site Description Padding Value', 'crater-free' ),
        'description'   => __( 'Choose padding value to adjust your site description. Default value is 5', 'crater-free' ),
        'section'  => 'crater_free_menu_settings',
        'default'  => 5,
        'choices'  => [
            'min'  => 0,
            'max'  => 100,
            'step' => 1,
        ],
    ] ); 
    
}
endif;

add_action( 'init', 'crater_free_customizer_menu_register' );