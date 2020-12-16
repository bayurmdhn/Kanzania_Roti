<?php  
  $id_katalogproduk=$_GET['id'];
  $datakatalog=$katalogproduk->tampil_katalogproduk();
  $detail=$katalogproduk->ambil_katalogproduk($id_katalogproduk);
?>

  <section class="invoice">
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-book"></i> Edit Katalog Produk
        </h2>
      </div>
    </div>
    <div class="row">
      <form method="post" enctype="multipart/form-data" class="form-horizontal">
    <div class="col-md-5" style="margin-left: 20px;">
      <div class="form-group">
      <label>Gambar Produk</label>
      <div>
        <img width="80" src="../img_katalogproduk/<?= $detail['gambar_katalogproduk']; ?>" alt=""></div>
        <div>
        <input type="file" name="gambar" class="form-control" >
      </div>
    </div>
    <div class="form-group">
      <label>Nama katalog produk</label>
      <div>
        <input type="text" name="namaproduk" class="form-control" value="<?php echo $detail['nama_katalogproduk'] ?>" required>
      </div>
    <div class="form-group">
      <label>Deskripsi Produk</label>
      <div>
        <textarea name="deskripsiproduk" class="form-control" id="" cols="30" rows="10" required><?php echo $detail['deskripsi_katalog'] ?></textarea>
      </div>
    </div>
    </div>
    <div class="form-group">
      <label>Harga modal katalog produk</label>
      <div>
        <input type="number" name="harga_modalkat" class="form-control" value="<?php echo $detail['harga_modalkatalog'] ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label>Harga katalog produk</label>
      <div>
        <input type="number" name="harga" class="form-control" value="<?php echo $detail['harga_katalogproduk'] ?>" required>
      </div>
    </div>
    </div>
    <div class="col-md-5 col-lg-push-1">

    <div>
      <button class="btn btn-primary" name="simpan">Simpan</button>
    </div>
    </div>
  </form>

    </div>
    <?php 
  if (isset($_POST['simpan'])) {
    $katalogproduk->ubah_katalogproduk($_FILES['gambar'],$_POST['namaproduk'],$_POST['deskripsiproduk'],$_POST['harga_modalkat'],$_POST['harga'],$id_katalogproduk);
     echo "<script>alert('Data berhasil dirubah');</script>";
     echo "<script>location='admin.php?halaman=katalog';</script>";
  }

 ?>
  </section>