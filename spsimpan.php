<?php
// spsimpan.php

// Connect to the database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'wgs';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from Local Storage
$selectedItems = json_decode($_POST['selectedItems'], true);

// Prepare and execute SQL statements for each item
foreach ($selectedItems as $item) {
    $nosp = mysqli_real_escape_string($conn, $item['nosp']);
    $divisi = mysqli_real_escape_string($conn, $item['divisi']);
    $namabarang = mysqli_real_escape_string($conn, $item['namabarang']);
    $qty = mysqli_real_escape_string($conn, $item['qty']);

    $sql = "INSERT INTO po ( nosp, divisi, namabarang, qty) 
            VALUES ( '$nosp', '$divisi', '$namabarang', '$qty')";

    if (!mysqli_query($conn, $sql)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);

// Clear Local Storage after successful submission
echo "Data has been saved successfully!";
?>
