<?php
/**
 * Theme Customizer Controls
 *
 * @package crater-free
 */


if ( ! function_exists( 'crater_free_customizer_preloader_register' ) ) :
function crater_free_customizer_preloader_register( $wp_customize ) {


    // Preloader Settings
    CraterFree_Kirki::add_section( 'crater_free_preloader_settings', array(
        'title'          => __( 'Preloader Settings', 'crater-free' ),
        'priority'       => 20,
    ) );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_preloader_settings',
        'label'       => '',
        'section'     => 'crater_free_preloader_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . __( 'Enable/Disable Preloader', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    // toggle for preloader 
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'toggle',
        'settings' => 'cr_preloader_display',
        'label'    => __( 'Enable preloader for site:', 'crater-free' ),
        'description'   => __( 'Choose whether to show a preloader before a site opens', 'crater-free' ),
        'section'  => 'crater_free_preloader_settings',
        'default'  => 1,
    ] ); 

}
endif;

add_action( 'init', 'crater_free_customizer_preloader_register' );