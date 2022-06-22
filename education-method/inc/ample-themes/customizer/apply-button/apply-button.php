<?php
/**
 * applybutton Info Section
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'education_method_applybutton_info_section',
    array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Apply Button Option', 'education-method'),
    )
);


$wp_customize->add_setting(
    'education_method_button',
    array(
        'default' => $default['education_method_button'],
        'sanitize_callback' => 'wp_kses_post',
    )
);
$wp_customize->add_control(
    'education_method_button',
    array(
        'type' => 'text',
        'label' => esc_html__('Apply Button Text', 'education-method'),
        'section' => 'education_method_applybutton_info_section',
        'priority' => 8
    )
);

/**
 * Field for Get Started button Link
 *
 */
$wp_customize->add_setting(
    'education_method_apply_button_link',
    array(
        'default' => $default['education_method_apply_button_link'],
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'education_method_apply_button_link',
    array(
        'type' => 'url',
        'label' => esc_html__('apply button Text Link', 'education-method'),
        'description' => esc_html__('Use full url link', 'education-method'),
        'section' => 'education_method_applybutton_info_section',
        'priority' => 9
    )
);


