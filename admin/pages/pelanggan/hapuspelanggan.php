<?php  
	$id_pelanggan=$_GET['id'];
	$datapelanggan=$pelanggan->ambil_pelanggan($id_pelanggan);

	$gambar=$datapelanggan['gambar_pelanggan'];
	$pelanggan->hapus_pelanggan($id_pelanggan);
	echo "<script>alert('Data berhasil dihapus');</script>";
	echo "<script>location='admin.php?halaman=pelanggan';</script>";


?>