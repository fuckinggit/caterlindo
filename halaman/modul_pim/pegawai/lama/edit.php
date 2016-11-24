<?php
$admin->kd_admin = paramDecrypt($_GET['id']);
$admin->detailAdmin();

if (isset($_POST['btnEditAdmin'])) {
	include_once 'act/admin_actEdit.php';
}
?>
<div class="content-panel">
	<div class="panel-heading">
		<h3><i class="fa fa-angle-right"></i> Input Data <small>Form Input Data Admin</small></h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-panel">
			<div class="pull-right">
				<a href="?p=admin_data" class="btn btn-info" type="button">Kembali</a>
			</div>
			<div class="x_title">
				<h2>Form Input <small>Data Admin</small></h2>
			</div>
			<div class="x_content">
				<br />
				<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data">

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="idAdmin">
							ID Admin <span class="required">*</span>
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<input type="text" id="idAdmin" name="txtIdAdmin" class="form-control" value="<?php echo $_GET['id']; ?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="usernameAdmin">
							Username Admin <span class="required">*</span>
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<input type="text" id="usernameAdmin" required="required" placeholder="Username Admin" name="txtUsername" value="<?php echo $admin->username; ?>" class="form-control col-md-7 col-xs-12" autofocus>
							<input type="hidden" id="usernameAdmin" name="txtUsernameLama" value="<?php echo $admin->username; ?>" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="passAdmin">
							Password <span class="required">*</span>
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<input type="password" id="passAdmin" placeholder="Password" name="txtPassword" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<input type="password" placeholder="Konfirmasi Password" name="txtPassKonfirmasi" class="form-control col-md-7 col-xs-12">
							<span style="color: red;">*Kosongkan password jika tidak diubah</span>
						</div>
					</div>
					<hr />
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipeAdmin">
							Tipe Admin <span class="required">*</span>
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<select id="tipeAdmin" required="required" name="selTipeAdmin" class="form-control col-md-7 col-xs-12">
								<?php
								if ($admin->tipe_admin == '0') {$tipe_a = 'selected'; $tipe_b = '';}
								if ($admin->tipe_admin == '1') {$tipe_a = ''; $tipe_b = 'selected';}
								?>
								<option value="">-- Pilih Tipe Admin --</option>
								<option value="0" <?php echo $tipe_a; ?>>Admin</option>
								<option value="1" <?php echo $tipe_b; ?>>Karyawan</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="statusAdmin">
							Status <span class="required">*</span>
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<select id="statusAdmin" required="required" name="selStatusAdmin" class="form-control col-md-7 col-xs-12">
								<?php
								if ($admin->status == '0') {$status_a = 'selected'; $status_b = '';}
								if ($admin->status == '1') {$status_a = ''; $status_b = 'selected';}
								?>
								<option value="">-- Pilih Status Admin --</option>
								<option value="1" <?php echo $status_b; ?>>Aktif</option>
								<option value="0" <?php echo $status_a; ?>>Tidak Aktif</option>
							</select>
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
							<button type="submit" class="btn btn-primary" name="btnEditAdmin">Edit</button>
							<button type="reset" class="btn btn-warning">Batal</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>