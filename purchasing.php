
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
  
</head>


<body class="bg-theme bg-theme4">
 
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
<!--End topbar header-->

<div class="clearfix"></div>
  
  <div class="content-wrapper">
    <div class="container-fluid">
     
     
  <div class="row">
   <div class="col-12 col-lg-12">
     <div class="card">
      <div class="card-body">
              <h5 class="card-title text-center mb-3">Master Barang</h5>

<td>
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDataModal">
    <i class="fa fa-plus"></i> Tambah Master
  </button>
</td>


</td>
</h5>
<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-theme1 text-black">  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Master</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="tambahDataForm" action="simpan_data.php" method="POST">
          <div class="form-group">
            <label for="kodebarang">Kode Barang</label>
           <input type="text" readonly class="form-control" id="kodebarang" name="kodebarang" value="<?php echo $kodebarang ?>" required="required">
          <div class="form-group">
            <label for="namabarang">Nama Barang</label>
            <input type="text" class="form-control" id="namabarang" name="namabarang" autocomplete="off">
          </div>



            <div class="form-group">
          <label for="class">Class</label>
          <select id class="form-control" id="class" name="class" required>
            <option value="">Pilih</option>
            <option value="Baut">Baut</option>
            <option value="Compressor">Cat</option>
            <option value="Compressor">Compressor</option>
            <option value="Gearbox">Gearbox</option>
            <option value="Motor">Motor</option>
            <option value="Pump">Pump</option>
            <option value="Plat">Plat</option>
          </select>
        </div>
     

            <div class="form-group">
          <label for="tipe">Local/Import</label>
          <select id class="form-control" id="tipe" name="tipe" required>
            <option value="">Pilih</option>
            <option value="Local">Local</option>
            <option value="Import">Import</option>
          </select>
        </div>

     
          <div class="form-group">
          <label for="class">Satuan</label>
          <select id class="form-control" id="satuan" name="satuan" required>
            <option value="">Pilih</option>
            <option value="PCS">PCS</option>
            <option value="UNIT">UNIT</option>
             <option value="LEMBAR">LEMBAR</option>
              <option value="LITER">LITER</option>
          </select>
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
  </div>
</div>
 <style>
  .bg-theme1 {
    background-color:purple; /* Ganti dengan warna latar belakang yang Anda inginkan */
    color: purple; /* Ganti dengan warna teks yang kontras dengan latar belakang Anda */
    /* Tambahkan gaya tambahan sesuai kebutuhan */
  }
  
  .bg-theme1 input {
    background-color:  ; /* Atur warna latar belakang input menjadi putih */
    color: purple; /* Atur warna teks input agar kontras dengan latar belakang putih */
  }
</style>



        <div class="table-striped">

               <table class="table">
                 
<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM masterbarang";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table-responsive>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Class</th>
                 <th>Satuan</th>
                <th>Tipe</th>
            </tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row["kodebarang"] . "  </td>
                <td>" . $row["namabarang"] . "</td>
                 <td>" . $row["class"] . "</td>
                <td>" . $row["satuan"] . "</td>
<td>" . $row["tipe"] . "</td>
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




<div class="clearfix"></div>
  <!-- 
  <div class="content-wrapper"> -->
    <div class="container-fluid">
     
     
  <div class="row">
   <div class="col-12 col-lg-12">
     <div class="card">
      <div class="card-body">
              <h5 class="card-title text-center mb-3">Stock Barang Global</h5>

<!-- 
<td>
  <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahlocalModal">
    <i class="fa fa-plus"></i> Buat SP Local
  </button>
</td>
 -->

</td>
</h5>
<div class="modal fade" id="tambahlocalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-theme2 text-black">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah SP Local</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="tambahDataForm" action="simpan_data.php" method="POST">
          <div class="form-group">
            <label for="kodebarang">Kode Barang</label>
           <input type="text" readonly class="form-control" id="kodebarang" name="kodebarang" value="<?php echo $kodebarang ?>" required="required">
          <div class="form-group">
            <label for="namabarang">Nama</label>
            <input type="text" class="form-control" id="namabarang" name="namabarang" autocomplete="off">
          </div>

            <div class="form-group">

          <label for="tipe">Local/Import</label>
          <select id class="form-control" id="tipe" name="tipe" required>
            <option value="">Pilih</option>
            <option value="Local">Local</option>
            <option value="Import">Import</option>
             
          </select>
        </div>

          <div class="form-group">
          <label for="class">Satuan</label>
          <select id class="form-control" id="satuan" name="satuan" required>
            <option value="">Pilih</option>
            <option value="PCS">PCS</option>
            <option value="UNIT">UNIT</option>
             <option value="LEMBAR">LEMBAR</option>
              <option value="LITER">LITER</option>
          </select>
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
  </div>
