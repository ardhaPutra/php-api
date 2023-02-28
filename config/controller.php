<?php

// Fungsi Menampilkan Barang
function select($query)
{
    // panggil koneksi database
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Fungsi Menambah Barang
function create_barang($post)
{
    global $db;

    $nama       = strip_tags($post['nama']);
    $jumlah     = strip_tags($post['jumlah']);
    $harga      = strip_tags($post['harga']);
    $barcode    = rand(100000, 999999);
    
    // query tambah data
    $query = "INSERT INTO barang VALUES(null, '$nama', '$jumlah', '$harga', '$barcode', CURRENT_TIMESTAMP())";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// Fungsi Mengubah data barang 
function update_barang($post)
{
    global $db;

    $id_barang  = strip_tags($post['id_barang']);
    $nama       = strip_tags($post['nama']);
    $jumlah     = strip_tags($post['jumlah']);
    $harga      = strip_tags($post['harga']);
    $barcode    = rand(100000, 999999);
    
    // query ubah data
    $query = "UPDATE barang SET 
        nama    = '$nama', 
        jumlah  = '$jumlah',
        harga   = '$harga',
        barcode = '$barcode'
    WHERE id_barang = $id_barang    
    ";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}

// Fungsi Menghapus Data Barang
function delete_barang($id_barang) 
{
    global $db;

    // query hapus data barang
    $query = "DELETE FROM barang WHERE id_barang = $id_barang";
 
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}




