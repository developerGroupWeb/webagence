<?php

if ( !class_exists( 'Kirki' ) ) {
	return;
}


Kirki::add_panel( 'colors', array(
	'priority'	 => 10,
	'title'		 => esc_attr__( 'Colors and Typography', 'futurio-extra' ),
) );

Kirki::add_section( 'footer_typography_section', array(
	'title'		 => esc_attr__( 'Footer widgets', 'futurio-extra' ),
	'panel'		 => 'colors',
	'priority'	 => 10,
) );


/**
 * Footer widget colors
 */
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'typography',
	'settings'	 => 'footer_font_color',
	'label'		 => esc_attr__( 'Font', 'futurio-extra' ),
	'section'	 => 'footer_typography_section',
  'choices' => futurio_extra_g_fonts(),
	'transport'	 => 'auto',
	'default'	 => array(
		'font-family'	 => '',
		'variant'		 => '400',
		'letter-spacing' => '0px',
		'font-size'		 => '15px',
		'text-transform' => 'none',
	),
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element' => '#content-footer-section .widget',
		),
	),
) );
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'typography',
	'settings'	 => 'footer_widget_title_color',
	'label'		 => esc_attr__( 'Widget Titles', 'futurio-extra' ),
	'section'	 => 'footer_typography_section',
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
			'element' => '#content-footer-section .widget-title h3',
		),
		array(
			'choice'	 => 'color',
			'property'	 => 'background-color',
			'element'	 => '#content-footer-section .widget-title:after',
		),
    array(
			'choice'	 => 'color',
			'property'	 => 'border-color',
			'element'	 => '#content-footer-section .widget-title h3',
		),
	),
) );
