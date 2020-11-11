<?php

 echo '<section class="res-footer"> 
	<div class="res-f-bottom">  
	<div class="container">
		<div class="row">
			<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
				<div class="res-bottom-text">
					<p>Copyright 2020 © Theme Created By <a href="#">Scriptsbundle</a> All Rights Reserved</p>
				</div>
			</div>
			<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6"> 
				<div class="res-f-right">
					<ul>
						<li>
							<a href="#">Privacy Policy</a>
						</li>
						<li>
							<a href="#">Contact Us</a>
						</li>
						<li>
							<a href="#">Blog News</a>
						</li>
						<li>
							<a href="#">About</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	  </div>
</section>';

?>
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