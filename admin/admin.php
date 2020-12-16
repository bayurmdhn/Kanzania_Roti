<?php  
include '../config/class.php';

if (!isset($_SESSION["admin"])) 
{
  echo "<script>alert('anda harus login');</script>";
  echo "<script>location='index.php';</script>";
}
?>
<?php  
$id_admin=$_SESSION["admin"]["id_admin"];
$dataadmin=$admin->ambiladmin($id_admin);
?>
<?php 
$totpembelian = $pembelian->totalpembelianadmin();
$totpemesanan = $pemesanan->totalpemesananadmin();
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard | Admin Kanzania Roti </title>
  <link rel="icon"  href="../logo/kanzania.png"> 
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css
  ">
</head>
<script type="text/javascript">
  history.pushState(null, document.title, location.href);
  window.addEventListener('popstate', function (event)
  {
    history.pushState(null, document.title, location.href);
  });
</script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <a href="admin.php" class="logo">
        <span class="logo-mini"><b>A</b>K</span>
        <span class="logo-lg"><b>Admin</b>Kanzania Roti</span>
      </a>
       <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success"></span>
              </a> 
              <ul class="dropdown-menu">
                <li class="header">You have 1 messages</li>
                <li>
                 <ul class="menu">
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="../img_admin/<?php echo $dataadmin['foto_admin']; ?>" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 1 notifications</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li> 

           <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../imgku/<?php echo $dataadmin['foto_admin']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $dataadmin['nama_admin']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../imgku/<?php echo $dataadmin['foto_admin']; ?>" class="img-circle" alt="User Image">

                <p>
                  <?= $dataadmin['nama_admin']; ?>
                </p>
              </li> 

               <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li> 
          <!-- Control Sidebar Toggle Button -->
           <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> 
        </ul>
      </div> 
    </nav> 
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../imgku/<?php echo $dataadmin['foto_admin']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $dataadmin['nama_admin']; ?></p>
          <?php if (isset($_SESSION['admin'])): ?>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          <?php endif ?>
          <?php if (!isset($_SESSION['admin'])): ?>
            <a href="#"><i class="fa fa-circle text-red"></i> Offline</a>
          <?php endif ?>

        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="active">
          <a href="admin.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>

        </li>
        <li class="header">INPUT DATA</li>
        <li>
          <a href="admin.php?halaman=kategori">
            <i class="fa fa-list"></i> <span>Kategori Produk</span>
          </a>
        </li>
        <li>
          <a href="admin.php?halaman=produk">
            <i class="fa fa-tags"></i> <span>Produk</span>
          </a>
        </li>
        <li>
          <a href="admin.php?halaman=katalog">
            <i class="fa fa-book"></i> <span>Katalog Produk</span>
          </a>
        </li>
        <li>
          <a href="admin.php?halaman=ongkir">
            <i class="fa fa-paper-plane"></i> <span>Ongkir</span>
          </a>
        </li>
        <li>
          <a href="admin.php?halaman=pelanggan">
            <i class="fa fa-users"></i> <span>Pelanggan</span>
          </a>
        </li>
        <li class="header">TRANSAKSI</li>
        <li>
          <a href="admin.php?halaman=pembelian">
            <i class="fa fa-money"></i> <span>Pembelian</span>
            <span class="pull-right-container"> 
            <small class="label pull-right bg-blue"><?php echo $totpembelian; ?></small>
            </span>
          </a>
        </li>
        <li>
          <a href="admin.php?halaman=pemesanan">
            <i class="fa fa-first-order"></i> <span>Pemesanan</span>
            <span class="pull-right-container"> 
            <small class="label pull-right bg-blue"><?php echo $totpemesanan; ?></small>
            </span>
          </a>
        </li>
        <li class="header">LAPORAN</li>
        <li>
          <a href="admin.php?halaman=laporan">
            <i class="fa fa-file-pdf-o"></i> <span>Laporan</span>
          </a>
        </li>
        <li class="header">PENGATURAN</li>
        <li>
          <a href="admin.php?halaman=pengaturan">
            <i class="fa fa-cog"></i> <span>Pengaturan</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>


  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>


    <section class="content">
      <div class="row">
        <?php  
        if (!isset($_GET['halaman'])) {
          include 'home.php';
        }
        else
        {
          if ($_GET['halaman']=='kategori') 
          {
            include 'pages/kategori/tampilkategori.php';
          }
          elseif ($_GET['halaman']=='tambahkategori') 
          {
            include 'pages/kategori/tambahkategori.php';
          }
          elseif ($_GET['halaman']=='editkategori') 
          {
            include 'pages/kategori/ubahkategori.php';
          }
          elseif ($_GET['halaman']=='hapuskategori') 
          {
            include 'pages/kategori/hapuskategori.php';
          }
          elseif ($_GET['halaman']=='produk') 
          {
            include 'pages/produk/produk.php';
          }
          elseif ($_GET['halaman']=='tambahproduk') 
          {
            include 'pages/produk/tambahproduk.php';
          }
          elseif ($_GET['halaman']=='ubahproduk') 
          {
            include 'pages/produk/editproduk.php';
          }
          elseif ($_GET['halaman']=='hapusproduk') 
          {
            include 'pages/produk/hapusproduk.php';
          }
          elseif ($_GET['halaman']=='katalog') 
          {
            include 'pages/katalog/tampilkatalog.php';
          }
          elseif ($_GET['halaman']=='tambahkatalog') 
          {
            include 'pages/katalog/tambahkatalog.php';
          }
          elseif ($_GET['halaman']=='ubahkatalog') 
          {
            include 'pages/katalog/ubahkatalog.php';
          }
          elseif ($_GET['halaman']=='hapuskatalog') 
          {
            include 'pages/katalog/hapuskatalog.php';
          }
          elseif ($_GET['halaman']=='ongkir') 
          {
            include 'pages/ongkir/tampil_ongkir.php';
          }
          elseif ($_GET['halaman']=='tambah_ongkir') 
          {
            include 'pages/ongkir/tambah_ongkir.php';
          }
          elseif ($_GET['halaman']=='edit_ongkir') 
          {
            include 'pages/ongkir/edit_ongkir.php';
          }
          elseif ($_GET['halaman']=='hapusongkir') 
          {
            include 'pages/ongkir/hapusongkir.php';
          }
          elseif ($_GET['halaman']=='pelanggan') 
          {
            include 'pages/pelanggan/pelanggan.php';
          }
          elseif ($_GET['halaman']=='hapuspelanggan') 
          {
            include 'pages/pelanggan/hapuspelanggan.php';
          }
          elseif ($_GET['halaman']=='pembelian') 
          {
            include 'pages/pembelian/pembelian.php';
          }
          elseif ($_GET['halaman']=='hapuspembelian') 
          {
            include 'pages/pembelian/hapuspembelian.php';
          }
          elseif ($_GET['halaman']=='pemesanan')
          {
            include 'pages/pemesanan/pemesanan.php';
          }
           elseif ($_GET['halaman']=='notapemesanan') 
          {
            include 'pages/pemesanan/nota.php';
          }
          elseif ($_GET['halaman']=='pembayaranpemesanan') 
          {
            include 'pages/pemesanan/pembayaran.php';
          }
          elseif ($_GET['halaman']=='hapuspemesanan') 
          {
            include 'pages/pemesanan/hapuspemesanan.php';
          }
          elseif ($_GET['halaman']=='pengaturan') 
          {
            include 'pages/pengaturan/pengaturan.php';
          }
          elseif ($_GET['halaman']=='tambahpengaturan') 
          {
            include 'pages/pengaturan/tambahpengaturan.php';
          }
          elseif ($_GET['halaman']=='editpengaturan') 
          {
            include 'pages/pengaturan/editpengaturan.php';
          }
          elseif ($_GET['halaman']=='hapuspengaturan') 
          {
            include 'pages/pengaturan/hapuspengaturan.php';
          }
          elseif ($_GET['halaman']=='laporan') 
          {
            include 'pages/laporan/laporan.php';
          }
          elseif ($_GET['halaman']=='tambahblog') 
          {
            include 'pages/blog/tambahblog.php';
          }
          elseif ($_GET['halaman']=='editblog') 
          {
            include 'pages/blog/editblog.php';
          } 
           elseif ($_GET['halaman']=='nota') 
          {
            include 'pages/pembelian/nota.php';
          }
            elseif ($_GET['halaman']=='pembayaran') 
          {
            include 'pages/pembelian/pembayaran.php';
          }
        }
        ?>
      </div>
    </section>
  </div>

  <footer class="main-footer text-center">
    <strong>Copyright &copy; 2019 <a href="https://adminlte.io">KanzaniaRoti</a>.</strong> All rights
    reserved.
  </footer>

  <div class="control-sidebar-bg"></div>
</div>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>$.widget.bridge('uibutton', $.ui.button);</script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js
"></script>
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>
<script >
  $(document).ready(function() {
    var table = $('#example').DataTable( {
      rowReorder: {
        selector: 'td:nth-child(2)'
      },
      responsive: true
    } );
  } );
</script>
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
          $(".input-group-addon").html("<div class='fa fa-check '></div>");
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
