
<?php
require 'fungsi.php';
$users = query("SELECT * FROM db_user");
?>

<?php include('./partials/upper_html.php') ?>


<div class="content">
  <div class="container mt-2">
      <h2 class="fw-bold mb-2">Manage Users</h2>        
          <a href="tambahuser.php" class="btn btn-primary mb-3">Tambah User</a>
          <!-- List of Facilities -->
          <h3 class="mt-3 mb-2 fw-semibold fs-4">List of Users</h3>
      <!-- table -->
      <div class="table-responsive mx-auto">
          <table class="table table-bordered text-center">
              <thead>
                  <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Capacity</th>
                    <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
              <?php $no = 1; ?>
              <?php foreach($users as $user) : ?>
                  <tr>
                      <td><?= $no; ?></td>
                      <!-- content -->
                      <td><?= $user["email"]; ?></td>
                      <td><?= ucwords($user["nama"]); ?></td>
                      <td><?= ucwords($user["capacity"]); ?></td>
                      <!-- button -->
                      <td>
                            <a class="btn btn-outline-warning btn-sm" href="ubahuser.php?id=<?= $user["id_user"]?>">
                              <i class="bi bi-pencil-square"></i> Ubah
                            </a>
                            <a class="btn btn-outline-danger btn-sm" href="hapususer.php?id=<?= $user["id_user"]?>">
                            <i class="bi bi-trash"></i> Hapus
                            </a>
                      </td>
                  </tr>
                  <?php $no++; ?>
              <?php endforeach; ?>
              </tbody>
          </table>
      </div>
    </div>
</div>

<?php include('./partials/lower_html.php') ?>