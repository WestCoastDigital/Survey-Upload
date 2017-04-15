<?php
/*
Plugin Name: Survey Upload
Plugin URI: https://github.com/WestCoastDigital/Survey-Upload
Description: Upload customer surveys
Version: 1.0.0
Author: West Coast Digital
Author URI: https://westcoastdigital.com.au
Text Domain: wcd-survey
Domain Path: /languages
*/

defined( 'ABSPATH' ) || die;

require_once 'custom-post-type.php';
require_once 'meta-boxes.php';

if ( ! function_exists('wcd_survey_register_templates') ) {

    function wcd_team_register_templates( $template_path ) {

        // Checks in the correct custom post type
        if ( get_post_type() == 'survey' ) {

            // Checks that we are viewing the single page
            if ( is_single() ) {

                // Checks to see if the theme has the template already
                if ( $theme_file = locate_template( array ( 'single-survey.php' ) ) ) {

                    // If it does then load the themes file
                    $template_path = $theme_file;

                } else {

                    // If it doesn't then load the plugins version
                    $template_path = plugin_dir_path( __FILE__ ) . '/templates/single-survey.php';

                }
            }
            

        }
        return $template_path;
        
    }
    add_filter('template_include', 'wcd_team_register_templates');

}