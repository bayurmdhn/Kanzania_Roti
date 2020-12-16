
<?php  
$id_pemesanan = $_GET["id"];
$datapembayaranpesan = $pembayaran_pemesanan->ambil_pembayaranpemesanan($id_pemesanan);
$datapesan=$pemesanan->ambil_pemesanan($id_pemesanan);

?>
<!-- jika datapembayaran belum ada isinya(kosong)/pelanggan belum bayar -->
<section class="invoice">
	<h2>Data Pembayaran</h2>
<?php if (empty($datapembayaranpesan)): ?>
	<div class="alert alert-danger">
		Pelanggan belum melakukan pembayaran
	</div>
<?php else: ?>
<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Id Pembelian</th>
				<td><?php echo $datapembayaranpesan["id_pembayaranpemesanan"]; ?></td>
			</tr>
			<tr>
				<th>Nama</th>
				<td><?php echo $datapembayaranpesan["nama"]; ?></td>
			</tr>
			<tr>
				<th>Bank</th>
				<td><?php echo $datapembayaranpesan["bank"]; ?></td>
			</tr>
			<tr>
				<th>Jumlah</th>
				<td>Rp. <?php echo number_format($datapembayaranpesan["jumlah"]); ?></td>
			</tr>
			<tr>
				<th>Tanggal Bayar</th>
				<td><?php echo $datapembayaranpesan["tanggalbayar"]; ?></td>
			</tr>
		</table>
		
	</div>
<div class="col-md-6">
			<img src="../img_buktipemesanan/<?php echo $datapembayaranpesan['bukti'] ?>" alt="" width="300" height="350">
		</div>
</div>
<?php endif ?>


<?php if (!empty($datapembayaranpesan)): ?>
	<?php if ($datapesan["status_pemesanan"]=="Selesai"): ?>
	<?php else: ?>
<form method="post">
	<div class="form-group">
		<label>Status</label>
		<select name="status_pemesanan" id="" class="form-control">
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
		$pemesanan->terima_pemesanan($_POST["status_pemesanan"],$id_pemesanan);
		echo "<script>alert('status pemesanan sudah diubah');</script>";
		echo "<script>location='admin.php?halaman=pemesanan';</script>";
	}	
?>

</section>