<!-- Simple Test Map -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-map me-2"></i>Test Map
        </h6>
    </div>
    <div class="card-body p-0">
        <div id="testMap" style="width: 100%; height: 60vh;"></div>
    </div>
</div>

<script>
    console.log('Test map script started');
    
    // Check if Leaflet is loaded
    if (typeof L === 'undefined') {
        console.error('Leaflet is not loaded!');
        document.getElementById('testMap').innerHTML = '<div class="alert alert-danger m-3">Error: Leaflet library tidak dimuat!</div>';
    } else {
        console.log('Leaflet is loaded successfully');
        
        try {
            // Create a simple map
            const map = L.map('testMap').setView([-0.21833547404086745, 100.6580587200686], 14);
            
            // Add tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            
            // Add a test marker
            const testMarker = L.marker([-0.21833547404086745, 100.6580587200686])
                .addTo(map)
                .bindPopup('Test Marker - Peta berfungsi!');
            
            console.log('Test map created successfully');
            
        } catch (error) {
            console.error('Error creating test map:', error);
            document.getElementById('testMap').innerHTML = '<div class="alert alert-danger m-3">Error: ' + error.message + '</div>';
        }
    }
</script> 