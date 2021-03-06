<?php

namespace PremiumAddons;

if( !defined( 'ABSPATH') ) exit();

class Premium_Admin_Notices {
    
    private static $instance = null;
    
    private static $elementor = 'elementor';
    
    private static $papro = 'premium-addons-pro';
    
    private static $pbg = 'premium-blocks-for-gutenberg';
    
    /**
    * Constructor for the class
    */
    public function __construct() {
        add_action('admin_init', array( $this, 'init') );
        
        add_action('admin_notices', array( $this, 'check_admin_notices' ) );
    }
    
    /**
    * init required functions
    */
    public function init(){
        $this->handle_review_notice();
        $this->handle_pbg_notice();
        $this->handle_xmas_notice();
    }
    
    /**
    * init notices check functions
    */
    public function check_admin_notices() {
        $this->required_plugins_check();
        $this->get_review_notice();
        $this->get_pbg_notice();
        $this->get_xmas_notice();
    }

    /**
    * Checks if review message is dismissed.
    * @access public
    * @return void
    */
    public function handle_review_notice() {

        if ( ! isset( $_GET['pa_review'] ) ) {
            return;
        }

        if ( 'opt_out' === $_GET['pa_review'] ) {
            check_admin_referer( 'opt_out' );

            update_option( 'pa_review_notice', '1' );
        }

        wp_redirect( remove_query_arg( 'pa_review' ) );
        exit;
    }
   
    /**
    * Checks if Premium Gutenberg message is dismissed.
    * @access public
    * @return void
    */
    public function handle_pbg_notice() {
        if ( ! isset( $_GET['pbg'] ) ) {
            return;
        }

        if ( 'opt_out' === $_GET['pbg'] ) {
            check_admin_referer( 'opt_out' );

            update_option( 'pbg_notice', '1' );
        }

        wp_redirect( remove_query_arg( 'pbg' ) );
        exit;
    }
    
