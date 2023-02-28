<?php

header('Content-Type: application/json');

// Get request data
$data = json_decode(file_get_contents('php://input'), true);

// Connect to database
$conn = new mysqli('localhost', 'root', '', 'crud-php');
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// Update data in database
$sql = "UPDATE barang SET name='{$data['nama']}', jumlah='{$data['jumlah']}', harga='{$data['harga']}' WHERE id_barang='{$data['id']}'";
if ($conn->query($sql) === true) {
  echo json_encode(array('status' => 'success', 'message' => 'Data updated successfully'));
} else {
  echo json_encode(array('status' => 'error', 'message' => 'Failed to update data'));
}

$conn->close();

?>