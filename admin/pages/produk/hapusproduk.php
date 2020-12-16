<?php  
	$id_produk=$_GET['id'];
	$dataproduk=$produk->ambil_produk($id_produk);

	$gambar=$dataproduk['gambar_produk'];
	$produk->hapus_produk($id_produk);
	echo "<script>alert('Data berhasil dihapus');</script>";
	echo "<script>location='admin.php?halaman=produk';</script>";
?>