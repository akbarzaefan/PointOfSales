<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (ob_get_length()) ob_end_clean();

$koneksi = mysqli_connect('localhost', 'root', '', 'kasir');
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if(isset($_POST['tambahbarang'])){
    $namaproduk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $tambah = mysqli_query($koneksi, "INSERT INTO produk(nama_produk,harga,stok) values ('$namaproduk', '$harga', '$stok')");

    if($tambah){
  echo '<meta http-equiv="refresh" content="0;url=index.php?page=barang&status=success">';
  exit();
        
  
    } else {
        error_log("Gagal menambah produk: " . mysqli_error($koneksi));
        header('Location: index.php?page=barang&erorr=1');
        exit();
    }
}
?>