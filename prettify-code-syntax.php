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
		$this->options = get_option('prettify_code_syntax');

  	add_action('admin_menu', array($this, 'menu'));
		add_action('admin_init', array($this, 'register_settings'));
		add_action('admin_enqueue_scripts', array($this, 'load_admin_scripts'));

		add_action('wp_enqueue_scripts', array($this, 'load_scripts'));
		add_action('wp_enqueue_scripts', array($this, 'load_styles'));

		add_filter('the_content', array($this, 'content_filter'));
		add_filter('comment_text', array($this, 'content_filter'));

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

	public function load_scripts() {

    wp_enqueue_script('prettify', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/javascripts/prettify.js', false, false, true);

    if (!empty($this->options['languages_css'])) {
    	wp_enqueue_script('prettify-css', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/javascripts/lang-css.js', array('prettify'), false, true);
    }
    if (!empty($this->options['languages_sql'])) {
    	wp_enqueue_script('prettify-sql', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/javascripts/lang-sql.js', array('prettify'), false, true);
    }
    if (!empty($this->options['languages_yaml'])) {
    	wp_enqueue_script('prettify-yaml', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/javascripts/lang-yaml.js', array('prettify'), false, true);
    }
    if (!empty($this->options['languages_visual_basic'])) {
    	wp_enqueue_script('prettify-visual-basic', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/javascripts/lang-vb.js', array('prettify'), false, true);
    }
    if (!empty($this->options['languages_clojure'])) {
    	wp_enqueue_script('prettify-clojure', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/javascripts/lang-clj.js', array('prettify'), false, true);
    }
    if (!empty($this->options['languages_scala'])) {
    	wp_enqueue_script('prettify-scala', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/javascripts/lang-scala.js', array('prettify'), false, true);
    }
    if (!empty($this->options['languages_tex'])) {
    	wp_enqueue_script('prettify-tex', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/javascripts/lang-tex.js', array('prettify'), false, true);
    }
    if (!empty($this->options['languages_wikitext'])) {
    	wp_enqueue_script('prettify-wikitext', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/javascripts/lang-wiki.js', array('prettify'), false, true);
    }
    if (!empty($this->options['languages_erlang'])) {
    	wp_enqueue_script('prettify-erlang', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/javascripts/lang-erlang.js', array('prettify'), false, true);
    }
    if (!empty($this->options['languages_go'])) {
    	wp_enqueue_script('prettify-go', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/javascripts/lang-go.js', array('prettify'), false, true);
    }
    if (!empty($this->options['languages_haskell'])) {
    	wp_enqueue_script('prettify-haskell', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/javascripts/lang-hs.js', array('prettify'), false, true);
    }
    if (!empty($this->options['languages_lua'])) {
    	wp_enqueue_script('prettify-lua', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/javascripts/lang-lua.js', array('prettify'), false, true);
    }
    if (!empty($this->options['languages_ocaml'])) {
    	wp_enqueue_script('prettify-ocaml', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/javascripts/lang-ml.js', array('prettify'), false, true);
    }
    if (!empty($this->options['languages_nemerle'])) {
    	wp_enqueue_script('prettify-nemerle', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/javascripts/lang-n.js', array('prettify'), false, true);
    }
    if (!empty($this->options['languages_protocol_buffers'])) {
    	wp_enqueue_script('prettify-protocol-buffers', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/javascripts/lang-proto.js', array('prettify'), false, true);
    }
    if (!empty($this->options['languages_vhdl'])) {
    	wp_enqueue_script('prettify-vhdl', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/javascripts/lang-vhdl.js', array('prettify'), false, true);
    }
    if (!empty($this->options['languages_protocol_buffers'])) {
    	wp_enqueue_script('prettify-protocol_buffers', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/javascripts/lang-proto.js', array('prettify'), false, true);
    }
    if (!empty($this->options['languages_xquery'])) {
    	wp_enqueue_script('prettify-xquery', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/javascripts/lang-xq.js', array('prettify'), false, true);
    }

    wp_enqueue_script('prettify-load', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/javascripts/load.js', array('prettify'), false, true);
 	} 

 	public function load_styles() {
 		wp_enqueue_style('prettify', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/stylesheets/prettify.css', false, false, 'all');
 		if (!empty($this->options['style'])) {
 			switch($this->options['style']) {
 				case 'desert':
	    		wp_enqueue_style('prettify-desert', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/stylesheets/desert.css', 'prettify', false, 'all');
	    	break;
	    	case 'sunburst':
	    		wp_enqueue_style('prettify-sunburst', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/stylesheets/sunburst.css', 'prettify', false, 'all');
	    	break;
	    	case 'sons_of_obsidian':
	    		wp_enqueue_style('prettify-sons-of-obsidian', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/stylesheets/sons-of-obsidian.css', 'prettify', false, 'all');
	    	break;
	    	case 'custom':
	    		wp_enqueue_style('prettify-custom', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/stylesheets/custom.php', 'prettify', false, 'all');
	    	break;
	    }

 		}
 	}

 	public function content_filter($content) {

 		$prettify_code = false;

 		$regex = '/(<pre\s+.*?class\s*?=\s*?[",\'].*?prettyprint\b.*?[",\'].*?>)(.*?)(<\/pre>)/si';
 		$content = preg_replace_callback($regex, array($this, 'parse_content_pre'), $content);
 		$regex = '/(<code\s+[^>]*?class\s*?=\s*?"\s*?prettyprint.*?".*?>)(.*?)(<\/code>)/si';
 		// print_r($content);
 		$content = preg_replace_callback($regex, array($this, 'parse_content_code'), $content);

 		return $content;
 		
	}

	public function parse_content_pre($matches) {

		$tags_open = $matches[1];
		$code = $matches[2];
		$tags_close = $matches[3];

		$regex = '/(<code.*?>)(.*?)(<\/code>)/si';
		preg_match($regex, $code, $matches);
		if(!empty($matches)) {
			$tags_open .= $matches[1];
			$code = $matches[2];
			$tags_close = $matches[3].$tags_close;
		}

 		
 		$parsed_code = htmlentities($code);
		return $tags_open.$parsed_code.$tags_close;
	}

	public function parse_content_code($matches) {
		// print_r($matches);
		$tags_open = $matches[1];
		$code = $matches[2];
		$tags_close = $matches[3];

		$parsed_code = htmlentities($code);
		return $tags_open.$parsed_code.$tags_close;
	}

	public function load_admin_scripts() {
		wp_enqueue_script('admin-tabs', WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)).'/javascripts/admin-tabs.js', array('jquery'), false, true);
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