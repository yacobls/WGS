<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $oc = $_POST['oc'];
    $namacustomer = $_POST['namacustomer'];
    $alamat = $_POST['alamat'];
    $tgloc = $_POST['tgloc'];
    $subtotal = $_POST['subtotal'];
    $ppn = $_POST['ppn'];
    $totalall = $_POST['totalall'];

    // Ambil data detail barang
    $namabarang = $_POST['namabarang'];
    $qty = $_POST['qty'];
    $satuan = $_POST['satuan'];
    $price = $_POST['price'];
    $totalprice = $_POST['totalprice'];
  
   // ...

// Insert data ke tabel 'oc' untuk setiap barang
for ($i = 0; $i < count($namabarang); $i++) {
    $query_oc = "INSERT INTO oc (oc, namacustomer, alamat, tgloc, subtotal, ppn, totalall, namabarang, qty, satuan, price, totalprice) VALUES ('$oc', '$namacustomer', '$alamat', '$tgloc', '$subtotal', '$ppn', '$totalall', '{$namabarang[$i]}', '{$qty[$i]}', '{$satuan[$i]}', '{$price[$i]}', '{$totalprice[$i]}')";
    $result_oc = mysqli_query($koneksi, $query_oc);

    if (!$result_oc) {
        die("Query gagal: " . mysqli_error($koneksi));
    }
}

// ...


   header("Location: oc.php");
    exit();
}

mysqli_close($koneksi);
?>
