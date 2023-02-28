<?php

// render halaman menjadi json
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require '../config/app.php';

// menerima request put/delete
parse_str(file_get_contents('php://input'), $delete);

// menerima input id data yang akan dihapus
$id_barang = $delete['id_barang'];

// query hapus data
$query  = "DELETE FROM barang WHERE id_barang = $id_barang";
mysqli_query($db, $query);

// check status data
if ($query) {
    echo json_encode(['pesan' => 'Data barang Berhasil Dihapus']);
} else {    
    echo json_encode(['pesan' => 'Data barang Gagal Dihapus  ']);
}
