
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
ul {
  list-style: none;
}

.inline-list-item {
    display: inline; /* atau display: inline-block; */
}
 


 
</style>


</head>


<body class="bg-theme bg-theme2">
 
 <div id="wrapper">
 
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

      


<li class="inline-list-item">
  <a href="#" id="marketingMenu">
    <i class="zmdi zmdi-balance-wallet"></i> <span>Marketing</span>
    <ul class="" id="submenumarketing" style="display: none;">
      <li><a href="oc.php">OC</a></li>
      <li><a href="spk.php">SPK</a></li>
    </ul>
  </a>
</li>



<li class="inline-list-item">
    <a href="#" id="warehouseMenu">
        <i class="zmdi zmdi-store"></i> <span>Warehouse</span>
    <ul class="" id="submenuwarehouse" style="display:none;">
        <li ><a href="master.php"> MASTER BARANG</a></li>
        <li><a href="buatmaster.php">BUAT MASTER </li>
        <li><a href="sp.php"> SP</a></li>
        <li><a href="in.php"> IN</a></li>
        <li><a href="stockimport.php"> STOCK SUMMARY & IMPORT</a></li>
        <li><a href="out.php"> OUT</a></li>
        <li><a href="trackbarang.php"> RIWAYAT BARANG</a></li>
    </ul>

</li>

<li class="inline-list-item">
  <a href="#" id="purchasingMenu">
    <i class="zmdi zmdi-balance-wallet"></i> <span>Purchasing</span>
    <ul class="" id="submenupurchasing" style="display: none;">
      <li><a href="requestsp.php">REQUEST SP</a></li>
      <li><a href="po.php">PO</a></li>
      <li><a href="tt.php">TT</a></li>
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



  <div class="content-wrapper">
      <div class="container-fluid"> 
  <div class="row">
  
   <div class="col-12 col-lg-12">
      <div class="card">
      <div class="card-body">
        <form id="tambahDataForm" action="simpanmaster.php" method="POST">

<h5 style="text-align: center;">TAMBAH MASTER</h5>
<br>
                <table class="table" id="barangTable">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Nama Barang</th>

                <th>Class</th>
                <th>LOCAL/IMPORT</th>
                <th>Satuan </th>
                <th>Minim Stock</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="text" readonly class="form-control" name="kodebarang[]" value="<?php echo $kodebarang ?>" required="required"></td>
                <td><input type="text" class="form-control" name="namabarang[]" autocomplete="off"></td>
               
                <td>
                  <select class="form-control" name="class[]" required>
                    <option value="">Pilih</option>
                    <option value="Baut">Baut</option>
                    <option value="Cat">Cat</option>
                    <option value="Compressor">Compressor</option>
                    <option value="Gearbox">Gearbox</option>
                    <option value="Motor">Motor</option>
                    <option value="Pump">Pump</option>
                    <option value="Plat">Plat</option>
                  </select>
                </td>
                <td>
                  <select class="form-control" name="tipe[]" required>
                    <option value="">Pilih</option>
                    <option value="Local">Local</option>
                    <option value="Import">Import</option>
                  </select>
                </td>
                <td>
                  <select class="form-control" name="satuan[]" required>
                    <option value="">Pilih</option>
                    <option value="PCS">PCS</option>
                    <option value="UNIT">UNIT</option>
                    <option value="LEMBAR">LEMBAR</option>
                    <option value="LITER">LITER</option>
                  </select>
                </td>

                 <td><input type="text" class="form-control" name="minimumstock[]"  autocomplete="off"></td>
                    <!-- Input untuk stock (jika ada) -->
                <td><button type="button" onclick="deleteRow(this)">HAPUS</button></td>
              </tr>
            </tbody>
          </table>
         <button style="margin-left: 35px;" type="button" onclick="addRow()">TAMBAH</button>

                <div class="modal-footer " >
                  <div style="text-align: center;">
                  <button type="submit" class="btn btn-success">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    
      <div class="overlay toggle-menu"></div>
 
    </div>
   
    </div>
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
  
  <footer class="footer">
      <div class="container">
        <div class="text-center">

          Copyright © AC Digital 2024
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
   
  </div>

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
  // Initialize the currentKodebarang variable
  var currentKodebarang = <?php echo $kodebarang; ?>;

  function addRow() {
    var table = document.getElementById("barangTable").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.rows.length);
    var cols = 6; // Number of columns

    // Increment and set the kodebarang value
    currentKodebarang++;

   
for (var i = 0; i < cols; i++) {
    var cell = newRow.insertCell(i);

    if (i === 0) {
        cell.innerHTML = '<input type="text" readonly class="form-control" name="kodebarang[]" value="' + currentKodebarang + '" required="required">';
    } else if (i === 2) {
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
    } else if (i === 3) {
        cell.innerHTML = '<select class="form-control" name="tipe[]" required>' +
            '<option value="">Pilih</option>' +
            '<option value="Local">Local</option>' +
            '<option value="Import">Import</option>' +
            '</select>';
    } else if (i === 4) {
        cell.innerHTML = '<select class="form-control" name="satuan[]" required>' +
            '<option value="">Pilih</option>' +
            '<option value="PCS">PCS</option>' +
            '<option value="UNIT">UNIT</option>' +
            '<option value="LEMBAR">LEMBAR</option>' +
            '<option value="LITER">LITER</option>' +
            '</select>';
    } else if (i === 5) { // Add input for minimumstock at index 5
        cell.innerHTML = '<input type="text" class="form-control" name="minimumstock[]" autocomplete="off">';
    } else {
        cell.innerHTML = '<input type="text" class="form-control" name="namabarang[]" autocomplete="off">';
    }
}


    var deleteButtonCell = newRow.insertCell(cols);
    var deleteButton = document.createElement("button");
    deleteButton.innerHTML = "HAPUS";
    deleteButton.setAttribute("type", "button");
    deleteButton.setAttribute("onclick", "deleteRow(this)");
    deleteButtonCell.appendChild(deleteButton);
  }

  function deleteRow(button) {
    var row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
  }


  function togglePurchasingMenu() {
  var submenu = document.getElementById("submenupurchasing");
  if (submenu.style.display === "block") {
    submenu.style.display = "none";
  } else {
    submenu.style.display = "block";
  }
}

  $(document).ready(function(){
  $("#purchasingMenu").click(function(){
    $("#submenupurchasing").toggle();
  });
});





 function toggleWarehouseMenu() {
  var submenu = document.getElementById("submenuwarehouse");
  if (submenu.style.display === "block") {
    submenu.style.display = "none";
  } else {
    submenu.style.display = "block";
  }
}

  $(document).ready(function(){
  $("#warehouseMenu").click(function(){
    $("#submenuwarehouse").toggle();
  });
});


function toggleMarketingMenu() {
  var submenu = document.getElementById("submenumarketing");
  if (submenu.style.display === "block") {
    submenu.style.display = "none";
  } else {
    submenu.style.display = "block";
  }
}

  $(document).ready(function(){
  $("#marketingMenu").click(function(){
    $("#submenumarketing").toggle();
  });
});


</script>



  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>

    

</body>
</html>