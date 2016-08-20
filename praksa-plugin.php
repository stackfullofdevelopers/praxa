<?php
/*
	Plugin Name: Praksa Plugin
	Description: (1) Protected Content - Shortcode that displays the content to logged-in users only
				 (2) Reverse - Shortcode that displays the content in reverse order
				 (3) Weather - Shortcode that dispalys weather information for a given location
				 (4) Contact Info - Widget that displays contact informations
	Version: 1.0
	Author: Lazar Zubic, Danica Misic
	License: GPLv2+
*/

class Contact_Info extends WP_Widget
{
	function __construct()
	{
		parent::__construct('contact_info_widget', __('Contact Info', 'contact_info' ), array('description' => __('Displays contact informations about some user', 'contact_info')));
	}

	function form($instance)
    {
    	$title = (isset($instance['title'])) ? $instance['title'] : '';
    	$name = (isset($instance['name'])) ? $instance['name'] : '';
    	$activity = (isset($instance['activity'])) ? $instance['activity'] : '';
    	$street = (isset($instance['street'])) ? $instance['street'] : '';
    	$city = (isset($instance['city'])) ? $instance['city'] : '';
    	$zip = (isset($instance['zip'])) ? $instance['zip'] : '';
    	$country = (isset($instance['country'])) ? $instance['country'] : '';
    	$phone = (isset($instance['phone'])) ? $instance['phone'] : '';
    	$email = (isset($instance['email'])) ? $instance['email'] : '';

    	echo "<p>";
    	echo "<label for='" . $this->get_field_id('title') . "'>" . _e('Title:') . "</label>";
    	echo "<input class='widefat' id='" . $this->get_field_id('title') . "' name='" . $this->get_field_name('title') . "' type='text' value='" . esc_attr($title) . "' />";
    	echo "</p>";

    	echo "<p>";
    	echo "<label for='" . $this->get_field_id('name') . "'>" . _e('Name:') . "</label>";
    	echo "<input class='widefat' id='" . $this->get_field_id('name') . "' name='" . $this->get_field_name('name') . "' type='text' value='" . esc_attr($name) . "' />";
    	echo "</p>";

    	echo "<p>";
    	echo "<label for='" . $this->get_field_id('activity') . "'>" . _e('Activity:') . "</label>";
    	echo "<input class='widefat' id='" . $this->get_field_id('activity') . "' name='" . $this->get_field_name('activity') . "' type='text' value='" . esc_attr($activity) . "' />";
    	echo "</p>";

    	echo "<p>";
    	echo "<label for='" . $this->get_field_id('street') . "'>" . _e('Street:') . "</label>";
    	echo "<input class='widefat' id='" . $this->get_field_id('street') . "' name='" . $this->get_field_name('street') . "' type='text' value='" . esc_attr($street) . "' />";
    	echo "</p>";

    	echo "<p>";
    	echo "<label for='" . $this->get_field_id('city') . "'>" . _e('City:') . "</label>";
    	echo "<input class='widefat' id='" . $this->get_field_id('city') . "' name='" . $this->get_field_name('city') . "' type='text' value='" . esc_attr($city) . "' />";
    	echo "</p>";

    	echo "<p>";
    	echo "<label for='" . $this->get_field_id('zip') . "'>" . _e('Zip:') . "</label>";
    	echo "<input class='widefat' id='" . $this->get_field_id('zip') . "' name='" . $this->get_field_name('zip') . "' type='text' value='" . esc_attr($zip) . "' />";
    	echo "</p>";

    	echo "<p>";
    	echo "<label for='" . $this->get_field_id('country') . "'>" . _e('Country:') . "</label>";
    	echo "<input class='widefat' id='" . $this->get_field_id('country') . "' name='" . $this->get_field_name('country') . "' type='text' value='" . esc_attr($country) . "' />";
    	echo "</p>";

    	echo "<p>";
    	echo "<label for='" . $this->get_field_id('phone') . "'>" . _e('Phone:') . "</label>";
    	echo "<input class='widefat' id='" . $this->get_field_id('phone') . "' name='" . $this->get_field_name('phone') . "' type='text' value='" . esc_attr($phone) . "' />";
    	echo "</p>";

    	echo "<p>";
    	echo "<label for='" . $this->get_field_id('email') . "'>" . _e('Email:') . "</label>";
    	echo "<input class='widefat' id='" . $this->get_field_id('email') . "' name='" . $this->get_field_name('email') . "' type='text' value='" . esc_attr($email) . "' />";
    	echo "</p>";
    }

