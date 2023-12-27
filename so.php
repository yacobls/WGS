<?php
// Pastikan ini ada di bagian atas file untuk koneksi database
// Gantilah nilai-nilai berikut sesuai dengan informasi database Anda
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wgs";

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses form saat disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai-nilai dari form
    $oc = $_POST["oc"];
    $quotes = $_POST["quotes"];
    $pocust = $_POST["pocust"];
    $namacustomer = $_POST["namacustomer"];
    $email = $_POST["email"];
    $alamat = $_POST["alamat"];
    $tgloc = $_POST['tgloc'];
    $tglpo = $_POST['tglpo'];
    $status= $_POST['status'];
    $subtotal =$_POST['subtotal'];
    $ppn = $_POST['ppn'];
    $totalall = $_POST['totalall'];

    // Tambahkan penanganan untuk input lebih dari satu untuk 'namabarang', 'qty', 'satuan', 'harga_satuan'
    $namabarang = isset($_POST["namabarang"]) ? $_POST["namabarang"] : array();
    $qty = isset($_POST["qty"]) ? $_POST["qty"] : array();
    $satuan = isset($_POST["satuan"]) ? $_POST["satuan"] : array();
    $price = isset($_POST["price"]) ? $_POST["price"] : array();
     $totalprice = isset($_POST["totalprice"]) ? $_POST["totalprice"] : array();
    

// ...
// Masukkan data ke dalam tabel 'oc' termasuk kolom 'namabarang', 'qty', 'satuan', dan 'harga_satuan'
$sql_oc = "INSERT INTO oc (oc, quotes, pocust, namacustomer, email, alamat, tgloc, tglpo, status, subtotal, ppn, totalall, namabarang, qty, satuan, price,totalprice) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql_oc);
$stmt->bind_param("sssssssssssssssss", $oc, $quotes, $pocust, $namacustomer, $email, $alamat, $tgloc, $tglpo, $status, $subtotal, $ppn, $totalall, $namabarangVal, $qtyVal, $satuanVal, $priceVal, $totalpriceVal);

// Loop melalui array dan eksekusi statement untuk setiap set nilai
for ($i = 0; $i < count($namabarang); $i++) {
    $namabarangVal = $namabarang[$i];
    $qtyVal = $qty[$i];
    $satuanVal = $satuan[$i];
    $priceVal = $price[$i];
     $totalpriceVal = $totalprice[$i];
    

    // Eksekusi statement
    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error;
        break;  // Keluar dari loop jika terjadi kesalahan
    }
}

// ...


    // Tutup statement
    $stmt->close();

    // Update status to "Pending OC" in the 'quotes' table
    $update_quotes_sql = "UPDATE quotes SET status = 'PENDING OC' WHERE quotes = ?";
    $stmt_update_quotes = $conn->prepare($update_quotes_sql);
    $stmt_update_quotes->bind_param("s", $quotes);

    // Execute the update statement
  // ...

// Execute the update statement
if ($stmt_update_quotes->execute()) {
    // Show an alert and redirect to "daftaroc" page
    echo '<script>alert("Data berhasil disimpan dan status diupdate."); window.location.href = "daftaroc.php";</script>';
} else {
    echo "Error updating status: " . $stmt_update_quotes->error;
}

// ...



    // Tutup statement dan koneksi database
    $stmt_update_quotes->close();
    $conn->close();
}
?>
