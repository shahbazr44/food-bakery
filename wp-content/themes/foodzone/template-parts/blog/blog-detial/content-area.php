<?php
$image_id = '';
$get_author_id = get_current_user_id() ? get_current_user_id() : '';
$get_author_gravatar = get_avatar_url($get_author_id);
?>

<div class="col-xxl-9 col-xl-9 col-md-9 col-lg-9">
    <div class="res-blog2-main-content">
        <div class="res-blog2-socials"><span><?php echo esc_html__('SHARE', 'foodzone'); ?></span>
           
            <?php if (function_exists('ADDTOANY_SHARE_SAVE_KIT')) { ?>

                <?php ADDTOANY_SHARE_SAVE_KIT(); ?>

            <?php } ?>


        </div>
        <div class="res-blog2-banner"><img
                    src="<?php echo trailingslashit(get_template_directory_uri()) ?>libs/images/banner-x.png" alt=""
                    class="img-fluid"></div>
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
                                class="img-fluid"><?php echo $date = date_i18n('M j, Y'); ?></p>
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
                            if (is_plugin_active('post-views-counter/post-views-counter.php')) {
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
                    <h4><?php echo esc_html__('Related tags', 'foodzone');?></h4>
                </div>
                <div class="res-blog2-links">
                    <?php
                      $posttags= get_the_tags();
                      $count=0;
                      $tags='';
                     if(isset($posttags) ? $posttags : ''){
                      foreach ($posttags as $tag){ ?>
                          <a class="<?php if($count==0){echo "tgs-1"; } ?>" href="<?php echo  esc_url(get_tag_link($tag->term_id)); ?> title="<?php echo esc_attr($tag->name); ?>">
                          <?php echo esc_attr($tag->name);?>
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




