<?php
require_once('koneksi.php');
require_once('cek_sesi.php');

if ($sessionStatus == true) {
    header('Location: admin/adminDB.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - HEALS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: "Inter", sans-serif;
        }
    </style>
</head>

<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href="" class="text-decoration-none">HEALS</a></div>
            <div class="menu">
                <ul>
                    <li><a href="./" class="tbl-biru">Home</a></li>
                    <li><a href="">Log In</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="login-form">
        <div class="wrapper">
            <div class="logo_in">
                <img src="https://cdn-icons-png.freepik.com/256/1077/1077114.png?ga=GA1.1.1635961466.1715582567&semt=ais_hybrid" />
            </div>
            <h2>Log In</h2>
            <form action="action_login.php" method="POST">
                <label for="email">Email:</label><br>
                <input type="text" id="email" name="email" value="" required><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" value="" required><br>
                
                <!-- <div class="checkbox">
                    <label>
                        <input id="login-remember" type="checkbox" name="ingataku" value="1" <?php //   if(isset($_COOKIE['ingataku']) && $_COOKIE['ingataku'] == '1') echo "checked"; ?> Ingat pengguna
                    </label>
                </div><br> -->

                <input type="submit" value="Log In">
            </form>
            <!-- <p>Belum Mempunyai Akun? <a href="signup.php">Daftar</a></p> -->
        </div>
    </div>

    <!-- Footer -->
    <?php include('partials/footer.php'); ?>
    
</body>

</html>
