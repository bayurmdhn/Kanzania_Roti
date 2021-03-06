<?php include '../config/class.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kanzania Roti | Sign in</title>
  <link rel="icon"  href="../logo/kanzania.png"> 
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../index2.html"><b>Admin</b>Kanzania Roti</a>
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post">
        <div class="form-group has-feedback">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox" > Remember Me
              </label>
            </div>
          </div>
          <div class="col-xs-4">
            <button class="btn btn-primary" name="login"> Sign in  <i class="fa fa-sign-in"></i></button>
          </div>
        </div>
      </form>
      <?php  
      if (isset($_POST['login'])) 
      {
        $hasil=$admin->login_admin($_POST['email'],$_POST['password']);
        if ($hasil=="sukses") 
        {
          echo "<script>alert('Login Sukses');</script>";
          echo "<script>location='admin.php';</script>";
        }
        else
        {
          echo "<script>alert('Login Gagal');</script>";
          echo "<script>location='login';</script>";
        }
      }
      ?>
    </div>
  </div>

  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' 
      });
    });
  </script>
</body>
</html>
