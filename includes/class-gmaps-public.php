<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/JarmoTro/wp-gmaps
 * @since      1.0.0
 *
 * @package    Gmaps
 * @subpackage Gmaps/includes
 * @author     Jarmo Troska
 */
class Gmaps_Public {

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
     * Whether the site is in debug mode.
     *
     * @since    1.1.1
     * @var      bool    $is_debug    Whether the site is in debug mode.
     */
    public $is_debug;


    /**
     * Initialize the class and set its properties.
     *
     * @since     1.0.0
     * @param     string    $plugin_name       The name of the plugin.
     * @param     string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
        $this->is_debug = defined('WP_DEBUG') ? WP_DEBUG : false;

        add_action("wp_enqueue_scripts", [$this, "enqueue_scripts"]);
    }

    /**
     * Sets the extension to be minified if debugging is not enabled.
     *
     * @since     1.1.1
     * @param     string    $file_ext    Extension of the file.
     * @return    string    File extension with possible .min prefix.
     */
    public function maybe_minify_file_extension($file_ext)
    {

        if ($this->is_debug) return $file_ext;

        $extensions_to_minify = [".css", ".js"];

        if (in_array($file_ext, $extensions_to_minify)) {
            return ".min" . $file_ext;
        }

        return $file_ext;
    }

    /**
     * Register and enqueue the scripts for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {

        wp_enqueue_script($this->plugin_name . '-main-scripts', plugin_dir_url( __DIR__ ) . '/public/js/gmaps' . $this->maybe_minify_file_extension(".js"), array(), $this->version, true);

        $google_maps_api_key = get_option("gmaps_api_key");

        if($google_maps_api_key){

            $google_maps_js_src = "https://maps.googleapis.com/maps/api/js?key=" . $google_maps_api_key . "&libraries=maps,marker&callback=gmapsInit&loading=async";

            wp_enqueue_script($this->plugin_name . '-gmaps', $google_maps_js_src, array(), $this->version, ["strategy" => "defer", "in_footer" => true]);
    
        }
        
    }
    
}