<section class="invoice">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-list"></i> Tambah Kategori Produk
      </h2>
    </div>
  </div>
  
  <form method="post">  
<div class="form-group">
  <label>Nama Kategori</label>
  <input type="text" name="nama" class="form-control">
</div>
<button class="btn btn-primary" name="simpan">Simpan</button>
</form>
  <?php 
  if (isset($_POST['simpan'])) 
  {
    $kategori->simpan_kategori($_POST['nama']);
    echo "<script>alert('Data berhasil ditambah');</script>";
    echo "<script>location='admin.php?halaman=kategori'</script>";
  }
?>

</section>