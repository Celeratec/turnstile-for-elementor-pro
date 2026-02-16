<?php

/**
 * Uninstall handler for Turnstile for Elementor Pro by Celeratec.
 *
 * This file is part of Turnstile for Elementor Pro by Celeratec, a fork of
 * "Captcha for Elementor Pro Forms" by Dave Podosyan, licensed under GPL v2+.
 *
 * Modified by Celeratec, LLC on 2026-02-16.
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

$options_to_delete = [
    'elementor_pro_hcaptcha_site_key',
    'elementor_pro_hcaptcha_secret_key',
    'elementor_pro_cf_turnstile_site_key',
    'elementor_pro_cf_turnstile_secret_key',
];

foreach ($options_to_delete as $option) {
    delete_option($option);
    delete_site_option($option);
}

delete_transient('tfep_activation_check');
