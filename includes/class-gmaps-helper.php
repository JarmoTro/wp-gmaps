<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Class containing various static helper functions.
 *
 * @link       https://github.com/JarmoTro/wp-gmaps
 * @since      1.0.0
 *
 * @package    Gmaps
 * @subpackage Gmaps/includes
 * @author     Jarmo Troska
 */
 class Gmaps_Helper{

    /**
     * Sets the extension to be minified if debugging is not enabled.
     *
     * @since     1.1.2
     * @param     string    $file_ext    Extension of the file.
     * @return    string    File extension with possible .min prefix.
     */
    static function maybe_minify_file_extension($file_ext)
    {

        $is_debug = defined('WP_DEBUG') ? WP_DEBUG : false;

        if ($is_debug) return $file_ext;

        $extensions_to_minify = [".css", ".js"];

        if (in_array($file_ext, $extensions_to_minify)) {
            return ".min" . $file_ext;
        }

        return $file_ext;
    }

    /**
     * Initialize the class and set its properties.
     *
     * @since     1.0.0
     * @param     string    $view   Name of the view to return.
     * @param     bool   $render    If true, renders the view instead of returning it.
     * @return    string|void    View if render is false, else void.
     */
    static function get_view($view, $render){

        $file_path = plugin_dir_path(dirname(__FILE__)) . "views/view-" . $view . ".php";

        if(!file_exists($file_path)) return "";

        if($render){
            require_once $file_path;
            return;
        }

        ob_start();

        require_once $file_path;

        return ob_get_clean();

    }

 }