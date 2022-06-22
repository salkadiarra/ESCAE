<?php
if (!class_exists('Education_Method_Top_Info_Widget')) {
    class Education_Method_Top_Info_Widget extends WP_Widget
    {

        private function defaults()
        {

            $defaults = array(
                'location_icon' => 'fa-map-marker',
                'address' => '',
                'title1' => 'Location',

                'contact_icon' => 'fa-phone',
                'Phone' => '',
                'title2' => 'Phone',

                'email_icon' => 'fa-envelope',
                'email' => '',
                'title3' => 'Email',

                'hour_icon' => 'fa-clock-o',
                'time' => '',
                'title4' => 'Working Hour',

            );
            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'education_method-top-info-widget',
                esc_html__('EM : Top Info Widget', 'education-method'),
                array('address' => esc_html__('Education top-info Section', 'education-method'))
            );
        }

        public function form($instance)
        {
            $instance = wp_parse_args((array )$instance, $this->defaults());

            $i = 0;


            $title1 = esc_attr($instance['title1']);
            $address = esc_attr($instance['address']);
            $location_icon = esc_attr($instance['location_icon']);

            $title2 = esc_attr($instance['title2']);
            $phone = esc_attr($instance['phone']);
            $contact_icon = esc_attr($instance['contact_icon']);

            $title3 = esc_attr($instance['title3']);
            $email = esc_attr($instance['email']);
            $email_icon = esc_attr($instance['email_icon']);

            $title4 = esc_attr($instance['title4']);
            $time = esc_attr($instance['time']);
            $hour_icon = esc_attr($instance['hour_icon']);

            ?>
            <p>
                
                <strong>
                    <input type="text" name="<?php echo esc_attr($this->get_field_name('location_icon')); ?>"
                           class="widefat"
                           id="<?php echo esc_attr($this->get_field_id('location_icon')); ?>"
                           value="<?php echo  esc_attr( $location_icon); ?>">
                </strong>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title1')); ?>">
                    <?php echo esc_html__('title1 ', 'education-method'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr($this->get_field_name('title1')); ?>"
                       class="widefat"
                       id="<?php echo esc_attr($this->get_field_id('title1')); ?>"
                       value="<?php echo  esc_attr( $title1); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('address')); ?>">
                    <?php echo esc_html__('Adress', 'education-method'); ?>
                </label><br/>
                <input type="text"
                       name="<?php echo esc_attr($this->get_field_name('address')); ?>"
                       class="widefat"
                       id="<?php echo esc_attr($this->get_field_id('address')); ?>"
                       value="<?php echo  esc_attr($address); ?>">
            </p>


            <p>
                <label
                    for="<?php echo esc_attr($this->get_field_id('location_icon')); ?>"><?php echo esc_html__('Location Icon ', 'education-method'); ?>
                </label><br/>
                <small>
                    <?php
                    esc_html_e('Font Awesome Icon Used in Widgets', 'education-method');
                    printf(__('%1$sRefer here%2$s for icon class. For example: %3$sfa-desktop%4$s', 'education-method'), '<br /><a href="' . esc_url('http://fontawesome.io/cheatsheet/') . '" target="_blank">', '</a>', "<code>", "</code>");
                    ?>
                </small>
                <strong>
                    <input type="text" name="<?php echo esc_attr($this->get_field_name('location_icon')); ?>"
                           class="widefat"
                           id="<?php echo esc_attr($this->get_field_id('location_icon')); ?>"
                           value="<?php echo  esc_attr($location_icon); ?>">
                </strong>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title2')); ?>">
                    <?php echo esc_html__('title2', 'education-method'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr($this->get_field_name('title2')); ?>"
                       class="widefat"
                       id="<?php echo esc_attr($this->get_field_id('title2')); ?>"
                       value="<?php echo  esc_attr($title2); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>">
                    <?php echo esc_html__('phone', 'education-method'); ?>
                </label><br/>
                <input type="text"
                       name="<?php echo esc_attr($this->get_field_name('phone')); ?>"
                       class="widefat"
                       id="<?php echo esc_attr($this->get_field_id('phone')); ?>"
                       value="<?php echo  esc_attr($phone); ?>">
            </p>


            <p>
                <label
                    for="<?php echo esc_attr($this->get_field_id('contact_icon')); ?>"><?php echo esc_html__('contact icon ', 'education-method'); ?>
                </label><br/>
                <small>
                    <?php
                    esc_html_e('Font Awesome Icon Used in Widgets', 'education-method');
                    printf(__('%1$sRefer here%2$s for icon class. For example: %3$sfa-desktop%4$s', 'education-method'), '<br /><a href="' . esc_url('http://fontawesome.io/cheatsheet/') . '" target="_blank">', '</a>', "<code>", "</code>");
                    ?>
                </small>
                <strong>
                    <input type="text" name="<?php echo esc_attr($this->get_field_name('contact_icon')); ?>"
                           class="widefat"
                           id="<?php echo esc_attr($this->get_field_id('contact_icon')); ?>"
                           value="<?php echo  esc_attr($contact_icon); ?>">
                </strong>
            </p>


            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title3')); ?>">
                    <?php echo esc_html__('title3', 'education-method'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr($this->get_field_name('title3')); ?>"
                       class="widefat"
                       id="<?php echo esc_attr($this->get_field_id('title3')); ?>"
                       value="<?php echo  esc_attr($title3); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('email')); ?>">
                    <?php echo esc_html__('Email', 'education-method'); ?>
                </label><br/>
                <input type="text"
                       name="<?php echo esc_attr($this->get_field_name('email')); ?>"
                       class="widefat"
                       id="<?php echo esc_attr($this->get_field_id('email')); ?>"
                       value="<?php echo  esc_attr($email); ?>">
            </p>


            <p>
                <label
                    for="<?php echo esc_attr($this->get_field_id('email_icon')); ?>"><?php echo esc_html__('Email Icon ', 'education-method'); ?>
                </label><br/>
                <small>
                    <?php
                    esc_html_e('Font Awesome Icon Used in Widgets', 'education-method');
                    printf(__('%1$sRefer here%2$s for icon class. For example: %3$sfa-desktop%4$s', 'education-method'), '<br /><a href="' . esc_url('http://fontawesome.io/cheatsheet/') . '" target="_blank">', '</a>', "<code>", "</code>");
                    ?>
                </small>
                <strong>
                    <input type="text" name="<?php echo esc_attr($this->get_field_name('email_icon')); ?>"
                           class="widefat"
                           id="<?php echo esc_attr($this->get_field_id('email_icon')); ?>"
                           value="<?php echo  esc_attr($email_icon); ?>">
                </strong>
            </p>



           


            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title4')); ?>">
                    <?php echo esc_html__('title4', 'education-method'); ?>
                </label><br/>
                <input type="text" name="<?php echo esc_attr($this->get_field_name('title4')); ?>"
                       class="widefat"
                       id="<?php echo esc_attr($this->get_field_id('title4')); ?>"
                       value="<?php echo  esc_attr($title4); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('time')); ?>">
                    <?php echo esc_html__('Time', 'education-method'); ?>
                </label><br/>
                <input type="text"
                       name="<?php echo esc_attr($this->get_field_name('time')); ?>"
                       class="widefat"
                       id="<?php echo esc_attr($this->get_field_id('time')); ?>"
                       value="<?php echo  esc_attr($time); ?>">
            </p>


            <p>
                <label
                    for="<?php echo esc_attr($this->get_field_id('hour_icon')); ?>"><?php echo esc_html__('Hour Icon ', 'education-method'); ?>
                </label><br/>
                <small>
                    <?php
                    esc_html_e('Font Awesome Icon Used in Widgets', 'education-method');
                    printf(__('%1$sRefer here%2$s for icon class. For example: %3$sfa-desktop%4$s', 'education-method'), '<br /><a href="' . esc_url('http://fontawesome.io/cheatsheet/') . '" target="_blank">', '</a>', "<code>", "</code>");
                    ?>
                </small>
                <strong>
                    <input type="text" name="<?php echo esc_attr($this->get_field_name('hour_icon')); ?>"
                           class="widefat"
                           id="<?php echo esc_attr($this->get_field_id('hour_icon')); ?>"
                           value="<?php echo  esc_attr($hour_icon); ?>">
                </strong>
            </p>


            <?php
            $i++;

            ?>


            <hr>
            <?php
        }

        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;


            $instance['title1'] = sanitize_text_field($new_instance['title1']);
            $instance['address'] = sanitize_text_field($new_instance['address']);
            $instance['location_icon'] = sanitize_text_field($new_instance['location_icon']);

            $instance['title2'] = sanitize_text_field($new_instance['title2']);
            $instance['phone'] = sanitize_text_field($new_instance['phone']);
            $instance['contact_icon'] = sanitize_text_field($new_instance['contact_icon']);

            $instance['title3'] = sanitize_text_field($new_instance['title3']);
            $instance['email'] = sanitize_text_field($new_instance['email']);
            $instance['email_icon'] = sanitize_text_field($new_instance['email_icon']);

            $instance['title4'] = sanitize_text_field($new_instance['title4']);
            $instance['time'] = sanitize_text_field($new_instance['time']);
            $instance['hour_icon'] = sanitize_text_field($new_instance['hour_icon']);


            return $instance;

        }

        public function widget($args, $instance)
        {
            if (!empty($instance)) {
                $instance = wp_parse_args((array)$instance, $this->defaults());
                echo $args['before_widget'];
                ?>

                <div class="container">
                    <div class="row">
                        <?php


                        $title1 = esc_attr($instance['title1']);
                        $address = esc_attr($instance['address']);
                        $location_icon = esc_attr($instance['location_icon']);


                        $title2 = esc_attr($instance['title2']);
                        $phone = esc_attr($instance['phone']);
                        $contact_icon = esc_attr($instance['contact_icon']);

                        $title3 = esc_attr($instance['title3']);
                        $email = esc_attr($instance['email']);
                        $email_icon = esc_attr($instance['email_icon']);

                        $title4 = esc_attr($instance['title4']);
                        $time = esc_attr($instance['time']);
                        $hour_icon = esc_attr($instance['hour_icon']);


                        ?>

                        <div class="col-xs-12 col-sm-3 info-set" data-wow-duration="2s">
                            <div class="info-icon">
                                <i class="fa <?php echo esc_attr($location_icon); ?>" aria-hidden="true"></i>
                            </div>
                            <div id="text-1" class="widget-area widget-footer-top">

                                <h3 class="footer-top-widget-title"><?php echo esc_html($title1); ?></h3>
                                <h3 class="info-detail"><?php echo esc_html($address); ?></h3>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-3 info-set" data-wow-duration="2s">
                            <div class="info-icon">
                                <i class="fa <?php echo esc_attr($contact_icon); ?>" aria-hidden="true"></i>
                            </div>
                            <div id="text-1" class="widget-area widget-footer-top">

                                <h3 class="footer-top-widget-title"><?php echo esc_html($title2); ?></h3>
                                <h3 class="info-detail"><?php echo esc_html($phone); ?></h3>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-3 info-set" data-wow-duration="2s">
                            <div class="info-icon">
                                <i class="fa <?php echo esc_attr($email_icon); ?>" aria-hidden="true"></i>
                            </div>
                            <div id="text-1" class="widget-area widget-footer-top">

                                <h3 class="footer-top-widget-title"><?php echo esc_html($title3); ?></h3>
                                <h3 class="info-detail"><?php echo esc_html($email); ?></h3>
                            </div>
                        </div>


                        <div class="col-xs-12 col-sm-3 info-set" data-wow-duration="2s">
                            <div class="info-icon">
                                <i class="fa <?php echo esc_attr($hour_icon); ?>" aria-hidden="true"></i>
                            </div>
                            <div id="text-1" class="widget-area widget-footer-top">

                                <h3 class="footer-top-widget-title"><?php echo esc_html($title4); ?></h3>
                                <h3 class="info-detail"><?php echo esc_html( $time); ?></h3>
                            </div>
                        </div>



                        <?php
                        ?>
                    </div>
                </div>


                <?php
                echo $args['after_widget'];
            }

        }

    }
}

add_action('widgets_init', 'education_method_top_info_widget');
function education_method_top_info_widget()
{
    register_widget('Education_Method_top_info_widget');

}
