<?php include 'config/class.php' ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Daftar| Kanzania Roti </title>
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

 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6 col-lg-offset-3">
                <div class="aa-myaccount-login">
                <h4>Daftar</h4>
                 <form action="" method="post" class="aa-login-form">
                  <label for="">Nama<span>*</span></label>
                   <input type="text" name="nama" placeholder="Masukan Nama anda">
                  <label for="">Email Address<span>*</span></label>
                   <input type="text" name="email" placeholder="Masukan Email anda">
                   <label for="">Password<span>*</span></label>
                    <input type="password" placeholder="Password">
                    <label for="">Ulangi Password<span>*</span></label>
                   <input type="password" name="cpassword" placeholder="Ulangi Password" class="form-control" id="txtConfirmPassword">
                    <button type="submit" name="daftar" class="aa-browse-btn" >Daftar</button>
                  </form>
                  <?php 
              if (isset($_POST['daftar'])) 
              {
                $hasil=$pelanggan->daftar_pelanggan($_POST['nama'],$_POST['email'],$_POST['cpassword']);
                if ($hasil=="sukses") 
                {
                  echo "<script>alert('daftar sukses');</script>";
                  echo "<script>location='login.php';</script>";
                }else
                {
                  echo "<script>alert('login gagal');</script>";
                  echo "<script>location='daftar.php';</script>";
                }
              }
             ?>
                </div>
              </div>
            </div>          
         </div>
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
  <script type="text/javascript">
        $(function () {
            $("#btnSubmit").click(function () {
                var password = $("#txtPassword").val();
                var confirmPassword = $("#txtConfirmPassword").val();
                if (password != confirmPassword) {
                    alert("Password tidak sama silahkan ulangi dan konfirmasi password dengan benar");
                    return false;
                }
                return true;
            });
        });
    </script>

  </body>
</html>