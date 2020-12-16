<?php  
	$id_pemesanan=$_GET['id'];
	$pemesanan->hapus_pemesanan($id_pemesanan);
	echo "<script>alert('Data berhasil dihapus');</script>";
	echo "<script>location='admin.php?halaman=pemesanan';</script>";
?>