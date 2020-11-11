<div class="col-xxl-9 col-xl-9 col-md-7 col-lg-9 col-xs-12 col-sm-12">
     <div class="col-xxl-12 col-xl-12 col-sm-12">
            <div class="res-blog-banner custom-padding"> <img src="<?php echo trailingslashit(get_template_directory_uri())?>libs/images/banner-x.png" alt="" class="img-fluid"> </div>
      </div>
    
      <div class="content-area">
       
            <div  class="grid">
                <div class="row">    
            <?php get_template_part( 'template-parts/blog/get-blog','posts' ); ?> 
                </div>    
            </div>
        
       <?php foodzone_pagination();?>    
    </div>
    
</div>



