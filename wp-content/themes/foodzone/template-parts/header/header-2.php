<?php

global $foodzone_options;
$logo = isset($foodzone_options['prop_main_logo']['url'])  ?  $foodzone_options['prop_main_logo']['url']  : "";
?>




<?php if(isset($foodzone_options['topbar-switch']) ? $foodzone_options['topbar-switch'] : '' ) { ?>
<section class="res-top-bar">
  <div class="container">
    <div class="row">
      <div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-6">
        <div class="res-top-left">
		 <ul>
			<?php 
                              if(isset($foodzone_options['opt-multi-select']) ? $foodzone_options['opt-multi-select'] : '')
				foreach ($foodzone_options['opt-multi-select'] as $singleValue){
					 $post_thumbnail_id = get_post_thumbnail_id($singleValue);
					 $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
			  ?>
			 
			 <li><a href="<?php the_permalink($singleValue);?>"><?php echo get_the_title($singleValue); ?></a></li>
			 
		   <?php
			 }
			?>	
		 </ul>	 
		  </div>
      </div>
      <div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-6 col-md-6 col-xs-6">
        <div class="res-top-right">
          <ul>
            <li>
              <p><i class="fa fa-map-marker" aria-hidden="true"></i><span><?php echo esc_html__('Location:','foodzone'); ?></span><?php echo $foodzone_options['opt-text-location']; ?></p>
            </li>
            <li>
              <p><i class="fa fa-phone" aria-hidden="true"></i><span><?php echo esc_html__('Call Us:', 'foodzone'); ?></span><?php echo $foodzone_options['opt-text-cell']; ?></p>
            </li>
          </ul>
		  </div>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>

<?php }?>


<div class="res-menu sb-header header-shadow">
  <div class="container"> 
    
    <!-- sb header -->
    <div class="sb-header-container"> 
      <!--Logo-->
      <div class="logo" data-mobile-logo="<?php echo esc_url($logo) ?>" data-sticky-logo="<?php echo esc_url($logo) ?>"> <a href="<?php echo home_url('/') ?>"><img src="<?php echo esc_url($logo) ?>" alt="logo"></a> </div>
      
      <!-- Burger menu -->
      <div class="burger-menu">
        <div class="line-menu line-half first-line"></div>
        <div class="line-menu"></div>
        <div class="line-menu line-half last-line"></div>
      </div>
      
      <!--Navigation menu-->
      <nav class="res-nav sb-menu menu-caret submenu-top-border submenu-scale">
        <ul>
          <li>
            <div class="dropdown"> <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-bars" aria-hidden="true"></i> <?php echo esc_html__('Menu', 'foodzone'); ?> </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
<!--                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>-->

                 <?php echo foodzone_main_menu('main-nav');?>


              </ul>
            </div>
          </li>
          <li class="btn-style"> <a href="#"><i class="fa fa-sign-in"></i>Login</a> </li>
          <li class="hdr-left"> <a href="#" class="btn btn-theme"><i class="fa fa-cutlery" aria-hidden="true"></i><?php echo esc_html__('Restaurant Register', 'foodzone'); ?></a> </li>
          <li class="hover-icons"> <a href="#"><i class="fa fa-facebook"></i></a> </li>
          <li class="hover-icons"> <a href="#"><i class="fa fa-linkedin"></i></a> </li>
          <li class="hover-icons"> <a href="#"> <i class="fa fa-twitter"></i></a> </li>
        </ul>
      </nav>
    </div>
  </div>
</div>









