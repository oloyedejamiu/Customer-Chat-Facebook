<?php

// Load front end css styles & js scripts
function kankozwpfcc_wpfcc_add_scripts(){		
	wp_enqueue_style('kankozwpfcc-main-style',  plugins_url( 'css/styles.css', dirname(__FILE__) ) );
	wp_enqueue_script('kankozwpfcc-main-script',  plugins_url( 'js/main.js', dirname(__FILE__) ) );
}

// Enqueue the script
add_action( 'wp_enqueue_scripts', 'kankozwpfcc_wpfcc_add_scripts' );

// Load backend scripts
function kankozwpfcc_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for the admin page
    if (is_admin()) {
    	wp_enqueue_style( 'wp-color-picker' );
    	wp_enqueue_script( 'kankozwpfcc-script-handle', plugins_url('js/admin-script.js', dirname(__FILE__) ), array( 'wp-color-picker' ), false, true );
    }    
}
add_action( 'admin_enqueue_scripts', 'kankozwpfcc_enqueue_color_picker' );

// Move customer chat to the left
function kankozwpfcc_hook_css() {	
	global $kankozwpfcc_option_global;		
	$kankozwpfcc_movetotheleft = esc_attr($kankozwpfcc_option_global['movetotheleft']);	
	if ( $kankozwpfcc_movetotheleft ) {
    ?>
        <style>            
			#fb-root > div.fb_dialog.fb_dialog_advanced.fb_shrink_active {
			     right: initial !important;
			     left: 18pt;
			     z-index: 9999999 !important;
			  }
			  .fb-customerchat.fb_invisible_flow.fb_iframe_widget iframe {
			     right: initial !important;
			     left: 18pt !important;
			  }			            
        </style>
    <?php
}
}
add_action('wp_head', 'kankozwpfcc_hook_css');