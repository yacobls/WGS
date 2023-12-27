<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'wgs');

if(isset($_GET['searchTerm'])){
    $searchTerm = $_GET['searchTerm'];
    $query = "SELECT DISTINCT namabarang FROM stockbarangglobal WHERE namabarang LIKE '%$searchTerm%'";
    $result = mysqli_query($koneksi, $query);

    $data = array();
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row['namabarang'];
    }

    echo json_encode($data);
}
?>
