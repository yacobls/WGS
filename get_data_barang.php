<?php
// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "wgs";

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

// Query untuk mengambil data dari tabel masterbarang
$query = "SELECT namabarang FROM masterbarang";
$result = $conn->query($query);

// Periksa hasil query
if ($result) {
    // Format hasil query menjadi array
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Mengembalikan data dalam format JSON
    echo json_encode($data);

    // Bebaskan hasil query
    $result->free();
} else {
    // Jika ada kesalahan dalam query
    echo json_encode(array('error' => 'Query Error'));
}

// Tutup koneksi
$conn->close();
?>
