<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package foodzone
 */

?>
<div class="col-xl-12 col-lg-12 col-sm-12 col-12">
    <div class="nothing-found">
           <h3><?php echo esc_html__('Sorry!!! No Record Found','foodzone'); ?></h3>
           <?php echo foodzone_no_result_found(); ?>
    </div>
</div>