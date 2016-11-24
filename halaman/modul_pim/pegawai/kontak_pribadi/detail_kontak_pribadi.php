<?php
if (isset($_GET['menu'])) {
	$menu = $_GET['menu'];
	$judul = ucfirst(str_replace('_', ' ', $menu));
} else {
	$judul = 'Data pribadi';
}

if (isset($_POST['btnSimpan'])) {
	$data = array(
		'alamat_jalan_1' => $_POST['txtAlamat1'],
		'alamat_jalan_2' => $_POST['txtAlamat2'],
		'kd_provinsi' => $_POST['selProvinsi'],
		'kd_kota' => $_POST['selKota'],
		'kdpos' => $_POST['txtKodePos'],
		'telp_rumah' => $_POST['txtTelp1'],
		'telp_mobile' => $_POST['txtTelp2'],
		'telp_kantor' => $_POST['txtTelp2'],
		'email_utama' => $_POST['txtEmail1'],
		'email_lain' => $_POST['txtEmail2']
	);
	$where = array('kd_karyawan' => $_GET['id']);
	$update = $crud->update('tb_karyawan', $data, $where);
	
	if ($update) {
		$err = '<div class="alert alert-success alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <strong>Berhasil!</strong> Berhasil mengubah data '.$judul.'.
		</div>';
	} else {
		$err = '<div class="alert alert-danger alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <strong>Error!</strong> Gagal mengubah '.$judul.', Kesalahan sistem!
		</div>';
	}
}
?>
<div class="col-md-12 col-sm-12 mb">
	<div class="grey-panel donut-chart">
		<div class="grey-header">
			<?php
			echo '<h5>'.$judul.'</h5>';
			?>
		</div>
		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data" style="margin-left:15px; margin-right:15px">
			<?php
			if (isset($_POST['btnSimpan'])) {echo $err;}
			?>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idAlamat1">
					Alamat 1
				</label>
				<div class="col-md-8 col-sm-6 col-xs-12">
					<input type="text" id="idAlamat1" name="txtAlamat1" class="form-control" value="<?php  if(isset($_POST['btnSimpan'])) {echo $_POST['txtAlamat1'];} else {echo $detail['alamat_jalan_1'];} ?>" <?php if(!isset($_POST['btnEdit'])) {echo 'readonly';} ?>>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idAlamat2">
					Alamat 2
				</label>
				<div class="col-md-8 col-sm-6 col-xs-12">
					<input type="text" id="idAlamat2" name="txtAlamat2" class="form-control" value="<?php  if(isset($_POST['btnSimpan'])) {echo $_POST['txtAlamat2'];} else {echo $detail['alamat_jalan_2'];} ?>" <?php if(!isset($_POST['btnEdit'])) {echo 'readonly';} ?>>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idProvinsi">
					Provinsi <span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="idProvinsi" name="selProvinsi" onchange="pilihKota(this.value);" <?php if(!isset($_POST['btnEdit'])) {echo 'readonly';} ?>>
						<option value="">-- Provinsi --</option>
						<?php
						$d_provinsi = $crud->read('tm_prop');
				
						if(!empty($d_provinsi)){
							foreach($d_provinsi as $provinsi) {
								if ($detail['kd_provinsi'] == $provinsi['fc_kdprop']) {
									echo '<option value="' . $provinsi['fc_kdprop'] . '" selected>' . $provinsi['fv_nmprop'] . '</option>';
								}
								if (isset($_POST['btnSimpan'])) {
									if ($_POST['selProvinsi'] == $provinsi['fc_kdprop']) {
										echo '<option value="' . $provinsi['fc_kdprop'] . '" selected>' . $provinsi['fv_nmprop'] . '</option>';
									}
								} else {
									echo '<option value="' . $provinsi['fc_kdprop'] . '">' . $provinsi['fv_nmprop'] . '</option>';
								}
							}
						}
						?>
					</select>
				</div>				
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idKota">
					Kota <span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="idKota" name="selKota" <?php if(!isset($_POST['btnEdit'])) {echo 'readonly';} ?>>
						<option value="">-- Kota --</option>
						<?php
						$d_kota = $crud->read('tm_kota', array('where' => array('fc_kdprop' => $detail['kd_provinsi'])));
				
						if(!empty($d_kota)){
							foreach($d_kota as $kota) {
								if (isset($_POST['btnSimpan'])) {
									if ($_POST['selKota'] == $kota['fc_kdkota']) {
										echo '<option value="' . $kota['fc_kdkota'] . '" selected>' . $kota['fv_nmkota'] . '</option>';
									} else {
										echo '<option value="' . $kota['fc_kdkota'] . '">' . $kota['fv_nmkota'] . '</option>';
									}
								} else {
									if ($detail['kd_kota'] == $kota['fc_kdkota']) {
										echo '<option value="' . $kota['fc_kdkota'] . '" selected>' . $kota['fv_nmkota'] . '</option>';
									} else {
										echo '<option value="' . $kota['fc_kdkota'] . '">' . $kota['fv_nmkota'] . '</option>';
									}
								}
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idKodePos">
					Kode Pos
				</label>
				<div class="col-md-2 col-sm-6 col-xs-12">
					<input type="text" id="idKodePos" name="txtKodePos" class="form-control" value="<?php  if(isset($_POST['btnSimpan'])) {echo $_POST['txtKodePos'];} else {echo $detail['kdpos'];} ?>" <?php if(!isset($_POST['btnEdit'])) {echo 'readonly';} ?>>
				</div>
			</div>
			<hr />
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTelpRumah">
					Telp Rumah
				</label>
				<div class="col-md-2 col-sm-6 col-xs-12">
					<input type="text" id="idTelpRumah" name="txtTelp1" class="form-control" value="<?php  if(isset($_POST['btnSimpan'])) {echo $_POST['txtTelp1'];} else {echo $detail['telp_rumah'];} ?>" <?php if(!isset($_POST['btnEdit'])) {echo 'readonly';} ?>>
				</div>
				<label class="control-label col-md-1 col-sm-2 col-xs-12" for="idTelpHp">
					HP
				</label>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<input type="text" id="idTelpHp" name="txtTelp2" class="form-control" value="<?php  if(isset($_POST['btnSimpan'])) {echo $_POST['txtTelp2'];} else {echo $detail['telp_mobile'];} ?>" <?php if(!isset($_POST['btnEdit'])) {echo 'readonly';} ?>>
				</div>
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTelpKantor">
					Telp Kantor
				</label>
				<div class="col-md-2 col-sm-6 col-xs-12">
					<input type="text" id="idTelpKantor" name="txtTelp2" class="form-control" value="<?php  if(isset($_POST['btnSimpan'])) {echo $_POST['txtTelp2'];} else {echo $detail['telp_kantor'];} ?>" <?php if(!isset($_POST['btnEdit'])) {echo 'readonly';} ?>>
				</div>
			</div>
			<hr/>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idEmail1">
					Email
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<input type="email" id="idEmail1" name="txtEmail1" class="form-control" value="<?php  if(isset($_POST['btnSimpan'])) {echo $_POST['txtEmail1'];} else {echo $detail['email_utama'];} ?>" <?php if(!isset($_POST['btnEdit'])) {echo 'readonly';} ?>>
				</div>
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idEmail2">
					Email Lain
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<input type="email" id="idEmail2" name="txtEmail2" class="form-control" value="<?php  if(isset($_POST['btnSimpan'])) {echo $_POST['txtEmail2'];} else {echo $detail['email_lain'];} ?>" <?php if(!isset($_POST['btnEdit'])) {echo 'readonly';} ?>>
				</div>
			</div>
			
			<div class="ln_solid"></div>
			<div class="form-group">
				<div style="margin-bottom:2%; float:right; margin-right:2%;">
					 <?php if(!isset($_POST['btnEdit'])) {echo '<button type="submit" class="btn btn-primary" name="btnEdit">Edit</button>';} ?>
					 <?php if(isset($_POST['btnEdit'])) {echo '<button type="submit" name="btnSimpan" class="btn btn-warning">Simpan</button>';} ?>
				</div>
			</div>
		</form>
	</div><!-- /grey-panel -->
</div>

<script>
function pilihKota(val){
	$.ajax({
		type: "POST",
		dataType: "html",
		url: "config/selectKotaProvinsi.php",
		data: "selProvinsi="+val,
		success: function(msg){
			if(msg == ''){
				alert('Tidak ada data Kota');
			}
			else{
				document.getElementById("idKota").innerHTML=msg;
			}
		}
	});
};
</script>