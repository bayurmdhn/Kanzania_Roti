<?php  

include 'config/class.php';
$id_katalogproduk=$_GET["id"];
unset($_SESSION["pemesanan"][$id_katalogproduk]);

echo "<script>alert('pesanan telah terhapus');</script>";
echo "<script>location='viewpemesanan.php';</script>";
?>