# WP Gmaps

Allows integration of the Google Maps JS SDK in WordPress through shortcodes.

## Getting started

First, you need to add your Google Cloud Console API key in wp-admin. Look for the admin page called "Google Maps".

After the API key has been added, you can display maps by using the `[gmap]` shortcode.

The shortcode accepts the following parameters:

### map_id

String.

ID of the map.

Defaults to empty string.

### zoom

Integer.

Zoom level.

Defaults to 10.

### center

String.

Comma separated floats representing latitude and longitude.

Defaults to "43.4142989,-124.2301242".

### width

String.

Width of the map wrapper, CSS compliant.

Defaults to "100%".

### height

String.

Height of the map wrapper, CSS compliant.

Defaults to "400px".

### marker

Bool.

If true shows the marker at centered location.

Defaults to "false".

### marker_glyph

String.

Color of the marker glyph in hex format.

Defaults to Google default color.

### marker_bg

String.

Background color of the marker in hex format.

Defaults to Google default color.

### marker_border

String.

Border color of the marker glyph in hex format.

Defaults to Google default color.

### marker_scale

Float.

Scale of the marker.

Defaults to Google default.

### disable_ui

Bool.

If true disables the default Google Maps UI.

Defaults to "false".

### disable_zoom

Bool.

If true disables the ability to zoom.

Defaults to "false".

### disable_moving

Bool.

If true disables the ability to move on the map. Zooming will still be available.

Defaults to "false".