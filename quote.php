
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$koneksi = new mysqli("localhost", "root", "", "wgs");

// Periksa apakah koneksi berhasil atau tidak
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}



$query_oc = mysqli_query($koneksi, "SELECT max(oc) as ocTerbesar FROM oc");
$data_oc = mysqli_fetch_array($query_oc);
$ocTerbesar = $data_oc['ocTerbesar'];
$urutan_oc = (int) $ocTerbesar + 1;
$oc = $urutan_oc;



// Ambil nilai sales dari sesi.php
$query = "SELECT
            quotes,
            status,
            tglquotes,
            sales,
            GROUP_CONCAT(namabarang SEPARATOR ', ') AS namabarang,
            GROUP_CONCAT(qty SEPARATOR ', ') AS qty,
            GROUP_CONCAT(price SEPARATOR ', ') AS price,
            GROUP_CONCAT(totalprice SEPARATOR ', ') AS totalprice,
            subtotal,
            notes
          FROM quotes
          GROUP BY status, quotes
          ORDER BY
            CASE
              WHEN status = 'APPROVED' THEN 1
              WHEN status = 'OC ISSUED' THEN 2
              WHEN status = 'PENDING' THEN 3
              ELSE 4 -- Jika ada status lain, bisa diatur sesuai kebutuhan
            END";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table class='table'>
            <tr>
            <th>ACTION</th>
                <th>QUOTES</th>
                <th>TGL QUOTES</th>
                <th>STATUS</th>
              
                <th>NAMA BARANG</th>
                <th>QTY</th>
                <th>HARGA SATUAN</th>
                <th>TOTAL HARGA</th>
                <th>SUBTOTAL</th>
                <th>NOTES</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td><a href='#' class='infoButton' data-quotes='" . $row["quotes"] . "'><i class='fa fa-info-circle' aria-hidden='true' title='Info'></i></a>";

// Tambahkan tombol dengan simbol @ hanya jika status = 'APPROVED'
    if ($row["status"] == 'APPROVED') {
    echo "&nbsp;&nbsp;&nbsp;"; // Spasi di sini

   echo "<a href='#' class='OCButton' data-oc='" . $row["quotes"] . "' onclick='openModalOC(\"" . $row["quotes"] . "\")'>
    <i class='zmdi zmdi-file-plus' aria-hidden='true' title='Tambah OC'></i>
</a>";




}




        echo "</td>
                <td>" . $row["quotes"] . "</td>
                <td>" . $row["tglquotes"] . "</td>
                <td>" . $row["status"] . "</td>
                <td>" . $row["namabarang"] . "</td>
                <td>" . $row["qty"] . "</td>
                <td>" . $row["price"] . "</td>
                <td>" . $row["totalprice"] . "</td>
                <td>" . $row["subtotal"] . "</td>
                <td>" . $row["notes"] . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data untuk sales ini.";
}

mysqli_close($koneksi);
?>



<style>

/* Untuk membuat rincianoc dan detailcustomeroc berada di sebelah kiri dan kanan */
.details-container {
    display: flex;
    justify-content: space-between;
}

/* Untuk membuat tabel responsif dan mengatur jarak dari modal */
.table-container {
    margin-top: 20px;
}

.table-responsive {
    overflow-x: auto;
}

/* Untuk membuat tombol Submit berwarna hijau */
.submit-button {
    background-color: green;
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}

.submit-button:hover {
    background-color: darkgreen;
    text-align: center;
}


 #ModalOC {
    overflow: auto; /* Tambahkan overflow: auto; untuk membuat efek scroll jika kontennya melebihi ukuran modal */
  }


.modal-wrapper {
  margin-top: 50px; /* Posisikan tepat di tengah vertikal */
  margin-left: 50px; /* Posisikan tepat di tengah horizontal */
}


/* Warna teks dalam modal */
.modal-content,
.modal-content * {
  color: black; /* Mengatur warna teks menjadi hitam */
}
.rincianquotes{
  text-align: left;
  margin-left: 26px;
  }

.rincianharga {
  margin-top: 20px; /* Sesuaikan nilai ini sesuai kebutuhan Anda */
}

#invoiceDetails {

  margin-left: 400px;
}



