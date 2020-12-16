<?php  
	include 'config/class.php';
	$id_kategori=$_GET["id"];
	$produkkategori=$produk->produk_kategori($id_kategori);
	$datakategori=$kategori->ambilkategori($id_kategori);
	$nama_kategori=$datakategori["nama_kategori"];
?>
<?php  

    $batas=6;
        if (isset($_GET["page"]) AND !empty($_GET["page"])) 
        {
            $posisi = ($_GET["page"]-1)*$batas;
        }
        else
        {
            $posisi = 0;
            $_GET["page"]= 1;
        }
    $dataproduk=$produk->tampil_produkterbaru($posisi,$batas);
    $datakategori=$kategori->tampilkategori();
    $produkterlaris=$produk->produk_terlaris();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Kategori Produk | Kanzania Roti</title>
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

		

  <section id="aa-product-category" style="margin-bottom: 70px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">	
            <p style="margin-top: -15px; color: #f66; font-size: 22px;">
            Produk Terkait : 
            <?php if (!empty($produkkategori)): ?>
              
            <?php echo $nama_kategori ?>
            <?php elseif(empty($produkkategori)):?> 
             <?php echo $nama_kategori ?> Belum Tersedia
            <?php endif ?>
          </p>
				<hr style="margin-top: 1px; border-color: #f66;">	
	            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                  <?php foreach ($produkkategori as $key => $value): ?>
                <li>
                  <figure>
                    <a class="aa-product-img" href="#"><img width="265" height="300" src="img_produk/<?php echo $value['gambar_produk']; ?>" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn" href="detail.php?id=<?php echo $value['id_produk']; ?>"><span class="fa fa-shopping-cart"></span>Pesan</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#"><?php echo $value['nama_produk']; ?></a></h4>
                      <span class="aa-product-price">Rp. <?php echo number_format($value['harga_produk']) ; ?> / pcs</span>
                       <p class="aa-product-descrip">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam accusamus facere iusto, autem soluta amet sapiente ratione inventore nesciunt a, maxime quasi consectetur, rerum illum.</p>
                    </figcaption>
                  </figure>                         
                  
                </li>  
                 <?php  
                                $nomor=$key+1;
                                if (($key+1)%6==0) {
                                    echo "<div class='clearfix'></div>";
                                }
                            ?>
                            <?php endforeach ?>                                   
              </ul>                
               
            </div>
            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <?php 
                            $banyakproduk=$produk->total_produk();
                            $banyakpage=ceil($banyakproduk/$batas);
                            for ($mulai=1; $mulai<=$banyakpage; $mulai++) 
                            {
                                echo "<li><a href='index.php?page=$mulai'>$mulai</a></li>";
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
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <div class="aa-sidebar-widget">
              <h3>Kategori</h3>
              <ul class="aa-catg-nav">
                <?php foreach ($datakategori as $key => $value): ?>
                <li><a href="produkkategori.php?id=<?php echo $value['id_kategori'];?>"><?php echo $value['nama_kategori']; ?></a></li>
      <?php endforeach ?>
              </ul>
            </div>
 
            <div class="aa-sidebar-widget">
              <h3>Produk Terlaris</h3>
              <div class="aa-recently-views">
                <ul>
                  <?php foreach ($produkterlaris as $key => $value): ?>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img_produk/<?php echo $value['gambar_produk']; ?>"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#"><?php echo $value['nama_produk']; ?></a></h4>
                      <p>Rp. <?php echo number_format($value['harga_produk']); ?></p>
                    </div>                    
                  </li> 
                  <?php endforeach ?>                                     
                </ul>
              </div>                            
            </div>
          </aside>
        </div>
       
      </div>
    </div>
  </section>		
<?php include 'footer.php'; ?> 
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