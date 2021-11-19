<?php include "header.php"; ?>
<link rel="icon" href="assets/img/LOGO DPRD.png" type="image/x-icon">

<?php

if(isset($_POST['asimpan'])) {
    $tgl = date ('Y-m-d');

    $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
    $jabatan = htmlspecialchars($_POST['jabatan'], ENT_QUOTES);
    $asal = htmlspecialchars($_POST['asal'], ENT_QUOTES);
    $tujuan = htmlspecialchars($_POST['tujuan'], ENT_QUOTES);
    $tema = htmlspecialchars($_POST['tema'], ENT_QUOTES);
    $jam = htmlspecialchars($_POST['jam'], ENT_QUOTES);
    $jumlah = htmlspecialchars($_POST['jumlah'], ENT_QUOTES);
    $no_tlp = htmlspecialchars($_POST['no_tlp'], ENT_QUOTES);

    $simpan = mysqli_query($koneksi, "INSERT INTO kunjungan VALUES ('','$tgl','$nama', '$jabatan', '$asal', '$tujuan', 
    '$tema', '$jam', '$jumlah', '$no_tlp' )");

    if($simpan) {
      echo "<script>alert('Simpan Data Sukses, Terima Kasih....!');
      document.location='data_kunjungan.php'</script>";
      echo "<script>alert('Simpan Data GAGAL...!');
      document.location='?'</script>";  
    }

}

?>

    <!--head-->
        <div class="head text-center">
            <img src="assets/img/LOGO DPRD.png" width="200">
            <h1 class="h4 text-gray-900 mb4">Sistem Informasi Buku Tamu</h1>
        </div>
        <!--end head-->

        <!-- awal row-->
        <div class="row nt-2">
            <!--col lg7-->
            <div class="col-lg-7 mb-3">
                <div class="card shadow bg-light">
                    <!--card body-->
                    <div class="card-body">
                            <div class="text-center">
                                <h1 class="h4 text-grey-900-mb-4">Identitas Tamu!</h1>
                            </div>
                            <form class="user" method="POST" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control
                                    form-control-user" name="nama" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control
                                    form-control-user" name="jabatan" placeholder="Jabatan" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control
                                    form-control-user" name="asal" placeholder="Asal Instansi" required>
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control
                                    form-control-user" name="tujuan" placeholder="Tujuan" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control
                                    form-control-user" name="tema" placeholder="Tema" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control
                                    form-control-user" name="jam" placeholder="Jam Kunjungan" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control
                                    form-control-user" name="jumlah" placeholder="jumlah Yang Berkunjung" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control
                                    form-control-user" name="no_tlp" placeholder="No Tlp" required>
                                </div>
                                
                                <button type="submit" name="asimpan" class="btn btn-primary btn user 
                                btn-block">Simpan Data</button>
                            </form>
                           <!-- Divider -->
                            <hr class="sidebar-divider">

                             <!-- Heading -->
                            <div class="sidebar-heading"></div>
           
                            <div class="copyright text-center my-auto">
                        <span>copyright@DPRD KABUPATEN CIRREBON</span>
                    </div>
                        </div>
                        <!--end card body-->
                </div>
            </div>
            <!--endcol lg7-->

            <!--col lg5-->
            <div class="col-lg-5 mb-3">
                <div class="card shadow bg-light">
                    <!--card body-->
                    <div class="card-body">
                        <div class="text-center">
                            <h1 class="h4 text-grey-900-mb-4">Statistik Pengunjung</h1>
                        </div>
                        <?php 
                            //deklarasi tanggal

                            //menampilkan tanggal sekarang
                            $tgl_sekarang = date('Y-m-d');

                            //menampilkan tanggal kemarin
                            $kemarin = date('Y-m-d', strtotime('-1 day', strtotime(date('Y-m-d'))))
                            ;

                            //mendapatkan6 hari sebelum tanggal sekarang
                            $seminggu= date('Y-m-d h:i:s', strtotime('-1 week +1 day', strtotime
                            ('$tgl_sekarang')));

                            $sekarang = date('Y-m-d h:i:s');

                            //persiapan query tampilan data pengunjung
                            $tgl_sekarang = mysqli_fetch_array(mysqli_query
                                ($koneksi, 
                                "SELECT count(*) FROM kunjungan where tanggal like '%$tgl_sekarang%'"
                                ));
                            $kemarin = mysqli_fetch_array(mysqli_query
                                ($koneksi, 
                                "SELECT count(*) FROM kunjungan where tanggal like '%$kemarin%'"
                                ));
                            $seminggu = mysqli_fetch_array(mysqli_query
                                ($koneksi, 
                                "SELECT count(*) FROM kunjungan where tanggal BETWEEN '$seminggu' and
                                '$sekarang'"
                                ));

                                $bulan_ini = date('m');
                            $sebulan = mysqli_fetch_array(mysqli_query
                                ($koneksi, 
                                "SELECT count(*) FROM kunjungan where month(tanggal) = '$bulan_ini'"
                                ));
                            $keseluruhan = mysqli_fetch_array(mysqli_query
                                ($koneksi, 
                                "SELECT count(*) FROM kunjungan"
                                ));
                        
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <td>Hari Ini</td>
                                <td>: <?= $tgl_sekarang[0] ?></td>
                            </tr>
                            <tr>
                                <td>Kemarin</td>
                                <td>: <?= $kemarin[0] ?></td>
                            </tr>
                            <tr>
                                <td>Minggu Ini</td>
                                <td>: <?= $seminggu[0] ?></td>
                            </tr>
                            <tr>
                                <td>Bulan Ini</td> 
                                <td>: <?= $sebulan[0] ?></td>
                            </tr>
                            <tr>
                                <td>Keseluruhan</td>
                                <td>: <?= $keseluruhan[0] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!--end col lg5-->

        </div>
        <!--end row-->
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data tamu Hari Ini [<?=
            date('d-m-Y') ?>]</h6>
        </div>
            <div class="card-body">
                 <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                             <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Lengkap</th>
                                <th>Jabatan</th>
                                <th>Asal Instansi</th>
                                <th>Tujuan Kunjungan</th>
                                <th>Tema Kunjungan</th>
                                <th>Jam Kunjungan</th>
                                <th>Jumlah Pengunjung</th>
                                <th>No Tlp</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Nama Lengkap</th>
                                <th>Jabatan</th>
                                <th>Asal Instansi</th>
                                <th>Tujuan Kunjungan</th>
                                <th>Tema Kunjungan</th>
                                <th>Jam Kunjungan</th>
                                <th>Jumlah Pengunjung</th>
                                <th>No Tlp</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $tgl = date('Y-m-d');
                            $tampil = mysqli_query($koneksi, "SELECT * FROM kunjungan where 
                            tanggal like '%$tgl%' order by id_kunjungan desc");
                            $no = 1;
                            while ($data = mysqli_fetch_array($tampil)) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['tanggal'] ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['jabatan'] ?></td>
                                    <td><?= $data['asal'] ?></td>
                                    <td><?= $data['tujuan'] ?></td>
                                    <td><?= $data['tema'] ?></td>
                                    <td><?= $data['jam'] ?></td>
                                    <td><?= $data['jumlah'] ?></td>
                                    <td><?= $data['no_tlp'] ?></td>
                                </tr>
                           <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php include "footer.php"; ?>