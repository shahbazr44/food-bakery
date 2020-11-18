<?php
global $foodzone_options;
$image_id = '';
$get_author_id = get_current_user_id() ? get_current_user_id() : '';
$get_author_gravatar = get_avatar_url($get_author_id);
$blog_banner = get_template_directory_uri() . '/libs/images/options/bread.png';
$b_banner = isset($foodzone_options['blog_banner_1']['url']) ? $foodzone_options['blog_banner_1']['url'] : $blog_banner;
?>

<div class="col-xxl-9 col-xl-9 col-md-9 col-lg-9">
    <div class="res-blog2-main-content">

        <div class="res-blog2-banner">
            <img src="<?php echo foodzone_returnEcho($b_banner); ?>" alt="<?php echo esc_attr__('banner-image', 'foodzone'); ?>" class="img-fluid">
        </div>
        <div class="res-blog2-main-content">
            <?php echo ' <div class="res-blog2-profile"> <a href="' . esc_url(get_the_permalink($get_author_id)) . '"> <img src="' . esc_url($get_author_gravatar) . '" alt="' . esc_attr(get_post_meta($image_id, '_wp_attachment_image_alt', true)) . '" class="img-fluid"></a> </div>'; ?>

            <div class="res-blog2-text-area"><span><?php echo esc_html__('Lifestyle', 'foodzone') ?></span>
                <a href="<?php the_permalink(); ?>">
                    <h3><?php the_title(); ?></h3>
                </a>
                <ul>
                    <li>
                        <p><img src="<?php echo trailingslashit(get_template_directory_uri()) ?>libs/images/time.png ?>"
                                alt="<?php echo esc_attr__('icon', 'foodzone'); ?>"
                                class="img-fluid"><?php echo  date_i18n('M j, Y'); ?></p>
                    </li>
                    <li>
                        <?php if (!post_password_required() && (comments_open() || '0' != get_comments_number())) : ?>
                            <p>
                                <img src="<?php echo trailingslashit(get_template_directory_uri()) ?>libs/images/cc.png ?>"
                                     alt="<?php echo esc_attr__('icon', 'foodzone') ?>"
                                     class="img-fluid"><?php echo foodzone_blogcomments_count(); ?></p>
                        <?php endif; ?>
                    </li>
                    <li class="post-counters">
                        <div class="main-wrap">
                            <p>
                                <img src="<?php echo trailingslashit(get_template_directory_uri()) ?>libs/images/eye.png ?>"
                                     alt="<?php echo esc_attr__('icon', 'foodzone'); ?>" class="img-fluid"></p>
                            <?php
                            if(class_exists('Post_Views_Counter')){
                                echo do_shortcode('[post-views]');
                            }
                            ?>
                        </div>
                    </li>
                </ul>
            </div>


            <div class="res-blog2-img"><?php echo get_the_post_thumbnail(get_the_ID(), 'foodzone-blog-thumb'); ?>


                <p><?php the_content(); ?></p>
            </div>
            <div class="res-blog2-cmnt">
                <div class="res-blog2-tg">
                    <h4><?php echo esc_html__('Related tags', 'foodzone'); ?></h4>
                </div>
                <div class="res-blog2-links">
                    <?php
                    $posttags = get_the_tags();
                    $count = 0;
                    $tags = '';
                    if (isset($posttags) ? $posttags : '') {
                        foreach ($posttags as $tag) { ?>
                            <a class="<?php if ($count == 0) {
                                echo "tgs-1";
                            } ?>" href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
                            <?php echo foodzone_returnEcho($tag->name); ?>
                            </a>

                            <?php
                            $count++;
                        }

                    }

                    ?>

                </div>
            </div>
        </div>


        <?php comments_template('', true); ?>

    </div>


</div>




