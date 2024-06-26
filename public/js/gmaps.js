function gmapsInit(){

    const maps = document.querySelectorAll(".gmaps-map");

    maps.forEach(mapEl => {

        const zoom = parseInt(mapEl.getAttribute("data-zoom"));
        const mapId = mapEl.getAttribute("data-map-id");
        const center = mapEl.getAttribute("data-center");
        const disableMoving = mapEl.getAttribute("data-disable-moving");
        const disableZoom = mapEl.getAttribute("data-disable-zoom");
        const disableUI = mapEl.getAttribute("data-disable-ui");
        const lat = parseFloat(center.split(",")[0]);
        const lng = parseFloat(center.split(",")[1]);
        const pos = { lat: lat, lng: lng };

        const marker = mapEl.getAttribute("data-marker");
        const markerBg = mapEl.getAttribute("data-marker-bg");
        const markerGlyph = mapEl.getAttribute("data-marker-glyph");
        const markerBorder = mapEl.getAttribute("data-marker-glyph");
        const markerScale = mapEl.getAttribute("data-marker-scale");

        const markerPinOptions = {

        };

        if(markerBg.toLowerCase() != "false") markerPinOptions.background = markerBg;

        if(markerGlyph.toLowerCase() != "false") markerPinOptions.glyphColor = markerGlyph;

        if(markerBorder.toLowerCase() != "false") markerPinOptions.borderColor = markerBorder;

        if(markerScale.toLowerCase() != "false") markerPinOptions.scale = parseFloat(markerScale);

        const mapOptions = {
            zoom: zoom,
            center: pos,
            mapId, mapId,
        }

        if (disableZoom.toLowerCase() != "false") mapOptions.maxZoom = zoom;

        if (disableZoom.toLowerCase() != "false") mapOptions.minZoom = zoom;

        if (disableZoom.toLowerCase() != "false") mapOptions.scrollwheel = false;

        if (disableMoving.toLowerCase() != "false") mapOptions.draggable = false;

        if (disableMoving.toLowerCase() != "false") mapOptions.panControl = false;

        if (disableUI.toLowerCase() != "false") mapOptions.disableDefaultUI = true;

        const markerPin = new google.maps.marker.PinElement(markerPinOptions);

        var map = new google.maps.Map(mapEl, mapOptions);

        if(marker.toLowerCase() != "false"){
            new google.maps.marker.AdvancedMarkerElement({
                map,
                position: pos,
                content: markerPin.element
            });
        }

    });

}

window.gmapsInit = gmapsInit;