<?php
if (!class_exists('Education_Method_Details_Widget')) {
    class Education_Method_Details_Widget extends WP_Widget
    {

        private function defaults()
        {

            $defaults = array(

                'resources' => '',
                'image' => '',

            );
            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'Education_Details_widget',
                esc_html__('EM :  About us Widget', 'education-method'),
                array('description' => esc_html__('Education Abouts Section', 'education-method'))
            );
        }
        public function form( $instance )
        {
            $instance = wp_parse_args( (array ) $instance, $this->defaults() );
            $resources   = ( ! empty( $instance['resources'] ) ) ? $instance['resources'] : array();


            ?>


            <span class="at-ample-additional">
            <!--repeater-->
            <label><?php _e( 'Select Pages', 'education-method' ); ?>:</label>
            <br/>
            <small><?php _e( 'Add Page and Remove. Please do not forget to add image on selected pages.', 'education-method' ); ?></small>

                <?php
                if  ( count( $resources ) >=  1 && is_array( $resources ) )
                {

                    $selected = $resources['main'];

                }

                else
                {
                    $selected = "";
                }

                $repeater_id   = $this->get_field_id( 'resources' ).'-main';
                $repeater_name = $this->get_field_name( 'resources'). '[main]';

                $args = array(
                    'selected'          => $selected,
                    'name'              => $repeater_name,
                    'id'                => $repeater_id,
                    'class'             => 'widefat pt-select',
                    'show_option_none'  => __( 'Select Page', 'education-method'),
                    'option_none_value' => 0 // string
                );
                wp_dropdown_pages( $args );
                ?>

                <?php

                $counter = 0;

                if ( count( $resources ) > 0 )
                {
                    foreach( $resources as $resource )
                    {

                        if ( isset( $resource['page_ids'] ) )

                        { ?>
                            <div class="at-ample-sec">

                            <?php

                            $repeater_id     = $this->get_field_id( 'resources' ) .'-'. $counter.'-page_ids';
                            $repeater_name   = $this->get_field_name( 'resources' ) . '['.$counter.'][page_ids]';

                            $args = array(
                                'selected'          => $resource['page_ids'],
                                'name'              => $repeater_name,
                                'id'                => $repeater_id,
                                'class'             => 'widefat pt-select',
                                'show_option_none'  => __( 'Select Page', 'education-method'),
                                'option_none_value' => 0 // string
                            );
                            wp_dropdown_pages( $args );
                            ?>

                        </div>
                            <?php
                            $counter++;
                        }
                    }
                }

                ?>

            </span>
            <a class="at-ample-add button" data-id="education-method_resource_widget" id="<?php echo esc_attr($repeater_id); ?>"><?php _e('Add New Section', 'education-method'); ?></a>

            <hr/>



            <?php
        }
        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance['features_background'] = esc_url_raw($new_instance['features_background']);

            if (isset($new_instance['resources']))
            {
                foreach($new_instance['resources'] as $resource){

                    $resource['page_ids'] = absint($resource['page_ids']);
                }
                $instance['resources'] = $new_instance['resources'];
            }
            return $instance;

        }
        public function widget($args, $instance)
        {

            if (!empty($instance)) {
                $instance = wp_parse_args((array )$instance, $this->defaults());
                $resources = (!empty($instance['resources'])) ? $instance['resources'] : array();
                echo $args['before_widget'];
                ?>
                <div class="container">
                    <div class="row about">
                                <?php if (isset($resources) && !empty($resources['main'])) { ?>
                                    <?php
                                    $post_in = array();

                                    if (count($resources) > 0 && is_array($resources)) {

                                        $post_in[0] = $resources['main'];

                                        foreach ($resources as $our_resource) {

                                            if (isset($our_resource['page_ids']) && !empty($our_resource['page_ids'])) {

                                                $post_in[] = $our_resource['page_ids'];

                                            }
                                        }


                                    }

                                    if (!empty($post_in)) :
                                        $resources_page_args = array(
                                            'post__in' => $post_in,
                                            'orderby' => 'post__in',
                                            'posts_per_page' => count($post_in),
                                            'post_type' => 'page',
                                            'no_found_rows' => true,
                                            'post_status' => 'publish'
                                        );

                                        $resources_query = new WP_Query($resources_page_args);

                                        /*The Loop*/
                                        if ($resources_query->have_posts()):
                                            $i = 1;
                                            while ($resources_query->have_posts()):$resources_query->the_post();

                                             if($i%2==0){?>
                                                 <div class='even'>
                                            <?php }else{?>
                                                <div class='old'>


                                            <?php }
                                                ?>
                                                <div class="col-xs-12 col-sm-4 wow" data-wow-duration="2s">
                                                    <div id="text-1 about " class="widget-area widget-footer-top about">
                                                        <?php
                                                        if (has_post_thumbnail()) {
                                                            $image_id = get_post_thumbnail_id();
                                                            $image_url = wp_get_attachment_image_src($image_id, 'large', true);
                                                            ?>
                                                            <img src="<?php echo esc_url($image_url[0]); ?>"
                                                                 class="img-responsive details">
                                                        <?php } ?>
                                                        <h4 class="footer-top-widget-title"><?php the_title(); ?></h4>
                                                        <p class="whitetext"><?php echo esc_html(wp_trim_words(get_the_content(), 30)); ?></p>
                                                        <div class="button-course">
                                                        <a href="<?php the_permalink();?>" class="continue-link"><?php esc_html_e('Learn More', 'education-method'); ?></a>
                                                            </div>
                                                    </div>
                                                </div>
                                                     </div>

                                                <?php
                                                $i++;
                                            endwhile;
                                        endif;
                                        wp_reset_postdata();
                                    endif;
                                }
                                ?>

                            </div>
                        </div>



                <?php
                echo $args['after_widget'];
            }
        }

    }
}

add_action('widgets_init', 'education_method_details_widget');
function education_method_details_widget()
{
    register_widget('Education_Method_Details_Widget');

}

