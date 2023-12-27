
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

$query_nopo = mysqli_query($koneksi, "SELECT max(nopo) as nopoTerbesar FROM po");
$data_nopo = mysqli_fetch_array($query_nopo);
$nopoTerbesar = $data_nopo['nopoTerbesar'];
$urutan_nopo = (int) $nopoTerbesar + 1;
$nopo = $urutan_nopo;

?>

  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Warehouse</title>
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script>
  <!--favicon--><!-- 
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon"> -->
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  
</head>



<body class="bg-theme bg-theme2">
 
<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index.php">
       <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">Wira Gulfindo Sarana</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>


        <li>
        <a href="index.php">
        <i class="zmdi zmdi-face"></i> <span>Owner</span>
        </a>
      </li>

      

<li>
        <a href="owner.php">
        <i class="zmdi zmdi-chart"></i> <span>Marketing</span>
        </a>
      </li>

     <li>
  <a href="warehouse.php">
    <i class="zmdi zmdi-store"></i> <span>Warehouse</span>
  </a>
  <ul>
     <li><a href="master.php">MASTER BARANG</a></li>
       <li><a href="sp.php">SP</a></li>
       <li><a href="in.php">IN</a></li>
     <li><a href="stockimport.php">STOCK SUMARY & IMPORT</a></li>
        <li><a href="out.php">OUT</a></li>
         <li><a href="trackbarang.php">RIWAYAT BARANG</a></li>
   <!--   <li><a href="stockglobal.php">STOCK GLOBAL</a></li> -->

    <!-- Tambahkan lebih banyak sub-menu sesuai kebutuhan -->
  </ul>
</li>



<li>
     
        <a href="owner.php">
        <i class="zmdi zmdi-balance-wallet"></i> <span>Purchasing</span>
        <ul class="">
        <li ><a href="requestsp.php"> REQUEST SP</a></li>
        <li><a href="po.php"> PO</a></li>
        <li><a href="tt.php"> TT</a></li>
        
    </ul>
     </a>

      </li>





<li>
        <a href="owner.php">

          <i class="zmdi zmdi-truck"></i> <span>Produksi</span>


        </a>
      </li>
    </ul>
   
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
 
    <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Masukan Pencarian">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var form = document.querySelector('.search-bar');
  form.addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah pengiriman formulir melalui perubahan halaman

    var keywords = form.querySelector('input').value.toLowerCase();
    var rows = document.querySelectorAll('table tbody tr');

    rows.forEach(function(row) {
      var nopoCell = row.querySelector('td:nth-child(1)'); // Kolom NO PO
      var nospCell = row.querySelector('td:nth-child(11)'); // Kolom NO SP
      var nopoText = nopoCell.textContent.toLowerCase();
      var nospText = nospCell.textContent.toLowerCase();

      // Menggunakan Number() untuk memastikan bahwa yang diinput adalah nilai numerik
      if (nopoText.includes(keywords) || nospText.includes(keywords)) {
        row.style.display = ''; // Menampilkan baris yang sesuai
      } else {
        row.style.display = 'none'; // Menyembunyikan baris yang tidak sesuai
      }
    });
  });
});
</script>


  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-envelope-open-o"></i></a>
    </li>
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-bell-o"></i></a>
    </li>
    <li class="nav-item language">
  <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
    <i class="flag-icon flag-icon-id"></i> <!-- Ganti dengan kode bendera Indonesia -->
  </a>
</li>
    
  
  </ul>
</nav>
</header>
<!--End topbar header-->




<div class="clearfix"></div>
  <div class="content-wrapper">
    <div class="container-fluid">
  <div class="row">
   <div class="col-12 col-lg-12">
     <div class="card">
      <div class="card-body">
        <td>
              <h5 class="card-title text-center mb-3">DAFTAR PO</h5>
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cartModal">
    BUAT PO
  </button>  
    <br>
  </td>

<br>


<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 style="color: black; font-weight: bold; text-align: left; margin: ;" class="modal-title" id="exampleModalLabel">
    PURCHASE ORDER
