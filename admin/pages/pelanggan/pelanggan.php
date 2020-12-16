<?php $datapelanggan = $pelanggan->tampil_pelanggan(); ?>
<section class="invoice">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-users"></i> Pelanggan
      </h2>
    </div>
  </div>
  <div style="margin-top: 20px;">
  <table id="example" class="table table-striped table-bordered table-hover">
    <thead style="background-color: #337ab7; color: #fff;">
      <tr>
        <th>No</th>
        <th>Nama Pelanggan</th>
        <th>Email</th>
        <th>Nomor Telepon</th>
        <th>Foto</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($datapelanggan as $key => $value): ?>
        
      <tr>
        <td><?php echo $key+1; ?></td>
        <td><?php echo $value['nama_pelanggan']; ?></td>
        <td><?php echo $value['email_pelanggan']; ?></td>
        <td><?php echo $value['telepon_pelanggan']; ?></td>
        <td><img width="70px;" src="../img_pelanggan/<?= $value['foto_pelanggan']; ?>" alt=""></td>
        <td>
          <a href="admin.php?halaman=hapuspelanggan&id=<?= $value['id_pelanggan']; ?>" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i> Hapus</a>
        </td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  </div>

</section>