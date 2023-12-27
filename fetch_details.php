<?php
// fetch_details.php

// Assuming you have a database connection established
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wgs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get 'namabarang' from the POST data
$namabarang = $_POST['namabarang'];

// Fetch data based on 'namabarang'
$sql = "SELECT namabarang, kodebarang FROM masterbarang WHERE namabarang = '$namabarang'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $namabarangValue = $row['namabarang'];
    $kodebarangValue = $row['kodebarang'];

    // Output JSON format for JavaScript to handle
    echo json_encode(array('namabarang' => $namabarangValue, 'kodebarang' => $kodebarangValue));
} else {
    echo json_encode(array('error' => 'Data not found'));
}

// Close the database connection
$conn->close();
?>
