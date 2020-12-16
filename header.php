<?php  
$datakeranjang = $pembelian->tampil_keranjang();
$totkeranjang = $pembelian->totkeranjang();
$datapemesanan = $pemesanan->tampil_pemesanan();
$totpemesanan = $pemesanan->totpemesanan();
?>
<header id="aa-header" >
    <div class="aa-header-top" style="background: #f5b6b6">
      <div class="container" >
        <div class="row" >
          <div class="col-md-12" >
            <div class="aa-header-top-area">
              <div class="aa-header-top-left" style="color: #fff">
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-envelope-o"></span>kanzaniaroti@gmail.com</p>
                </div>
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-map-marker"></span>Yogyakarta, Inc</p>
                </div>
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>0812-2757-2722</p>
                </div>
              </div>
              <div class="aa-header-top-right" >
                <ul class="aa-head-top-nav-right" >
                  <?php if (!isset($_SESSION['pelanggan'])): ?>
                    <li><a href="login.php" style="color: #fff"><i class="fa fa-sign-in" style="color: #fff"></i> Login</a></li>
                  <li><a href="daftar.php" style="color: #fff"><i class="fa fa-user-plus" style="color: #fff"></i> Daftar</a></li>
                <?php else: ?>
                  <li><a href="user.php" style="color: #fff"><i class="fa fa-user" style="color: #fff"></i> Akun Saya</a></li>
                    <li><a href="logout.php" style="color: #fff"><i class="fa fa-sign-in" style="color: #fff"></i> Logout</a></li>
                  <?php endif ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <div class="aa-logo">
                <a href="./">
                  <img width="150" src="logo/kanzania.png" alt="">
                </a>
              </div>

              <div class="aa-cartbox" style="margin-top: 25px;" >
                <a class="aa-cart-link" href="#">
                  <span class="fa fa-shopping-basket" style="color: #FF8099;"></span>
                  <span class="aa-cart-title">Keranjang Pemesanan</span>
                  <?php if (empty($totpemesanan)): ?>
                    <?php else: ?>
                  <span class="aa-cart-notify"><?php echo $totpemesanan; ?></span>
                  <?php endif ?>
                </a>
                <div class="aa-cartbox-summary">
                  <ul>
                    <?php $total=0; ?>
                    <?php foreach ($datapemesanan as $key => $value): ?>
                      <?php $total+=$value["subharga"]; ?>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="img_katalogproduk/<?php echo $value['gambar_katalogproduk']; ?>" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#"><?php echo $value['nama_katalogproduk']; ?></a></h4>
                        <p><?php echo $value['jumlah']; ?> x Rp. <?php echo $value['harga_katalogproduk']; ?></p>
                      </div>
                      <a class="aa-remove-product" href="hapuspesanan.php?id=<?php echo $value['id_katalogproduk'] ?>"><span class="fa fa-times"></span></a>
                    </li>
                    <?php endforeach ?>
                                        
                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        Rp. <?php echo $total; ?>
                      </span>
                    </li>
                  </ul>
                  <a class="btn btn-primary" href="viewpemesanan.php"><i class="fa fa-shopping-cart"></i> Lihat Pemesanan</a>
                  <a class="btn btn-primary" href="checkoutpemesanan.php">Checkout <i class="fa fa-arrow-right"></i></a>
                </div>
              </div>

              <div class="aa-cartbox" style="margin-top: 25px;" >
                <a class="aa-cart-link" href="#">
                  <span class="fa fa-shopping-basket" style="color: #FF8099;"></span>
                  <span class="aa-cart-title">Keranjang Pembelian</span>
                  <?php if (empty($totkeranjang)): ?>
                    <?php else: ?>
                  <span class="aa-cart-notify"><?php echo $totkeranjang; ?></span>
                  <?php endif ?>
                </a>
                <div class="aa-cartbox-summary">
                  <ul>
                    <?php $total=0; ?>
                    <?php foreach ($datakeranjang as $key => $value): ?>
                      <?php $total+=$value["subharga"]; ?>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="img_produk/<?php echo $value['gambar_produk']; ?>" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#"><?php echo $value['nama_produk']; ?></a></h4>
                        <p><?php echo $value['jumlah']; ?> x Rp. <?php echo $value['harga_produk']; ?></p>
                      </div>
                      <a class="aa-remove-product" href="hapuskeranjang.php?id=<?php echo $value['id_produk'] ?>"><span class="fa fa-times"></span></a>
                    </li>
                    <?php endforeach ?>
                                        
                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        Rp. <?php echo $total; ?>
                      </span>
                    </li>
                  </ul>
                  <a class="btn btn-primary" href="cart.php"><i class="fa fa-shopping-cart"></i> Lihat Keranjang</a>
                  <a class="btn btn-primary" href="checkout.php">Checkout <i class="fa fa-arrow-right"></i></a>
                </div>
              </div>
              <div class="aa-search-box" style="margin-top: 30px; margin-left: 30px;">
                <form action="">
                  <input type="text" name="" id="" placeholder="Cari produk yang kamu mau ">
                  <button type="submit" style="background: #F5B6B6;"><span class="fa fa-search"></span></button>
                </form>
              </div>          
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <section id="menu" style="background: #f5b6b6">
    <div class="container">
      <div class="menu-area">
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="./">Home</a></li>
              <li><a href="semuaproduk.php">Pembelian</a></li>
              <li><a href="pemesanan.php">Pemesanan</a></li>
              <li><a href="tentangkami.php">Tentang Kami</a></li> 
              <li><a href="hubungikami.php">Hubungi Kami</a></li>
            </ul>
          </div>
        </div>
      </div>       
    </div>
  </section>