<?php

/* Get BreadCrumb Heading */
if (!function_exists('adforest_bread_crumb_heading')) {

    function adforest_bread_crumb_heading()
    {
        $page_heading = '';
        global $adforest_theme;

        if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) && is_shop()) {
            $page_heading = isset($adforest_theme['shop-number-page-title']) ? $adforest_theme['shop-number-page-title'] : __('Shop', 'adforest');
        } else if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) && is_product()) {
            $page_heading = isset($adforest_theme['shop-single-page-title']) ? $adforest_theme['shop-single-page-title'] : __('Details', 'adforest');
        } else if (is_search()) {
            $string = esc_html__('entire web', 'adforest');
            if (get_search_query() != "") {
                $string = get_search_query();
            }
            $page_heading = sprintf(esc_html__('Search Results for: %s', 'adforest'), esc_html($string));
        } else if (is_category()) {
            $page_heading = esc_html(single_cat_title("", false));
        } else if (is_tag()) {
            $page_heading = esc_html__('Tag: ', 'adforest') . esc_html(single_tag_title("", false));
        } else if (is_404()) {
            $page_heading = esc_html__('Page not found', 'adforest');
        } else if (is_author()) {
            $author_id = get_query_var('author');
            $author = get_user_by('ID', $author_id);
            $page_heading = $author->display_name;
        } else if (is_tax()) {
            $page_heading = esc_html(single_cat_title("", false));
        } else if (is_archive()) {
            $page_heading = __('Blog Archive', 'adforest');
        } else if (is_home()) {
            $page_heading = esc_html__('Latest Stories', 'adforest');
        } else if (is_singular('post')) {
            if (isset($adforest_theme['sb_blog_single_title']) && $adforest_theme['sb_blog_single_title'] != "") {
                $page_heading = $adforest_theme['sb_blog_single_title'];
            } else {
                $page_heading = __('Blog Detail', 'adforest');
            }
        } else if (is_singular('page')) {
            $page_heading = get_the_title();
        } else if (is_singular('ad_post')) {
            if (isset($adforest_theme['sb_single_ad_text']) && $adforest_theme['sb_single_ad_text'] != "")
                $page_heading = $adforest_theme['sb_single_ad_text'];
            else
                $page_heading = __('Ad Detail', 'adforest');
        }

        return $page_heading;
    }

}
// Submit Form Fields
if (!function_exists('foodzone_breadcrumb')) {

    function foodzone_breadcrumb()
    {
        global $foodzone_options;
        $bread_bg = get_template_directory_uri() . '/libs/images/options/bread.png';
        $breads = isset($foodzone_options['bread_back']['url']) ? $foodzone_options['bread_back']['url'] : $bread_bg;

        ?>


        <section class="res-srch-hero res-srch-hero-x" style="background-image: url('<?php echo $breads; ?>')">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-sm-12 col-md-12">
                        <div class="res-blog-grid">
                            <h2><?php echo foodzone_breadcrumb_function(); ?></h2>
                            <a href="<?php echo home_url('/'); ?>"><?php echo esc_html__('Home', 'foodzone'); ?> </a>
                            <a href="javascript:void(0);"> <?php echo foodzone_breadcrumb_function(); ?> </a>
                        </div>
                    </div>
                </div>
        </section>


        <?php


    }
}
// Breadcrumb
if (!function_exists('foodzone_breadcrumb_function')) {

    function foodzone_breadcrumb_function()
    {
        $string = '';

        if (is_category()) {
            $string = esc_html__('Category', 'foodzone');
        } else if (is_singular('property')) {
            $string = esc_html__('Listing Details', 'foodzone');
        } else if (is_single()) {
            $string = esc_html__('Blog Details', 'foodzone');
        } elseif (is_page()) {
            $string = esc_html(get_the_title());
        } elseif (is_tag()) {
            $string = esc_html(single_tag_title("", false));
        } elseif (is_search()) {
            $string = esc_html(get_search_query());
        } elseif (is_404()) {
            $string = esc_html__('Page not Found', 'foodzone');
        } elseif (is_author()) {
            $string .= esc_html__('Author', 'foodzone');
        } else if (is_tax()) {
            $string = esc_html(single_cat_title("", false));
        } elseif (is_archive()) {
            $string = esc_html__('Archive', 'foodzone');
        } else if (is_home()) {
            $string = esc_html__('Blog Grid Page', 'foodzone');
        }
        if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
            if (is_singular('product')) {
                $string = esc_html__('Product Details', 'foodzone');
            } else if (is_cart()) {
                $string = esc_html__('Cart', 'foodzone');
            } else if (is_checkout()) {
                $string = esc_html__('Checkout', 'foodzone');
            } else if (is_product_category()) {
                $string = esc_html(single_cat_title("", false));
            } elseif (is_product_tag()) {
                $string = esc_html(single_tag_title("", false));
            } else if (is_shop()) {
                $string = esc_html__('Shop', 'foodzone');
            }
        }
        return $string;
    }

}

