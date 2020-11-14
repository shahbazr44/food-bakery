<?php
    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    // This is your option name where all the Redux data is stored.
    $opt_name = "foodzone_options";
	$sample_patterns = $sampleHTML = '';
    $theme = wp_get_theme(); // For use with some settings. Not necessary.
	$currecnies = array();
	if(in_array('foodzone-framework/index.php', apply_filters('active_plugins', get_option('active_plugins'))))
	{
		$currecnies = foodzone_framework_get_currency();
	}
	
    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        'display_name'         => $theme->get('Name'),
        'display_version'      => $theme->get('Version'),
        'menu_type'            => 'submenu',
        'allow_sub_menu'       => true,
        'menu_title'           => esc_html__( 'Foodzone Options', 'foodzone' ),
        'page_title'           => esc_html__( 'Foodzone Options', 'foodzone' ),
        'google_api_key'       => '',
        'google_update_weekly' => false,
        'async_typography'     => true,
        'admin_bar'            => true,
        'admin_bar_icon'       => 'dashicons-portfolio',
        'admin_bar_priority'   => 50,
        'global_variable'      => '',
        'dev_mode'             => false,
        'update_notice'        => false,
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 600 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );
    Redux::setArgs( $opt_name, $args );
	/* Load Theme Functions */
    Redux::set_Section( $opt_name, array(
        'title'            => esc_html__( 'Theme Settings', 'foodzone' ),
        'id'               => 'theme-settings',
        'desc'             => esc_html__( 'These are really basic fields to setup theme!', 'foodzone' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-wrench'
    ) );

    Redux::set_Section( $opt_name, array(
        'title'            => esc_html__( 'General Settings', 'foodzone' ),
        'id'               => 'general-settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             =>'',
        'fields'           => array(
			array(
                'id'       => 'prop_site_spinner',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Site Preloader', 'foodzone' ),
                'default'  => true,
				'desc'     => esc_html__( 'Trun on or off site loader.', 'foodzone' ),
            ),
			
			array(
              'id' => 'prop_theme_clr',
				'type' => 'color',
				'title' => esc_html__('Theme Main (Primary) Color', 'foodzone'),
				'subtitle' => esc_html__('Theme  main color (default: #2296f9) hover color as well.', 'foodzone'),
				'transparent' => false,
				'default' => '#2296f9',
				'validate' => 'color',
       		 ),
			array(
				'id' => 'prop_btn_plate',
				'type' => 'link_color',
				'title' => esc_html__('Theme Buttons Colors', 'foodzone'),
				'default' => array(
					'regular' => '#2296f9',
					'hover' => '#f71735',
					'active' => '#f71735',
				)
			),	
			array(
                'id'       => 'prop_demo',
                'type'     => 'switch',
                'title'    => esc_html__( 'Demo Mode', 'foodzone' ),
                'default'  => false,
				'desc'     => esc_html__( "Only for demo purpose don't enable on your site.", 'foodzone' ),
            ),
            array(
                'id'       => 'prop_dashboard',
                'type'     => 'switch',
                'title'    => esc_html__( 'Dashboard Menu', 'foodzone' ),
                'default'  => false,
				'desc'     => esc_html__( "Only for demo purpose don't enable on your site.", 'foodzone' ),
            ),
			
        )
    ) );





    Redux::set_Section( $opt_name, array(
        'title'            => esc_html__( 'Main Header Setting', 'foodzone' ),
        'id'               => 'main-head',
        'icon' => 'el el-tasks'
    ));
    //Top bar portion start Here!        
            
            
       Redux::set_Section( $opt_name, array(
        'title'  => esc_html__( 'Top Bar Settings', 'foodzone' ),
        'id'     => 'top-bar',
        'subsection'       => true,
        'icon'   => 'el el-arrow-up',
        'fields' => array(
			
		array(
		'id'       => 'topbar-switch',
		'type'     => 'switch', 
		'title'    => __('Topbar Show/Hide', 'foodzone'),
		'subtitle' => __('', 'foodzone'),
		'default'  => 'true',
			
	       ),

		array(
			'id'       => 'opt-multi-select',
			'type'     => 'select',
			'multi'    => true,
			'title'    => __('Topbar Select Pages', 'foodzone'),
			'subtitle' => __('Select the number of pages', 'foodzone'),
			'desc'     => __('', 'foodzone'),
			'data'     => 'pages', // select pages
			'args'     => array( 'posts_per_page' => -1 ),
			'default'  => '',
			'required' => array(
			 array('topbar-switch', '!=', false),
			)
		),
			

            array(
                'id'       => 'opt-text-location',
                'type'     => 'text',
                'title'    => esc_html__( 'Top bar Location Field', 'foodzone' ),
                'desc'     => esc_html__( '', 'ct-theme' ),
                'subtitle' => esc_html__( 'Please input the Location', 'foodzone' ),
				'placeholder' => 'input your current location',
				array(
                'validate' => 'not_empty'
                ),
				'required' => array(
				 array('topbar-switch', '!=', false),
				),
                
            ),
			
            array(
                'id'       => 'opt-text-cell',
                'type'     => 'text',
                'title'    => esc_html__( 'Top bar Phone Number Field', 'foodzone' ),
                'desc'     => esc_html__( '', 'foodzone' ),
                'subtitle' => esc_html__( 'Please input the Phone Number', 'foodzone' ),
				'placeholder' => 'input your phone number!',
				array(
                'validate' => 'not_empty'
                ),
				'required' => array(
				 array('topbar-switch', '!=', false),
				),
                
            ),
			
        )
    ) );




	/* ------------------ Header  ----------------------- */
		Redux::set_Section( $opt_name, array(
        'title'            => esc_html__( 'Header Settings', 'foodzone' ),
        'id'               => 'real-header',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             =>'',
		'icon' => 'el el-lock',
        'fields'     => array(
		
			array(
                'id'       => 'prop_selected_header',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Header Layout', 'foodzone' ),
                'desc'     => esc_html__( 'Select Header Layout you want to show.', 'foodzone' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_html__('Header Layout 1','foodzone'),
                        'img' => esc_url(trailingslashit( get_template_directory_uri () )) . 'libs/images/options/header1.png'
                    ),
				   '2' => array(
                        'alt' => esc_html__('Header Layout 2','foodzone'),
                        'img' => esc_url(trailingslashit( get_template_directory_uri () )) . 'libs/images/options/header2.png'
                    ),
                ),
                'default'  => '1'
            ),
			array(
                'id'       => 'prop_main_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Logo', 'foodzone' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload main logo of your website.', 'foodzone' ),
				'default'  => array( 'url' => trailingslashit( get_template_directory_uri () ) . 'libs/images/logo.svg' ),
            ),	
            array(
                'id'       => 'prop_trans_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Transparent Logo', 'foodzone' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload transparent logo of your website.', 'foodzone' ),
				'default'  => array( 'url' => trailingslashit( get_template_directory_uri () ) . 'libs/images/logo-white.svg' ),
            ),

			array(
                'id'       => 'prop_mobile_logo',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Small Logo For Mobile Devices', 'foodzone' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Logo that shows at mobile resolution.', 'foodzone' ),
				'default'  => array( 'url' => trailingslashit( get_template_directory_uri () ) . 'libs/images/mobile-logo.png' ),
            ),			
	
			
			array(
				'id'       => 'prop_other_btn',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Search Button', 'foodzone' ),
				'default'  => true,
			),
			array(
				'id' => 'prop_anotherbtn_txt',
				'type' => 'text',
				'title' => esc_html__('Button Text', 'foodzone'),
				'default' => esc_html__( 'Search Properties', 'foodzone' ),
				'required' => array('prop_other_btn', '=', true),
			),
			
			array(
				'id' => 'prop_anotherbtn_page',
				'type' => 'select',
				'data' => 'pages',
				'title' => esc_html__('Select Page Link', 'foodzone'),
				'desc' => esc_html__('Select page you want to show.', 'foodzone'),
				'default' => '#',
				'required' => array('prop_other_btn', '=', true),
           ),
		
		  array(
				'id' => 'prop_callus_txt',
				'type' => 'text',
				'title' => esc_html__('Button Text', 'foodzone'),
				'default' => esc_html__( 'Call us', 'foodzone' ),
				'required' => array('prop_selected_header', '=', '2'),
			),
			array(
				'id' => 'prop_contact_no_txt',
				'type' => 'text',
				'title' => esc_html__('Contact Number/Anything', 'foodzone'),
				'default' => esc_html__( '+92-123-4567', 'foodzone' ),
				'required' => array('prop_selected_header', '=', '2'),
			),
			array(
                'id'       => 'prop_contact_icon',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Icon', 'foodzone' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Icon for text. Recommended size 35x35', 'foodzone' ),
				'default'  => array( 'url' => trailingslashit( get_template_directory_uri () ) . 'libs/images/phoneold.png' ),
				'required' => array('prop_selected_header', '=', '2'),
            ),	
		
		
        )
    ) );


