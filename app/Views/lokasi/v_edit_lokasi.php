<!-- Header with Breadcrumb -->
<div class="d-flex justify-content-between align-items-center mt-4 mb-4">
    <div>
        <h1 class="h3 mb-1 text-gray-800">Edit Lokasi</h1>
        <p class="text-muted">Edit data lokasi MDTA & TPQ</p>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= base_url('Home/dashboard') ?>" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('Lokasi/index') ?>" class="text-decoration-none">Data Lokasi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Lokasi</li>
        </ol>
    </nav>
</div>

<!-- Flash Message -->
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        <?= session()->getFlashdata('pesan') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="row">
    <!-- Map Column -->
    <div class="col-lg-8 mb-4">
        <div class="card shadow">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-map me-2"></i>Edit Lokasi pada Peta
                </h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Peta Options:</div>
                        <a class="dropdown-item" href="#" onclick="resetMap()">Reset View</a>
                        <a class="dropdown-item" href="#" onclick="getCurrentLocation()">Lokasi Saya</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div id="map" style="width: 100%; height: 70vh; border-radius: 0 0 0.35rem 0.35rem;"></div>
            </div>
        </div>
    </div>

    <!-- Form Column -->
    <div class="col-lg-4">
        <div class="card shadow">
            <div class="card-header py-3 bg-white">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-edit me-2"></i>Form Edit Lokasi
                </h6>
            </div>
            <div class="card-body">
                <?php $errors = validation_errors() ?>
                <?php echo form_open_multipart('Lokasi/updateData/' . $lokasi['id_lokasi']) ?>
                
                <div class="mb-3">
                    <label for="nama_lokasi" class="form-label">
                        <i class="fas fa-map-marker-alt me-1"></i>Nama Lokasi
                    </label>
                    <input type="text" 
                           class="form-control <?= isset($errors['nama_lokasi']) ? 'is-invalid' : '' ?>" 
                           id="nama_lokasi"
                           name="nama_lokasi" 
                           value="<?= $lokasi['nama_lokasi'] ?>"
                           placeholder="Masukkan nama lokasi">
                    <?php if (isset($errors['nama_lokasi'])) : ?>
                        <div class="invalid-feedback">
                            <?= validation_show_error('nama_lokasi') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="alamat_lokasi" class="form-label">
                        <i class="fas fa-home me-1"></i>Alamat Lokasi
                    </label>
                    <textarea class="form-control <?= isset($errors['alamat_lokasi']) ? 'is-invalid' : '' ?>" 
                              id="alamat_lokasi"
                              name="alamat_lokasi" 
                              rows="3"
                              placeholder="Masukkan alamat lengkap lokasi"><?= $lokasi['alamat_lokasi'] ?></textarea>
                    <?php if (isset($errors['alamat_lokasi'])) : ?>
                        <div class="invalid-feedback">
                            <?= validation_show_error('alamat_lokasi') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="latitude" class="form-label">
                                <i class="fas fa-latitude me-1"></i>Latitude
                            </label>
                            <input type="text" 
                                   class="form-control <?= isset($errors['latitude']) ? 'is-invalid' : '' ?>" 
                                   id="latitude"
                                   name="latitude" 
                                   value="<?= $lokasi['latitude'] ?>"
                                   placeholder="Latitude"
                                   readonly>
                            <?php if (isset($errors['latitude'])) : ?>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('latitude') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="longitude" class="form-label">
                                <i class="fas fa-longitude me-1"></i>Longitude
                            </label>
                            <input type="text" 
                                   class="form-control <?= isset($errors['longitude']) ? 'is-invalid' : '' ?>" 
                                   id="longitude"
                                   name="longitude" 
                                   value="<?= $lokasi['longitude'] ?>"
                                   placeholder="Longitude"
                                   readonly>
                            <?php if (isset($errors['longitude'])) : ?>
                                <div class="invalid-feedback">
                                    <?= validation_show_error('longitude') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="foto_lokasi" class="form-label">
                        <i class="fas fa-camera me-1"></i>Foto Lokasi
                    </label>
                    <input type="file" 
                           class="form-control <?= isset($errors['foto_lokasi']) ? 'is-invalid' : '' ?>" 
                           id="foto_lokasi"
                           name="foto_lokasi" 
                           accept="image/*">
                    <div class="form-text">Format: JPG, PNG, GIF. Maksimal 2MB</div>
                    <?php if (isset($errors['foto_lokasi'])) : ?>
                        <div class="invalid-feedback">
                            <?= validation_show_error('foto_lokasi') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Current Image Preview -->
                <?php if ($lokasi['foto_lokasi'] && file_exists('foto/' . $lokasi['foto_lokasi'])) : ?>
                    <div class="mb-3">
                        <label class="form-label">
                            <i class="fas fa-image me-1"></i>Foto Saat Ini
                        </label>
                        <div class="text-center">
                            <img src="<?= base_url('foto/' . $lokasi['foto_lokasi']) ?>" 
                                 class="img-thumbnail" 
                                 style="max-width: 200px; height: auto;"
                                 alt="<?= $lokasi['nama_lokasi'] ?>">
                            <p class="text-muted small mt-2">Foto yang sedang digunakan</p>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>Update Data
                    </button>
                    <a href="<?= base_url('Lokasi/index') ?>" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-1"></i>Kembali
                    </a>
                </div>

                <?php echo form_close() ?>
            </div>
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
        center: [<?= $lokasi['latitude'] ?>, <?= $lokasi['longitude'] ?>], // Default center
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

    // Get coordinate inputs
    const latInput = document.getElementById('latitude');
    const lngInput = document.getElementById('longitude');
    const curLocation = [<?= $lokasi['latitude'] ?>, <?= $lokasi['longitude'] ?>];

    // Add marker
    let marker = L.marker(curLocation, {
        draggable: true
    }).addTo(map);

    // Initialize input fields with default marker position
    latInput.value = curLocation[0].toFixed(6);
    lngInput.value = curLocation[1].toFixed(6);

    // Update inputs on marker drag
    marker.on('dragend', function() {
        const position = marker.getLatLng();
        latInput.value = position.lat.toFixed(6);
        lngInput.value = position.lng.toFixed(6);
    });

    // Click on map to move marker
    map.on('click', function (e) {
        const lat = e.latlng.lat;
        const lng = e.latlng.lng;

        marker.setLatLng(e.latlng);
        latInput.value = lat.toFixed(6);
        lngInput.value = lng.toFixed(6);
    });

    // Map functions
    function resetMap() {
        map.setView([<?= $lokasi['latitude'] ?>, <?= $lokasi['longitude'] ?>], 14);
        marker.setLatLng([<?= $lokasi['latitude'] ?>, <?= $lokasi['longitude'] ?>]);
        latInput.value = (<?= $lokasi['latitude'] ?>).toFixed(6);
        lngInput.value = (<?= $lokasi['longitude'] ?>).toFixed(6);
    }

    function getCurrentLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;
                
                map.setView([lat, lng], 16);
                marker.setLatLng([lat, lng]);
                latInput.value = lat.toFixed(6);
                lngInput.value = lng.toFixed(6);
            }, function(error) {
                alert('Tidak dapat mendapatkan lokasi Anda: ' + error.message);
            });
        } else {
            alert('Geolokasi tidak didukung oleh browser ini.');
        }
    }
</script>


