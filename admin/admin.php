<?php
session_start();
require 'koneksi.php';

if (isset($_SESSION['session_email'])) {
    $action = $_POST['action'];
    $response = array();

    if ($action == 'create' || $action == 'update') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $id = $_POST['id'];

        if ($action == 'create') {
            $query = "INSERT INTO db_user (username, email) VALUES ('$username', '$email')";
        } else if ($action == 'update') {
            $query = "UPDATE db_user SET username='$username', email='$email' WHERE id=$id";
        }

        if ($conn->query($query) === TRUE) {
            $response['status'] = 'success';
        } else {
            $response['status'] = 'error';
            $response['message'] = $conn->error;
        }
    } else if ($action == 'delete') {
        $id = $_POST['id'];
        $query = "DELETE FROM db_user WHERE id=$id";

        if ($conn->query($query) === TRUE) {
            $response['status'] = 'success';
        } else {
            $response['status'] = 'error';
            $response['message'] = $conn->error;
        }
    } else if ($action == 'read') {
        $query = "SELECT * FROM db_user";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $response['data'][] = $row;
            }
            $response['status'] = 'success';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'No records found';
        }
    }

    echo json_encode($response);
}
?>
