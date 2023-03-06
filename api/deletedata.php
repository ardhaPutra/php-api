<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: DELETE');
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Referrer-Policy: no-referrer-when-downgrade");

require '../config/app.php';

parse_str(file_get_contents('php://input'), $delete);
// mengganti $_GET dengan $delete
$id_barang = $delete['id_barang'] ?? null;

if (!$id_barang) {
  die('id_barang tidak ditemukan');
}

$query  = "DELETE FROM barang WHERE id_barang = $id_barang";
$hasil = mysqli_query($db, $query);

if ($hasil) {
  echo json_encode(['pesan' => 'Data barang berhasil dihapus']);
} else {    
  echo json_encode(['pesan' => 'Data barang gagal dihapus']);
}