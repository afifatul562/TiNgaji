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

        //circle
        L.marker([-0.2118338363750791, 100.66410243295519]).addTo(map);
        L.circle([-0.2118338363750791, 100.66410243295519],{
            radius: 600,
            color: 'yellow',
            fillColor: 'yellow', 
            fillOpacity: 0.5,
        }).addTo(map);

        L.marker([-0.23525328234612738, 100.66020446666563]).addTo(map);
        L.circle([-0.23525328234612738, 100.66020446666563],{
            radius: 900,
            color: 'green',
            fillColor: 'green', 
            fillOpacity: 0.5,
        }).addTo(map);

        L.marker([-0.22571744142243816, 100.65100799073163]).addTo(map);
        L.circle([-0.22571744142243816, 100.65100799073163],{
            radius: 300,
            color: 'red',
            fillColor: '#f03', 
            fillOpacity: 0.5,
        }).addTo(map);
    </script>