/* ------------------ Breadcrumbs Fields ----------------------- */
		Redux::set_Section( $opt_name, array(
        'title'            => esc_html__( 'Breadcrumbs', 'foodzone' ),
        'id'               => 'prop_breads',
        'subsection'       => true,
        'customizer_width' => '450px',
        'icon' => 'el el-tasks',
        'fields'     => array(
			array(
                'id'       => 'prop_selected_bread',
                'type'     => 'image_select',
                'title'    => esc_html__( 'Breadcrumb Type', 'foodzone' ),
                'desc'     => esc_html__( 'Select breadcrumb Layout you want to show.', 'foodzone' ),
                'options'  => array(
				   'one' => array(
                        'alt' => esc_html__('Classic','foodzone'),
                        'img' => esc_url(trailingslashit( get_template_directory_uri () )) . 'libs/images/options/bread.png'
                    ),
                ),
                'default'  => 'one'
            ),
            array(
                'id'       => 'brop_breadcrumb_img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Breadcrumb Background Image', 'foodzone' ),
                'compiler' => 'true',
				'default'  => array( 'url' => trailingslashit( get_template_directory_uri () ) . 'libs/images/bread2.jpg' ),
                'required' => array('prop_selected_bread', '=', 'two'),
            ),
        )
    ) );