</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">

                  <form id="tambahpo" action="simpanpo.php" method="POST">
           
                      <div style="display: flex; flex-wrap: wrap;">
    <div style="flex: 2; margin-right: 18px;">
        <p> <input type="text" readonly placeholder="Nomor PO" id="nopo" value="<?php echo $nopo ?>" name="nopo" style="color: black;"> </p>

         
        <p>
  <select id="poco" required name="poco" style="color: black; background-color: white;">
    <option style="color:black; background-color:white;"  value="" selected disabled>PO/CO</option>
    <option style="color:black; background-color: white;" value="PO">PO</option>
    <option style="color:black;background-color: white;" value="CO">CO</option>
  </select>
</p>

          


           <p class="custom-class"> 
<input style="color:black;"  list="namasuplierlist" placeholder="Nama Suplier" id="namasuplier" name="namasuplier" required autocomplete="off">
                          <datalist id="namasuplierlist">
                            <?php
                              $koneksi = mysqli_connect('localhost', 'root', '', 'wgs');
                              $query = "SELECT DISTINCT namasuplier, cp, telp FROM suplierlocal";
                              $result = mysqli_query($koneksi, $query);
                              while($row = mysqli_fetch_assoc($result)){
                                echo "<option value='".$row['namasuplier']."' data-cp='".$row['cp']."' data-telp='".$row['telp']."'>";
                              }
                            ?>
                          </datalist>
        
        </p>

             <p class="custom-class"><input required type="text" placeholder="Contact Person" id="cp" name="cp" style="color: black;"> </p>
               <p class="custom-class"><input required type="text" placeholder="telp" id="telp" name="telp" style="color: black;"> </p>
  



          <br>


    </div>
    <div style="flex: 1;">
        <p> <input readonly type="date" id="tglpo" name="tglpo" required="required">
                <script>
                    var inputTanggal = document.getElementById("tglpo");
                    var tanggalHariIni = new Date().toISOString().split("T")[0];
                    inputTanggal.value = tanggalHariIni;
                </script> </p>

<p> <input type="text" hidden placeholder="NOSPK" id="nospk" name="nospk" style="color: black;"> </p>
          <p> <input type="text" hidden placeholder="NOTT" id="nott" name="nott" style="color: black;"> </p>
          <p> <input type="text" hidden placeholder="TTDETAILS" id="ttdetails" name="ttdetails" style="color: black;"> </p>












    </div>
    <br>
<!-- Your HTML structure -->
<style>
    /* Add this style to your existing CSS or within the head section */
    .table-shopping {
        font-size: 15px; /* Adjust font size */
    }

    .table-shopping th, .table-shopping td {
        padding: 0px 0px; /* Adjust padding */
    }
</style>
<br>
<!-- Your HTML structure -->

<div class="table-responsive">
<p class="custom-class" style="font-weight: bold; color: black;">*Click <span style="color: red;">X</span> untuk menghapus barang dari daftar PO</p>

    <table class="table table-shopping">
        <tr>

             
            <th>Nama Barang</th>
            <th>Qty </th>
            <th>Satuan</th>
            <th>Harga Satuan</th>
            <th>Total Harga</th>
<th>Hapus</th>
           
        
        </tr>

        <?php
        // Fetch data from the "sp" table
        $koneksi = mysqli_connect('localhost', 'root', '', 'wgs');
        $query = "SELECT * FROM sp";
        $result = mysqli_query($koneksi, $query);

        // Counter for row number
        $counter = 1;

function formatRupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

// Memeriksa apakah formulir telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai harga dari formulir
    $harga = $_POST["price"];

    // Memformat harga menggunakan fungsi formatRupiah
    $hargaFormatted = formatRupiah($harga);

    // Menampilkan hasil atau melakukan operasi lain sesuai kebutuhan Anda
    echo "Harga yang diinput: " . $hargaFormatted;
}

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
               
                <td>
                    <p><input readonly type="text" name="namabarang[]" value="<?php echo $row['namabarang']; ?>"></p>
                </td>
                <td>
                    <p><input type="text" required name="qty[]" value="<?php echo $row['qty']; ?>"></p>
                </td>
                <td>
                    <p><input readonly type="text" name="satuan[]" value="<?php echo $row['satuan']; ?>"></p>
                </td>
           <td>
     <p><input type="text" required name="price[]" value="" oninput="updateTotalPrice(this)"></p>
    </td>
    <td>
        <p><input type="text" name="totalprice[]" readonly></p>
    </td>

