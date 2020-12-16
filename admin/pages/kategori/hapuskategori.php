<?php  
	$id_kategori=$_GET['id'];
	$kategori->ambilkategori($id_kategori);

	$kategori->hapuskategori($id_kategori);
	echo "<script>alert('Kategori Terhapus');</script>";
	echo "<script>location='admin.php?halaman=kategori';</script>";
?>