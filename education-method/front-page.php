<?php
get_header();
$education_method_hide_front_page_content = education_method_get_option('education_method_front_page_hide_option');
if (!is_home()) {
   $education_method_slider_section_option = education_method_get_option('education_method_homepage_slider_option');
    if ($education_method_slider_section_option != 'hide') {

        ?>
        <!-- Start Featured Slider -->
        <div class="features-slider">
            <div id="owl-demo1" class="owl-carousel owl-theme">


                <?php
                $all_slider = wp_kses_post(get_theme_mod('education_method_banner_all_sliders'));
                if (!empty($all_slider)) {
                    $banner_slider = json_decode($all_slider);
                    foreach ($banner_slider as $slider) {
                        $slider_page_id = $slider->selectpage;
                        if (!empty($slider_page_id)) {
                            $slider_page = new WP_Query('page_id=' . $slider_page_id);
                            if ($slider_page->have_posts()) {
                                while ($slider_page->have_posts()) {
                                    $slider_page->the_post();

                                    ?>


                                    <div class="item">


                                        <?php if (has_post_thumbnail()) {
                                            $image_id = get_post_thumbnail_id();
                                            $image_url = wp_get_attachment_image_src($image_id, 'full', true); ?>
                                            <img src="<?php echo esc_url($image_url[0]); ?>" class="img-responsive"
                                                 alt="<?php the_title_attribute(); ?>">
                                        <?php } ?>
                                        <div class="slider-overlay"></div>
                                        <div class="slider-content wow slideInDown text-left" data-wow-duration="2s">
                                            <div class="container">
                                                <h3 class="banner-title"><?php the_title() ?></h3>
                                                <div class="banner-caption">
                                                    <?php
                                                    if (has_excerpt()) {
                                                        the_excerpt();
                                                    } else {
                                                        ?>
                                                        <p> <?php echo esc_html(wp_trim_words(get_the_content(), 10)); ?></p>
                                                        <?php
                                                    } ?></div>
                                                <div class="know-more">
                                                    <a href="<?php the_permalink() ?>"
                                                       class="read-more-background know"><?php esc_html_e('Know More', 'education-method'); ?></a>


                                                    <?php
                                                    if (!empty($slider->button_text)) { ?>
                                                        <a href="<?php echo esc_url($slider->button_url); ?>"
                                                           class="read-more-background"><?php echo esc_html($slider->button_text); ?>
                                                        </a>
                                                    <?php } ?>


                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                <?php }
                                wp_reset_postdata();
                            }
                        }
                    }
                } ?>


            </div>
        </div>
        <?php
    }


    ?>

   
    <!-- Start Home Page widget Area -->
    <div id="home-page-widget-area" class="widget">

        <?php dynamic_sidebar('homepage_widgets'); ?>

    </div>
    <!-- End Home Page widget Area -->


    <?php
}

if ('posts' == get_option('show_on_front')) {

    include(get_home_template());
} else {
    if (1 != $education_method_hide_front_page_content) {
        include(get_page_template());


    }
}
get_footer();
?>

