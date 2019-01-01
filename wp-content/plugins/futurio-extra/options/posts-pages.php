<?php

if ( !class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_section( 'posts_pages', array(
	'title'		 => esc_attr__( 'Posts and pages', 'futurio-extra' ),
	'priority'	 => 10,
) );

Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'radio-buttonset',
	'settings'	 => 'single_featured_image',
	'label'		 => __( 'Featured image', 'futurio-extra' ),
	'section'	 => 'posts_pages',
	'default'	 => 'full',
	'priority'	 => 10,
	'choices'	 => array(
		'inside'			 => esc_attr__( 'Inside post', 'futurio-extra' ),
		'full'			 => esc_attr__( 'Full Width', 'futurio-extra' ),
	),
) );

Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'radio-buttonset',
	'settings'	 => 'single_title_position',
	'label'		 => esc_attr__( 'Title', 'futurio-extra' ),
	'section'	 => 'posts_pages',
	'default'	 => 'full',
	'priority'	 => 10,
	'choices'	 => array(
		'inside'			 => esc_attr__( 'Inside post', 'futurio-extra' ),
		'full'			 => esc_attr__( 'Full Width', 'futurio-extra' ),
	),
) );
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'slider',
	'settings'	 => 'content_spacing',
	'label'		 => esc_html__( 'Content spacing', 'futurio-extra' ),
	'section'	 => 'posts_pages',
	'transport'		 => 'auto',
  'priority'	 => 20,
	'default'     => '',
  'choices'     => array(
		'min'  => '0',
		'max'  => '50',
		'step' => '1',
	),
	'output'	 => array(
		array(
			'element'	 => '.futurio-content',
			'property'	 => 'padding-left',
			'units'		 => '%',
		),
    array(
			'element'	 => '.futurio-content',
			'property'	 => 'padding-right',
			'units'		 => '%',
		),
	),
) );
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'slider',
	'settings'	 => 'post_image_spacing',
	'label'		 => esc_attr__( 'Image area height', 'futurio-extra' ),
	'section'	 => 'posts_pages',
	'default'	 => '60',
	'transport'	 => 'auto',
	'priority'	 => 10,
	'choices'	 => array(
		'min'	 => '0',
		'max'	 => '900',
		'step'	 => '1',
	),
	'output'	 => array(
		array(
			'element'	 => '.full-head-img',
			'property'	 => 'padding-bottom',
			'units'		 => 'px',
		),
    array(
			'element'	 => '.full-head-img',
			'property'	 => 'padding-top',
			'units'		 => 'px',
		),
	),
  'active_callback'	 => array(
    array(
  		array(
  			'setting'	 => 'single_featured_image',
  			'operator'	 => '==',
  			'value'		 => 'full',
  		),
      array(
      	'setting'	 => 'single_title_position',
      	'operator'	 => '==',
      	'value'		 => 'full',
      ),
    ),
	),
) );
Kirki::add_field( 'futurio_extra', array(
	'type'		 => 'color',
	'settings'	 => 'featured_post_img_overlay',
	'label'		 => esc_attr__( 'Overlay', 'futurio-extra' ),
	'section'	 => 'posts_pages',
	'default'	 => 'rgba(0,0,0,0.3)',
	'choices'	 => array(
		'alpha' => true,
	),
	'transport'	 => 'auto',
	'priority'	 => 10,
	'output'	 => array(
		array(
			'element'	 => '.full-head-img:after ',
			'property'	 => 'background-color',
		),
	),
  'active_callback'	 => array(
    array(
  		array(
  			'setting'	 => 'single_featured_image',
  			'operator'	 => '==',
  			'value'		 => 'full',
  		),
      array(
      	'setting'	 => 'single_title_position',
      	'operator'	 => '==',
      	'value'		 => 'full',
      ),
    ),
	),
) );
