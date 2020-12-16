<?php  
$datakategori=$kategori->tampilkategori();
?>
<section class="invoice">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-tags"></i> Tambah Produk
      </h2>
    </div>
  </div>
  
  <form method="post" enctype="multipart/form-data" class="form-horizontal">
  <div class="form-group">
    <label class="col-md-2 control-label">Nama Kategori</label>
    <div class="col-md-8">
      <select name="id_kategori" id="" class="form-control" required="">
        <option value="">Pilih Kategori</option>
        <?php foreach ($datakategori as $key => $value): ?> 
        <option value="<?php echo $value['id_kategori']; ?>"><?php echo $value['nama_kategori']; ?></option>
        <?php endforeach ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label">Nama Produk</label>
    <div class="col-md-8">
      <input type="text" name="produk" class="form-control" required="">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label">Harga Modal</label>
    <div class="col-md-8">
      <input type="number" name="harga_mod" class="form-control" required="">
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label">Harga Produk</label>
    <div class="col-md-8">
      <input type="number" name="harga" class="form-control" required="">
    </div>
  </div>
    
  <div class="form-group">
    <label class="col-md-2 control-label">Deskripsi Produk</label>
    <div class="col-md-8">
      <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10" required=""></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-md-2 control-label">Gambar Produk</label>
    <div class="col-md-8">
      <input type="file" name="gambar" class="form-control" required="">
    </div>
  </div>
  <div class="col-md-7 col-md-offset-2">
    <button class="btn btn-primary" name="simpan">Simpan</button>
  </div>
</form>
  <?php 
  if (isset($_POST['simpan'])) {
    $produk->tambah_produk($_POST['id_kategori'],$_POST['produk'],$_POST['harga_mod'],$_POST['harga'],$_POST['deskripsi'],$_FILES['gambar']);
     echo "<script>alert('Data berhasil disimpan');</script>";
     echo "<script>location='admin.php?halaman=produk';</script>";
  }

 ?>

</section>