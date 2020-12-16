<section class="invoice">
	<div class="row">
		<div class="panel panel-body">
			<form method="post">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" class="form-control" name="nama" placeholder="Masukan Nama Pelangan" required>
				</div>
				<div class="form-group">
					<label>Nama Bank</label>
					<input type="text" class="form-control" name="bank" placeholder="Masukan Nama Pelangan" required>
				</div>
				<div class="form-group">
					<label>Nomor Rekening</label>
					<input type="text" class="form-control" name="norek" placeholder="Masukan Nama Pelangan" required>
				</div>
				<a href="admin.php?halaman=pengaturan" class="btn btn-danger"><i class="fa fa-history"></i> Kembali</a>
				<button class="btn btn-primary" name="simpan"><i class="fa fa-download"></i> Simpan</button>
			</form>
			<?php if (isset($_POST['simpan'])) {
				$hasil=$pengaturan->simpanpengaturan($_POST['nama'],$_POST['bank'],$_POST['norek']);
				if ($hasil=="sukses") {
					echo "<script>alert('Data Pengaturan Berhasil Disimpan')</script>";
					echo "<script>location='admin.php?halaman=pengaturan';</script>";
				}
				else
				{
					echo "<script>alert('Data pengaturan gagal disimpan, Mungkin nama dan nomor rekening sudah terdaftar pada sistem')</script>";
					echo "<script>location='admin.php?halaman=tambahpengaturan';</script>";
				}

			} ?>
		</div>
	</div>
</section>