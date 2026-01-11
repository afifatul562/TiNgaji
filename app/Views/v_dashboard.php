<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <!-- Header with Breadcrumb -->
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <div>
                    <h1 class="h3 mb-1 text-gray-800">Dashboard</h1>
                    <p class="text-muted">Selamat datang di Sistem Informasi Geografis</p>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>

            <!-- Statistics Cards Row -->
            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Lokasi
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="stat-total">0</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-map-marker-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <a href="<?= base_url('Lokasi/index')?>" class="text-decoration-none small text-primary">
                                Lihat Detail <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        MDTA
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="stat-mdta">0</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-mosque fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        TPQ
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="stat-tpq">0</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-quran fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if (in_groups('admin')) : ?>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Total User
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800" id="stat-user">0</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- Map Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-map me-2"></i>Peta Lokasi MDTA & TPQ
                    </h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Peta Options:</div>
                            <a class="dropdown-item" href="#" onclick="resetMap()">Reset View</a>
                            <a class="dropdown-item" href="#" onclick="fullscreenMap()">Fullscreen</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div id="map" style="width: 100%; height: 70vh; border-radius: 0 0 0.35rem 0.35rem;"></div>
                </div>
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

            const layerControl = L.control.layers(baseLayers, null, {
                collapsed: false,
                position: 'topright'
            }).addTo(map);

            // Custom markers
            const mdta = L.icon({
                iconUrl: '<?= base_url('marker/mdta.png') ?>',
                iconSize: [60, 65],
                iconAnchor: [22, 94],
                popupAnchor: [-3, -76]
            });

            const tpq = L.icon({
                iconUrl: '<?= base_url('marker/tpq.png') ?>',
                iconSize: [60, 65],
                iconAnchor: [22, 94],
                popupAnchor: [-3, -76]
            });

            const defaultMarker = L.icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34]
            });

            // Map functions
            function resetMap() {
                map.setView([-0.21833547404086745, 100.6580587200686], 14);
            }

            function fullscreenMap() {
                const mapContainer = document.getElementById('map');
                if (mapContainer.requestFullscreen) {
                    mapContainer.requestFullscreen();
                } else if (mapContainer.webkitRequestFullscreen) {
                    mapContainer.webkitRequestFullscreen();
                } else if (mapContainer.msRequestFullscreen) {
                    mapContainer.msRequestFullscreen();
                }
            }

            // Add loading indicator
            map.on('loading', function() {
                // Show loading spinner
                console.log('Map loading...');
            });

            map.on('load', function() {
                // Hide loading spinner
                console.log('Map loaded successfully');
            });

            function updateStats() {
                fetch('<?= base_url('api/dashboard-stats') ?>')
                    .then(res => res.json())
                    .then(data => {
                        document.getElementById('stat-total').textContent = data.total;
                        document.getElementById('stat-mdta').textContent = data.mdta;
                        document.getElementById('stat-tpq').textContent = data.tpq;
                        document.getElementById('stat-user').textContent = data.user;
                    });
            }

            // Update setiap 5 detik
            setInterval(updateStats, 30000);
            // Update pertama kali saat halaman load
            updateStats();

            const markers = L.markerClusterGroup();

            async function loadLocationData() {
                try {
                    const response = await fetch('<?= base_url('Home/getLocationData') ?>');
                    const locations = await response.json();

                    markers.clearLayers(); // Hapus marker lama

                    locations.forEach((location) => {
                        const icon = location.type === 'mdta' ? mdta : (location.type === 'tpq' ? tpq : defaultMarker);

                        const marker = L.marker([location.lat, location.lng], { icon: icon })
                            .bindPopup(`
                                <div class="text-center">
                                    <img src="<?= base_url('foto/') ?>${location.image}" 
                                         style="width: 200px; height: 150px; object-fit: cover; border-radius: 8px;" 
                                         alt="${location.name}"
                                         onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjE1MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjZjhmOWZhIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCwgc2Fucy1zZXJpZiIgZm9udC1zaXplPSIxNCIgZmlsbD0iIzZjNzU3ZCIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPk5vIEltYWdlPC90ZXh0Pjwvc3ZnPg=='">
                                    <h6 class="mt-2 mb-1"><strong>${location.name}</strong></h6>
                                    <p class="mb-2 text-muted small">
                                        <i class="fas fa-map-marker-alt me-1"></i>
                                        ${location.address}
                                    </p>
                                    <p class="mb-0 text-muted small">
                                        <i class="fas fa-coordinates me-1"></i>
                                        ${location.lat}, ${location.lng}
                                    </p>
                                </div>
                            `);

                        markers.addLayer(marker);
                    });

                    map.addLayer(markers);

                    if (markers.getLayers().length > 0) {
                        map.fitBounds(markers.getBounds());
                    }
                } catch (error) {
                    console.error('Error loading location data:', error);
                }
            }

            loadLocationData();
        </script>
    </main>
</div>