<?php

if ( !class_exists( 'Kirki' ) ) {
	return;
}


Kirki::add_section( 'header_colors_section', array(
	'title'		 => esc_attr__( 'Header & Title', 'futurio-extra' ),
	'panel'		 => 'colors',
	'priority'	 => 10,
) );


/**
 * Header colors
 */
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'typography',
	'settings'	 => 'header_typography_site_title',
	'label'		 => esc_attr__( 'Site title font', 'futurio-extra' ),
	'section'	 => 'header_colors_section',
	'transport'	 => 'auto',
	'default'	 => array(
		'font-family'	 => '',
    'color' => '',
		'variant'		 => '700',
		'letter-spacing' => '0px',
		'font-size'		 => '28px',
    'line-height'		 => '32px',
		'text-transform' => 'none',
	),
  'choices' => futurio_extra_g_fonts(),
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element' => '.site-branding-text h1.site-title a:hover, .site-branding-text .site-title a:hover, .site-branding-text h1.site-title, .site-branding-text .site-title, .site-branding-text h1.site-title a, .site-branding-text .site-title a',
		),
	),
) );
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'typography',
	'settings'	 => 'header_typography_site_desc',
	'transport'	 => 'auto',
	'label'		 => esc_attr__( 'Site description font', 'futurio-extra' ),
	'section'	 => 'header_colors_section',
	'default'	 => array(
		'font-family'	 => '',
    'color' => '',
		'variant'		 => '400',
		'letter-spacing' => '0px',
		'font-size'		 => '15px',
    'line-height'		 => '22px',
		'text-transform' => 'none',
	),
  'choices' => futurio_extra_g_fonts(),
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element' => 'p.site-description',
		),
	),
) );
