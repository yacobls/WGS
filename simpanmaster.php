<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection

    $servername = "localhost"; // Change this if your database server is on a different host
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $database = "wgs"; // Change this to your database name

    // Create a connection
    $koneksi = new mysqli($servername, $username, $password, $database);

    // Check the connection
    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    }

    $koneksi->set_charset("utf8");

    // Retrieve data from the form
    $kodebarang = $_POST['kodebarang'];
    $namabarang = $_POST['namabarang'];
    $class = $_POST['class'];
    $tipe = $_POST['tipe'];
    $satuan = $_POST['satuan'];
    $minimumstock = $_POST['minimumstock'];

    for ($i = 0; $i < count($kodebarang); $i++) {
        // Insert data into masterbarang table
        $query_masterbarang = "INSERT INTO masterbarang (kodebarang, namabarang, class, tipe, satuan, minimumstock) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_masterbarang = mysqli_prepare($koneksi, $query_masterbarang);
        mysqli_stmt_bind_param($stmt_masterbarang, 'ssssss', $kodebarang[$i], $namabarang[$i], $class[$i], $tipe[$i], $satuan[$i],  $minimumstock[$i]);
        $result_masterbarang = mysqli_stmt_execute($stmt_masterbarang);
        mysqli_stmt_close($stmt_masterbarang);

        // Insert data into stockbarangglobal table
        $query_stockbarangglobal = "INSERT INTO stockbarangglobal (kodebarang, namabarang, class, tipe, satuan, minimumstock, stock) VALUES (?, ?, ?, ?, ?, ?, 0)";
        $stmt_stockbarangglobal = mysqli_prepare($koneksi, $query_stockbarangglobal);
        mysqli_stmt_bind_param($stmt_stockbarangglobal, 'ssssss', $kodebarang[$i], $namabarang[$i], $class[$i], $tipe[$i], $satuan[$i], $minimumstock[$i]);
        $result_stockbarangglobal = mysqli_stmt_execute($stmt_stockbarangglobal);
        mysqli_stmt_close($stmt_stockbarangglobal);

        if (!$result_masterbarang || !$result_stockbarangglobal) {
            echo "Error: " . mysqli_error($koneksi);
        }
    }

    mysqli_close($koneksi);

    // Provide feedback on the success of the operation
    echo "Data berhasil disimpan ke tabel masterbarang dan stockbarangglobal.";
    header("Location: buatmaster.php");
} else {
    // Redirect to the form page if accessed directly
    header("Location: buatmaster.php");
    exit();
}
?>
