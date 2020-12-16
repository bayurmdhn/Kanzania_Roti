<?php 
$datapemesanan = $pemesanan->tampilpemesananadmin();
 ?>
<section class="invoice">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-money"></i> Pemesanan
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
      <?php foreach ($datapemesanan as $key => $value): ?>
        
      <tr>
        <td><?= $key+1; ?></td>
        <td><?php echo $value['deadline_pembayaran']; ?></td>
        <td><?php echo $value['nama_pelanggan']; ?></td>
        <td><?php echo $value['email_pelanggan']; ?></td>
        <?php  
              if ($value["status_pemesanan"]=='pending') {
                echo '<td><button class="btn btn-danger btn-xs"> '.$value["status_pemesanan"].'</button></td>';
              }
              elseif($value["status_pemesanan"]=='Diproses'){
                echo '<td><button class="btn btn-warning btn-xs"> '.$value["status_pemesanan"].'</button></td>';
              }
              elseif($value["status_pemesanan"]=='Selesai'){
                echo '<td><button class="btn btn-success btn-xs"> '.$value["status_pemesanan"].'</button></td>';
              }
              elseif($value["status_pemesanan"]=='Menunggu Konfirmasi'){
                echo '<td><button class="btn btn-info btn-xs"> '.$value["status_pemesanan"].'</button></td>';
              }
              elseif($value["status_pemesanan"]=='Lunas'){
                echo '<td>'.$value["status_pemesanan"].'</td>';
              }
              ?>
        <td>Rp. <?php echo number_format($value['total_pemesanan']); ?></td>
        <td><a href="admin.php?halaman=notapemesanan&id=<?php echo $value["id_pemesanan"]; ?>" class="btn btn-info btn-xs">Nota</a>
                <a href="admin.php?halaman=pembayaranpemesanan&id=<?php echo $value["id_pemesanan"]; ?>" class="btn btn-success btn-xs">Pembayaran</a></td>
        <?php if ($value["status_pemesanan"]=='pending'): ?>
            <td>  <a href="admin.php?halaman=hapuspemesanan&id=<?php echo $value['id_pemesanan']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin menghapus data ini ?')"><i class="glyphicon glyphicon-trash"></i> Hapus</a></td>
          <?php elseif($value["status_pemesanan"]=='Menunggu Konfirmasi'): ?>
               <td><span class="label label-warning"> Konfirmasi??</span></td>
          <?php elseif ($value["status_pemesanan"]=='Diproses'): ?> 
            <td><span class="label label-warning"> Proses</span></td>
          <?php elseif ($value["status_pemesanan"]=='Selesai'): ?> 
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