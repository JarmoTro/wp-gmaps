function gmapsInit(){

    const maps = document.querySelectorAll(".gmaps-map");

    maps.forEach(mapEl => {

        const zoom = parseInt(mapEl.getAttribute("data-zoom"));
        const mapId = mapEl.getAttribute("data-map-id");
        const center = mapEl.getAttribute("data-center");
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

        const markerPin = new google.maps.marker.PinElement(markerPinOptions);

        var map = new google.maps.Map(mapEl, {
            zoom: zoom,
            center: pos,
            disableDefaultUI: true,
            mapId, mapId
        });

        if(marker.toLowerCase() != "false"){
            new google.maps.marker.AdvancedMarkerElement({
                map,
                title: "test",
                position: pos,
                content: markerPin.element
            });
        }

    });

}

window.gmapsInit = gmapsInit;