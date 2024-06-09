<?php include('./partials/upper_html.php') ?>

<div class="content">
    <!-- card -->
     <h4 class="fw-bolder fs-4">My Profile</h4>
    <div class="container mt-5">
        <div class="row mb-3">
            <div class="col-lg-3 fw-semibold">
                Name:
            </div>
            <div class="col-lg-9">
                <?= $userData['nama']; ?>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-3 fw-semibold">
                Email:
            </div>
            <div class="col-lg-9">
                <?= $userData['email']; ?>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-3 fw-semibold">
                Password:
            </div>
            <div class="col-lg-9">
                <?= $userData['password']; ?>
            </div>
        </div>
        <a href="ubah_profile.php" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil-square"></i> Edit Profil</a>
    </div>
</div>


<!-- Modal edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add New Facility</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="faskesadmin.php?page=<?= $page ?>" method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Name</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" required>
                    </div>
                    <div class="mb-3">
                        <label for="layanan" class="form-label">Layanan</label>
                        <textarea class="form-control" id="layanan" name="layanan" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" required>
                    </div>
                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Upload Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>
                    <button type="submit" class="btn btn-primary" name="add">Add Facility</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('./partials/lower_html.php') ?>
