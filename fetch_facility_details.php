// fetch_facility_details.php
<?php
require 'admin/fungsi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $faskes = query("SELECT * FROM faskes WHERE id = $id")[0];
    echo json_encode($faskes);
} else {
    echo json_encode(['error' => 'No ID provided']);
}
?>
