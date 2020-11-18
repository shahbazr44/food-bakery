<?php
// Submit Form Fields
// Site Main Logo
if (!function_exists('foodzone_site_logo')) {

    function foodzone_site_logo() {
        $image_id = '';
        $logo = trailingslashit(get_template_directory_uri()) . 'libs/images/logo.svg';
        $is_sticky = trailingslashit(get_template_directory_uri()) . 'libs/images/sticky-logo.png';
        $is_mobile = trailingslashit(get_template_directory_uri()) . 'libs/images/mobile-logo.png';
        global $foodzone_options;
        if (get_post_meta(get_the_ID(), 'show_trans_header', true) != "") {
            $logo = trailingslashit(get_template_directory_uri()) . 'libs/images/logo-white.svg';
            if (isset($foodzone_options["prop_trans_logo"]["url"]) && $foodzone_options["prop_trans_logo"]["url"] != "") {
                $logo = $foodzone_options["prop_trans_logo"]["url"];
            }
        } else {
            if (isset($foodzone_options["prop_main_logo"]["url"]) && $foodzone_options["prop_main_logo"]["url"] != "") {
                $logo = $foodzone_options["prop_main_logo"]["url"];
            }
        }

        $stick_logo = $sticky_logo = '';
        if (isset($foodzone_options["prop_sticky_logo"]["url"]) && $foodzone_options["prop_sticky_logo"]["url"] != "") {
            $sticky_logo = $foodzone_options["prop_sticky_logo"]["url"];
            $stick_logo = 'data-sticky-logo="' . $sticky_logo . '"';
        } else {
            $stick_logo = 'data-sticky-logo="' . $is_sticky . '"';
        }
        $is_mobile_logo = $mobile_logo = '';
        if (isset($foodzone_options["prop_mobile_logo"]["url"]) && $foodzone_options["prop_mobile_logo"]["url"] != "") {
            $mobile_logo = $foodzone_options["prop_mobile_logo"]["url"];
            $is_mobile_logo = 'data-mobile-logo="' . $mobile_logo . '"';
        } else {
            $is_mobile_logo = 'data-mobile-logo="' . $is_mobile . '"';
        }
        return '<div class="logo" ' . $stick_logo . ' ' . $is_mobile_logo . '>
                <a href="' . esc_url(home_url("/")) . '"><img src="' . esc_url($logo) . '" alt="' . esc_attr(get_post_meta($image_id, '_wp_attachment_image_alt', TRUE)) . '"/></a>
			</div>';
    }

}

// Submit Form Fields
if( !function_exists('foodzone_strings') )
{
    function foodzone_strings($paramz)
	{
		global $foodzone_options;
		if(isset($foodzone_options[$paramz]) &&  $foodzone_options[$paramz] !="")
		{
			return $foodzone_options[$paramz];
		}
		else
		{
			return '';
		}
	}
}

if (!function_exists('foodzone_site_logo_only')) {

    function foodzone_site_logo_only() {
        $image_id = '';
        $logo = trailingslashit(get_template_directory_uri()) . 'libs/images/logo.png';
        global $foodzone_options;
        if (isset($foodzone_options["prop_main_logo"]["url"]) && $foodzone_options["prop_main_logo"]["url"] != "") {
            $logo = $foodzone_options["prop_main_logo"]["url"];
        }
        return '<a href="' . esc_url(home_url("/")) . '"><img class="logo-for-auth img-fluid mb-2 mb-md-2" src="' . esc_url($logo) . '" alt="' . esc_attr(get_post_meta($image_id, '_wp_attachment_image_alt', TRUE)) . '"/></a>';
    }

}

// Site Footer Logo
if (!function_exists('foodzone_site_footer_logo')) {

    function foodzone_site_footer_logo() {
        global $foodzone_options;
        $image_id = '';
        $logo = trailingslashit(get_template_directory_uri()) . 'libs/images/logo-white.svg';
        if (isset($foodzone_options["prop_footer_logo"]["url"]) && $foodzone_options["prop_footer_logo"]["url"] != "") {
            $logo = $foodzone_options["prop_footer_logo"]["url"];
        }
        return '<img src="' . esc_url($logo) . '" alt="' . esc_attr(get_post_meta($image_id, '_wp_attachment_image_alt', TRUE)) . '" class="img-fluid" />';
    }

}




