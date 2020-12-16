<?php 
$dataongkir=$ongkir->tampil_ongkir();
?>
<section class="invoice">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-list"></i> Ongkos Kirim
      </h2>
    </div>
  </div>

  <table id="example" class="table table-striped table-bordered table-hover" width="100%">
    <thead style="background-color: #337ab7; color: #fff;">
      <tr>
        <th>No</th>
        <th>Nama Kecamatan</th>
        <th>Harga</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($dataongkir as $key => $value): ?> 
        <tr>
          <td><?php echo $key+1; ?></td>
          <td><?php echo $value['nama_kabupaten']; ?></td>
          <td><?php echo $value['harga']; ?></td>
          <td>
            <a href="admin.php?halaman=edit_ongkir&id=<?php echo $value["id_ongkos"] ?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
            <a href="admin.php?halaman=hapusongkir&id=<?php echo $value["id_ongkos"] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt" ></i> Hapus</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
</table>

<a href="admin.php?halaman=tambah_ongkir" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>Tambah Ongkir</a>



</section>