<?php 

// On activation
function kankozwpfcc_activate() {	
}
register_activation_hook( __FILE__, 'kankozwpfcc_activate' );

// On deactivation
function kankozwpfcc_deactivate() {	
}
register_deactivation_hook( __FILE__, 'kankozwpfcc_deactivate' );



