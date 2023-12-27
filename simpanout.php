<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menggunakan mysqli_real_escape_string untuk mencegah SQL Injection
    $tgl_out = mysqli_real_escape_string($koneksi, $_POST["tgl_out"]);
    $no = mysqli_real_escape_string($koneksi, $_POST["no"]);
    $namabarang = mysqli_real_escape_string($koneksi, $_POST["namabarang"]);
    $stock_out = mysqli_real_escape_string($koneksi, $_POST["stock_out"]);
    $satuan = mysqli_real_escape_string($koneksi, $_POST["satuan"]);
    $serialnumber = mysqli_real_escape_string($koneksi, $_POST["serialnumber"]);
    $kodeproduksi = mysqli_real_escape_string($koneksi, $_POST["kodeproduksi"]);
    $nospk = mysqli_real_escape_string($koneksi, $_POST["nospk"]);
    $remarks = mysqli_real_escape_string($koneksi, $_POST["remarks"]);

    // Memulai transaksi
    mysqli_begin_transaction($koneksi);

    $query = "INSERT INTO barangout (tgl_out, no, namabarang, stock_out, satuan, serialnumber, kodeproduksi, nospk, remarks) VALUES ('$tgl_out', '$no', '$namabarang', '$stock_out', '$satuan', '$serialnumber', '$kodeproduksi', '$nospk', '$remarks')";

    $update_stock_query = "UPDATE barangin SET stock_in = stock_in - $stock_out WHERE serialnumber = '$serialnumber'";

    $update_stock_global_query = "UPDATE stockbarangglobal SET stock_out = stock_out + $stock_out WHERE namabarang = '$namabarang' AND serialnumber = '$serialnumber'";

    $update_kodeproduksi_query = "UPDATE barangin SET kodeproduksi = '$kodeproduksi' WHERE serialnumber = '$serialnumber'";

    if (mysqli_query($koneksi, $query) && mysqli_query($koneksi, $update_stock_query) && mysqli_query($koneksi, $update_stock_global_query) && mysqli_query($koneksi, $update_kodeproduksi_query)) {
        // Commit transaksi jika semuanya berhasil
        mysqli_commit($koneksi);
        echo "<script>alert('Data Barang Keluar berhasil disimpan.');</script>";
        echo "<script>window.location.href='out.php';</script>";
    } else {
        // Rollback transaksi jika terjadi kesalahan
        mysqli_rollback($koneksi);
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        echo "Error updating stock_global: " . mysqli_error($koneksi);
        echo "Error updating kodeproduksi: " . mysqli_error($koneksi);
    }

    // Menutup transaksi
    mysqli_close($koneksi);
}
?>
