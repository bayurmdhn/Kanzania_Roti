<?php  
	$idp = $_GET['id'];
	$pengaturan->hapuspengaturan($idp);
	echo "<script>alert('Data pengaturan telah terhapus');</script>";
	echo "<script>location='admin.php?halaman=pengaturan';</script>";
?>