// Site Main Header
if (!function_exists('foodzone_site_header')) {

    function foodzone_site_header() {
        $layout = 2;
        if (foodzone_strings('prop_selected_header') != "") {
            $layout = foodzone_strings('prop_selected_header');
        }
        return get_template_part('template-parts/header/header', $layout);
    }

}

if (!function_exists('foodzone_site_footer')) {

    function foodzone_site_footer() {

        global $foodzone_options;
        $layout    =   isset($foodzone_options ['footer-style'])   ? $foodzone_options ['footer-style']  :  "";


        if ($layout   ==  1) {
          return  get_template_part( 'template-parts/footer/footer-1');

        } elseif($layout == 2) {

            return  get_template_part( 'template-parts/footer/footer-2');

        }

    }

}

// Site Preloader
if (!function_exists('foodzone_site_spinner')) {


    function foodzone_site_spinner() {
        global $foodzone_options;
        $your_loading= trailingslashit(get_template_directory_uri()).'libs/images/options/loading.gif';

        if (isset($foodzone_options['prop_site_spinner']) && $foodzone_options['prop_site_spinner'] == true) {
           // return '<div class="preloader-site"><div class="lds-ripple"><div></div><div></div></div></div>';
            return '<div class="preloader-site"><div class="lds-ripple"><img src="'.$your_loading.'"></div></div>';
        }
    }

}

// Background Src
if (!function_exists('foodzone_bg_src')) {

    function foodzone_bg_src($option_name) {
        $defual_img = trailingslashit(get_template_directory_uri()) . 'libs/images/defualt-935x754.png';
        global $foodzone_options;
        if (isset($foodzone_options['prop_auth_def_img']["url"]) && $foodzone_options['prop_auth_def_img']["url"] != "") {
            $defual_img = $foodzone_options['prop_auth_def_img']["url"];
        }
        if (isset($foodzone_options[$option_name]["url"]) && $foodzone_options[$option_name]["url"] != "") {
            $defual_img = $foodzone_options[$option_name]["url"];
        }
        return 'style=background-image:url(' . $defual_img . ')';
    }

}

// Footer Copyrights
if (!function_exists('foodzone_footer_copyrights')) {

    function foodzone_footer_copyrights() {
        global $foodzone_options;
        $site_title = get_bloginfo('name');
        $home_link = home_url("/");
        $copyrights_text = '<p> &copy; ' . esc_html__("Copyright", "foodzone") . ' ' . date("Y") . ' | ' . esc_html__("All Rights Reserved", "foodzone") . ' ' . '<a href="' . esc_url($home_link) . '"> | ' . esc_html($site_title) . '</a></p>';
        if (isset($foodzone_options["prop_footer_copyrights"])) {
            $copyrights_text = $foodzone_options["prop_footer_copyrights"];
        }
        return $copyrights_text;
    }

}




//solcial media icon function

if (!function_exists('food_social_icons')) {

    function food_social_icons($social_network) {
        $social_icons = array(
            'Facebook' => 'fa fa-facebook',
            'Twitter' => 'fa fa-twitter ',
            'Linkedin' => 'fa fa-linkedin ',
            'Google' => 'fa fa-google-plus',
            'YouTube' => 'fa fa-youtube-play',
            'Vimeo' => 'fa fa-vimeo ',
            'Pinterest' => 'fa fa-pinterest ',
            'Tumblr' => 'fa fa-tumblr ',
            'Instagram' => 'fa fa-instagram',
            'Reddit' => 'fa fa-reddit ',
            'Flickr' => 'fa fa-flickr ',
            'StumbleUpon' => 'fa fa-stumbleupon',
            'Delicious' => 'fa fa-delicious ',
            'dribble' => 'fa fa-dribbble ',
            'behance' => 'fa fa-behance',
            'DeviantART' => 'fa fa-deviantart',
        );
        return $social_icons[$social_network];
    }

}

if ( ! function_exists( 'foodzone_color_text' ) ) {

    function foodzone_color_text( $str ) {
        preg_match_all( '~<color>([^<]*)</color>~i', $str, $matches );
        $i     = 1;
        $found = array();
        foreach ( $matches as $key => $val ) {
            if ( $i == 2 ) {
                $found = $val;
            }
            $i ++;
        }
        foreach ( $found as $k ) {
            $search  = "<color>" . $k . "</color>";
            $replace = '<span class="theme-color">' . $k . '</span>';
            $str     = str_replace( $search, $replace, $str );
        }

        return $str;
    }

}

//echo funtion for html

function foodzone_returnEcho($html = '')
{
    return $html;
}
