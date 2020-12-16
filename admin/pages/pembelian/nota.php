
<hr>
<?php 
$id_pembelian=$_GET['id']; 
$produkpembelian=$pembelian->tampilprodukpembelian($id_pembelian);
$detail=$pembelian->ambil_pembelian($id_pembelian);


?>
<section class="invoice">
	<h2 class="text-center">Nota Pembelian</h2>
<div class="row">
		<div class="col-md-4">
			<h3>Pembelian</h3>
			<p><strong>No</strong> 		: <?php echo $detail["id_pembelian"]; ?></p>
			<p><strong>Tanggal</strong> 	: <?php echo $detail["tanggal_pembelian"]; ?></p>
			<p><strong>Status</strong>	: <?php echo $detail["status_pembelian"]; ?></p>
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
		<?php foreach ($produkpembelian as $key => $value): ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value["nama_produk"]; ?></td>
			<td>Rp. <?php echo number_format($value["harga_produk"]); ?></td>
			<td><?php echo $value["jumlah_produk"]; ?></td>
			<td>Rp. <?php echo number_format($value["subharga_produk"]); ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="4">Total Pembelian</th>
			<th>Rp. <?php echo number_format($detail["total_pembelian"]); ?></th>
		</tr>
	</tfoot>
</table>
</section>



