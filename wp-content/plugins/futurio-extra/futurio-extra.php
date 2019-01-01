<?php
/*
 * Plugin Name: Futurio Extra
 * Plugin URI: https://futuriowp.com/
 * Description: Extra addon for Futurio Theme
 * Version: 1.1.0
 * Author: FuturioWP
 * Author URI: https://futuriowp.com/
 * License: GPL-2.0+
 * WC requires at least: 3.3.0
 * WC tested up to: 3.5.2
 */

if ( !function_exists( 'add_action' ) ) {
	die( 'Nothing to do...' );
}

$plugin_data	 = get_file_data( __FILE__, array( 'Version' => 'Version' ), false );
$plugin_version	 = $plugin_data[ 'Version' ];
// Define WC_PLUGIN_FILE.
if ( ! defined( 'FUTURIO_EXTRA_CURRENT_VERSION' ) ) {
	define( 'FUTURIO_EXTRA_CURRENT_VERSION', $plugin_version );
}

//plugin constants
define( 'FUTURIO_EXTRA_PATH', plugin_dir_path( __FILE__ ) );
define( 'FUTURIO_EXTRA_PLUGIN_BASE', plugin_basename( __FILE__ ) );

define( 'FUTURIO_EXTRA_PLUGIN_URL', plugins_url( '/', __FILE__ ) );


add_action( 'plugins_loaded', 'futurio_extra_load_textdomain' );

function futurio_extra_load_textdomain() {
	load_plugin_textdomain( 'futurio-extra', false, basename( dirname( __FILE__ ) ) . '/languages/' );
}

function futurio_extra_scripts() {
	wp_enqueue_style( 'futurio-extra', plugin_dir_url( __FILE__ ) . 'css/style.css', array(), FUTURIO_EXTRA_CURRENT_VERSION );
	wp_enqueue_script( 'futurio-extra-js', plugin_dir_url( __FILE__ ) . 'js/futurio-extra.js', array( 'jquery' ), FUTURIO_EXTRA_CURRENT_VERSION, true );
}

add_action( 'wp_enqueue_scripts', 'futurio_extra_scripts' );

/* Footer copy texts */
if ( !function_exists( 'futurio_extra_text' ) ) {

	function futurio_extra_text( $rewritetexts ) {

		$currentyear = date( 'Y' );
		$copy		 = '&copy;';

		return str_replace(
		array( '%current_year%', '%copy%' ), array( $currentyear, $copy ), $rewritetexts
		);
	}

}

add_filter( 'futurio_extra_footer_text', 'futurio_extra_text' );

add_action( 'after_setup_theme', 'futurio_extra_action', 0 );

function futurio_extra_action() {

	remove_action( 'futurio_generate_footer', 'futurio_generate_construct_footer' );
	add_action( 'futurio_generate_footer', 'futurio_extra_generate_construct_footer' );
  add_action( 'futurio_header_body', 'futurio_extra_preloader' );
}

function futurio_extra_generate_construct_footer() {
  if ( get_theme_mod( 'custom_footer', '' ) != '' && futurio_extra_check_for_elementor() ) {
    $elementor_section_ID = get_theme_mod( 'custom_footer', '' );
    ?>
    <footer id="colophon" class="elementor-footer-credits">
    	<?php echo do_shortcode( '[elementor-template id="' . $elementor_section_ID . '"]' ); ?>	
	 </footer>
  <?php	} elseif ( get_theme_mod( 'footer-credits', '' ) != '' ) { ?>
    <footer id="colophon" class="footer-credits container-fluid">
  		<div class="container">
    		<div class="footer-credits-text text-center">
    			<?php echo apply_filters( 'futurio_extra_footer_text', get_theme_mod( 'footer-credits', '' ) ); ?>
    		</div>
      </div>	
	 </footer>
  <?php } else { ?>
    <footer id="colophon" class="footer-credits container-fluid">
  		<div class="container">
    		<div class="footer-credits-text text-center">
    			<?php printf( __( 'Proudly powered by %s', 'futurio-extra' ), '<a href="' . esc_url( __( 'https://wordpress.org/', 'futurio-extra' ) ) . '">WordPress</a>' ); ?>
    			<span class="sep"> | </span>
    			<?php printf( __( 'Theme: %1$s', 'futurio-extra' ), '<a href="https://futurio.com/">Futurio</a>' ); ?>
    		</div>
      </div>	
  	</footer>
	<?php
	}
}

