<?php
/*
	Plugin Name: Praksa Plugins
	Description: (1) Protected Content - Shortcode that displays the content to logged-in users only
				 (2) Reverse - Shortcode that displays the content in reverse order
				 (3) Weather - Shortcode that dispalys weather information for a given location
	Version: 1.0
	Author: Lazar Zubic, Danica Misic
	License: GPLv2+
*/

function shortcode_weather_handler($atts)
{
	$args = shortcode_atts(array('city' => '', 'country' => ''), $atts);
	$url = 'http://api.openweathermap.org/data/2.5/weather?q=' . $args['city'] . ',' . $args['country'] . '&APPID=e8a25e6e27e357bbb70b8cacfe652bff';
	$json = file_get_contents($url);
	$data = json_decode($json, true);
	$output = '<h3>CITY INFO</h3>';
	$output .= 'Name: ' . $data['name'] . '<br>';
	$output .= 'Country: ' . $data['sys']['country'] . '<br>';
	$output .= 'Location: ' . $data['coord']['lon'] . ', ' . $data['coord']['lat'] . '<br>';
	$output .= '<h3>WEATHER INFO ' . "<img src='http://openweathermap.org/img/w/" . $data['weather'][0]['icon'] . ".png'>" . '</h3>';
	$output .= 'Main: ' . $data['weather'][0]['main'] . '<br>';
	$output .= 'Description: ' . ucfirst($data['weather'][0]['description']) . '<br>';
	$output .= 'Temperature: ' . $data['main']['temp'] . ' K' . '<br>';
	$output .= 'Pressure: ' . $data['main']['pressure'] . ' hPa' . '<br>';
	$output .= 'Humidity: ' . $data['main']['humidity'] . ' %' . '<br>';
	$output .= 'Wind: ' . $data['wind']['speed'] . ' m/s' . '<br>';
	$output .= 'Cloudness: ' . $data['clouds']['all'] . ' %' . '<br>';
	return $output;
}

function shortcode_protected_content_handler($atts, $content = null)
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
	add_shortcode('protected-content', 'shortcode_protected_content_handler');
	add_shortcode('reverse', 'shortcode_reverse_handler');
	add_shortcode('weather', 'shortcode_weather_handler');
}

add_action('init', 'shortcode_register');