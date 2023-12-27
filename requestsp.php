
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

// Ambil nosp terbesar dari tabel request
$query_nosp = mysqli_query($koneksi, "SELECT max(nosp) as nospTerbesar FROM sp");
$data_nosp = mysqli_fetch_array($query_nosp);
$nospTerbesar = $data_nosp['nospTerbesar'];
$urutan_nosp = (int) $nospTerbesar + 1;
$nosp = $urutan_nosp;

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-xrRJGuxb1s7Xu7uOv5ir5dGqPK9F/TvxZf6D8hRSJo9l3cdFccZ4fu1deF5gddwn" crossorigin="anonymous">
  <!-- Other styles or scripts as needed -->
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



    <!-- Tambahkan lebih banyak sub-menu sesuai kebutuhan -->
  </ul>
</li>


<li>
  <a href="#" id="purchasingMenu">
    <i class="zmdi zmdi-balance-wallet"></i> <span>Purchasing</span>
    <ul class="" id="submenu" style="display: none;">
      <li><a href="requestsp.php">REQUEST SP</a></li>
      <li><a href="po.php">PO</a></li>
      <li><a href="tt.php">TT</a></li>
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
              <h5 class="card-title text-center mb-3">Permintaan Barang</h5>  
        <div class="table-responsive">
               <table class="table">
<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM sp WHERE status='APPROVED'";
$result = mysqli_query($koneksi, $query);
if (mysqli_num_rows($result) > 0) {
    echo "<table class='table'>
            <tr>
                <th>Action</th>
                <th>Tgl</th>
                <th>No SP</th>
                <th>Divisi</th>
                <th>Nama Barang</th>
                <th>Qty</th>
            </tr>";

    $rowNumber = 1; // Variable to track row number

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td><input type='checkbox' class='selectCheckbox' 
                      data-rownumber='{$rowNumber}' 
                      data-tglsp='{$row['tglsp']}' 
                      data-nosp='{$row['nosp']}' 
                      data-divisi='{$row['divisi']}' 
                      data-namabarang='{$row['namabarang']}' 
                      data-qty='{$row['qty']}'></td>
                <td>{$row['tglsp']}</td>
                <td>{$row['nosp']}</td>
                <td>{$row['divisi']}</td>
                <td>{$row['namabarang']}</td>
                <td>{$row['qty']}</td>
              </tr>";

        $rowNumber++;
    }
    echo "</table>";

    // Add the "Buat PO" button below the table
    echo "<button id='buatPOButton' onclick='buatPO()'>Buat PO</button>";
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
   <script>
    
  function togglePurchasingMenu() {
  var submenu = document.getElementById("submenu");
  if (submenu.style.display === "block") {
    submenu.style.display = "none";
  } else {
    submenu.style.display = "block";
  }
}


  $(document).ready(function(){
  $("#purchasingMenu").click(function(){
    $("#submenu").toggle();
  });
});

  </script>

<script>
  function buatPO() {
    const selectedItems = Array.from(document.querySelectorAll('.selectCheckbox:checked')).map(checkbox => {
      return {
        tglsp: checkbox.dataset.tglsp,
        nosp: checkbox.dataset.nosp,
        divisi: checkbox.dataset.divisi,
        namabarang: checkbox.dataset.namabarang,
        qty: parseInt(checkbox.dataset.qty)
      };
    });

    // Save selected items to local storage
    localStorage.setItem('selectedItems', JSON.stringify(selectedItems));

    // Redirect to checkout.php
    window.location.href = 'checkout.php';
  }
</script>


</body>
</html>