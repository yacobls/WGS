
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
              <h5 class="card-title text-center mb-3">SP</h5>


  <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahspModal">
    <i class="fa fa-plus"></i> Tambah SP
  </button>


<div class="modal fade bg-theme" id="tambahspModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content bg-theme7">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Buat SP</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="tambahspForm" action="simpansp.php" method="POST">
                    <div class="row">
                      <div class="col-sm-6">
                        <label for="tgl">TGL</label>
                        <div class="form-group">
                          <input readonly style="border:  none;" type="date" class="form-control" id="tgl" name="tgl" required="required">
                          <script>
                            var inputTanggal = document.getElementById("tgl");
                            var tanggalHariIni = new Date().toISOString().split("T")[0];
                            inputTanggal.value = tanggalHariIni;
                          </script>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="nosp">No. SP</label>
                          <input type="text" readonly class="form-control" id="nosp" name="nosp" value="<?php echo $nosp ?>" required="required">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="namabarang">Nama Barang</label>
                          <input list="namabaranglist" placeholder="Nama Barang" id="namabarang" class="form-control" name="namabarang" required autocomplete="off">
                          <datalist id="namabaranglist">
                            <?php
                              $koneksi = mysqli_connect('localhost', 'root', '', 'wgs');
                              $query = "SELECT DISTINCT namabarang, stock, satuan FROM stockbarangglobal";
                              $result = mysqli_query($koneksi, $query);
                              while($row = mysqli_fetch_assoc($result)){
                                echo "<option value='".$row['namabarang']."' data-stock='".$row['stock']."' data-satuan='".$row['satuan']."'>";
                              }
                            ?>
                          </datalist>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="qty">Qty</label>
                          <input type="text" class="form-control" id="qty" name="qty"  autocomplete="off">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="satuan">Satuan</label>
                          <input type="text" class="form-control" required readonly id="satuan" name="satuan" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="divisi">Divisi</label>
                          <select class="form-control" id="divisi" name="divisi" required >
                            <option value="">Pilih</option>
                            <option value="Produksi">Produksi</option>
                            <option value="Gudang">Gudang</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="stock">Stock</label>
                          <input type="text" class="form-control" id="stock" required readonly name="stock" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="remarks">Catatan</label>
                          <input type="text" required class="form-control" id="remarks" name="remarks" autocomplete="off">
                        </div>
                      </div>
                    </div>
                         <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="status">Status</label>
                          <input type="text" class="form-control" value="Menunggu" id="status" required readonly name="status" autocomplete="off">
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
<style>
  .bg-theme7 {
    background-color: seagreen;
    color: black;
  }

  .bg-theme7 input {
    background-color: ;
    color: black;
  }
</style>
<script>
      document.getElementById('namabarang').addEventListener('input', function() {
                        var inputVal = this.value;
                        var options = document.getElementById('namabaranglist').getElementsByTagName('option');
                        var selectedOption = null;

                        for (var i = 0; i < options.length; i++) {
                          if (options[i].value === inputVal) {
                            selectedOption = options[i];
                            break;
                          }
                        }

                        if (selectedOption) {
                          var stockValue = selectedOption.getAttribute('data-stock');
                          var satuanValue = selectedOption.getAttribute('data-satuan');

                          document.getElementById('stock').value = stockValue;
                          document.getElementById('satuan').value = satuanValue;
                        } else {
                          document.getElementById('stock').value = '';
                          document.getElementById('satuan').value = '';
                        }
                      });


</script>



        <div class="table-responsive">
               <table class="table">
                 
<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM sp";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table-responsive>
            <tr>
                <th>Tgl</th>
                <th>No SPK</th>
                <th>No SP</th>
                <th>Divisi</th>
                   <th>Nama Barang</th>
                      <th>Stock</th>
                         <th>Qty</th>
                            <th>Satuan</th>
                               <th>Remarks</th>
                                  <th>RND APPRVL</th>
                                     <th>Nama Suplier</th>
                                        <th>NO PO</th>
                                           <th>No Surat Jalan</th>
                                              <th>Tgl Surat Jalan</th>
                                                 <th>Status</th>
            </tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>

                <td>" . $row["tgl"] . "</td>
                <td>" . $row["nospk"] . "</td>
                <td>" . $row["nosp"] . "</td>
                <td>" . $row["divisi"] . "</td>
                <td>" . $row["namabarang"] . "</td>
                <td>" . $row["stock"] . "</td>
                <td>" . $row["qty"] . "</td>
                <td>" . $row["satuan"] . "</td>
                <td>" . $row["remarks"] . "</td>
                <td>" . $row["rndapprvl"] . "</td>
                <td>" . $row["namasuplier"] . "</td>
                <td>" . $row["nopo"] . "</td>
                <td>" . $row["nosuratjalan"] . "</td>
                <td>" . $row["tglsj"] . "</td>
                <td>" . $row["status"] . "</td>
         
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