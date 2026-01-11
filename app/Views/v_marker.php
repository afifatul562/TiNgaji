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

         //custom marker1
        const marker1 = L.icon({
            iconUrl: '<?= base_url('marker/mdta.png') ?>',
            iconSize:     [60, 65], // size of the icon
            iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });
        
        //=== marker===//
        L.marker([-0.24176475487227647, 100.64841176481193],{icon: marker1})
            .bindPopup("<img src='<?= base_url('gambar/darul-hikmah.jpg') ?>' width='250px'> <br>" +
                    "<b>MDTA Darul Hikmah</b><br>"+
                    "Alamat : Sicincin Hilir <br>"+
                    "Kecamatan Payakumbuh Timur <br>"+
                    " Kota Payakumbuh <br>")
            .addTo(map);
        L.marker([-0.23928118239828913, 100.64000905317437],{icon: marker1})
            .bindPopup("<img src='<?= base_url('gambar/darul-wustha.jpg') ?>' width='250px'> <br>" +
                    "<b>MDTA Darul Wustha</b><br>"+
                    "Alamat : Jl. Kulin, Padang Tiakar Mudik <br>"+
                    "Kecamatan Payakumbuh Timur <br>"+
                    " Kota Payakumbuh <br>")
            .addTo(map);
        L.marker([-0.23563892391420413, 100.64255490054306],{icon: marker1})
            .bindPopup("<img src='<?= base_url('gambar/al-mawaddah.jpg') ?>' width='250px'> <br>" +
                    "<b>MDTA Al-Mawaddah</b><br>"+
                    "Alamat : Jl. Beringin, Padang Tiakar Hilir <br>"+
                    "Kecamatan Payakumbuh Timur <br>"+
                    " Kota Payakumbuh <br>")
            .addTo(map);
        L.marker([-0.20594533915148558, 100.65371726019556],{icon: marker1})
            .bindPopup("<img src='<?= base_url('gambar/al-mubarok.jpg') ?>' width='250px'> <br>" +
                    "<b>MDTA Al-Mubarok</b><br>"+
                    "Alamat : Jl. Sutomo, Tiakar <br>"+
                    "Kecamatan Payakumbuh Timur <br>"+
                    " Kota Payakumbuh <br>")
            .addTo(map);

        //custom marker1
        const marker2 = L.icon({
            iconUrl: '<?= base_url('marker/tpq.png') ?>',
            iconSize:     [60, 65], // size of the icon
            iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        //=== marker    
        L.marker([-0.22338502410738273, 100.65509015583943],{icon: marker2})
            .bindPopup("<img src='<?= base_url('gambar/muhsinin.jpg') ?>' width='250px'> <br>" +
                    "<b>TPQ Muhsinin</b><br>"+
                    "Alamat : Jl. Rangkayo Rasuna Said, Tiakar <br>"+
                    "Kecamatan Payakumbuh Timur <br>"+
                    " Kota Payakumbuh <br>")
            .addTo(map);
        L.marker([-0.2120495691346605, 100.66558161165808],{icon: marker2})
            .bindPopup("<img src='<?= base_url('gambar/thariqul-jannah.jpg') ?>' width='250px'> <br>" +
                    "<b>TPQ Thariqul Jannah</b><br>"+
                    "Alamat : Jl. Kirab Remaja, Payobasung <br>"+
                    "Kecamatan Payakumbuh Timur <br>"+
                    " Kota Payakumbuh <br>")
            .addTo(map);
        L.marker([-0.23269973667955005, 100.64461226649833],{icon: marker2})
            .bindPopup("<img src='<?= base_url('gambar/al-hidayah.jpg') ?>' width='250px'> <br>" +
                    "<b>TPQ Al-Hidayah</b><br>"+
                    "Alamat : Padang Tiakar Hilir <br>"+
                    "Kecamatan Payakumbuh Timur <br>"+
                    " Kota Payakumbuh <br>")
            .addTo(map);
        L.marker([-0.21708369402613148, 100.65850743633163],{icon: marker2})
            .bindPopup("<img src='<?= base_url('gambar/baitul-huda.jpg') ?>' width='250px'> <br>" +
                    "<b>TPQ Baitul Huda</b><br>"+
                    "Alamat : Jl. Syekh Ibrahim Harun, Tiakar <br>"+
                    "Kecamatan Payakumbuh Timur <br>"+
                    " Kota Payakumbuh <br>")
            .addTo(map);
        L.marker([-0.22874048236202318, 100.65514387470246],{icon: marker2})
            .bindPopup("<img src='<?= base_url('gambar/al-hikmah.jpg') ?>' width='250px'> <br>" +
                    "<b>TPQ Al-Hikmah</b><br>"+
                    "Alamat : Jl. Imam Bukhari, Tiakar <br>"+
                    "Kecamatan Payakumbuh Timur <br>"+
                    " Kota Payakumbuh <br>")
            .addTo(map);
        L.marker([-0.22870786791820924, 100.6455115404944],{icon: marker2})
            .bindPopup("<img src='<?= base_url('gambar/amaliyah.jpg') ?>' width='250px'> <br>" +
                    "<b>TPQ Amaliyah</b><br>"+
                    "Alamat : Jl. Pemuda I, Tiakar <br>"+
                    "Kecamatan Payakumbuh Timur <br>"+
                    " Kota Payakumbuh <br>")
            .addTo(map);
        L.marker([-0.22147958346406182, 100.64993510713941],{icon: marker2})
            .bindPopup("<img src='<?= base_url('') ?>' width='250px'> <br>" +
                    "<b>TPQ Syuhada</b><br>"+
                    "Alamat : Batalyon 131, Tiakar <br>"+
                    "Kecamatan Payakumbuh Timur <br>"+
                    " Kota Payakumbuh <br>")
            .addTo(map);
    </script>

