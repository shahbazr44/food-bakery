<?php get_header(); ?>
<?php
if (have_posts()): while ( have_posts()){the_post();
?>
<section class="res-response section-padding-v">
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