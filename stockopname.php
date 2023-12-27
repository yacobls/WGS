<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>WGS</title>
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script>
  <!--favicon--><!-- 
  <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
 -->  <!-- Vector CSS -->
  <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
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

<body class="bg-theme bg-theme1">
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
  <a href="index">
            <i class="zmdi zmdi-face"></i> <span>Owner</span>
        </a>
        <ul class="submenu">
            <li><a href="daftarmaster.php">Daftar Master Barang</a></li>
            <li><a href="daftarquotes.php">Daftar Quotes</a></li>
             <li><a href="daftaroc.php">Daftar Oc</a></li>
             <li><a href="daftarspk.php">Daftar Spk</a></li>
            
        </ul>
    </li>


      

       <li>
  <a href="#">
            <i class="zmdi zmdi-chart"></i> <span>Marketing</span>
        </a>
        <ul class="submenu">
            <li><a href="daftarmaster.php">Quotes Unit</a></li>
            <li><a href="daftarquotes.php">Daftar Quotes</a></li>
             <li><a href="daftaroc.php">Daftar Oc</a></li>
             <li><a href="daftarspk.php">Daftar Spk</a></li>

             <li><a href="daftarspk.php">Tambah Customer</a></li>

             <li><a href="daftarspk.php">Daftar Customer</a></li>
            
        </ul>
    </li>





       <li>
  <a href="#">
            <i class="zmdi zmdi-store"></i> <span>Gudang</span>
        </a>
        <ul class="submenu">
            <li><a href="tambahmaster.php">Tambah Master</a></li>
            <li><a href="daftarquotes.php">Stock Local & Import</a></li>
             <li><a href="daftaroc.php">SP Service Center</a></li>
             <li><a href="daftarspk.php">Daftar Sp</a></li>
            
        </ul>
    </li>

        </a>
      </li>




       <li>
  <a href="#">
            <i class="zmdi zmdi-balance-wallet"></i> <span>Purchasing Local</span>
        </a>
        <ul class="submenu">
            <li><a href="daftarmaster.php">Buat PO</a></li>

            
        </ul>
    </li>

        </a>
      </li>



       <li>
  <a href="#">
            <i class="zmdi zmdi-balance-wallet"></i> <span>Purchasing Import</span>
        </a>
        <ul class="submenu">
            <li><a href="daftarmaster.php">Buat PO</a></li>

            
        </ul>
    </li>

        </a>
      </li>




       <li>
  <a href="#">
            <i class="zmdi zmdi-truck"></i> <span>Produksi</span>
        </a>
        <ul class="submenu">
            <li><a href="daftarmaster.php">Buat Mixer</a></li>

            
        </ul>
    </li>

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
                        <div class="card-title">Stock Opname</div>
                        <hr>
                        <form id="customerForm" method="post" action="simpanmasterbarang.php">



                            <div class="customer-row">


                <input hidden type="date" id="tgl" name="tgl" required="required" class="tgl">
                <script>
                    var inputTanggal = document.getElementById("tgl");
                    var tanggalHariIni = new Date().toISOString().split("T")[0];
                    inputTanggal.value = tanggalHariIni;
                </script> 


                                <div class="form-group">
                                    <label for="input-8">Nama Barang</label>
                                    <select class="form-control form-control-rounded alamat-input" name="namabarang[]" required >
                                        <option value="" disabled selected>Pilih</option>
                                        <?php
                                        $conn = new mysqli('localhost', 'root', '', 'wgs');
                                        if ($conn->connect_error) {
                                            die("Connection failed: " . $conn->connect_error);
                                        }
                                        $query = "SELECT * FROM masterbarang";
                                        $result = $conn->query($query);
                                        if ($result) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<option value='" . $row['namabarang'] . "'>" . $row['namabarang'] . "</option>";
                                            }
                                            $result->free_result();
                                        } else {
                                            echo "Error: " . $query . "<br>" . $conn->error;
                                        }
                                        $conn->close();
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="input-12"> Remarks</label>
                                    <input type="textarea" class="form-control form-control-rounded alamat-input" required min="1" name="remarks" placeholder="">
                                </div>
                            </div>
                            <hr>
                            <button type="button" class="btn btn-info btn-round px-5" onclick="tambahRowmaster()">Tambah Master</button>
                            <!-- Tombol Submit untuk mengirim data form -->
                            <button type="submit" class="btn btn-success btn-round px-5" >Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  
<script>
function tambahRowmaster() {
    // Create a new div element
    var div = document.createElement('div');

    // Get the HTML content of the customer-row
    var customerRowHTML = document.querySelector('.customer-row').innerHTML;

    // Add HTML content for the new row
    div.innerHTML = customerRowHTML;

    // Get the form element
    var form = document.getElementById('customerForm');

    // Insert the new row before the button (Tambah Master)
    form.insertBefore(div, form.lastElementChild.previousElementSibling);

    // Insert the line before the button (Tambah Master)
    var line = document.createElement('hr');
    form.insertBefore(line, form.lastElementChild.previousElementSibling);

    // Clear the values in the newly added row
    div.querySelectorAll('input, select').forEach(input => input.value = '');
}

</script>


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