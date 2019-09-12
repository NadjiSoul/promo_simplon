<?php
/**
 * Theme Customizer Controls
 *
 * @package crater-free
 */


if ( ! function_exists( 'crater_free_customizer_blog_register' ) ) :
function crater_free_customizer_blog_register( $wp_customize ) {

    // Blog Settings
    CraterFree_Kirki::add_section( 'crater_free_blog_settings', array(
        'title'          => __( 'Blog Settings', 'crater-free' ),
        'priority'       => 20,
    ) );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_blog_settings',
        'label'       => '',
        'section'     => 'crater_free_blog_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . __( 'Blog', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    // Blog sidebar 
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'radio-buttonset',
        'settings' => 'cr_blog_sidebar',
        'label'    => __( 'Sidebar position:', 'crater-free' ),
        'section'  => 'crater_free_blog_settings',
        'default'  => 'right',
        'choices'     => [
            'left'   => __( 'Left', 'crater-free' ),
            'right' => __( 'Right', 'crater-free' ),
            'none'  => __( 'None', 'crater-free' ),
        ],
    ] ); 

}
endif;

add_action( 'init', 'crater_free_customizer_blog_register' );