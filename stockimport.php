
<!DOCTYPE html>
<html lang="en">
<head>
  


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
    <h5 class="card-title text-center mb-3">STOCK IMPORT ITEMS</h5>
    <br>
    <div class="table-responsive">
        <table class="table">
         <?php
$koneksi = new mysqli("localhost", "root", "", "wgs");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$query = "SELECT * FROM stockbarangglobal WHERE tipe='Import'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<tr>
            <th>Kode Barang</th>
            <th>Class</th>
            <th>Nama Barang</th>                    
            <th>Stock <br>In/Out</th>
            <th>Stock <br>(Serial Count)</th>
            <th>Minimum Stock</th>
        </tr>";

    while($row = mysqli_fetch_assoc($result)) {
        $namabarang = $row["namabarang"];
        
        $query_stock_in = "SELECT SUM(stock_in) AS total_stock_in FROM barangin WHERE namabarang='$namabarang'";
        $result_stock_in = mysqli_query($koneksi, $query_stock_in);
        $data_stock_in = mysqli_fetch_assoc($result_stock_in);
        $total_stock_in = $data_stock_in["total_stock_in"];
        
        $query_stock_out = "SELECT SUM(stock_out) AS total_stock_out FROM barangout WHERE namabarang='$namabarang'";
        $result_stock_out = mysqli_query($koneksi, $query_stock_out);
        $data_stock_out = mysqli_fetch_assoc($result_stock_out);
        $total_stock_out = $data_stock_out["total_stock_out"];

        $query_serial_count = "SELECT COUNT(*) AS serial_count 
                                FROM barangin 
                                WHERE namabarang='$namabarang' 
                                AND (kodeproduksi IS NULL OR kodeproduksi = '')";
        $result_serial_count = mysqli_query($koneksi, $query_serial_count);
        $data_serial_count = mysqli_fetch_assoc($result_serial_count);
        $serial_count = $data_serial_count["serial_count"];
        
        $query_serial_without_production_code = "SELECT serialnumber 
                                                FROM barangin
                                                WHERE namabarang='$namabarang' 
                                                AND (kodeproduksi IS NULL OR kodeproduksi = '')";

        $result_serial_without_production_code = mysqli_query($koneksi, $query_serial_without_production_code);

        $serial_without_production_code = array();
        while($serial_row = mysqli_fetch_assoc($result_serial_without_production_code)) {
            $serial_without_production_code[] = $serial_row['serialnumber'];
        }

        $serial_without_production_code_list = implode(', ', $serial_without_production_code);

        echo "<tr>
                <td>" . $row["kodebarang"] . "</td>
                <td>" . $row["class"] . "</td>
                <td>" . $row["namabarang"] . "</td>
                <td>" . $total_stock_in . " / " . $total_stock_out . "</td>
                <td>" . $serial_without_production_code_list . "</td>
                <td>" . $row["minimumstock"] . "</td>
            </tr>";

        $update_query = "UPDATE stockbarangglobal 
                        SET stock_in='$total_stock_in', stock_out='$total_stock_out', serialcount='$serial_count' 
                        WHERE namabarang='$namabarang'";
        mysqli_query($koneksi, $update_query);
        
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








<div class="clearfix"></div>
  <div class="row">
   <div class="col-12 col-lg-12">
     <div class="card">
      <div class="card-body">
              <h5 class="card-title text-center mb-3">STOCK SUMMARY</h5>


<br>

  <div class="table-responsive">
    <table class="table">
      <?php
$koneksi = new mysqli("localhost", "root", "", "wgs");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$query_barangin = "SELECT * FROM barangin";
$result_barangin = mysqli_query($koneksi, $query_barangin);

if (mysqli_num_rows($result_barangin) > 0) {
    echo "<table class='table'>
            <tr>
                <th>Kode Produksi</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Serial Number</th>
                <th>Class</th>
            </tr>";

    while($row_barangin = mysqli_fetch_assoc($result_barangin)) {
        $namabarang = $row_barangin["namabarang"];

        // Ambil kodebarang dari masterbarang berdasarkan namabarang
        $query_masterbarang = "SELECT kodebarang FROM masterbarang WHERE namabarang = '$namabarang'";
        $result_masterbarang = mysqli_query($koneksi, $query_masterbarang);

        if (mysqli_num_rows($result_masterbarang) > 0) {
            $row_masterbarang = mysqli_fetch_assoc($result_masterbarang);
            $kodebarang = $row_masterbarang["kodebarang"];

            // Perbarui kodebarang di tabel barangin
            $kodeproduksi = $row_barangin["kodeproduksi"];
            $update_kodebarang_query = "UPDATE barangin SET kodebarang = '$kodebarang' WHERE kodeproduksi = '$kodeproduksi'";
            mysqli_query($koneksi, $update_kodebarang_query);

            // Output data ke dalam tabel
            echo "<tr>
                    <td>" . $kodeproduksi . "</td>
                    <td>" . $kodebarang . "</td>
                    <td>" . $row_barangin["namabarang"] . "</td>            
                    <td>" . $row_barangin["serialnumber"] . "</td>
                    <td>" . $row_barangin["class"] . "</td>
                </tr>";
        }
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