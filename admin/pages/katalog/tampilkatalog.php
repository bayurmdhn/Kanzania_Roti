<?php
 $datakatalogproduk = $katalogproduk->tampil_katalogproduk();

 ?>
<section class="invoice">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-book"></i> Katalog Produk
      </h2>
    </div>
  </div>
  <a href="admin.php?halaman=tambahkatalog" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Katalog Produk</a>
  <div style="margin-top: 20px;">
  <table id="example" class="table table-striped table-bordered table-hover" width="100%">
    <thead style="background-color: #337ab7; color: #fff;">
      <tr>
        <th>No</th>
        <th>Gambar produk</th>
        <th>Nama katalog produk</th>
        <th>Deskripsi</th>
        <th>harga modak</th>
        <th>Harga katalog</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($datakatalogproduk as $key => $value): ?>
      <tr>
        <td><?php echo $key+1; ?></td>
        <td><img width="60" src="../img_katalogproduk/<?php echo $value['gambar_katalogproduk']; ?>" alt=""></td>
        <td><?php echo $value["nama_katalogproduk"]; ?></td>
        <td><?php echo $value["deskripsi_katalog"]; ?></td>
        <td><?php echo $value["harga_modalkatalog"]; ?></td>
        <td>Rp. <?php echo number_format($value["harga_katalogproduk"]); ?></td>
        <td>
          <a href="admin.php?halaman=ubahkatalog&id=<?php echo $value['id_katalogproduk']; ?>" class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-edit"></i> Ubah</a>
          <a href="admin.php?halaman=hapuskatalog&id=<?php echo $value['id_katalogproduk']; ?>" class="btn btn-danger btn-sm" onclick="return onfirm('Apakah anda yakin menghapus data ini ?')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
    </table>
  </div>

</section>