.close {
  color: red; /* Mengatur warna teks tombol close menjadi hitam */
  font-weight: bold;

  /* Properti CSS lainnya sesuai kebutuhan */
}


    /* Increase the height of the modal content */
    .modal-dialog {
        max-width: 80%; /* Adjust the maximum width of the modal */
        height: 80vh; /* Set the height to 90% of the viewport height */
        margin-left: 0px; /* Add some margin for better appearance */
    }
}


/* CSS */

/* Untuk membuat tabel responsif dan mengatur jarak dari modal */
.table-container {
    margin-top: 20px;
    overflow-x: auto; /* Menambahkan overflow-x: auto; agar dapat di-scroll jika melebihi lebar modal */
}

#dataoc {
    margin: 20px auto; /* Menempatkan tabel di tengah konten modul */
    width: 100%; /* Mengubah lebar tabel menjadi 100% agar sesuai dengan konten */
}

#dataoc th,
#dataoc td {
    border: 1px solid #dddddd;
    padding: 10px; /* Mengurangi padding agar tidak terlalu lebar */
    text-align: left;
}

.rincianharga {
    margin-top: 20px; /* Sesuaikan nilai ini sesuai kebutuhan Anda */
    margin-left: 20px; /* Menambahkan margin kiri pada rincianharga */
}

#invoiceDetails {
    margin-left: 0; /* Mengatur margin kiri menjadi 0 */
}

#subtotalDisplay,
#ppnDisplay,
#totalallDisplay {
    margin-left: 10px;
}


.modal-content {
    width: 100%;
    margin-left: auto;
    margin-right: auto;
    height: auto;
    max-height: 80vh; /* Mengatur tinggi maksimum modal agar tidak melebihi viewport */
    overflow-y: auto; /* Menambahkan overflow-y: auto; agar dapat di-scroll jika kontennya melebihi tinggi modal */
    margin-top: 66px;
}

</style>


<div id="ModalOC" class="modal">
    <div class="modal-content" role="document">
        <form id="simpanocc" action="so.php" method="POST">

            <div class="details-container">
                <div class="detailsoc" style="color: black;">
                    <p> ID OC :<input type="text" name="oc" value="<?php echo $oc; ?>"></p>
                    <p>
                        ID QUOTES : <input type="text" hidden name="quotes" id="QuotesInput">
                        <span id="QuotesDisplay"></span>
                    </p>
              
                    <p>
                        CUSTOMER : <input type="text" hidden name="namacustomer" id="namacustomerOC" value="namacustomerOC">
                        <span id="namacustomerOCDisplay"></span>
                    </p>
                    <p>
                        EMAIL : <input type="text" hidden name="email" id="emailOC" value="emailOC">
                        <span id="emailOCDisplay"></span>
                    </p>
                    <p>
                        ALAMAT : <input type="text" hidden name="alamat" value="alamatOC" id="alamatOC">
                        <span id="alamatOCDisplay"></span>
                    </p>



                </div>

                <div class="detailcustomeroc" style="color: black;">
                  

                      <p>
                        PO CS : <input type="text" name="pocust" id="">
                    </p>


   <p>  Tgl PO :   <input   type="date" id="tglpo" name="tglpo" required="required">
               </p>

   <p>   Tgl OC :  <input readonly  type="date" id="tgloc" name="tgloc" required="required">
                <script>
                    var inputTanggal = document.getElementById("tgloc");
                    var tanggalHariIni = new Date().toISOString().split("T")[0];
                    inputTanggal.value = tanggalHariIni;
                </script> </p>



               <p> Status : 
                <input type="text" name="status" value="PENDING OC" readonly>

                </p>



                </div>
            </div>

            <div class="table-container">
                <div class="table-responsive">
                    <table id="dataoc">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Qty</th>
                                <th>Satuan</th>
                                <th>Harga Satuan</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody id="dataocBody"></tbody>
                    </table>
                </div>


  <div class="rincianharga">
    <div id="invoiceDetails">

<p>
    <strong>Subtotal : </strong>
    <input type="text" name="subtotal" id="subtotal"  readonly>
</p>


 <p>
    <strong>PPN : </strong>
        <input type="text"  name="ppn" readonly id="ppn">

</p>


 <p>
    <strong>Total All : </strong>
        <input type="text"  name="totalall" readonly id="totalall">

</p>

</div>
</div>
            

            <br>

            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>
