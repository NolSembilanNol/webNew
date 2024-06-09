<?php 
$conn = mysqli_connect("localhost", "root", "", "heals");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = []; // Corrected the syntax here

    if (!$result) {
        die("Query failed: " . mysqli_error($conn)); // Added error handling
    }

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah_gambar(){
    global $conn;
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $query = "INSERT INTO gallery VALUES ('','$gambar')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    if( $error == 4 ){
        echo "
            <script>alert('Upload Gambar Terlebih Dahulu')</script>
        ";
        return false;
    }
    $ektensiValid = ["jpg", "jpeg", "png", "gif"];
    $ekstensiFile = explode(".", $namaFile);
    $eks = strtolower(end($ekstensiFile));
    if(!in_array($eks, $ektensiValid)){
        echo "
            <script>alert('Yang Anda Upload Bukan Gambar')</script>
        ";
        return false;
    }

    if($ukuranFile > 5000000){
        echo "
            <script>alert('Ukuran File Foto Terlalu Besar')</script>
        ";
        return false;
    }

    move_uploaded_file($tmpName, '../img/' . $namaFile);
    return $namaFile;

}

function ubah_gambar($data){
    global $conn;
    $id = $data["id"];
    $gambarlama = htmlspecialchars($data["gambarlama"]);
    if($_FILES["gambar"]["error"] == 4){
        $gambar = $gambarlama;
    } else {
        $gambar = upload();
    }
    $query = "UPDATE gallery SET 
                gambar = '$gambar'
              WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    $id = $data['id'];
    $gambarlama = htmlspecialchars($data["gambarlama"]);
    if($_FILES["gambar"]["error"] == 4){
        $gambar = $gambarlama;
    } else {
        $gambar_berita = upload();
    }
    // Mengamankan dari defacer
    $judul = mysqli_real_escape_string($conn, htmlspecialchars($data["judul"]));
    $ulasan_singkat = mysqli_real_escape_string($conn, htmlspecialchars($data["ulasan_singkat"]));
    $ulasan_panjang = mysqli_real_escape_string($conn, htmlspecialchars($data["ulasan_panjang"]));

    // Query SQL untuk menambahkan berita dengan gambar
    $query = "UPDATE berita SET
            judul_berita = '$judul',
            ulasan_singkat = '$ulasan_singkat',
            ulasan_panjang = '$ulasan_panjang',
            img_berita = '$gambar_berita'
            WHERE id_berita = '$id'
    ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function hapus($id, $database, $name_id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM $database WHERE $name_id = '$id'");
    return mysqli_affected_rows($conn);
}

?>