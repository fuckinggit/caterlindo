<?php
$nm_tabel = 'tb_karyawan';
$nm_halaman = $_GET['p'];
$judul = "Karyawan";

if (isset($_GET['p'])) {
	if (isset($_GET['v'])) {
		
		$v = $_GET['v'];
		
		if ($v == 'input') {
			include_once 'input.php';
		} if ($v == 'detail') {
			include_once 'detail.php';
		} if ($v == 'edit') {
			include_once 'edit.php';
		} if ($v == 'delete') {
			include_once 'delete.php';
		}
	}
} if (!isset($_GET['v'])) {
	?>
	<div class="content-panel">
		<div class="panel-heading">
			<h3><i class="fa fa-angle-right"></i> Data <?php echo $judul; ?> <small>Data <?php echo $judul; ?></small></h3>
		</div>
	</div>

	<div class="clearfix"></div>

	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="form-panel">
				<div class="pull-right">
					<!-- <a href="?p=buku_data&v=buku_import" class="btn btn-success" type="button"><i class="fa fa-file-excel-o"></i> Import File Excel</a> -->
					<a href="?<?php echo $link; ?>&v=input" class="btn btn-primary" type="button"><i class="fa fa-plus"></i> Tambah Data</a>
				</div>
				<div class="x_title">
					<h2>Tabel <?php echo $judul; ?></h2>
				</div>
				<div class="x_content">
					<table id="dataTable" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style="width:1%;">No.</th>
								<th style="width:10%;">NIK</th>
								<th style="width:15%;">Nama</th>
								<th style="width:10%;">Jabatan</th>
								<th style="width:10%;">Bagian</th>
								<th style="width:5%;">Sub Unit</th>
								<th style="width:5%;">Status Kerja</th>
								<th style="width:1%; text-align:center;">Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 0;
							
							$hasil = $crud->read($nm_tabel);
							
							if (!empty($hasil)) {
								foreach($hasil as $row) {
									$no++;
									?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $row['nik_karyawan']; ?></td>
										<td><?php echo $row['nm_karyawan']; ?></td>
										<td>
											<?php
											$jabatan = $crud->read('tb_jabatan', array('where' => array('kd_jabatan' => $row['kd_jabatan']), 'return_type' => 'single'));
											if (!empty($jabatan)) {
												echo $jabatan['nm_jabatan'];
											}
											?>
										</td>
										<td>
											<?php
											$bagian = $crud->read('tb_bagian', array('where' => array('kd_bagian' => $row['kd_bagian']), 'return_type' => 'single'));
											if (!empty($bagian)) {
												echo $bagian['nm_bagian'];
											}
											?>
										</td>
										<td>
											<?php
											$unit = $crud->read('tm_organisasi', array('where' => array('kd_organisasi' => $row['kd_organisasi']), 'return_type' => 'single'));
											if (!empty($unit)) {
												echo $unit['nm_organisasi'];
											}
											?>
										</td>
										<td>
											<?php
											$status = $crud->read('tb_status_kerja', array('where' => array('kd_status_kerja' => $row['kd_status_kerja']), 'return_type' => 'single'));
											if (!empty($status)) {
												echo $status['nm_status_kerja'];
											}
											?>
										</td>
										<td align="center">
											<div class="btn-group">
												<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
													Opsi <span class="caret"></span>
												</button>
												<ul class="dropdown-menu" role="menu">
													<li><a href="?<?php echo $link; ?>&v=detail&id=<?php echo $row['kd_karyawan']; ?>"><i class="fa fa-book"></i> Detail</a></li>
													<li class="divider"></li>
													<!-- <li><a href="?p=<?php echo $nm_halaman; ?>&v=edit&id=<?php echo $row['kd_karyawan']; ?>"><i class="fa fa-pencil"></i> Edit</a></li> -->
													<li><a href="?<?php echo $link; ?>&v=delete&id=<?php echo $row['kd_karyawan']; ?>"><i class="fa fa-times"></i> Delete</a></li>
												</ul>
											</div>
										</td>
									</tr>
									<?php
								}
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php
}