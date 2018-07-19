<?php 

/**
 * custom option and settings
 */
function kankozwpfcc_settings_init() {
    // register a new setting for "wporg" page
    register_setting( 'kankozwpfcc', 'kankozwpfcc_options' );

    // register a new section in the "kankozwpfcc" page
    add_settings_section(
    'general_settings_section',
    __( 'General Settings', 'kankozwpfcc' ),
    'kankozwpfcc_section_id_callback',
    'kankozwpfcc'
    );   

    add_settings_field( 
        'enable', 
        __( 'Enable', 'kankozwpfcc' ), 
        'kankozwpfcc_enable_plugin_callback', 
        'kankozwpfcc', 
        'general_settings_section', 
        [ 
        'label_for' => 'enable',
        'class' => 'kankozwpfcc_row',
        'kankozwpfcc_custom_data' => 'custom',
        ] );

    add_settings_field( 
        'pageid', 
        __( 'Facebook Page ID', 'kankozwpfcc' ), 
        'kankozwpfcc_pageid_plugin_callback', 
        'kankozwpfcc', 
        'general_settings_section', 
        [ 
        'label_for' => 'pageid',
        'class' => 'kankozwpfcc_row',
        'kankozwpfcc_custom_data' => 'custom',
        ] );

    add_settings_field( 
        'appid', 
        __( 'Facebook App ID', 'kankozwpfcc' ), 
        'kankozwpfcc_appid_plugin_callback', 
        'kankozwpfcc', 
        'general_settings_section', 
        [ 
        'label_for' => 'appid',
        'class' => 'kankozwpfcc_row',
        'kankozwpfcc_custom_data' => 'custom',
        ] );

    add_settings_field( 
        'themecolor', 
        __( 'Theme Color', 'kankozwpfcc' ), 
        'kankozwpfcc_themecolor_plugin_callback', 
        'kankozwpfcc', 
        'general_settings_section', 
        [ 
        'label_for' => 'themecolor',
        'class' => 'kankozwpfcc_row',
        'kankozwpfcc_custom_data' => 'custom',
        ] );

    add_settings_field( 
        'movetotheleft', 
        __( 'Move Chat To Left', 'kankozwpfcc' ), 
        'kankozwpfcc_movetotheleft_plugin_callback', 
        'kankozwpfcc', 
        'general_settings_section', 
        [ 
        'label_for' => 'movetotheleft',
        'class' => 'kankozwpfcc_row',
        'kankozwpfcc_custom_data' => 'custom',
        ] );

    add_settings_field( 
        'loggedingreeting', 
        __( 'Logged In Greeting', 'kankozwpfcc' ), 
        'kankozwpfcc_loggedingreeting_plugin_callback', 
        'kankozwpfcc', 
        'general_settings_section', 
        [ 
        'label_for' => 'loggedingreeting',
        'class' => 'kankozwpfcc_row',
        'kankozwpfcc_custom_data' => 'custom',
        ] );

    add_settings_field( 
        'loggedoutgreeting', 
        __( 'Logged Out Greeting', 'kankozwpfcc' ), 
        'kankozwpfcc_loggedoutgreeting_plugin_callback', 
        'kankozwpfcc', 
        'general_settings_section', 
        [ 
        'label_for' => 'loggedoutgreeting',
        'class' => 'kankozwpfcc_row',
        'kankozwpfcc_custom_data' => 'custom',
        ] );
}

/**
 * register our kankozwpfcc_settings_init to the admin_init action hook
 */
add_action( 'admin_init', 'kankozwpfcc_settings_init' );

// kankozwpfcc section callback 
// section callbacks can accept an $args parameter, which is an array.
// $args have the following keys defined: title, id, callback.
// the values are defined at the add_settings_section() function.
function kankozwpfcc_section_id_callback($args){
    ?>
    <hr>
    <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Welcome & thank you for using this plugin. Please use this section to set it up.', 'wporg' ); //esc_html_e( $text, $domain ); ?></p>

 <?php
}

// kankozwpfcc enable field call back
 
// field callbacks can accept an $args parameter, which is an array.
// $args is defined at the add_settings_field() function.
// wordpress has magic interaction with the following keys: label_for, class.
// the "label_for" key value is used for the "for" attribute of the <label>.
// the "class" key value is used for the "class" attribute of the <tr> containing the field.
// you can add custom key value pairs to be used inside your callbacks.
function kankozwpfcc_enable_plugin_callback($args){
    // get the value of the setting we've registered with register_setting()
    // output the field
    global $kankozwpfcc_option_global;
    ?>
    <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" 
    data-custom="<?php echo esc_attr( $args['kankozwpfcc_custom_data'] ); ?>"
    name="kankozwpfcc_options[<?php echo esc_attr( $args['label_for'] ); ?>]" 
    value="1"<?php echo isset( $kankozwpfcc_option_global[ $args['label_for'] ] ) ? ( checked('1', $kankozwpfcc_option_global[ $args['label_for'] ] ) ) : ( '' );
 ?>>
    
    </input>
    <p class="description">
        <?php esc_html_e( 'Please tick this to enable the plugin', 'kankozwpfcc' ); ?>
    </p> 
    <?php
}

