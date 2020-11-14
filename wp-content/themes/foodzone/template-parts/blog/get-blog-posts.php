<?php


if (have_posts()) {
    while (have_posts()) {
        the_post();
        $mrt='';
        $get_author_id = get_current_user_id() ? get_current_user_id() : '';
        $get_author_gravatar = get_avatar_url($get_author_id);
        $image_id='';
        if($get_author_gravatar==''){
            $get_author_gravatar = trailingslashit(get_template_directory_uri()).'libs/images/no-user.png';

        }
        ?>

        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-6 grid-item">

            <div <?php post_class() ?> id="post-<?php the_ID(); ?>">

                <div class="res-blog-box">

                    <?php
                    if (has_post_thumbnail()) {
                        $get_author_gravatar = get_avatar_url($get_author_id);
                         
                        if(get_the_post_thumbnail(get_the_ID(), 'foodzone-blog-thumb') !=''){
                        echo '<div class="res-blog-img"><a href="' . esc_url(get_the_permalink(get_the_ID())) . '"> ' . get_the_post_thumbnail(get_the_ID(), 'foodzone-blog-thumb') . '</a></div>';
                        echo '<div class="res-blog-profile"><a href="' . esc_url(get_the_permalink($get_author_id)) . '"> <img src="' . esc_url($get_author_gravatar) . '" alt="'.esc_attr(get_post_meta( $image_id, '_wp_attachment_image_alt', true)).'" class="img-fluid"></a></div>';

                        }
                        ?>  

                    <?php }

                   if(get_the_post_thumbnail(get_the_ID())==''){

                     $mrt="mt-0";
                   }


                    ?>

                    <div class="res-blog-content">
                        <div class="res-blog-content2 <?php echo $mrt; ?>"> <a href="<?php the_permalink(); ?>">
                                <div class="res-blog-style"><?php the_title(); ?></div>
                            </a>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 7); ?></p>
                            <a href="<?php the_permalink(); ?>"><span><?php echo esc_html__('Read More', 'foodzone'); ?><i class="fa fa-long-arrow-right"></i></span></a> </div>
                        <div class="res-blog-detail">
                            <ul>
                                <li> <span><img src="<?php echo trailingslashit(get_template_directory_uri())?>libs/images/time.png ?>" alt="<?php echo esc_attr__('icon','foodzone'); ?>" class="img-fluid"><?php echo $date = date_i18n( 'M j, Y' ); ?></span> </li>
                                <?php if (!post_password_required() && ( comments_open() || '0' != get_comments_number() )) : ?>
                                    <li class="right"> <span><img src="<?php echo trailingslashit(get_template_directory_uri())?>libs/images/cc.png ?>" alt="<?php echo esc_attr__('icon','foodzone') ?>" class="img-fluid"><?php echo foodzone_blogcomments_count(); ?> </span> </li>
                                        <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div> 
    
              

        <?php
    }
} else {
    get_template_part('template-parts/blog/content', 'none');
}
?>