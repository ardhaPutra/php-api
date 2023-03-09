<?php
// render halaman menjadi json
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS, post, get');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header("Access-Control-Allow-Credentials", "true");

require_once(__DIR__ . '/../../config/app.php');

// Get request data
$data = json_decode(file_get_contents('php://input'), true);

// Update data in database
$sql = "UPDATE satuan SET ns='{$data['ns']}' WHERE pk='{$data['pk']}'";
  
$hasil = mysqli_query($db, $sql);

// check status data
if ($hasil) {
    echo json_encode(['pesan' => 'Data satuan Berhasil Diubah']);
} else {    
    echo json_encode(['pesan' => 'Data satuan Gagal Diubah  ']);
}
?>