<?php  
  $id_kategori=$_GET['id'];
  $detail=$kategori->ambilkategori($id_kategori);
?>
  <section class="invoice">
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-list"></i> Edit Kategori Produk
        </h2>
      </div>
    </div>

    <form method="post">
  <div class="form-group">
    <label>Nama Kategori</label>
    <input type="text" name="nama" class="form-control" value="<?php echo $detail['nama_kategori'] ?>">
  </div>
<button class="btn btn-primary" name="simpan"><i class="glyphicon glyphicon-plus"></i> Edit Data</button>
</form>
    <?php 
if (isset($_POST['simpan'])) {
  $kategori->ubahkategori($_POST['nama'],$id_kategori);
  echo "<script>alert('Data berhasil diedit');</script>";
  echo "<script>location='admin.php?halaman=kategori'</script>";
}
?>
  </section>