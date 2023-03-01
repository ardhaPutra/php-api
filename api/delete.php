<?php

// render halaman menjadi json
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: DELETE');
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require '../config/app.php';

// menerima request put/delete
parse_str(file_get_contents('php://input'), $delete);
$id_barang = $input['id_barang'] ?? null;

if (!$id_barang) {
    die('id_barang tidak ditemukan');
}

$id_barang = $delete['id_barang'];

// query hapus data
$query  = "DELETE FROM barang WHERE id_barang = $id_barang";
$hasil = mysqli_query($db, $query);

// check status data
if ($hasil) {
    echo json_encode(['pesan' => 'Data barang Berhasil Dihapus']);
} else {    
    echo json_encode(['pesan' => 'Data barang Gagal Dihapus  ']);
}
