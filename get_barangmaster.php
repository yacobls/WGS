<?php
// Koneksi ke database
$servername = "localhost"; // Ganti dengan server Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "wgs"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil nilai kodebarang dari permintaan GET
$kodebarang = isset($_GET['kodebarang']) ? $_GET['kodebarang'] : '';

// Pastikan untuk menggunakan metode escape yang aman
$kodebarang = $conn->real_escape_string($kodebarang);

$sql = "SELECT * FROM masterbarang WHERE kodebarang = '$kodebarang'";

$result = $conn->query($sql);

// Menyimpan hasil query dalam bentuk array
$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "Data tidak ditemukan atau terjadi kesalahan pada query: " . $sql;
}

// Menutup koneksi ke database
$conn->close();

// Mengirim data sebagai respons JSON
header('Content-Type: application/json');
echo json_encode(['barang' => $data]);
?>
