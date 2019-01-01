<?php

if ( !class_exists( 'Kirki' ) ) {
	return;
}


Kirki::add_panel( 'colors', array(
	'priority'	 => 10,
	'title'		 => esc_attr__( 'Colors and Typography', 'futurio-extra' ),
) );

Kirki::add_section( 'sidebar_widget_section', array(
	'title'		 => esc_attr__( 'Widget', 'futurio-extra' ),
	'panel'		 => 'colors',
	'priority'	 => 10,
) );

/**
 * Widgets colors
 */
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'typography',
	'settings'	 => 'awidget_title_color',
	'label'		 => esc_attr__( 'Widget Titles', 'futurio-extra' ),
	'section'	 => 'sidebar_widget_section',
  'choices' => futurio_extra_g_fonts(),
	'transport'	 => 'auto',
	'default'	 => array(
		'font-family'	 => '',
		'font-size'		 => '15px',
		'variant'		 => '400',
		'line-height'	 => '1.6',
		'letter-spacing' => '0px',
	),
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element' => '#sidebar .widget-title h3',
		),
		array(
			'choice'	 => 'color',
			'property'	 => 'background-color',
			'element'	 => '#sidebar .widget-title:after, .offcanvas-sidebar .widget-title:after',
		),
    array(
			'choice'	 => 'color',
			'property'	 => 'border-color',
			'element'	 => '.widget-title h3',
		),
	),
) );
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'typography',
	'settings'	 => 'sidebar_widget_font',
	'label'		 => esc_attr__( 'Font', 'futurio-extra' ),
	'section'	 => 'sidebar_widget_section',
  'choices' => futurio_extra_g_fonts(),
	'transport'	 => 'auto',
	'default'	 => array(
		'font-family'	 => '',
		'font-size'		 => '15px',
		'variant'		 => '400',
		'line-height'	 => '1.6',
		'letter-spacing' => '0px',
	),
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element' => '.widget',
		),
	),
) );