<?php
/**
 * HomePage Settings Panel on customizer
 */
$wp_customize->add_panel(
    'education_method_homepage_settings_panel',
    array(
        'priority' => 5,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__('HomePage Slider Settings', 'education-method'),
    )
);

/*-------------------------------------------------------------------------------------------------*/
/**
 * Slider Section
 *
 */
$wp_customize->add_section(
    'education_method_slider_section',
    array(
        'title' => esc_html__('Slider Section', 'education-method'),
        'panel' => 'education_method_homepage_settings_panel',
        'priority' => 6,
    )
);

/**
 * Show/Hide option for Homepage Slider Section
 *
 */

$wp_customize->add_setting(
    'education_method_homepage_slider_option',
    array(
        'default' => $default['education_method_homepage_slider_option'],
        'sanitize_callback' => 'education_method_sanitize_select',
    )
);
$hide_show_option = education_method_slider_option();
$wp_customize->add_control(
    'education_method_homepage_slider_option',
    array(
        'type' => 'radio',
        'label' => esc_html__('Slider Option', 'education-method'),
        'description' => esc_html__('Show/hide option for homepage Slider Section.', 'education-method'),
        'section' => 'education_method_slider_section',
        'choices' => $hide_show_option,
        'priority' => 7
    )
);


/**
 * List All Pages
 */
$slider_pages = array();
$slider_pages_obj = get_pages();
$slider_pages[''] = esc_html__('Select Page','education-method');
foreach ($slider_pages_obj as $page) {
    $slider_pages[$page->ID] = $page->post_title;
}


/*repeter call */
$wp_customize->add_setting('education_method_banner_all_sliders', array(
    'sanitize_callback' => 'education_method_sanitize_repeater',
    'default' => json_encode(array(
        array(
            'selectpage' => '',//field
            'button_text' => '',
            'button_url' => ''
        )
    ))
));

$wp_customize->add_control(new Education_Method_Repeater_Controler($wp_customize, 'education_method_banner_all_sliders', array(
        'label' =>esc_html__('Slider Settings Area', 'education-method'),
        'section' => 'education_method_slider_section',
        'settings' => 'education_method_banner_all_sliders',
        'education_method_box_label' =>esc_html__('Slider Settings Options', 'education-method'),
        'education_method_box_add_control' =>esc_html__('Add New Slider', 'education-method'),
    ),
        array(
            'selectpage' => array(
                'type' => 'select',
                'label' =>esc_html__('Select Slider Page', 'education-method'),
                'options' => $slider_pages//array
            ),
            'button_text' => array(
                'type' => 'text',
                'label' =>esc_html__('Enter Button Text', 'education-method'),
                'default' => ''
            ),
            'button_url' => array(
                'type' => 'text',
                'label' => esc_html__('Enter Button Url', 'education-method'),
                'default' => ''
            ),

        )
    )
);

	