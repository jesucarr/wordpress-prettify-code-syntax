<?php 
header("Content-Type: text/css");
if ( !defined('WP_LOAD_PATH') ) {
	/** classic root path if wp-content and plugins is below wp-config.php */
	$classic_root = dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/' ;
	
	if (file_exists( $classic_root . 'wp-load.php') )
		define( 'WP_LOAD_PATH', $classic_root);
	else
		exit("Could not find wp-load.php in ".$classic_root." neither in ".$path);
}
require_once( WP_LOAD_PATH . 'wp-load.php');

$options = get_option('prettify_code_syntax');
if(!empty($options['style_custom'])) {
	echo $options['style_custom']; 
} else {
	include(dirname(__FILE__).'/custom.css');
}

?>