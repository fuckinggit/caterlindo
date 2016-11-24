<?php
include_once 'objects/tb_admin.php';

$admin = new Admin($db);

if (isset($_GET['p'])) {
	if (isset($_GET['v'])) {
		
		$v = $_GET['v'];
		
		if ($v == 'input') {
			include_once 'admin_input.php';
		} if ($v == 'detail') {
			include_once 'admin_detail.php';
		} if ($v == 'edit') {
			include_once 'admin_edit.php';
		} if ($v == 'delete') {
			include_once 'admin_delete.php';
		}
	}
} if (!isset($_GET['v'])) {
	?>
	<div class="content-panel">
		<div class="panel-heading">
			<h3><i class="fa fa-angle-right"></i> Data Admin <small>Data Admin </small></h3>
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
					<h2>Tabel Admin</h2>
				</div>
				<div class="x_content">
					<table id="dataTable" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th style="width:5%;">No.</th>
								<th style="width:10%;">Username</th>
								<th style="width:10%;">NIK - Nama Pegawai</th>
								<th style="width:10%;">Status</th>
								<th style="width:10%;">Tipe Admin</th>
								<th style="width:5%; text-align:center;">Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 0;
							
							$admin->kd_admin = $_SESSION['kd_admin'];
							$stmt = $admin->dataAdminBukanSaya();
							
							while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
								$no++;
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $row['username']; ?></td>
									<td>
										<?php
										if (empty($row['kd_karyawan'])) {
											echo '-';
										} else {
											$nm = $crud->read('tb_karyawan', array('where' => array('kd_karyawan' => $row['kd_karyawan']), 'return_type' => 'single'));
											if (!empty($nm)) {
												echo $row['kd_karyawan'].' - '.$nm['nm_karyawan'];
											}
										}
										?>
									</td>
									<td><?php echo statusAdmin($row['status']); ?></td>
									<td><?php echo tipeAdmin($row['tipe_admin']); ?></td>
									<td align="center">
										<div class="btn-group">
											<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
												Opsi <span class="caret"></span>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li><a href="?<?php echo $link; ?>&v=detail&id=<?php echo paramEncrypt($row['kd_admin']); ?>"><i class="fa fa-book"></i> Detail</a></li>
												<li class="divider"></li>
												<li><a href="?<?php echo $link; ?>&v=edit&id=<?php echo paramEncrypt($row['kd_admin']); ?>"><i class="fa fa-pencil"></i> Edit</a></li>
												<li><a href="?<?php echo $link; ?>&v=delete&id=<?php echo paramEncrypt($row['kd_admin']); ?>"><i class="fa fa-times"></i> Delete</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<?php
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