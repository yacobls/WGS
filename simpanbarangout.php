<?php
// Koneksi ke database
$servername = "localhost"; // Ganti dengan nama server database Anda
$username = "root"; // Ganti dengan nama pengguna database Anda
$password = ""; // Ganti dengan kata sandi database Anda
$dbname = "wgs"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap data dari formulir
$tgl_out = $_POST['tgl_out'];
$namabarang = $_POST['namabarang'];
$qty_out = $_POST['qty_out'];
$satuan = $_POST['satuan'];
$serialnumber = $_POST['serialnumber'];
$kodeproduksi = $_POST['kodeproduksi'];
$nospk = $_POST['nospk'];
$remarks = $_POST['remarks'];

// Query SQL untuk menyimpan data ke tabel barang_in
$sql = "INSERT INTO barangout (tgl_out, namabarang, qty_out, satuan, serialnumber, kodeproduksi, nospk, remarks)
        VALUES ('$tgl_out', '$namabarang', '$qty_out', '$satuan', '$serialnumber', '$kodeproduksi', '$nospk', '$remarks')";

if ($conn->query($sql) === TRUE) {
    // Jika data berhasil disimpan, tampilkan alert dan alihkan ke stocksummary
    echo "<script>
            alert('Data Berhasil disimpan');
            window.location.href = 'daftarmaster';
          </script>";
} else {
    // Jika ada kesalahan, tampilkan pesan error
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi database
$conn->close();
?>
