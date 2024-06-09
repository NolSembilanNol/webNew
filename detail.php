<?php
require 'admin/fungsi.php';

if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
    // Ambil nilai id dari parameter GET
    $id = (int)$_GET['id']; // pastikan id adalah integer
    
    // Query database untuk mendapatkan data marker dengan id yang sesuai
    $markers = query("SELECT * FROM faskes WHERE id = $id")[0];

    if (!$markers) {
        echo "Data marker tidak ditemukan.";
        exit;
    }
} else {
    $faskesList = query("SELECT * FROM faskes");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEALS</title>
    <link rel="stylesheet" href="assets/css/daftar_fakskes.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css">
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
</head>
<body>
    <?php include('partials/navbar.php'); ?>

    <main id="detail" data-no="lat=<?= isset($_GET['lat']) ? $_GET['lat'] : '' ?>&lng=<?= isset($_GET['lng']) ? $_GET['lng'] : '' ?>">
        <div class="container">
            <h2>Maps Rute Fasilitas Kesehatan</h2>
            <p>Klik marker faskes jika ingin melihat rute</p>
            <div id="map"></div>
            <div class="info">
                <div class="photo">
                    <h3>Foto Fasilitas Kesehatan</h3>
                    <img src="rsud.jpg" alt="Foto Fasilitas Kesehatan">
                </div>
                <div class="details">
                    <h3>Tabel Detail Informasi</h3>
                    <table>
                        <tr>
                            <td>Nama Fasilitas</td>
                            <td><?= $markers['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td><?= $markers['kategori'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?= $markers['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td>Telephone</td>
                            <td><?= $markers['telepon'] ?></td>
                        </tr>
                        <tr>
                            <td>Layanan</td>
                            <td><?= $markers['layanan'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php include('partials/footer.php'); ?>
    <script src="assets/js/daftar_fakes.js" defer></script>
    <!-- <script src="assets/js/daftar_faskes.js"></script> -->
</body>
</html>
