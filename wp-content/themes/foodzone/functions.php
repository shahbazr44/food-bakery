<?php
/**
 * foodzone functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Foodzone
 */
add_action("after_setup_theme", "foodzone_setup");
if (!function_exists("foodzone_setup")) {    /* Theme Settings */

    function foodzone_setup() {
        /* Theme Settings */
        require trailingslashit(get_template_directory()) . "inc/theme_settings.php";
        /* Custom Navigation Walker */
        require trailingslashit(get_template_directory()) . "inc/nav.php";
        /* Load Redux Options */
        require trailingslashit(get_template_directory()) . "inc/options.php";
        /* Theme localization */
        require trailingslashit(get_template_directory()) . "inc/localization.php";
        /* Theme Functions */
        require trailingslashit(get_template_directory()) . "inc/theme_functions.php";
        /* Theme Utilities */
        require trailingslashit(get_template_directory()) . "inc/theme_utilities.php";
        /* Theme Typo */
        require trailingslashit(get_template_directory()) . "inc/typography.php";
        /* Theme TGM */
        require trailingslashit(get_template_directory()) . "tgm/tgm-init.php";
    }

}
/* ------------------------------------------------ */
/* Enqueue scripts and styles. */
/* ------------------------------------------------ */
add_action("wp_enqueue_scripts", "foodzone_scripts");

function foodzone_scripts() {

    /* Enqueue scripts. */
    //enueue the jquery 
    wp_enqueue_script('jquery',get_template_directory_uri().'/libs/js/jquery.js',false, false, true);
    wp_enqueue_script("sb-menu.js", trailingslashit(get_template_directory_uri()) . "/libs/js/sb-menu.js", false, false, true);
    wp_enqueue_script("popper", trailingslashit(get_template_directory_uri()) ."/libs/js/popper.js", false, false, true);
    wp_enqueue_script("bootstrap.js", trailingslashit(get_template_directory_uri()) . "/libs/js/bootstrap.min.js", false, false, true);
    wp_enqueue_script("select2", trailingslashit(get_template_directory_uri()) . "/libs/js/select2.min.js", false, false, true);
    wp_enqueue_script("YouTubePopUp.jquery", trailingslashit(get_template_directory_uri()) . "/libs/js/YouTubePopUp.jquery.js", false, false, true);
    wp_enqueue_script("owl.carousel.min.js", trailingslashit(get_template_directory_uri()) . "/libs/js/owl.carousel.min.js", false, false, true);
   
  
    
 

    if (is_singular() && comments_open() && ( get_option('thread_comments') == 1)) {
        wp_enqueue_script("comment-reply", "", true);
    }
     wp_enqueue_script("masonry");
    wp_enqueue_script("isotope", trailingslashit(get_template_directory_uri()) . "libs/js/isotope.min.js", false, false, true); // nedd to add js
   
     wp_enqueue_script("foodzone-custom.js", trailingslashit(get_template_directory_uri()) . "/libs/js/custom.js", false, false, true); 
     

    /* ------------------------------------------------ */
    /* Enqueue Google Fonts. */
    /* ------------------------------------------------ */

    if (!function_exists('foodzone_google_fonts')) {

        function foodzone_google_fonts() {
            $fonts_url = '';
            $source_sans = _x('on', 'Lato font: on or off', 'foodzone');
            if ('off' !== $source_sans) {
                $font_families = array();
                if ('off' !== $source_sans) {
                    if (is_rtl()) {
                        $font_families[] = 'Tajawal:400,500,700';
                    } else {
                        $font_families[] = 'Ubuntu:ital,wght@0,300;0,500;0,700;1,300;1,500';
                        $font_families[] = 'Noto+Sans+TC:wght@100;300;400;500';
                    }
                }
                $query_args = array(
                    'family' => urlencode(implode('%7C', $font_families)),
                    'subset' => urlencode('latin,latin-ext'),
                    'display' => urlencode('swap'),
                );
                $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
            }
            return urldecode($fonts_url);
        }

    }

    /* Load the stylesheets. */
    wp_enqueue_style("foodzone-style", get_stylesheet_uri());
    wp_enqueue_style('google-fonts', foodzone_google_fonts(), array(), true);
    wp_enqueue_style("bootstrap", trailingslashit(get_template_directory_uri()) . "libs/css/bootstrap.min.css");
    wp_enqueue_style("foodzone-theme", trailingslashit(get_template_directory_uri()) . "libs/css/theme.css");
    wp_enqueue_style("foodzone-module", trailingslashit(get_template_directory_uri()) . "libs/css/module.css");
    wp_enqueue_style("select2", trailingslashit(get_template_directory_uri()) . "libs/css/select2.min.css");
    wp_enqueue_style("awesome", trailingslashit(get_template_directory_uri()) . "libs/css/awesome.css");
    wp_enqueue_style("YouTubePopUp", trailingslashit(get_template_directory_uri()) . "libs/css/YouTubePopUp.css");
    wp_enqueue_style("carousel", trailingslashit(get_template_directory_uri()) . "libs/css/owl.carousel.min.css");
    wp_enqueue_style("owltheme", trailingslashit(get_template_directory_uri()) . "libs/css/owl.theme.default.min.css");
    wp_enqueue_style("sb-menu", trailingslashit(get_template_directory_uri()) . "libs/css/sb-menu.css");   
    wp_enqueue_style("foodzone-blog", trailingslashit(get_template_directory_uri()) . "libs/css/blog.css");
    wp_enqueue_style("foodzone-responsive", trailingslashit(get_template_directory_uri()) . "libs/css/responsive.css");
}



add_filter( 'comment_form_fields', 'move_comment_field' );
function move_comment_field( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_default_fields', 'tu_comment_form_hide_cookies_consent' );
function tu_comment_form_hide_cookies_consent( $fields ) {
    $fields['cookies'] ="";
    return $fields;
}

// define the comment_form_submit_button callback
function filter_comment_form_submit_button( $submit_button, $args ) {
    // make filter magic happen here...
    $submit_before = '<div class="form-btn-res">';
    $submit_after = '</div>';
    return $submit_before . $submit_button . $submit_after;
};

// add the filter
add_filter( 'comment_form_submit_button', 'filter_comment_form_submit_button', 10, 2 );