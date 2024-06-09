<?php
require_once('koneksi.php');

// Start session
session_start();

// Mengecek dan mendapatkan SESSION status
if (isset($_SESSION["status"]) && $_SESSION["status"] == true) {
    $sessionStatus = true;
} else {
    $sessionStatus = false;
}

// Mengecek dan mendapatkan data email
if (isset($_SESSION["email"])) {
    $sessionEmail = $_SESSION["email"];
} else {
    $sessionEmail = "";
}

// Periksa apakah sesi aktif
if ($sessionStatus == false && basename($_SERVER['PHP_SELF']) != 'login.php') {
    header('Location: ../login.php');
    exit();
}

// Siapkan dan eksekusi query untuk mendapatkan data user berdasarkan email
if ($sessionEmail) {
    $query = "SELECT * FROM db_user WHERE email = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $sessionEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    // Ambil data user
    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
    } else {
        echo "User tidak ditemukan.";
        exit();
    }
    // Tutup statement dan koneksi
    $stmt->close();
}
$mysqli->close();
?>
