<?php

if (!defined('ABSPATH')) {
    exit;
}

?>

<div class="gmaps-admin-wrapper">

    <h1> <?php _e("Google Maps settings", "gmaps") ?> </h1>

    <form action="options.php" method="POST" class="gmaps-settings-form">

        <?php

        settings_fields('gmaps_main_settings');

        $api_key = get_option( 'gmaps_api_key' ) != null ? get_option( 'gmaps_api_key' ) : "";
        
        ?>

        <div class="input-group">

            <label for="gmaps_api_key">API key</label>

            <input type="text" name="gmaps_api_key" id="gmaps_api_key" value="<?php echo $api_key ?>">

        </div>

        <?php submit_button() ?>

    </form>

</div>

