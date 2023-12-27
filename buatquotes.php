
<?php 
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');
$query_quotes = mysqli_query($koneksi, "SELECT max(quotes) as quotesTerbesar FROM quotes");
$data_quotes = mysqli_fetch_array($query_quotes);
$quotesTerbesar = $data_quotes['quotesTerbesar'];
$urutan_quotes = (int) $quotesTerbesar + 1;
$quotes = $urutan_quotes;

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>QUOTES UNIT</title>
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="assets/images/wgs.png" type="image/png">
  <!-- Vector CSS -->
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

  <link href="assets/css/occ.css" rel="stylesheet"/>




</head>
<body class="bg-theme bg-theme1">
 
<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="dashboard">
  <h5 style="font-size: 30px; position: absolute; top: 15px; padding-left: 15px;">
    <span class="zmdi zmdi-chart" style="color: ;"></span> <span style="color: red;">WGS</span>
</h5>


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
                        <li><span>Daftar Quotes</span></li>
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














<div class="clearfix" style=""></div>
  <div class="content-wrapper">
    <div class="container-fluid" style=""> 
  <div class="row">
   <div class="col-12 col-lg-12" style="background-color: ;">
     <div class="card" style="background-color: white;">
      <div class="card-body" style="">
        <h5 class="card-title" style="color: black; text-align: center;">QUOTES ORDER</h5>
 <form id="tambahpo" action="simpanquotes.php" method="POST">
     
     <div class="quotes">      
     <div style="display: flex; flex-wrap: wrap;">
    <div style="flex: 2; margin-right: 18px;">
       


        <p>
         <input type="text" readonly placeholder="OC" id="quotes" value="<?php echo $quotes ?>" name="quotes" style="color: black;"> 
       </p>




                <p> <input readonly type="date" id="tglquotes" name="tglquotes" required="required">
                <script>
                    var inputTanggal = document.getElementById("tglquotes");
                    var tanggalHariIni = new Date().toISOString().split("T")[0];
                    inputTanggal.value = tanggalHariIni;
                </script> </p>
          

       <p>
<input required type="text" placeholder=""  id="status" name="status" value="PENDING APPROVAL" style="color: black;">
</p>

    </div>
    

<div class="customer">

     

           <p> 
<input style="color:black;"  list="namacustomerlist" placeholder="Customer" id="namacustomer" name="namacustomer" required autocomplete="off">
                          <datalist id="namacustomerlist">
                            <?php
                              $koneksi = mysqli_connect('localhost', 'root', '', 'wgs');
                              $query = "SELECT DISTINCT namacustomer, alamat,email FROM customer";
                              $result = mysqli_query($koneksi, $query);
                              while($row = mysqli_fetch_assoc($result)){
                                echo "<option value='".$row['namacustomer']."' data-alamat='".$row['alamat']."'   data-email='".$row['email']."'     >";
                              }
                            ?>
                          </datalist>
        
        </p>

             <p> <input required type="text" readonly placeholder="Alamat" id="alamat" name="alamat" style="color: black;"> </p>

             <p><input required type="text" readonly placeholder="Email" id="email" name="email" style="color: black ; "> </p>

    
</div>



    <br>
   
<div class="table-responsive">
    <br>
    <table class="table table-shopping">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th style="width:40px">Qty</th>
            <th>Satuan</th>
            <th>Harga Satuan</th>
            <th>Total Harga</th>
            <th>Hapus</th>
        </tr>

        <tbody id="table-quotes">
           
            <tr>
                <td class="counter" style="color:black;" >1</td>
                <td>
                    <p>
                        <input type="text" name="namabarang[]" id="namabarang" list="namabaranglist" placeholder="" autocomplete="off">
                        <datalist id="namabaranglist">
        <?php
        $koneksi = mysqli_connect('localhost', 'root', '', 'wgs');
        $query = "SELECT DISTINCT namabarang, satuan FROM masterbarang WHERE class='Unit'";
        $result = mysqli_query($koneksi, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['namabarang'] . "' data-satuan='" . $row['satuan'] . "'>";
        }
        ?>
    </datalist>
                    </p>
                </td>

                    <td class="qty-column">
        <p><input  type="number" required name="qty[]" min="1" autocomplete="off" value=""></p>
      </td>

                <td class="satuan-column">
                    <p><input readonly type="text" name="satuan[]" value="" class="satuan" id="satuan"></p>
                </td>

                <td>
                    <p><input type="text" required name="price[]" value="" oninput="updateTotalPrice(this)"></p>
                </td>

                <td>
                    <p><input type="text" name="totalprice[]" readonly></p>
                </td>

                <td>
                    <button type="button" class="btn btn-danger" onclick="deleteRow(this)">HAPUS</button>
                </td>
            </tr>
        </tbody>
    </table>


        <button type="button" class="btn btn-purple" onclick="tambahquotes()">+</button>
        

</div>

</div>


<br>


    <div class="container">
        <p class="right-align" style="color: black;">
            Subtotal : <input readonly type="text" placeholder="subtotal" id="subtotal" autocomplete="off" name="subtotal" oninput="updateFormattedSubTotal(this)" style="color: black;">
        </p>
        <p class="right-align">
            <textarea id="notes" placeholder="Catatan" name="notes"  rows="2" cols="20" class="right-align"></textarea>
        </p>
 <input type="text" hidden oninput="updateFormattedPPN(this)" placeholder="ppn" id="ppn" name="ppn" style="color: black;">
<input type="text" hidden oninput="updateFormattedTotalAll(this)" placeholder="totalall" id="totalall" name="totalall" style="color: black;">

    </div>
</div>
   

                <div class="center-button">
  <button type="submit" class="btn btn-success">Simpan</button>
</div>

</form>
      </div>
    </div>
  </div>


<script>
    


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

  <script src="assets/js/quotes.js"></script>

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