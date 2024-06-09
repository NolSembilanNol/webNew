<?php
require 'admin/fungsi.php';

header('Content-Type: application/json');

// Ambil data marker dan alamat dari database
$query = "SELECT markers.lat, markers.lng, markers.title, markers.color, faskes.alamat 
          FROM markers 
          JOIN faskes ON markers.id = faskes.id";
$result = mysqli_query($conn, $query);

$markers = [];
while ($row = mysqli_fetch_assoc($result)) {
    $markers[] = $row;
}

echo json_encode($markers);
?>
