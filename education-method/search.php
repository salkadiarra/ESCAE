<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bussiness_agency
 */
global $education_method_header_image,$education_method_header_style;
$education_method_header_image = get_header_image();

if( $education_method_header_image ){
    $education_method_header_style = $education_method_header_image;

} else{

    $education_method_header_style = '';
}

$education_method_breadcrump_option = education_method_get_option('education_method_breadcrumb_setting_option');


get_header(); ?>

    <!-- Start inner pager banner page -->
<div id="" class="ample-inner-banner" style="background-image: url(<?php echo esc_url($education_method_header_style); ?>);">

    <div class="container">

    <header class="entry-header">
        <h2 class="entry-title"><?php printf(esc_html__('Search Results for: %s', 'education-method'), '<span>' . get_search_query() . '</span>'); ?></h2>
    </header>
    </div>
    </div>
    <!-- End inner pager banner page -->

    <!-- Start breadcrumb section -->
    <?php
    if ($education_method_breadcrump_option == "enable") {
        ?>
        <div class="breadcrumbs">
            <div class="container">
                <div class="breadcrumb-trail breadcrumbs" arial-label="Breadcrumbs" role="navigation">
                    <ol class="breadcrumb trail-items">
                        <li><?php breadcrumb_trail(); ?></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- End breadcrumb section -->
    <?php } ?>

    <!-- Start innerpage content site -->
    <div id="content" class="site-content single-ample-page">
    <div class="container  clearfix">
    <div class="row">
    <!-- Start primary content area -->
    <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">


    <?php
    if (have_posts()) :
    while (have_posts()) : the_post();

        get_template_part('template-parts/content', 'search');

    endwhile; // End of the loop.
else:
    get_template_part('template-parts/content', 'none');

endif;

?>

    </main><!-- #main -->
    </div><!-- #primary -->
    <aside id="sidebar-primary secondary" class="widget-area sidebar" role="complementary">
        <section class="widget ">
            <?php get_sidebar(); ?>
        </section>
    </aside>


    </div>
    </div>
    </div>
<?php
get_footer();
