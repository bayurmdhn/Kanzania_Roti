<?php
  $dataproduk=$produk->produk_terbaru(); 
?>
<section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
              <p style="margin-top: -15px; color: #f66; font-size: 22px;">
            Produk Terbaru
          </p>
            <div class="aa-popular-category-area">
              <div class="tab-content">
                <div class="tab-pane fade in active" id="popular">
                  <ul class="aa-product-catg aa-popular-slider">
                       <?php foreach ($dataproduk as $key => $value): ?>
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img width="250px;" height="280px;" src="img_produk/<?php echo $value['gambar_produk']; ?>" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn" href="detail.php?id=<?php echo $value['id_produk'] ?>"><span class="fa fa-shopping-cart"></span>Beli</a>
                        <figcaption>
                          <h4 class="aa-product-title"><a href="#"><?php echo $value['nama_produk']; ?></a></h4>
                          <span class="aa-product-price">Rp. <?php echo number_format($value['harga_produk']); ?> / pcs</span>
                        </figcaption>
                      </figure>       
                      <div class="aa-product-hvr-content">
                      </div>
                    </li>                                                                                
                      <?php endforeach ?>               
                  </ul>
                </div>            
              </div>
            </div>
        </div> 
        </div>
      </div>
    </div>
  </section>