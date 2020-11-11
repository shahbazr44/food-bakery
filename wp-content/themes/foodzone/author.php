<?php get_header(); ?>
<section class="blog-section-2">
  <div class="container">
    <div class="row">
	<?php
		 global $foodzone_options;
	     $layout = '';
         $layout = isset( $foodzone_options['prop_blog_layout']['enabled']) ? $foodzone_options['prop_blog_layout']['enabled'] : '';
            if ($layout): foreach ($layout as $key=>$value) {
                switch($key) {
                    case 'content': get_template_part( 'template-parts/blog/content', 'area');
                    break;
             
                    case 'sidebar': get_template_part( 'template-parts/blog/sidebar', 'blog' );
                    break;
                }
            }
            else:
                get_template_part( 'template-parts/blog/content', 'area');
                get_template_part( 'template-parts/blog/sidebar', 'blog');
            endif;
        ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>