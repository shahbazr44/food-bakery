<?php get_header(); ?>
<?php
global $foodzone_options;
$social_p='';
$social_position = isset($foodzone_options['social-position']) ? $foodzone_options['social-position'] : 1;
if($social_position==1){
    $social_p="fix-position";
}elseif($social_position==2){
    $social_p="static-position";
}

if (have_posts()): while ( have_posts()){the_post();
?>
<section class="res-response section-padding-v">
    <?php if (isset($foodzone_options['social-switch']) ? $foodzone_options['social-switch'] : '') { ?>
    <div class="res-blog2-socials <?php echo foodzone_returnEcho($social_p); ?>">
        <span><?php echo esc_html__('SHARE', 'foodzone'); ?></span>

        <?php if (function_exists('ADDTOANY_SHARE_SAVE_KIT')) { ?>

            <?php ADDTOANY_SHARE_SAVE_KIT(); ?>

        <?php } ?>
   </div>
    <?php } ?>
    <div class="container">
     <div class="row">
        <?php

                get_template_part( 'template-parts/blog/blog-detial/content', 'area');
                get_template_part( 'template-parts/blog/blog-detial/sidebar', 'blog');

        ?>
        </div>
    </div>
</section>

<?php
}
else:
 get_template_part( 'template-parts/content', 'none' );
endif;
?>
<?php get_footer(); ?>