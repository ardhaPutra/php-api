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
$pk = $body['pk'] ?? null;

if (!$pk) {
  die('supplier tidak ditemukan');
}

$query  = "DELETE FROM supplier WHERE pk = ?";
$stmt   = $db->prepare($query);
$stmt->bind_param("i", $pk);
$hasil = $stmt->execute();
$stmt->close();

if ($hasil) {
  echo json_encode(['pesan' => 'Data supplier berhasil dihapus']);
} else {    
  echo json_encode(['pesan' => 'Data supplier gagal dihapus']);
}