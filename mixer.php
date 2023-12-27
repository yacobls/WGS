
<!DOCTYPE html>
<html lang="en">
<head>


<?php
// Koneksi ke database (sesuaikan dengan informasi koneksi Anda)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wgs";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mendapatkan nilai nourut terbesar
$query_nourut = "SELECT MAX(CAST(SUBSTRING_INDEX(kodeproduksi, '/', -1) AS SIGNED)) AS max_nourut FROM mixer";
$result_nourut = $conn->query($query_nourut);

if ($result_nourut) {
    $row = $result_nourut->fetch_assoc();
    $max_nourut = $row['max_nourut'];
    $nourut = $max_nourut + 1;
} else {
    die("Query gagal: " . $conn->error);
}

// Tutup koneksi
$conn->close();

// Mendapatkan tahun saat ini
$tahunSaatIni = date("Y");
// Membuat kode produksi
$kodeproduksi = "WMX-800/{$tahunSaatIni}/" . sprintf('%04d', $nourut);



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
    <a href="#">
        <i class="zmdi zmdi-store"></i> <span>Warehouse</span>
        
    </a>
    <ul class="">
        <li ><a href="master.php"> MASTER BARANG</a></li>
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

           <ul class="">
        <li ><a href="bplant.php"> B.PLANT</a></li>
        <li><a href="hiblow.php"> HIBLOW</a></li>
        <li><a href="mixer.php"> MIXER</a></li>
        
    </ul>
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
              <h5 class="card-title text-center mb-3">MIXER</h5>

<td>
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDataProduksi">
    <i class="fa fa-plus"></i> Tambah Produksi Mixer
  </button>
</td>
<br>

<div class="modal fade" id="tambahDataProduksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-theme1 text-black">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Produksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="tambahDataProduksiForm" action="simpanmixer.php" method="POST">

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="kodeproduksi">Kode Produksi</label>
      <input type="text" readonly class="form-control" id="kodeproduksi" name="kodeproduksi" value="<?php echo $kodeproduksi; ?>" required="required">
    </div>
  </div>


    <div class="form-group">
      <label for="tipe">Tipe</label>
      <select class="form-control" id="tipe" name="tipe" required>
        <option value="">Pilih</option>
        <option value="B.Plant">B.Plant</option>
        <option value="Hiblow">Hiblow</option>
        <option value="Mixer">Mixer</option>
      </select>
    </div>

  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label for="nounit">No Unit</label>
      <input type="text" readonly class="form-control" id="nounit" name="nounit" value="" required="required">
    </div>
  </div>
</div>


   
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
    </div>
</form>
</div>
</div>
  
 <style>
  .bg-theme1 {
    background-color:royalblue; /* Ganti dengan warna latar belakang yang Anda inginkan */
    color: black; /* Ganti dengan warna teks yang kontras dengan latar belakang Anda */
    /* Tambahkan gaya tambahan sesuai kebutuhan */
  }
  
  .bg-theme1 input {
    background-color: black ; /* Atur warna latar belakang input menjadi putih */
    color: ; /* Atur warna teks input agar kontras dengan latar belakang putih */
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

        $query = "SELECT * FROM produksi";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<table-responsive>
                    <tr>
                        <th>No Unit</th>
                        <th>Kode Produksi</th>
                        <th>Tipe</th>
                        <th>Update</th>

                    </tr>";
      
      while($row = mysqli_fetch_assoc($result)) {
   
    echo "<tr>
            <td>" . $row["nounit"] . "</td>
            <td>" . $row["kodeproduksi"] . "</td>

            <td>" . $row["tipeproduksi"] . "</td> 
               
   <td>
  <a href='updateproduksi.php?kodeproduksi=" . $row['kodeproduksi'] . "' class='btn btn-outline-success rounded-pill mb-3'>
 <i class='zmdi zmdi-edit'></i>
  </a>
</td>
     
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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