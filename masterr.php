<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$koneksi = new mysqli("localhost", "root", "", "wgs");

// Periksa apakah koneksi berhasil atau tidak
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$query = "SELECT * FROM masterbarang";

$result = mysqli_query($koneksi, $query);
if (mysqli_num_rows($result) > 0) {
    echo "<table class='table'>
            <tr>
            <th class='text-white'>Action</th>
            <th class='text-white'>Id</th>
            <th class ='text-white'>Nama Barang</th>

            </tr>";

 // ... (Your existing PHP code)

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>
                <a href='#' class='infoButton' data-kodebarang='" . $row["kodebarang"] . "'><i class='fa fa-info-circle text-white' aria-hidden='true' title='Info'></i></a>
                <a href='#' class='editButton' data-kodebarang='" . $row["kodebarang"] . "'><i class='fa fa-pencil-square text-white' aria-hidden='true' title='Edit'></i></a>
            </td>
            <td class='text-white'>" . $row["kodebarang"] . "</td>
            <td class='text-white'>" . $row["namabarang"] . "</td>
          </tr>";
}


    echo "</table>";
} else {
    echo "Belum Ada Data";
}

mysqli_close($koneksi);
?>

<style>
   
  /* CSS */
/* CSS */

    #editModal,
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

.rincianharga {
  margin-top: 20px; /* Sesuaikan nilai ini sesuai kebutuhan Anda */
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


<div id="editModal" class="modal">
    <div class="modal-content" role="document">
        <button class="close" style="text-align: left;">&times;</button>
        <h5 style="text-align: center;">Edit Barang</h5>
        
        <div>
            <label for="editNamaBarang">Nama Barang:</label>
            <input type="text" id="editNamaBarang" class="form-control">
        </div>


        <div>
            <label for="editSatuan">Satuan:</label>
            <input type="text" id="editSatuan" class="form-control">
        </div>
        <button id="saveEditButton" class="btn btn-primary">Save</button>
    </div>
</div>


<div id="myModal" class="modal">
    <div class="modal-content" role="document">
        <button class="close" style="text-align:left;">&times;</button>
        <h5 style="text-align: center;"> Master Barang</h5>
        <div class="rincianquotes" style="text-align:left">
            <p><strong>Nama Barang : </strong><span id="namabarangDisplay"></span></p>
      
            <br>
            <table class="table" id="nopoTable">
                <thead>
                    <tr>
                        <th>No. PO</th>
                    </tr>
                </thead>
                <tbody id="nopoTableBody"></tbody>
            </table>
            <br>
            <table class="table" id="ocTable">
                <thead>
                    <tr>
                        <th>No. OC</th>
                    </tr>
                </thead>
                <tbody id="ocTableBody"></tbody>
            </table>
            <br>

            <table class="table" id="inTable">
    <thead>
        <tr>
            <th>Stock (In)</th>
        </tr>
    </thead>
    <tbody id="inTableBody"></tbody>
</table>
</div>
</div>
</div>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var modal = document.getElementById("myModal");
        var editModal = document.getElementById("editModal");
        var infoButtons = document.querySelectorAll('.infoButton');
        var editButtons = document.querySelectorAll('.editButton');
        var closeButton = document.querySelector('.close');
        var saveEditButton = document.getElementById("saveEditButton");

        infoButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                var kodebarang = this.dataset.kodebarang;

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            var data = JSON.parse(xhr.responseText);
                            showDetails(data.barang);
                        } else {
                            alert("Gagal mengambil data dari server.");
                        }
                    }
                };

                xhr.open('GET', 'get_barangmaster.php?kodebarang=' + encodeURIComponent(kodebarang), true);
                xhr.send();
            });
        });

        editButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                var kodebarang = this.dataset.kodebarang;
                fetchDataAndDisplayEditModal(kodebarang);
            });
        });

        closeButton.addEventListener('click', function () {
            modal.style.display = 'none';
        });

        function fetchDataAndDisplayEditModal(kodebarang) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);
                        displayEditModal(data.barang);
                    } else {
                        alert("Gagal mengambil data dari server.");
                    }
                }
            };

            xhr.open('GET', 'get_barangmaster.php?kodebarang=' + encodeURIComponent(kodebarang), true);
            xhr.send();
        }

        function displayEditModal(barang) {
            document.getElementById("editNamaBarang").value = barang[0].namabarang;
            document.getElementById("editSatuan").value = barang[0].satuan;
            editModal.style.display = 'block';
        }

        function showDetails(barang) {
            document.getElementById("namabarangDisplay").textContent = barang[0].namabarang;
            modal.style.display = 'block';
        }
    });
</script>
