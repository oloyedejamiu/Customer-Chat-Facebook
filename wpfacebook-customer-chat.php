<?php

/*
Plugin Name:  WP Facebook Customer Chat | KanKoz.com
Plugin URI:   http://bit.ly/customer-chat-documentation
Description:  A simple to use wordpress plugin for integrating & customizing the facebook messenger customer live chat experience for your wordpress website. To configure this plugin, please click on the settings link.
Version:      1.1.1
Author:       Jamiu Oloyede
Author URI:   https://wordpress.org/plugins/customer-chat-facebook
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  kankozwpfcc
Domain Path:  /languages
*/

// Create a helper function for easy SDK access.
function wpfcc_fs() {
    global $wpfcc_fs;

    if ( ! isset( $wpfcc_fs ) ) {
        // Include Freemius SDK.
        require_once dirname(__FILE__) . '/freemius/start.php';

        $wpfcc_fs = fs_dynamic_init( array(
            'id'                  => '2280',
            'slug'                => 'customer-chat-facebook',
            'type'                => 'plugin',
            'public_key'          => 'pk_2aa481f4e92c0012f6b874cec2991',
            'is_premium'          => false,
            'has_addons'          => false,
            'has_paid_plans'      => false,
            'menu'                => array(
                'slug'           => 'kankozwpfcc',
            ),
        ) );
    }

    return $wpfcc_fs;
}

// Init Freemius.
wpfcc_fs();
// Signal that SDK was initiated.
do_action( 'wpfcc_fs_loaded' );

// Exit if this folder is accessed directly
if (!defined('ABSPATH')) {
	exit;
}

$kankozwpfcc_option_global = get_option( 'kankozwpfcc_options');

// Add settings link
function kankoz_wpfcc_add_action_links ( $links ) {
     $mylinks = array(
     '<a href="' . admin_url( 'options-general.php?page=kankozwpfcc' ) . '">Settings</a>',
     '<a href="http://bit.ly/customer-chat-documentation" target="_blank">Docs</a>'
     );
    return array_merge( $links, $mylinks );
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'kankoz_wpfcc_add_action_links' );

// Load scripts
require_once(plugin_dir_path( __FILE__ ) .'includes/wpfacebook-customer-chat-scripts.php');

// Include the settings page
if (is_admin()) {     
    // Load settings if is_admin()
    require_once(plugin_dir_path( __FILE__ ) .'includes/wpfacebook-customer-chat-settings.php');
}

// Include the sdk api
require_once(plugin_dir_path( __FILE__ ) .'includes/wpfacebook-customer-chat-content.php');

// Include plugin activation & deactivation functions 
require_once(plugin_dir_path( __FILE__ ) .'includes/wpfacebook-customer-chat-init.php');


