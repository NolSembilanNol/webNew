document.addEventListener('DOMContentLoaded', function() {
    var map = L.map('map').setView([-8.5833, 116.1167], 13);
    var markers = []; // Array untuk menyimpan referensi ke semua marker

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Ambil data marker dari database menggunakan AJAX
    fetch('fetch_markers.php')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            data.forEach(markerInfo => {
                var icon;
                if (markerInfo.color === "red") {
                    icon = L.icon({
                        iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41],
                        popupAnchor: [1, -34],
                        shadowSize: [41, 41]
                    });
                } else if (markerInfo.color === "blue") {
                    icon = L.icon({
                        iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41],
                        popupAnchor: [1, -34],
                        shadowSize: [41, 41]
                    });
                } else if (markerInfo.color === "green") {
                    icon = L.icon({
                        iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41],
                        popupAnchor: [1, -34],
                        shadowSize: [41, 41]
                    });
                }
                
                var marker = L.marker([markerInfo.lat, markerInfo.lng], {icon: icon}).addTo(map);
                markers.push(marker); // Tambahkan marker ke dalam array markers
                marker.bindPopup(`
                    <b>${markerInfo.title}</b><br>
                    Alamat: ${markerInfo.alamat || 'Alamat tidak tersedia'}<br>
                    <button onclick="showRoute(${markerInfo.lat}, ${markerInfo.lng})">Kunjungi</button>
                `);

                if (markerInfo.content) {
                    marker.on('click', function() {
                        var menuItem = document.querySelector('[data-content="' + markerInfo.content + '"]');
                        menuItem.click();
                    });
                }
            });
        })
        .catch(error => {
            console.error('Error fetching marker data:', error);
        });

    // Fungsi untuk menunjukkan rute
    window.showRoute = function(destinationLat, destinationLng) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var userLat = position.coords.latitude;
                var userLng = position.coords.longitude;

                // Hilangkan semua marker dari peta
                markers.forEach(marker => {
                    map.removeLayer(marker);
                });

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