<td>
    <p><a href="#" class="close" data-dismiss="modal" aria-label="Close" onclick="deleteRow(this)">
        <span aria-hidden="true" style="color: red;">&times;</span>
    </a></p>
</td>


                
                    <p><input hidden type="text" name="divisi[]" value="<?php echo $row['divisi']; ?>"></p>
           
                    <p><input type="text" hidden name="nosp[]" value="<?php echo $row['nosp']; ?>"></p>
               
                    <p style="width:5%;" ><input type="text" hidden name="no[]" value="<?php echo $counter; ?>"></p>
              
            </tr>
        <?php
            // Increment the counter
            $counter++;
        }
        ?>
    </table>
</div>


     
</div>
              <br>

<style>
  .right-align {
    flex: 1;
    text-align: right;
    padding-right: 200px;
  }
</style>
<br>
<!-- Gunakan class "right-align" pada paragraf-paragraf yang ingin diatur ke sebelah kanan -->
<p class="right-align"  style="color: black ; ">Subtotal : <input readonly type="text" placeholder="subtotal" id="subtotal" name="subtotal" oninput="updateFormattedSubTotal(this)" style="color: black;"></p>
<p class="right-align" style="color: black;">PPN : <input type="text" readonly oninput="updateFormattedPPN(this)" placeholder="ppn" id="ppn" name="ppn" style="color: black;"></p>
<p class="right-align" style="color: black;">TOTAL : <input type="text" readonly oninput="updateFormattedTotalAll(this)" placeholder="totalall" id="totalall" name="totalall" style="color: black;"></p>
      
                </div>

      <div class="modal-footer border-top-0 d-flex justify-content-between">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Checkout</button>
</form>
      </div>
    </div>
  </div>
</div>
<style>
.custom-class {
    color: black;
}
 .modal-content {
        width: 80%; /* You can adjust the percentage based on your preference */
        margin: auto; /* Center the modal horizontally */
    }

    /* Increase the height of the modal content */
    .modal-dialog {
        max-width: 90%; /* Adjust the maximum width of the modal */
        height: 90vh; /* Set the height to 90% of the viewport height */
        margin: 10px auto; /* Add some margin for better appearance */
    }

  /* Gaya untuk tombol "View Cart" */
  .btn-success {
    color: black; /* Warna teks */
    background-color: #28a745; /* Warna latar belakang */
    border-color: #28a745; /* Warna border */
  }
  /* Ganti warna placeholder menjadi putih */
::placeholder {
    color: black !important;
}


  /* Gaya untuk judul modal "Your Shopping Cart" */
  .modal-title {
    color: black; /* Warna teks */
    background-color: whitesmoke;
  }

  /* Gaya untuk tombol "Close" dan "Checkout" dalam modal */
  
    .btn-secondary {    background-color: #8B4513; /* Warna kecoklatan, contoh menggunakan kode warna hex */
    color: #fff; /* Warna teks, diatur menjadi putih agar kontras */
    border-color: #8B4513; /* Warna border sesuai dengan background color */
}

/* Jika ingin memberikan efek hover pada tombol */
.btn-secondary:hover {
    background-color: #654321; /* Warna kecoklatan yang berbeda saat tombol dihover */
    border-color: #654321; /* Warna border sesuai dengan background color hover */
    color: #fff; /* Warna teks saat tombol dihover */
}

  input::placeholder {
    border: none;
    color: whitesmoke;
}
.nopo::placeholder {
    color: black;
}
  .btn-success {
    color: #fff; /* Warna teks */
    background-color: #007bff; /* Warna latar belakang */
    border-color: #007bff; /* Warna border */
  }

  /* Gaya untuk teks harga dalam modal */
  .price {
    color: #28a745; /* Warna teks hijau untuk harga */
  }

 /* Gaya untuk tabel dalam modal */
 /* Gaya untuk tabel dengan class "table-shopping" dalam modal */
