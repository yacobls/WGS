<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tgl_in = $_POST["tgl_in"];
    $no = $_POST["no"];
    $nopo = $_POST["nopo"];
    $satuan = $_POST["satuan"];
    $namabarang = $_POST["namabarang"];
    $nospk = $_POST["nospk"];
    $serialnumber = $_POST["serialnumber"];
    $kodeproduksi = $_POST["kodeproduksi"];
    $remarks = $_POST["remarks"];
    $class = $_POST["class"];
    $stock_in = $_POST["stock_in"];

    // Query untuk memasukkan data ke tabel barangin
    $query = "INSERT INTO barangin (tgl_in, no, nopo, satuan, namabarang, nospk, serialnumber, kodeproduksi, remarks, class, stock_in) VALUES ('$tgl_in', '$no', '$nopo', '$satuan', '$namabarang', '$nospk', '$serialnumber', '$kodeproduksi', '$remarks', '$class','$stock_in')";

    // Menjalankan query untuk memasukkan data ke tabel barangin
    if (mysqli_query($koneksi, $query)) {
        // Ambil nilai stock_in dari tabel barangin
        $query_stock_in_barangin = "SELECT stock_in FROM barangin WHERE namabarang='$namabarang'";
        $result_stock_in_barangin = mysqli_query($koneksi, $query_stock_in_barangin);

        if ($result_stock_in_barangin) {
            $data_stock_in_barangin = mysqli_fetch_assoc($result_stock_in_barangin);
            $stock_in_barangin = (int)$data_stock_in_barangin["stock_in"];

            // Tambahkan nilai stock_in dari barangin ke stock_in di stockbarangglobal
            $query_update_stock_in = "UPDATE stockbarangglobal SET stock_in = stock_in + $stock_in_barangin WHERE namabarang='$namabarang'";

            if (mysqli_query($koneksi, $query_update_stock_in)) {
                // Update qty di tabel sp
                $updateQuery = "UPDATE po_copy SET qty = qty - $stock_in 
                                WHERE nopo = '$nopo'";

             // ...
if (mysqli_query($koneksi, $updateQuery)) {
    // Tambahkan query untuk memperbarui kolom nosuratjalan dan tglsj di tabel sp
    $nosuratjalan = $_POST["nosuratjalan"]; // Ambil nilai nosuratjalan dari formulir
    $tglsj = $_POST["tglsj"]; // Ambil nilai tglsj dari formulir
    
    $updateSpQuery = "UPDATE sp SET nosuratjalan = '$nosuratjalan', tglsj = '$tglsj' WHERE nopo = '$nopo'";
    
    if (mysqli_query($koneksi, $updateSpQuery)) {
        echo "<script>alert('Data Barang Masuk berhasil disimpan.');</script>";
        echo "<script>window.location.href='in.php';</script>";
    } else {
        echo "Error updating nosuratjalan dan tglsj di tabel sp: " . mysqli_error($koneksi);
    }
} else {
    echo "Error updating qty: " . mysqli_error($koneksi);
}
// ...
}
             else {
                echo "Error updating stock_in di stockbarangglobal: " . mysqli_error($koneksi);
            }
        } else {
            echo "Error fetching stock_in from barangin: " . mysqli_error($koneksi);
        }
    } else {
        echo "Error memasukkan data ke tabel barangin: " . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>
