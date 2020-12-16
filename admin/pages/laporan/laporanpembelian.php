<?php  
include '../../../config/class.php'; 
$bulan=$_GET['bulan'];
$tahun=$_GET['tahun'];
$data=$laporan->laporanpembelian($bulan,$tahun);
date_default_timezone_set("Asia/Jakarta");
$tgl= date("Y-m-d");	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Laporan Pembelian</title>
<link rel="icon"  href="../../../logo/kanzania.png">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/menikah.css">
</head>
<body>
<div class="kop" >
<div class="row">
<div class="container">
<div class="pull-left">
<img src="../../../logo/kanzania.png" alt="" class="img-responsive" style="height: 100px; width: 100px;">
</div>
<div class="judul">
<center>
<h2 style="margin-bottom: -17px;" align="center">Kanzania Roti</h2>
<h3 align="center">Mejing Wetan 09/07,Ambarketawang,Gamping</h3>
<h4 align="center">Sleman,Yogyakarta</h4>
<br><br>
</center>
</div>	
<hr size="10">
</div>
</div>
<div class="no">
<div class="row">
<div class="container">
<center>	
<table border="0" width="750">
<tr>
<td colspan="3">
<center>
<h5>
<strong><u>Laporan Penjualan Pembelian</u></strong><br><br>	
</h5>
</center>
</td>
<td></td>
<td></td>

</tr>
<tr>
<td>
<?php if (empty($bulan)): ?>
<span style="margin-left: 20px;">Pertahun <?php echo $pertahun ?></span><br><br>	
<?php endif ?>
<?php if (isset($bulan) AND empty($pertahun)): ?>
<span style="margin-left: 20px;">Perbulan <?php echo $bulan ?>, Tahun <?php echo $tahun ?></span><br><br>	
<?php endif ?>
</td>
<td></td>
<td></td>
</tr>
<tr>
<td >
	<?php if (empty($data)): ?>
		<div class="alert alert-danger">
			<p>Belum ada pembelian pada bulan <?php echo $bulan; ?> dan Tahun <?php echo $tahun; ?></p>
		</div>
	<?php else: ?>
<table border="0" class="table table-striped table-bordered table-hover" style="margin-left: 20px;">
<thead>
<tr>
<td>No</td>
<td>Tanggal Pembelian</td>
<td>Nama Produk</td>
<td>Harga Produk</td>
<td>Harga Modal</td>
<td>Jumlah Produk</td>
<td>Total Belanja</td>
</tr>
</thead>
<tbody>
	<?php $tot_s=0; ?>
	<?php $tot_b=0; ?>
<?php foreach ($data as $key => $value): ?>
	<?php  
	$tot_b += $value['subharga_produk'];
	$hrg_m = $value['harga_modal'];
	$jml = $value['jumlah_produk'];
	$tot_m = $hrg_m * $jml;
	$tot_s += $tot_m;
	$keuntungan = $tot_b - $tot_s;

	?>
<tr>
<td><?php echo $key+1 ?></td>
<td><?php echo $value['tanggal_pembelian'] ?></td>
<td><?php echo $value['nama_produk'] ?></td>
<td><?php echo $value['harga_produk'] ?></td>
<td><?php echo $value['harga_modal'] ?></td>
<td><?php echo $value['jumlah_produk'] ?></td>
<td><?php echo $value['subharga_produk'] ?></td>
</tr>
<?php endforeach ?>

</tbody>
<tfoot>
	<tfoot>
		<tr>
            <th colspan="6">Total Pembelian</th>
            <th id="">Rp. <?php echo number_format($tot_b); ?></th>
          </tr>
		<tr>
            <th colspan="6">Total Modal</th>
            <th id="">Rp. <?php echo number_format($tot_s); ?></th>
          </tr>
          <tr>
            <th colspan="6">Total Keuntungan</th>
            <th >Rp. <?php echo number_format($keuntungan); ?></th>
          </tr>
        </tfoot>
</tfoot>
</table>
</td>
<td></td>
<td></td>
</tr>
<tr>	
<td colspan="3">
<span style="margin-left: 580px;">Yogyakarta, <?php echo $tgl ?></span><br>	
<span style="margin-left: 600px;"> Kepala Perusahaan</span><br><br><br><br><br>	
</td>
<td></td>
<td></td>
</tr>

<tr>
<td colspan="3">
<span style="margin-left: 600px;"><u>Ir.Dwi puji Wankholis</u></span><br>
<span style="margin-left: 600px;">NIP : ...................</span>	
</td>	
<td></td>
<td></td>
</tr>
</table>
<?php endif ?>
</center>
</div>
</div>
</div>
<script>
window.load=print_d();
function print_d(){
window.print();
}
</script> 
</body>
</html> 