<?php

if ( !class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_field( 'futurio_extra', array(
  'type'     => 'select',
  'settings' => 'custom_header',
  'label'    => esc_attr__( 'Elementor custom header', 'futurio-extra' ),
  'section'  => 'title_tagline',
  'default'  => '',
  'placeholder' => esc_attr__( 'Select an option', 'futurio-extra' ),
  'description' => esc_attr__( 'Note: This will override all options defined below and disable the header and main menu.', 'futurio-extra' ),
  'priority' => 5,
  'choices'  => Kirki_Helper::get_posts(
    array(
    	'posts_per_page' => -1,
    	'post_type'      => 'elementor_library'
    )
  ),
  'active_callback' => 'futurio_extra_check_for_elementor',
) );

Kirki::add_field( 'futurio_extra', array(
	'type'        => 'dimensions',
	'settings'    => 'f_logo_spacing',
	'label'       => esc_attr__( 'Logo spacing', 'futurio-extra' ),
	'section'     => 'title_tagline',
  'priority'	 => 7,
	'default'     => array(
		'top'    => '0px',
		'right'  => '0px',
		'bottom' => '0px',
		'left'   => '0px',
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'property' => 'padding',
			'element'  => '.heading-menu .site-branding-logo, .heading-row .site-branding-logo',
		),
	),
  'active_callback'	 => array(
		array(
			'setting'	 => 'custom_logo',
			'operator'	 => '!=',
			'value'		 => '',
		),
    
	),
) );
Kirki::add_field( 'futurio_extra', array(
	'type'        => 'dimensions',
	'settings'    => 'f_title_spacing',
	'label'       => esc_attr__( 'Site Title and Tagline spacing', 'futurio-extra' ),
	'section'     => 'title_tagline',
  'priority'	 => 41,
	'default'     => array(
		'top'    => '10px',
		'right'  => '0px',
		'bottom' => '0px',
		'left'   => '0px',
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'property' => 'padding',
			'element'  => '.heading-menu .site-branding-text, .heading-row .site-branding-text',
		),
	),
  'active_callback'	 => array(
		array(
			'setting'	 => 'display_header_text',
			'operator'	 => '==',
			'value'		 => false,
		),
	),
) );
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'radio-buttonset',
	'settings'	 => 'title_heading',
	'label'		 => __( 'Heading', 'futurio-extra' ),
	'section'	 => 'title_tagline',
	'default'	 => 'boxed',
	'priority'	 => 20,
	'choices'	 => array(
		'full'			 => __( 'Separate center', 'futurio-extra' ),
		'boxed'			 => __( 'Inside menu', 'futurio-extra' ),
	),
) );

Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'slider',
	'settings'	 => 'title_margin',
	'label'		 => esc_html__( 'Header spacing', 'futurio-extra' ),
	'section'	 => 'title_tagline',
	'transport'		 => 'auto',
  'priority'	 => 20,
	'default'     => 15,
  'choices'     => array(
		'min'  => '0',
		'max'  => '600',
		'step' => '1',
	),
	'output'	 => array(
		array(
			'element'	 => '.site-heading',
			'property'	 => 'padding-bottom',
			'units'		 => 'px',
		),
    array(
			'element'	 => '.site-heading',
			'property'	 => 'padding-top',
			'units'		 => 'px',
		),
	),
  'active_callback'	 => array(
		array(
			'setting'	 => 'title_heading',
			'operator'	 => '==',
			'value'		 => 'full',
		),
	),
) );
