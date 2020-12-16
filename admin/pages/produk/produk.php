<?php $dataproduk = $produk->tampilproduk(); ?>
<section class="invoice">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-tags"></i> Produk
      </h2>
    </div>
  </div>
  <a href="admin.php?halaman=tambahproduk" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Produk</a>
  <div style="margin-top: 20px;">
  <table id="example" class="table table-striped table-bordered table-hover" width="100%">
    <thead style="background-color: #337ab7; color: #fff;">
      <tr>
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Nama Produk</th>
        <th>Harga Modal</th>
        <th>Harga</th>
        <th>Gambar</th>
        <th>Deskripsi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dataproduk as $key => $value): ?>
      <tr>
        <td><?php echo $key+1; ?></td>
        <td><?php echo $value["nama_kategori"]; ?></td>
        <td><?php echo $value["nama_produk"]; ?></td>
        <td><?php echo $value['harga_modal']; ?></td>
        <td>Rp. <?php echo number_format($value["harga_produk"]); ?></td>
        <td><img width="60" src="../img_produk/<?php echo $value['gambar_produk'] ?>" alt=""></td>
        <td><?php echo $value["deskripsi_produk"]; ?></td>
        <td>
          <a href="admin.php?halaman=ubahproduk&id=<?php echo $value['id_produk']; ?>" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-edit"></i> Ubah</a>
          <a href="admin.php?halaman=hapusproduk&id=<?php echo $value['id_produk']; ?>" class="btn btn-danger btn-sm" onclick="return onfirm('Apakah anda yakin menghapus data ini ?')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
    </table>
  </div>

</section>