/* Gaya untuk tabel dengan class "table-shopping" dalam modal */
  .table-shopping {
        font-size: 13px; /* Adjust font size */
        width: 20%; /* Set the table width to 100% */
        height: 20%;

    }

    .table-shopping th, .table-shopping td {
        padding: 4px 6px; /* Adjust padding */
    }

.table-shopping th:first-child,
    .table-shopping td:first-child,
    .table-shopping th:nth-child(3),
    .table-shopping td:nth-child(3),
    .table-shopping th:nth-child(7),
    .table-shopping td:nth-child(7) {
        width: 5%; /* Adjust the width of the specified columns */
    }
.modal-content {
      width: 100%;
    }
/* Gaya untuk elemen <th> (header) */
.table-shopping th {
    border: 1px solid black; /* Menambah garis border sebanyak 1px dan berwarna hitam */
    padding: 10px; /* Memberikan padding agar isi sel tabel terlihat lebih baik */
    text-align: left; /* Menetapkan alignment teks menjadi kiri */
    background-color: #f2f2f2; /* Warna latar belakang untuk elemen <th> */
    color: black;
}
   .table-shopping th[style^="width: 5%"],
    .table-shopping td[style^="width: 5%"] {
        width: 5%;
    }

/* Gaya untuk elemen <td> (data) */
.table-shopping td {
    border: 1px solid black; /* Menambah garis border sebanyak 1px dan berwarna hitam */
    padding: 10px; /* Memberikan padding agar isi sel tabel terlihat lebih baik */
    text-align: center; /* Menetapkan alignment teks menjadi kiri */
    background-color: #ffffff; /* Warna latar belakang untuk elemen <td> */
    color: black;
}


</style>

<script>


function deleteRow(button) {
    // Find the parent row and remove it
    var row = button.closest('tr');
    row.remove();
}

document.addEventListener('DOMContentLoaded', function() {
    var tambahInButton = document.querySelector('.btn-success.btn-sm');
    tambahInButton.addEventListener('click', function() {
        $('#tambahBarangMasukModal').modal('show');
    });
});


  document.getElementById('namasuplier').addEventListener('input', function() {
    var selectedOption = document.querySelector('#namasuplierlist option[value="' + this.value + '"]');
    if (selectedOption) {
      var cpValue = selectedOption.getAttribute('data-cp');
      var telpValue = selectedOption.getAttribute('data-telp');
      
      // Set nilai cp dan telp sesuai dengan opsi yang dipilih
      document.getElementById('cp').value = cpValue;
      document.getElementById('telp').value = telpValue;
    }
  });
function formatRupiah(angka) {
    var reverse = angka.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);
    
    ribuan = ribuan.join('.').split('').reverse().join('');
    
    // Add handling for numbers with decimal parts
    var decimalPart = angka.toString().split('.')[1];
    var formattedValue = 'Rp ' + ribuan;

    if (decimalPart) {
        formattedValue += '.' + decimalPart;
    }

    return formattedValue;
}

function updateFormattedPrice(inputElement) {
    var inputValue = inputElement.value.replace(/[^\d]/g, ''); // Hapus karakter selain digit
    var formattedValue = formatRupiah(inputValue);

    // Tampilkan nilai yang diformat
    inputElement.value = formattedValue;
}

function updateTotalPrice(inputElement) {
    // Find the parent row
    var row = inputElement.closest('tr');

    // Get the quantity and unit price values
    var qty = row.querySelector('td:nth-child(2) input').value;
    var unitPrice = inputElement.value.replace(/[^\d]/g, ''); // Remove non-numeric characters

    // Calculate the total price
    var totalPrice = qty * unitPrice;

    // Update the formatted value
    var formattedTotalPrice = formatRupiah(totalPrice);
    row.querySelector('td:nth-child(5) input').value = formattedTotalPrice;


    var inputValue = inputElement.value.replace(/[^\d]/g, ''); // Hapus karakter selain digit
    var formattedValue = formatRupiah(inputValue);


    // Tampilkan nilai yang diformat
    inputElement.value = formattedValue;

    updateSubtotal();
}

