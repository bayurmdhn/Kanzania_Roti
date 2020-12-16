<?php  
	$id_pembelian=$_GET['id'];
	$pembelian->hapus_pembelian($id_pembelian);
	echo "<script>alert('Data berhasil dihapus');</script>";
	echo "<script>location='admin.php?halaman=pembelian';</script>";
?>