<?php

/**
 * Slider  options
 * @param null
 * @return array $education_method_slider_option
 *
 */
if (!function_exists('education_method_slider_option')) :
    function education_method_slider_option()
    {
        $education_method_slider_option = array(
            'show' => esc_html__('Show', 'education-method'),
            'hide' => esc_html__('Hide', 'education-method')
        );
        return apply_filters('education_method_slider_option', $education_method_slider_option);
    }
endif;