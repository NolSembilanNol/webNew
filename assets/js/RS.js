document.addEventListener('DOMContentLoaded', function() {
    var map = L.map('map').setView([-8.607977562403327, 116.13212216036774], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    var marker = L.marker([-8.607977562403327, 116.13212216036774]).addTo(map)
        .bindPopup('<b>RSUD Kota Mataram</b><br>Alamat: Jl. Teuku Umar No.120, Dasan Cermen, Cakranegara, Kota Mataram, Nusa Tenggara Barat 83117.<br><button onclick="showRoute()">Kunjungi</button>');

    marker.on('click', function() {
        this.openPopup();
    });

    window.showRoute = function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var userLat = position.coords.latitude;
                var userLng = position.coords.longitude;
                var destinationLat = -8.607977562403327;
                var destinationLng = 116.13212216036774;

                L.Routing.control({
                    waypoints: [
                        L.latLng(userLat, userLng),
                        L.latLng(destinationLat, destinationLng)
                    ],
                    routeWhileDragging: true
                }).addTo(map);

                map.setView([userLat, userLng], 13);
            }, function() {
                alert('Geolocation tidak diizinkan atau tidak tersedia.');
            });
        } else {
            alert('Browser Anda tidak mendukung geolocation.');
        }
    };
});
