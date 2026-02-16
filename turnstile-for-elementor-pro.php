<?php

/**
 * Plugin Name: Turnstile for Elementor Pro by Celeratec
 * Plugin URI: https://github.com/Celeratec/turnstile-for-elementor-pro
 * Description: Adds hCaptcha and Cloudflare Turnstile support to Elementor Pro forms with seamless integration.
 * Version: 1.0.15
 * Author: Celeratec, LLC
 * Author URI: https://Hosting.Celeratec.cloud
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: turnstile-for-elementor-pro
 * Domain Path: /languages
 * Requires at least: 5.0
 * Tested up to: 6.8
 * Requires PHP: 7.4
 *
 * This plugin is a fork of "Captcha for Elementor Pro Forms" originally
 * created by Dave Podosyan (https://github.com/DavePodosyan).
 * Original source: https://github.com/DavePodosyan/captcha-for-elementor-pro-forms
 *
 * Modified by Celeratec, LLC (https://Hosting.Celeratec.cloud) on 2026-02-16.
 * Changes: Rebranded for distribution by Celeratec VPS Hosting.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!defined('TFEP_VERSION')) {
    define('TFEP_VERSION', '1.0.15');
}

if (!defined('TFEP_PLUGIN_FILE')) {
    define('TFEP_PLUGIN_FILE', __FILE__);
}

if (!defined('TFEP_PLUGIN_DIR')) {
    define('TFEP_PLUGIN_DIR', plugin_dir_path(__FILE__));
}

if (!defined('TFEP_PLUGIN_URL')) {
    define('TFEP_PLUGIN_URL', plugin_dir_url(__FILE__));
}

class Turnstile_For_Elementor_Pro
{
    private static $instance = null;

    public static function get_instance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        add_action('plugins_loaded', [$this, 'init']);
        register_activation_hook(TFEP_PLUGIN_FILE, [$this, 'activate']);
        register_deactivation_hook(TFEP_PLUGIN_FILE, [$this, 'deactivate']);
    }

    public function init()
    {
        if (!$this->check_dependencies()) {
            return;
        }

        $this->load_textdomain();
        $this->include_files();
        $this->init_handlers();
    }

    private function check_dependencies()
    {
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_elementor']);
            return false;
        }

        // Check for Elementor Pro

        if (!defined('ELEMENTOR_PRO_VERSION')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_elementor_pro']);
            return false;
        }

        if (!version_compare(ELEMENTOR_PRO_VERSION, '2.0', '>=')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_pro_version']);
            return false;
        }

        return true;
    }

    private function load_textdomain()
    {
        load_plugin_textdomain(
            'turnstile-for-elementor-pro',
            false,
            dirname(plugin_basename(TFEP_PLUGIN_FILE)) . '/languages/'
        );
    }

    private function include_files()
    {
        require_once TFEP_PLUGIN_DIR . 'includes/class-base-captcha-handler.php';
        require_once TFEP_PLUGIN_DIR . 'includes/class-hcaptcha-handler.php';
        require_once TFEP_PLUGIN_DIR . 'includes/class-turnstile-handler.php';
        require_once TFEP_PLUGIN_DIR . 'includes/class-plugin-updater.php';
    }

    private function init_handlers()
    {
        add_action('elementor/init', function () {
            new TFEP_HCaptcha_Handler();
            new TFEP_Turnstile_Handler();
        });

        // Initialize plugin updater
        new TFEP_Plugin_Updater(TFEP_PLUGIN_FILE, 'Celeratec', 'turnstile-for-elementor-pro');
    }

    public function activate()
    {
        // Allow activation but show notices for missing dependencies
        // This is more user-friendly than preventing activation entirely
    }

    public function deactivate()
    {
        // Cleanup if needed
    }

    public function admin_notice_missing_elementor()
    {
        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'turnstile-for-elementor-pro'),
            '<strong>' . esc_html__('Turnstile for Elementor Pro by Celeratec', 'turnstile-for-elementor-pro') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'turnstile-for-elementor-pro') . '</strong>'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    public function admin_notice_missing_elementor_pro()
    {
        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" or "%3$s" to be installed and activated.', 'turnstile-for-elementor-pro'),
            '<strong>' . esc_html__('Turnstile for Elementor Pro by Celeratec', 'turnstile-for-elementor-pro') . '</strong>',
            '<strong>' . esc_html__('Elementor Pro', 'turnstile-for-elementor-pro') . '</strong>',
            '<strong>' . esc_html__('Pro Elements', 'turnstile-for-elementor-pro') . '</strong>'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    public function admin_notice_minimum_elementor_pro_version()
    {
        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'turnstile-for-elementor-pro'),
            '<strong>' . esc_html__('Turnstile for Elementor Pro by Celeratec', 'turnstile-for-elementor-pro') . '</strong>',
            '<strong>' . esc_html__('Elementor Pro', 'turnstile-for-elementor-pro') . '</strong>',
            '2.0'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }
}

Turnstile_For_Elementor_Pro::get_instance();
