<?php 

/**

 * Plugin Name: WP Options

 * Plugin URI: http://craftytheme.com

 * Author: Craftytheme

 * Description: A demo plugin

 * Text-domain: wp_opt

 * Version: 1.0.0

 */



//  Add Menu Page

function wp_opt_add_menu_page() {

    add_menu_page(

        __( 'WP Options', 'wp_opt' ),

        'WP Options',

        'manage_options',

        'wp_options',

        'wp_opt_settings_page',

        '',

        99

    );

}

add_action('admin_menu', 'wp_opt_add_menu_page');



// Settings Page

function wp_opt_settings_page() {

    ?>

    <div class="wrap">

        <h1>Wp Options Settings Panel</h1>

        <form action="options.php" method="POST">

            <?php 

                settings_fields( 'section' );

                do_settings_sections( 'theme-options' );

                submit_button();

            ?>

        </form>

    </div>

    <?php

}



// Display WP Options Settings Fields

function wp_opt_display_settings_fields() {

    add_settings_section( 'section', 'All Settings', null, 'theme-options' );

    add_settings_field( 'twitter_url', 'Twitter URL', 'wp_opt_display_twitter_field', 'theme-options', 'section' );

    add_settings_field( 'facebook_url', 'Facebook URL', 'wp_opt_display_facebook_field', 'theme-options', 'section' );



    // Register Fields

    register_setting( 'section', 'twitter_url' );

    register_setting( 'section', 'facebook_url' );

}

add_action( 'admin_init', 'wp_opt_display_settings_fields' );



// Display Twitter Field

function wp_opt_display_twitter_field() {

    ?>

    <input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />

    <?php

}



// Display Facebook Field

function wp_opt_display_facebook_field() {

    ?>

    <input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />

    <?php

}