function kankozwpfcc_pageid_plugin_callback($args){
    // get the value of the setting we've registered with register_setting()
    global $kankozwpfcc_option_global;
    // output the field
    ?>
    <input type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>" 
    data-custom="<?php echo esc_attr( $args['kankozwpfcc_custom_data'] ); ?>"
    name="kankozwpfcc_options[<?php echo esc_attr( $args['label_for'] ); ?>]" 
    value="<?php echo isset( $kankozwpfcc_option_global[ $args['label_for'] ] ) ? esc_attr( $kankozwpfcc_option_global[ $args['label_for'] ] ) : '';?>">
    
    </input>
    <p class="description">
        <?php esc_html_e( 'Please enter your facebook page ID. It\'s compulsory', 'kankozwpfcc' ); ?>
    </p>      
    <?php
}

function kankozwpfcc_appid_plugin_callback($args){
    // get the value of the setting we've registered with register_setting()
    global $kankozwpfcc_option_global;
    // output the field
    ?>
    <input type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>" 
    data-custom="<?php echo esc_attr( $args['kankozwpfcc_custom_data'] ); ?>"
    name="kankozwpfcc_options[<?php echo esc_attr( $args['label_for'] ); ?>]" 
    value="<?php echo isset( $kankozwpfcc_option_global[ $args['label_for'] ] ) ? esc_attr( $kankozwpfcc_option_global[ $args['label_for'] ] ) : '';?>">
    
    </input>
    <p class="description">
        <?php esc_html_e( 'Please enter your facebook app ID. Take it easy, it\'s optional', 'kankozwpfcc' ); ?>
    </p>      
    <?php
}

function kankozwpfcc_themecolor_plugin_callback($args){
    // get the value of the setting we've registered with register_setting()
    global $kankozwpfcc_option_global;
    // output the field
    ?>
    <input class="theme-color" type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>" 
    data-custom="<?php echo esc_attr( $args['kankozwpfcc_custom_data'] ); ?>"
    name="kankozwpfcc_options[<?php echo esc_attr( $args['label_for'] ); ?>]" 
    value="<?php echo isset( $kankozwpfcc_option_global[ $args['label_for'] ] ) ? esc_attr( $kankozwpfcc_option_global[ $args['label_for'] ] ) : '';?>">
    
    </input>
    <p class="description">
        <?php esc_html_e( 'Please select a color or hex value with a # or untouch to use default color', 'kankozwpfcc' ); ?>
    </p>      
    <?php
}


function kankozwpfcc_movetotheleft_plugin_callback($args){
    // get the value of the setting we've registered with register_setting()
    global $kankozwpfcc_option_global;   
    // output the field
    ?>
    <input type="checkbox" id="<?php echo esc_attr( $args['label_for'] ); ?>" 
    data-custom="<?php echo esc_attr( $args['kankozwpfcc_custom_data'] ); ?>"
    name="kankozwpfcc_options[<?php echo esc_attr( $args['label_for'] ); ?>]" 
    value="1"<?php echo isset( $kankozwpfcc_option_global[ $args['label_for'] ] ) ? ( checked('1', $kankozwpfcc_option_global[ $args['label_for'] ] ) ) : ( '' );
 ?>>
    
    </input>
    <p class="description">
        <?php esc_html_e( 'Please tick this checkbox to move the chat widget to the left', 'kankozwpfcc' ); ?>
    </p> 
    <?php
}

function kankozwpfcc_loggedingreeting_plugin_callback($args){
    // get the value of the setting we've registered with register_setting()
    global $kankozwpfcc_option_global;
    // output the field
    ?>
    <input class="regular-text" type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>" 
    data-custom="<?php echo esc_attr( $args['kankozwpfcc_custom_data'] ); ?>"
    name="kankozwpfcc_options[<?php echo esc_attr( $args['label_for'] ); ?>]" 
    value="<?php echo isset( $kankozwpfcc_option_global[ $args['label_for'] ] ) ? esc_attr( $kankozwpfcc_option_global[ $args['label_for'] ] ) : '';?>">
    
    </input>
    <p class="description">
        <?php esc_html_e( 'Optional. The greeting text that will be displayed if the user is currently logged in to facebook. Maximum of 80 characters.', 'kankozwpfcc' ); ?>
    </p>
    <?php
}

