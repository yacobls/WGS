<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$namabarang = $_GET['namabarang'];

$query = "SELECT DISTINCT serialnumber FROM barangin WHERE namabarang = '$namabarang' AND stock_in > 0";
$result = mysqli_query($koneksi, $query);

$serialnumbers = array();

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $serialnumbers[] = $row['serialnumber'];
    }
}

echo json_encode($serialnumbers);

mysqli_close($koneksi);
?>
