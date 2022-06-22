<?php
if (!class_exists('Education_Method_Course_Widget')) {
    class Education_Method_Course_Widget extends WP_Widget
    {

        private function defaults()
        {

            $defaults = array(

                'resources' => '',
                'image' => '',
                'title' => esc_html__('Course', 'education-method'),
                'sub-title' => '',

            );
            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'business_course_widget',
                esc_html__('EM :Course Types Widget', 'education-method'),
                array('description' => esc_html__('Education Course Details Section', 'education-method'))
            );
        }
        public function form( $instance )
        {
            $instance = wp_parse_args( (array ) $instance, $this->defaults() );
            $resources   = ( ! empty( $instance['resources'] ) ) ? $instance['resources'] : array();
            $title = esc_attr($instance['title']);
            $subtitle = esc_attr($instance['sub-title']);


            ?>
            <p>
                <label
                    for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_html_e('Title:', 'education-method'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                       value="<?php echo esc_attr($title); ?>"/>
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('sub-title') ); ?>">
                    <?php esc_html_e( 'Sub Title', 'education-method'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr($this->get_field_name('sub-title')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('sub-title')); ?>" value="<?php echo esc_attr($subtitle); ?>">
            </p>



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
            $instance['title'] = sanitize_text_field($new_instance['title']);
            $instance['sub-title'] = sanitize_text_field($new_instance['sub-title']);

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
                $subtitle = esc_html($instance['sub-title']);
                $title = apply_filters('widget_title', !empty($instance['title']) ? esc_html($instance['title']) : '', $instance, $this->id_base);
                $instance = wp_parse_args((array )$instance, $this->defaults());
                $resources = (!empty($instance['resources'])) ? $instance['resources'] : array();
                echo $args['before_widget'];
                ?>
                <!-- Start Featured Corses Section -->
                <section id="everest-edu-course" class="widget widget-everestedu-featured-course">
                <div class="container">
                <div class="row">
                <div class="main-heading text-center">
                    <h2 class="heading-title"><?php echo esc_html($title) ;?></h2>

                    <div class="heading-line"><div></div></div>
                    <div class="line"><span class="fa fa-graduation-cap"></span></div>
                    <p><?php echo esc_html($subtitle); ?> </p>
                </div>
                <div class="featured-course-section clearfix">
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

                   ?>


                                <div class="featured-course-item">
                                    <div class="featured-course-item-wrapper">
                                        <div class="edugate-layout-2">
                                            <div class="edugate-layout-2-wrapper">
                                                <div class="edugate-content"><a href="<?php the_permalink();?>" class="title"><h3><?php the_title();?></h3></a>


                                                    <div class="description">
                                                        <p><?php echo esc_html(wp_trim_words(get_the_content(), 20)); ?></p>
                                                    </div>
                                                    <a class="viewcourse" href="<?php the_permalink(); ?>"><?php esc_html_e('View Details' , 'education-method');?></a>
                                                </div>
                                                <div class="edugate-image">
                        <?php
                        if (has_post_thumbnail()) {
                            $image_id = get_post_thumbnail_id();
                            $image_url = wp_get_attachment_image_src($image_id, 'large', true);
                            ?>
                                                    <img src="<?php echo esc_url($image_url[0]); ?>" alt="" class="img-responsive">
                        <?php } ?>
                                                </div>
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
                    <div class="clearfix"></div>
                </div>
                </section>

                <?php
                echo $args['after_widget'];
            }
        }

    }
}

add_action('widgets_init', 'Education_Method_Course_widget');
function Education_Method_Course_widget()
{
    register_widget('Education_Method_Course_Widget');

}