// Pagination
if (!function_exists('foodzone_pagination')) {

    function foodzone_pagination($pages = '', $range = 2)
    {
        global $localization;


        $localization = foodzone_localization();
        if (is_singular())
            return;
        $showitems = '';
        $showitems = ($range * 2) + 1;
        global $paged;
        if (empty($paged))
            $paged = 1;
        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if (!$pages)
                $pages = 1;
        }


        if (1 != $pages) {
            echo '<div class="row">
        	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 margin-bottom-30">
			<nav><ul class="pagination justify-content-start">
			<li class="page-item disabled hidden-md-down d-none d-lg-block"><span class="page-link">' . $localization['page'] . ' ' . $paged . ' ' . $localization['off'] . ' ' . $pages . '</span></li>';
            if (get_previous_posts_link()) {
                get_previous_posts_link();
            }
            for ($i = 1; $i <= $pages; $i++) {
                if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                    echo esc_html(($paged == $i)) ? '<li class="page-item active"><span class="page-link"><span class="sr-only"> ' . esc_html($localization['page']) . ' </span>' . esc_html($i) . '</span></li>' : '<li class="page-item"><a class="page-link" href="' . esc_url(get_pagenum_link($i)) . '"><span class="sr-only">' . esc_html($localization['page']) . ' </span>' . esc_html($i) . '</a></li>';
                }
            }
            echo '</ul></nav>
			</div>
        </div>';
        }
    }

}
// Redirect safe URL
if (!function_exists('foodzone_redirect_url')) {

    function foodzone_redirect_url($url)
    {
        return '<script>window.location = "' . esc_url($url) . '";</script>';
    }

}
// get feature image
if (!function_exists('foodzone_blogfeatured_img')) {

    function foodzone_blogfeatured_img($post_id, $image_size)
    {
        return wp_get_attachment_image_src(get_post_thumbnail_id(esc_html($post_id)), $image_size);
    }

}

// get feature image
if (!function_exists('foodzone_blogcomments_count')) {

    function foodzone_blogcomments_count()
    {
        $num_comments = '';
        if (comments_open()) {
            $num_comments = get_comments_number();
            if ($num_comments == 0) {
                $comments = esc_html__('No Comments', 'foodzone');
            } elseif ($num_comments > 1) {
                $comments = $num_comments . esc_html__(' Comments', 'foodzone');
            } else {
                $comments = esc_html__('1 Comment', 'foodzone');
            }
            return $comments;
        }
    }

}


// Modifying search form
add_filter('get_search_form', 'foodzone_blog_search_form');
if (!function_exists('foodzone_blog_search_form')) {

    function foodzone_blog_search_form($text)
    {
        $text = str_replace('<label>', '<div class="realestate-search-blog"><div class="input-group stylish-input-group">', $text);
        $text = str_replace('</label>', '<span class="input-group-append"><button class="blog-search-btn" type="submit">  <i class="fa fa-search"></i> </button></span></div></div>', $text);
        $text = str_replace('<span class="screen-reader-text">' . esc_html__('Search for:', 'foodzone') . '</span>', '', $text);
        $text = str_replace('class="search-field"', 'class="form-control"', $text);
        return $text;
    }

}
// make URL
if (!function_exists('foodzone_make_link')) {

    function foodzone_make_link($url, $text)
    {
        return wp_kses("<a href='" . esc_url($url) . "' target='_blank'>", foodzone_required_tags()) . $text . wp_kses('</a>', foodzone_required_tags());
    }

}

if (!function_exists('foodzone_timeago')) {

    function foodzone_timeago($comment_id = 0)
    {
        return sprintf(
            _x('%s ago', 'Human-readable time', 'foodzone'), human_time_diff(
                get_comment_date('U', $comment_id), current_time('timestamp')
            )
        );
    }

}
// get user registration date.
if (!function_exists('foodzone_user_timeago')) {

    function foodzone_user_timeago($post_author_id)
    {
        return sprintf(
            _x('%s', 'Human-readable time', 'foodzone'), human_time_diff(
                strtotime(get_userdata($post_author_id)->user_registered), current_time('timestamp')
            )
        );
    }

}
// get post description as per need.
if (!function_exists('foodzone_title_limit')) {

    function foodzone_title_limit($length = 30, $title_id)
    {
        $string = '';
        $mytitle = get_the_title($title_id);
        $contents = strip_tags(html_entity_decode($mytitle, ENT_QUOTES, "UTF-8"));
        $removeSpaces = str_replace(" ", "", $contents);
        $contents = preg_replace("~(?:\[/?)[^/\]]+/?\]~s", '', $contents);
        if (strlen($removeSpaces) > $length) {
            return mb_substr(str_replace("&nbsp;", "", $contents), 0, $length) . '...';
        } else {
            return str_replace("&nbsp;", "", $contents);
        }
    }

}

