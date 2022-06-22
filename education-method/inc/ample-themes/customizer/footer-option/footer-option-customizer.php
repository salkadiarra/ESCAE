<?php
/**
 * Copyright Info Section
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'education_method_copyright_info_section',
    array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('Footer Option', 'education-method'),
    )
);

/**
 * Field for Copyright
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'education_method_copyright',
    array(
        'default' => $default['education_method_copyright'],
        'sanitize_callback' => 'wp_kses_post',
    )
);
$wp_customize->add_control(
    'education_method_copyright',
    array(
        'type' => 'text',
        'label' => esc_html__('Copyright', 'education-method'),
        'section' => 'education_method_copyright_info_section',
        'priority' => 8
    )
);

