
<!DOCTYPE html>
<html lang="en">
<head>


  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>WGS</title>
  
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



  <?php
// Koneksi ke database
$servername = "localhost"; // Ganti dengan nama server Anda
$username = "root"; // Ganti dengan nama pengguna database Anda
$password = ""; // Ganti dengan kata sandi database Anda
$dbname = "wgs"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk menghitung jumlah master barang
$stmt = $conn->prepare("SELECT COUNT(namabarang) as jumlah_barang FROM masterbarang");
$stmt->execute();
$stmt->bind_result($jumlah_barang);
$stmt->fetch();
$stmt->close();

// Tutup koneksi
$conn->close();
?>

  
</head>
<body class="bg-theme bg-theme1">
    <!-- Start wrapper-->
    <div id="wrapper">

        <!-- Start sidebar-wrapper-->
        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            <div class="brand-logo">
                <a href="index">
                    <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                    <h5 class="logo-text">Wira Gulfindo Sarana</h5>
                </a>
            </div>






   <ul class="sidebar-menu do-nicescrol">

    
 
            
            <ul class="sidebar-menu do-nicescrol">
                <li class="sidebar-header">MAIN NAVIGATION</li>

                <li>

                    <a href="#" onclick="return false;">
                        <i class="zmdi zmdi-face text-white "></i> <span class="text-white"> SA </span>
                    </a>
                    <ul class="submenu">
                        <li class="text-white"><a href="daftarmaster">Daftar Master Barang</a></li>
                        <li><a href="daftarquotes">Daftar Quotes</a></li>
                        <li><a href="daftaroc">Daftar Oc</a></li>
                        <li><a href="daftarspk">Daftar Spk</a></li>
                    </ul>
                </li>





                <li>

                    <a href="#" onclick="return false;">

                        <i class="zmdi zmdi-chart text-white"></i> <span class="text-white">Marketing</span>
                    </a>
                    <ul class="submenu">
                          <li><a href="buatquotes">Quotes Unit</a></li>
                        <li><a href="daftarquotesmarketing">Daftar Quotes</a></li>
                        <li><a href="daftarocmarketing">Daftar Oc</a></li>
                        <li><a href="daftarspkmarketing" >Daftar Spk</a></li>
                        <li><a href="tambahcustomer">Tambah Customer</a></li>
                        <li> <a href="daftarcustomer"> Daftar Customer</a></li>
                    </ul>
                </li>























<li>
                    <a href="#" onclick="return false;">
                    
                        <i class="zmdi zmdi-store text-white"></i> <span class="text-white">Gudang</span>
        
                 </a>
                    <ul class="submenu">
                        <li><a href="tambahmaster">Tambah Master</a></li>

                         <li><a href="stockglobal">Stock Summary</a></li>
                         <li><a href="daftarin">Daftar IN</a></li>
                        <li><a href="in">Barang Masuk</a></li>
                        <li><a href="barangout">Barang Keluar</a></li>
                        <li><a href="stock">Stock Local & Import</a></li>
                        <li><a href="spurgent">SP Service Center</a></li>
                        <li><a href="daftarsp">Daftar Sp</a></li>
                    </ul>
                </li>


 <li>
                    <a href="#" onclick="return false;">
                      
                        <i class="zmdi zmdi-balance-wallet text-white"></i> <span class="text-white">Purchasing Local</span>
            </a>

                    <ul class="submenu">
                        <li><a href="daftarsplocal">Daftar SP Local</a></li>
                        <li><a href="buatpolocal">Buat PO Local</a></li>
                    </ul>
                </li>





                <li>
                    <a href="#" onclick="return false;">
                      
                        <i class="zmdi zmdi-balance-wallet text-white"></i> <span class="text-white">Purchasing Import</span>
                    
                    <ul class="submenu">
                        <li><a href="daftarspimport">Daftar SP Import</a></li>
                        <li><a href="buatpoimport">Buat Po Import</a></li>
                        
                    </ul>
                </li>

             

                <li>

                    <a href="#" onclick="return false;">
                        <i class="zmdi zmdi-truck text-white"></i> <span class="text-white">Produksi</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="#">Buat Mixer</a></li>
                    </ul>
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

    </li>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
   
        <li class="nav-item language">
  <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
    <i class="flag-icon flag-icon-id"></i> 
  </a>
</li>
    <li class="nav-item">
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">

          </a>
        </li>
     
        <li class="dropdown-divider"></li>
     
   



       
      </ul>
    </li>
  </ul>
</nav>
</header>





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
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
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



















<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

  <!--Start Dashboard Content-->

	<div class="card mt-3" >
    <div class="card-content">
        <div class="row row-group m-0">
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">Warehouse<span class="float-right"><i class="zmdi zmdi-store"></i></span></h5>

<div class="progress my-3" style="height:3px;">
    <div class="progress-bar" role="progressbar" style="width:0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>

<script>

    document.addEventListener('DOMContentLoaded', function() {
    var totalMasterbarang = <?php echo $jumlah_barang; ?>;

    function updateProgressBar() {
        var progressElement = document.querySelector('.progress-bar');
        var percentage = (totalMasterbarang / 1000) * 100;

        progressElement.style.width = percentage + '%';
        progressElement.setAttribute('aria-valuenow', percentage);
    }

    updateProgressBar();
});

