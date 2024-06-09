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
    <style>
        /* Gaya untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }

        /* Gaya untuk pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .pagination button {
            padding: 10px 20px;
            margin: 0 5px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        .pagination button:disabled {
            background-color: #ddd;
            cursor: not-allowed;
        }
        .pagination span {
            margin: 0 10px;
        }

        /* Gaya untuk input pencarian */
        #search {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <?php include('partials/navbar.php'); ?>
    
    <?php
    require 'admin/fungsi.php';

    if (isset($_GET['no'])) {
        $no = $_GET['no'];
        $faskes = query("SELECT * FROM faskes WHERE id = $no")[0];
    ?>

    <main id="detail" data-no="<?= $no ?>">
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
                            <td><?= $faskes['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td><?= $faskes['kategori'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?= $faskes['alamat'] ?></td>
                        </tr>
                        <tr>
                            <td>Telephone</td>
                            <td><?= $faskes['telepon'] ?></td>
                        </tr>
                        <tr>
                            <td>Layanan</td>
                            <td><?= $faskes['layanan'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php 
    } else {
        $faskesList = query("SELECT * FROM faskes");
    ?>

    <main>
        <div class="container">
            <h2>DAFTAR FASILITAS KESEHATAN KOTA MATARAM</h2>
            <p>Klik pin penanda jika ingin mengetahui lebih lanjut</p>
            <div id="map"></div>
            <!-- <script src="assets/js/daftar_faskes.js"></script> -->
            <div class="legend">
                <h3>Keterangan:</h3>
                <ul>
                    <li><span class="legend-icon" style="background-color:red;"></span> Rumah sakit</li>
                    <li><span class="legend-icon" style="background-color:blue;"></span> Puskesmas</li>
                    <li><span class="legend-icon" style="background-color:green;"></span> Klinik</li>
                </ul>
            </div>
            
            <!-- Daftar Tabel Fasilitas Kesehatan Kabupaten Sragen -->
            <h2>Daftar Tabel Fasilitas Kesehatan Kota Mataram</h2>
            <input type="text" id="search" placeholder="Search...">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Fasilitas</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="facility-table">
                    <?php if (count($faskesList) > 0): ?>
                        <?php $no = 1; ?>
                        <?php foreach ($faskesList as $faskes): ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $faskes['nama'] ?></td>
                            <td><?= $faskes['layanan'] ?></td>
                            <td><?= $faskes['alamat'] ?></td>
                            <td>
                                <a href="?no=<?= $faskes['id'] ?>" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">No data available</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="pagination">
                <button id="prev" disabled>Previous</button>
                <span id="page-info">1</span>
                <button id="next">Next</button>
            </div>
        </div>
    </main>
    <?php
        }
    ?>
    
    <?php include('partials/footer.php'); ?>
    <script src="assets/js/daftar_fakes.js" defer></script>
    <!-- <script src="assets/js/daftar_faskes.js"></script> -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var facilityTable = document.getElementById('facility-table');
            var prevButton = document.getElementById('prev');
            var nextButton = document.getElementById('next');
            var pageInfo = document.getElementById('page-info');
            var searchInput = document.getElementById('search');

            // Ambil data fasilitas kesehatan dari PHP
            var faskesList = <?php echo json_encode($faskesList); ?>;
            var itemsPerPage = 10;
            var currentPage = 1;
            var filteredList = faskesList;

            function renderTable(data, page) {
                facilityTable.innerHTML = '';
                var start = (page - 1) * itemsPerPage;
                var end = Math.min(start + itemsPerPage, data.length);
                for (var i = start; i < end; i++) {
                    var faskes = data[i];
                    var row = facilityTable.insertRow();
                    row.innerHTML = `
                        <td>${i + 1}</td>
                        <td>${faskes.nama}</td>
                        <td>${faskes.layanan}</td>
                        <td>${faskes.alamat}</td>
                        <td>
                            <a href="?no=${faskes.id}" class="btn btn-info">Detail</a>
                        </td>
                    `;
                }
                pageInfo.textContent = currentPage;
                prevButton.disabled = currentPage === 1;
                nextButton.disabled = currentPage === Math.ceil(data.length / itemsPerPage);
            }

            function filterData() {
                var searchTerm = searchInput.value.toLowerCase();
                filteredList = faskesList.filter(function(faskes) {
                    return faskes.nama.toLowerCase().includes(searchTerm) || 
                           faskes.layanan.toLowerCase().includes(searchTerm) || 
                           faskes.alamat.toLowerCase().includes(searchTerm);
                });
                currentPage = 1;
                renderTable(filteredList, currentPage);
            }

            searchInput.addEventListener('input', filterData);

            prevButton.addEventListener('click', function() {
                if (currentPage > 1) {
                    currentPage--;
                    renderTable(filteredList, currentPage);
                }
            });

            nextButton.addEventListener('click', function() {
                if (currentPage < Math.ceil(filteredList.length / itemsPerPage)) {
                    currentPage++;
                    renderTable(filteredList, currentPage);
                }
            });

            renderTable(filteredList, currentPage);
        });
    </script>
</body>
</html>