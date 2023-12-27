<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kodebarang= $_POST['kodebarang'];
    $namabarang = $_POST['namabarang'];
    $class = $_POST['class'];
    $tipe = $_POST['tipe'];
    $minimumstock = $_POST['minimumstock'];
    $satuan = $_POST['satuan']; 

    // Periksa apakah nama barang sudah ada
    $cek_query = "SELECT * FROM masterbarang WHERE namabarang='$namabarang'";
    $result = mysqli_query($koneksi, $cek_query);

    if (mysqli_num_rows($result) > 0) {
        echo '<script>
                alert("Nama Barang yang Anda masukkan sudah terdaftar.");
                window.location.href = "warehouse.php";
              </script>';
    } else {
        // Jika tidak ada, lakukan penambahan data
        $query = "INSERT INTO masterbarang (kodebarang, namabarang, class, satuan, tipe, minimumstock) VALUES ('$kodebarang', '$namabarang', '$class', '$satuan', '$tipe', '$minimumstock')";

        if (mysqli_query($koneksi, $query)) {
            // Query untuk memasukkan data ke dalam tabel stockbarangglobal
            $query_stock = "INSERT INTO stockbarangglobal (kodebarang, namabarang, class, tipe,minimumstock,stock,satuan) VALUES ('$kodebarang', '$namabarang', '$class', '$tipe','$minimumstock','$stock','$satuan')";
            if (mysqli_query($koneksi, $query_stock)) {
                echo '<div class="alert alert-success" role="alert">
                        </div>';
                header("Location: master.php");
                exit(); // Penting untuk menghentikan eksekusi skrip setelah mengalihkan
            } else {
                echo "Error: " . $query_stock . "<br>" . mysqli_error($koneksi);
            }
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    }

    mysqli_close($koneksi);
}
?>
