<?php 
    include 'config/class.php'; 
    $id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];
    $datapelanggan=$pelanggan->ambil_pelanggan($id_pelanggan);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Edit User | Kanzania Roti</title>
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
    <div class="row">
        
    </div>
  <section class="content">
    <div class="container">

      <div class="row">
        <div class="col-md-3">
                <h1 style="margin-left: 0px; margin-top: 60px;">Edit Profil</h1>
          <div class="thumbnail" style="margin-top: 20px;">
            
            <div class="product-image" >
              <?php if (isset($_SESSION["pelanggan"]["gambar_pelanggan"])): ?>
              <img src="img_pelanggan/<?php echo $_SESSION['pelanggan']['gambar_pelanggan']; ?>" alt="" height="150">
            <?php endif ?>
            <?php if (empty($_SESSION["pelanggan"]["gambar_pelanggan"])): ?>
              <img src="img_pelanggan/user.jpg" alt="" class="img-responsive" height="150">
            <?php endif ?>
            </div>
            
          </div>
          
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
          
        </div>
        <div class="col-md-9">
            <main class="content">
    <div class="container" style="margin-top: 55px;">
        <div class="row">
            
            <div class="col-md-12 col-md-pull-1">
                <div class="box">
                    <div class="box-body">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">

                                <label class="control-label col-md-2">Nama</label>
                                <div class="col-md-8">
                                    <input type="text" name="nama" class="form-control" value="<?php echo $datapelanggan['nama_pelanggan'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Email</label>
                                <div class="col-md-8">
                                    <input type="text" name="email" class="form-control" value="<?php echo $datapelanggan['email_pelanggan'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Password</label>
                                <div class="col-md-8">
                                    <input type="password" name="pass" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Password</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                    <input type="password" name="password" class="form-control" placeholder="Ulangi Password" aria-describedby="basic-addon2 ">
                                    <span class="input-group-addon" id="basic-addon2 "></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Telepon</label>
                                <div class="col-md-8">
                                    <input type="number" name="telepon" class="form-control" value="<?php echo $datapelanggan['telepon_pelanggan'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Alamat</label>
                                <div class="col-md-8">
                                    <textarea name="alamat" id="" cols="30" rows="4" class="form-control"><?php echo $datapelanggan['alamat_pelanggan'] ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2">Gambar</label>
                                <div class="col-md-8">
                                    <input type="file" name="gambar" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <button class="btn btn-success" name="ubah"><i class="fa fa-paper-plane"></i> Ubah</button>
                                </div>
                            </div>
                        </form>
                            <?php   
                             if (isset($_POST["ubah"])) {
                                $pelanggan->ubah_pelanggan($_POST['nama'], $_POST['email'], $_POST['password'], $_POST['telepon'], $_POST['alamat'],$_FILES['gambar'],$id_pelanggan);
                                    echo "<script>alert('Profil Anda Telah Diperbaharui');</script>";
                                    echo "<script>location='user.php';</script>";
                                 }
                              ?>                             
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</main>
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
  <script>  
$(document).ready(function(){
    $("input[name=password]").keyup(function(){
        //1. mengambil inputan dari password1
        var pass = $("input[name=pass]").val();
        //2. mengambil inputan dari password2
        var password = $("input[name=password]").val();
        //3. jika pass1 dan pass2 sama maka cocok
        if (pass==password) 
        {
            $(".input-group-addon").html("<div class='glyphicon glyphicon-ok'></div>");
        }
        else 
        {
            $(".input-group-addon").html("<div class='glyphicon glyphicon-remove'></div>");
        }
    })
})
</script>
</body>
</html>