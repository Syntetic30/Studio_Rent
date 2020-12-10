<?php

$namaproduk = $_GET['namaproduk'];
include 'config.php';

$result = mysqli_query($connect, "DELETE FROM produk WHERE nama_brg=$namaproduk");

if($result){
header("Location: index.php?id=$id");
}
?>