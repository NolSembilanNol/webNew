<?php
require 'fungsi.php';

// Fetch all facilities
$fasilitas = query("SELECT * FROM faskes");

// Send JSON response
header('Content-Type: application/json');
echo json_encode($fasilitas);
?>
