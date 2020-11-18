<?php get_header();
global $foodzone_options;
$not_page_imag= get_template_directory_uri().'/libs/images/options/gv.png';
$sub_heading=isset($foodzone_options['sub_not_heading']) ? $foodzone_options['sub_not_heading'] : esc_html__('OOPS!!!', 'foodzone');
$main_heading=isset($foodzone_options['main_not_heading']) ? $foodzone_options['main_not_heading'] : esc_html__('Page Not Be Found','foodzone');
$main_detail=isset($foodzone_options['not_detail']) ? $foodzone_options['not_detail'] : esc_html__('when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five','foodzone');
$button_text=isset($foodzone_options['not_text_button']) ? $foodzone_options['not_text_button'] : esc_html__('Go To Home', 'foodzone');
$button_url=isset($foodzone_options['not_button_link']) ? $foodzone_options['not_button_link'] : esc_url( home_url( '/' ));
$not_img=isset($foodzone_options['not_image']['url']) ? $foodzone_options['not_image']['url'] : $not_page_imag;
$image_id = '';
?>
    <section class="res-404 section-padding-v">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 align-self-center">
                    <div class="res-404-content"> <span><?php echo foodzone_returnEcho($sub_heading); ?></span>
                        <h3><?php echo foodzone_returnEcho($main_heading);  ?></h3>
                        <p><?php echo foodzone_returnEcho($main_detail); ?></p>
                        <a href="<?php echo foodzone_returnEcho($button_url); ?>" class="btn btn-theme"><i class="fa fa-home" aria-hidden="true"></i><?php echo foodzone_returnEcho($button_text); ?></a> </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 ">
                    <div> <img src="<?php echo foodzone_returnEcho($not_img) ?>" alt="<?php echo esc_attr__('Page not Found image', 'foodzone'); ?>" class="img-fluid"> </div>
                </div>
            </div>
        </div>
    </section>



<?php get_footer(); ?>