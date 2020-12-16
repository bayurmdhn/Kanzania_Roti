<?php  
$datakatalog=$katalogproduk->tampil_katalogproduk();
?>
<section class="invoice">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-tags"></i> Tambah katalog produk
      </h2>
    </div>
  </div>
  
  <form method="post" enctype="multipart/form-data" class="form-horizontal">
  <div class="form-group">
    <label class="col-md-2 control-label">Gambar Produk</label>
    <div class="col-md-8">
      <input type="file" name="gambar" class="form-control" required="">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label">Nama katalog produk</label>
    <div class="col-md-8">
      <input type="text" name="namaproduk" class="form-control" required="">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label">Deskripsi katalog produk</label>
    <div class="col-md-8">
      <textarea name="deskripsiproduk" class="form-control" id="" cols="30" rows="10" required=""></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label">Harga modal</label>
    <div class="col-md-8">
      <input type="number" name="harga_modalkat" class="form-control" required="">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label">Harga Produk</label>
    <div class="col-md-8">
      <input type="number" name="harga" class="form-control" required="">
    </div>
  </div>
    <div class="col-md-7 col-md-offset-2">
    <button class="btn btn-primary" name="simpan">Simpan</button>
  </div>
</form>
  <?php 
  if (isset($_POST['simpan'])) {
    $katalogproduk->tambah_katalogproduk($_FILES['gambar'],$_POST['namaproduk'],$_POST['deskripsiproduk'],$_POST['harga_modalkat'],$_POST['harga'],);
     echo "<script>alert('Data berhasil disimpan');</script>";
     echo "<script>location='admin.php?halaman=katalog';</script>";
  }

 ?>

</section>