//Ajax based pagination
if (!function_exists('foodzone_pagination_search')) {

    function foodzone_pagination_search($wp_query, $page = 0)
    {
        if ($wp_query->found_posts > 1) {
            $limit = $total_pages = '';
            $limit = get_option('posts_per_page');
            $total_pages = $wp_query->found_posts;
            $stages = 3;
            $page = $page;
            if ($page) {
                $start = ($page - 1) * $limit;
            } else {
                $start = 0;
            }
            // Initial page num setup
            if ($page == 0) {
                $page = 1;
            }
            $prev = $page - 1;
            $next = $page + 1;

            $lastpage = ceil($total_pages / $limit);
            $LastPagem1 = $lastpage - 1;

            $paginate = '';
            if ($lastpage > 1) {
                $paginate .= ' <ul class="pagination justify-content-start">';
                // Previous
                if ($page > 1) {
                    $paginate .= '<li class="page-item fetch_result" data-page-no="' . $prev . '"><a class="page-link" href="javascript:void(0)">' . esc_html__('Previous', 'foodzone') . '</a></li>';
                } else {

                    $paginate .= '<li class="page-item disabled"><a href="javascript:void(0)" class="page-link" aria-label="' . esc_html__('Previous', 'foodzone') . '"><span aria-hidden="true">' . esc_html__('Previous', 'foodzone') . '</span></a></li>';
                }

                // Pages
                if ($lastpage < 7 + ($stages * 2)) { // Not enough pages to breaking it up
                    for ($counter = 1; $counter <= $lastpage; $counter++) {
                        if ($counter == $page) {
                            $paginate .= '<li class="page-item fetch_result active" data-page-no=' . $counter . '><a href="javascript:void(0)" class="page-link">' . $counter . '</a></li>';
                        } else {
                            $paginate .= '<li class="page-item fetch_result" data-page-no=' . $counter . '><a href="javascript:void(0)" class="page-link">' . $counter . '</a></li>';
                        }
                    }
                } elseif ($lastpage > 5 + ($stages * 2)) { // Enough pages to hide a few?
                    // Beginning only hide later pages
                    if ($page < 1 + ($stages * 2)) {
                        for ($counter = 1; $counter < 4 + ($stages * 2); $counter++) {
                            if ($counter == $page) {
                                $paginate .= '<li class="page-item fetch_result active" data-page-no=' . $counter . '><a href="javascript:void(0)" class="page-link">' . $counter . '</a></li>';
                            } else {
                                $paginate .= '<li class="page-item fetch_result" data-page-no=' . $counter . '><a href="javascript:void(0)" class="page-link">' . $counter . '</a></li>';
                            }
                        }
                        $paginate .= '<li class="page-item disabled"><a href="javascript:void(0)" class="page-link">...</a></li>';
                        $paginate .= '<li class="page-item fetch_result" data-page-no=' . $LastPagem1 . '><a href="javascript:void(0)" class="page-link">' . $LastPagem1 . '</a></li>';
                        $paginate .= '<li class="page-item fetch_result" data-page-no=' . $lastpage . '><a href="javascript:void(0)" class="page-link">' . $lastpage . '</a></li>';
                    } // Middle hide some front and some back
                    elseif ($lastpage - ($stages * 2) > $page && $page > ($stages * 2)) {

                        $paginate .= '<li class="page-item fetch_result" data-page-no="1"><a href="javascript:void(0)" class="page-link">1</a></li>';
                        $paginate .= '<li class="page-item fetch_result" data-page-no="2"><a href="javascript:void(0)" class="page-link">2</a></li>';
                        $paginate .= '<li class="page-item disabled"><a href="javascript:void(0)" class="page-link">...</a></li>';
                        //$paginate.= "...";
                        for ($counter = $page - $stages; $counter <= $page + $stages; $counter++) {
                            if ($counter == $page) {
                                $paginate .= '<li class="page-item fetch_result active" data-page-no=' . $counter . '><a href="javascript:void(0)" class="page-link">' . $counter . '</a></li>';
                            } else {
                                $paginate .= '<li class="page-item fetch_result" data-page-no=' . $counter . '><a href="javascript:void(0)" class="page-link">' . $counter . '</a></li>';
                            }
                        }
                        //$paginate.= "...";
                        $paginate .= '<li class="page-item disabled"><a href="javascript:void(0)" class="page-link">...</a></li>';
                        $paginate .= '<li class="page-item fetch_result" data-page-no=' . $LastPagem1 . '><a href="javascript:void(0)" class="page-link">' . $LastPagem1 . '</a></li>';
                        $paginate .= '<li class="page-item fetch_result" data-page-no=' . $lastpage . '><a href="javascript:void(0)" class="page-link">' . $lastpage . '</a></li>';
                    } // End only hide early pages
                    else {
                        $paginate .= '<li class="page-item fetch_result" data-page-no="1"><a href="javascript:void(0)" class="page-link">1</a></li>';
                        $paginate .= '<li class="page-item fetch_result" data-page-no="2"><a href="javascript:void(0)" class="page-link">2</a></li>';
                        $paginate .= '<li class="page-item disabled"><a href="javascript:void(0)" class="page-link">...</a></li>';
                        for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++) {
                            if ($counter == $page) {
                                $paginate .= '<li class="page-item fetch_result active" data-page-no=' . $counter . '><a class="page-link">' . $counter . '</a></li>';
                            } else {
                                $paginate .= '<li class="page-item fetch_result" data-page-no=' . $counter . '><a class="page-link">' . $counter . '</a></li>';
                            }
                        }
                    }
                }
                // Next
                if ($page < $counter - 1) {
                    $paginate .= '<li class="page-item fetch_result" data-page-no="' . $next . '"><a href="javascript:void(0)" class="page-link" aria-label="' . esc_html__('Next', 'foodzone') . '"><span aria-hidden="true">' . esc_html__('Next', 'foodzone') . ' </span></a></li>';
                } else {
                    $paginate .= '<li class="page-item disabled"><a href="javascript:void(0)" class="page-link" aria-label="' . esc_html__('Next', 'foodzone') . '"><span aria-hidden="true">' . esc_html__('Next', 'foodzone') . '</span></a></li>';
                }
                $paginate .= "</ul>";
            }
            return $paginate;
        }
    }

}