</div>



<script>

    function openModalOC(quotes) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var dataInfo = JSON.parse(xhr.responseText);

                    document.getElementById("QuotesInput").value = quotes;
                    document.getElementById("QuotesDisplay").textContent = quotes;

                    document.getElementById("namacustomerOC").value = dataInfo.namacustomer;
                    document.getElementById("namacustomerOCDisplay").textContent = dataInfo.namacustomer;

                    document.getElementById("emailOC").value = dataInfo.email;
                    document.getElementById("emailOCDisplay").textContent = dataInfo.email;

                    document.getElementById("alamatOC").value = dataInfo.alamat;
                    document.getElementById("alamatOCDisplay").textContent = dataInfo.alamat;







                    // Tampilkan data barang di dalam tabel
                    showDetails(dataInfo.dataBarangOC);
                } else {
                    alert("Failed to fetch information.");
                }
            }
        };



        xhr.open('GET', 'get_data_quotes.php?quotes=' + encodeURIComponent(quotes), true);
        xhr.send();

        var modalOC = document.getElementById("ModalOC");
        modalOC.style.display = "flex";

        window.addEventListener('click', function (event) {
            if (event.target == modalOC) {
                closeModalOC();
            }
        });
    }


function closeModalOC() {
    var modalOC = document.getElementById("ModalOC");
    modalOC.style.display = "none";
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
}



    function showDetails(dataBarang) {

var subtotal = 0;
var ppn = 0 ;
var totalall = 0;
        
    var tableBody = document.getElementById("dataocBody");
    tableBody.innerHTML = "";

    dataBarang.forEach(function (barang, i) {
        var row = tableBody.insertRow(i);

        // Kolom Nama Barang
        var cell1 = row.insertCell(0);
        var inputNamaBarang = document.createElement("input");
        inputNamaBarang.type = "text";
        inputNamaBarang.name = "namabarang[]";
        inputNamaBarang.value = barang.namabarang;
        inputNamaBarang.addEventListener("input", function () {
            barang.namabarang = this.value;
        });
        cell1.appendChild(inputNamaBarang);

        // Kolom Quantity
        // Kolom Quantity
var cell2 = row.insertCell(1);
var inputQty = document.createElement("input");
inputQty.type = "text";
inputQty.name = "qty[]";
inputQty.value = barang.qty;
inputQty.addEventListener("input", function () {
    // Update nilai qty pada objek barang
    barang.qty = this.value;
    
    // Memanggil fungsi untuk memperbarui totalprice
    updateTotalPrice(this, dataBarang);
});

cell2.appendChild(inputQty);



        // Kolom Satuan
        var cell3 = row.insertCell(2);
        var inputSatuan = document.createElement("input");
        inputSatuan.type = "text";
        inputSatuan.name = "satuan[]";
        inputSatuan.value = barang.satuan;
        inputSatuan.addEventListener("input", function () {
            barang.satuan = this.value;
        });
        cell3.appendChild(inputSatuan);

var cell4 = row.insertCell(3);
var inputPrice = document.createElement("input");
inputPrice.type = "text";
inputPrice.name = "price[]";

// Menggunakan formatRupiah untuk nilai awal
inputPrice.value = barang.price;

// Menyimpan nilai numerik di latar belakang
var numericPrice = barang.price;

inputPrice.addEventListener("input", function () {
    var numericValue = this.value.replace(/[^\d]/g, ''); // Hanya angka
    numericPrice = parseFloat(numericValue) || 0;

    // Set nilai pada elemen input menggunakan formatRupiah
    this.value = formatRupiah(numericPrice);

    // Memperbarui total price dan totalall saat harga berubah
    updateTotalPrice(row, dataBarang, i);
});

cell4.appendChild(inputPrice);
// Kolom Total Price
var cell5 = row.insertCell(4);
var inputTotalPrice = document.createElement("input");
inputTotalPrice.type = "text";
inputTotalPrice.name = "totalprice[]";

// Mengatur format nilai totalprice saat pertama kali diatur
inputTotalPrice.value = barang.totalprice;

// Menyimpan nilai numerik di belakang layar
var numericTotalPrice = parseFloat(barang.totalprice) || 0;

inputTotalPrice.addEventListener("input", function () {
    // Dapatkan nilai numerik dari input
    var nilaiNumerik = this.value.replace(/[^\d.]/g, '');
    
    // Konversi nilai numerik menjadi float
    numericTotalPrice = parseFloat(nilaiNumerik) || 0;

    // Hitung total semua harga
    updateTotalAll(dataBarang);
});

cell5.appendChild(inputTotalPrice);
function updateTotalPrice(inputElement, dataBarang) {
    // Temukan baris induk
    var baris = inputElement.closest('tr');

    // Dapatkan nilai kuantitas dan harga satuan
    var qty = parseFloat(baris.querySelector('td:nth-child(2) input').value);
    var priceInput = baris.querySelector('td:nth-child(4) input');
    var priceValue = priceInput.value.replace(/[^\d.]/g, '');
    
    // Ubah tanda titik menjadi tanda desimal jika ada
    var price = parseFloat(priceValue.replace(/\./g, '')) || 0;

    

    // Hitung totalprice
    var totalprice = qty * price;
    // Perbarui nilai yang diformat pada input totalprice
    var inputTotalPrice = baris.querySelector('td:nth-child(5) input');
    inputTotalPrice.value = formatRupiah(totalprice);

    // Update totalprice for the corresponding dataBarang item
    var index = Array.from(baris.parentNode.children).indexOf(baris);
    dataBarang[index].totalprice = totalprice;
     dataBarang[index].qty = qty;
   

    // Hitung ulang subtotal berdasarkan totalprice yang ada
    var subtotal = dataBarang.reduce(function (acc, item) {
        return acc + (item.totalprice || 0);
    }, 0);

    // Perbarui nilai subtotal di elemen dengan ID 'subtotal'
    document.getElementById('subtotal').value = formatRupiah(subtotal);


// Hitung PPN (11% dari subtotal)
var ppnRate = 0.11; // 11 persen
var ppn = subtotal * ppnRate;

// Perbarui nilai PPN di elemen dengan ID 'ppn'
document.getElementById('ppn').value = formatRupiah(ppn);

var totalall = subtotal + ppn ;

document.getElementById('totalall').value = formatRupiah(totalall);


}



    });
}



