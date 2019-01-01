<?php

if ( !class_exists( 'Kirki' ) ) {
	return;
}


Kirki::add_panel( 'colors', array(
	'priority'	 => 10,
	'title'		 => esc_attr__( 'Colors and Typography', 'futurio-extra' ),
) );

Kirki::add_section( 'top_bar_colors_section', array(
	'title'		 => esc_attr__( 'Top bar', 'futurio-extra' ),
	'panel'		 => 'colors',
	'priority'	 => 10,
) );

/**
 * Top Menu Colors
 */
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'typography',
	'settings'	 => 'topmenu_typography',
	'label'		 => esc_attr__( 'Top bar font', 'futurio-extra' ),
	'section'	 => 'top_bar_colors_section',
	'transport'	 => 'auto',
	'default'	 => array(
		'font-family'	 => '',
		'font-size'		 => '12px',
		'variant'		 => '400',
		'letter-spacing' => '0px',
		'text-transform' => 'none',
	),
  'choices' => futurio_extra_g_fonts(),
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element' => '.top-bar-section',
		), 
	),
) );
