<?php
 include 'config/class.php';
 $batas=10;
        if (isset($_GET["page"]) AND !empty($_GET["page"])) 
        {
            $posisi = ($_GET["page"]-1)*3;
        }
        else
        {
            $posisi = 0;
            $_GET["page"]= 1;
        }
$datakatalog = $katalogproduk->tampil_katalogprodukbaru($posisi,$batas);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Pemesanan | Kanzania Roti</title>
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
    .naik
    {
      margin-top: -130px;
    }
    /*.peme
    {
      margin-top: -80px;
    }*/
  </style>
  <body> 

    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  
  <?php include 'header.php'; ?>

<section id="aa-product-category">
    <div class="container">
      <div class="row">
       <div class="col-md-12">
        <br>
  <h2>Pemesanan</h2>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Formulir Pemesanan</a></li>
    <li><a data-toggle="tab" href="#menu1">Cara Pemesanan</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <form action="" method="post">
      <div class="form-group">
        <label for="">Pilih Nama Produk</label>
        <select for="" class="form-control" name="id_katalogproduk">
          <option value=""> Pilih nama produk </option>
<?php foreach ($datakatalog as $key => $value): ?>
  
          <option value="<?php echo $value['id_katalogproduk']; ?>"><?php echo $value['nama_katalogproduk']; ?></option>
<?php endforeach ?>
        </select>

      </div>  
      <div class="form-group">
        <label for="">Jumlah Pesanan</label>
        <input type="number" name="jumlah" class="form-control" placeholder="Masukan jumlah order" required="">
      </div>
      <button class="btn btn-primary" name="submit" >Pesan</button>
      </form>

      <?php  
      if (isset($_POST['submit'])) 
      {
        $jumlah = $_POST['jumlah'];
        if ($jumlah < 10 ) {
          echo "<script>alert('minimal pemesanan 10 pcs')</script>";
        } else {
        $pemesanan->masukanpesanan($_POST['id_katalogproduk'],$_POST['jumlah']);
                  echo "<script>alert('Pesanan anda masuk ke keranjang pesanan!');</script>";
                  echo "<script>location='viewpemesanan.php';</script>";
                }
      }
      ?>
      <div class="aa-product-catg-content">
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                  <?php foreach ($datakatalog as $key => $value): ?>
                <li>
                  <figure>
                    <a class="aa-product-img" href="#"><img width="180" height="200" src="img_katalogproduk/<?php echo $value['gambar_katalogproduk']; ?>"></a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#"><?php echo $value['nama_katalogproduk']; ?></a></h4>
                      <p><?php echo $value['deskripsi_katalog']; ?></p>
                      <span class="aa-product-price">Rp. <?php echo number_format($value['harga_katalogproduk']) ; ?> / pcs</span>
                    </figcaption>
                  </figure>                         
                  
                </li>  
                 <?php  
                  $nomor=$key+1;
                   if (($key+1)%10==0) {
                   echo "<div class='clearfix'></div>";
                                }
                 ?>
                 <?php endforeach ?>                                   
              </ul>                
               
            </div>
            <div class="aa-product-catg-pagination naik">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <?php 
                            $banyakproduk=$katalogproduk->total_katalogproduk();
                            $banyakpage=ceil($banyakproduk/$batas);
                            for ($mulai=1; $mulai<=$banyakpage; $mulai++) 
                            {
                                echo "<li><a href='pemesanan.php?page=$mulai'>$mulai</a></li>";
                            }
                            ?>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Langkah 1</h3>
      <p>Silahkan pilih produk yang ingin anda pesan</p>
      <div class="jumbotron">
      <center><img src="imgku/carapesan1.png" alt="" width="1000px" height="500px"></center>
    </div>
      <h3>Langkah 2</h3>
      <p>Pilihlah produk sesuai nama produknya</p>
      <div class="jumbotron">
      <center><img src="imgku/carapesan2.png" alt="" width="1000px"></center>
    </div>
      <h3>Langkah 3</h3>
      <p>Isikan jumlah pesanan anda</p>
      <div class="jumbotron">
      <center><img src="imgku/carapesan3.png" alt=""  width="1000px"></center>
    </div>
      <h3>Langkah 4</h3>
      <p>Klik pesan untuk melanjut kelangkah selanjutnya</p>
      <div class="jumbotron">
      <center><img src="imgku/carapesan4.png" alt="" width="1000px"></center>
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