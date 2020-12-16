<?php 
$datapembelian = $pembelian->tampilpembelian();
 ?>
<section class="invoice">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-money"></i> Pembelian
      </h2>
    </div>
  </div>
  <div style="margin-top: 20px;">
  <table id="example" class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Deadline Pembayaran</th>
        <th>Nama Pelanggan</th>
        <th>Email Pelanggan</th>
        <th>Status</th>
        <th>Total Pemesanan</th>
        <th>Pembayaran</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($datapembelian as $key => $value): ?>
        
      <tr>
        <td><?= $key+1; ?></td>
        <td><?php echo $value['deadline_pembayaran']; ?></td>
        <td><?php echo $value['nama_pelanggan']; ?></td>
        <td><?php echo $value['email_pelanggan']; ?></td>
        <?php  
              if ($value["status_pembelian"]=='pending') {
                echo '<td><button class="btn btn-danger btn-xs"> '.$value["status_pembelian"].'</button></td>';
              }
              elseif($value["status_pembelian"]=='Diproses'){
                echo '<td><button class="btn btn-warning btn-xs"> '.$value["status_pembelian"].'</button></td>';
              }
              elseif($value["status_pembelian"]=='Selesai'){
                echo '<td><button class="btn btn-success btn-xs"> '.$value["status_pembelian"].'</button></td>';
              }
              elseif($value["status_pembelian"]=='Menunggu Konfirmasi'){
                echo '<td><button class="btn btn-info btn-xs"> '.$value["status_pembelian"].'</button></td>';
              }
              elseif($value["status_pembelian"]=='Lunas'){
                echo '<td>'.$value["status_pembelian"].'</td>';
              }
              ?>
        <td>Rp. <?php echo number_format($value['total_pembelian']); ?></td>
        <td><a href="admin.php?halaman=nota&id=<?php echo $value["id_pembelian"]; ?>" class="btn btn-info btn-xs">Nota</a>
                <a href="admin.php?halaman=pembayaran&id=<?php echo $value["id_pembelian"]; ?>" class="btn btn-success btn-xs">Pembayaran</a></td>
          <?php if ($value["status_pembelian"]=='pending'): ?>
            <td>  <a href="admin.php?halaman=hapuspembelian&id=<?php echo $value['id_pembelian']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin menghapus data ini ?')"><i class="glyphicon glyphicon-trash"></i> Hapus</a></td>
          <?php elseif($value["status_pembelian"]=='Menunggu Konfirmasi'): ?>
               <td><span class="label label-warning"> Konfirmasi??</span></td>
          <?php elseif ($value["status_pembelian"]=='Diproses'): ?> 
            <td><span class="label label-warning"> Proses</span></td>
          <?php elseif ($value["status_pembelian"]=='Selesai'): ?> 
            <td><span class="label label-warning"> Selesai</span></td>     
          <?php endif ?>
               
        <!-- <td>
          <a href="admin.php?halaman=hapuspembelian&id=<?php echo $value['id_pembelian']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini ?')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
        </td> -->
      <?php endforeach ?>
      </tr>
      
      
    </tbody>
  </table>
  </div>

</section>