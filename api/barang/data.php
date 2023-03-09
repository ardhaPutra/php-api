<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud-php";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Query untuk mengambil data dari database
$sql = "SELECT 
    barang.id_barang, 
    barang.nama, 
    barang.jumlah, 
    barang.harga, 
    barang.barcode, 
    barang.tanggal, 
    kategori.nm,
    satuan.ns
FROM barang
INNER JOIN 
    kategori 
ON barang.kategorifk 
    = kategori.pk
INNER JOIN
    satuan
ON barang.satuanfk
    =satuan.pk
ORDER BY id_barang DESC";

$result = mysqli_query($conn, $sql);


// Mengubah hasil query menjadi array
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Mengirim hasil query dalam format JSON
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS, post, get');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header("Access-Control-Allow-Credentials", "true");
echo json_encode($data);
?>