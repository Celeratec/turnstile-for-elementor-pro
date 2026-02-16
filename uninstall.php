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

// Clean up updater transients
global $wpdb;
$wpdb->query(
    $wpdb->prepare(
        "DELETE FROM {$wpdb->options} WHERE option_name LIKE %s OR option_name LIKE %s",
        '_transient_tfep_update_check_%',
        '_transient_timeout_tfep_update_check_%'
    )
);