function futurio_extra_preloader() {
	if ( get_theme_mod( 'site_preloader', 0 ) == 1 ) :
		?>
		<div id="loader-wrapper">
      <div id="loader"></div>
      
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
      
    </div>
	<?php
	endif;
}

if ( !class_exists( 'Kirki' ) ) {
  include_once( plugin_dir_path( __FILE__ ) . 'include/kirki.php' );
}
  
/* Register the config */
Kirki::add_config( 'futurio_extra', array(
  'capability'	 => 'edit_theme_options',
  'option_type'	 => 'theme_mod',
) );

//add_filter( 'kirki_dynamic_css_method', function() {
//    return 'file';
//} );


add_action('plugins_loaded', 'futurio_extra_check_for_woocommerce');
add_action('plugins_loaded', 'futurio_extra_check_for_pro');

function futurio_extra_check_for_woocommerce() {
    if (!defined('WC_VERSION')) {
      // no woocommerce :(
    } elseif ( !defined('FUTURIO_PRO_CURRENT_VERSION') ) {
      require_once( plugin_dir_path( __FILE__ ) . 'options/woocommerce.php' );
    }
    
}

require_once( plugin_dir_path( __FILE__ ) . 'options/demo-import.php' );
require_once( plugin_dir_path( __FILE__ ) . 'options/documentation.php' );
require_once( plugin_dir_path( __FILE__ ) . 'options/footer-credits.php' );

function futurio_extra_check_for_pro() {

    if ( !defined('FUTURIO_PRO_CURRENT_VERSION') ) {
      require_once( plugin_dir_path( __FILE__ ) . 'options/footer-credits.php' );
      require_once( plugin_dir_path( __FILE__ ) . 'options/colors-typography-presets.php' );
      require_once( plugin_dir_path( __FILE__ ) . 'options/colors-typography.php' );
      require_once( plugin_dir_path( __FILE__ ) . 'options/colors-typography-top-bar.php' );
      require_once( plugin_dir_path( __FILE__ ) . 'options/colors-typography-header-title.php' );
      require_once( plugin_dir_path( __FILE__ ) . 'options/colors-typography-main-menu.php' );
      require_once( plugin_dir_path( __FILE__ ) . 'options/colors-typography-widget.php' );
      require_once( plugin_dir_path( __FILE__ ) . 'options/colors-typography-footer-widget.php' );
      require_once( plugin_dir_path( __FILE__ ) . 'options/colors-typography-footer-credits.php' );
      require_once( plugin_dir_path( __FILE__ ) . 'options/header.php' );
      require_once( plugin_dir_path( __FILE__ ) . 'options/global.php' );
      require_once( plugin_dir_path( __FILE__ ) . 'options/top-bar.php' );
      require_once( plugin_dir_path( __FILE__ ) . 'options/menu-icons.php' );
      require_once( plugin_dir_path( __FILE__ ) . 'options/posts-pages.php' );
      require_once( plugin_dir_path( __FILE__ ) . 'options/sidebar.php' );
      require_once( plugin_dir_path( __FILE__ ) . 'options/custom-codes.php' );
    }
}


require_once( plugin_dir_path( __FILE__ ) . 'lib/metabox/metabox.php' );

require_once( plugin_dir_path( __FILE__ ) . 'lib/shortcodes/shortcodes.php' );

require_once( plugin_dir_path( __FILE__ ) . 'lib/notify.php' );

