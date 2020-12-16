<?php  
include 'config/class.php';
$id_produk = $_GET['id'];
$detail=$produk->ambil_produk($id_produk);
$dataproduk=$produk->produk_terbaru();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Detail Produ | kKanzania Roti </title>
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
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <?php include 'header.php'; ?>
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12"  >
          <div class="aa-product-details-area">
            <div class="jumbotron" >
              <div class="row">
                <div class="col-md-5 ">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a data-lens-image="img_produk/<?php echo $detail['gambar_produk'];?>" class="simpleLens-lens-image"><img src="img_produk/<?php echo $detail['gambar_produk'];?>" class="simpleLens-big-image" width="250px;" height="280px;" ></a></div>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="aa-product-view-content">
                    <h2><?php echo $detail['nama_produk']; ?></h2>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price"><strong>Rp. <?php echo number_format($detail['harga_produk']); ?></strong></span><br><br>
                      <p><?php echo $detail['deskripsi_produk']; ?></p>
                      <p class="aa-product-avilability">Kategori: <a href="#" style="color: #FF8099;"><?php echo $detail['nama_kategori']; ?></a></p>
                    </div>

                                    
                  </div>
                </div>
                  
                <div class="col-md-3" style="margin-left: -50px;">
                  <div class="alert alert-info" >
             <p>Produk siap beli tersedia max 10pcs per produk</p>
                </div>
                  <div class="aa-prod-quantity">
                      <form action="" method="post">
                        <div class="form-group">
                          <input type="" name="jumlah" style="width: 300px" class="form-control" placeholder="jumlah yang anda ingin beli " required="">
                        </div>
                        <button class="btn btn-primary" name="pesan" style=" width: 300px">Beli</button>
                        <div class="form-group">
                   <?php 
                    if (isset($_POST['pesan'])) {
                      $jumlah = $_POST['jumlah'];
                        if ($jumlah > 10) {
                          echo "<script>alert('makasimal pembelian 10 pcs');</script>";
                        }
                          else
                          {
                            $pembelian->masukkan_keranjang($id_produk,$jumlah);
                      echo "<script>alert('Masukkan produk ke keranjang');</script>";
                      echo "<script>location='cart.php'</script>";
                          }
                    }
                     ?> 
                    </div>    
                </div>
              </div>
            </div>
            <br>
            <hr>
            
            
          </div>
          <?php include 'newproduk.php'; ?>  
        </div>
      </div>
    </div>
  </section>
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