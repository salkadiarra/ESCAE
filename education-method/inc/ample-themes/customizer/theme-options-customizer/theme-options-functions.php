<?php
/**
 * Breadcrumb  display option options
 * @param null
 * @return array $education_method_show_breadcrumb_option
 *
 */
if (!function_exists('education_method_show_breadcrumb_option')) :
    function education_method_show_breadcrumb_option()
    {
        $education_method_show_breadcrumb_option = array(
            'enable' => esc_html__('Enable', 'education-method'),
            'disable' => esc_html__('Disable', 'education-method')
        );
        return apply_filters('education_method_show_breadcrumb_option', $education_method_show_breadcrumb_option);
    }
endif;


/**
 * Reset Option
 *
 *
 * @param null
 * @return array $education_method_reset_option
 *
 */
if (!function_exists('education_method_reset_option')) :
    function education_method_reset_option()
    {
        $education_method_reset_option = array(
            'do-not-reset' => esc_html__('Do Not Reset', 'education-method'),
            'reset-all' => esc_html__('Reset All', 'education-method'),
        );
        return apply_filters('education_method_reset_option', $education_method_reset_option);
    }
endif;



/**
 * Sanitize Multiple Category
 * =====================================
 */

if ( !function_exists('education_method_sanitize_multiple_category') ) :

    function education_method_sanitize_multiple_category( $values )
    {

        $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;

        return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
    }

endif;
