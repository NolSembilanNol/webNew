<?php

require_once('koneksi.php');

// Status tidak error
$error = 0;

// Memvalidasi inputan
if ( isset($_POST['email']) ) $email = $_POST['email'];
else $error = 1;

if ( isset($_POST['password']) ) $password = $_POST['password'];
else $error = 1;

// Mengatasi jika terdapat error pada data inputan
if ( $error == 1 )  {
    echo "Terjadi kesalahan pada data inputan <a href='login.php'>Kembali</a>";
    exit();
}

// Hashing Password
$password = hash ("sha256", $password);

// Menyiapkan Query MySQL untuk dieksekusi dengan prepared statement
$query = "SELECT * FROM db_user WHERE email = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

$data = $result->fetch_assoc();

if (is_null($data) ) {
    echo "
        <script>
            alert('Email tidak terdaftar');
            window.location.href = 'login.php';
        </script>
    ";
    exit();
} else if ( $data['password'] != $password ) {
    echo "
        <script>
            alert('Kata sandi salah!');
            window.location.href = 'login.php';
        </script>
    ";
    exit();
} else {
    // Memulai fungsi SESSION
    session_start();

    $_SESSION["status"] = true;
    $_SESSION["nama"] = $data["nama"];
    $_SESSION["email"] = $data["email"];

    // Debugging: Periksa apakah sesi disimpan
    // if (isset($_SESSION["status"])) {
    //     echo "Sesi berhasil disimpan. Status: " . $_SESSION["status"];
    // } else {
    //     echo "Sesi tidak disimpan.";
    // }

    // Tutup statement dan koneksi
    $stmt->close();
    $mysqli->close();

    header('Location: admin/adminDB.php');
    exit();
}
?>
