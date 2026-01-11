<div id="map" style="width: 100%; height: 100vh;"></div>



<script>
    const map = L.map('map').setView([-0.21833547404086745, 100.6580587200686], 14);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
</script>