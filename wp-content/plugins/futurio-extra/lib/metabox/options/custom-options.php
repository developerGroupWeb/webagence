<?php
/*
|| --------------------------------------------------------------------------------------------
|| Custom Metaboxes Fields Example
|| --------------------------------------------------------------------------------------------
||
|| @package		Dilaz Metaboxes
|| @subpackage	Custom Options
|| @since		Dilaz Metaboxes 1.1
|| @author		WebDilaz Team, http://webdilaz.com
|| @copyright	Copyright (C) 2017, WebDilaz LTD
|| @link		http://webdilaz.com/metaboxes
|| @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
|| 
|| NOTE 1: Rename this file from "custom-options-sample.php" to "custom-options.php". If you
||         don't rename it, all your options and settings will be overwritten
||         when updating Dilaz Metaboxes.
|| 
|| NOTE 2: Add all your theme/plugin custom options in this file
|| 
*/

defined('ABSPATH') || exit;


/**
 * Add metaboxes into all registered dilaz metaboxes
 *
 * @param	array	$all_dilaz_metaboxes - all registered dilaz metaboxes
 *
 * @return	array
 */
add_filter( 'dilaz_meta_boxes_filter', 'dilaz_custom_options_example', 10, 1 );
function dilaz_custom_options_example( array $dilaz_meta_boxes ) {
	
	# BOX - Test Beta
	# =============================================================================================
	$dilaz_meta_boxes[] = array(
		'id'	   => DILAZ_MB_PREFIX .'custom_options_imp',
		'title'	   => __('Custom Options Implementation', 'futurio-extra'),
		'pages'    => array('post', 'page'),
		'context'  => 'normal',
		'priority' => 'low',
		'type'     => 'metabox_set'
	);
	
		# TAB - Beta Tab 1
		# *****************************************************************************************
		$dilaz_meta_boxes[] = array(
			'id'    => DILAZ_MB_PREFIX .'custom_options',
			'title' => __('Custom Options', 'futurio-extra'),
			'icon'  => 'fa-bell-o',
			'type'  => 'metabox_tab'
		);
			
			# FIELDS - Beta Tab 1
			# >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
			$dilaz_meta_boxes[] = array(
				'id'	  => DILAZ_MB_PREFIX .'custom_1',
				'name'	  => __('Custom One:', 'futurio-extra'),
				'desc'	  => '',
				'type'	  => 'select',
				'options' => array('1','2','3'),
				'std'	  => 'default'
			);
			$dilaz_meta_boxes[] = array(
				'id'	  => DILAZ_MB_PREFIX .'custom_2',
				'name'	  => __('Custom Two:', 'futurio-extra'),
				'desc'	  => '',
				'type'	  => 'radio',
				'options' => dilaz_mb_var('yes_no'),
				'std'     => 'no'
			);
			$dilaz_meta_boxes[] = array(
				'id'	  => DILAZ_MB_PREFIX .'custom_3',
				'name'	  => __('Custom Three:', 'futurio-extra'),
				'desc'	  => '',
				'type'	  => 'radio',
				'options' => dilaz_mb_var('yes_no'),
				'std'     => 'no'
			);
	
	return $dilaz_meta_boxes;
}

/**
 * Insert metabox field before a specific field
 *
 * @param	array	$dilaz_metaboxes - all registered dilaz metaboxes
 *
 * @return	array
 */
add_filter('dilaz_meta_boxes_filter', 'dilaz_insert_option_before_field', 10, 1);
function dilaz_insert_option_before_field($dilaz_meta_boxes) {
	
	# array data to be inserted
	$insert_custom_data = [];
	
	$insert_custom_data[] = array(
		'id'	  => DILAZ_MB_PREFIX .'custom_2_b',
		'name'	  => __('INSERTED - Custom Two B:', 'futurio-extra'),
		'desc'	  => __('Custom Two B inserted before Custom Two C.', 'futurio-extra'),
		'type'	  => 'radio',
		'options' => dilaz_mb_var('def_yes_no'),
		'std'     => 'yes'
	);
	
	$insert_custom_data[] = array(
		'id'	  => DILAZ_MB_PREFIX .'custom_2_c',
		'name'	  => __('INSERTED - Custom Two C:', 'futurio-extra'),
		'desc'	  => __('Custom Two C inserted before Custom Three.', 'futurio-extra'),
		'type'	  => 'radio',
		'options' => dilaz_mb_var('def_yes_no'),
		'std'     => 'yes'
	);
	
	$new = dilaz_mb_insert_field($dilaz_meta_boxes, DILAZ_MB_PREFIX .'custom_options_imp', DILAZ_MB_PREFIX .'custom_3', $insert_custom_data, 'before');
	
	return ($new != false) ? array_merge($dilaz_meta_boxes, $new) : $dilaz_meta_boxes;
}