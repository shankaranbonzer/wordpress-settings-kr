<?php
/*
Plugin Name: Custom Settings
Plugin URI: https://github.com/shankaranbonzer/wordpress
Description: Provide Custom settings for kr
Version: 1.1
Author: Shankaran Patel
Author URI: http://bonzertech.com
License: GPLv2
*/

/**
 *
 * @package 
 * @author Shankaran Patel
 * @since 1.3
 * @version 1.5
 */

/*
 *
 */

add_action( 'init', 'sp_github_plugin_updater' );

function sp_github_plugin_updater() {

    include_once 'updater.php';

    define( 'WP_GITHUB_FORCE_UPDATE', true );

    if ( is_admin() ) { // note the use of is_admin() to double check that this is happening in the admin

        $config = array(
            'slug' => plugin_basename( __FILE__ ),
            'proper_folder_name' => 'custom-settings',
            'api_url' => 'https://api.github.com/repos/shankaranbonzer/wordpress', // the github API url of your github repo
            'raw_url' => 'https://raw.github.com/shankaranbonzer/wordpress/master', // the github raw url of your github repo
            'github_url' => 'https://github.com/shankaranbonzer/wordpress', // the github url of your github repo
            'zip_url' => 'https://github.com/shankaranbonzer/wordpress/zipball/master', // the zip url of the github repo
            'sslverify' => true,
            'requires' => '3.0',
            'tested' => '3.3',
            'readme' => 'README.md',
            'access_token' => '',
        );

        new WP_GitHub_Updater( $config );

    }

}

// admin page
function sp_custom_settings_form()
{
    include('admin/settings.php');
}

// admin menu
function sp_custom_settings_menu()
{
    add_options_page('krCustomSetting', '  Settings', 'manage_options', 'kr-settings', 'sp_custom_settings_form');
}

add_action('admin_menu', 'sp_custom_settings_menu');


// register setting
function sp_custom_settings_settings()
{
    register_setting('wp_sp_settings_group', 'spCustomSettings');
}

add_action('admin_init', 'sp_custom_settings_settings');