include_once( plugin_dir_path( __FILE__ ) . 'lib/widgets.php' );

include_once( plugin_dir_path( __FILE__ ) . 'lib/demo/futurio-demos.php' );
include_once( plugin_dir_path( __FILE__ ) . 'lib/admin/dashboard.php' );
include_once( plugin_dir_path( __FILE__ ) . 'lib/admin/redirect.php' );

add_action( 'customize_register', 'futurio_extra_theme_customize_register', 99 );

function futurio_extra_theme_customize_register( $wp_customize ) {

 $wp_customize->remove_control('header_textcolor');
 $wp_customize->remove_section('futurio_page_view_pro');
}

function futurio_extra_g_fonts() {
	$fonts = array(
  	'fonts' => array(
  		'google' => array(
  			'Roboto',
  			'Open Sans',
  			'Lato',
  			'Roboto Condensed',
  			'Slabo 27px',
  			'Montserrat',
  			'Oswald',
  			'Source Sans Pro',
  			'Raleway',
  			'Merriweather',
  		),
  	),
  );
  return $fonts;
}

function futurio_extra_get_meta( $name = '', $output = '' ) {
		if ( is_singular( array( 'post', 'page' ) ) ) {
			global $post;
			$meta = get_post_meta( $post->ID, 'futurio_meta_' . $name, true );
			if ( isset( $meta ) && $meta != '' ) {
				if ( $output == 'echo' ) {
					echo esc_html( $meta );
				} else {
					return $meta;
				}
			} else {
				return;
			}
		}
}

/**
 * Add custom CSS styles
 */
function futurio_extra_enqueue_header_custom_css() {

	$image = futurio_extra_get_meta( 'featured_image_height' );
  $content_spacing = futurio_extra_get_meta( 'content_spacing_option' );
  $spacing = futurio_extra_get_meta( 'content_spacing' );
  // $spacing_padding = ( $spacing / 2 );
  
	if ( $image != '' && $image != '0' ) {
		$css = '.full-head-img {
    padding-bottom: ' . absint( $image ) . 'px;
    padding-top: ' . absint( $image ) . 'px;
    }';
	} else {
		$css = '';
	}
  
  if ( $content_spacing == 'enable' && $spacing != '' ) {
		$spacing_css = '.futurio-content {
    padding-left: ' . absint( $spacing ) . '%;
    padding-right: ' . absint( $spacing ) . '%;
    }';
	} else {
		$spacing_css = '';
	}

	$custom_css = "
  	{$css}
    {$spacing_css}
  ";
	wp_add_inline_style( 'kirki-styles-futurio_extra', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'futurio_extra_enqueue_header_custom_css', 9999 );

if ( ! function_exists( 'futurio_extra_widget_date_comments' ) ) :

	/**
	 * Returns date for widgets.
	 */
	function futurio_extra_widget_date_comments() {
	?>
	<span class="extra-posted-date">
		<?php echo esc_html( get_the_date() ); ?>
	</span>
	<span class="extra-comments-meta">
		<?php
			if ( !comments_open() ) 
				{ esc_html_e('Off','futurio-extra'); }
			else { ?>
				<a href="<?php echo esc_url( get_comments_link() ); ?>" rel="nofollow" title="<?php esc_html_e( 'Comment on ', 'futurio-extra' ) . the_title_attribute(); ?>">
					<?php echo absint( get_comments_number() ); ?>
				</a>
			<?php } ?>
		<i class="fa fa-comments-o"></i>
	</span>
	<?php
	}

endif;

register_activation_hook(__FILE__, 'futurio_extra_plugin_activate' );
add_action('admin_init', 'futurio_extra_plugin_redirect');

function futurio_extra_plugin_activate() {
    add_option('fe_plugin_do_activation_redirect', true);
}
/**
 * Redirect after plugin activation
 */    
