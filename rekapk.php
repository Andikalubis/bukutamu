<?php include "header.php" ?>
<!--awal row-->
<div class="row">
    <!--col-md-12-->
    <div class="col-md-12">
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Tamu Kunjungan Hari Ini [<?=
                date('d-m-Y') ?>]</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="" class="text-center">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Dari Tanggal</label>
                                <input class="form-control" type="date"
                                name="tanggal1" value="<?=isset($_POST['tanggal1'])?
                                $_POST['tanggal1'] : date('Y-m-d')?>"required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Sampai Tanggal</label>
                                <input class="form-control" type="date"
                                name="tanggal2" value="<?=isset($_POST['tanggal2'])?
                                $_POST['tanggal2'] : date('Y-m-d')?>"required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button class="btn btn-primary form-control"
                            name="btampilkan"><i class="fa fa-search"></i> Tampilkan
                        </button>
                        </div>
                    </div>
                </form>

                <?php 
                if (isset($_POST['btampilkan'])) :
                
                ?>
                <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                             <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Lengkap</th>
                                <th>Jabatan</th>
                                <th>Asal Instansi</th>
                                <th>Aksi</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $tgl1 = $_POST['tanggal1'];
                            $tgl2 = $_POST['tanggal2'];

                            $tampil = mysqli_query($koneksi, "SELECT * FROM kunjungan where 
                            tanggal BETWEEN '$tgl1' and '$tgl2' order by id_kunjungan desc");
                    
                            $no = 1;
                            while ($data = mysqli_fetch_array($tampil)) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['tanggal'] ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['jabatan'] ?></td>
                                    <td><?= $data['asal'] ?></td>
                                    <td>
								 <a href="?page=view-kunjungan&kode=<?php echo $data['nama']; ?>" title="Detail"
								  class="btn btn-info btn-sm">
									 <i class="fa fa-eye"></i>
								 </a>
								 <a href="?page=del-kunjungan&kode=<?php echo $data['nama']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
								  title="Hapus" class="btn btn-danger btn-sm">
									 <i class="fa fa-trash"></i>
							 </td>

                                </tr>
                           <?php } ?>
                        </tbody>
                    </table>

                    <center>
                        <form method="POST" action="excel_kunjungan.php">
                            <div class="col-md-4">
                                <input type="hidden" name="tanggal1" value="<?= @$_POST
                                ['tanggal1'] ?>">
                                <input type="hidden" name="tanggal2" value="<?= @$_POST
                                ['tanggal2'] ?>">
    
                                <button class="btn btn-success form-control"
                                name="bexport"><i class="fa fa-download"></i> Export Data 
                                Excel</button>
                            </div>   
                        </form>
                    </center>

                </div>

                <?php endif; ?>

            </div>
        </div>
    </div>

</div>
<!--akhir row-->

<?php include "footer.php"; ?>