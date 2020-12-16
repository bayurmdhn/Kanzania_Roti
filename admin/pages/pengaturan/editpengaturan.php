<?php  
$id_pgtrn=$_GET["id"];
$datapgtrn=$pengaturan->ambilpengaturan($id_pgtrn); 
?>

<section class="invoice">
	<div class="row">
	<div class="panel panel-body">
		<form method="post">
			<div class="form-group">
				<label>Nama</label>
				<input type="text" class="form-control" name="nama" value="<?php echo $datapgtrn['nama']; ?>" required>
			</div>
			<div class="form-group">
				<label>Nama Bank</label>
				<input type="text" class="form-control" name="bank" value="<?php echo $datapgtrn['bank']; ?>" required>
			</div>
			<div class="form-group">
				<label>Nomor Rekening</label>
				<input type="number" class="form-control" name="norek" value="<?php echo $datapgtrn['norek']; ?>" required>
			</div>
			<a href="admin.php?halaman=pengaturan" class="btn btn-danger"><i class="fa fa-history"></i> Kembali</a>
			<button class="btn btn-primary" name="edit"><i class="fa fa-download"></i> Ubah</button>
		</form>
		<?php  
		if (isset($_POST['edit'])) {
			$pengaturan->editpengaturan($_POST['nama'],$_POST['bank'],$_POST['norek'],$id_pgtrn);
			echo "<script>alert('Data berhasil dirubah');</script>";
			echo "<script>location='admin.php?halaman=pengaturan';</script>";
		}

		?>
	</div>
</div>
</section>