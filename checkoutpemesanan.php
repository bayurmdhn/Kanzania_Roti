<?php  
include 'config/class.php';
$datapesanan = $pemesanan->tampil_pemesanan();
$dataongkir=$ongkir->tampil_ongkir();
?>
<?php 
if (!isset($_SESSION["pelanggan"])) 
{
    echo "<script>alert('anda harus login dahulu');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}
?>
<?php 
$nama = $_SESSION['pelanggan']['nama_pelanggan'];
$telp = $_SESSION['pelanggan']['telepon_pelanggan'];
$alamat = $_SESSION['pelanggan']['alamat_pelanggan'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title> Checkout Pesanan | Kanzania Roti  </title>
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
    .yoi{margin-top: 230px;}
  </style>
<body>
	
<?php include 'header.php' ?>
  

  <main class="content">
  <div class="container">
    <div class="box  yoi">
      <div class="box-header" >
        <br>
        <br>
        <h3 align="center">Checkout Pemesanan</h3>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
	          <th class="text-center">No</th>
	          <th class="text-center">Nama Produk</th>
	          <th class="text-center">Harga satuan</th>
	          <th class="text-center">Kuantitas</th>
	          <th class="text-center">Total Harga</th>
          </tr>
        </thead>
        <tbody>
          <?php $totalbelanja=0; ?>
          <?php foreach ($datapesanan as $key => $value): ?>
          <?php $totalbelanja+=$value["subharga"] ?>
          <tr>
              <td class="text-center"><?php echo $key+1 ?></td>
              <td class="text-center"><?php echo $value['nama_katalogproduk']; ?></td>
              <td class="text-center">Rp. <?php echo number_format($value['harga_katalogproduk']); ?></td>
              <td class="text-center"><?php echo $value['jumlah']; ?></td>
              <td class="text-center">Rp. <?php echo number_format($value['subharga']); ?></td>
          </tr>
          <?php endforeach ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3"></th>
            <th>Total Belanja</th>
            <th id="">Rp. <?php echo number_format($totalbelanja); ?></th>
          </tr>
        </tfoot>
      </table>
        <form method="POST">
          <div class="col-md-6">
              <div class="form-group">
                <label>Nama penerima</label>
                <input type="text" class="form-control" name="nama" required="" value="<?php echo $nama; ?>">
              </div>
              <div class="form-group">
                <label>Telepon penerima</label>
                <input type="number" class="form-control" name="telepon" required="" value="<?php echo $telp; ?>">
              </div>
              
              <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" rows="3" class="form-control" required="" ><?php echo $alamat; ?></textarea>
              </div>
              
              <div class="form-group">
                <input type="hidden" name="total_belanja" value="<?php echo $totalbelanja; ?>" >
                <button class="btn btn-primary" name="checkoutpemesanan" style="width: 540px;">Check Out</button>
              </div>
            </div>
        
      <div class="col-md-6 ">
        <div class="form-group">
                <label for="">Tanggal Perlu</label>
                <input type="date" name="tglperlu" class="form-control" required=""> 
              </div>
              <div class="form-group">
                <label for="">Jam Perlu</label>
                <input type="time" name="jam_perlu" placeholder="Jam perlu roti anda " class="form-control" required=""> 
              </div>
              <div class="form-group">
                <label>Pengiriman</label>
                <div>
                  <select name="pengiriman" id="" class="form-control" required="">
                    <option value="">Pilih Pengiriman</option>
                    <option value="Ambil Sendiri">Ambil Sendiri</option>
                    <option value="Dikirim">Dikirim</option>
                  </select>
                </div>
              </div>
              <div class="form-group" id="kabupaten" style="display: none;">
                <label>Kabupaten</label>
                <div>
                  <select name="biaya"  class="form-control" >
                    <option value="">Pilih Kabupaten</option>
                    <?php foreach ($dataongkir as $key => $value): ?>
                      <option value="<?php echo $value['harga'] ?>"><?php echo $value['nama_kabupaten'] ?> - Rp.<?php echo $value['harga'] ?>,00</option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
          <div class="alert alert-info">
             <p>Yakinkan dengan produk pesanan anda, jangan lupa untuk mengecek jumlah yang anda inginkan!</p>
         </div>
     </div> 
     </form>    
    <?php 
      if (isset($_POST['checkoutpemesanan'])) 
      {
           $id_pemesanan=$pemesanan->checkout_pemesanan($_POST['nama'],$_POST['telepon'],$_POST['alamat'],$_POST['tglperlu'],$_POST['jam_perlu'],$_POST['total_belanja'],$_POST['pengiriman'],$_POST['biaya']);

           echo "<script>alert('Terima kasih telah melakukan pembelian, anda akan kami alihkan ke halaman nota');</script>";
           echo "<script>location='notapemesanan.php?id=$id_pemesanan';</script>";

      }
    ?>
      </div>
    </div>

  </div>
</main>



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
    <script>
      $(document).ready(function(){
        $("select[name=pengiriman]").change(function(){
          var kirim = $("option:selected").val();
          if(kirim=="Dikirim"){
            $("#kabupaten").show(500);
          }
          if(kirim=="Ambil Sendiri"){
            $("#kabupaten").hide(500);
          }
        })
      })
    </script>

</body>
</html>