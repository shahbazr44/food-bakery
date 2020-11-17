<?php global
$foodzone_options;
$foot_black='';
$copy_right_titl= isset($foodzone_options['copy_right']) ? $foodzone_options['copy_right'] : esc_html__('Scriptsbundle', 'foodzone');
if(isset($foodzone_options['footer-style']) && $foodzone_options['footer-style']==2){
    $foot_black="res-footer-2";
}
?>
<section class="res-footer <?php echo foodzone_returnEcho($foot_black); ?> ">
    <?php //get_template_part( 'template-parts/footer/footer-1');
    echo foodzone_returnEcho(foodzone_site_footer());

    ?>
    <div class="res-f-bottom">
	<div class="container">
		<div class="row">
			<div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="res-bottom-text text-center">
					<p>Copyright 2020 © Theme Created By <a href="http://elusiveicons.com/icon/ok-sign/"><?php echo foodzone_returnEcho($copy_right_titl); ?></a> All Rights Reserved</p>
				</div>
			</div>
		</div>
	</div>
	  </div>
</section>
<button class="scroll-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></button>
<?php get_template_part( 'template-parts/authorization/password','reset' );  ?>
<?php get_template_part( 'template-parts/dashboard/role/assign','role' );  ?>
<?php get_template_part( 'template-parts/compare/compare','listings' );  ?>
<?php
$rtl = 0;
if ( is_rtl() ){$rtl = 1;}
?>
<input type="hidden" name="is_rtl" value="<?php echo esc_attr($rtl); ?>">
<?php wp_footer(); ?>






</body>
</html>