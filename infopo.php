<script> window.print() </script>
<?php
// Melakukan koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'wgs');

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mengambil nilai nopo dari parameter GET
$nopo = $_GET['nopo'];


// Query SQL untuk mengambil data dari tabel po berdasarkan nopo
$query_po = "SELECT * FROM po WHERE nopo='$nopo'";
$result_po = mysqli_query($conn, $query_po);


// Memeriksa apakah query berhasil dijalankan
if (!$result_po) {
    echo "Error: " . $query_po . "<br>" . mysqli_error($conn);
    exit();
}

// Fetch hasil query menjadi array associative
$row_po = mysqli_fetch_assoc($result_po);




// Query SQL untuk mengambil data dari tabel po berdasarkan nopo
$query = "SELECT * FROM po WHERE nopo='$nopo'";
$result = mysqli_query($conn, $query);
// Memeriksa apakah query berhasil dijalankan
if ($result) {
    // Fetch hasil query menjadi array associative
    while ($row = mysqli_fetch_assoc($result)) {
        $nopo = $row['nopo'];
        $tglpo = $row['tglpo'];
        $namasuplier = $row['namasuplier'];
        $cp = $row['cp'];
        $telp = $row['telp'];
        $totalprice = $row['totalprice'];
        $namabarang = $row['namabarang'];
         $subtotal = $row['subtotal'];
           $ppn = $row['ppn'];
             $totalall = $row['totalall'];


    }

    // Bebaskan hasil query
    mysqli_free_result($result);
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Menutup koneksi database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Order Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<style>
   body {
    padding: 20px;
}

.company-info {
    flex: 1;
}

.notes {
    flex: 1;
}

.detail {
    margin-left: auto;
    max-width: 150px; /* Sesuaikan dengan lebar maksimal yang diinginkan */
    flex: 2;
}

.detail p {
    margin-bottom: 5px;
}
.harga {
    margin-left: auto;
    max-width: 150px; /* Sesuaikan dengan lebar maksimal yang diinginkan */
    flex: 2;
}

.harga p {
    margin-bottom: 5px;
}



.ttd {
    margin-left: auto;
    max-width: 200px; /* Sesuaikan dengan lebar maksimal yang diinginkan */
    flex: 2;
}

.ttd p {
    margin-bottom: 5px;
}








.container {
    display: flex;
    justify-content: space-between; /* Agar elemen company-info dan detail berada di kedua ujung */
}

/* Gaya untuk elemen <th> (header) dan <td> (data) */



.table-shopping td {
    border: 1px solid black;
    padding: 10px;
    text-align: center;
    background-color: white;
    color: black;
}


.table-shopping th {
    border: 1px solid black;
    padding: 10px;
    text-align: center;
    background-color: #f2f2f2;
    color: black;
}

.table-shopping th[style^="width: 5%"],
.table-shopping td[style^="width: 5%"] {
    width: 5%;
}

.separator {
    margin: 0 14px; /* Sesuaikan dengan jumlah spasi yang diinginkan */
}

.separatorp {
    margin: 0 5px; /* Sesuaikan dengan jumlah spasi yang diinginkan */
}

.separatortotal {
    margin: 0 8px; /* Sesuaikan dengan jumlah spasi yang diinginkan */
}

    </style>
</head>

<body>

    <h4 style="color:black ; font-weight:bold; text-align:center; padding-top: 30px;">PURCHASE ORDER</h4>

    <br>

    <div style="display: flex; flex-wrap: wrap;">

        <div class="company-info">
            <p style="color:black;font-weight:bold;">PT. WIRA GULFINDO SARANA</p>
            <p style="color:black;font-weight: bold; ">JAKARTA</p>
            <p>NO. PO:</p>
            <p style="color:black;font-weight:bold"><?php echo $nopo; ?></p>
            <br>
            <p>Dengan Hormat,</p>
            <p>Bersama ini kami mohon dapat diberikan barang sbb:</p>

        </div>

        <div class="detail">

    <div style="display: flex; flex-wrap: wrap;">
            <p>Jakarta, <span><?php echo $tglpo; ?> </span></p>
            <p>Kepada Yth,</p>
            <p><?php echo $namasuplier; ?></p>
            <p>Up. <span> <?php echo $cp; ?></span></p>
            <p>Telp. <span><?php echo $telp; ?></span></p>
        </div>
</div>

<div class="table-responsive">
        <br>
        <table class="table table-shopping">
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Qty</th>
                <th>Satuan</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
                <th>SP</th>
              
            </tr>

            <?php
            // Inisialisasi counter untuk nomor baris
            $counter = 1;

            // Loop untuk menampilkan data dari tabel po
            do {
            ?>
                <tr>
                    <td><?php echo $counter; ?></td>
                    <td>

                        <p><?php echo $row_po['namabarang']; ?></p>
                    </td>
                    <td>
                        <p><?php echo $row_po['qty']; ?></p>
                    </td>
                    <td>
                        <p><?php echo $row_po['satuan'];?></p>
                    </td>
                    <td>
                        <p><?php echo $row_po['price'];?></p>
                    </td>
                    <td>

                        <p><?php echo $row_po['totalprice'];?></p>
                    </td>

                    <td>
                        <p><?php echo $row_po['nosp'];?></p>
                    </td>

                    
                </tr>
            <?php
                $counter++;
            } while ($row_po = mysqli_fetch_assoc($result_po));
            ?>
        </table>
    </div>
    <br>


<div class="harga">
<br>
<p>Subtotal : <?php echo $subtotal; ?> </p>
<p>PPN <span class="separator"></span>: <span class="separatorp"></span><?php echo $ppn; ?> </p>
<p>TOTAL <span class="separatortotal"></span>: <?php echo $totalall; ?> </p>
     </div>
</div>

<div class="notes">
<p style="color:black;font-weight:bold">Notes :</p>
<p>* Surat Jalan harus dicantumkan NO. PO</p>
<p>* Barang dikirim ke JL. Plumpang Semper No. 50 (Seberang BANK BNI), Tlp 021/4370626</p>
<p>* Jadwal penerimaan barang, Senin s/d Jumat, Pukul 08.00 s/d 16.00 </p>
<br>
<p>Demikian kami sampaikan, Atas bantuannya, kami ucapkan banyak terimakasih.</p>
</div>

<div class="ttd">
<br>
<p>Hormat Kami,</p>
<p style="color:black;font-weight:bold">Purchasing Department</p>
<img src="wgs.jpeg">
</div>
    <!-- Bootstrap JS dan library lainnya -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</body>

</html>
