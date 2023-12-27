<?php
if (isset($_GET['kodeproduksi'])) {
    $kodeproduksi = $_GET['kodeproduksi'];

    // Lakukan update nilai preparation dengan tanggal hari ini
    $koneksi = new mysqli("localhost", "root", "", "wgs");

    // Periksa apakah koneksi berhasil atau tidak
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    $preparation = date("Y-m-d"); // Mengambil tanggal hari ini

    // Lakukan update nilai preparation
    $queryUpdate = "UPDATE produksi SET preparation = '$preparation' WHERE kodeproduksi = '$kodeproduksi'";
    $resultUpdate = mysqli_query($koneksi, $queryUpdate);

    if ($resultUpdate) {
        mysqli_close($koneksi);
        header("Location: mixer.php"); // Alihkan ke halaman mixer.php setelah update berhasil
        exit();
    } else {
        echo "Update gagal: " . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
} else {
    echo "Kode Produksi tidak ditemukan.";
}
?>