    /**
    * Checks if get Christmas sale message is dismissed.
    * @access public
    * @return void
    */
    public function handle_xmas_notice() {

        if ( ! isset( $_GET['get_pro_xmas'] ) ) {
            return;
        }

        if ( 'opt_out' === $_GET['get_pro_xmas'] ) {
            check_admin_referer( 'opt_out' );

            update_option( 'get_pro_xmas_notice', '1' );
        }

        wp_redirect( remove_query_arg( 'get_pro_xmas' ) );
        exit;
    }

    
    /**
    * Shows an admin notice when Elementor is missing.
    * @since 1.0.0
    * @return boolean
    */
    public function required_plugins_check() {

        $elementor_path = sprintf( '%1$s/%1$s.php', self::$elementor );
        
        if( ! defined('ELEMENTOR_VERSION' ) ) {

            if ( ! self::is_plugin_installed( $elementor_path ) ) {

                if( self::check_user_can( 'install_plugins' ) ) {

                    $install_url = wp_nonce_url( self_admin_url( sprintf( 'update.php?action=install-plugin&plugin=%s', self::$elementor ) ), 'install-plugin_elementor' );

                    $message =  __( '<p>Premium Addons for Elementor is not working because you need to Install Elementor plugin.</p>', 'premium-addons-for-elementor' );

                    $message .= sprintf( '<p><a href="%s" class="button-primary">%s</a></p>', $install_url, __( 'Install Now', 'premium-addons-for-elementor' ) );

                }
            } else {
                if( self::check_user_can( 'activate_plugins' ) ) {

                    $activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $elementor_path . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $elementor_path );

                    $message = '<p>' . __( 'Premium Addons for Elementor is not working because you need to activate Elementor plugin.', 'premium-addons-for-elementor' ) . '</p>';

                    $message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $activation_url, __( 'Activate Now', 'premium-addons-for-elementor' ) ) . '</p>';

                }
            }
            $this->render_admin_notices( $message );
        }
    }
    
    /**
    * Renders admin review notice HTML
    * @since 2.8.4
    * @return void
    */
    public function get_review_text($review_url, $optout_url){
        $notice = sprintf(
            '<p>' . __('Did you like','premium-addons-for-elementor') . '<strong>&nbspPremium Addons for Elementor&nbsp</strong>' . __('Plugin?','premium-addons-for-elementor') . '</p>
             <p>' . __('Could you please do us a BIG favor ? if you could take 2 min of your time, we\'d really appreciate if you give Premium Addons for Elementor 5-star rating on WordPress. By spreading the love, we can create even greater free stuff in the future!','premium-addons-for-elementor') . '</p>
            <p><a class="button button-primary" href="%s" target="_blank"><span><i class="dashicons dashicons-external"></i>' . __('Leave a Review','premium-addons-for-elementor') . '</span></a>
                <a class="button button-secondary" href="%2$s"><span><i class="dashicons dashicons-calendar-alt"></i>' . __('Maybe Later','premium-addons-for-elementor') . '</span></a>
                <a class="button button-secondary" href="%2$s"><span><i class="dashicons dashicons-smiley"></i>' . __('I Already did','premium-addons-for-elementor') . '</span></a>
            </p>',
        $review_url, $optout_url);
        
        return $notice;
    }
        
    /**
    * Checks if review admin notice is dismissed
    * @since 2.6.8
    * @return void
    */
    public function get_review_notice() {

        $review = get_option( 'pa_review_notice' );

        $review_url = 'https://wordpress.org/support/plugin/premium-addons-for-elementor/reviews/?filter=5';

        if ( '1' === $review ) {
            return;
        } else if ( '1' !== $review ) {
            $optout_url = wp_nonce_url( add_query_arg( 'pa_review', 'opt_out' ), 'opt_out' );
        ?>

        <div class="error pa-notice-wrap">
            <div class="pa-img-wrap">
                <img src="<?php echo PREMIUM_ADDONS_URL .'admin/images/premium-addons-logo.png'; ?>">
            </div>
            <div class="pa-text-wrap">
                <?php echo $this->get_review_text($review_url, $optout_url); ?>
            </div>
            <div class="pa-notice-close">
                <a href="<?php echo esc_url($optout_url); ?>"><span class="dashicons dashicons-dismiss"></span></a>
            </div>
        </div>
            
        <?php }
        
    }
    
    /**
    * Shows an admin notice for Premium Gutenberg.
    * @since 2.7.6
    * @return void
    */
    public function get_pbg_notice() {
        
        $pbg_path = sprintf( '%1$s/%1$s.php', self::$pbg);
        
        if( ! defined('PREMIUM_BLOCKS_VERSION' ) ) {

            if ( ! self::is_plugin_installed( $pbg_path ) ) {

                if( self::check_user_can( 'install_plugins' ) ) {
            
                    $pbg_notice = get_option( 'pbg_notice' );
    
                    $install_url = wp_nonce_url( self_admin_url( sprintf( 'update.php?action=install-plugin&plugin=%s', self::$pbg ) ), 'install-plugin_premium-blocks-for-gutenberg' );

                    if ( '1' === $pbg_notice ) {
                        return;
                    } else if ( '1' !== $pbg_notice ) {
                        $optout_url = wp_nonce_url( add_query_arg( 'pbg', 'opt_out' ), 'opt_out' );

                        $pbg_message = sprintf( __('<p style="display: flex; align-items: center; padding:10px 10px 10px 0;"><img src="%s" style="margin-right: 0.8em; width: 40px;"><span><strong>Premium Blocks for Gutenberg&nbsp</strong></span><span>is Now Available.&nbsp</span><a href="%s" style="flex-grow: 2;"><span class="button-primary" style="margin-left:5px;">Install it Now.<span></a>', 'premium-addons-for-elementor' ), PREMIUM_ADDONS_URL .'admin/images/premium-blocks-logo.png', $install_url );

                    }

                    $pbg_message .= sprintf(__('<a href="%s" style="text-decoration: none; margin-left: 1em; float:right; "><span class="dashicons dashicons-dismiss"></span></a></p>', 'premium-addons-for-elementor'),  $optout_url );

                    $this->render_admin_notices( $pbg_message );
                    
                }
        
            }
        
        }
        
    }
    
    /**
    * Shows an admin notice when PAPRO is not installed. 
    * @since 2.6.8
    * @return void
    */
    public function get_xmas_notice() {
        
        $pro_path = sprintf( '%1$s/%1$s-for-elementor.php', self::$papro);
        
        $theme = self::get_installed_theme();

        $notice_url = sprintf( 'https://premiumaddons.com/christmas?utm_source=christmas-2018-notification&utm_medium=wp-dash&utm_campaign=get-pro&utm_term=%s', $theme );
        
        if ( ! self::is_plugin_installed( $pro_path ) && current_user_can( 'install_plugins' ) ) {

            $get_xmas = get_option( 'get_pro_xmas_notice' );
            
            if ( '1' === $get_xmas ) {
                return;
            } else if ( '1' !== $get_xmas ) {
                $optout_url = wp_nonce_url( add_query_arg( 'get_pro_xmas', 'opt_out' ), 'opt_out' );
                ?>
                <div class="error pa-notice-wrap pa-black-notice">
                    <div class="pa-img-wrap">
                        <img src="<?php echo esc_attr( PREMIUM_ADDONS_URL .'admin/images/premium-addons-logo.png' ); ?>">
                    </div>
                    <div class="pa-text-wrap">
                        <p><strong><?php echo __('Premium Addons for Elementor', 'premium-addons-for-elementor'); ?></strong></p>
                        <p>
                            <strong><?php echo __('Christmas Sale!', 'premium-addons-for-elementor'); ?></strong> <?php echo __('Get Premium Addons PRO with 15% Discount. ','premium-addons-for-elementor'); ?><a href="<?php echo esc_url( $notice_url ); ?>" target="_blank"><?php echo __('Check it Out','premium-addons-for-elementor'); ?></a>
                        </p>
                    </div>
                    <div class="pa-notice-close"><a href="<?php echo esc_url( $optout_url ); ?>"><span class="dashicons dashicons-dismiss"></span></a></div>
                </div>
                <?php
            }
        }
    }

    
    /**
    * Returns the active theme slug
    */
    public static function get_installed_theme() {

        $theme = wp_get_theme();

        if( $theme->parent() ) {

            $theme_name = $theme->parent()->get('Name');

        } else {

            $theme_name = $theme->get('Name');

        }

        $theme_name = sanitize_key( $theme_name );

        return $theme_name;
    }

    
    /**
    * Checks if a plugin is installed
    * @since 1.0.0
    * @return boolean
    */
    public static function is_plugin_installed( $plugin_path ){
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
        $plugins = get_plugins();
        return isset( $plugins[ $plugin_path ] );
    }
    
    /**
    * Checks user credentials
    * @since 2.6.8
    * @return boolean
    */
    public static function check_user_can($action) {
        return current_user_can( $action );
    }
    
    /**
    * Renders an admin notice error message
    * @since 1.0.0
    * @access private
    * @return void
    */
    private function render_admin_notices( $message ) {
        ?>
            <div class="error">
                <?php echo $message; ?>
            </div>
        <?php
    }

    public static function get_instance(){
        if( self::$instance == null ) {
            self::$instance = new self;
        }
        return self::$instance;
    }
       
}

if( ! function_exists('get_notices_instance') ) {
    /**
	 * Returns an instance of the plugin class.
	 * @since  1.1.1
	 * @return object
	 */
    function get_notices_instance() {
        return Premium_Admin_Notices::get_instance();
    }
}
get_notices_instance();