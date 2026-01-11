<!-- Header with Breadcrumb -->
<div class="d-flex justify-content-between align-items-center mt-4 mb-4">
    <div>
        <h1 class="h3 mb-1 text-gray-800">Pemetaan Lokasi</h1>
        <p class="text-muted">Visualisasi lokasi MDTA & TPQ pada peta</p>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('Home/dashboard') ?>" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('Lokasi/index') ?>" class="text-decoration-none">Data Lokasi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pemetaan Lokasi</li>
        </ol>
    </nav>
</div>

<!-- Statistics Cards -->
<div class="row mb-4 justify-content-center">
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Total Lokasi
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($lokasi) ?></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                    MDTA
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?= count(array_filter($lokasi, function($item) { return strpos(strtolower($item['nama_lokasi']), 'mdta') !== false; })) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-4 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                    TPQ
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?= count(array_filter($lokasi, function($item) { return strpos(strtolower($item['nama_lokasi']), 'tpq') !== false; })) ?>
                </div>
            </div>
        </div>
    </div>
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
                <a class="dropdown-item" href="#" onclick="fitBounds()">Tampilkan Semua</a>
                <a class="dropdown-item" href="#" onclick="fullscreenMap()">Fullscreen</a>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div id="map" style="width: 100%; height: 80vh; border-radius: 0 0 0.35rem 0.35rem;"></div>
    </div>
</div>

<script>
    console.log('=== PEMETAAN LOKASI SCRIPT STARTED ===');
    
    // Check if Leaflet is loaded
    if (typeof L === 'undefined') {
        console.error('❌ Leaflet is not loaded!');
        document.getElementById('map').innerHTML = '<div class="alert alert-danger m-3">❌ Error: Leaflet library tidak dimuat!</div>';
    } else {
        console.log('✅ Leaflet is loaded successfully');
        console.log('Leaflet version:', L.version);
    }
    
    // Check if there are locations to display
    const locationData = <?= json_encode($lokasi) ?>;
    console.log('📍 Location data:', locationData);
    console.log('📍 Total locations:', locationData.length);
    
    if (locationData.length === 0) {
        document.getElementById('map').innerHTML = '<div class="alert alert-warning m-3">⚠️ Tidak ada data lokasi yang tersedia.</div>';
        console.log('⚠️ No location data available');
    } else {
        console.log('🚀 Starting map initialization...');
        initializeMap();
    }

    function initializeMap() {
        console.log('🗺️ Initializing map...');
        
        try {
            // Create the map
            console.log('📋 Creating map container...');
            const map = L.map('map', {
                center: [-0.21833547404086745, 100.6580587200686],
                zoom: 14
            });
            console.log('✅ Map container created');

            // Add OpenStreetMap tiles
            console.log('🌍 Adding tile layer...');
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                maxZoom: 19
            }).addTo(map);
            console.log('✅ Tile layer added');

            // Create marker group
            console.log('📍 Creating marker group...');
            const markers = L.layerGroup();
            console.log('✅ Marker group created');

            // Add markers for each location
            console.log('📍 Adding markers...');
            locationData.forEach((location, index) => {
                console.log(`📍 Adding marker ${index + 1}/${locationData.length}:`, location.nama_lokasi);
                
                try {
                    // Create marker with default icon first
                    const marker = L.marker([parseFloat(location.latitude), parseFloat(location.longitude)], {
                        title: location.nama_lokasi
                    });

                    // Create popup content
                    const popupContent = `
                        <div class="text-center" style="min-width: 250px;">
                            <h6 class="mt-2 mb-1"><strong>${location.nama_lokasi}</strong></h6>
                            <p class="mb-2 text-muted small">
                                <i class="fas fa-map-marker-alt me-1"></i>
                                ${location.alamat_lokasi}
                            </p>
                            <p class="mb-2 text-muted small">
                                <i class="fas fa-coordinates me-1"></i>
                                ${parseFloat(location.latitude).toFixed(6)}, ${parseFloat(location.longitude).toFixed(6)}
                            </p>
                            <div class="mt-2">
                                <a href="<?= base_url('Lokasi/editLokasi/') ?>${location.id_lokasi}" 
                                   class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                            </div>
                        </div>
                    `;

                    marker.bindPopup(popupContent);
                    markers.addLayer(marker);
                    console.log(`✅ Marker ${index + 1} added successfully`);
                    
                } catch (markerError) {
                    console.error(`❌ Error adding marker ${index + 1}:`, markerError);
                }
            });

            // Add markers to map
            console.log('🗺️ Adding markers to map...');
            map.addLayer(markers);
            console.log('✅ Markers added to map');

            // Auto-fit bounds on load if there are markers
            if (markers.getLayers().length > 0) {
                console.log('🎯 Fitting bounds...');
                setTimeout(() => {
                    try {
                        const bounds = L.latLngBounds(markers.getLayers().map(marker => marker.getLatLng()));
                        map.fitBounds(bounds);
                        console.log('✅ Map bounds fitted');
                    } catch (error) {
                        console.error('❌ Error fitting bounds:', error);
                    }
                }, 500);
            }

            // Map functions
            window.resetMap = function() {
                console.log('🔄 Resetting map...');
                map.setView([-0.21833547404086745, 100.6580587200686], 14);
            };

            window.fitBounds = function() {
                console.log('🎯 Fitting bounds manually...');
                if (markers.getLayers().length > 0) {
                    try {
                        const bounds = L.latLngBounds(markers.getLayers().map(marker => marker.getLatLng()));
                        map.fitBounds(bounds);
                        console.log('✅ Bounds fitted manually');
                    } catch (error) {
                        console.error('❌ Error fitting bounds manually:', error);
                    }
                }
            };

            window.fullscreenMap = function() {
                console.log('🖥️ Entering fullscreen...');
                const mapContainer = document.getElementById('map');
                if (mapContainer.requestFullscreen) {
                    mapContainer.requestFullscreen();
                } else if (mapContainer.webkitRequestFullscreen) {
                    mapContainer.webkitRequestFullscreen();
                } else if (mapContainer.msRequestFullscreen) {
                    mapContainer.msRequestFullscreen();
                }
            };

            console.log('🎉 Map initialization completed successfully!');
            
        } catch (error) {
            console.error('❌ Error initializing map:', error);
            document.getElementById('map').innerHTML = '<div class="alert alert-danger m-3">❌ Error: ' + error.message + '</div>';
        }
    }
    
    console.log('=== PEMETAAN LOKASI SCRIPT ENDED ===');
</script>


