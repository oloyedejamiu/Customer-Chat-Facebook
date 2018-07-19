<?php 

// If uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

// Option name
$option = 'kankozwpfcc_options';

// Delete wpfcc options
delete_option($option);
 
// For site options in Multisite
delete_site_option($option);