</script>
</div>
<p class="mb-0 text-white small-font">Total Master Barang: <span class="float-right">  <?php echo $jumlah_barang; ?></span></p>
</div>
</div>



            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">8323 <span class="float-right"><i class="fa fa-usd"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Total Revenue <span class="float-right">+1.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>

            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">6200 <span class="float-right"><i class="fa fa-eye"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Visitors <span class="float-right">+5.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>


            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0">5630 <span class="float-right"><i class="fa fa-envira"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Messages <span class="float-right">+2.2% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>
        </div>
    </div>
 </div>  
	  
	<div class="row">
     <div class="col-12 col-lg-8 col-xl-8">
	    <div class="card">
		 <div class="card-header">Site Traffic
		   <div class="card-action">
			 <div class="dropdown">
			 <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
			  <i class="icon-options"></i>
			 </a>
				<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="javascript:void();">Action</a>
				<a class="dropdown-item" href="javascript:void();">Another action</a>
				<a class="dropdown-item" href="javascript:void();">Something else here</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="javascript:void();">Separated link</a>
			   </div>
			  </div>
		   </div>
		 </div>
		 <div class="card-body">
		    <ul class="list-inline">
			  <li class="list-inline-item"><i class="fa fa-circle mr-2 text-white"></i>New Visitor</li>
			  <li class="list-inline-item"><i class="fa fa-circle mr-2 text-light"></i>Old Visitor</li>
			</ul>
			<div class="chart-container-1">
			  <canvas id="chart1"></canvas>
			</div>
		 </div>
		 
		 <div class="row m-0 row-group text-center border-top border-light-3">
		   <div class="col-12 col-lg-4">
		     <div class="p-3">
		       <h5 class="mb-0">45.87M</h5>
			   <small class="mb-0">Overall Visitor <span> <i class="fa fa-arrow-up"></i> 2.43%</span></small>
		     </div>
		   </div>
		   <div class="col-12 col-lg-4">
		     <div class="p-3">
		       <h5 class="mb-0">15:48</h5>
			   <small class="mb-0">Visitor Duration <span> <i class="fa fa-arrow-up"></i> 12.65%</span></small>
		     </div>
		   </div>
		   <div class="col-12 col-lg-4">
		     <div class="p-3">
		       <h5 class="mb-0">245.65</h5>
			   <small class="mb-0">Pages/Visit <span> <i class="fa fa-arrow-up"></i> 5.62%</span></small>
		     </div>
		   </div>
		 </div>
		 
		</div>
	 </div>

     <div class="col-12 col-lg-4 col-xl-4">
        <div class="card">
           <div class="card-header">Weekly sales
             <div class="card-action">
             <div class="dropdown">
             <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
              <i class="icon-options"></i>
             </a>
              <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="javascript:void();">Action</a>
              <a class="dropdown-item" href="javascript:void();">Another action</a>
              <a class="dropdown-item" href="javascript:void();">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="javascript:void();">Separated link</a>
               </div>
              </div>
             </div>
           </div>
           <div class="card-body">
		     <div class="chart-container-2">
               <canvas id="chart2"></canvas>
			  </div>
           </div>
           <div class="table-responsive">
             <table class="table align-items-center">
               <tbody>
                 <tr>
                   <td><i class="fa fa-circle text-white mr-2"></i> Direct</td>
                   <td>$5856</td>
                   <td>+55%</td>
                 </tr>
                 <tr>
                   <td><i class="fa fa-circle text-light-1 mr-2"></i>Affiliate</td>
                   <td>$2602</td>
                   <td>+25%</td>
                 </tr>
                 <tr>
                   <td><i class="fa fa-circle text-light-2 mr-2"></i>E-mail</td>
                   <td>$1802</td>
                   <td>+15%</td>
                 </tr>
                 <tr>
                   <td><i class="fa fa-circle text-light-3 mr-2"></i>Other</td>
                   <td>$1105</td>
                   <td>+5%</td>
                 </tr>
               </tbody>
             </table>
           </div>
    

      <!--End Dashboard Content-->
	  
	<!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->
		
    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->

    <!--End Dashboard Content-->
</div> <!-- content-wrapper -->
</div> <!-- container-fluid -->
</div> <!-- wrapper -->


<footer class="footer">
    <div class="container">
        <div class="text-center">

        <div class="text-white">
            Copyright © WGS 2024
        </div>
    </div>

        <div class="text-center">
            <div class="text-white">
            Powered by AC Digital
        </div>
    </div>
</footer>

<!--End footer-->

<!--start color switcher-->
<!-- ... (color switcher code) ... -->
<!--end color switcher-->

<!-- ... (script tags) ... -->

	
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
<!-- ... (previous HTML code) ... -->

<!-- Bootstrap core JavaScript-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- simplebar js -->
<script src="assets/plugins/simplebar/js/simplebar.js"></script>
<!-- sidebar-menu js -->
<script src="assets/js/sidebar-menu.js"></script>
<!-- loader scripts -->
<script src="assets/js/jquery.loading-indicator.js"></script>
<!-- Custom scripts -->
<script src="assets/js/app-script.js"></script>
<!-- Chart js -->
<script src="assets/plugins/Chart.js/Chart.min.js"></script>

<!-- Index js -->
<script src="assets/js/index.js"></script>
<!-- Additional script -->
<script src="script.js"></script>

</body>
</html>
