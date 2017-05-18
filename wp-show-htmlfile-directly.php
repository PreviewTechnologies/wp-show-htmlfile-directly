<?php
/**
 * @package Show HTML Page Directly
 * @version 1.0
 */
/*
Plugin Name: Show HTML Page Directly
Plugin URI: http://wordpress.org/extend/plugins/show-html-page-directly/
Description: To directly display HTML page for specific wordpress post or page
Author: Shaharia Azam
Version: 1.0
Author URI: https://blog.shaharia.com
*/

add_action('wp', 'wp_direct_html_output');

function wp_direct_html_output()
{
    if (is_singular()) {
        global $post;
        $htmlPath = get_post_meta($post->ID, 'display_html_file', true);
        if (($htmlPath) && (file_exists($htmlPath))) {
            echo file_get_contents($htmlPath);
            exit;
        }
    }
}