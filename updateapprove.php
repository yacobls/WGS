<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Pastikan bahwa parameter nosp telah diset dan memiliki nilai
if (isset($_GET['nosp'])) {
    // Mendapatkan nilai nosp dari URL
    $nospValue = $_GET['nosp'];

    // Lakukan pembaruan status dan rndapprvl di tabel "sp"
    $sql = "UPDATE sp SET status = 'Approved', rndapprvl = '✅' WHERE nosp = '$nospValue'";

    if (mysqli_query($koneksi, $sql)) {
        echo "Pembaruan berhasil";
    } else {
        echo "Error updating record: " . mysqli_error($koneksi);
    }

    // Redirect kembali ke halaman sebelumnya atau halaman lain
    header("Location: requestsp.php"); // Ganti dengan halaman yang sesuai
    exit();
} else {
    // Jika parameter nosp tidak ditemukan, tangani sesuai kebutuhan aplikasi Anda
    echo "Parameter nosp tidak valid atau tidak disertakan.";
}

mysqli_close($koneksi);
?>
