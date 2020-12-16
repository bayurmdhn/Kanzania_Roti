
<hr>
<?php 
$id_pemesanan=$_GET['id']; 
$produkpemesanan=$pemesanan->tampilprodukpemesanan($id_pemesanan);
$detail=$pemesanan->ambil_pemesanan($id_pemesanan);
?>
<section class="invoice">
	<h2 class="text-center">Nota Pemesanan</h2>
<div class="row">
		<div class="col-md-4">
			<h3>Pembelian</h3>
			<p><strong>No</strong> 		: <?php echo $detail["id_pemesanan"]; ?></p>
			<p><strong>Tanggal</strong> 	: <?php echo $detail["tanggal_pemesanan"]; ?></p>
			<p><strong>Status</strong>	: <?php echo $detail["status_pemesanan"]; ?></p>
		</div>
		<div class="col-md-4">
			<h3>Pelanggan</h3>
			<p><strong>Nama</strong> : <?php echo $detail["nama_pelanggan"]; ?></p>
			<p><strong>Email</strong> : <?php echo $detail["email_pelanggan"]; ?></p>
			<p><strong>Telepon</strong> : <?php echo $detail["telepon_pelanggan"]; ?></p>
			<p><strong>Alamat</strong> : <?php echo $detail["alamat_pelanggan"]; ?></p>
		</div>
	</div>

<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subharga</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($produkpemesanan as $key => $value): ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value["nama_katalogproduk"]; ?></td>
			<td>Rp. <?php echo number_format($value["harga_katalogproduk"]); ?></td>
			<td><?php echo $value["jumlah_order"]; ?></td>
			<td>Rp. <?php echo number_format($value["subharga"]); ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="4">Total Pembelian</th>
			<th>Rp. <?php echo number_format($detail["total_pemesanan"]); ?></th>
		</tr>
	</tfoot>
</table>
</section>