function kankozwpfcc_loggedoutgreeting_plugin_callback($args){
    // get the value of the setting we've registered with register_setting()
    global $kankozwpfcc_option_global;
    // output the field
    ?>
    <input class="regular-text" type="text" id="<?php echo esc_attr( $args['label_for'] ); ?>" 
    data-custom="<?php echo esc_attr( $args['kankozwpfcc_custom_data'] ); ?>"
    name="kankozwpfcc_options[<?php echo esc_attr( $args['label_for'] ); ?>]" 
    value="<?php echo isset( $kankozwpfcc_option_global[ $args['label_for'] ] ) ? esc_attr( $kankozwpfcc_option_global[ $args['label_for'] ] ) : '';?>">
    
    </input>
    <p class="description">
        <?php esc_html_e( 'Optional. The greeting text that will be displayed if the user is currently logged out of facebook. Maximum of 80 characters.', 'kankozwpfcc' ); ?>
    </p>
      
    <?php
}

/**
 * top level menu
 */
function kankoz_wpfcc_add_menu_link(){
    // add top level menu page
    add_menu_page( 
        'Facebook Customer Chat', 
        'Customer Chat', 
        'manage_options', 
        'kankozwpfcc', 
        'kankoz_wpfcc_options_html', 
        'dashicons-facebook',
        75.99999
        );
}
add_action( 'admin_menu', 'kankoz_wpfcc_add_menu_link');

function kankoz_wpfcc_options_html( $active_tab = ''){
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
    return;
    }

    // add error/update messages 
    // check if the user have submitted the settings
    // wordpress will add the "settings-updated" $_GET parameter to the url
    if ( isset( $_GET['settings-updated'] ) ) {
     // add settings saved message with the class of "updated"
     add_settings_error( 'kankozwpfcc_messages', 'kankoz_wpfcc_message', __( 'Settings Saved', 'kankoz_wpfcc' ), 'updated' );
     }

     // show error/update messages
     settings_errors( 'kankozwpfcc_messages' );
    ?>
    <div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ) .' Settings'; ?></h1>

     <?php if( isset( $_GET[ 'tab' ] ) ) {
        $active_tab = $_GET[ 'tab' ];
        }
        else{
        $active_tab = 'general_settings_section';
    } ?>

    <h2 class="nav-tab-wrapper">
        <a href="?page=kankozwpfcc&tab=general_settings_section" class="nav-tab <?php echo $active_tab == 'general_settings_section' ? 'nav-tab-active' : ''; ?>">General Settings</a>
        <a href="?page=kankozwpfcc&tab=faqs" class="nav-tab <?php echo $active_tab == 'tabs' ? 'nav-tab-active' : ''; ?>">FAQs</a>          
    </h2>
       
    <form action="options.php" method="post">
    <?php

         if( $active_tab == 'general_settings_section' ) {
        // output security fields for the registered setting "kankozwpfcc"
        settings_fields( 'kankozwpfcc' );     
        // output setting sections and their fields
        // (sections are registered for "kankozwpfcc", each field is registered to a specific section)
        do_settings_sections( 'kankozwpfcc' );
        // output save settings button
        submit_button( 'Save Settings' ); 
        }
        elseif ($active_tab == 'faqs') {?>
            <h2>FAQs</h2>
            <hr>
            <p>
                <h4> Question</h4>
                <?php 
                esc_html_e( 'How can I connect a chatbot to my facebook page?', 'kankozwpfcc' );                 
                ?>
            </p>
            <p>
                <h4> Answer</h4>
                <?php 
                esc_html_e( 'You need to use services of chatbot creation platform e.g chatfuel, manychat', 'kankozwpfcc' ); 
                ?>
            </p>
            <hr>

            <p>
                <h4> Question</h4>
                <?php 
                esc_html_e( 'I enable the plugin but still the widget is not showing up on my website', 'kankozwpfcc' );                 
                ?>
            </p>
            <p>
                <h4> Answer</h4>
                <?php 
                esc_html_e( 'Have you whitelisted your domain on your facebook page, if not, please do so', 'kankozwpfcc' ); 
                ?>
            </p>
            <hr>

            <p>
                <h4> Question</h4>
                <?php 
                esc_html_e( 'Have more issues?', 'kankozwpfcc' );                 
                ?>
            </p>
            <p>
                <h4> Answer</h4>
                <?php 
                esc_html_e( 'Please send a mail to our support@kankoz.com & let take it up from there!', 'kankozwpfcc' ); 
                ?>
            </p>
            <hr>

            <p>
                <h4> Question</h4>
                <?php 
                esc_html_e( 'How can I donate for continued development of this plugin?', 'kankozwpfcc' );                 
                ?>
            </p>
            <p>
                <h4> Answer</h4>
                <?php 
                esc_html_e( 'Sure, get in touch via support@kankoz.com', 'kankozwpfcc' ); 
                ?>
            </p>
            <?php 
        }
    ?>
    </form>
    </div>       
    <?php 
}
?>