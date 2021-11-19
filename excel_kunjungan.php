<?php
include "inc/koneksi.php";

//persiapan untuk excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Tamu kunjungan.xls");
header("Pragma: no=cache");
header("Expires:0");
?>

<table border="1">
    <thead>
        <tr>
            <th colspan="5"> Rekapitulasi Data Tamu Kunjungan Humas<br>DPRD Kabupaten Cirebon</th>
        </tr>
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
                <td><?= $data['tujuan'] ?></td>
                <td><?= $data['tema'] ?></td>
                <td><?= $data['jam'] ?></td>
                <td><?= $data['jumlah'] ?></td>
                <td><?= $data['no_tlp'] ?></td>
            </tr>
       <?php } ?>
    </tbody>
</table>