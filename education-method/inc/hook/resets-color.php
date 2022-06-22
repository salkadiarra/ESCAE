<?php
//=============================================================
// Color reset
//=============================================================
if ( ! function_exists( 'education_method_reset_colors' ) ) :

    function education_method_reset_colors($data) {

        set_theme_mod('education_method_top_header_background_color','#ef4a2b');

        set_theme_mod('education_method_top_footer_background_color','#1A1E21');

        set_theme_mod('education_method_bottom_footer_background_color','#444444');

        set_theme_mod('education_method_primary_color','#ef4a2b');

        set_theme_mod('education_method_color_reset_option','do-not-reset');

    }

endif;
add_action( 'education_method_colors_reset','education_method_reset_colors', 10 );

