<?php  
	$id_katalogproduk=$_GET['id'];
	$datakatalog=$katalogproduk->ambil_katalogproduk($id_katalogproduk);

	$gambar=$datakatalog['gambar_katalogproduk'];
	$katalogproduk->hapus_katalogproduk($id_katalogproduk);
	echo "<script>alert('Data berhasil dihapus');</script>";
	echo "<script>location='admin.php?halaman=katalog';</script>";
?>