<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tamu WHERE nama='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>
<div class="row">

	<div class="col-md-12">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Detail tamu</h3>

				<div class="card-tools">
				</div>
			</div>
			<div class="card-body p-0">
				<table class="table">
					<tbody>
						<tr>
							<td style="width: 150px">
								<b>Tanggal</b>
							</td>
							<td>:
								<?php echo $data_cek['tanggal']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Nama</b>
							</td>
							<td>:
								<?php echo $data_cek['nama']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>Jabatan</b>
							</td>
							<td>:
								<?php echo $data_cek['jabatan']; ?>
							</td>
						</tr>
						<tr>
							<td style="width: 150px">
								<b>asal</b>
							</td>
							<td>:
								<?php echo $data_cek['asal']; ?>
							</td>
						</tr>
				
					</tbody>
				</table>
				<div class="card-footer">
					<a href="?page=tamu" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</div>
	</div>

</div>