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