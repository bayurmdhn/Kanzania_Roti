<?php  
  $id_ongkir=$_GET['id'];
  $detail=$ongkir->ambilongkir($id_ongkir);
?>
  <section class="invoice">
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-list"></i> Edit Ongkos Kirim
        </h2>
      </div>
    </div>

    <form method="post">
  <div class="form-group">
    <label>Nama Kecamatan</label>
    <input type="text" name="nama" class="form-control" value="<?php echo $detail['nama_kabupaten'] ?>">
  </div>
  <div class="form-group">
    <label>Harga Ongkir</label>
    <input type="number" name="harga" class="form-control" value="<?php echo $detail['harga'] ?>">
  </div>
<button class="btn btn-primary" name="simpan"><i class="glyphicon glyphicon-plus"></i> Edit Data</button>
</form>
    <?php 
if (isset($_POST['simpan'])) {
  $ongkir->edit_ongkir($_POST['nama'],$_POST['harga'],$id_ongkir);
  echo "<script>alert('Data berhasil diedit');</script>";
  echo "<script>location='admin.php?halaman=ongkir'</script>";
}
?>
  </section>