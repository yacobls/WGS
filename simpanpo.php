<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $nopo = $_POST['nopo'];
    $poco = $_POST['poco'];
    $nospk = $_POST['nospk'];
    $nott = $_POST['nott'];
    $ttdetails = $_POST['ttdetails'];
    $tglpo = $_POST['tglpo'];
    $namasuplier = $_POST['namasuplier'];
    $cp = $_POST['cp'];
    $telp = $_POST['telp'];
    $subtotal = $_POST['subtotal'];
    $ppn = $_POST['ppn'];
    $totalall = $_POST['totalall'];

    // Ambil data detail barang
    $namabarang = $_POST['namabarang'];
    $qty = $_POST['qty'];
    $satuan = $_POST['satuan'];
    $price = $_POST['price'];
    $totalprice = $_POST['totalprice'];
    $nosp = $_POST['nosp'];
    $divisi = $_POST['divisi'];

    // Insert data ke tabel 'po' untuk setiap barang
    for ($i = 0; $i < count($namabarang); $i++) {
        $query_po = "INSERT INTO po (nopo, poco, nospk, nott, ttdetails, tglpo, namasuplier, cp, telp,subtotal,ppn,totalall, namabarang, qty, satuan, price, totalprice,nosp,divisi) VALUES ('$nopo', '$poco', '$nospk', '$nott', '$ttdetails', '$tglpo', '$namasuplier', '$cp', '$telp', '$subtotal',
            '$ppn','$totalall',  '{$namabarang[$i]}', '{$qty[$i]}', '{$satuan[$i]}', '{$price[$i]}', '{$totalprice[$i]}', '{$nosp[$i]}' , '{$divisi[$i]}'   )";
        $result_po = mysqli_query($koneksi, $query_po);

        if (!$result_po) {
            die("Query gagal: " . mysqli_error($koneksi));
        }
    }

   header("Location: po.php");
    exit();
}

mysqli_close($koneksi);
?>