</div>
 <style>
  .bg-theme2 {
    background-color:seagreen; /* Ganti dengan warna latar belakang yang Anda inginkan */
    color: black; /* Ganti dengan warna teks yang kontras dengan latar belakang Anda */
    /* Tambahkan gaya tambahan sesuai kebutuhan */
  }
  
 .bg-theme2 input {
  background-color: #ffffff; /* Atur warna latar belakang input menjadi putih */
  color: #000000; /* Atur warna teks input agar kontras dengan latar belakang putih */
}

</style>



  <div class="table-responsive">
    <table class="table">
        <?php
        $koneksi = new mysqli("localhost", "root", "", "wgs");

        // Periksa apakah koneksi berhasil atau tidak
        if ($koneksi->connect_error) {
            die("Koneksi gagal: " . $koneksi->connect_error);
        }

        $query = "SELECT * FROM stockbarangglobal";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<table-responsive>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Class</th>
                        <th>Serial Number</th>
                        <th>Stock <br>In/Out</th>
                        <th>Stock <br>Serial Count</th>
                        <th>Minimum Stock</th>
                        <th>Kode Produksi</th>
                        <th>Tipe</th>

                    </tr>";

            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . $row["kodebarang"] . "</td>
                        <td>" . $row["namabarang"] . "</td>
                        <td>" . $row["class"] . "</td>
                        <td>" . $row["serialnumber"] . "</td>
                        <td>" . $row["stock_in"] . " / " . $row["stock_out"] . "</td>
                        <td>" . $row["serialcount"] . "</td>
                        <td>" . $row["minimumstock"] . "</td>
                                 <td>" . $row["kodeproduksi"] . "</td>
                                 <td>" . $row["tipe"] . "</td>
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


</table>
</div>
</div>
</div>



<div class="clearfix"></div>
  <!-- 
  <div class="content-wrapper">
 -->    <div class="container-fluid">
     
     
  <div class="row">
   <div class="col-12 col-lg-12">
     <div class="card">
      <div class="card-body">
              <h5 class="card-title text-center mb-3">Stock Barang Lokal</h5>

<!-- 
<td>
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDataModal">
    <i class="fa fa-plus"></i> Tambah Master
  </button>
</td>
 -->

</td>
</h5>
<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-theme1 text-black">  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat SP Import</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="tambahDataForm" action="simpan_data.php" method="POST">
          <div class="form-group">
            <label for="kodebarang">Kode Barang</label>
           <input type="text" readonly class="form-control" id="kodebarang" name="kodebarang" value="<?php echo $kodebarang ?>" required="required">
          <div class="form-group">
            <label for="namabarang">Nama Barang</label>
            <input type="text" class="form-control" id="namabarang" name="namabarang" autocomplete="off">
          </div>

            <div class="form-group">

          <label for="tipe">Local/Import</label>
          <select id class="form-control" id="tipe" name="tipe" required>
            <option value="">Pilih</option>
            <option value="Local">Local</option>
            <option value="Import">Import</option>
             
          </select>
        </div>

          <div class="form-group">
          <label for="class">Satuan</label>
          <select id class="form-control" id="satuan" name="satuan" required>
            <option value="">Pilih</option>
            <option value="PCS">PCS</option>
            <option value="UNIT">UNIT</option>
             <option value="LEMBAR">LEMBAR</option>
              <option value="LITER">LITER</option>
          </select>
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
  </div>
</div>
 <style>
  .bg-theme1 {
    background-color:mediumpurple; /* Ganti dengan warna latar belakang yang Anda inginkan */
    color: black; /* Ganti dengan warna teks yang kontras dengan latar belakang Anda */
    /* Tambahkan gaya tambahan sesuai kebutuhan */
  }
  
  .bg-theme1 input {
    background-color:  ; /* Atur warna latar belakang input menjadi putih */
    color: blueviolet; /* Atur warna teks input agar kontras dengan latar belakang putih */
  }
</style>



        <div class="table-striped">

               <table class="table">
                 
<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM stockbarangimport";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table-responsive>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Tipe</th>
            </tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>

                // <td>" . $row["kodebarang"] . "</td>
                // <td>" . $row["namabarang"] . "</td>
                // <td>" . $row["satuan"] . "</td>
                // <td>" . $row["tipe"] . "</td>
        
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

<div class="clearfix"></div>
  <!-- 
  <div class="content-wrapper">
 -->    <div class="container-fluid">
     
     
  <div class="row">
   <div class="col-12 col-lg-12">
     <div class="card">
      <div class="card-body">
              <h5 class="card-title text-center mb-3">Stock Barang Import</h5>