//Top Footer Setting start Here!

        Redux::set_Section( $opt_name, array(
            'title'            => esc_html__( 'Main Footer Setting', 'foodzone' ),
            'id'               => 'main-Footer',
            'icon' => 'el el-tasks'
        ));


        Redux::set_Section( $opt_name, array(
            'title'  => esc_html__( 'Footer Style Setting', 'foodzone' ),
            'id'     => 'footer-style-menu',
            'subsection' => true,
            'icon'   => 'el el-arrow-up',
            'fields' => array(
             array(
                    'id'       => 'footer-style',
                    'type'     => 'image_select',
                    'title'    => esc_html__( 'Chose Footer Style', 'foodzone' ),
                    'desc'     => esc_html__( 'Select Footer Layout you want to show.', 'foodzone' ),
                    'options'  => array(
                        '1' => array(
                            'alt' => esc_html__('Footer Layout 1','foodzone'),
                            'img' => esc_url(trailingslashit( get_template_directory_uri () )) . 'libs/images/options/footer-white.png'
                        ),
                        '2' => array(
                            'alt' => esc_html__('Footer Layout 2','foodzone'),
                            'img' => esc_url(trailingslashit( get_template_directory_uri () )) . 'libs/images/options/footer-black.png'
                        ),
                    ),
                    'default'  => '1'
                     ),
                 )
                ));


            Redux::set_Section( $opt_name, array(
                'title'  => esc_html__( 'Footer Pages Setting', 'foodzone' ),
                'id'     => 'footer-pages-main',
                'subsection' => true,
                'icon'   => 'el el-arrow-up',
                'fields' => array(
                    array(
                        'id' => 'use_full_heading',
                        'type' => 'text',
                        'title' => __( 'Footer Menu Use Full Pages Title' , 'foodzone' ),
                        'desc' => __( 'Please give the Title of the Pages' , 'foodzone' ),
                        'default' => __('Useful Links', 'foodzone')
                    ),
                array(
                    'id'       => 'use_full_links',
                    'type'     => 'select',
                    'multi'    => true,
                    'title'    => __('Footer Select Pages', 'foodzone'),
                    'subtitle' => __('Select the number of pages', 'foodzone'),
                    'desc'     => __('', 'foodzone'),
                    'data'     => 'pages', // select pages
                    'args'     => array( 'posts_per_page' => -1 ),
                    'default'  => '',
                    'required' => array(
                        array('topbar-switch', '!=', false),
                    )
                ),
                    array(
                        'id' => 'news_letter_heading',
                        'type' => 'text',
                        'title' => __( 'Footer News Letter Title' , 'foodzone' ),
                        'desc' => __( 'Please give the Title of the News Letter' , 'foodzone' ),
                        'default' => __('Get Newsletter', 'foodzone')
                    ),
                     array(
                         'id' => 'news_text_area',
                         'type' => 'textarea',
                         'rows' => '3',
                         'title' => __( 'Give short Description about your News Letter' , 'foodzone' ),

                     ),
                    array(
                        'id' => 'news-email-placeholder',
                        'type' => 'text',
                        'title' => __( 'Give the Placeholder Text ' , 'foodzone' ),
                        'placeholder' => __( 'Enter Your Email Address' , 'foodzone' ),
                        'default' => __('Enter your Email Address', 'foodzone')
                    ),
                    array(
                        'id' => 'news-email-button',
                        'type' => 'text',
                        'title' => __( 'Enter the Title of Subscribe button ' , 'foodzone' ),
                        'default' => __('Subscribe', 'foodzone')
                    ),
                    array(
                        'id' => 'social-title',
                        'type' => 'text',
                        'title' => __( 'Enter Social Icon Title ' , 'foodzone' ),
                        'default' => __('Social Links', 'foodzone')
                    )

                )
             ));

            Redux::set_Section( $opt_name, array(
                'title'  => esc_html__( 'All Social Fields', 'foodzone' ),
                'id'     => 'social_link',
                'subsection' => true,
                'icon'   => 'el el-arrow-up',
                'fields' => array(
                    array(
                        'id'      => 'social_media',
                        'type'    => 'sortable',
                        'title'   => esc_html__( 'Social Media', 'carspot' ),
                        'desc'    => esc_html__( 'You can sort it out as you want.', 'carspot' ),
                        'label'   => true,
                        'options' => array(
                            'Facebook'    => '',
                            'Twitter'     => '',
                            'Linkedin'    => '',
                            'Google'      => '',
                            'YouTube'     => '',
                            'Vimeo'       => '',
                            'Pinterest'   => '',
                            'Tumblr'      => '',
                            'Instagram'   => '',
                            'Reddit'      => '',
                            'Flickr'      => '',
                            'StumbleUpon' => '',
                            'Delicious'   => '',
                            'dribble'     => '',
                            'behance'     => '',
                            'DeviantART'  => '',
                        ),
                        'default' => array(
                            'Facebook' => '#',
                            'Twitter'  => '#',
                            'Linkedin' => '#',
                            'Google'   => '#',
                            'YouTube'  => '#',
                        ),
                    ),
                )
             ));








