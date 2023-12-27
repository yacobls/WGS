
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');
$query = mysqli_query($koneksi, "SELECT max(kodebarang) as kodeTerbesar FROM masterbarang");
$data = mysqli_fetch_array($query);
$kodeTerbesar = $data['kodeTerbesar'];
$urutan = (int) $kodeTerbesar + 1;
$kodebarang = $urutan; 


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


<style>
  body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}

.module-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.module-content {
  background-color: rgba(0, 0, 0, 0.5);
  pointer-events: auto;
  z-index: 9999; /* Atur nilai z-index yang cukup tinggi */
}


.bg-theme1 {
  background-color: #f5f5dc; /* Ganti dengan warna cream yang Anda inginkan */
}

.bg-theme1 input,
.bg-theme1 select {
  background-color: white; /* Atur warna latar belakang input dan select menjadi putih */
  color: #333; /* Atur warna teks agar kontras dengan latar belakang putih */
}

.bg-theme1 .modal-footer button {
  color: white; /* Atur warna teks tombol di bagian footer modal */
}

</style>  
</head>


<body class="bg-theme bg-theme2">
 
<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="index.php">
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
    <a href="#">
        <i class="zmdi zmdi-store"></i> <span>Warehouse</span>
        
    </a>
    <ul class="">
        <li ><a href="master.php"> MASTER BARANG</a></li>
        <li><a href="buatmaster.php">BUAT MASTER </li>
        <li><a href="sp.php"> SP</a></li>
        <li><a href="in.php"> IN</a></li>
        <li><a href="stockimport.php"> STOCK SUMMARY & IMPORT</a></li>
        <li><a href="out.php"> OUT</a></li>
        <li><a href="trackbarang.php"> RIWAYAT BARANG</a></li>
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
        <a href="produksi.php">
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
      var cells = row.querySelectorAll('td');
      var match = false;
      cells.forEach(function(cell) {
        if (cell.textContent.toLowerCase().includes(keywords)) {
          match = true;
        }
      });

      if (match) {
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
              <h5 class="card-title text-center mb-3">Master Barang</h5>

<td><style>
  .white-icon {
    color: white;
  }
</style>

<br>

    <div class="table-responsive">
    <table class="table">
        <?php
        $koneksi = new mysqli("localhost", "root", "", "wgs");

        // Periksa apakah koneksi berhasil atau tidak
        if ($koneksi->connect_error) {
            die("Koneksi gagal: " . $koneksi->connect_error);
        }

        $query = "SELECT * FROM masterbarang";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<table-responsive>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Stock</th>
                         <th>Stock Minimum</th>

                    </tr>";
      
      while($row = mysqli_fetch_assoc($result)) {
//     $namabarang = $row["namabarang"];
//     $query_stock_in = "SELECT SUM(stock_in) AS total_stock_in FROM barangin WHERE namabarang='$namabarang'";
//     $result_stock_in = mysqli_query($koneksi, $query_stock_in);
//     $data_stock_in = mysqli_fetch_assoc($result_stock_in);    
//     $stock_in = (int)$data_stock_in["total_stock_in"]; // Mengambil nilai total_stock_in dan mengonversi ke tipe integer
//     $stock_out = (int)$row["stock_out"]; // Mengambil nilai stock_out dan mengonversi ke tipe integer
//     $stock = $stock_in - $stock_out; // Menghitung nilai stock
//     // Tambahkan query untuk melakukan update ke tabel stockbarangglobal
//     $update_stock_query = "UPDATE stockbarangglobal 
//                            SET stock_in = '$stock_in', stock_out = '$stock_out', stock = '$stock' 
//                            WHERE namabarang='$namabarang'";
//     mysqli_query($koneksi, $update_stock_query);
// $stock_in = (int)$data_stock_in["total_stock_in"];
//     $stock_out = (int)$row["stock_out"];
//     $stock = $stock_in - $stock_out;
//     // Ambil nilai minimumstock dari hasil query
//     $minimumStock = (int)$row["minimumstock"];
//     // Menentukan status dan kelas CSS
//     $status = ($stock < $minimumStock) ? 'text-danger' : '';
//     // Output data ke dalam tabel
    echo "<tr>
            <td>" . $row["kodebarang"] . "</td>
            <td>" . $row["namabarang"] . "</td>
              <td>" . $row["stock"] . "</td>
                <td>" . $row["minimumstock"] . "</td>
          </tr>";
}

echo "</table>";

        } else {
            echo "Tidak ada data.";
        }

        mysqli_close($koneksi);
        ?>
    </table>
             </div>
           </div>
         </div>
       </div>

    <!--start overlay-->
      <div class="overlay toggle-menu"></div>
    <!--end overlay-->

    </div>
        </div>
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
  
  <!--Start footer-->
  <footer class="footer">
      <div class="container">
        <div class="text-center">

          Copyright © WGS 2024
        </div>
      </div>
    </footer>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  
  <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  <script>
    function addRow() {
  var table = document.getElementById("barangTable").getElementsByTagName('tbody')[0];
  var newRow = table.insertRow(table.rows.length);
  var cols = 7; // Number of columns

  for (var i = 0; i < cols; i++) {
    var cell = newRow.insertCell(i);
    if (i === 0) {
      cell.innerHTML = '<input type="text" readonly class="form-control" name="kodebarang[]" value="<?php echo $kodebarang ?>" required="required">';
    } else if (i === 3) {
      cell.innerHTML = '<select class="form-control" name="class[]" required>' +
        '<option value="">Pilih</option>' +
        '<option value="Baut">Baut</option>' +
        '<option value="Cat">Cat</option>' +
        '<option value="Compressor">Compressor</option>' +
        '<option value="Gearbox">Gearbox</option>' +
        '<option value="Motor">Motor</option>' +
        '<option value="Pump">Pump</option>' +
        '<option value="Plat">Plat</option>' +
        '</select>';
    } else if (i === 4) {
      cell.innerHTML = '<select class="form-control" name="tipe[]" required>' +
        '<option value="">Pilih</option>' +
        '<option value="Local">Local</option>' +
        '<option value="Import">Import</option>' +
        '</select>';
    } else if (i === 5) {
      cell.innerHTML = '<select class="form-control" name="satuan[]" required>' +
        '<option value="">Pilih</option>' +
        '<option value="PCS">PCS</option>' +
        '<option value="UNIT">UNIT</option>' +
        '<option value="LEMBAR">LEMBAR</option>' +
        '<option value="LITER">LITER</option>' +
        '</select>';
    } else {
      cell.innerHTML = '<input type="text" class="form-control" name="namabarang[]" autocomplete="off">';
    }
  }

  var deleteButtonCell = newRow.insertCell(cols);
  var deleteButton = document.createElement("button");
  deleteButton.innerHTML = "Delete";
  deleteButton.setAttribute("type", "button");
  deleteButton.setAttribute("onclick", "deleteRow(this)");
  deleteButtonCell.appendChild(deleteButton);
}

function deleteRow(button) {
  var row = button.parentNode.parentNode;
  row.parentNode.removeChild(row);
}

  </script>
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>

    

</body>
</html>