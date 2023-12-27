
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




<?php 
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');
$query_quotes = mysqli_query($koneksi, "SELECT max(quotes) as quotesTerbesar FROM quotes");
$data_quotes = mysqli_fetch_array($query_quotes);
$quotesTerbesar = $data_quotes['quotesTerbesar'];
$urutan_quotes = (int) $quotesTerbesar + 1;
$quotes = $urutan_quotes;

?>

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
 
      <li>
        <a href="dashboard">
          <i class="zmdi zmdi-view-dashboard"></i> <span>DASHBOARD</span>
        </a>
      </li>

<li>
        <a href="buatquotes">
         <i class="zmdi zmdi-plus"></i> <span> QUOTES UNIT</span>
        </a>
      </li>
<li>
        <a href="daftarquotes">
         <i class="zmdi zmdi-view-list-alt"></i> <span> DAFTAR QUOTES</span>
        </a>
      </li>


        <li>
        <a href="daftaroc">
                   <i class="zmdi zmdi-file"></i> <span>DAFTAR OC</span>
        </a>
      </li>  


  
      


      <li>
        <a href="daftarspk">
         <i class="zmdi zmdi-assignment"></i>  <span>DAFTAR SPK</span>
        </a>
      </li>
      

  



        <li>
        <a href="tambahcustomer">
   <i class="zmdi zmdi-accounts-add"></i> <span>TAMBAH CUSTOMER</span>
        </a>
      </li> 

 <li>
        <a href="customer">
         <i class="zmdi zmdi-accounts-alt"></i> <span>DAFTAR CUSTOMER</span>
        </a>
      </li> 



         <li>
        <a href="index">
          <i class="zmdi icon-power" style="color:red;"></i> <span>LOGOUT</span>
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

    </li>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
   
        <li class="nav-item language">
  <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
    <i class="flag-icon flag-icon-id"></i> 
  </a>
</li>
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="files/<?php echo $gambar ?>" class="img-circle" alt=""></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title"><?php echo $nama ?></h6>
            <p class="user-subtitle">WGS@gmail.com</p>
            </div>
           </div>
          </a>
        </li>
     
        <li class="dropdown-divider"></li>
     
         <li class="dropdown-item">
    <a href="profile?id=<?php echo $id ; ?>">
        <i class="icon-settings mr-2"></i> Setting
    </a>
</li>


      <li class="dropdown-item">
    <a href="index.php">
        <i class="icon-power mr-2"></i> Logout
    </a>
</li>
       



       
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
        <h5 class="card-title" style="color: black; text-align: center;">PO LOCAL</h5>
 <form id="tambahpo" action="simpanquotes.php" method="POST">
     
     <div class="quotes">      
     <div style="display: flex; flex-wrap: wrap;">
    <div style="flex: 2; margin-right: 18px;">
       
<input required type="text" placeholder=""  id="status" name="status" value="PENDING APPROVAL" style="color: black;">

        <p>
         <input type="text" readonly placeholder="OC" id="quotes" value="<?php echo $quotes ?>" name="quotes" style="color: black;"> 
       </p>



                <p> <input readonly type="date" id="tglquotes" name="tglquotes" required="required">
                <script>
                    var inputTanggal = document.getElementById("tglquotes");
                    var tanggalHariIni = new Date().toISOString().split("T")[0];
                    inputTanggal.value = tanggalHariIni;
                </script> </p>
          

<p> <input type="text" readonly placeholder="" id="sales" name="sales" value="<?php echo $nama ?>" style="color: black;"> </p>
    </div>
    

<div class="customer">

     

           <p> 
<input style="color:black;"  list="namacustomerlist" placeholder="Customer" id="namacustomer" name="namacustomer" required autocomplete="off">
        
        </p>

             <p> <input required type="text" readonly placeholder="Alamat" id="alamat" name="alamat" style="color: black;"> </p>

             <p><input required type="text" readonly placeholder="Email" id="email" name="email" style="color: black ; "> </p>

    
</div>


