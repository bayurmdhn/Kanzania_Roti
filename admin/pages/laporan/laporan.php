<?php  
$datenow = date('Y-m-d');
?>
<style>
#menu1, #menu2, #menu3
{
  margin-top: 20px;
}
</style>
<section class="invoice">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-file-pdf-o"></i> Laporan
        <small class="pull-right">Date: </small>
      </h2>
    </div>
  </div>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Laporan Penjualan Pembelian</a></li>
    <li><a data-toggle="tab" href="#menu1">Laporan Penjualan Pemesanan</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <br><br>
      <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
          <h3>Cetak Laporan Pembelian</h3>
          <hr style="border-color: black">
            <form method="GET" action="pages/laporan/laporanpembelian.php" target="blank">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label>Perbulan</label><br>
                        <div class="col-md-6" style="margin-left: -15px;">
                           <select name="bulan" id="" class="form-control" required>
                              <option value="">- Pilih Bulan -</option>
                              <option value="01">Januari</option>
                              <option value="02">Februari</option>
                              <option value="03">Maret</option>
                              <option value="04">april</option>
                              <option value="05">Mei</option>
                              <option value="06">Juni</option>
                              <option value="07">Juli</option>
                              <option value="08">Agustus</option>
                              <option value="09">September</option>
                              <option value="10">Oktober</option>
                              <option value="11">November</option>
                              <option value="12">Desember</option>
                            </select>
                        </div>
                         <div class="col-md-6">
                           <select name="tahun" class="form-control" required>
                              <option value="">- Pilih Tahun -</option>
                              <?php  
                              $y = date('Y');
                              for ($i=2019; $i <=$y+30; $i++) { 
                                echo "<option value='$i'>$i</option>";
                              }
                              ?>
                            </select>
                        </div> 
                      </div>
                      <!-- <div class="form-group">
                      <label>Pertahun</label><br>
                      <div class="col-md-6" style="margin-left: -15px;">
                           <select name="pertahun" class="form-control">
                              <option value="">- Pilih Tahun -</option>
                              <?php  
                              $y = date('Y');
                              for ($i=2019; $i <=$y+30; $i++) { 
                                echo "<option value='$i'>$i</option>";
                              }
                              ?>
                            </select>
                        </div>
                    </div> -->
                    <br><br>
                      <div class="form-group">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-print"></i> Cetak</button>
                      </div>
                  </div>
                </div>
              </form>
              </div>
          </div>
        </div>
        <!-- <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
          <h3>Cetak Surat Permohonan</h3>
          <hr style="border-color: black">
            <form method="GET" action="pages/laporan/laporanpermohonan.php" target="blank">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label>Perbulan</label><br>
                        <div class="col-md-6" style="margin-left: -15px;">
                           <select name="bulan" id="" class="form-control">
                              <option value="">- Pilih Bulan -</option>
                              <option value="01">Januari</option>
                              <option value="02">Februari</option>
                              <option value="03">Maret</option>
                              <option value="04">april</option>
                              <option value="05">Mei</option>
                              <option value="06">Juni</option>
                              <option value="07">Juli</option>
                              <option value="08">Agustus</option>
                              <option value="09">September</option>
                              <option value="10">Oktober</option>
                              <option value="11">November</option>
                              <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                           <select name="tahun" class="form-control">
                              <option value="">- Pilih Tahun -</option>
                              <?php  
                              $y = date('Y');
                              for ($i=2019; $i <=$y+30; $i++) { 
                                echo "<option value='$i'>$i</option>";
                              }
                              ?>
                            </select>
                        </div>
                      </div>
                      <br><br>
                      <div class="form-group">
                      <label>Pertahun</label><br>
                      <div class="col-md-6" style="margin-left: -15px;">
                           <select name="pertahun" class="form-control">
                              <option value="">- Pilih Tahun -</option>
                              <?php  
                              $y = date('Y');
                              for ($i=2019; $i <=$y+30; $i++) { 
                                echo "<option value='$i'>$i</option>";
                              }
                              ?>
                            </select>
                        </div>
                    </div>
                    <br><br>
                      <div class="form-group">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-print"></i> Cetak</button>
                      </div>
                  </div>
                </div>
              </form>
              </div>
          </div>
        </div> -->
      </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <br>
      <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
          <h3>Cetak Laporan Pemesanan</h3>
          <hr style="border-color: black">
            <form method="GET" action="pages/laporan/laporanpemesanan.php" target="blank">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label>Perbulan</label><br>
                        <div class="col-md-6" style="margin-left: -15px;">
                           <select name="bulan" id="" class="form-control" required>
                              <option value="">- Pilih Bulan -</option>
                              <option value="01">Januari</option>
                              <option value="02">Februari</option>
                              <option value="03">Maret</option>
                              <option value="04">april</option>
                              <option value="05">Mei</option>
                              <option value="06">Juni</option>
                              <option value="07">Juli</option>
                              <option value="08">Agustus</option>
                              <option value="09">September</option>
                              <option value="10">Oktober</option>
                              <option value="11">November</option>
                              <option value="12">Desember</option>
                            </select>
                        </div>
                         <div class="col-md-6">
                           <select name="tahun" class="form-control" required>
                              <option value="">- Pilih Tahun -</option>
                              <?php  
                              $y = date('Y');
                              for ($i=2019; $i <=$y+30; $i++) { 
                                echo "<option value='$i'>$i</option>";
                              }
                              ?>
                            </select>
                        </div> 
                      </div>
                      <!-- <div class="form-group">
                      <label>Pertahun</label><br>
                      <div class="col-md-6" style="margin-left: -15px;">
                           <select name="pertahun" class="form-control">
                              <option value="">- Pilih Tahun -</option>
                              <?php  
                              $y = date('Y');
                              for ($i=2019; $i <=$y+30; $i++) { 
                                echo "<option value='$i'>$i</option>";
                              }
                              ?>
                            </select>
                        </div>
                    </div> -->
                    <br><br>
                      <div class="form-group">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-print"></i> Cetak</button>
                      </div>
                  </div>
                </div>
              </form>
              </div>
          </div>
        </div>
        <!-- <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
          <h3>Cetak Surat Permohonan</h3>
          <hr style="border-color: black">
            <form method="GET" action="pages/laporan/laporanpermohonan.php" target="blank">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label>Perbulan</label><br>
                        <div class="col-md-6" style="margin-left: -15px;">
                           <select name="bulan" id="" class="form-control">
                              <option value="">- Pilih Bulan -</option>
                              <option value="01">Januari</option>
                              <option value="02">Februari</option>
                              <option value="03">Maret</option>
                              <option value="04">april</option>
                              <option value="05">Mei</option>
                              <option value="06">Juni</option>
                              <option value="07">Juli</option>
                              <option value="08">Agustus</option>
                              <option value="09">September</option>
                              <option value="10">Oktober</option>
                              <option value="11">November</option>
                              <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                           <select name="tahun" class="form-control">
                              <option value="">- Pilih Tahun -</option>
                              <?php  
                              $y = date('Y');
                              for ($i=2019; $i <=$y+30; $i++) { 
                                echo "<option value='$i'>$i</option>";
                              }
                              ?>
                            </select>
                        </div>
                      </div>
                      <br><br>
                      <div class="form-group">
                      <label>Pertahun</label><br>
                      <div class="col-md-6" style="margin-left: -15px;">
                           <select name="pertahun" class="form-control">
                              <option value="">- Pilih Tahun -</option>
                              <?php  
                              $y = date('Y');
                              for ($i=2019; $i <=$y+30; $i++) { 
                                echo "<option value='$i'>$i</option>";
                              }
                              ?>
                            </select>
                        </div>
                    </div>
                    <br><br>
                      <div class="form-group">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-print"></i> Cetak</button>
                      </div>
                  </div>
                </div>
              </form>
              </div>
          </div>
        </div> -->
      </div>
</div>
  </div>
</section>