<?php

// render halaman menjadi json
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS, post, get');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header("Access-Control-Allow-Credentials", "true");

require '../config/app.php';

// menerima input
// $nama   = $_POST['nama'];
// $jumlah = $_POST['jumlah'];
// $harga  = $_POST['harga'];

// Terima data dari Axios
$data = json_decode(file_get_contents('php://input'), true);

// validasi data
if ($nama == null) {
    echo json_encode(['pesan' => 'Nama barang Tidak Boleh Kosong']);
    exit;
} 

// query tambah data
// $query = "INSERT INTO barang (nama,jumlah,harga) VALUES ('$nama', '$jumlah', '$harga')";
$query = "INSERT INTO barang (nama, jumlah, harga) VALUES ('".$data['nama']."', '".$data['jumlah']."', '".$data['alamat']."', '".$data['harga']."')";
$hasil=mysqli_query($db, $query);
if ($hasil) {
    echo json_encode(['success' => true, 'message' => 'Data berhasil ditambahkan.']);
} else {    
    echo json_encode(['pesan' => 'Data barang Gagal Ditambahkan']);
}