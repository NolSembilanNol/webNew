<?php
// session_start();
// session_unset();
// session_destroy();

// if (isset($_COOKIE['email'])) {
//     setcookie('email', '', time() - 3600, "/");
// }
// if (isset($_COOKIE['password'])) {
//     setcookie('password', '', time() - 3600, "/");
// }

// header("Location: login.php");
// exit();



// Start session
session_start();

// Menghapus semua session yang telah didefinisikan
session_destroy();

// Mengarahkan menuju halaman login
header ("Location: ./login.php");