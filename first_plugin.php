<?php
/*
	Plugin Name: Protect Content
	Plugin URI:
	Description: Displays the content to logged-in users only
	Version: 1.0
	Author: Lazar Zubic
	Author URI:
	License: GPLv2+
	Text Domain:
*/

function shortcode_handler($atts, $content = null)
{
	$output = 'Please login to see this';
	if (is_user_logged_in())
		$output = $content;
	return $output;
}

function shortcode_register()
{
    add_shortcode('protect-content', 'shortcode_handler');
}

add_action('init', 'shortcode_register');

?>