// Assume you have a function to update the subtotal, let's call it updateSubtotal()
function updateSubtotal() {
    var totalPriceInputs = document.querySelectorAll('td:nth-child(5) input');
    var subtotal = 0;

    totalPriceInputs.forEach(function (input) {
        var totalPrice = input.value.replace(/[^\d]/g, '');
        subtotal += parseInt(totalPrice, 10) || 0;
    });

    var formattedSubtotal = formatRupiah(subtotal);
    document.getElementById('subtotal').value = formattedSubtotal;

    // After updating the subtotal, also update the PPN and TotalAll
    updateFormattedPPN(document.getElementById('ppn'));
    updateTotalAll(document.getElementById('totalall'));
}

// Function to update PPN based on subtotal
function updateFormattedPPN(inputElement) {
    var subtotalValue = document.getElementById('subtotal').value.replace(/[^\d]/g, '');
    var ppnPercentage = 0.11;
    var ppnValue = parseFloat(subtotalValue) * ppnPercentage;
    var formattedPPN = formatRupiah(ppnValue);
    inputElement.value = formattedPPN;

    // After updating the PPN, also update the TotalAll
    updateTotalAll(document.getElementById('totalall'));
}

// Function to update TotalAll based on subtotal and PPN
function updateTotalAll(inputElement) {
    var subtotalValue = document.getElementById('subtotal').value.replace(/[^\d]/g, '');
    var ppnValue = document.getElementById('ppn').value.replace(/[^\d]/g, '');

    var totalAllValue = parseFloat(subtotalValue) + parseFloat(ppnValue);
    var formattedTotalAll = formatRupiah(totalAllValue);
    inputElement.value = formattedTotalAll;
}

// Existing code for formatRupiah function
function formatRupiah(angka) {
    var reverse = angka.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);

    ribuan = ribuan.join('.').split('').reverse().join('');

    var decimalPart = angka.toString().split('.')[1];
    var formattedValue = 'Rp ' + ribuan;

    if (decimalPart) {
        formattedValue += '.' + decimalPart;
    }

    return formattedValue;
}














</script>


<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>TGL PO</th>
                <th>NO PO</th>
                <th>NO SP</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>

<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM po";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    $currentNopo = "";  // Untuk melacak nopo saat ini

    while ($row = mysqli_fetch_assoc($result)) {
        // Jika nopo berbeda dari nopo sebelumnya, buat baris baru
        if ($row["nopo"] != $currentNopo) {
            echo "<tr>
                    <td>" . $row["tglpo"] . "</td>
                    <td>" . $row["nopo"] . "</td>
                    <td>";

            // Query untuk mendapatkan nosp yang terkait dengan nopo saat ini
            $queryNosp = "SELECT GROUP_CONCAT(nosp SEPARATOR ', ') AS countnosp FROM po WHERE nopo = '" . $row["nopo"] . "'";
            $resultNosp = mysqli_query($koneksi, $queryNosp);
            
            // Pastikan untuk memeriksa keberhasilan eksekusi query
            if (!$resultNosp) {
                die("Query gagal: " . mysqli_error($koneksi));
            }

            $dataNosp = mysqli_fetch_assoc($resultNosp);

            // Tampilkan nosp yang dipisahkan oleh koma
            echo $dataNosp['countnosp'];

            echo "</td>
                    <td>
                        <a href='infopo.php?nopo=" . $row['nopo'] . "' class='btn btn-outline-success rounded-pill mb-3'>
                           <i class='zmdi zmdi-info'></i>
                        </a>
                    </td>
                  </tr>";

            // Perbarui nilai currentNopo
            $currentNopo = $row["nopo"];
        }
    }
} else {
    echo "<tr><td colspan='4'>Tidak ada data.</td></tr>";
}

mysqli_close($koneksi);
?>
        </tbody>
    </table>
</div>
</div>

      
    
    <!--start overlay-->
      <div class="overlay toggle-menu"></div>
    <!--end overlay-->

    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
  
  <!--Start footer-->
  <footer class="footer">
      <div class="container">
        <div class="text-center">

          Copyright © AC Digital 2024
        </div>
      </div>
    </footer>
  <!--End footer-->
  
  <!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
    <li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
     </div>
   </div>
  <!--end color switcher-->
   
  </div><!--End wrapper-->


  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  
  <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  
</body>
</html>