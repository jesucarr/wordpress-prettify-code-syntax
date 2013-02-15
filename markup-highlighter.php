<?php
/*
Plugin Name: Markup Highlighter
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


class MarkupHighlighter {
	private $plugin_id, $plugin_url;

	function __construct() {
		$this->plugin_id = 'markup-highlighter';
		$this->plugin_url = plugins_url($this->plugin_id);
  	add_action('admin_menu', array($this, 'menu'));
		add_action('admin_init', array($this, 'register_settings'));
  }

  public function menu() {
  	add_options_page(__('Markup Highlighter Options', $this->plugin_id), __('Markup Highlighter', $this->plugin_id), 'manage_options', $this->plugin_id, array($this, 'options'));
  }

  public function options() {
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die(__('You do not have sufficient permissions to access this page.'));
		}
		include "views/options.php";
	}

	public function register_settings() { // whitelist options
	  register_setting('mh_settings_group', 'markup_highlighter', array($this, 'settings_validate'));

	  add_settings_section('mh_languages_section', __('Languages', $this->plugin_id), array($this, 'languages_section_description'), 'mh_languages');
	  add_settings_field('mh_languages_extra_languages_field', __('Extra Languages', $this->plugin_id), array($this, 'languages_extra_languages_field_content'), 'mh_languages', 'mh_languages_section');

	  add_settings_section('mh_style_section', __('Style', $this->plugin_id), array($this, 'style_section_description'), 'mh_style');
	  add_settings_field('mh_style_style_field', __('Style', $this->plugin_id), array($this, 'style_style_field_content'), 'mh_style', 'mh_style_section');
	}

	public function settings_validate($input) {
		// $options = get_option('markup_highlighter');
		// $options['text_string'] = trim($input['text_string']);
		// if(!preg_match('/^[a-z0-9]{3}$/i', $options['text_string'])) {
		// $options['text_string'] = '';
		// }
		$options = $input;
		// $options = '';
		return $options;
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
}

new MarkupHighlighter();





















?>