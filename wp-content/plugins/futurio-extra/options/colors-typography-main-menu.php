<?php

if ( !class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_section( 'main_menu_colors_section', array(
	'title'		 => esc_attr__( 'Main Menu', 'futurio-extra' ),
	'panel'		 => 'colors',
	'priority'	 => 10,
) );

/**
 * Main Menu colors
 */
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'typography',
	'settings'	 => 'typography_mainmenu',
	'label'		 => esc_attr__( 'Menu Font', 'futurio-extra' ),
	'section'	 => 'main_menu_colors_section',
  'choices' => futurio_extra_g_fonts(),
	'transport'	 => 'auto',
	'default'	 => array(
		'font-family'	 => '',
		'font-size'		 => '15px',
		'variant'		 => '400',
		'letter-spacing' => '0px',
		'text-transform' => 'uppercase',
	),
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element' => '#site-navigation, #site-navigation .navbar-nav > li > a, #site-navigation .dropdown-menu > li > a',
		),
    array(
			'choice'	 => 'color',
			'element'	 => '.open-panel span',
      'property'		 => 'background-color',
		),
    array(
			'choice'	 => 'color',
			'element'	 => '.open-panel span, .header-cart a.cart-contents, .header-login a, .top-search-icon i, .offcanvas-sidebar-toggle i, .site-header-cart, .site-header-cart a',
      'property'		 => 'color',
		),
	),
) );