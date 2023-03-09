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
$sql = "UPDATE supplier SET nama='{$data['nama']}', telp='{$data['telp']}', alamat='{$data['alamat']}' WHERE pk='{$data['pk']}'";
print_r($sql);
  
$hasil = mysqli_query($db, $sql);

// check status data
if ($hasil) {
    echo json_encode(['pesan' => 'Data supplier Berhasil Diubah']);
} else {    
    echo json_encode(['pesan' => 'Data supplier Gagal Diubah  ']);
}

?>