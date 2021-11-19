<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Tamu</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
			<a href="excel_tamu.php"
			 title="Data Tamu" class="btn btn-success"><i class="fas fa-print"></i> Export Excel</a>
			 <a href="?page=rekap"
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
						<th>asal</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php
                            $tgl = date('Y-m-d');
                            $tampil = mysqli_query($koneksi, "SELECT * FROM tamu where 
                            tanggal like '%$tgl%' order by id_tamu desc");
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
								 <a href="?page=view-tamu&kode=<?php echo $data['nama']; ?>" title="Detail"
								  class="btn btn-info btn-sm">
									 <i class="fa fa-eye"></i>
								 </a>
								 <a href="?page=del-tamu&kode=<?php echo $data['nama']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
								  title="Hapus" class="btn btn-danger btn-sm">
									 <i class="fa fa-trash"></i>
							 </td>
						 </tr>
                           <?php } ?>

				</tbody>
			</table>
		</div>
	</div>
	<!-- /.card-body -->