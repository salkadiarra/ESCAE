<?php
if (!function_exists('education_method_sidebar_layout')) :
    function education_method_sidebar_layout()
    {
        $education_method_sidebar_layout = array(
            'right-sidebar' => esc_html__('Right Sidebar', 'education-method'),
            'left-sidebar' => esc_html__('Left Sidebar', 'education-method'),
            'no-sidebar' => esc_html__('No Sidebar', 'education-method'),
        );
        return apply_filters('education_method_sidebar_layout', $education_method_sidebar_layout);
    }
endif;

/**
 * Blog/Archive Description Option
 *
 * @since Business agency 1.0.0
 *
 *
 * 
 * @param null
 * @return array $education_method_blog_excerpt
 *
 */
if (!function_exists('education_method_blog_excerpt')) :
    function education_method_blog_excerpt()
    {
        $education_method_blog_excerpt = array(
            'excerpt' => esc_html__('Excerpt', 'education-method'),
            'content' => esc_html__('Content', 'education-method'),

        );
        return apply_filters('education_method_blog_excerpt', $education_method_blog_excerpt);
    }
endif;

/**
 * Show/Hide Feature Image  options
 *
 * @since Business agency 1.0.0
 *
 * @param null
 * @return array $education_method_show_feature_image_option
 *
 */
if (!function_exists('education_method_show_feature_image_option')) :
    function education_method_show_feature_image_option()
    {
        $education_method_show_feature_image_option = array(
            'show' => esc_html__('Show', 'education-method'),
            'hide' => esc_html__('Hide', 'education-method')
        );
        return apply_filters('education_method_show_feature_image_option', $education_method_show_feature_image_option);
    }
endif;
