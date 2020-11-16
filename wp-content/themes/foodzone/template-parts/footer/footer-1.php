<?php global $foodzone_options;
$us_links = isset($foodzone_options['use_full_heading']) ? $foodzone_options['use_full_heading'] : '';
$news_title = isset($foodzone_options['news_letter_heading']) ? $foodzone_options['news_letter_heading'] : '';
$news_text = isset($foodzone_options['news_text_area']) ? $foodzone_options['news_text_area'] : '';
$news_input = isset($foodzone_options['news-email-placeholder']) ? $foodzone_options['news-email-placeholder'] : '';
$news_button = isset($foodzone_options['news-email-button']) ? $foodzone_options['news-email-button'] : esc_html__('Subscribe', 'foodzone');
$social_text = isset($foodzone_options['social-title']) ? $foodzone_options['social-title'] : '';
$opening_hour = isset($foodzone_options['opening-hour-title']) ? $foodzone_options['opening-hour-title'] : '';
$schedule = isset($foodzone_options['schedule']) ? $foodzone_options['schedule'] : array();
$dinner_title = isset($foodzone_options['dinner-services-title']) ? $foodzone_options['dinner-services-title'] : '';
$dinner_time = isset($foodzone_options['dinner-schedule']) ? $foodzone_options['dinner-schedule'] : array();


?>
<div class="container">
    <div class="row">
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6">
            <div class="res-f-main section-padding">
                <div class="heading-panel2">
                    <h3><?php echo $us_links; ?></h3>
                </div>
                <?php
                if (isset($foodzone_options['use_full_links']) ? $foodzone_options['use_full_links'] : '')
                    foreach ($foodzone_options['use_full_links'] as $singleValue) {
                        $post_thumbnail_id = get_post_thumbnail_id($singleValue);
                        $post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
                        ?>
                        <a href="<?php the_permalink($singleValue); ?>"><?php echo get_the_title($singleValue); ?></a>
                        <?php
                    }
                ?>


            </div>

        </div>
        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-6">
            <div class="res-f-content2 section-padding px-0 col-lg-10">
                <div class="heading-panel2">
                    <h3><?php echo $news_title; ?></h3>
                    <p><?php echo $news_text; ?></p>
                </div>
                <form>
                    <div class="form-group">
                        <input type="text" placeholder="<?php echo $news_input; ?>" class="form-control">
                        <a href="#" class="btn btn-theme"><?php echo $news_button; ?></a></div>
                </form>
                <div class="res-f-social">
                    <div class="heading-panel2">
                        <h3><?php echo $social_text; ?></h3>
                    </div>
                    <?php
                    if (isset($foodzone_options['social_media']) && $foodzone_options['social_media'] != "") {
                        foreach ($foodzone_options['social_media'] as $index => $val) {
                            ?>
                            <?php
                            if ($val != "") {
                                ?>

                                <a class="<?php echo esc_attr($index); ?>"
                                   href="<?php echo esc_url($val); ?>">
                                    <i class="<?php echo food_social_icons($index); ?>"></i>
                                </a><span><a href="<?php echo esc_url($val); ?>"><?php //echo esc_html( $index ); ?></a></span>

                                <?php
                            }
                        }
                    }
                    ?>


                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="res-f-container">
                <div class="res-f-container-inner">
                    <div class="heading-panel2">
                        <h3><?php echo $opening_hour; ?></h3>
                    </div>
                    <div class="res-f-items">
                        <div class="res-f-icon"><img
                                    src="<?php echo trailingslashit(get_template_directory_uri()) ?>libs/images/clock-x.png ?>"
                                    alt="<?php echo esc_attr__('clock-icon', 'foodzone'); ?>" class="img-fluid"></div>
                        <div class="res-f-detail-2">
                            <?php if (is_array($schedule) && !empty($schedule)) {
                                for ($i = 0; count($schedule) > $i; $i++)
                                    echo '<p>' . foodzone_color_text($schedule[$i]) . '</p>';
                            } ?>
                        </div>
                    </div>
                    <div class="res-f-items">
                        <div class="heading-panel2">
                            <h3><?php echo $dinner_title; ?></h3>
                        </div>
                        <div class="res-f-icon"><img
                                    src="<?php echo trailingslashit(get_template_directory_uri()) ?>libs/images/clock-x.png ?>"
                                    alt="<?php echo esc_attr__('clock-icon', 'foodzone'); ?>" class="img-fluid"></div>
                        <div class="res-f-detail-2">
                            <?php if (is_array($dinner_time) && !empty($dinner_time)) {
                                for ($i = 0; count($dinner_time) > $i; $i++)
                                    echo '<p>' . foodzone_color_text($dinner_time[$i]) . '</p>';
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>