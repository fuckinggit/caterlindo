<?php
if (isset($_POST['btnInputAdmin'])) {
	include_once 'act/admin_actInput.php';
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
				<a href="?<?php echo $link; ?>" class="btn btn-info" type="button">Kembali</a>
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
							<input type="text" id="idAdmin" name="txtIdAdmin" class="form-control" value="<?php echo $admin->buatIdAdmin(); ?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="usernameAdmin">
							Username Admin <span class="required">*</span>
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<input type="text" id="usernameAdmin" required="required" placeholder="Username Admin" name="txtUsername" class="form-control col-md-7 col-xs-12" autofocus>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="passAdmin">
							Password <span class="required">*</span>
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<input type="password" id="passAdmin" required="required" placeholder="Password" name="txtPassword" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<input type="password" placeholder="Konfirmasi Password" name="txtPassKonfirmasi" class="form-control col-md-7 col-xs-12" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">
							Link Data Karyawan
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<input type="checkbox" name="checkKaryawan" id="idCheckKaryawan" value="1" />
						</div>
					</div>
					<div class="form-group" id="formNamaKaryawan" style="display:none;">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">
							Nama Karyawan
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<input type="text" id="idNmKaryawan" placeholder="Nama Karyawan" name="txtNmKaryawan" class="form-control col-md-7 col-xs-12">
							<input type="hidden" id="idKdKaryawan" name="txtKdKaryawan" class="form-control col-md-7 col-xs-12" readonly>
						</div>
					</div>
					<hr />
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipeAdmin">
							Tipe Admin <span class="required">*</span>
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<select id="tipeAdmin" required="required" name="selTipeAdmin" class="form-control col-md-7 col-xs-12">
								<option value="">-- Pilih Tipe Admin --</option>
								<option value="0">Admin</option>
								<option value="1">Karyawan</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="statusAdmin">
							Status <span class="required">*</span>
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<select id="statusAdmin" required="required" name="selStatusAdmin" class="form-control col-md-7 col-xs-12">
								<option value="">-- Pilih Status Admin --</option>
								<option value="1">Aktif</option>
								<option value="0">Tidak Aktif</option>
							</select>
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
							<button type="submit" class="btn btn-primary" name="btnInputAdmin">Input</button>
							<button type="reset" class="btn btn-warning">Batal</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<script>
$(document).on('click', '#idCheckKaryawan', function() {
	var check = document.getElementById("idCheckKaryawan");
	
	if (check.checked) {
		$('#formNamaKaryawan').slideDown();
	} else {
		document.getElementById('idNmKaryawan').value = '';
		document.getElementById('idKdKaryawan').value = '';
		$('#formNamaKaryawan').slideUp();
	}
});

$('#idNmKaryawan').autocomplete({
	source: function( request, response ) {
		$.ajax({
			url : 'halaman/modul_admin/admin/autoComplete.php',
			dataType: "json",
			data: {
			   name_startsWith: request.term,
			   type: 'tb_karyawan'
			},
			 success: function( data ) {
				 response( $.map( data, function( item ) {
					var code = item.split("|");
					return {
						label: code[0],
						value: code[0],
						data : item
					}
				}));
			}
		});
	},
	autoFocus: true,
	minLength: 0,
	select: function(event, ui) {
		var names = ui.item.data.split("|");
		$('#idKdKaryawan').val(names[1]);
	}
});
</script>