<?php
/**
 * Business agency default theme options.
 *
 * 
 * @subpackage Business agency
 */

if ( !function_exists('education_method_get_default_theme_options' ) ) :

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function education_method_get_default_theme_options()
    {

        $default = array();

        // Homepage Slider Section
        $default['education_method_homepage_slider_option'] = 'hide';
        $default['education_method_slider_cat_id'] = 0;
        $default['education_method_no_of_slider'] = 3;
        $default['education_method_slider_get_started_txt'] = esc_html__('Get Started!', 'education-method');
        $default['education_method_slider_get_started_link'] = '#';

        // footer copyright.
        $default['education_method_copyright'] = esc_html__('Copyright Text', 'education-method');

        // Home Page Top header Info.
        $default['education_method_top_header_section'] = 'hide';
        $default['education_method_notice_title']= esc_html__('Notice', 'education-method');
        $default['education_method_news_cat_id']='';
        $default['education_method_no_of_news']=5;
        $default['education_method_social_link_hide_option'] = 1;

        $default['education_method_button']=esc_html__('Apply Now', 'education-method');
        $default['education_method_apply_button_link']='';

        // Blog.
        $default['education_method_sidebar_layout_option'] = 'right-sidebar';
        $default['education_method_blog_title_option'] = esc_html__('Latest Blog', 'education-method');
        $default['education_method_blog_excerpt_option'] = 'excerpt';
        $default['education_method_description_length_option'] = 40;
        $default['education_method_exclude_cat_blog_archive_option'] = '';
        

        // Details page.
        $default['education_method_show_feature_image_single_option'] = 'show';

        // Color Option.
        $default['education_method_primary_color'] = '#002147';
        $default['education_method_about_us_background_color']='#002147';
        $default['education_method_about_us1_background_color']='#0e478a';
        $default['education_method_top_header_background_color'] = '#002147';
        $default['education_method_top_footer_background_color'] = '#444444';
        $default['education_method_bottom_footer_background_color'] = '#444444';
        $default['education_method_front_page_hide_option'] = 0;
        $default['education_method_breadcrumb_setting_option'] = 'enable';
        $default['education_method_post_search_placeholder_option'] = esc_html__('Search', 'education-method');
        $default['education_method_hide_breadcrumb_front_page_option'] = 0;
        $default['education_method_color_reset_option'] = 'do-not-reset';

        // Pass through filter.
        $default = apply_filters( 'education_method_get_default_theme_options', $default );
        return $default;
    }
endif;
