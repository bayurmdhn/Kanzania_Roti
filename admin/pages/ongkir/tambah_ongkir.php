<section class="invoice">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-list"></i> Tambah Ongkos Kirim
      </h2>
    </div>
  </div>
  
  <form method="post">  
<div class="form-group">
  <label>Nama Kecamatan</label>
  <input type="text" name="nama" class="form-control">
</div><div class="form-group">
  <label>Harga</label>
  <input type="number" name="harga" class="form-control">
</div>
<button class="btn btn-primary" name="simpan">Simpan</button>
</form>
  <?php 
  if (isset($_POST['simpan'])) 
  {
    $ongkir->tambah_ongkir($_POST['nama'],$_POST['harga']);
    echo "<script>alert('Data berhasil ditambah');</script>";
    echo "<script>location='admin.php?halaman=ongkir'</script>";
  }
?>

</section>