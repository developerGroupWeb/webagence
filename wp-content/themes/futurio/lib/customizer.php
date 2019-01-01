<?php
/**
 * Futurio Theme Customizer
 *
 * @package Futurio
 */

/*
 * Notifications in customizer
 */
require get_template_directory() . '/lib/customizer-plugin-recommend/customizer-notice/class-customizer-notice.php';

require get_template_directory() . '/lib/customizer-plugin-recommend/plugin-install/class-plugin-install-helper.php';

$config_customizer = array(
	'recommended_plugins' => array( 
		'futurio-extra' => array(
			'recommended' => true,
			/* translators: %s: Plugin name string */
			'description' => sprintf( esc_html__( 'To take full advantage of all the features this theme has to offer, please install and activate the %s plugin.', 'futurio' ), '<strong>Futurio Extra</strong>' ),
		),
	),
	'recommended_plugins_title' => esc_html__( 'Recommended plugin', 'futurio' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'futurio' ),
	'activate_button_label'     => esc_html__( 'Activate', 'futurio' ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'futurio' ),
);
Futurio_Customizer_Notice::init( apply_filters( 'futurio_customizer_notice_array', $config_customizer ) );