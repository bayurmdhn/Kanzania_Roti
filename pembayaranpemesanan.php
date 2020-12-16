<?php 
include 'config/class.php'; 
?>
<?php 
$id_pemesanan=$_GET["id"]; 
$datahasilcek=$pemesanan->cek_pembayaranpemesanan($id_pemesanan);
$datapesan=$pemesanan->ambil_pemesanan($id_pemesanan);
?>
<?php $tgl = $datapesan['tanggal_pemesanan']; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title> Pembayaran Pesanan | Kanzania Roti</title>
    <link rel="icon"  href="logo/kanzania.png"> 
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet"> 
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">  
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <link id="switcher" href="css/theme-color/default-theme.css" rel="stylesheet">
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">
    <link href="css/style.css" rel="stylesheet">    
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
  </head>
  <style>
  	.yoi
  	{
  		margin-top: 20px;
  	}
  </style>
  <body>
  	<?php include'header.php' ?>
  	<div class="container">
		<?php if ($datahasilcek=="belumkirim"): ?>
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6 col-lg-offset-3">
						<div class="panel panel-default yoi" >
							<?php  
					          $ongkir=$datapesan["harga_pengiriman"];
					          $bayar=$datapesan["total_belanja"];
					          $total=$bayar+$ongkir;
					        ?>
							<div class="panel panel-heading" style="background-color:#FF6666; color: #fff;" >
								<h3>Konfirmasi Pembayaran - Total Pemabayaran Pemesanan Rp.  <?php echo number_format($total); ?>,00</h3>
							</div>
							<div class="panel panel-body">
								<form method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label>Nama</label>
										<input type="text" class="form-control" name="nama" placeholder="nama sesuai nama pada rekening BANK anda" required="">
									</div>	
									<div class="form-group">
										<label>BANK</label>
										<input type="text" class="form-control" name="bank" placeholder="nama BANK anda sesuai rekening anda" required="">
									</div>
									<div class="form-group">
										<label>Tanggal Pembayaran</label>
										<input type="datetime" class="form-control" name="tanggal" required="" value="<?php echo $tgl; ?>" >
									</div>
									<div class="form-group">
										<label>Jumlah (Rp).</label>
										<input type="number" class="form-control" name="jumlah" placeholder="masukan sesuai jumlah tagihan" value="<?php echo $total; ?>" >
									</div>
									<div class="form-group">
										<label>Bukti</label>
										<input type="file" class="form-control" name="bukti" required="">
										<p>Foto wajib jpg maksimal 2mb</p>
									</div>
									<button class="btn btn-primary" name="kirim">kirim</button>
									<a href="pemesanan.php" class="btn btn-danger">Kembali</a>
								</form>
								<?php  
								if (isset($_POST['kirim'])) 
								{
									$pembayaran_pemesanan->kirim_pembayaranpemesanan($_POST['nama'],$_POST['bank'],$_POST['tanggal'],$_POST['jumlah'],$_FILES['bukti'],$id_pemesanan);
									echo "<script>alert('Pembayaran anda berhasil, mohon tunggu! ');</script>";
									echo "<script>location='user.php';</script>";
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php else: ?>

				<div class="row">
					<div class="col-md-12">
						<div class="col-md-6" style="margin-top: 40px;">
							<table class="table table-bordered table-hover table-striped">
							<tr>
								<td>ID Pemesanan</td>
								<th><?php echo $datahasilcek["id_pemesanan"]; ?></th>
							</tr>
							<tr>
								<td>Nama</td>
								<th><?php echo $datahasilcek['nama']; ?></th>
							</tr>
							<tr>
								<td>Bank</td>
								<th><?php echo $datahasilcek["bank"]; ?></th>
							</tr>
							<tr>
								<td>Tanggal Bayar</td>
								<th><?php echo $datahasilcek["tanggalbayar"]; ?></th>
							</tr>
							<tr>
								<td>Jumlah</td>
								<th>Rp. <?php echo number_format($datahasilcek['jumlah']); ?></th>
							</tr>
							<tr>
								<td>Bukti</td>
								<th>Rp. <?php echo number_format($datahasilcek['jumlah']); ?></th>
							</tr>
						</table>
						</div>
						<div class="col-md-3" style="margin-top: 40px;">
						<p style="margin-top: -14px;"><strong>Bukti Pembayaran</strong></p>
						<img src="img_buktipemesanan/<?php echo $datahasilcek['bukti'] ?>" alt=""  width="350" height="178">
					</div>
					</div>
				</div>
			</div>
		<?php endif ?>
</div>
	<?php include'footer.php' ?>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>  
  <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
  <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>
  <script src="js/sequence.js"></script>
  <script src="js/sequence-theme.modern-slide-in.js"></script>  
  <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
  <script type="text/javascript" src="js/slick.js"></script>
  <script type="text/javascript" src="js/nouislider.js"></script>
  <script src="js/custom.js"></script> 
  </body>
  </html>