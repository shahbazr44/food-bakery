<?php
$pages = '';
global $foodzone_options;
if (!empty($foodzone_options["prop_footer_pages"])) {
    $pages = $foodzone_options["prop_footer_pages"];
}
?>
<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
    <div class="foodzone-footer-widgets top-quick-links">
        <h2><span><?php echo foodzone_strings("prop_footer_link_txt"); ?></span></h2>
        <ul class="list">
            <?php
            if (is_array($pages) && count($pages) > 0) {
                foreach ($pages as $page) {
                    ?>
                    <li><a href="<?php echo esc_url(get_the_permalink($page)); ?>">
                    <i class="fa fa-angle-right"></i><?php echo esc_html(get_the_title($page)); ?></a>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
</div>