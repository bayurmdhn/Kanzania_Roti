<?php  
include 'config/class.php';
$datapesanan = $pemesanan->tampil_pemesanan();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Keranjang Pesanan |  Kanzania Roti</title>
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
    <?php include 'header.php'; ?> 


 <section id="cart-view" style="margin-bottom: 50px;">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table" style="box-shadow: 5px 0px 5px 5px #e6e5e5;">
               <div class="table-responsive">
                  <table class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Produk</th>
                        <th class="text-center">Harga satuan</th>
                        <th class="text-center">Kuantitas</th>
                        <th class="text-center">Total Harga</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $total=0; ?>
                      <?php foreach ($datapesanan as $key => $value): ?>
                        <?php $total+=$value["subharga"]; ?>
                      <tr>
                        <td class="text-center"><?php echo $key+1 ?></td>
                        <td class="text-center"><?php echo $value['nama_katalogproduk']; ?></td>
                        <td class="text-center">Rp. <?php echo number_format($value['harga_katalogproduk']); ?></td>
                        <td class="text-center"><?php echo $value['jumlah']; ?></td>
                        <td class="text-center">Rp. <?php echo number_format($value['subharga']); ?></td>
                        <td class="text-center">
                        	<a href="hapuspesanan.php?id=<?php echo $value['id_katalogproduk'] ?>" class="bnt btn-danger btn-sm" ><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      
                      <?php endforeach ?>
                      <tr>
                        <td colspan="3"></td>
                        <td><strong>Total Belanja</strong></td>
                        <td>Rp. <?php echo number_format($total); ?></td>
                        <td></td>
                      </tr>
                      </tbody>
                  </table>
                  
                    <a href="pemesanan.php" class="btn btn-success btn-lg" style="margin-left: 650px">Lanjutkan Belanja</a>
                    <a href="checkoutpemesanan.php" class="btn btn-primary btn-lg" >Checkout</a>
                  
                  
                </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
    <?php include 'footer.php' ?>
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