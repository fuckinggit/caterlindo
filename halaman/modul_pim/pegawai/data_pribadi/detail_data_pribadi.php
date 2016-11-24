<?php
if (isset($_POST['btnSimpan'])) {
	$data = array('nm_karyawan' => $_POST['txtNamaKaryawan'],
				'jekel' => $_POST['selJekel'],
				'status_nikah' => $_POST['selNikah'],
				'kebangsaan' => $_POST['selBangsa']
			);
	$where = array('kd_karyawan' => $_POST['txtIdKaryawan']);
	$update = $crud->update('tb_karyawan', $data, $where);
	
	if ($update) {
		$err = '<div class="alert alert-success alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <strong>Berhasil!</strong> Berhasil mengubah data pribadi.
		</div>';
	} else {
		$err = '<div class="alert alert-danger alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <strong>Error!</strong> Gagal mengubah data, Kesalahan sistem!
		</div>';
	}
}
?>

<div class="col-md-12 col-sm-12 mb">
	<div class="grey-panel">
		<div class="grey-header">
			<?php
			if (isset($_GET['menu'])) {
				$menu = $_GET['menu'];
				$judul = ucfirst(str_replace('_', ' ', $menu));
			} else {
				$judul = 'Data pribadi';
			}
			echo '<h5>'.$judul.'</h5>';
			?>
		</div>
		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data" style="margin-left:15px; margin-right:15px">
			<?php if(isset($_POST['btnSimpan'])) {echo $err;} ?>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idNama">
					Nama Lengkap <span class="required">*</span>
				</label>
				<div class="col-md-8 col-sm-6 col-xs-12">
					<input type="text" id="idNama" name="txtNamaKaryawan" class="form-control" value="<?php  if(isset($_POST['btnSimpan'])) {echo $_POST['txtNamaKaryawan'];} else {echo $detail['nm_karyawan'];} ?>" <?php if(!isset($_POST['btnEdit'])) {echo 'readonly';} ?>>
				</div>
			</div>
			<hr />
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idId">
					ID Karyawan <span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<input type="text" id="idId" name="txtIdKaryawan" class="form-control" value="<?php echo $_GET['id']; ?>" readonly>
				</div>
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idId">
					NIK Karyawan <span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<input type="text" id="idId" name="txtNikKaryawan" class="form-control" value="<?php echo $detail['nik_karyawan']; ?>" readonly>
				</div>
			</div>
			<hr />
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-4 col-xs-12" for="idJekel">
					Jenis Kelamin <span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="idJekel" name="selJekel" <?php if(!isset($_POST['btnEdit'])) {echo 'readonly';} ?>>
						<option value="">-- Pilih Jenis Kelamin --</option>
						<?php
						if (isset($_POST['btnSimpan'])) {
							if ($_POST['selJekel'] == '0') {$sel_l = 'selected'; $sel_p = '';}
							if ($_POST['selJekel'] == '1') {$sel_l = ''; $sel_p = 'selected';}
						} else {
							if ($detail['jekel'] == '0') {$sel_l = 'selected'; $sel_p = '';}
							if ($detail['jekel'] == '1') {$sel_l = ''; $sel_p = 'selected';}
						}
						?>
						<option value="0" <?php echo $sel_l; ?>>Laki - Laki</option>
						<option value="1" <?php echo $sel_p; ?>>Perempuan</option>
					</select>
				</div>
				
				<label class="control-label col-md-2 col-sm-4 col-xs-12" for="idNikah">
					Status Nikah <span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="idNikah" name="selNikah" <?php if(!isset($_POST['btnEdit'])) {echo 'readonly';} ?>>
						<option value="">-- Pilih Status Nikah --</option>
						<?php
						if (isset($_POST['btnSimpan'])) {
							if ($_POST['selNikah'] == '0') {$sel_a = 'selected'; $sel_b = ''; $sel_c = '';}
							if ($_POST['selNikah'] == '1') {$sel_a = ''; $sel_b = 'selected'; $sel_c = '';}
							if ($_POST['selNikah'] == '2') {$sel_a = ''; $sel_b = ''; $sel_c = 'selected';}
						} else {
							if ($detail['status_nikah'] == '0') {$sel_a = 'selected'; $sel_b = ''; $sel_c = '';}
							if ($detail['status_nikah'] == '1') {$sel_a = ''; $sel_b = 'selected'; $sel_c = '';}
							if ($detail['status_nikah'] == '2') {$sel_a = ''; $sel_b = ''; $sel_c = 'selected';}
						}
						?>
						<option value="0" <?php echo $sel_a; ?>>Belum Menikah</option>
						<option value="1" <?php echo $sel_b; ?>>Nikah</option>
						<option value="2" <?php echo $sel_c; ?>>Bercerai</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idBangsa">
					Kebangsaan <span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="idBangsa" name="selBangsa" <?php if(!isset($_POST['btnEdit'])) {echo 'readonly';} ?>>
						<option value="">-- Pilih Kewarganegaraan --</option>
						<?php
						if (isset($_POST['btnSimpan'])) {
							if ($_POST['selBangsa'] == 'WNI') {$sel_na = 'selected'; $sel_nb = '';}
							if ($_POST['selBangsa'] == 'WNA') {$sel_na = ''; $sel_nb = 'selected';}
						} else {
							if ($detail['kebangsaan'] == 'WNI') {$sel_na = 'selected'; $sel_nb = '';}
							if ($detail['kebangsaan'] == 'WNA') {$sel_na = ''; $sel_nb = 'selected';}
						}
						?>
						<option value="WNI" <?php echo $sel_na; ?>>WNI</option>
						<option value="WNA" <?php echo $sel_nb; ?>>WNA</option>
					</select>
				</div>
			</div>
			
			<hr />
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