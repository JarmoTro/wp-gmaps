<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Shortcode for displaying Google Maps.
 *
 * @since      1.0.0
 */
class Gmaps_Shortcode{

    /**
     * The name of the shortcode.
     *
     * @since    1.0.0
     * @var      string    $shortcode_name   The name of the shortcode.
     */
    public $shortcode_name;

    /**
     * Initialize the class and set its properties.
     *
     * @since     1.0.0
     */
    public function __construct($shortcode_name) {
        $this->shortcode_name = $shortcode_name;
        add_shortcode($this->shortcode_name, [$this, "get_shortcode_content"]);
    }

    /**
     * Returns the content of the shortcode.
     *
     * @since     1.0.0
     * @param     string[]  $atts    Attributes passed to the shortcode.
     * @return    string    HTML contents of the shortcode.
     */
    public function get_shortcode_content($atts){

        $atts = shortcode_atts(
            array(
                'map_id' => '',
                'zoom' => '10',
                'center' => '43.4142989,-124.2301242',
                'width'  => '100%',
                'height' => '400px',
                'marker' => "false",
                'marker_glyph' => "false",
                'marker_bg' => "false",
                'marker_border' => "false",
                'marker_scale' => "false",
            ),
            $atts 
        );

        $zoom = $atts["zoom"];
        $map_id = $atts["map_id"];
        $center = $atts["center"];
        $width = $atts["width"];
        $height = $atts["height"];
        $marker = $atts["marker"];
        $marker_glyph = $atts["marker_glyph"];
        $marker_bg = $atts["marker_bg"];
        $marker_border = $atts["marker_border"];
        $marker_scale = $atts["marker_scale"];

        ob_start();

        ?>

        <div class="gmaps-map"
        data-zoom="<?php echo $zoom ?>"
        data-map-id="<?php echo $map_id ?>" 
        data-center="<?php echo $center ?>"
        data-marker="<?php echo $marker ?>"
        data-marker-glyph="<?php echo $marker_glyph ?>"
        data-marker-bg="<?php echo $marker_bg ?>"
        data-marker-border="<?php echo $marker_border ?>"
        data-marker-scale="<?php echo $marker_scale ?>"
        style="width: <?php echo $width ?>; height: <?php echo $height ?>;">

        </div>

        </gmp-map>

        <?php

        return ob_get_clean();

    }

}