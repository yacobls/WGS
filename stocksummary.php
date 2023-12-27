<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$koneksi = new mysqli("localhost", "root", "", "wgs");

// Periksa apakah koneksi berhasil atau tidak
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$query = "SELECT
            sg.kodeproduksi, sg.kodebarang, sg.class,
            GROUP_CONCAT(sg.serialnumber SEPARATOR ', ') AS serialnumber,
            sg.namabarang,
            SUM(COALESCE(bi.stock_in, 0)) AS stock_in,
            SUM(COALESCE(bo.stock_out, 0)) AS stock_out,
            SUM(COALESCE(bi.stock_in, 0) - COALESCE(bo.stock_out, 0)) AS stock
          FROM stockbarangglobal sg
          LEFT JOIN barangin bi ON sg.namabarang = bi.namabarang
          LEFT JOIN barangout bo ON sg.namabarang = bo.namabarang
          GROUP BY sg.kodebarang, sg.kodeproduksi, sg.class, sg.serialnumber, sg.namabarang";

$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table class='table'>
            <tr>
            <th>ACTION</th>
                <th>ITEM CODE</th>
                <th>ITEM NAME</th>
                <th>STOCK IN</th>
                <th>STOCK OUT</th>
                <th>STOCK</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td><a href='#' class='infoButton' data-quotes='" . $row["namabarang"] . "'><i class='fa fa-info-circle' aria-hidden='true' title='Info'></i></a></td>
                <td>" . $row["kodebarang"] . "</td>
                <td>" . $row["namabarang"] . "</td>
                <td>" . $row["stock_in"] . "</td>
                <td>" . $row["stock_out"] . "</td>
                <td>" . $row["stock"] . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data untuk sales ini.";
}

mysqli_close($koneksi);
?>
