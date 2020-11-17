<?php
global $foodzone_options;
$blog_banner = get_template_directory_uri() . '/libs/images/options/banner-x.png';
$b_banner = isset($foodzone_options['blog_banner_1']['url']) ? $foodzone_options['blog_banner_1']['url'] : $blog_banner;

?>
<div class="col-xxl-9 col-xl-9 col-md-7 col-lg-9 col-xs-12 col-sm-12">

    <div class="col-xxl-12 col-xl-12 col-sm-12">
        <div class="res-blog-banner custom-padding">
            <img src="<?php echo foodzone_returnEcho($b_banner); ?>" alt="<?php echo esc_attr__('banner-image', 'foodzone'); ?>" class="img-fluid">
        </div>
    </div>


    <div class="content-area">

        <div class="grid">
            <div class="row">
                <?php get_template_part('template-parts/blog/get-blog', 'posts'); ?>
            </div>
        </div>

        <?php foodzone_pagination(); ?>
    </div>

</div>



