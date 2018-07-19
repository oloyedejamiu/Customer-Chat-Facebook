<?php 

// Hook up the facebook sdk below the body tag
function kankozwpfcc_code_below_body() {
	global $kankozwpfcc_option_global;	
	$facebook_sdk_url = "https://connect.facebook.net/en_US/sdk.js";
	$kankozwpfcc_pageid = esc_attr($kankozwpfcc_option_global['pageid']);
	$kankozwpfcc_appid = esc_attr($kankozwpfcc_option_global['appid']);
	$kankozwpfcc_enable = esc_attr($kankozwpfcc_option_global['enable']);
	$kankozwpfcc_themecolor  = esc_attr($kankozwpfcc_option_global['themecolor']);
	$kankozwpfcc_loggedingreeting  = esc_attr($kankozwpfcc_option_global['loggedingreeting']);
	$kankozwpfcc_loggedoutgreeting  = esc_attr($kankozwpfcc_option_global['loggedoutgreeting']);	
	
		if ( isset($kankozwpfcc_enable) && !empty($kankozwpfcc_pageid) ) {			
	?>

	<!-- Start of the tracking code for the customer chat -->
	<script>
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId            : '<?php echo $kankozwpfcc_appid; ?>',
	      autoLogAppEvents : true,
	      xfbml            : true,
	      version          : 'v3.0'
	    });
	  };

	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = '<?php echo $facebook_sdk_url; ?>';
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	</script>

	<div class="fb-customerchat"
	 	page_id="<?php echo $kankozwpfcc_pageid; ?>"
	 	theme_color="<?php echo $kankozwpfcc_themecolor; ?>"
	 	logged_in_greeting="<?php echo $kankozwpfcc_loggedingreeting; ?>"
	 	logged_out_greeting="<?php echo $kankozwpfcc_loggedoutgreeting; ?>"
	 	> 
	</div>
	<!-- /end of the tracking code for the customer chat -->

	<?php            	
	}
	}
add_action( 'wp_footer', 'kankozwpfcc_code_below_body' );	