<?php
/*
|| --------------------------------------------------------------------------------------------
|| Metaboxes Configuration
|| --------------------------------------------------------------------------------------------
||
|| @package		Dilaz Metaboxes
|| @subpackage	Config
|| @since		Dilaz Metaboxes 1.1
|| @author		WebDilaz Team, http://webdilaz.com
|| @copyright	Copyright (C) 2017, WebDilaz LTD
|| @link		http://webdilaz.com/metaboxes
|| @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
|| 
*/

defined('ABSPATH') || exit;


add_filter('dilaz_metabox_parameters', 'dilaz_mb_config_parameters');
function dilaz_mb_config_parameters() {
	
	$config_parameters = array(
		'prefix'          => 'futurio_meta', # must be unique. Any time its changed, saved settings are no longer used. New settings will be saved. Set this once.
		'use_type'        => 'plugin', # 'theme' if used within a theme or 'plugin' if used within a plugin
		'use_type_error'  => false, # error when wrong "use_type" is declared, default is false
		'default_options' => false, # whether to load default options
		'custom_options'  => false, # whether to load custom options
	);
	
	return $config_parameters;
}