</script>

</div>



<style>
  /* CSS */
/* CSS */

 #myModal {
    overflow: auto; /* Tambahkan overflow: auto; untuk membuat efek scroll jika kontennya melebihi ukuran modal */
  }


.modal-wrapper {
  margin-top: 50px; /* Posisikan tepat di tengah vertikal */
  margin-left: 50px; /* Posisikan tepat di tengah horizontal */
}


/* Warna teks dalam modal */
.modal-content,
.modal-content * {
  color: black; /* Mengatur warna teks menjadi hitam */
}
.rincianquotes{
  text-align: left;
  margin-left: 26px;
  }


#invoiceDetails {

  margin-left: 400px;
}

#subtotalDisplay,
#ppnDisplay,
#totalallDisplay {
  /* Jika Anda ingin mengatur jarak kiri pada elemen-elemen span secara khusus */
  margin-left: 10px; /* Sesuaikan nilai ini sesuai kebutuhan Anda */
}


 .modal-content {
        width: 78%; /* You can adjust the percentage based on your preference */
        margin-left: 265px;
   margin-top: 66px; 
    }


.close {
  color: black; /* Mengatur warna teks tombol close menjadi hitam */
  font-weight: bold;

  /* Properti CSS lainnya sesuai kebutuhan */
}


    /* Increase the height of the modal content */
    .modal-dialog {
        max-width: 80%; /* Adjust the maximum width of the modal */
        height: 80vh; /* Set the height to 90% of the viewport height */
        margin-left: 0px; /* Add some margin for better appearance */
    }
}
#barangTableDetail {
  margin: 20px auto; /* Menempatkan tabel di tengah konten modul */
  width: 90%; /* Lebar tabel */
}

#barangTableDetail th,
#barangTableDetail td {
  border: 1px solid #dddddd;
  padding: 20px;
  text-align: left;
}

#barangTableDetail th {
  background-color: #f2f2f2;
}
.rincianharga{
  margin-left: 20px;
  text-align: left;

}
.tablequotes{
  margin-left: 180px;
}



</style>


