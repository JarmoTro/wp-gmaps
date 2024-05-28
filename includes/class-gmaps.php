<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * The core plugin class.
 *
 *
 * @link       https://github.com/JarmoTro/wp-gmaps
 * @since      1.0.0
 *
 * @package    Gmaps
 * @subpackage Gmaps/includes
 * @author     Jarmo Troska
 */

class Gmaps {

    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     * @var      string    $plugin_name    The string used to uniquely identify this plugin.
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     * @var      string    $version    The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * @since    1.0.0
     */
    public function __construct() {

        $this->version = defined('GMAPS_VERSION') ? GMAPS_VERSION : "1.0.0";

        $this->plugin_name = 'gmaps';

        $this->load_dependencies();

        new Gmaps_Public($this->get_plugin_name(), $this->get_version());

        if(is_admin()){
            new Gmaps_Admin($this->get_plugin_name(), $this->get_version());
        }

        new Gmaps_Shortcode("gmap");
        
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * @since    1.0.0
     */
    private function load_dependencies() {

        /**
         * Various helper functions.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-gmaps-helper.php';

        /**
         * The admin-facing functionality of the plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-gmaps-admin.php';

        /**
         * The public-facing functionality of the plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-gmaps-public.php';

        /**
         * Shortcode for displaying Google Maps.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-gmaps-shortcode.php';

    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress.
     *
     * @since     1.0.0
     * @return    string    The name of the plugin.
     */
    public function get_plugin_name() {
        return $this->plugin_name;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     1.0.0
     * @return    string    The version number of the plugin.
     */
    public function get_version() {
        return $this->version;
    }
}
