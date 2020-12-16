
<?php  
$id_pembelian = $_GET["id"];
$datapembayaran = $pembayaran->ambil_pembayaran($id_pembelian);
$databeli=$pembelian->ambil_pembelian($id_pembelian);

?>
<!-- jika datapembayaran belum ada isinya(kosong)/pelanggan belum bayar -->
<section class="invoice">
	<h2>Data Pembayaran</h2>
<?php if (empty($datapembayaran)): ?>
	<div class="alert alert-danger">
		Pelanggan belum melakukan pembayaran
	</div>
<?php else: ?>
<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Id Pembelian</th>
				<td><?php echo $datapembayaran["id_pembayaran"]; ?></td>
			</tr>
			<tr>
				<th>Nama</th>
				<td><?php echo $datapembayaran["nama"]; ?></td>
			</tr>
			<tr>
				<th>Bank</th>
				<td><?php echo $datapembayaran["bank"]; ?></td>
			</tr>
			<tr>
				<th>Jumlah</th>
				<td>Rp. <?php echo number_format($datapembayaran["jumlah"]); ?></td>
			</tr>
			<tr>
				<th>Tanggal Bayar</th>
				<td><?php echo $datapembayaran["tanggalbayar"]; ?></td>
			</tr>
		</table>
		
	</div>
<div class="col-md-6">
			<img src="../img_bukti/<?php echo $datapembayaran['bukti'] ?>" alt="" width="300" height="350">
		</div>
</div>
<?php endif ?>


<?php if (!empty($datapembayaran)): ?>
	<?php if ($databeli["status_pembelian"]=="Selesai"): ?>
	<?php else: ?>
<form method="post">
	<div class="form-group">
		<label>Status</label>
		<select name="status" id="" class="form-control">
			<option value="">Pilih Status</option>
			<option value="Diproses">Diproses</option>
			<option value="Selesai">Selesai</option>
		</select>
	</div>
		
					<button class="btn btn-primary" onclick="return confirm('Apakah anda yakin')" name="proses">Proses</button>
</form>
	<?php endif ?>
<?php endif ?>
<?php 
	if (isset($_POST["proses"])) 
	{
		$pembelian->terima_pembelian($_POST["status"],$id_pembelian);
		echo "<script>alert('status pembelian sudah diubah');</script>";
		echo "<script>location='admin.php?halaman=pembelian';</script>";
	}	
?>

</section>