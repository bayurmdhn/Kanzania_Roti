<?php  
	$id_ongkos=$_GET['id'];
	$ongkir->hapus_ongkir($id_ongkos);
	echo "<script>alert('Ongkos Kirim Terhapus');</script>";
	echo "<script>location='admin.php?halaman=ongkir';</script>";
?>