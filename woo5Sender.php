<?php

/**
 * Plugin Name: 5Sender Sms message notification
 * Plugin URI:https://5sender.com/
 * Description:Un plugin woocoomerce permettant de notifier des messages sms à vos clients en temps réel 
 * Version: 1.0.0
 * Author: Lynos HK | Développeur web Full Stack | Tél : +229 95 89 80 72
 * Author URI:https://lynoshk229.com/
 * Developer: Lui-même
 * Developer URI: https://lynoshk229.com/
 * Text Domain: woocommerce-extension
 * Domain Path: /
 * Languages : Fr
 * Woo: 12345:342928dfsfhsf8429842374wdf4234sfd
 * WC requires at least: 2.2
 * WC tested up to: 2.3
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */
// Make sure WooCommerce is active
if (!defined('ABSPATH')) {
    die;
}

if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    return;
}

if (!class_exists('WC_5Sender_notify_plugin')):
    class WC_5Sender_notify_plugin
{
   /**
         * Construct the plugin.
         */
        public function __construct()
    {
        add_action('plugins_loaded', array($this, 'init'));

    }
    /**
         * Initialize the plugin.
         */
        public function init(){ 

    // Checks if WooCommerce is installed.
if (class_exists('WC_Integration')) {
    // Include our integration class.
    include_once 'includes/5Sender-notify-class.php';
    // Register the integration.
    add_filter('woocommerce_integrations', array($this, 'add_integration'));
}
// Set the plugin slug
 define('MY_5SENDER_SLUG', 'wc-settings');
// Setting action for plugin
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'WC_my_5Sender_plugin_action_links');

function WC_my_5Sender_plugin_action_links($links)
{
    $links[] = '<a href="' . menu_page_url(MY_5SENDER_SLUG, false) . '&tab=integration">Réglages</a>';
    return $links;
}

include_once 'includes/get-order-class.php';

 }
         /**
         * Add a new integration to WooCommerce.
         */
        public function add_integration($integrations)
    {
            $integrations[] = 'WC_5Sender_Integration';
            return $integrations;
        }
    }
    $WC_5Sender_notify_plugin = new WC_5Sender_notify_plugin(__FILE__);
endif;
