<?php include 'config/class.php'; ?>
<?php 
if (!isset($_SESSION["pelanggan"])) 
{
  // echo "<script>alert('anda harus login');</script>";
  echo "<script>location='login.php';</script>";
  exit();
}
?>

<?php  
$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];

$datapelanggan=$pelanggan->tampil_pelanggan();
$databeli=$pembelian->tampilpembelianpelanggan($id_pelanggan);
$datapesan=$pemesanan->tampil_pemesananpelanggan($id_pelanggan)
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>User | Kanzania Roti</title>
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
  
  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="thumbnail" style="margin-top: 55px;">
            
            <div class="product-image" >
              <?php if (isset($_SESSION["pelanggan"]["gambar_pelanggan"])): ?>
              <img src="img_pelanggan/<?php echo $_SESSION['pelanggan']['gambar_pelanggan']; ?>" alt="" class="img-responsive" height="150">
            <?php endif ?>
            <?php if (empty($_SESSION["pelanggan"]["gambar_pelanggan"])): ?>
              <img src="img_pelanggan/user.jpg" alt="" class="img-responsive" height="150">
            <?php endif ?>
            </div>
            
          </div>
          <p class="text-info">Jika belum ada foto profil, silahkan ubah profil dan masukan foto!</p>
          <table class="table table-bordered">
            <tr>
              <td><strong>Nama</strong></td>
              <td><?php echo $_SESSION["pelanggan"]["nama_pelanggan"]; ?></td>
            </tr>
            <tr>
              <td><strong>Email</strong></td>
              <td><?php echo $_SESSION["pelanggan"]["email_pelanggan"]; ?></td>
            </tr>
            <tr>
              <td><strong>Alamat</strong></td>
              <td><?php echo $_SESSION["pelanggan"]["alamat_pelanggan"]; ?></td>
            </tr>
            <tr>
              <td><strong>Telepon</strong></td>
              <td><?php echo $_SESSION["pelanggan"]["telepon_pelanggan"]; ?></td>
            </tr>
          </table>
          <a href="edituser.php" class="btn btn-primary" style="margin-bottom: 20px; width: 100%; margin-top: -20px"><center>
             Edit Profil
          </center></a> 


        </div>

        <div class="col-md-9">
          <br>  
            <div class="panel panel-default">
              <div class="panel panel-body">
                <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Pemesanan</a></li>
            <li><a data-toggle="tab" href="#menu1">Pembelian</a></li>
          </ul>
          <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
              <label for="">Riwayat Pemesanan</label>
              <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Pemesanan</th>
                <th>Tanggal Dibutuhkan</th>
                <th>Jam</th>
                <th>Status</th>
                <th>Total Bayar</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($datapesan)): ?>               
                <tr>
                  <td colspan="7" class="alert alert-info"><h5 align="center">Anda belum melalukan pembelian</h5></td>
                </tr> 
              <?php endif ?>
              <?php if (isset($datapesan)): ?>
                <?php foreach ($datapesan as $key => $value): ?>
                  <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $value['tanggal_pemesanan']; ?></td>
                    <td><?php echo $value['tanggal_perlu']; ?></td>
                    <td><?php echo $value['jam_perlu']; ?></td>
                   
                      <?php  
              if ($value["status_pemesanan"]=='pending') {
                echo '<td><button class="btn btn-danger btn-xs"> '.$value["status_pemesanan"].'</button></td>';
              }
              elseif($value["status_pemesanan"]=='Diproses'){
                echo '<td><button class="btn btn-warning btn-xs"> '.$value["status_pemesanan"].'</button></td>';
              }
              elseif($value["status_pemesanan"]=='Selesai'){
               echo '<td><button class="btn btn-success btn-xs"> '.$value["status_pemesanan"].'</button></td>';
              }
              elseif($value["status_pemesanan"]=='Menunggu Konfirmasi'){
               echo '<td><button class="btn btn-warning btn-xs"> '.$value["status_pemesanan"].'</button></td>';
              }
              elseif($value["status_pemesanan"]=='Lunas'){
                echo '<td>'.$value["status_pemesanan"].'</td>';
              }

              ?>
                     
                    <td>Rp. <?php echo number_format($value['total_pemesanan']) ?></td>
                    <td>
                      <a href="notapemesanan.php?id=<?php echo $value['id_pemesanan']; ?>" class="btn btn-info btn-xs">Nota</a>
                      <a href="pembayaranpemesanan.php?id=<?php echo $value['id_pemesanan']; ?>" class="btn btn-success btn-xs">Pembayaran</a>
                    </td>
                  </tr>
                <?php endforeach ?>
              <?php endif ?>
            </tbody>
          </table>
        </div> 
        </div>

        <div id="menu1" class="tab-pane fade">
              <label for="">Riwayat Pembelian</label>
          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Pembelian</th>
                <th>Status</th>
                <th>Total Bayar</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($databeli)): ?>               
                <tr>
                  <td colspan="7" class="alert alert-info"><h5 align="center">Anda belum melalukan pembelian</h5></td>
                </tr> 
              <?php endif ?>
              <?php if (isset($databeli)): ?>
                <?php foreach ($databeli as $key => $value): ?>
                  <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $value['tanggal_pembelian']; ?></td>
                   
                      <?php  
              if ($value["status_pembelian"]=='pending') {
                echo '<td><button class="btn btn-danger btn-xs"> '.$value["status_pembelian"].'</button></td>';
              }
              elseif($value["status_pembelian"]=='Diproses'){
                echo '<td><button class="btn btn-warning btn-xs"> '.$value["status_pembelian"].'</button></td>';
              }
              elseif($value["status_pembelian"]=='Selesai'){
               echo '<td><button class="btn btn-success btn-xs"> '.$value["status_pembelian"].'</button></td>';
              }
               elseif($value["status_pembelian"]=='Menunggu Konfirmasi'){
               echo '<td><button class="btn btn-warning btn-xs"> '.$value["status_pembelian"].'</button></td>';
              }
              elseif($value["status_pembelian"]=='Lunas'){
                echo '<td>'.$value["status_pembelian"].'</td>';
              }
              ?>
                     
                    <td>Rp. <?php echo number_format($value['total_pembelian']) ?></td>
                    <td>
                      <a href="nota.php?id=<?php echo $value['id_pembelian']; ?>" class="btn btn-info btn-xs">Nota</a>
                      <a href="pembayaran.php?id=<?php echo $value['id_pembelian']; ?>" class="btn btn-success btn-xs">Konfirmasi Pembayaran</a>
                    </td>
                  </tr>
                <?php endforeach ?>
              <?php endif ?>
            </tbody>
          </table> 
        </div>
        </div>
            </div>
          
          
            
      </div>
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