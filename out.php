
<!DOCTYPE html>
<html lang="en">
<head>
<?php 
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

$query_no = mysqli_query($koneksi, "SELECT max(no) as noTerbesar FROM barangout");
$data_no = mysqli_fetch_array($query_no);
$noTerbesar = $data_no['noTerbesar'];
$urutan_no = (int) $noTerbesar + 1;
$no = $urutan_no;

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
  <a href="">
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
        <td>
              <h5 class="card-title text-center mb-3">OUT</h5>
  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#tambahBarangKeluarForm">
    <i class="fa fa-plus"></i> Tambah OUT  </button>
    <br>
  </td>
<br>
<!-- Di dalam bagian <body> -->
<div class="modal fade" id="tambahBarangKeluarForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-theme7 text-black">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Barang Keluar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form id="tambahBarangKeluarForm" action="simpanout.php" method="POST">
    <div class="row">
        <div class="col-sm-4">
            <label for="tgl_out">TGL</label>
            <div class="form-group">
                <input readonly style="border: none;" type="date" class="form-control" id="tgl_out" name="tgl_out" required="required">
                <script>
                    var inputTanggal = document.getElementById("tgl_out");
                    var tanggalHariIni = new Date().toISOString().split("T")[0];
                    inputTanggal.value = tanggalHariIni;
                </script>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="no">No</label>
                <input type="text" readonly class="form-control" id="no" name="no" value="<?php echo $no ?>" required="required">
            </div>
        </div>
       <div class="col-sm-4">
    <div class="form-group">
        <label for="namabarang">Nama Barang</label>
        <input list="namabaranglist" id="namabarang" class="form-control" name="namabarang" required autocomplete="off">
        <datalist id="namabaranglist">
            <?php
                $koneksi = mysqli_connect('localhost', 'root', '', 'wgs');
$query = "SELECT DISTINCT namabarang, stock_in, satuan FROM barangin WHERE stock_in > 0";
$result = mysqli_query($koneksi, $query);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row['namabarang'] . "' data-stock_in='" . $row['stock_in'] . "' data-satuan='" . $row['satuan'] . "'>";
}

            ?>
        </datalist>
    </div>
</div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="stock_in">Stockin</label>
                 <input type="text" class="form-control" required readonly id="stock_in" name="stock_in" autocomplete="off">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" required readonly id="satuan" name="satuan" autocomplete="off">
            </div>
        </div>     
    
    <div class="col-sm-4">
            <div class="form-group">
                <label for="stock_out">Jumlah</label>
                <input type="text" class="form-control"  value="" required id="stock_out" name="stock_out" autocomplete="off">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="nospk">No SPK</label>
                <input type="text" class="form-control" id="nospk" name="nospk" autocomplete="off">
            </div>
        </div>
    <div class="col-sm-4">
    <div class="form-group">
        <label for="serialnumber">Serial Number</label>
        <select class="form-control" id="serialnumber" name="serialnumber" autocomplete="off">
            <option value="" selected disabled>Pilih Serial Number</option>
            <!-- Opsi serial number akan dimuat melalui JavaScript -->
        </select>
    </div>
</div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="kodeproduksi">Kode Produksi</label>
                <input type="text" class="form-control" required id="kodeproduksi" name="kodeproduksi" autocomplete="off">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="remarks">Catatan</label>
                <input type="text"  class="form-control" id="remarks" name="remarks" autocomplete="off">
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
        if (options[i].value === inputVal && options[i].getAttribute('data-stock_in') > 0) {
            selectedOption = options[i];
            break;
        }
    }

    if (selectedOption) {
        var stock_inValue = selectedOption.getAttribute('data-stock_in');
        var satuanValue = selectedOption.getAttribute('data-satuan');

        document.getElementById('stock_in').value = stock_inValue;
        document.getElementById('satuan').value = satuanValue;
    } else {
        document.getElementById('stock_in').value = '';
        document.getElementById('satuan').value = '';
    }
});

document.addEventListener('DOMContentLoaded', function() {
    var tambahInButton = document.querySelector('.btn-success.btn-sm');
    tambahInButton.addEventListener('click', function() {
        $('#tambahBarangMasukModal').modal('show');
    });
});

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
        var stock_inValue = selectedOption.getAttribute('data-stock_in');
        var satuanValue = selectedOption.getAttribute('data-satuan');
        var serialnumberValue = selectedOption.getAttribute('data-serialnumber');

        document.getElementById('stock_in').value = stock_inValue;
        document.getElementById('satuan').value = satuanValue;
        document.getElementById('serialnumber').value = serialnumberValue;
    } else {
        document.getElementById('stock_in').value = '';
        document.getElementById('satuan').value = '';
        document.getElementById('serialnumber').value = '';
    }
});
document.getElementById('namabarang').addEventListener('change', function() {
    var selectedNamabarang = this.value;
    var serialnumberSelect = document.getElementById('serialnumber');
    serialnumberSelect.innerHTML = ''; // Hapus opsi yang ada

    // Muat opsi serial number dari database berdasarkan pilihan nama barang
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                var data = JSON.parse(xhr.responseText);
                data.forEach(function(serialnumber) {
                    var option = document.createElement('option');
                    option.value = serialnumber;
                    option.textContent = serialnumber;
                    serialnumberSelect.appendChild(option);
                });
            } else {
                console.error('Gagal memuat data serial number: ' + xhr.status);
            }
        }
    };

    xhr.open('GET', 'load_serialnumbers.php?namabarang=' + selectedNamabarang, true);
    xhr.send();
});


</script>




        <div class="table-responsive">
               <table class="table">
                 
<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM barangout";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table-responsive>
            <tr>
            <th>No</th>
                <th>Tgl</th>
                   <th>Nama Barang</th>
                         <th>StockOut</th>
                            <th>Satuan</th>
                            <th>Serial Number</th>
                            <th>Kode Produksi</th>

                <th>No SPK</th>

                               <th>Remarks</th>
                                  
            </tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>

                <td>" . $row["no"] . "</td>
                <td>" . $row["tgl_out"] . "</td>
                <td>" . $row["namabarang"] . "</td>
                <td>" . $row["stock_out"] . "</td>
                <td>" . $row["satuan"] . "</td>
                <td>" . $row["serialnumber"] . "</td>
                <td>" . $row["kodeproduksi"] . "</td>
                <td>" . $row["nospk"] . "</td>
                <td>" . $row["remarks"] . "</td>
                
         
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