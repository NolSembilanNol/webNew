<?php
require 'fungsi.php';

// Get user id from query string
$id = $_GET['id'];

// Delete user
$query = "DELETE FROM db_user WHERE id_user = $id";
mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    echo "<script>
            alert('User deleted successfully');
            document.location.href = 'manageUser.php';
          </script>";
} else {
    echo "<script>
            alert('Failed to delete user');
            document.location.href = 'manageUser.php';
          </script>";
}
?>
