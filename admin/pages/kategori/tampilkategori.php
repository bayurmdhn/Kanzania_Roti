<?php 
$datakategori=$kategori->tampilkategori();
?>
<section class="invoice">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-list"></i> Kategori Produk
      </h2>
    </div>
  </div>

<a href="admin.php?halaman=tambahkategori" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Tambah Kategori</a>
<div style="margin-top: 20px;">
  <table id="example" class="table table-striped table-bordered table-hover" width="100%">
    <thead style="background-color: #337ab7; color: #fff;">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($datakategori as $key => $value): ?> 
        <tr>
          <td><?php echo $key+1; ?></td>
          <td><?php echo $value['nama_kategori']; ?></td>
          <td>
            <a href="admin.php?halaman=editkategori&id=<?php echo $value["id_kategori"] ?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
            <a href="admin.php?halaman=hapuskategori&id=<?php echo $value["id_kategori"] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt" ></i> Hapus</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
</table>
</div>




</section>