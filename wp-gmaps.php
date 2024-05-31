<?php

/**
 * Plugin Name:       WP Gmaps
 * Plugin URI:        https://github.com/JarmoTro/wp-gmaps
 * Description:       Minimalistic plugin that allows integration of Google Maps through the JS API.
 * Requires at least: 6.3
 * Version:           1.1.0
 * Author:            Jarmo Troska
 * Author URI:        https://github.com/JarmoTro/wp-gmaps
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gmaps
 */

if (!defined('ABSPATH')) {
    exit;
}

define('GMAPS_VERSION', '1.1.0');

require plugin_dir_path(__FILE__) . 'includes/class-gmaps.php';

/**
 * Initializes the plugin
 */

function run_gmaps() {
    new Gmaps();
}

run_gmaps();
