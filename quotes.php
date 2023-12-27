
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$koneksi = new mysqli("localhost", "root", "", "wgs");

// Periksa apakah koneksi berhasil atau tidak
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
// Ambil nilai sales dari sesi.php
$query = "SELECT
            status,
            quotes,
            tglquotes,
            sales,
            GROUP_CONCAT(namabarang SEPARATOR ', ') AS namabarang,
            GROUP_CONCAT(qty SEPARATOR ', ') AS qty,
            GROUP_CONCAT(price SEPARATOR ', ') AS price,
            GROUP_CONCAT(totalprice SEPARATOR ', ') AS totalprice,
            subtotal,
            notes
          FROM quotes
          WHERE status IN ('PENDING APPROVAL', 'APPROVED', 'OC ISSUED')
          GROUP BY status, quotes
          ORDER BY
            CASE
              WHEN status = 'PENDING APPROVAL' THEN 1
              WHEN status = 'APPROVED' THEN 2
              WHEN status = 'OC ISSUED' THEN 3
              ELSE 4 -- Jika ada status lain, bisa diatur sesuai kebutuhan
            END";

$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<table class='table'>
            <tr>
            <th>ACTION</th>
                <th>ID QUOTES</th>
                <th>TGL QUOTES</th>
                <th>STATUS</th>
                <th>SALES</th>
                <th>NAMA BARANG</th>
                <th>QTY</th>
                <th>HARGA SATUAN</th>
                <th>TOTAL HARGA</th>
                <th>SUBTOTAL</th>
                <th>NOTES</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>";

        // Tombol "Info" selalu ditampilkan
        echo "<a href='#' class='infoButton' data-quotes='" . $row["quotes"] . "'><i class='fa fa-info-circle' aria-hidden='true' title='Info'></i></a>";

        // Tambahkan kondisi untuk menampilkan atau tidak tombol "ACC"
        if ($row["status"] == 'PENDING APPROVAL') {
            echo "<a href='#' class='green-button' onclick='updateStatus(\"" . $row["quotes"] . "\")'><i class='zmdi zmdi-check-circle' title='APPROVED' ></i></a>";

        }


        echo "</td>
              <td>" . $row["quotes"] . "</td>
              <td>" . $row["tglquotes"] . "</td>
              <td>" . $row["status"] . "</td>
              <td>" . $row["sales"] . "</td>
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
    echo "Belum Ada Data";
}

mysqli_close($koneksi);
?>

<style>
    .infoButton {
        margin-right: 12px; /* Atur nilai margin sesuai keinginan Anda */
    }
</style>


<div id="myModal" class="modal">
  <div class="modal-content" role="document">
    <button  class="close" style="text-align:left;">&times;</button>
    <h5 style="text-align: center;">QUOTES ORDER</h5>
    <div class="rincianquotes" style="text-align:left">

      <p><strong>ID QUOTES: </strong><span id="quotesDisplay"></span></p>
      <p><strong>TGL QUOTES :  </strong><span id="tglquotesDisplay"></span></p>
        <p><strong>SALES : </strong><span id="salesDisplay"></span></p>
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
 </div>
 
      <br>
    <div class="rincianharga">
    <div id="invoiceDetails">
    <p><strong>Subtotal : </strong><span id="subtotalDisplay"></span></p>
    <p><strong>PPN : </strong><span id="ppnDisplay"></span></p>
   <p><strong>Total All : </strong><span id="totalallDisplay"></span></p>
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
    document.getElementById("salesDisplay").textContent = barang[0].sales; // Ubah sesuai struktur JSON yang diterima
    document.getElementById("subtotalDisplay").textContent = barang[0].subtotal; // Ubah sesuai struktur JSON yang diterima
    document.getElementById("tglquotesDisplay").textContent = barang[0].tglquotes; // Ubah sesuai struktur JSON yang diterima
 document.getElementById("ppnDisplay").textContent = barang[0].ppn; // Ubah sesuai struktur JSON yang diterima
 document.getElementById("totalallDisplay").textContent = barang[0].totalall; // Ubah sesuai struktur JSON yang diterima


    modal.style.display = "block";
  }
});
function updateStatus(quotes) {
    // Mengirim permintaan AJAX ke server
    $.ajax({
        url: 'update_status.php',
        type: 'POST',
        data: { quotes: quotes },
        success: function(response) {
            console.log(response);

            // Tambahkan logika jika perlu
            if (response === 'Success') {
                alert('QUOTES berhasil di APPROVED');
                window.location.href = 'daftarquotes.php';
            } else {
                alert('Gagal mengupdate status QUOTES');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert('Terjadi kesalahan saat mengirim permintaan AJAX.');
        }
    });
}
</script>


</body>
</html>
</body>
</html>