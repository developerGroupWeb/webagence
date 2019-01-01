<?php
/*
|| --------------------------------------------------------------------------------------------
|| Default Metaboxes Fields
|| --------------------------------------------------------------------------------------------
||
|| @package		Dilaz Metaboxes
|| @subpackage	Default Options
|| @since		Dilaz Metaboxes 1.0
|| @author		WebDilaz Team, http://webdilaz.com
|| @copyright	Copyright (C) 2017, WebDilaz LTD
|| @link		http://webdilaz.com/metaboxes
|| @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
|| 
*/

defined('ABSPATH') || exit;

/**
 * Define the metaboxes and field configurations
 *
 * @param	array $dilaz_meta_boxes
 * @return	array
 */
add_filter( 'dilaz_meta_boxes_filter', 'dilaz_default_meta_boxes' );
function dilaz_default_meta_boxes( array $dilaz_meta_boxes ) {
	
	# BOX - Options Set 1
	# =============================================================================================
	$dilaz_meta_boxes[] = array(
		'id'	   => DILAZ_MB_PREFIX .'box-simple-fields',
		'title'	   => __('Options Set 1', 'futurio-extra'),
		'pages'    => array('post', 'page'),
		'context'  => 'normal',
		'priority' => 'high',
		'type'     => 'metabox_set'
	);
		
		# TAB - Simple Options Set
		# *****************************************************************************************
		$dilaz_meta_boxes[] = array(
			'id'    => DILAZ_MB_PREFIX .'simple_options',
			'title' => __('Simple Options', 'futurio-extra'),
			'icon'  => 'fa-cog',
			'type'  => 'metabox_tab'
		);
			
			# FIELDS - Simple Fields
			# >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
			$dilaz_meta_boxes[] = array(
				'id'   => DILAZ_MB_PREFIX .'range',
				'name' => __('Range:', 'futurio-extra'),
				'desc' => __('Set range between two minimum and maximum values.', 'futurio-extra'),
				'type' => 'range',
				'args' => array(
					'min'           => array( 8,   __('Min', 'futurio-extra') ), 
					'max'           => array( 100, __('Max', 'futurio-extra') ), 
					'step'          => '2', 
					'prefix'        => '',
					'suffix'        => '%',
					'post_format'   => array('standard', 'gallery', 'quote'),
					'page_template' => array('custom', 'custom_2')
				),
				'std' => array('min_std' => 20, 'max_std' => 45),
			);
			$dilaz_meta_boxes[] = array(
				'id'      => DILAZ_MB_PREFIX .'switch_enable',
				'name'    => __('Switch Enable/Disable', 'futurio-extra'),
				'desc'    => __('Enable/disable switch option.', 'futurio-extra'),
				'type'    => 'switch',
				'options' => array(
					'enable'  => __('Enable', 'futurio-extra'), 
					'disable' => __('Disable', 'futurio-extra'),
				),
				'std'  => 'disable',
				'args' => array(
					'post_format'   => array('standard', 'video', 'chat'),
					'page_template' => array('custom_2')
				),
				'class' => ''
			);
			$dilaz_meta_boxes[] = array(
				'id'      => DILAZ_MB_PREFIX .'switch',
				'name'    => __('Switch', 'futurio-extra'),
				'desc'    => __('On/Off switch option.', 'futurio-extra'),
				'type'    => 'switch',
				'options' => array(
					1 => __('On', 'futurio-extra'), 
					0 => __('Off', 'futurio-extra'),
				),
				'std'   => 0,
				'class' => ''
			);
			$dilaz_meta_boxes[] = array(
				'id'      => DILAZ_MB_PREFIX .'buttonset',
				'name'    => __('Button Set', 'futurio-extra'),
				'desc'    => __('Set multiple options using buttonset.', 'futurio-extra'),
				'type'    => 'buttonset',
				'options' => array(
					'yes'   => __('Yes', 'futurio-extra'), 
					'no'    => __('No', 'futurio-extra'),
					'maybe' => __('Maybe', 'futurio-extra')
				),
				'std'   => 'no',
				'class' => ''
			);
			$dilaz_meta_boxes[] = array(
				'id'   => DILAZ_MB_PREFIX .'slider',
				'name' => __('Slider:', 'futurio-extra'),
				'desc' => __('Select value from range slider.', 'futurio-extra'),
				'type' => 'slider',
				'args' => array(
					'min'    => '8', 
					'max'    => '100', 
					'step'   => '2', 
					'suffix' => '%'
				),
				'std'   => '40',
				'class' => ''
			);
			$dilaz_meta_boxes[] = array(
				'id'     => DILAZ_MB_PREFIX .'textarea',
				'name'   => __('Textarea:', 'futurio-extra'),
				'desc'   => __('Description 1.', 'futurio-extra'),
				'desc2'  => __('Description 2.', 'futurio-extra'),
				'prefix' => __('Prefix', 'futurio-extra'),
				'suffix' => __('Suffix', 'futurio-extra'),
				'type'   => 'textarea',
				'std'    => 'Sample content...',
			);
			$dilaz_meta_boxes[] = array(
				'id'     => DILAZ_MB_PREFIX .'textarea_custom',
				'name'   => __('Textarea Custom:', 'futurio-extra'),
				'desc'   => __('Description 1.', 'futurio-extra'),
				'desc2'  => __('Description 2.', 'futurio-extra'),
				'prefix' => __('Prefix', 'futurio-extra'),
				'suffix' => __('Suffix', 'futurio-extra'),
				'type'   => 'textarea',
				'std'    => 'Sample content...',
				'args'   => array('cols' => '30', 'rows' => '5'),
			);
			$dilaz_meta_boxes[] = array(
				'id'     => DILAZ_MB_PREFIX .'stepper',
				'name'   => __('Numeric Stepper:', 'futurio-extra'),
				'desc'   => __('Description 1.', 'futurio-extra'),
				'desc2'  => __('Description 2.', 'futurio-extra'),
				'prefix' => __('Prefix', 'futurio-extra'),
				'suffix' => __('Suffix', 'futurio-extra'),
				'type'   => 'stepper',
				'std'    => '2',
				'args'   => array('wheel_step' => '1', 'arrow_step' => '1', 'step_limit' => '1,10'),
			);
			$dilaz_meta_boxes[] = array(
				'id'     => DILAZ_MB_PREFIX .'stepper_custom',
				'name'   => __('Numeric Stepper Custom:', 'futurio-extra'),
				'desc'   => __('Description 1.', 'futurio-extra'),
				'desc2'  => __('Description 2.', 'futurio-extra'),
				'prefix' => __('Prefix', 'futurio-extra'),
				'suffix' => __('Suffix', 'futurio-extra'),
				'type'   => 'stepper',
				'std'    => '200000',
				'args'   => array('wheel_step' => '5000', 'arrow_step' => '5000', 'step_limit' => '1000,900000', 'size' => '10'),
			);
			$dilaz_meta_boxes[] = array(
				'id'     => DILAZ_MB_PREFIX .'number',
				'name'   => __('Number:', 'futurio-extra'),
				'desc'   => __('Description 1.', 'futurio-extra'),
				'desc2'  => __('Description 2.', 'futurio-extra'),
				'prefix' => __('Prefix', 'futurio-extra'),
				'suffix' => __('Suffix', 'futurio-extra'),
				'type'   => 'number',
				'std'    => '',
			);
			$dilaz_meta_boxes[] = array(
				'id'     => DILAZ_MB_PREFIX .'number_custom',
				'name'   => __('Number Custom Size:', 'futurio-extra'),
				'desc'   => __('Description 1.', 'futurio-extra'),
				'desc2'  => __('Description 2.', 'futurio-extra'),
				'prefix' => __('Prefix', 'futurio-extra'),
				'suffix' => __('Suffix', 'futurio-extra'),
				'type'   => 'number',
				'std'    => '',
				'args'   => array('size' => '20'),
			);
			$dilaz_meta_boxes[] = array(
				'id'     => DILAZ_MB_PREFIX .'url',
				'name'   => __('URL:', 'futurio-extra'),
				'desc'   => __('Description 1.', 'futurio-extra'),
				'desc2'  => __('Description 2.', 'futurio-extra'),
				'prefix' => __('Prefix', 'futurio-extra'),
				'suffix' => __('Suffix', 'futurio-extra'),
				'type'   => 'url',
				'std'    => '',
			);
			$dilaz_meta_boxes[] = array(
				'id'     => DILAZ_MB_PREFIX .'url_custom',
				'name'   => __('URL Custom Size:', 'futurio-extra'),
				'desc'   => __('Description 1.', 'futurio-extra'),
				'desc2'  => __('Description 2.', 'futurio-extra'),
				'prefix' => __('Prefix', 'futurio-extra'),
				'suffix' => __('Suffix', 'futurio-extra'),
				'type'   => 'url',
				'std'    => '',
				'args'   => array('size' => '50'),
			);
			$dilaz_meta_boxes[] = array(
				'id'     => DILAZ_MB_PREFIX .'password',
				'name'   => __('Password:', 'futurio-extra'),
				'desc'   => __('Description 1.', 'futurio-extra'),
				'desc2'  => __('Description 2.', 'futurio-extra'),
				'prefix' => __('Prefix', 'futurio-extra'),
				'suffix' => __('Suffix', 'futurio-extra'),
				'type'   => 'password',
			);
			$dilaz_meta_boxes[] = array(
				'id'    => DILAZ_MB_PREFIX .'paragraph',
				'name'  => __('Paragraph Field', 'futurio-extra'),
				'desc'  => __('Description 1.', 'futurio-extra'),
				'desc2' => __('Description 2.', 'futurio-extra'),
				'type'  => 'paragraph',
				'value' => 'Your privacy is important to us. We at ThemeDilaz, have created this privacy policy to demonstrate our firm commitment to protecting your personal information and informing you about how we handle it. 
				
				This privacy policy only applies to transactions and activities in which you engage, and data gathered, on the ThemeDilaz Website. Please review this privacy policy periodically as we may modify it from time to time. 
				
				Each time you visit the Site or provide us with information, by doing so you are accepting the practices described in this privacy policy at that time.',
			);
			$dilaz_meta_boxes[] = array(
				'id'    => DILAZ_MB_PREFIX .'hidden',
				'type'  => 'hidden',
				'value' => 'hidden',
			);
			$dilaz_meta_boxes[] = array(
				'id'     => DILAZ_MB_PREFIX .'text',
				'name'   => __('Text:', 'futurio-extra'),
				'desc'   => __('Description 1.', 'futurio-extra'),
				'desc2'  => __('Description 2.', 'futurio-extra'),
				'prefix' => __('Prefix', 'futurio-extra'),
				'suffix' => __('Suffix', 'futurio-extra'),
				'type'   => 'text',
				'std'    => 'placeholder',
			);
			$dilaz_meta_boxes[] = array(
				'id'     => DILAZ_MB_PREFIX .'email',
				'name'   => __('Email:', 'futurio-extra'),
				'desc'   => __('Description 1.', 'futurio-extra'),
				'desc2'  => __('Description 2.', 'futurio-extra'),
				'prefix' => __('Prefix', 'futurio-extra'),
				'suffix' => __('Suffix', 'futurio-extra'),
				'type'   => 'email',
			);
			$dilaz_meta_boxes[] = array(
				'id'     => DILAZ_MB_PREFIX .'text_custom',
				'name'   => __('Text Custom Size:', 'futurio-extra'),
				'desc'   => __('Description 1.', 'futurio-extra'),
				'desc2'  => __('Description 2.', 'futurio-extra'),
				'prefix' => __('Prefix', 'futurio-extra'),
				'suffix' => __('Suffix', 'futurio-extra'),
				'type'   => 'text',
				'std'    => 'placeholder',
				'args'   => array('size' => '40'),
			);
		
		# TAB - Media Options Set
		# *****************************************************************************************
		$dilaz_meta_boxes[] = array(
			'id'    => DILAZ_MB_PREFIX .'media_options',
			'title' => __('Media Options', 'futurio-extra'),
			'icon'  => 'fa-tv',
			'type'  => 'metabox_tab'
		);
			
			# FIELDS - Media Fields
			# >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
			$dilaz_meta_boxes[] = array(
				'id'   => DILAZ_MB_PREFIX .'image_file_multiple',
				'name' => __('Image File (Multiple):', 'futurio-extra'),
				'desc' => __('Select/Upload multiple image files from media library.', 'futurio-extra'),
				'type' => 'upload',
				'std'  => '',
				'args' => array(
					'file_type' => 'image', 
					'multiple'  => true,
					// 'file_specific' => true, 
				),
			);
			$dilaz_meta_boxes[] = array( 
				'id'   => DILAZ_MB_PREFIX .'image_file',
				'name' => __('Image File:', 'futurio-extra'),
				'desc' => __('Select/Upload single image file from media library.', 'futurio-extra'),
				'type' => 'upload',
				'std'  => '',
				'args' => array(
					'file_type' => 'image', 
					// 'file_specific' => true
				),
			);
			$dilaz_meta_boxes[] = array(
				'id'   => DILAZ_MB_PREFIX .'audio_file_multiple',
				'name' => __('Audio File (Multiple):', 'futurio-extra'),
				'desc' => __('Select/Upload multiple audio files from media library.', 'futurio-extra'),
				'type' => 'upload',
				'std'  => '',
				'args' => array(
					'file_type' => 'audio',  
					'multiple'  => true,
					// 'file_specific' => true,
				),
			);
			$dilaz_meta_boxes[] = array(
				'id'   => DILAZ_MB_PREFIX .'audio_file',
				'name' => __('Audio File:', 'futurio-extra'),
				'desc' => __('Select/Upload single audio file from media library.', 'futurio-extra'),
				'type' => 'upload',
				'std'  => '',
				'args' => array(
					'file_type' => 'audio', 
					// 'file_specific' => true
				),
			);
			$dilaz_meta_boxes[] = array(
				'id'   => DILAZ_MB_PREFIX .'video_file_multiple',
				'name' => __('Video File (Multiple):', 'futurio-extra'),
				'desc' => __('Select/Upload multiple video files from media library.', 'futurio-extra'),
				'type' => 'upload',
				'std'  => '',
				'args' => array(
					'file_type' => 'video',
					'multiple'  => true, 
					// 'file_specific' => true
				),
			);
			$dilaz_meta_boxes[] = array(
				'id'   => DILAZ_MB_PREFIX .'video_file',
				'name' => __('Video File:', 'futurio-extra'),
				'desc' => __('Select/Upload single video file from media library.', 'futurio-extra'),
				'type' => 'upload',
				'std'  => '',
				'args' => array(
					'file_type' => 'video', 
					// 'file_specific' => true
				),
			);
		
		# TAB - Date Options Set
		# *****************************************************************************************
		$dilaz_meta_boxes[] = array(
			'id'    => DILAZ_MB_PREFIX .'date_options',
			'title' => __('Date Options', 'futurio-extra'),
			'icon'  => 'fa-calendar',
			'type'  => 'metabox_tab'
		);
			
			# FIELDS - Date Fields
			# >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
			$dilaz_meta_boxes[] = array(
				'id'   => DILAZ_MB_PREFIX .'date_time_from_to',
				'name' => __('Date Time (From - To):', 'futurio-extra'),
				'desc' => __('Combined date and time difference between time sets.', 'futurio-extra'),
				'type' => 'date_time_from_to',
				'std'  => '',
				'args' => array(
					'size'      => '50',
					'from_args' => array(
						'format'    => 'l, d F Y h:i:s A',
						'date_time' => '',
						'prefix'    => __('From:', 'futurio-extra'),
					),
					'to_args' => array(
						'format'    => 'l, d F Y h:i:s A',
						'date_time' => '',
						'prefix'    => __('To:', 'futurio-extra'),
					),					
				),
			);
			$dilaz_meta_boxes[] = array(
				'id'   => DILAZ_MB_PREFIX .'date_time',
				'name' => __('Date Time:', 'futurio-extra'),
				'desc' => __('Combined date and time option.', 'futurio-extra'),
				'type' => 'date_time',
				'std'  => '',
				'args' => array(
					'format' => 'l, d F Y h:i:s A', 
					'size'   => '50'
				),
			);
			$dilaz_meta_boxes[] = array(
				'id'   => DILAZ_MB_PREFIX .'time_from_to',
				'name' => __('Time (From - To):', 'futurio-extra'),
				'desc' => __('Time difference between time sets.', 'futurio-extra'),
				'type' => 'time_from_to',
				'std'  => '',
				'args' => array(
					'size'      => '20',
					'from_args' => array(
						'format' => 'h:i:s A',
						'time'   => '',
						'prefix' => __('From:', 'futurio-extra'),
					),
					'to_args' => array(
						'format' => 'h:i:s A',
						'time'   => '',
						'prefix' => __('To:', 'futurio-extra'),
					),					
				),
			);
			$dilaz_meta_boxes[] = array(
				'id'   => DILAZ_MB_PREFIX .'time',
				'name' => __('Time:', 'futurio-extra'),
				'desc' => __('Time option.', 'futurio-extra'),
				'type' => 'time',
				'std'  => '07:00',
				'args' => array(
					'format' => 'h:i:s A', 
					'size'   => '20'
				),
			);
			$dilaz_meta_boxes[] = array(
				'id'   => DILAZ_MB_PREFIX .'month_from_to',
				'name' => __('Month (From - To):', 'futurio-extra'),
				'desc' => __('Month difference between time sets.', 'futurio-extra'),
				'type' => 'month_from_to',
				'std'  => '',
				'args' => array(
					'size'      => '20',
					'from_args' => array(
						'format' => 'F, Y',
						'month'  => '',
						'prefix' => __('From:', 'futurio-extra'),
					),
					'to_args' => array(
						'format' => 'F, Y',
						'month'  => '',
						'prefix' => __('To:', 'futurio-extra'),
					),					
				),
			);
			$dilaz_meta_boxes[] = array(
				'id'   => DILAZ_MB_PREFIX .'month',
				'name' => __('Month:', 'futurio-extra'),
				'desc' => __('Month option.', 'futurio-extra'),
				'type' => 'month',
				'std'  => '',
				'args' => array(
					'format' => 'F, Y', 
					'size'   => '20'
				),
			);
			$dilaz_meta_boxes[] = array(
				'id'   => DILAZ_MB_PREFIX .'date_from_to',
				'name' => __('Date (From - To):', 'futurio-extra'),
				'desc' => __('Date difference between time sets.', 'futurio-extra'),
				'type' => 'date_from_to',
				'std'  => '',
				'args' => array(
					'size'      => '30',
					'from_args' => array(
						'format' => 'l, d F, Y',
						'date'   => '',
						'prefix' => __('From:', 'futurio-extra'),
					),
					'to_args' => array(
						'format' => 'l, d F, Y',
						'date'   => '',
						'prefix' => __('To:', 'futurio-extra'),
					),					
				),
			);
			$dilaz_meta_boxes[] = array(
				'id'   => DILAZ_MB_PREFIX .'date',
				'name' => __('Date:', 'futurio-extra'),
				'desc' => __('Date option.', 'futurio-extra'),
				'type' => 'date',
				'std'  => '',
				'args' => array(
					'format' => 'l, d F, Y', 
					'size'   => '20'
				),
			);
		
		# TAB - Color Options Set
		# *****************************************************************************************
		$dilaz_meta_boxes[] = array(
			'id'    => DILAZ_MB_PREFIX .'color_options',
			'title' => __('Color Options', 'futurio-extra'),
			'icon'  => 'fa-paint-brush',
			'type'  => 'metabox_tab'
		);
			
			# FIELDS - Color Fields
			# >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
			$dilaz_meta_boxes[] = array(
				'id'	  => DILAZ_MB_PREFIX .'multi_color',
				'name'	  => __('Multiple Colors:', 'futurio-extra'),
				'desc'	  => __('Set any number of multiple color properties.', 'futurio-extra'),
				'desc2'	  => __('Description 2.', 'futurio-extra'),
				'type'	  => 'multicolor',
				'options' => array(
					'color1' => array('color' => '#111111', 'name' => __('Color 1', 'futurio-extra')),
					'color2' => array('color' => '#333333', 'name' => __('Color 2', 'futurio-extra')),
					'color3' => array('color' => '#555555', 'name' => __('Color 3', 'futurio-extra')),
					'color4' => array('color' => '#777777', 'name' => __('Color 4', 'futurio-extra')),
					'color5' => array('color' => '#999999', 'name' => __('Color 4', 'futurio-extra')),
				),
			);
			$dilaz_meta_boxes[] = array(
				'id'	=> DILAZ_MB_PREFIX .'color',
				'name'	=> __('Color:', 'futurio-extra'),
				'desc'	=> __('Set single color property.', 'futurio-extra'),
				'desc2'	=> __('Description 2.', 'futurio-extra'),
				'type'	=> 'color',
				'std'   => '#222222',
			);
		
		# TAB - Choice Options Set
		# *****************************************************************************************
		$dilaz_meta_boxes[] = array(
			'id'    => DILAZ_MB_PREFIX .'choice_options',
			'title' => __('Choice Options', 'futurio-extra'),
			'icon'  => 'fa-sliders',
			'type'  => 'metabox_tab'
		);
		
			# FIELDS - Choice Fields
			# >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
			$dilaz_meta_boxes[] = array(
				'id'	  => DILAZ_MB_PREFIX .'radioimage',
				'name'	  => __('Radio Image:', 'futurio-extra'),
				'desc'	  => __('Images used as radio option fields.', 'futurio-extra'),
				'type'	  => 'radioimage',
				'options' => array(
					'default' => DILAZ_MB_IMAGES .'layout-default.png',
					'left'    => DILAZ_MB_IMAGES .'layout-left.png',
					'right'   => DILAZ_MB_IMAGES .'layout-right.png',
					'full'    => DILAZ_MB_IMAGES .'layout-full.png',
				),
				'std' => 'project_default'
			);
			$dilaz_meta_boxes[] = array(
				'id'	  => DILAZ_MB_PREFIX .'term_select',
				'name'	  => __('Term Select:', 'futurio-extra'),
				'desc'	  => __('Select single or multiple terms from any taxonomy.', 'futurio-extra'),
				'type'	  => 'queryselect',
				'options' => '',
				'std'     => '',
				'args'    => array(
					'select2'      => 'select2multiple',
					'query_type'   => 'term',
					'placeholder'  => __('Select category', 'futurio-extra'),
					'select2width' => '50%',
					'min_input'    => 1,
					'max_input'    => 100,
					'max_options'  => 10,
					'query_args'   => array(
						'taxonomy'   => 'category',
						'hide_empty' => false,
						'orderby'    => 'term_id',
						'order'      => 'ASC',
					),
				),
			);
			$dilaz_meta_boxes[] = array(
				'id'	  => DILAZ_MB_PREFIX .'user_select',
				'name'	  => __('User Select:', 'futurio-extra'),
				'desc'	  => __('Select single or multiple users from all registered members.', 'futurio-extra'),
				'type'	  => 'queryselect',
				'options' => '',
				'std'     => '',
				'args'    => array(
					'select2'      => 'select2multiple',
					'query_type'   => 'user',
					'placeholder'  => __('Select user', 'futurio-extra'),
					'select2width' => '50%',
					'min_input'    => 1,
					'max_input'    => 100,
					'max_options'  => 10,
					'query_args'   => array(
						'orderby' => 'ID',
						'order'   => 'ASC',
					),
				),
			);
			$dilaz_meta_boxes[] = array(
				'id'	  => DILAZ_MB_PREFIX .'post_select',
				'name'	  => __('Post Select:', 'futurio-extra'),
				'desc'	  => __('Select single or multiple posts.', 'futurio-extra'),
				'type'	  => 'queryselect',
				'options' => '',
				'std'     => '',
				'args'    => array(
					'select2'      => 'select2multiple',
					'query_type'   => 'post',
					'placeholder'  => __('Type to select a post', 'futurio-extra'),
					'select2width' => '50%',
					'min_input'    => 1,
					'max_input'    => 100,
					'max_options'  => 10,
					'query_args'   => array(
						'posts_per_page' => -1,
						'post_status'    => array('publish'),
						'post_type'      => array('post'),
						'order'          => 'ASC',
						'orderby'        => 'ID',
					),
				),
			);
			$dilaz_meta_boxes[] = array(
				'id'	  => DILAZ_MB_PREFIX .'timezone',
				'name'	  => __('Timezone:', 'futurio-extra'),
				'desc'	  => __('Select preferred time zone.', 'futurio-extra'),
				'type'	  => 'timezone',
				'options' => dilaz_mb_time_zones(),
				'std'     => ''
			);
			$dilaz_meta_boxes[] = array(
				'id'	  => DILAZ_MB_PREFIX .'timezone_select2',
				'name'	  => __('Timezone Select2:', 'futurio-extra'),
				'desc'	  => __('Select preferred time zone - with select2 search capability.', 'futurio-extra'),
				'type'	  => 'timezone',
				'options' => dilaz_mb_time_zones(),
				'std'     => '',
				'args'    => array(
					'select2'      => 'select2single',
					'select2width' => '365px',
				),
			);
			$dilaz_meta_boxes[] = array(
				'id'      => DILAZ_MB_PREFIX .'multiselect_select2',
				'name'    => __('Multiselect Single - Select2 Plugin:', 'futurio-extra'),
				'desc'    => __('Select multiple options using select2 plugin.', 'futurio-extra'),
				'type'    => 'multiselect',
				'options' => array(
					''    => '',
					'mon' => __('Monday', 'futurio-extra'),
					'tue' => __('Tuesday', 'futurio-extra'),
					'wed' => __('Wednesday', 'futurio-extra'),
					'thu' => __('Thursday', 'futurio-extra'),
					'fri' => __('Friday', 'futurio-extra'),
					'sat' => __('Saturday', 'futurio-extra'),
					'sun' => __('Sunday', 'futurio-extra')
				),
				'std'  => array('thu'),
				'args' => array(
					'select2'      => 'select2single',
					'select2width' => '50%',
				),
			);
			$dilaz_meta_boxes[] = array(
				'id'      => DILAZ_MB_PREFIX .'multiselect',
				'name'    => __('Multiselect Single Default:', 'futurio-extra'),
				'desc'    => __('Select multiple options by pressing Ctrl(PC) or Cmd(Mac).', 'futurio-extra'),
				'type'    => 'multiselect',
				'options' => array(
					''    => '',
					'mon' => __('Monday', 'futurio-extra'),
					'tue' => __('Tuesday', 'futurio-extra'),
					'wed' => __('Wednesday', 'futurio-extra'),
					'thu' => __('Thursday', 'futurio-extra'),
					'fri' => __('Friday', 'futurio-extra'),
					'sat' => __('Saturday', 'futurio-extra'),
					'sun' => __('Sunday', 'futurio-extra')
				),
				'std' => array('thu'),
			);
			$dilaz_meta_boxes[] = array(
				'id'      => DILAZ_MB_PREFIX .'select_select2',
				'name'    => __('Select Single - Select2 Plugin:', 'futurio-extra'),
				'desc'    => __('Select single option using select2 plugin - has search capability.', 'futurio-extra'),
				'type'    => 'select',
				'options' => array(
					''    => '',
					'mon' => __('Monday', 'futurio-extra'),
					'tue' => __('Tuesday', 'futurio-extra'),
					'wed' => __('Wednesday', 'futurio-extra'),
					'thu' => __('Thursday', 'futurio-extra'),
					'fri' => __('Friday', 'futurio-extra'),
					'sat' => __('Saturday', 'futurio-extra'),
					'sun' => __('Sunday', 'futurio-extra')
				),
				'std'  => array('thu'),
				'args' => array(
					'select2'      => 'select2single',
					'select2width' => '50%',
				),
			);
			$dilaz_meta_boxes[] = array(
				'id'      => DILAZ_MB_PREFIX .'select',
				'name'    => __('Select Single Default:', 'futurio-extra'),
				'desc'    => __('Default single option selection.', 'futurio-extra'),
				'type'    => 'select',
				'options' => array(
					''    => '',
					'mon' => __('Monday', 'futurio-extra'),
					'tue' => __('Tuesday', 'futurio-extra'),
					'wed' => __('Wednesday', 'futurio-extra'),
					'thu' => __('Thursday', 'futurio-extra'),
					'fri' => __('Friday', 'futurio-extra'),
					'sat' => __('Saturday', 'futurio-extra'),
					'sun' => __('Sunday', 'futurio-extra')
				),
				'std' => array('thu'),
			);
			$dilaz_meta_boxes[] = array(
				'id'      => DILAZ_MB_PREFIX .'multicheck',
				'name'    => __('Day of the Week:', 'futurio-extra'),
				'desc'    => __('Tiled multiple checkbox options selection.', 'futurio-extra'),
				'type'    => 'multicheck',
				'options' => array(
					'mon' => __('Monday', 'futurio-extra'),
					'tue' => __('Tuesday', 'futurio-extra'),
					'wed' => __('Wednesday', 'futurio-extra'),
					'thu' => __('Thursday', 'futurio-extra'),
					'fri' => __('Friday', 'futurio-extra'),
					'sat' => __('Saturday', 'futurio-extra'),
					'sun' => __('Sunday', 'futurio-extra')
				),
				'std' => array('thu'),
			);
			$dilaz_meta_boxes[] = array(
				'id'      => DILAZ_MB_PREFIX .'multicheck_inline',
				'name'    => __('Multicheck Inline:', 'futurio-extra'),
				'desc'    => __('Inline multiple checkbox options selection.', 'futurio-extra'),
				'type'    => 'multicheck',
				'options' => array(
					'mon' => __('Monday', 'futurio-extra'),
					'tue' => __('Tuesday', 'futurio-extra'),
					'wed' => __('Wednesday', 'futurio-extra'),
					'thu' => __('Thursday', 'futurio-extra'),
					'fri' => __('Friday', 'futurio-extra'),
					'sat' => __('Saturday', 'futurio-extra'),
					'sun' => __('Sunday', 'futurio-extra')
				),
				'std'  => array('thu'),
				'args' => array('inline' => true, 'cols' => 4),
			);
			$dilaz_meta_boxes[] = array(
				'id'     => DILAZ_MB_PREFIX .'checkbox',
				'name'   => __('Checkbox:', 'futurio-extra'),
				'desc'   => __('Single checkbox selection.', 'futurio-extra'),
				'desc2'  => __('Description 2.', 'futurio-extra'),
				'prefix' => __('Prefix', 'futurio-extra'),
				'suffix' => __('Suffix', 'futurio-extra'),
				'type'   => 'checkbox',
				'std'    => 0,
			);
			$dilaz_meta_boxes[] = array(
				'id'      => DILAZ_MB_PREFIX .'radio',
				'name'    => __('Radio:', 'futurio-extra'),
				'desc'    => __('Tiled radio options selection.', 'futurio-extra'),
				'type'    => 'radio',
				'options' => array(
					'one'   => __('One', 'futurio-extra'),
					'two'   => __('Two', 'futurio-extra'),
					'three' => __('Three', 'futurio-extra'),
				),
				'std' => 'two',
			);
			$dilaz_meta_boxes[] = array(
				'id'      => DILAZ_MB_PREFIX .'radio_inline',
				'name'    => __('Radio Inline:', 'futurio-extra'),
				'desc'    => __('Inline radio options selection.', 'futurio-extra'),
				'type'    => 'radio',
				'options' => array(
					'one'   => __('One', 'futurio-extra'),
					'two'   => __('Two', 'futurio-extra'),
					'three' => __('Three', 'futurio-extra'),
				),
				'std'  => 'two',
				'args' => array('inline' => true),
			);
		
		# TAB - Editor Options Set
		# *****************************************************************************************
		$dilaz_meta_boxes[] = array(
			'id'    => DILAZ_MB_PREFIX .'editor_options',
			'title' => __('Editor Options', 'futurio-extra'),
			'icon'  => 'fa-bold',
			'type'  => 'metabox_tab'
		);
			
			# FIELDS - Editor Fields
			# >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
			$dilaz_meta_boxes[] = array(
				'id'   => DILAZ_MB_PREFIX .'editor',
				'name' => __('Editor:', 'futurio-extra'),
				'desc' => __('Default WordPress text editor.', 'futurio-extra'),
				'type' => 'editor',
			);
			$dilaz_meta_boxes[] = array(
				'id'   => DILAZ_MB_PREFIX .'editor_custom',
				'name' => __('Editor Custom:', 'futurio-extra'),
				'desc' => __('Default WordPress text editor with more rows.', 'futurio-extra'),
				'type' => 'editor',
				'args' => array('rows' => '55'),
			);
			
			
		# TAB - Conditionals Options Set
		# *****************************************************************************************
		$dilaz_meta_boxes[] = array(
			'id'    => DILAZ_MB_PREFIX .'conditionals',
			'title' => __('Conditionals', 'futurio-extra'),
			'icon'  => 'fa-toggle-on',
			'type'  => 'metabox_tab'
		);
			
			# FIELDS - Conditional Fields
			# >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
			$dilaz_meta_boxes[] = array(
				'id'	  => DILAZ_MB_PREFIX .'continent',
				'name'	  => __('Continent:', 'futurio-extra'),
				'desc'	  => '',
				'type'	  => 'select',
				'options' => array(
					''   => __('Select Continent', 'futurio-extra'),
					'eu' => __('Europe', 'futurio-extra'),
					'na' => __('North America', 'futurio-extra'),
				),
				'std'  => 'default',
				'args' => array('inline' => true),
			);
			$dilaz_meta_boxes[] = array(
				'id'      => DILAZ_MB_PREFIX .'eu_country',
				'name'    => __('Europe Country:', 'futurio-extra'),
				'desc'    => '',
				'type'    => 'radio',
				'options' => array(
					'de' => __('Germany', 'futurio-extra'),
					'gb' => __('United Kingdom', 'futurio-extra'),
				),
				'std'      => 'default',
				'args'     => array('inline' => true),
				'req_args' => array(
					DILAZ_MB_PREFIX .'continent' => 'eu'
				),
				'req_action' => 'show',
			);
			$dilaz_meta_boxes[] = array(
				'id'      => DILAZ_MB_PREFIX .'na_country',
				'name'    => __('North America Country:', 'futurio-extra'),
				'desc'    => '',
				'type'    => 'radio',
				'options' => array(
					'us' => __('United States', 'futurio-extra'),
					'ca' => __('Canada', 'futurio-extra'),
				),
				'std'      => 'default',
				'args'     => array('inline' => true),
				'req_args' => array(
					DILAZ_MB_PREFIX .'continent' => 'na'
				),
				'req_cond'   => 'AND',
				'req_action' => 'show',
			);
			$dilaz_meta_boxes[] = array(
				'id'      => DILAZ_MB_PREFIX .'de_division',
				'name'    => __('Germany Division:', 'futurio-extra'),
				'desc'    => '',
				'type'    => 'multicheck',
				'options' => array(
					'hh' => __('Hamburg', 'futurio-extra'),
					'be' => __('Berlin', 'futurio-extra'),
					'sh' => __('Schleswig-Holstein', 'futurio-extra'),
				),
				'std'      => 'default',
				'args'     => array('inline' => true),
				'req_args' => array(
					DILAZ_MB_PREFIX .'continent'  => 'eu',
					DILAZ_MB_PREFIX .'eu_country' => 'de'
				),
				'req_cond'   => 'AND',
				'req_action' => 'show',
			);
			$dilaz_meta_boxes[] = array(
				'id'      => DILAZ_MB_PREFIX .'gb_division',
				'name'    => __('United Kingdom Division:', 'futurio-extra'),
				'desc'    => '',
				'type'    => 'multicheck',
				'options' => array(
					'abd' => __('Aberdeen City', 'futurio-extra'),
					'bir' => __('Birmingham', 'futurio-extra'),
					'lce' => __('Leicester', 'futurio-extra'),
					'man' => __('Manchester', 'futurio-extra'),
				),
				'std'      => 'default',
				'args'     => array('inline' => true),
				'req_args' => array(
					DILAZ_MB_PREFIX .'continent'  => 'eu',
					DILAZ_MB_PREFIX .'eu_country' => 'gb'
				),
				'req_cond'   => 'AND',
				'req_action' => 'show',
			);
			$dilaz_meta_boxes[] = array(
				'id'      => DILAZ_MB_PREFIX .'us_division',
				'name'    => __('US State:', 'futurio-extra'),
				'desc'    => '',
				'type'    => 'multicheck',
				'options' => array(
					'wa' => __('Washington', 'futurio-extra'),
					'oh' => __('Ohio', 'futurio-extra'),
					'mt' => __('Montana', 'futurio-extra'),
					'ga' => __('Georgia', 'futurio-extra'),
				),
				'std'      => 'default',
				'args'     => array('inline' => true),
				'req_args' => array(
					DILAZ_MB_PREFIX .'continent'  => 'na',
					DILAZ_MB_PREFIX .'na_country' => 'us'
				),
				'req_cond'   => 'AND',
				'req_action' => 'show',
			);
			$dilaz_meta_boxes[] = array(
				'id'      => DILAZ_MB_PREFIX .'us_division',
				'name'    => __('Canada Division:', 'futurio-extra'),
				'desc'    => '',
				'type'    => 'multicheck',
				'options' => array(
					'on' => __('Ontario', 'futurio-extra'),
					'sk' => __('Saskatchewan', 'futurio-extra'),
					'qc' => __('Quebec', 'futurio-extra'),
				),
				'std'      => 'default',
				'args'     => array('inline' => true),
				'req_args' => array(
					DILAZ_MB_PREFIX .'continent'  => 'na',
					DILAZ_MB_PREFIX .'na_country' => 'ca'
				),
				'req_cond'   => 'AND',
				'req_action' => 'show',
			);
			
			
	# BOX - Test Beta
	# =============================================================================================
	$dilaz_meta_boxes[] = array(
		'id'	   => 'dilaz-meta-box-test-beta',
		'title'	   => __('Test Beta', 'futurio-extra'),
		'pages'    => array('post', 'page'),
		'context'  => 'normal',
		'priority' => 'low',
		'type'     => 'metabox_set'
	);
	
		# TAB - Beta Tab 1
		# *****************************************************************************************
		$dilaz_meta_boxes[] = array(
			'id'    => DILAZ_MB_PREFIX .'beta_tab_1',
			'title' => __('Beta Tab 1', 'futurio-extra'),
			'icon'  => 'fa-anchor',
			'type'  => 'metabox_tab'
		);
			
			# FIELDS - Beta Tab 1
			# >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
			$dilaz_meta_boxes[] = array(
				'id'	  => DILAZ_MB_PREFIX .'beta_select_option',
				'name'	  => __('Select Something:', 'futurio-extra'),
				'desc'	  => __('Select an option below.', 'futurio-extra'),
				'type'	  => 'select',
				'options' => array(
					'0' => __('Default', 'futurio-extra'),
					'1' => __('One', 'futurio-extra'),
					'2' => __('Two', 'futurio-extra'),
					'3' => __('Three', 'futurio-extra'),
					'4' => __('Four', 'futurio-extra'),
					'5' => __('Five', 'futurio-extra')
				),
				'std' => 'default'
			);
			
	return $dilaz_meta_boxes;
}