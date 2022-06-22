<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bussiness_agency
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class('at-sticky-sidebar'); ?>>

<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text"
       href="#content"><?php esc_html_e('Skip to content', 'education-method') ?></a>
    <a href="#" class="scrollup"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>
    <header id="masthead" class="site-header" role="banner">
        <!-- Start Top header Section -->
        <?php
        /**
         * The template for displaying all pages.
         *
         * This is the template that displays all pages by default.
         * Please note that this is the WordPress construct of pages
         * and that other 'pages' on your WordPress site may use a
         * different template.
         *
         * @link https://codex.wordpress.org/Template_Hierarchy
         *
         * @subpackage Business agency
         */
        // retrieving Customizer Value
        $section_option = education_method_get_option('education_method_top_header_section');
        if ($section_option == 'show') {

            $education_method_news_section_cat_id = education_method_get_option('education_method_news_cat_id');

            $education_method_news_section_number = education_method_get_option('education_method_no_of_news');
            $education_method_news_section_title = education_method_get_option('education_method_notice');

            $social_menu = education_method_get_option('education_method_social_link_hide_option');



            ?>
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                        <?php

                        $education_method_news_category = get_category($education_method_news_section_cat_id);
                        if(!empty($education_method_news_section_cat_id))
                        {

                        if (!empty($education_method_news_section_cat_id)) {
                            $count = $education_method_news_category->category_count;
                            $no_of_news = education_method_get_option('education_method_no_of_news');

                            if ($count > 0 && $no_of_news > 0) {
                                ?>
                                <!-- Start top contact info Section -->


                                <div class="ticker">
                                    <strong><?php echo esc_html($education_method_news_section_title); ?>:</strong>
                                    <ul>
                                        <?php
                                        $i = 0;
                                        if (!empty($education_method_news_section_cat_id)) {
                                        $education_method_home_news_section = array('cat' => $education_method_news_section_cat_id, 'posts_per_page' => $education_method_news_section_number);
                                        $education_method_home_news_section_query = new WP_Query($education_method_home_news_section);
                                        if ($education_method_home_news_section_query->have_posts()) {
                                        while ($education_method_home_news_section_query->have_posts()) {
                                        $education_method_home_news_section_query->the_post();
                                        ?>

                                        <li><?php the_title(); ?></li>
                                            <?php
                                            $i++;
                                        }

                                        }
                                            wp_reset_postdata();
                                        }
                                        ?>


                                    </ul>


                                </div>

                                <?php
                            }


                        }
                        }
                        


                        ?>


                        </div>
                        <!-- End top contact info Section -->


                        <!-- Start top social icon Section -->
                        <div class="col-xs-12 col-sm-6">

                            <div class="header-search">
                                <p class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></p>
                                <?php get_search_form(); ?>
                            </div>

                            <?php
                            if ($social_menu == 1) {
                           
                                ?>
                                <div class="top-header-socialicon">

                                    <?php
                                    if (has_nav_menu('social-link')) {
                                        wp_nav_menu(array('theme_location' => 'social-link', 'menu_class' => 'menu', 'menu_id' => 'menu-social-menu'));

                                    }
                                    ?>

                                </div>

                            <?php } ?>
                        </div>
                        <!-- End top social icon Section -->


                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="top-info-header">
            <div class="container ">
                <div class="row">
                    <div class="top-info">
                        <?php dynamic_sidebar('top-info'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Top header Section -->
        <!-- Start logo and menu Section -->
        <div class="main-header">
            <div class="container">
                <!-- Start Site title Section -->
                <div class="site-branding">
                    <h1 class="site-title">
                        <!-- <img src="images/logo.png" alt=""> -->
                        <?php
                        if (has_custom_logo()) { ?>
                            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                                <?php the_custom_logo(); ?>
                            </a>
                        <?php } else {
                        if (is_front_page() && is_home()) : ?>
                            <h1 class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>"
                                   rel="home"><?php bloginfo('name'); ?></a>
                            </h1>
                        <?php else : ?>
                            <p class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>"
                                   rel="home"><?php bloginfo('name'); ?></a>
                            </p>
                            <?php
                        endif;
                        ?>
                    </h1>
                    <?php
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) : ?>
                        <p class="site-description"><?php echo esc_html($description); /* WPCS: xss ok. */ ?></p>
                        <?php
                    endif;
                    } ?>
                </div>
                <!-- End Site title Section -->
                <!-- Start Menu Section -->
                <div class="menu">
                    <!--<nav id="site-navigation" class="main-navigation" role="navigation"> -->
                    <div class="nav-wrapper">
                        <!-- for toogle menu -->
                        <div class="visible-xs visible-sm  clearfix"><span id="showbutton" class="clearfix"><img
                                    class="img-responsive grow"
                                    src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/button.png"
                                    alt=""/></span>
                        </div>
                        <?php
                        $education_method_apply_button = education_method_get_option('education_method_button');
                        $education_method_apply_link = education_method_get_option('education_method_apply_button_link');
                        if(!empty($education_method_apply_link))

                        {?>
                        <div class="apply-now">
                            <a href="<?php echo esc_url_raw(  $education_method_apply_link); ?>"
                               class="read-more-background"><?php echo  esc_html($education_method_apply_button); ?>
                            </a>

                        </div>
                        <?php } ?>
                        <nav class="column-12 im-hiding">
                            <div class="clearfix">
                                <?php
                                if (has_nav_menu('primary')) {
                                    wp_nav_menu(array(
                                            'theme_location' => 'primary',
                                            'menu_class' => 'main-nav',
                                            'depth' => 4,

                                        )
                                    );
                                }
                                ?>

                        </nav>
                        <!-- / main nav -->

                    </div>
                    <!-- </nav> -->

                </div>
                <!-- End Menu Section -->

            </div>
        </div>
        <!-- End logo and menu Section -->
    </header>