function futurio_extra_plugin_redirect() {
  if ( get_option('fe_plugin_do_activation_redirect', false ) ) {
    delete_option( 'fe_plugin_do_activation_redirect' );
    if( !is_network_admin() || !isset($_GET['activate-multi']) ) {
      wp_redirect( 'themes.php?page=futurio-panel-install-demos' );
    }
  }
}

/**
 * Check Elementor plugin
 */
function futurio_extra_check_for_elementor() {
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	return is_plugin_active( 'elementor/elementor.php' );
}
/**
 * Check Elementor PRO plugin
 */
function futurio_extra_check_for_elementor_pro() {
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	return is_plugin_active( 'elementor-pro/elementor-pro.php' );
}

/**
 * Register Elementor features
 */
if ( futurio_extra_check_for_elementor() ) {
  include_once( plugin_dir_path( __FILE__ ) . 'lib/elementor/widgets.php' );
  if ( ! futurio_extra_check_for_elementor_pro() ) {
    include_once( plugin_dir_path( __FILE__ ) . 'lib/elementor/shortcode.php' );
  }
}

/**
 * Custom background image - posts/pages
 */
function futurio_extra_custom_field_background() {
  $background = futurio_extra_get_meta( 'image_bg' );
  $position = futurio_extra_get_meta( 'image_bg_position' );
  $position = str_replace( '_', ' ', $position);
	if ( $background && is_singular( array( 'post', 'page' ) ) ) { ?>
		<style type="text/css">
			body#blog { 
        background-image: url( "<?php echo esc_url( wp_get_attachment_url( absint( $background[0] ) ) ); ?>" );
        background-position: <?php echo esc_attr( $position ); ?>; 
        background-repeat: <?php echo esc_attr( futurio_extra_get_meta( 'image_bg_repeat' ) ); ?>;
        background-size: <?php echo esc_attr( futurio_extra_get_meta( 'image_bg_size' ) ); ?>;
        background-attachment: <?php echo esc_attr( futurio_extra_get_meta( 'image_bg_attachment' ) ); ?>;
      }
		</style>
	<?php }
}

add_action( 'wp_head', 'futurio_extra_custom_field_background' );

/**
 * Add Metadata on plugin activation.
 */ 
function futurio_extra_activate() {
    add_site_option( 'futurio_active_time', time() );
    add_site_option( 'futurio_active_pro_time', time() );
}
register_activation_hook( __FILE__, 'futurio_extra_activate' );

/**
 * Remove Metadata on plugin Deactivation.
 */
function futurio_extra_deactivate() {
    delete_option('futurio_active_time');
    delete_option('futurio_maybe_later');
    delete_option('futurio_review_dismiss');
    delete_option('futurio_active_pro_time');
}
register_deactivation_hook(__FILE__, 'futurio_extra_deactivate');

/**
 * Reset some theme mod from url in admin area - administrators only
 */
add_action( 'admin_init', 'futurio_extra_reset_mod' );

function futurio_extra_reset_mod() {
  $current_user = wp_get_current_user();
  // This will help you reset some theme mods from URL. Perfect if you put something wrong into custom code and it will break your page
  // Code example:
  // Reset code added to the HEAD: ?reset-theme-mods=1&option=header-code
  // Reset code added to the footer: ?reset-theme-mods=1&option=footer-code
  // You can use it if you are site administrator and your are in admin area.
  if ( isset( $_GET['reset-theme-mods'] ) && '1' === $_GET['reset-theme-mods'] && $_GET['option'] != '' && is_admin() !== false && current_user_can('administrator') ) {
      remove_theme_mod( $_GET['option'] );
  }
}

// add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'futurio_pro_action_links' );

function futurio_pro_action_links( $links ) {
   if ( !defined('FUTURIO_PRO_CURRENT_VERSION') ) { 
    $links['go_pro'] = sprintf( '<a href="%1$s" target="_blank" class="elementor-plugins-gopro">%2$s</a>', esc_url( 'https://futuriowp.com/futurio-pro/' ), __( 'Go Pro', 'elementor' ) );
   }
   return $links;
}