<?php
$kode = $crud->buatID($nm_tabel, array('select' => 'MAX(id), MAX(kd_karyawan) as IDMax'), 'STF');
$kode_admin = $crud->buatID('tb_admin', array('select' => 'MAX(id), MAX(kd_admin) as IDMax'), 'ADM');
if (isset($_POST['btnInput'])) {
	include_once 'act/actInput.php';
}
?>
<div class="content-panel">
	<div class="panel-heading">
		<h3><i class="fa fa-angle-right"></i> Input Data <small>Form Input Data <?php echo $judul; ?></small></h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-panel">
			<div class="pull-right">
				<a href="?<?php echo $link; ?>" class="btn btn-info" type="button">Kembali</a>
			</div>
			<div class="x_title">
				<h2>Form Input <small>Data <?php echo $judul; ?></small></h2>
			</div>
			<div class="x_content">
				<br />
				<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data">

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="idNikPegawai">
							NIK Karyawan <span class="required">*</span>
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<input type="hidden" id="idPegawai" name="txtIdPegawai" class="form-control" value="<?php echo $kode; ?>" readonly>
							<input type="text" id="idNikPegawai" name="txtNikPegawai" class="form-control" placeholder="NIK Karyawan" onkeyup="checkNik(this.val)" required="required" autofocus>
						</div>
						<div id="idAlertNik" class="control-label col-md-6 col-sm-3 col-xs-12"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="idNama">
							Nama Karyawan <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="idNama" name="txtNama" placeholder="Nama Karyawan" required="required" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="idPhoto">
							Pas Photo <span class="required">*</span>
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<input type="file" id="idPhoto" name="fileFoto" required="required" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="checkForm">
							Buat Akun Login
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<input type="checkbox" name="chkForm" id="checkForm" value="check">
						</div>
					</div>
					
					<div id="formLogin" style="display:none;">
						<hr />
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="usernameAdmin">
								Username <span class="required">*</span>
							</label>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<input type="hidden" id="idAdmin" name="txtIdAdmin" class="form-control" value="<?php echo $kode_admin; ?>" readonly>
								<input type="text" id="usernameAdmin" placeholder="Username" name="txtUsername" class="form-control col-md-7 col-xs-12">
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
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="statusAdmin">
								Status <span class="required">*</span>
							</label>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<select id="statusAdmin" name="selStatusAdmin" class="form-control col-md-7 col-xs-12">
									<option value="">-- Pilih Status Akun --</option>
									<option value="1">Aktif</option>
									<option value="0">Tidak Aktif</option>
								</select>
							</div>
						</div>
					</div>
					
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
							<button type="submit" class="btn btn-primary" name="btnInput">Input</button>
							<button type="reset" class="btn btn-warning">Batal</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
window.onload = function () {
	document.getElementById('checkForm').onclick = function () {
		if (this.checked)
			document.getElementById('formLogin').style.display = 'block';
		else
			document.getElementById('formLogin').style.display = 'none';
	}
}

function checkNik(nik) {
	if (nik == "") {
        document.getElementById("idAlertNik").innerHTML = "";
        return;
	} else {
		$.post("halaman/modul_pim/pegawai/checkNik.php", {  'nik' : $('#idNikPegawai').val() })
			.done(function(data){
				$('#idAlertNik').html(data);
			});
	}
}
</script>