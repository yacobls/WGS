<?php
$no_barangin = $_GET['no_barangin'];

$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query_stock_in = "SELECT stock_in FROM barangin WHERE no = $no_barangin";
$result_stock_in = mysqli_query($koneksi, $query_stock_in);

if ($result_stock_in) {
    $data_stock_in = mysqli_fetch_assoc($result_stock_in);
    $stock_in_barangin = $data_stock_in['stock_in'];

    $response = array('stock_in' => $stock_in_barangin);
    echo json_encode($response);
} else {
    echo json_encode(array('error' => 'Error dalam melakukan query'));
}

mysqli_close($koneksi);
?>
