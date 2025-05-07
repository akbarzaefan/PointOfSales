<?php
include 'koneksi.php';

$id_produk = $_GET['id_produk'];
$quantity = $_GET['jumlah'];

$query_produk = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
$result_produk = mysqli_query($conn, $query_produk);
$row_produk = mysqli_fetch_assoc($result_produk);

$total_harga = $quantity * $row_produk['harga'];

$query_stok = "SELECT stok FROM produk WHERE id_produk = '$id_produk'";
$result_produk = mysqli_query($conn, $query_produk);
$row_produk = mysqli_fetch_assoc($result_produk);

if ($row_produk['stok'] >= $quantity ) {
    $query_belanja = "INSERT INTO penjualan (id_penjualan, jumlah, total_harga) VALUE ('$id_produk','$quantity','$total_harga')";
    if (mysqli_query($conn, $query_belanja)) {
        $kurang_stok = "UPDATE produk SET stok = stok - $quantity WHERE id_produk = '$id_produk'";
        mysqli_query($conn, $kurang_stok);
        header("Location: penjualan.php");
    }
    else {
        echo "Error: " . mysqli_error($conn);
    }
}
else {
    echo "Stok tidak cukup";
}



?>