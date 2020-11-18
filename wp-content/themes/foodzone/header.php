<?php if (!session_id()) {
    session_start();
} else {
} ?>
    <!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <?php wp_head(); ?>
    </head>
<?php

?>
    <body <?php body_class(); ?>>
<?php
echo foodzone_site_spinner();
if (is_page_template('page-signup.php') && foodzone_strings('prop_enable_head_foot') == false || is_page_template('page-signin.php') && foodzone_strings('prop_enable_head_foot') == false) {
} else {
    echo foodzone_site_header();
    echo foodzone_breadcrumb();
    if (wp_basename(is_page_template('page-signup.php')) || wp_basename(is_page_template('page-signin.php')) || wp_basename(is_page_template('page-dashboard.php')) || is_singular('property') && foodzone_strings('prop_lp_style') == 'classic') {
    } else {

    }
}