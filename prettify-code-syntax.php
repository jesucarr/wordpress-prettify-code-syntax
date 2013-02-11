<?php
/*
Plugin Name: Prettify Code Syntax
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A brief description of the Plugin.
Version: 1.0
Author: Jesús Carrera
Author URI: http://URI_Of_The_Plugin_Author
License: GPL2 or later
*/
/*  Copyright 2013  Jesús Carrera  (email : jesus.carrera@frontendmatters.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


class PrettifyCodeSyntax {
	private $plugin_id, $plugin_url;

	function __construct() {
		$this->plugin_id = 'prettify-code-syntax';
		$this->plugin_url = plugins_url($this->plugin_id);

  	add_action('admin_menu', array($this, 'menu'));
		add_action('admin_init', array($this, 'register_settings'));

		// add_action('wp_enqueue_scripts', array($this, 'load_scripts'));

		add_action('plugins_loaded', array($this, 'load_plugin_textdomain'));
  }

  public function menu() {
  	add_options_page(__('Prettify Code Syntax Options', $this->plugin_id), __('Prettify Code Syntax', $this->plugin_id), 'manage_options', $this->plugin_id, array($this, 'options'));
  }

  public function options() {
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die(__('You do not have sufficient permissions to access this page.'));
		}
		include "views/options.php";
	}

	public function register_settings() { // whitelist options
	  register_setting('pcs_settings_group', 'prettify_code_syntax', array($this, 'settings_validate'));

	  add_settings_section('pcs_languages_section', __('Languages', $this->plugin_id), array($this, 'languages_section_description'), 'pcs_languages');
	  add_settings_field('pcs_languages_extra_languages_field', __('Extra Languages', $this->plugin_id), array($this, 'languages_extra_languages_field_content'), 'pcs_languages', 'pcs_languages_section');

	  add_settings_section('pcs_style_section', __('Style', $this->plugin_id), array($this, 'style_section_description'), 'pcs_style');
	  add_settings_field('pcs_style_style_field', __('Style', $this->plugin_id), array($this, 'style_style_field_content'), 'pcs_style', 'pcs_style_section');
	}

	public function settings_validate($input) {
		// $options = get_option('prettify_code_syntax');
		// $options['text_string'] = trim($input['text_string']);
		// if(!preg_match('/^[a-z0-9]{3}$/i', $options['text_string'])) {
		// $options['text_string'] = '';
		// }
		$options = $input;
		// $options = '';
		return $options;
	}

	function load_scripts() {
    wp_enqueue_script('prettify', dirname(plugin_basename(__FILE__)).'/javascripts/prettify.js', false, false, true);
 	} 

	public function languages_section_description() {
		include "views/languages-section-description.php";
	}

	public function languages_extra_languages_field_content() {
		include "views/languages-extra-languages-field-content.php";
	}

	public function style_section_description() {
		include "views/style-section-description.php";
	}

	public function style_style_field_content() {
		include "views/style-style-field-content.php";
	}

	public function load_plugin_textdomain() {
  	load_plugin_textdomain($this->plugin_id, false, dirname(plugin_basename(__FILE__)).'/languages/');
  }

}

new PrettifyCodeSyntax();





















?>