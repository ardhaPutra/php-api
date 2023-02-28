<?php

// render halaman menjadi json
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS, post, get');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header("Access-Control-Allow-Credentials", "true");

require '../config/app.php';

$query = select("SELECT * FROM barang ORDER BY id_barang DESC");

echo json_encode(['data_barang' => $query]);