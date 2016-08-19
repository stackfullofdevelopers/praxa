<?php
/*
	Plugin Name: Praksa Plugins
	Description: Shortcode that displays the content to logged-in users only, Shortcode that displays the content in reverse order
	Version: 1.0
	Author: Lazar Zubic, Danica Misic
	License: GPLv2+
*/

function shortcode_protect_content_handler($atts, $content = null)
{
	$output = 'Please login to see this';
	if (is_user_logged_in())
		$output = $content;
	return $output;
}

function shortcode_reverse_handler($atts, $content = null)
{
	return strrev($content);
}

function shortcode_register()
{
    add_shortcode('protect-content', 'shortcode_protect_content_handler');
	add_shortcode('reverse', 'shortcode_reverse_handler');
}

add_action('init', 'shortcode_register');

?>