Redux::setSection( $opt_name,  array(
    'title' => __('Repeater Field', 'redux-framework-demo' ),
    'icon' => 'el-icon-thumbs-up',
    'fields' => array(
        array(
            'id'             => 'repeater-field-id',
            'type'           => 'repeater',
            'title'          => __( 'Title', 'redux-framework-demo' ),
            'subtitle'       => __( '', 'redux-framework-demo' ),
            'desc'           => __( '', 'redux-framework-demo' ),
            'fields'         => array(
                array(
                    'id'          => 'title_field',
                    'type'        => 'text',
                    'placeholder' => __( 'Title', 'redux-framework-demo' ),
                ),
                array(
                    'id'          => 'text_field',
                    'type'        => 'text',
                    'placeholder' => __( 'Text Field', 'redux-framework-demo' ),
                ),
                array(
                    'id'      => 'select_field',
                    'type'    => 'select',
                    'title'   => __( 'Select Field', 'redux-framework-demo' ),
                    'options' => array(
                        '1'      => __( 'Option 1', 'redux-framework-demo' ),
                        '2'      => __( 'Option 2', 'redux-framework-demo' ),
                        '3'      => __( 'Option 3', 'redux-framework-demo' ),
                    ),
                    'placeholder' => __( 'Listing Field', 'redux-framework-demo' ),
                ),
            )
        )
    )
) );





