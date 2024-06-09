<?php
require 'fungsi.php';

// Get user id from query string
$id = $_GET['id'];

// Fetch user details
$user = query("SELECT * FROM db_user WHERE id_user = $id")[0];

// Check if form is submitted
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $capacity = $_POST['capacity'];

    $query = "UPDATE db_user SET email = '$email', nama = '$nama', password = '$password', capacity = '$capacity' WHERE id_user = $id";

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>
                alert('User updated successfully');
                document.location.href = 'manageUser.php';
              </script>";
    } else {
        echo "<script>
                alert('Failed to update user');
              </script>";
    }
}
?>


<?php include('./partials/upper_html.php') ?>

<div class="content">
    <!-- card -->
    <div class="container mt-2">
        <h2>Edit User</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Name</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?= $user['password']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="capacity" class="form-label">Capacity</label>
                <select class="form-select" id="capacity" name="capacity" required>
                    <option value="admin" <?= $user['capacity'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                    <option value="fasilitator" <?= $user['capacity'] == 'fasilitator' ? 'selected' : ''; ?>>Fasilitator</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update User</button>
        </form>
    </div>
</div>

<?php include('./partials/lower_html.php') ?>
