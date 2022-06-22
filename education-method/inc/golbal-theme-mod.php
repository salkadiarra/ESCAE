<?php
/**
 * Functions for get_theme_mod()
 *
 
 */
if (!function_exists('education_method_get_option')) :

    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function education_method_get_option($key = '')
    {
        if (empty($key)) {
            return;
        }
        $education_method_default_options = education_method_get_default_theme_options();

        $default = (isset($education_method_default_options[$key])) ? $education_method_default_options[$key] : '';

        $theme_option = get_theme_mod($key, $default);

        return $theme_option;

    }

endif;

