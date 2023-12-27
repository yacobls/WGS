<?php
// Koneksi ke database (sesuaikan dengan konfigurasi database Anda)
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'wgs';

$koneksi = new mysqli($host, $username, $password, $database);

if ($koneksi->connect_error) {
    die('Koneksi ke database gagal: ' . $koneksi->connect_error);
}

// Ambil nilai kodeproduksi dari parameter GET
$kodeproduksi = $_GET['kodeproduksi'];

// Query ke database untuk mendapatkan nilai SPK
$query = "SELECT spk FROM produksi WHERE kodeproduksi = '$kodeproduksi'";
$result = $koneksi->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $spk = $row['spk'];

    // Kembalikan nilai SPK dalam format JSON
    echo json_encode(['spk' => $spk]);
} else {
    // Jika tidak ada hasil, kembalikan nilai SPK kosong
    echo json_encode(['spk' => '']);
}

// Tutup koneksi ke database
$koneksi->close();
?>
