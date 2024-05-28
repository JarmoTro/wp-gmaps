<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * The admin-facing functionality of the plugin.
 *
 * @link       https://github.com/JarmoTro/wp-gmaps
 * @since      1.0.0
 *
 * @package    Gmaps
 * @subpackage Gmaps/includes
 * @author     Jarmo Troska
 */
class Gmaps_Admin{

    /**
     * The name of this plugin.
     *
     * @since    1.0.0
     * @var      string    $plugin_name    The name of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since     1.0.0
     * @param     string    $plugin_name       The name of the plugin.
     * @param     string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version){

        $this->plugin_name = $plugin_name;

        $this->version = $version;

        add_action('admin_menu', [$this, 'add_settings_page_to_menu']);

        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_css_dependencies']);

        add_action('admin_init', [$this, "register_settings_fields"]);

    }

    /**
     * Renders the settings page view.
     *
     * @since     1.0.0
     */
    public function display_settings_page(){   
        Gmaps_Helper::get_view("gmaps-admin", true);
    }

    /**
     * Adds settings page to wp-admin menu.
     *
     * @since     1.0.0
     */
    public function add_settings_page_to_menu(){

        add_menu_page(
            'Gmaps',
            'Google Maps',
            'manage_options',
            'gmaps/main-settings.php',
            [$this, 'display_settings_page'], 
            'dashicons-location-alt',
            250
        );

    }

    /**
     * Registers and enqueues all styles for the admin-facing side of the site.
     *
     * @since     1.0.0
     */
    public function enqueue_admin_css_dependencies(){
        wp_enqueue_style($this->plugin_name . '-admin-main-styles', plugin_dir_url( __DIR__ ) . '/public/css/gmaps-admin.min.css', array(), $this->version, 'all');
    }

    /**
     * Registers all used settings fields.
     *
     * @since     1.0.0
     */
    public function register_settings_fields(){
        register_setting( 'gmaps_main_settings', 'gmaps_api_key'); 
    }

}