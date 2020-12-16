<?php include 'config/class.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Login | Kanzania</title>
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
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6 col-lg-offset-3">
                <div class="aa-myaccount-login">
                <h4>Login</h4>
                 <form action="" method="post" class="aa-login-form">
                  <label for="">Email Address<span>*</span></label>
                   <input type="email" placeholder="Masukan email" name="email" class="form-control">
                   <label for="">Password<span>*</span></label>
                    <input type="password" placeholder=" Masukan Password" name="password" class="form-control">
                    <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Ingatkan saya  </label>
                    <button name="login" class="btn btn-primary">Login</button>
                    <p class="aa-lost-password"><a href="#">Lupa Password</a></p>
                    <div class="aa-register-now">
                     Don't have an account?    <a href="daftar.php">Register now!</a>
                    </div>
                  </form>
                  <?php 
              if (isset($_POST["login"])) 
              {
                $hasil=$pelanggan->login_pelanggan($_POST["email"],$_POST["password"]);
                if ($hasil=="sukses") 
                {
                  echo "<script>alert('login sukses');</script>";
                  echo "<script>location='user.php';</script>";
                }else
                {
                  echo "<script>alert('login gagal');</script>";
                  echo "<script>location='login.php';</script>";
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