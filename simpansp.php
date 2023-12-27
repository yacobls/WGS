<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tgl = $_POST['tgl'];
    $nosp = $_POST['nosp'];
    $namabarang = $_POST['namabarang'];
    $qty = $_POST['qty'];
    $satuan = $_POST['satuan'];
    $divisi = $_POST['divisi'];
    $stock = $_POST['stock'];
    $remarks = $_POST['remarks'];
    $status = $_POST['status'];

    $query = "INSERT INTO sp (tgl, nosp, namabarang, qty, satuan, divisi, stock, remarks, status) 
              VALUES ('$tgl', '$nosp', '$namabarang', '$qty', '$satuan', '$divisi', '$stock', '$remarks', '$status')";
if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data SP berhasil disimpan.'); window.location.href='sp.php';</script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

    mysqli_close($koneksi);
}
?>