<div id="myModal" class="modal">
 <div class="modal-content" role="document">
    <button class="close" style="text-align: left;">&times;</button>
    <h5 style="text-align: center;">QUOTES ORDER</h5>
    

    <div class="quotes" style="color:black;">
        <div style="display: flex; flex-wrap: wrap;">
            <div style="flex: 2; margin-right: 18px;">
                <p><strong>NO QUOTES: </strong><span id="quotesDisplay"></span></p>
                <p><strong>TGL QUOTES : </strong><span id="tglquotesDisplay"></span></p>
             
            </div>

            <div class="customer" style="color:black;">
                <p><strong>CUSTOMER : </strong><span id="namacustomerDisplay"></span></p>
                <p><strong>EMAIL : </strong><span id="emailDisplay"></span></p>
                <p><strong>ALAMAT : </strong><span id="alamatDisplay"></span></p>
            </div>
        </div>
<br>
        <table id="barangTableDetail">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Qty</th>
                    <th>Satuan</th>
                    <th>Harga Satuan</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody id="barangTableBody"></tbody>
        </table>

        <br>

        <div class="rincianharga" style="color:black;">
            <div id="invoiceDetails">
                <p><strong>Subtotal : </strong><span id="subtotalDisplay"></span></p>
                <p><strong>Catatan : </strong><span id="catatanDisplay"></span></p>
            </div>
        </div>
    </div>
</div>








<script>
var modal = document.getElementById('myModal');

// Ketika pengguna mengklik di luar modul, tutup modulnya
window.onclick = function(event) {
  if (event.target === modal) {
    modal.style.display = 'none';
  }
};

// Tombol close di dalam modul untuk menutup modul saat diklik
var closeButton = document.querySelector('.close');
closeButton.addEventListener('click', function() {
  modal.style.display = 'none';
});


 document.addEventListener("DOMContentLoaded", function() {
  var modal = document.getElementById("myModal");
  var span = document.getElementsByClassName("close")[0];
  var infoButtons = document.querySelectorAll('.infoButton'); // Mengganti editButtons menjadi infoButtons

  span.onclick = function() {
    modal.style.display = "none";
  };

  // Deklarasikan variabel infoButtons
  var infoButtons;

  infoButtons.forEach(function(button) {
    button.addEventListener('click', function(event) {
      event.preventDefault();
      var quotes = this.dataset.quotes;

      // Kirim permintaan AJAX ke PHP untuk mengambil data barang
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);
            showDetails(data.barang); // Ubah sesuai struktur JSON yang diterima
          } else {
            alert("Gagal mengambil data dari server.");
          }
        }
      };

      xhr.open('GET', 'get_barang.php?quotes=' + encodeURIComponent(quotes), true);
      xhr.send();
    });
  });

  function showDetails(barang) {
    // Bersihkan isi tabel sebelum menambahkan data baru
    document.getElementById("barangTableBody").innerHTML = "";

    // Tambahkan data barang ke dalam tabel
    barang.forEach(function(item) {
      var row = document.createElement("tr");
      row.innerHTML = "<td>" + item.namabarang + "</td>  <td>" + item.qty + "</td>  <td>" + item.satuan + "</td> <td>" + item.price + "</td> <td>" + item.totalprice + "</td>" ;
      document.getElementById("barangTableBody").appendChild(row);
    });

    // Set nilai quotesDisplay dan salesDisplay
    document.getElementById("quotesDisplay").textContent = barang[0].quotes; // Ubah sesuai struktur JSON yang diterima
    document.getElementById("subtotalDisplay").textContent = barang[0].subtotal; // Ubah sesuai struktur JSON yang diterima
    document.getElementById("tglquotesDisplay").textContent = barang[0].tglquotes; // Ubah sesuai struktur JSON yang diterima
    document.getElementById("catatanDisplay").textContent = barang[0].notes; // Ubah sesuai struktur JSON yang diterima
  
document.getElementById("namacustomerDisplay").textContent = barang[0].namacustomer; // Ubah sesuai struktur JSON yang diterima
document.getElementById("alamatDisplay").textContent = barang[0].alamat; // Ubah sesuai struktur JSON yang diterima
document.getElementById("emailDisplay").textContent = barang[0].email; // Ubah sesuai struktur JSON yang diterima


    modal.style.display = "block";
  }
});

</script> 
</body>
</html>
</body>
</html>