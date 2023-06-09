
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.3.4/leaflet-routing-machine.js"></script>
    <script>
        // Initialize the Leaflet map
        var map = L.map('map').setView([0, 0], 13);

        // Create a tile layer (you can choose a different tile provider if desired)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Locate the user's current position
        map.locate({ setView: true, maxZoom: 16 });

        function onLocationError(e) {
            alert(e.message);
        }

        // Attach the event listeners
        map.on('locationfound', onLocationFound);
        map.on('locationerror', onLocationError);
    </script>