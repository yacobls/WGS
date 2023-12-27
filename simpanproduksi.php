<?php
// Pastikan koneksi sudah diatur sebelumnya
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari formulir
    $kodeproduksi = $_POST["kodeproduksi"];
    $nounit = $_POST["nounit"];
    $tipe = $_POST["tipe"];

    // Selanjutnya, Anda dapat menyimpan data ke database atau melakukan tindakan lain sesuai kebutuhan
    // Contoh: Menyimpan data ke tabel produksi
    $query = "INSERT INTO produksi (kodeproduksi, nounit, tipe) VALUES ('$kodeproduksi', '$nounit', '$tipe')";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
        // Jika berhasil, alihkan ke produksi.php
        header("Location: produksi.php");
        exit();
    } else {
        // Jika gagal, Anda dapat menangani kesalahan sesuai kebutuhan
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
}

// Jika form tidak disubmit, Anda dapat menangani atau mengarahkan kembali ke halaman produksi.php
?>
