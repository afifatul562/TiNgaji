<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Latitude</label>
            <input class="form-control" name="latitude" id="Latitude" value="" readonly>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label>Longitude</label>
            <input class="form-control" name="longitude" id="Longitude" value="" readonly>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label>Posisi</label>
            <input class="form-control" name="posisi" id="Posisi" value="" readonly>
        </div>
    </div>

    <div class="col-sm-12">
        <br>
        <div id="map" style="width: 100%; height: 100vh;"></div>
    </div>
</div>

<script>
    // Base Layers
    const osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        maxZoom: 19
    });

    const stamenToner = L.tileLayer('https://stamen-tiles.a.ssl.fastly.net/toner/{z}/{x}/{y}.png', {
        attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, ' +
            '<a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        maxZoom: 20
    });

    const cartoPositron = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 19
    });

    const openTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data: &copy; OpenStreetMap contributors, SRTM | Style: &copy; OpenTopoMap',
        maxZoom: 17
    });

    // Create the map
    const map = L.map('map', {
        center: [-0.21833547404086745, 100.6580587200686], // Default center
        zoom: 14,
        layers: [osm] // Default basemap
    });

    // Layer Control
    const baseLayers = {
        "OpenStreetMap": osm,
        "Stamen Toner": stamenToner,
        "CartoDB Positron": cartoPositron,
        "OpenTopoMap": openTopoMap
    };

    L.control.layers(baseLayers, null, {
        collapsed: false
    }).addTo(map);

    // Get coordinate inputs
    const latInput = document.querySelector("[name=latitude]");
    const lngInput = document.querySelector("[name=longitude]");
    const posisi = document.querySelector("[name=posisi]");
    const curLocation = [-0.21833547404086745, 100.6580587200686];

    // Add marker
    const marker = L.marker(curLocation, {
        draggable: true
    }).addTo(map);

    // Initialize input fields with default marker position
    latInput.value = curLocation[0];
    lngInput.value = curLocation[1];

    // Update inputs on marker drag
    marker.on('dragend', function() {
        const position = marker.getLatLng();
        latInput.value = position.lat.toFixed(6); // Format to 6 decimal places
        lngInput.value = position.lng.toFixed(6);
        posisi.value = position.lat.toFixed(6) + ',' + position.lng.toFixed(6);
    });

    map.on('click', function (e) {
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;

    // Periksa apakah marker sudah ada
    if (!marker) {
        marker = L.marker(e.latlng, { draggable: true }).addTo(map);
    } else {
        marker.setLatLng(e.latlng); // Memperbarui posisi marker
    }

    // Memperbarui nilai latitude dan longitude di input form
    latInput.value = lat.toFixed(6); // Membatasi desimal
    lngInput.value = lng.toFixed(6);
    posisi.value = lat.toFixed(6) + ',' + lng.toFixed(6);
});

</script>