    function update($new_instance, $old_instance)
    {
    	$instance = array();
    	$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
    	$instance['name'] = (!empty( $new_instance['name'])) ? strip_tags($new_instance['name']) : '';
    	$instance['activity'] = (!empty( $new_instance['activity'])) ? strip_tags($new_instance['activity']) : '';
    	$instance['street'] = (!empty( $new_instance['street'])) ? strip_tags($new_instance['street']) : '';
    	$instance['city'] = (!empty( $new_instance['city'])) ? strip_tags($new_instance['city']) : '';
    	$instance['zip'] = (!empty( $new_instance['zip'])) ? strip_tags($new_instance['zip']) : '';
    	$instance['country'] = (!empty( $new_instance['country'])) ? strip_tags($new_instance['country']) : '';
    	$instance['phone'] = (!empty( $new_instance['phone'])) ? strip_tags($new_instance['phone']) : '';
    	$instance['email'] = (!empty( $new_instance['email'])) ? strip_tags($new_instance['email']) : '';
    	return $instance;
    }

    function widget($args, $instance)
    {
    	$title = apply_filters('widget_title', $instance['title']);
    	$name = apply_filters('widget_title', $instance['name']);
    	$activity = apply_filters('widget_title', $instance['activity']);
    	$street = apply_filters('widget_title', $instance['street']);
    	$city = apply_filters('widget_title', $instance['city']);
    	$zip = apply_filters('widget_title', $instance['zip']);
    	$country = apply_filters('widget_title', $instance['country']);
    	$phone = apply_filters('widget_title', $instance['phone']);
    	$email = apply_filters('widget_title', $instance['email']);

    	echo $args['before_widget'];

    	if (!empty($title))
    		echo $args['before_title'] . "<h1>" . $title . "</h1>" . $args['after_title'];

    	if (!empty($name) && !empty($activity) && !empty($street) && !empty($city) && !empty($zip) && !empty($country) && !empty($phone) && !empty($email))
    	{
    		echo "<style> span { display: inline-block; } </style>";
    		echo "<style> p, a, li { font-size: 15px; margin-left: 10px; } </style>";

    		echo "<hr>";

    		echo "<div style='margin-left: 10px'>";

    		echo "<div>";
    		echo "<span><img src='" . plugin_dir_url(__FILE__) . "/images/name.png' width=50 height=50></span>";
    		echo "<span><p>" . $name . "</p></span>";
    		echo "</div>";

    		echo "<div>";
    		echo "<span><img src='" . plugin_dir_url(__FILE__) . "/images/activity.png' width=50 height=50></span>";
    		echo "<span><p>" . $activity . "</p></span>";
    		echo "</div>";

    		echo "<div>";
    		echo "<span><img src='" . plugin_dir_url(__FILE__) . "/images/location.png' width=50 height=50 style='margin-bottom: 45px;'></span>";
    		echo "<span>";
    		echo "<ul>";
    		echo "<li>" . $street . "</li>";
    		echo "<li>" . $city . ", " . $zip . "</li>";
    		echo "<li>" . $country . "</li>";
    		echo "</div>";

    		echo "<div>";
    		echo "<span><img src='" . plugin_dir_url(__FILE__) . "/images/phone.png' width=50 height=50></span>";
    		echo "<span><p>" . $phone . "</p></span>";
    		echo "</div>";

    		echo "<div>";
    		echo "<span><img src='" . plugin_dir_url(__FILE__) . "/images/email.png' width=50 height=50></span>";
    		echo "<span><a href='mailto:" . $email . "'>" . $email . "</a></span>";
    		echo "</div>";

    		echo "</div>";

    		echo "<br>";

    		echo "<hr>";
    	}
    	else
    		echo "<h3>No contact informations</h3>";

    	echo $args['after_widget'];
    }
}

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
		$output = do_shortcode($content);
	return $output;
}

function shortcode_reverse_handler($atts, $content = null)
{
	return strrev($content);
}

function widget_register()
{
	register_widget('Contact_Info');
}

function shortcodes_register()
{
	add_shortcode('protected-content', 'shortcode_protected_content_handler');
	add_shortcode('reverse', 'shortcode_reverse_handler');
	add_shortcode('weather', 'shortcode_weather_handler');
}

add_action('widgets_init', 'widget_register');
add_action('init', 'shortcodes_register');