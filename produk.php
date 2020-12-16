
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

<section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                  <?php foreach ($dataproduk as $key => $value): ?>
                <li>
                  <figure>
                    <a class="aa-product-img" href="#"><img width="265" height="300" src="img_produk/<?php echo $value['gambar_produk']; ?>"></a>
                    <a class="aa-add-card-btn" href="detail.php?id=<?php echo $value['id_produk']; ?>"><span class="fa fa-shopping-cart"></span>Beli</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#"><?php echo $value['nama_produk']; ?></a></h4>
                      <span class="aa-product-price">Rp. <?php echo number_format($value['harga_produk']) ; ?> / pcs</span>
                       <p class="aa-product-descrip"><?php echo $value['deskripsi_produk'] ?></p>
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