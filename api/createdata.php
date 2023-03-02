<?php


// render halaman menjadi json
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header("Access-Control-Allow-Credentials", "true");

require '../config/app.php';

// menerima input dari request POST
$inputJSON = file_get_contents('php://input');
$input = isset($inputJSON) ? json_decode($inputJSON, TRUE) : null;

// memperoleh data dari input
$nama       = $input['nama'];
$jumlah     = $input['jumlah'];
$harga      = $input['harga'];

// generate barcode random
$barcode = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

// timestamp saat ini
$tanggal = date('Y-m-d H:i:s');
$kategori = $input['kategorifk'];

// validasi data
if (empty($nama)) {
    echo json_encode(['pesan' => 'Nama barang Tidak Boleh Kosong']);
    exit;
} 

// query tambah data
$query = "INSERT INTO barang (nama, jumlah, harga, barcode, tanggal, kategorifk) VALUES ('$nama', '$jumlah', '$harga', '$barcode', '$tanggal', '$kategori')";

$hasil = mysqli_query($db, $query);

if ($hasil) {
    echo json_encode(['success' => true, 'message' => 'Data berhasil ditambahkan.']);
    echo '<script>alert("Data berhasil disimpan!");</script>';
} else {    
    echo json_encode(['pesan' => 'Data barang Gagal Ditambahkan']);
}