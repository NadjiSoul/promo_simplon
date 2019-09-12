<?php
/**
 * Theme Customizer Controls
 *
 * @package crater-free
 */


if ( ! function_exists( 'crater_free_customizer_logo_register' ) ) :
function crater_free_customizer_logo_register( $wp_customize ) {


    // Logo settings
    CraterFree_Kirki::add_section( 'crater_free_logo_settings', array(
        'title'          => __( 'Logo Settings', 'crater-free' ),
        'priority'       => 20,
    ) );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_logo_fp_settings',
        'label'       => '',
        'section'     => 'crater_free_logo_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . __( 'Front Page Logo Settings', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_logo_fp_note_settings',
        'label'       => '',
        'section'     => 'crater_free_logo_settings',
        'default'     => '<p>' . __( 'Note: Front page logo can be set from Site Identity tab of the customizer.', 'crater-free' ) . '</p>',
        'priority'    => 10,
    ) );

    // Set logo padding
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'slider',
        'settings' => 'cr_logo_pad',
        'label'    => __( 'Logo Padding Value', 'crater-free' ),
        'description'   => __( 'Choose padding value to adjust your logo. Default value is 15', 'crater-free' ),
        'section'  => 'crater_free_logo_settings',
        'default'  => 15,
        'choices'  => [
            'min'  => 0,
            'max'  => 100,
            'step' => 1,
        ],
    ] );

    CraterFree_Kirki::add_field( 'crater-free', array(
        'type'        => 'custom',
        'settings'    => 'label_logo_ip_settings',
        'label'       => '',
        'section'     => 'crater_free_logo_settings',
        'default'     => '<div style="font-weight:400;background: #fff;color: #555;padding: 5px 0;text-align: center;margin: 20px 0 15px 0;letter-spacing: 3px;">' . __( 'Inner Pages Logo Settings', 'crater-free' ) . '</div>',
        'priority'    => 10,
    ) );

    //Set logo for inner pages
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'image',
        'settings' => 'cr_inner_page_logo',
        'label'    => __( 'Logo for Inner Pages', 'crater-free' ),
        'description'   => __( 'Upload logo for Inner Pages. Recommended height is 65px.', 'crater-free' ),
        'section'  => 'crater_free_logo_settings',
        'default'  => '',
    ] );

    // Set logo padding
    CraterFree_Kirki::add_field( 'crater-free', [
        'type'     => 'slider',
        'settings' => 'cr_ip_logo_pad',
        'label'    => __( 'Logo Padding Value', 'crater-free' ),
        'description'   => __( 'Choose padding value to adjust your logo. Default value is 15', 'crater-free' ),
        'section'  => 'crater_free_logo_settings',
        'default'  => 15,
        'choices'  => [
            'min'  => 0,
            'max'  => 100,
            'step' => 1,
        ],
    ] );

}
endif;

add_action( 'init', 'crater_free_customizer_logo_register' );
