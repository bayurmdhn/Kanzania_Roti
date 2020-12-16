<?php  
  $datakategori=$kategori->tampilkategori();
  $id_produk=$_GET['id'];
  $detail=$produk->ambil_produk($id_produk);
?>

  <section class="invoice">
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-tags"></i> Edit Produk
        </h2>
      </div>
    </div>
    <div class="row">
      <form method="post" enctype="multipart/form-data" class="form-horizontal">
    <div class="col-md-5" style="margin-left: 20px;">
      <div class="form-group">
      <label>Nama Kategori</label>
      <div>
        <select name="id_kategori" id="" class="form-control">
          <option value="">Pilih Kategori</option>
          <option value="<?php echo $detail['id_kategori']; ?>" selected><?php echo $detail['nama_kategori']; ?></option>
          <?php foreach ($datakategori as $key => $value): ?>
          <option value="<?php echo $value['id_kategori']; ?>"><?php echo $value['nama_kategori']; ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label>Nama Produk</label>
      <div>
        <input type="text" name="nama" class="form-control" value="<?php echo $detail['nama_produk'] ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label>Harga Modal</label>
      <div>
        <input type="number" name="harga_mod" class="form-control" value="<?php echo $detail['harga_modal'] ?>" required>
      </div>
    </div>
    <div class="form-group">
      <label>Harga Produk</label>
      <div>
        <input type="number" name="harga" class="form-control" value="<?php echo $detail['harga_produk'] ?>" required>
      </div>
    </div>
    </div>
    <div class="col-md-5 col-lg-push-1">
      
    <div class="form-group">
      <label>Deskripsi Produk</label>
      <div>
        <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10" required><?php echo $detail['deskripsi_produk'] ?></textarea>
      </div>
    </div>

    <div class="form-group">
      <label>Gambar Produk</label>
      <div>
        <input type="file" name="gambar" class="form-control" >
      </div>
    </div>
    <div>
      <button class="btn btn-primary" name="simpan">Simpan</button>
    </div>
    </div>
  </form>

    </div>
    <?php 
  if (isset($_POST['simpan'])) {
    $produk->ubah_produk($_POST['id_kategori'],$_POST['nama'],$_POST['harga_mod'],$_POST['harga'],$_POST['deskripsi'],$_FILES['gambar'],$id_produk);
     echo "<script>alert('Data berhasil dirubah');</script>";
     echo "<script>location='admin.php?halaman=produk';</script>";
  }

 ?>
  </section>