if (!function_exists('foodzone_no_result_found')) {

    function foodzone_no_result_found()
    {
        $image_id = '';
        $img_link = trailingslashit(get_template_directory_uri()) . "libs/images/nothing-found.png";
        return '<img src="' . esc_url($img_link) . '" alt="' . esc_attr(get_post_meta($image_id, '_wp_attachment_image_alt', TRUE)) . '" class="img-fluid">';
    }

}

//Comments Callback
if (!function_exists('foodzone_custom_comments')) {

    function foodzone_custom_comments($comment, $args, $depth)
    {
        $alt = $default = $comment_id = '';
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case 'trackback' :
                ?>

                <p><?php esc_html__('Pingback:', 'foodzone'); ?><?php comment_author_link(); ?><?php edit_comment_link(esc_html__('(Edit)', 'foodzone'), ' '); ?></p>


                <?php
                break;
            default :
                ?>

                <?php
                if ($depth > 1) {
                    echo '<div class="res-blog3-box">';
                } ?>

                <div class="res-blog2-srch-main-co-4">
                    <div class="res-blog2-srch-main-content" <?php comment_class(); ?>
                         id="li-comment-<?php comment_ID(); ?>">

                        <div class="res-blog2-srch-profile">
                            <?php
                            if ($comment->user_id) {
                                echo get_avatar($comment, null, $default, $alt, array('class' => array('img-fluid')));
                            } else {
                                echo get_avatar($comment, 100);
                            }
                            ?>


                        </div>

                        <div class="res-blog2-srch-text">
                            <h3><?php echo get_comment_author_link(); ?></h3>
                            <ul>
                                <li>
                                    <p>
                                        <i class="fa fa-clock-o"></i><?php printf(esc_html('%1$s', 'foodzone'), get_comment_date(), get_comment_time()); ?>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="res-blog2-rep-cont">
                            <p>
                                <i class="fa fa-comment"></i>

                                <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'add_below' => 'li-comment', 'reply_text' => 'Reply')), $comment_id); ?>

                            </p>
                        </div>
                        <div class="re-blog2-conf2">
                            <?php echo comment_text(); ?>
                        </div>

                    </div>

                    <?php
                    if ($depth > 1) {
                        echo '</div>';
                    }
                    ?>
                </div>
                <?php
                break;
        endswitch;
        ?>
        <?php
    }

}


//Return dynamic data
if (!function_exists('foodzone_params')) {

    function foodzone_params($param)
    {
        if (!empty($param)) {
            return $param;
        }
    }

}

//Total Comments Count Received
if (!function_exists('foodzone_received_reviews')) {

    function foodzone_received_reviews($user_id)
    {
        $comments = array();
        $total = '';
        $param = array('status' => 'approve', 'post_type' => 'property', 'post_author__in' => $user_id, 'parent' => 0);
        $comments = get_comments($param);
        if (!empty($comments) && is_array($comments) && count($comments) > 0) {
            $total = count($comments);
        }
        return foodzone_number_format_short($total);
    }

}