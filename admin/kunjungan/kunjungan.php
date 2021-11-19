<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Tamu Kunjungan</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
			<a href="excel_kunjungan.php"
			 title="Data Tamu" class="btn btn-success"><i class="fas fa-print"></i> Export Excel</a>
			 <a href="?page=rekapk"
			 title="data tamu" class="btn btn-primary"><i class="#"></i>Per Periode</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Nama</th>
						<th>Jabatan</th>
						<th>Asal Instansi</th>
                              <th>Tujuan Kunjungan</th>
                              <th>Tema Kunjungan</th>
                              <th>Jam Kunjungan</th>
                              <th>Jumlah Pengunjung</th>
                              <th>No Tlp</th>
						<th>Aksi</th>
					</tr>
				</thead>
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
							</tfoot>
						</table>
					</div>
				</div>
				<!-- /.card-body -->