<?php
/**
 * Business agency Header Info Section
 *
 */
$wp_customize->add_section(
    'education_method_top_header_info_section',
    array(
        'priority' => 6,
        'capability' => 'edit_theme_options',
        'title' => esc_html__('Top Header Info', 'education-method'),
    )
);

$wp_customize->add_setting(
    'education_method_top_header_section',
    array(
        'default' => $default['education_method_top_header_section'],
        'sanitize_callback' => 'education_method_sanitize_select',
    )
);

$hide_show_top_header_option = education_method_slider_option();
$wp_customize->add_control(
    'education_method_top_header_section',
    array(
        'type' => 'radio',
        'label' => esc_html__('Top Header Info Option', 'education-method'),
        'description' => esc_html__('Show/hide Option for Top Header Info Section.', 'education-method'),
        'section' => 'education_method_top_header_info_section',
        'choices' => $hide_show_top_header_option,
        'priority' => 5
    )
);




/**
 * Field for breaking
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'education_method_notice',
    array(
        'default' => $default['education_method_notice_title'],
        'sanitize_callback' => 'wp_kses_post',
    )
);
$wp_customize->add_control(
    'education_method_notice',
    array(
        'type' => 'text',
        'label' => esc_html__('Notice Title', 'education-method'),
        'section' => 'education_method_top_header_info_section',
        'priority' => 8
    )
);




/**
 * Dropdown available category for homepage slider
 *
 */


$wp_customize->add_setting(
    'education_method_news_cat_id',
    array(
        'default' => $default['education_method_news_cat_id'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(new Education_Method_Customize_Category_Control(
        $wp_customize,
        'education_method_news_cat_id',
        array(
            'label' => esc_html__('Notice Top Section', 'education-method'),
            'description' => esc_html__('Select Category for top info Section', 'education-method'),
            'section' => 'education_method_top_header_info_section',
            'priority' => 8,

        )
    )
);
/**
 * Field for no of posts to display..
 *
 */
$wp_customize->add_setting(
    'education_method_no_of_news',
    array(
        'default' => $default['education_method_no_of_news'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'education_method_no_of_news',
    array(
        'type' => 'number',
        'label' => esc_html__('No of posts', 'education-method'),
        'section' => 'education_method_top_header_info_section',
        'priority' => 10
    )
);


/**
 *   Show/Hide Social Link
 */
$wp_customize->add_setting(
    'education_method_social_link_hide_option',
    array(
        'default' => $default['education_method_social_link_hide_option'],
        'sanitize_callback' => 'education_method_sanitize_checkbox',
    )
);
$wp_customize->add_control('education_method_social_link_hide_option',
    array(
        'label' => esc_html__('Hide/Show Social Menu', 'education-method'),
        'section' => 'education_method_top_header_info_section',
        'type' => 'checkbox',
        'priority' => 10
    )
);