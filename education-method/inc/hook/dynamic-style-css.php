<?php
/**
 * Dynamic css
 *
 * @package Ample Themes
 * @subpackage Business agency
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('education_method_dynamic_css') ):
    function education_method_dynamic_css(){

        $education_method_top_header_color = esc_attr( education_method_get_option('education_method_top_header_background_color') );

        $education_method_top_footer_color = esc_attr( education_method_get_option('education_method_top_footer_background_color') );


        $education_method_primary_color = esc_attr( education_method_get_option('education_method_primary_color') );
        
        $education_method_bottom_footer_color = esc_attr( education_method_get_option('education_method_bottom_footer_background_color') );

        $education_method_about_us = esc_attr( education_method_get_option('education_method_about_us_background_color') );
        $education_method_about_us1 = esc_attr( education_method_get_option('education_method_about_us1_background_color') );


        $custom_css = '';


        /*====================Dynamic Css =====================*/
        $custom_css .= ".top-header{
         background-color: " . $education_method_top_header_color . ";}
    ";

        $custom_css .= ".ample-business-topfooter{
         background-color: " . $education_method_top_footer_color . ";}
    ";

            $custom_css .= ".post-content a.continue-link, .service-icon .fa , h5.clientname,.main-header .site-title a, .leavecomment a,.widget-inner-title a:hover,
             .main-header .site-title a,  .service-icon .fa, .feature-item .feature-item-icon, .widget-inner-title a:hover, .our-team-item-content .team-title:hover, h5.clientname, .view-more, .posted-on a:hover, .posted-by a:hover, .blog-details .entry-header .entry-title a:hover, .leavecomment a,  .middle-footer .widget-area ul li a:hover, .widget-recentpost ul li a:hover, .widget-archives ul li a:hover, .widget-categories ul li a:hover, article.post .entry-header .entry-title a:hover, article.post .entry-meta .posted-on a:hover, article.post .entry-meta .posted-by a:hover, article.post .entry-meta .category-tag a:hover, .article-readmore:hover, .authur-title a:hover, .contact-page-content ul li .fa, .team-title a, .line > span::before, .entry-content a{
    
           color: " . $education_method_primary_color . ";}
    ";

        $custom_css .= ".post-rating,.line > span, .service-icon div, .widget-ample-business-theme-counter, .portfolioFilter .current, .portfolioFilter a:hover, .paralex-btn:hover, .view-more:hover, .features-slider .owl-theme .owl-controls .owl-page.active span, .widget-ample-business-theme-testimonial .owl-theme .owl-controls .owl-page.active span, .read-more-background, .widget-ample-business-theme-testimonial, .widget-ample-business-theme-meetbutton, .footer-tags a:hover, .ample-inner-banner, .breadcrumbs, .widget-search .search-submit:hover, .posts-navigation .nav-previous, .posts-navigation .nav-next, .pagination-blog .pagination > .active > a, .pagination-blog .pagination > li > a:hover, .scrollup ,.widget_search .search-submit ,posts-navigation .nav-previous,.posts-navigation .nav-next , .wpcf7-form input.wpcf7-submit
    
 {
    
           background-color: " . $education_method_primary_color . ";}
           
    ";
        $custom_css .= ".error404 .content-area .search-form .search-submit  ,.button-course, .read-more-background:hover,a.viewcourse , .blog-event-date{
           background: " . $education_method_primary_color .'!important'. ";}
           
    ";
        $custom_css .= ".error404 .content-area .search-form .search-submit,.nav-previous a, .nav-next a,.nav-previous a:hover,.nav-next a:hover{
           background: " . $education_method_primary_color . ";}
           
    ";
        $custom_css .= ".site-footer.bottom-footer{
           background: " . $education_method_bottom_footer_color . ";}
           
    ";

        $custom_css .= "#home-page-widget-area .old .widget-footer-top{
           background: " . $education_method_about_us  . '!important'. ";}
           
    ";

        $custom_css .=  " #home-page-widget-area .even .widget-footer-top{
           background: " .  $education_method_about_us1  . '!important'. ";}
           
    ";


        /*------------------------------------------------------------------------------------------------- */

        /*custom css*/


        wp_add_inline_style('education-method-style', $custom_css);

    }
endif;
add_action('wp_enqueue_scripts', 'education_method_dynamic_css', 99);