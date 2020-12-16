<?php  

include 'config/class.php';
$id_produk=$_GET["id"];
unset($_SESSION["keranjang"][$id_produk]);

echo "<script>alert('produk telah terhapus dari keranjang');</script>";
echo "<script>location='cart.php';</script>";
?>