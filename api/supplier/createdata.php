<?php


// render halaman menjadi json
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header("Access-Control-Allow-Credentials", "true");

require_once(__DIR__ . '/../../config/app.php');

// menerima input dari request POST
$inputJSON = file_get_contents('php://input');
$input = isset($inputJSON) ? json_decode($inputJSON, TRUE) : null;

// memperoleh data dari input
$nama       = $input['nama'];
$telp       = $input['telp'];
$alamat     = $input['alamat'];

// validasi data
if (empty($nama)) {
    echo json_encode(['pesan' => 'Nama Supplier Tidak Boleh Kosong']);
    exit;
} 

// query tambah data
$query = "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')";

var_dump($query);

$hasil = mysqli_query($db, $query);

if ($hasil) {
    echo json_encode(['success' => true, 'message' => 'Data Supplier berhasil ditambahkan.']);
} else {    
    echo json_encode(['pesan' => 'Data supplier Gagal Ditambahkan']);
}