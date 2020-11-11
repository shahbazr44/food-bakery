<?php

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Foodzone - Real Estate WordPress Theme for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/tgm/class-tgm-plugin-activation.php';
add_action('tgmpa_register', 'foodzone_register_required_plugins');

function foodzone_register_required_plugins() {
    $plugins = array(
        array(
            'name' => esc_html__('Elementor', 'foodzone'),
            'slug' => 'elementor',
            'source' => '',
            'required' => true,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => esc_url('https://downloads.wordpress.org/plugin/elementor.3.0.8.1.zip'
            ),
            'is_callable' => '',
        ),
        array(
            'name' => esc_html__('Redux Framework', 'foodzone'),
            'slug' => 'redux-framework',
            'source' => '',
            'required' => true,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => esc_url('https://downloads.wordpress.org/plugin/redux-framework.4.1.18.zip'
            ),
            'is_callable' => '',
        ),
        array(
            'name' => esc_html__('Woocommerce', 'foodzone'),
            'slug' => 'woocommerce',
            'source' => '',
            'required' => true,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => esc_url('https://downloads.wordpress.org/plugin/woocommerce.4.5.2.zip'),
            'is_callable' => '',
        ),
        array(
            'name' => esc_html__('Foodzone Elementor Widgets', 'foodzone'),
            'slug' => 'foodzone-elementor',
            'source' => get_template_directory() . '/required-plugins/foodzone-elementor.zip',
            'required' => true,
            'version' => '1.0.4',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
            'is_callable' => '',
        ),
        array(
            'name' => esc_html__('Foodzone Framework', 'foodzone'),
            'slug' => 'foodzone-framework',
            'source' => get_template_directory() . '/required-plugins/foodzone-framework.zip',
            'required' => true,
            'version' => '1.0.5',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => '',
            'is_callable' => '',
        ),
        array(
            'name' => esc_html__('Contact Form 7', 'foodzone'),
            'slug' => 'contact-form-7',
            'source' => '',
            'required' => true,
            'version' => '',
            'force_activation' => false,
            'force_deactivation' => false,
            'external_url' => esc_url('https://downloads.wordpress.org/plugin/contact-form-7.5.2.2.zip'),
            'is_callable' => '',
        ),
    );

    $config = array(
        'id' => 'foodzone',
        'default_path' => '',
        'menu' => 'tgmpa-install-plugins',
        'has_notices' => true,
        'dismissable' => false,
        'dismiss_msg' => '',
        'is_automatic' => false,
        'message' => '',
    );
    foodzone_tgmpa($plugins, $config);
}
