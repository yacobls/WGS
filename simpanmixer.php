<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Fungsi untuk mendapatkan kode produksi otomatis
function getKodeProduksi($tahun, $nourut)
{
    return "WMX" . $tahun . "/" . str_pad($nourut, 4, '0', STR_PAD_LEFT);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $tipe = $_POST['tipe'];
    $nounit = $_POST['nounit'];

    // Ambil tahun saat ini
    $tahunSaatIni = date('Y');

    // Ambil nourut terakhir dari database atau inisialisasi dengan 1 jika belum ada data
    $queryNourut = "SELECT MAX(RIGHT(kodeproduksi, 4)) AS max_nourut FROM mixer WHERE YEAR(tanggal) = ?";
    $stmtNourut = mysqli_prepare($koneksi, $queryNourut);
    mysqli_stmt_bind_param($stmtNourut, 's', $tahunSaatIni);
    mysqli_stmt_execute($stmtNourut);
    mysqli_stmt_bind_result($stmtNourut, $maxNourut);
    mysqli_stmt_fetch($stmtNourut);

    $nourut = $maxNourut ? $maxNourut + 1 : 1;

    // Buat kode produksi
    $kodeproduksi = getKodeProduksi($tahunSaatIni, $nourut);

    // Simpan data ke database
    $query = "INSERT INTO mixer (kodeproduksi, tipe, nounit) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, 'sss', $kodeproduksi, $tipe, $nounit);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo '<script>alert("Data berhasil disimpan."); window.location.href = "daftarproduksi.php";</script>';
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
}
?>
