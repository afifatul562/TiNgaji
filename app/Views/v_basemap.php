<div id="map" style="width: 100%; height: 100vh;"></div>

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
            center: [-0.21833547404086745, 100.6580587200686], // Default center (Denver, USA)
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

        const layerControl = L.control.layers(baseLayers, null, {
            collapsed: false
        }).addTo(map);
    </script>

