<?php

/*
    Plugin Name: Test Plugin
    Description: Testing plugin
    Version: 1.0
    Author: Piotr Cembrowski
*/

if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists( 'TestPlugin' ) ) {

    class TestPlugin {

        public function __construct() {
            // check for required php version and deactivate the plugin if php version is less.
             if ( version_compare( PHP_VERSION, '7.4', '<' ) ) {
                add_action( 'admin_notices', array( $this, 'show_notice' ), 100 );
                add_action( 'admin_init', array( $this, 'TestPlugin_deactivate_self' ) );
                return;
            }
            // functionality of plugin


            if( !is_admin() ) {

                // Hook our function to the 'the_title' filter
                // Note the last arg: we specify '2' because we want the filter
                // to pass us both the title AND the ID to our function
                add_filter('the_title','my_add_date_to_title',10,2);

                function my_add_date_to_title($title, $id) {

                    // First get the default date format
                    // Alternatively, you can specify your 
                    // own date format instead
                    $date_format = get_option('date_format');
    
                    // Now get the date
                    $date = get_the_date($date_format, $id); // Should return a string
    
                    // Now put our string together and return it
                    // You can of course tweak the markup here if you want
                    $title .= ' ' . $date;
    
                    // Now return the string
                    return $title;
                }
            }


        }

        public function show_notice() {
            ?>
            <div class="error">
                <p><?php echo 'TestPlugin requires minimum PHP 7.4 to function properly. Please upgrade PHP version. The Plugin has been auto-deactivated.. You have PHP version '.PHP_VERSION; ?></p>
            </div>
            <?php
            if ( isset( $_GET['activate'] ) ) {
                unset( $_GET['activate'] );
            }
        }
        public function TestPlugin_deactivate_self() {
            deactivate_plugins( plugin_basename( __FILE__ ) );
        }
    }
}

if ( class_exists( 'TestPlugin' ) ) { // Instantiate the plugin class
    global $plgn_abbr;
    $plgn_abbr = new TestPlugin();
}



