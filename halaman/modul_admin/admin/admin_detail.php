<?php
$admin->kd_admin = paramDecrypt($_GET['id']);

$admin->detailAdmin();
?>
<div class="content-panel">
	<div class="panel-heading">
		<h3><i class="fa fa-angle-right"></i> Data Admin <small>Detail Admin</small></h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="row">
	<div class="col-md-12">
		<div class="form-panel">
			<div class="panel-heading">
				<div class="pull-right">
					<a href="?<?php echo $link; ?>" class="btn btn-info" type="button">Kembali</a>
				</div>
				<h2>
					Detail Admin<br />
					<u style="color:blue;"><?php echo $admin->username; ?></u>
				</h2>
			</div>
			<div class="panel-body">	
				<!-- <div class="form-group col-md-3">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<?php
						if (($image->nm_img == '-') or (!file_exists('assets/img/admin/' . $image->nm_img . '')) or ($image->nm_img == '')) {
							?>
							<img src="assets/img/ui-sam.jpg" width="200px" height="200px">
							<?php
						} else {
							?>
							<img src="assets/img/admin/<?php echo $image->nm_img; ?>" width="200px" height="200px">
							<?php
						}
						?>
					</div>
				</div> -->
				<div class="form-group col-md-9">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
						<b>Username</b>
					</label>
					<div class="control-label col-md-9 col-sm-6 col-xs-12">
						<?php echo $admin->username; ?>
					</div>
				</div>
				<div class="form-group col-md-9">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
						<b>Tipe Admin</b>
					</label>
					<div class="control-label col-md-9 col-sm-6 col-xs-12">
						<?php echo tipeAdmin($admin->tipe_admin); ?>
					</div>
				</div>
				<div class="form-group col-md-9">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
						<b>Status Admin</b>
					</label>
					<div class="control-label col-md-9 col-sm-6 col-xs-12">
						<?php echo statusAdmin($admin->status); ?>
					</div>
				</div>
				<div class="form-group col-md-9">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
						<b>Link Data Pegawai</b>
					</label>
					<div class="control-label col-md-9 col-sm-6 col-xs-12">
						<?php
						if (empty($admin->kd_karyawan)) {echo 'Tidak Ada';}
						else {echo '<a href="?p=pegawai_data&idmenu=3&idsubmenu=&v=detail&id='.$admin->kd_karyawan.'" target="_blank">Ada</a>';}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>