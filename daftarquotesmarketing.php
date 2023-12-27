
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

  
  <link href="assets/css/daftarquotes.css" rel="stylesheet" type="text/css"/>
  

  <link href="assets/css/occ.css" rel="stylesheet"/>

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
                        <i class="zmdi zmdi-face"></i> <span>Owner</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="daftarmaster">Daftar Master Barang</a></li>
                        <li><a href="daftarquotes">Daftar Quotes</a></li>
                        <li><a href="daftaroc">Daftar Oc</a></li>
                        <li><a href="daftarspk">Daftar Spk</a></li>
                    </ul>
                </li>




                <li>

                    <a href="#" onclick="return false;">
                    <span>
                        <i class="zmdi zmdi-chart"></i> <span>Marketing</span>
                    </span>
                  </a>
                    <ul class="submenu">
                        <li><a href="buatquotes">Quotes Unit</a></li>
                        <li><a href="daftarquotesmarketing">Daftar Quotes</a></li>
                        <li><span>Daftar Oc</span></li>
                        <li><span>Daftar Spk</span></li>
                        <li><span>Tambah Customer</span></li>
                        <li><span>Daftar Customer</span></li>
                    </ul>
                </li>

                <li>






<li>
                    <a href="#" onclick="return false;">
                      <span>
                        <i class="zmdi zmdi-store"></i> <span>Gudang</span>
                      </span>
                 
                    <ul class="submenu">
                        <li><a href="tambahmaster">Tambah Master</a></li>
                        <li><a href="in">Barang Masuk</a></li>
                        <li><a href="barangout">Barang Keluar</a></li>
                        <li><a href="#">Stock Local & Import</a></li>
                        <li><a href="#">SP Service Center</a></li>
                        <li><a href="#">Daftar Sp</a></li>
                    </ul>
                </li>


 <li>
                    <a href="#" onclick="return false;">
                      <span>
                        <i class="zmdi zmdi-balance-wallet"></i> <span>Purchasing Local</span>
                      </span>
                    <ul class="submenu">
                        <li><a href="#">Buat PO</a></li>
                    </ul>
                </li>


                <li>
                    <a href="#" onclick="return false;">
                      <span>
                        <i class="zmdi zmdi-balance-wallet"></i> <span>Purchasing Local</span>
                      </span>
                    <ul class="submenu">
                        <li><a href="#">Buat PO</a></li>
                    </ul>
                </li>




                   
<li>

                    <a href="#" onclick="return false;">
                      <span>
                        <i class="zmdi zmdi-balance-wallet"></i> <span>Purchasing Local</span>
                      </span>


                    <ul class="submenu">
                        <li><a href="mixer">Mixer</a></li>
                    </ul>
                </li>



             

                <li>

                    <a href="#" onclick="return false;">
                        <i class="zmdi zmdi-truck"></i> <span>Produksi</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="#">Buat Mixer</a></li>
                    </ul>
                </li>


    </ul>
   
   </div>

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




<div class="clearfix" style="">
</div>
  <div class="content-wrapper">
    <div class="container-fluid" style=""> 
  <div class="row">
   <div class="col-12 col-lg-12" style="background-color: ;">
     <div class="card" style="">
      <div class="card-body" style="">
        <h5 class="card-title" style="color:; text-align: center;"> QUOTES ORDER</h5>

        
        <br>
  <div class="table-responsive">
      <div class="table">
         <?php include("quote.php"); ?>
    </table>
             </div>
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
  
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>

</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>