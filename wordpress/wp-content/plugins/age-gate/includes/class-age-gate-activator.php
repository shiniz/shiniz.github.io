<?php

/**
 * Fired during plugin activation
 *
 * @link       https://philsbury.uk
 * @since      1.0.0
 *
 * @package    Age_Gate
 * @subpackage Age_Gate/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Age_Gate
 * @subpackage Age_Gate/includes
 * @author     Phil Baker <phil@philsbury.co.uk>
 */
class Age_Gate_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 *
	 */
	public static function activate() {

    $locale = get_locale();
    //
    //
    $defaults = array(
	    "wp_age_gate_min_age" => ($locale == 'en_GB') ? 18 : 21,
	    "wp_age_gate_restriction_type" => 'all',
	    "wp_age_gate_input_type" => 'inputs',
	    "wp_age_gate_remember" => 1,
	    "wp_age_gate_date_format" => ($locale == 'en_GB') ? 'ddmmyyyy' : 'mmddyyyy',
	    "wp_age_gate_button_text" => 'Submit',
	    'wp_age_gate_restrict_register' => 1,
	    "wp_age_gate_styling" => 1,
	    "wp_age_gate_invalid_input_msg" => "Your input was invalid",
			"wp_age_gate_under_age_msg" => "You are not old enough to view this content",
			"wp_age_gate_generic_error_msg" => "An error occurred, please try again",
			"wp_age_gate_device_width" => 1,
			"wp_age_gate_use_js" => "standard",
			"wp_age_gate_yes_no_message" => "Are you over %s years of age?",
			"wp_age_gate_switch_title" => 1,
			"wp_age_gate_remember_days" => 365

	  );

		$populate_all = [
			'wp_age_gate_min_age' => 18 ,
			'wp_age_gate_restriction_type' => 'all',
			'wp_age_gate_restrict_register' => 0,
			'wp_age_gate_input_type' => 'inputs',
			'wp_age_gate_remember' => 0,
			'wp_age_gate_remember_days' => 0,
			'wp_age_gate_remember_auto_check' => 0,
			'wp_age_gate_date_format' => 'ddmmyyyy',
			'wp_age_gate_ignore_logged' => 0,
			'wp_age_gate_no_second_chance' => 0,
			'wp_age_gate_fail_link_title' => '',
			'wp_age_gate_fail_link' => '',
			'wp_age_gate_instruction' => '',
			'wp_age_gate_messaging' => '',
			'wp_age_gate_invalid_input_msg' => '',
			'wp_age_gate_under_age_msg' => '',
			'wp_age_gate_generic_error_msg' => '',
			'wp_age_gate_yes_no_message' => '',
			'wp_age_gate_logo' => '',
			'wp_age_gate_button_text' => '',
			'wp_age_gate_background_colour' => '',
			'wp_age_gate_background_image' => '',
			'wp_age_gate_foreground_colour' => '',
			'wp_age_gate_text_colour' => '',
			'wp_age_gate_styling' => '',
			'wp_age_gate_device_width' => 0,
			'wp_age_gate_switch_title' => 0,
			'wp_age_gate_use_js' => '',
			'wp_age_gate_additional' => '',
		];

		// get any user settings so we don't override
	  $user_settings = array_merge($populate_all, get_option('wp_age_gate_general', array()));

	  if(Age_Gate_Admin::_force_js()){
	  	$user_settings['wp_age_gate_use_js'] = 'js';
	  }

		update_option('wp_age_gate_general', array_merge($defaults, $user_settings));
	}

	// private static function _force_js()
	// {

	// 	return is_plugin_active('wp-e-commerce/wp-shopping-cart.php');

	// }

}
