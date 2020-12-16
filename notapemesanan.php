<?php include 'config/class.php'; ?>
<?php 
$id_pemesanan=$_GET['id']; 
$produkpemesanan=$pemesanan->tampil_produk_pemesanan($id_pemesanan);
$detail=$pemesanan->ambil_pemesanan($id_pemesanan);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Nota pemesanan | Kanzania Roti  </title>
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
  <body>

  	<?php include'header.php' ?>
  	
<div class="header-area">
    <div class="container">
        <div class="row">
        </div>
    </div>
</div>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Data Pemesanan</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="content">
  <div class="container">
     <div class="section-title">
        <h3>Nota Pemesanan #1</h3>
    </div>

    <div class="row">
        <div class="col-md-3">
           <h5>Kanzania Roti</h5>
           <p><strong>Kanzania Roti, Inc.</strong>
              <br>Mejing Wetan, Sleman
              <br>Yogyakarta, 55782
              <br>WA: 0857-1223-5432
              <br>Email: kanzania@gmail.com</p>
          </div>
          <div class="col-md-3">
              <h5>Pemesanan</h5>
              <p>
                 <strong>Nomor Pemesanan: <?php echo $detail["id_pemesanan"]; ?></strong><br>
                 Tanggal  <?php echo $detail["tanggal_pemesanan"]; ?><br>

                 Status       <?php  
              if ($detail["status_pemesanan"]=='pending') {
                echo '<button class="btn btn-danger btn-xs"> '.$detail["status_pemesanan"].'</button>';
              }
              elseif($detail["status_pemesanan"]=='Diproses'){
                echo '  <button class="btn btn-warning btn-xs"> '.$detail["status_pemesanan"].'</button>';
              }
              elseif($detail["status_pemesanan"]=='Selesai'){
               echo '<button class="btn btn-success btn-xs"> '.$detail["status_pemesanan"].'</button>';
              }
              elseif($detail["status_pemesanan"]=='Menunggu Konfirmasi'){
               echo '<button class="btn btn-warning btn-xs"> '.$detail["status_pemesanan"].'</button>';
              }
              elseif($detail["status_pemesanan"]=='Lunas'){
                echo '<td>'.$value["status_pemesanan"].'</td>';
              }
              ?><br>
             </p>
         </div>
         <div class="col-md-3">
          <h5>Pelanggan</h5>
          <p>
             <strong><?php echo $detail["nama_pelanggan"]; ?></strong><br>
             <?php echo $detail["email_pelanggan"]; ?><br>
             <?php echo $detail["telepon_pelanggan"]; ?><br>
             <?php echo $detail["alamat_pelanggan"]; ?><br>
         </p>
     </div>
     <div class="col-md-3">
      <h5>Pengiriman ke</h5>
      <p>
         <strong><?php echo $detail["nama_pemesan"]; ?></strong><br>
         <?php echo $detail["telp_pemesan"]; ?><br>
         <?php echo $detail["alamat_pemesan"]; ?><br>
         <?php echo '<button class="btn btn-success btn-xs"> '.$detail["pengiriman"].'</button>'; ?>
     </p>
 </div>
</div>
<div class=" table-responsive">
   <table class="table table-bordered table-hover table-striped">
      <thead>
         <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subharga</th>
        </tr>
    </thead>
    <tbody>
      <?php foreach ($produkpemesanan as $key => $value): ?>

         <tr>
            <td><?php echo $value["nama_katalogproduk"]; ?></td>
            <td>Rp. <?php echo number_format($value["harga_katalogproduk"]); ?></td>
            <td><?php echo $value["jumlah_order"]; ?></td>
            <td>RP. <?php echo number_format($value["subharga"]); ?></td>
        </tr>
    <?php endforeach ?>
</tbody>
</table>
</div>

<div class="row">
   <div class="col-md-6 col-md-push-6">
      <table class="table">
         <tbody>
        <tr>
            <th>Total Belanja</th>
            <th><?php echo $detail["total_belanja"] ?></th>
        </tr>
        <tr>
            <th>Total Ongkir</th>
            <th><?php echo $detail["harga_pengiriman"]; ?></th>
        </tr>
        <?php  
          $ongkir=$detail["harga_pengiriman"];
          $bayar=$detail["total_belanja"];
          $total=$bayar+$ongkir;
        ?>
        <tr>
            <th>Total Bayar (Pemesanan)</th>
            <th><?php echo $total ?></th>
        </tr>
        
        <tr>
           <td><a href="pembayaranpemesanan.php?id=<?php echo $value['id_pemesanan']; ?>" class="btn btn-primary">Konfirmasi Pembayaran</a></td>
           <th></th>

       </tr>
   </tbody></table>
</div>
<div class="col-md-6 col-md-pull-6">
  <div class="alert alert-info">
    <p><strong>Terimakasih telah melakukan pemesanan di Kazania</strong>, Untuk menyelesaikan proses pemesanan anda </p><ul><li>silahkan melakukan pembayaran dengan cara Transfer ke rekening Mandiri 137-001-88-3276 A.N <strong>Arif Nur Rohman</strong></li> 
         <li>Total tagihan pembayaran pesanan anda adalah <strong>Rp. <?php echo number_format($detail["total_pemesanan"]); ?></strong></li>
         <li>Segera lakukan pembayaran dan konfirmasi jika sudah melakukan pembayaran pesanan,<strong> waktu pembayaran anda berahir pada: <?php echo $detail["deadline_pembayaran"] ; ?>, jika tidak melakukan pembayaran maka pemesanan akan kami batalkan.</strong></li></ul><p></p>
     </div>
 </div>
</div>
</div>
</section>
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