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
$nama       = $input['nm'];

// validasi data
if (empty($nama)) {
    echo json_encode(['pesan' => 'Nama Kategori Tidak Boleh Kosong']);
    exit;
} 

// query tambah data
$query = "INSERT INTO kategori (nm) VALUES ('$nama')";

$hasil = mysqli_query($db, $query);

if ($hasil) {
    echo json_encode(['success' => true, 'message' => 'Data kategori berhasil ditambahkan.']);
} else {    
    echo json_encode(['pesan' => 'Data kategori Gagal Ditambahkan']);
}