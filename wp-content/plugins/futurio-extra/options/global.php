<?php

if ( !class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_section( 'global_section', array(
	'title'		 => esc_attr__( 'Global Options', 'futurio-extra' ),
	'priority'	 => 10,
) );

Kirki::add_field( 'futurio_extra', array(
  'type'     => 'select',
  'settings' => 'custom_404_page',
  'label'    => esc_attr__( 'Elementor 404 page', 'futurio-extra' ),
  'section'  => 'global_section',
  'default'  => '',
  'placeholder' => esc_attr__( 'Select an option', 'futurio-extra' ),
  'description' => esc_attr__( 'Note: This will override your 404 page.', 'futurio-extra' ),
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
	'type'		 => 'radio-buttonset',
	'settings'	 => 'widgets-width',
	'label'		 => esc_attr__( 'Footer widgets columns', 'futurio-extra' ),
	'section'	 => 'global_section',
	'default'	 => '25',
	'priority'	 => 10,
	'transport'	 => 'auto',
	'choices'	 => array(
		'100'			 => '1',
		'50'			 => '2',
		'33.33333333'	 => '3',
		'25'			 => '4',
	),
	'output'	 => array(
		array(
			'element'		 => '.widget.col-md-3',
			'property'		 => 'width',
			'media_query'	 => '@media (min-width: 992px)',
			'units'			 => '%',
		),
	),
) );

Kirki::add_field( 'futurio_extra', array(
	'type'        => 'toggle',
	'settings'    => 'site_preloader',
	'label'		 => esc_attr__( 'Website preloader', 'futurio-extra' ),
	'section'     => 'global_section',
	'default'     => '0',
	'priority'    => 10,
) );