<div class="table-responsive">
    <br>
    <table class="table table-shopping">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th style="width:40px">Qty</th>
                <th>Harga Satuan</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody id="table-quotes"></tbody>
    </table>
</div>

<script>
function updateTotalPrice() {
    const tableQuotes = document.getElementById('table-quotes');
    const rows = tableQuotes.getElementsByTagName('tr');

    for (let i = 1; i < rows.length; i++) {
        const priceInput = rows[i].querySelector('input[name="price[]"]');
        const qtyInput = rows[i].querySelector('input[name="qty[]"]');
        const totalInput = rows[i].querySelector('input[name="totalprice[]"]');

        const price = parseFloat(priceInput.value.replace(/[^\d.]/g, '')) || 0;
        const qty = parseFloat(qtyInput.value) || 0;
        const total = qty * price;

        // Format total sebagai mata uang Rupiah
        totalInput.value = formatRupiah(total.toString());
    }
}

function formatRupiah(angka) {
    var reverse = angka.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);
    
    ribuan = ribuan.join('.').split('').reverse().join('');
    
    // Add handling for numbers with decimal parts
    var decimalPart = angka.toString().split('.')[1];
    var formattedValue = 'Rp ' + ribuan;

    if (decimalPart) {
        formattedValue += '.' + decimalPart;
    }

    return formattedValue;
}

function updateFormattedPrice(inputElement) {
    var inputValue = inputElement.value.replace(/[^\d]/g, ''); // Hapus karakter selain digit
    var formattedValue = formatRupiah(inputValue);

    // Tampilkan nilai yang diformat
    inputElement.value = formattedValue;

    // Panggil fungsi untuk menghitung total harga dan memperbarui subtotal
    updateTotalPrice();
    updateSubTotal();
}

function updateSubTotal() {
    const tableQuotes = document.getElementById('table-quotes');
    const rows = tableQuotes.getElementsByTagName('tr');
    let subTotal = 0;

    for (let i = 1; i < rows.length; i++) {
        const priceInput = rows[i].querySelector('input[name="price[]"]');
        const qtyInput = rows[i].querySelector('input[name="qty[]"]');
        const totalInput = rows[i].querySelector('input[name="totalprice[]"]');

        const price = parseFloat(priceInput.value.replace(/[^\d.]/g, '')) || 0;
        const qty = parseFloat(qtyInput.value) || 0;
        const total = qty * price;

        // Format total sebagai mata uang Rupiah
        totalInput.value = formatRupiah(total.toString());

        subTotal += total;
    }

    // Format subtotal sebagai mata uang Rupiah
    document.getElementById('subtotal').value = formatRupiah(subTotal.toString());
}


    document.addEventListener('DOMContentLoaded', function() {
        // Retrieve selected items from local storage
        const selectedItems = JSON.parse(localStorage.getItem('selectedItems')) || [];

        // Populate the table with selected items
        const tableQuotes = document.getElementById('table-quotes');

        selectedItems.forEach(item => {
            const newRow = tableQuotes.insertRow();
            newRow.innerHTML = `
                <td>
                    <p>
                        <input type="text" name="namabarang[]" value="${item.namabarang}" readonly>
                    </p>
                </td>
                <td class="qty-column">
                    <p>
                        <input type="number" required name="qty[]" min="1" autocomplete="off" value="${item.qty}" oninput="">
                    </p>
                </td>
                <td>
            <p>
                <input type="text" required name="price[]" value="" oninput="updateFormattedPrice(this)">
            </p>
        </td>
                <td>
                    <p>
                        <input type="text" name="totalprice[]" oninput="updateTotalPrice"(this) readonly>
                    </p>
                </td>
            `;
        });

        // Clear local storage after retrieving the selected items
        localStorage.removeItem('selectedItems');
    });
</script>

<!-- ... Your existing HTML code ... -->


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
 <input type="text"  oninput="updateFormattedPPN(this)" placeholder="ppn" id="ppn" name="ppn" style="color: black;">
<input type="text"  oninput="updateFormattedTotalAll(this)" placeholder="totalall" id="totalall" name="totalall" style="color: black;">

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
    
  




  </script>

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