<!-- 
<td>
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahDataModal">
    <i class="fa fa-plus"></i> Tambah Master
  </button>
</td>
 -->

</td>
</h5>
<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-theme1 text-black">  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat SP Import</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="tambahDataForm" action="simpan_data.php" method="POST">
          <div class="form-group">
            <label for="kodebarang">Kode Barang</label>
           <input type="text" readonly class="form-control" id="kodebarang" name="kodebarang" value="<?php echo $kodebarang ?>" required="required">
          <div class="form-group">
            <label for="namabarang">Nama Barang</label>
            <input type="text" class="form-control" id="namabarang" name="namabarang" autocomplete="off">
          </div>

            <div class="form-group">

          <label for="tipe">Local/Import</label>
          <select id class="form-control" id="tipe" name="tipe" required>
            <option value="">Pilih</option>
            <option value="Local">Local</option>
            <option value="Import">Import</option>
             
          </select>
        </div>

          <div class="form-group">
          <label for="class">Satuan</label>
          <select id class="form-control" id="satuan" name="satuan" required>
            <option value="">Pilih</option>
            <option value="PCS">PCS</option>
            <option value="UNIT">UNIT</option>
             <option value="LEMBAR">LEMBAR</option>
              <option value="LITER">LITER</option>
          </select>
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
  </div>
</div>
 <style>
  .bg-theme1 {
    background-color:mediumpurple; /* Ganti dengan warna latar belakang yang Anda inginkan */
    color: black; /* Ganti dengan warna teks yang kontras dengan latar belakang Anda */
    /* Tambahkan gaya tambahan sesuai kebutuhan */
  }
  
  .bg-theme1 input {
    background-color:  ; /* Atur warna latar belakang input menjadi putih */
    color: blueviolet; /* Atur warna teks input agar kontras dengan latar belakang putih */
  }
</style>



        <div class="table-striped">

               <table class="table">
                 
<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM stockbarangimport";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table-responsive>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Tipe</th>
            </tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>

                // <td>" . $row["kodebarang"] . "</td>
                // <td>" . $row["namabarang"] . "</td>
                // <td>" . $row["satuan"] . "</td>
                // <td>" . $row["tipe"] . "</td>
        
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





<div class="clearfix"></div>
  <!-- 
  <div class="content-wrapper">
 -->    <div class="container-fluid">
     
     
  <div class="row">
   <div class="col-12 col-lg-12">
     <div class="card">
      <div class="card-body">
              <h5 class="card-title text-center mb-3">SP</h5>


<td>
  <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahDataModal">
    <i class="fa fa-plus"></i> Buat SP
  </button>
</td>


</td>
</h5>
<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-theme1 text-black">  <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat SP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="tambahDataForm" action="simpan_data.php" method="POST">
          <div class="form-group">
            <label for="kodebarang">Kode Barang</label>
           <input type="text" readonly class="form-control" id="kodebarang" name="kodebarang" value="<?php echo $kodebarang ?>" required="required">
          <div class="form-group">
            <label for="namabarang">Nama Barang</label>
            <input type="text" class="form-control" id="namabarang" name="namabarang" autocomplete="off">
          </div>

            <div class="form-group">

          <label for="tipe">Local/Import</label>
          <select id class="form-control" id="tipe" name="tipe" required>
            <option value="">Pilih</option>
            <option value="Local">Local</option>
            <option value="Import">Import</option>
             
          </select>
        </div>

          <div class="form-group">
          <label for="class">Satuan</label>
          <select id class="form-control" id="satuan" name="satuan" required>
            <option value="">Pilih</option>
            <option value="PCS">PCS</option>
            <option value="UNIT">UNIT</option>
             <option value="LEMBAR">LEMBAR</option>
              <option value="LITER">LITER</option>
          </select>
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
  </div>
</div>
 <style>
  .bg-theme1 {
    background-color:mediumpurple; /* Ganti dengan warna latar belakang yang Anda inginkan */
    color: black; /* Ganti dengan warna teks yang kontras dengan latar belakang Anda */
    /* Tambahkan gaya tambahan sesuai kebutuhan */
  }
  
  .bg-theme1 input {
    background-color:  ; /* Atur warna latar belakang input menjadi putih */
    color: blueviolet; /* Atur warna teks input agar kontras dengan latar belakang putih */
  }
</style>



        <div class="table-striped">

               <table class="table">
                 
<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM stockbarangimport";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table-responsive>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Tipe</th>
            </tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>

                // <td>" . $row["kodebarang"] . "</td>
                // <td>" . $row["namabarang"] . "</td>
                // <td>" . $row["satuan"] . "</td>
                // <td>" . $row["tipe"] . "</td>
        
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
          Powered by © AC Developer 2024
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
</body>
</html>