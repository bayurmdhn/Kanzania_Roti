<?php
$id_admin=$_SESSION["admin"]["id_admin"];
$dataadmin=$admin->ambiladmin($id_admin);
$datapengaturan = $pengaturan->tampilpengaturan();
?>
<?php 
if (!isset($_SESSION["admin"])) 
{
  echo "<script>alert('Anda harus login');</script>";
  echo "<script>location='login.php';</script>";
  exit();
}

?>
<section class="invoice">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-cog"></i> Pengaturan
      </h2>
    </div>
  </div>
  <div class="panel panel-default">
  <div class="panel panel-body">
    <div class="col-md-3">
      <img class="img img-circle img-thumbnail" src="../img_admin/<?php echo $dataadmin['foto_admin']; ?>" alt="">
      <?php if(empty($dataadmin["foto_admin"])): ?> 
        <img class="img img-circle img-thumbnail" src="../img/user.jpg" alt="">
      <?php endif ?>
      <h4 class="text-center"><?php echo $_SESSION['admin']['nama_admin']; ?></h4>
    </div>
    <div class="col-md-9">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">Nama</label>
          <input type="text" class="form-control" name="nama" value="<?php echo $dataadmin['nama_admin'] ?>" required>
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="text" class="form-control" name="email" value="<?php echo $dataadmin['email_admin'] ?>" required>
        </div>
        <div class="form-group">
          <label >Password</label>
          <input type="password" name="pass" class="form-control" placeholder="Kosongkan jika password tidak diperbaharui">
        </div>
        <div class="form-group">
          <label>Konfirmasi Password</label>
          <div class="input-group">
            <input type="password" name="password" class="form-control" placeholder=" kosongkan jika password tidak diperbaharui" aria-describedby="basic-addon2 ">
            <span class="input-group-addon" id="basic-addon2 "></span>
          </div>
        </div>
        <div class="form-group">
          <label for="">Foto</label>
          <input type="file" class="form-control" name="foto">
        </div>
        <button class="btn btn-success" name="ubah"><i class="fa fa-edit"></i> Edit Profile</button>
      </form>
      <?php if (isset($_POST['ubah'])) {
        $admin->ubahadmin($_POST['nama'], $_POST['email'], $_POST['pass'],$_FILES['foto'],$id_admin);
        echo "<script>alert('Profil berhasil diubah');</script>";
        echo "<script>location:''";
      } ?>
    </div>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel panel-body">
    <a href="admin.php?halaman=tambahpengaturan" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah data</a>
    <table class="table table-bordered table-hover table-striped table-responsive">
      <thead>
        <tr>
          <th>no</th>
          <th>Atas Nama</th>
          <th>Nama Bank</th>
          <th>Nomor Rekening</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>
       <?php foreach ($datapengaturan as $key => $value): ?>
          <tr>
            <td><?= $key+1; ?></td>
            <td><?= $value['nama'] ?></td>
            <td><?= $value['bank'] ?></td>
            <td><?= $value['norek'] ?></td>
            <td>
              <a href="admin.php?halaman=editpengaturan&id=<?php echo $value['id_pgtrn']; ?>" class="btn btn-success" ><i class="glyphicon glyphicon-edit"></i> Edit</a>
              <a href="admin.php?halaman=hapuspengaturan&id=<?php echo $value['id_pgtrn']; ?>" class="btn btn-danger" onclick="return onfirm('Apakah anda yakin menghapus data ini ?')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>

  </div>
</div>

</section>