<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$koneksi = new mysqli("localhost", "root", "", "wgs");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Assuming you received the data from the client-side
$kodebarang = $_POST['kodebarang'];
$namabarang = $_POST['namabarang'];
$satuan = $_POST['satuan'];

// Update the satuan value in the database
$updateQuery = "UPDATE masterbarang SET namabarang = '$namabarang', satuan = '$satuan' WHERE kodebarang = '$kodebarang'";
if ($koneksi->query($updateQuery) === TRUE) {
    echo "Data updated successfully";
} else {
    echo "Error updating data: " . $koneksi->error;
}

mysqli_close($koneksi);
?>
