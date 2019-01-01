<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Custom widgets for Elementor
 *
 * This class handles custom widgets for Elementor
 *
 * @since 1.0.0
 */
final class Futurio_Elementor_Extension {

  private static $_instance = null;

  public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}
	/**
	 * Registers widgets in Elementor
	 *
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_widgets() {
		/** @noinspection PhpIncludeInspection */
		require_once FUTURIO_EXTRA_PATH . '/lib/elementor/widgets/writing-effect-headline.php';
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Futurio_Extra_Widget_Writing_Effect_Headline() );
    if ( class_exists( 'WooCommerce' ) ) {
      require_once FUTURIO_EXTRA_PATH . '/lib/elementor/widgets/woo-header-cart.php';
      \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Futurio_Extra_Woo_Header_Cart() );
    }
    require_once FUTURIO_EXTRA_PATH . '/lib/elementor/widgets/posts-carousel.php';
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Futurio_Extra_Posts() );
	}


	/**
	 * Registers widgets scripts
	 *
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function widget_scripts() {
		//typed.js - writing script
		wp_register_script(
			'jquery-typed',
			FUTURIO_EXTRA_PLUGIN_URL .'lib/elementor/widgets/js/typed.min.js' ,
			[
				'jquery',
			],
			'1.1.4',
			true
		);

		//fronted.js - plugin front-end actions
		wp_register_script(
			'futurio-extra-frontend',
			FUTURIO_EXTRA_PLUGIN_URL .'lib/elementor/widgets/js/frontend.js' ,
			[
				'elementor-waypoints',
				'jquery',
			],
			FUTURIO_EXTRA_CURRENT_VERSION,
			true
		);
	}


	/**
	 * Enqueue widgets scripts in preview mode, as later calls in widgets render will not work,
	 * as it happens in admin env
	 *
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function widget_scripts_preview() {
		wp_enqueue_script( 'jquery-typed' );
		wp_enqueue_script( 'futurio-extra-frontend' );
	}

	/**
	 * Registers widgets styles
	 *
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function widget_styles() {
		wp_register_style( 'futurio-extra-frontend', FUTURIO_EXTRA_PLUGIN_URL .'lib/elementor/widgets/css/frontend.css' );
	}

  public function add_elementor_widget_categories( $elements_manager ) {
    if ( class_exists( 'WooCommerce' ) ) {
    	$elements_manager->add_category(
    		'woocommerce',
    		[
    			'title' => __( 'WooCommerce', 'plugin-name' ),
    			'icon' => 'fa fa-plug',
    		]
    	);
    }
  }
  
	/**
	 * Widget constructor.
	 *
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
		// Register Widget Styles
		// add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
		// Register Widget Scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
		// Enqueue ALL Widgets Scripts for preview
		add_action( 'elementor/preview/enqueue_scripts', [ $this, 'widget_scripts_preview' ] );
    
    add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_widget_categories' ] );
	}
}

Futurio_Elementor_Extension::instance();
