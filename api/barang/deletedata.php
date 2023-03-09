<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: DELETE');
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Referrer-Policy: no-referrer-when-downgrade");

require_once(__DIR__ . '/../../config/app.php');

$body = json_decode(file_get_contents('php://input'), true);
$id_barang = $body['id_barang'] ?? null;

if (!$id_barang) {
  die('id_barang tidak ditemukan');
}

$query  = "DELETE FROM barang WHERE id_barang = ?";
$stmt   = $db->prepare($query);
$stmt->bind_param("i", $id_barang);
$hasil = $stmt->execute();
$stmt->close();

if ($hasil) {
  echo json_encode(['pesan' => 'Data barang berhasil dihapus']);
} else {    
  echo json_encode(['pesan' => 'Data barang gagal dihapus']);
}