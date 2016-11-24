<?php
if (isset($_POST['btnSimpan'])) {
	$data = array(
		'kd_jabatan' => $_POST['selJabatan'],
		'kd_status_kerja' => $_POST['selStatus'],
		'kd_bagian' => $_POST['selBagian'],
		'kd_kat_pekerjaan' => $_POST['selKatKerja'],
		'tgl_masuk' => $_POST['txtTglMasuk'],
		'kd_organisasi' => $_POST['selSubUnit'],
		'kd_lokasi_perusahaan' => $_POST['selLokasi'],
		'tgl_mulai_kontrak' => $_POST['txtKontrakMulai'],
		'tgl_habis_kontrak' => $_POST['txtKontrakHabis'],
		'det_kontrak' => $_POST['txtDetail']
	);
	$where = array('kd_karyawan' => $_GET['id']);
	$update = $crud->update('tb_karyawan', $data, $where);
	
	if ($update) {
		$err = '<div class="alert alert-success alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <strong>Berhasil!</strong> Berhasil mengubah data.
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
	<div class="grey-panel donut-chart">
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
		<?php if (isset($_POST['btnSimpan'])) { echo $err; } ?>
		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data" style="margin-left:15px; margin-right:15px">
		
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idBagian">
					Bagian<span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="idBagian" name="selBagian" <?php if(!isset($_POST['btnEdit'])) {echo 'disabled';} ?> required="required">
						<option value="">-- Bagian --</option>
						<?php
						$d_bagian = $crud->read('tb_bagian', array('order_by' => 'id ASC'));
						if (!empty($d_bagian)) {
							foreach($d_bagian as $dataBagian) {
								if (isset($_POST['btnSimpan'])) {
									if ($_POST['selBagian'] == $dataBagian['kd_bagian']) {
										echo '<option value="'.$dataBagian['kd_bagian'].'" selected>'.$dataBagian['nm_bagian'].'</option>';
									} else {
										echo '<option value="'.$dataBagian['kd_bagian'].'">'.$dataBagian['nm_bagian'].'</option>';
									}
								} else {
									if ($detail['kd_bagian'] == $dataBagian['kd_bagian']) {
										echo '<option value="'.$dataBagian['kd_bagian'].'" selected>'.$dataBagian['nm_bagian'].'</option>';
									} else {
										echo '<option value="'.$dataBagian['kd_bagian'].'">'.$dataBagian['nm_bagian'].'</option>';
									}
								}
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idJabatan">
					Nama Jabatan<span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="idJabatan" name="selJabatan" <?php if(!isset($_POST['btnEdit'])) {echo 'disabled';} ?> onchange="dapatSpek(this.value);" required="required">
						<option value="">-- Nama Jabatan --</option>
						<?php
						$arrayJabatan = "var jabSpeksifikasi = new Array();\n";
						$d_jabatan = $crud->read('tb_jabatan', array('order_by' => 'nm_jabatan ASC'));
						if (!empty($d_jabatan)) {
							foreach($d_jabatan as $dataJabatan) {
								if (isset($_POST['btnSimpan'])) {
									if ($_POST['selJabatan'] == $dataJabatan['kd_jabatan']) {
										echo '<option value="'.$dataJabatan['kd_jabatan'].'" selected>'.$dataJabatan['nm_jabatan'].'</option>';
									} else {
										echo '<option value="'.$dataJabatan['kd_jabatan'].'">'.$dataJabatan['nm_jabatan'].'</option>';
									}
								} else {
									if ($detail['kd_jabatan'] == $dataJabatan['kd_jabatan']) {
										echo '<option value="'.$dataJabatan['kd_jabatan'].'" selected>'.$dataJabatan['nm_jabatan'].'</option>';
									} else {
										echo '<option value="'.$dataJabatan['kd_jabatan'].'">'.$dataJabatan['nm_jabatan'].'</option>';
									}
								}
								$arrayJabatan .= "jabSpeksifikasi['" . $dataJabatan['kd_jabatan'] . "'] = {spek:'" . addslashes($dataJabatan['spesifikasi']) . "'};\n";
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idSpesifikasi">
					Spesifikasi<span class="required">*</span>
				</label>
				<div class="col-md-8 col-sm-6 col-xs-12">
					<?php
					$spek = $crud->read('tb_jabatan', array('select' => 'spesifikasi', 'where' => array('kd_jabatan' => $detail['kd_jabatan']), 'return_type' => 'single'));
					(!empty($spek))?$spek = $spek['spesifikasi']:$spek = '';
					?>
					<input type="text" id="idSpesifikasi" name="txtSpesifikasi" value="<?php echo $spek; ?>" class="form-control" readonly>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idStatus">
					Status Kepegawaian<span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="idStatus" name="selStatus" <?php if(!isset($_POST['btnEdit'])) {echo 'disabled';} ?> required="required">
						<option value="">-- Status --</option>
						<?php
						$d_status = $crud->read('tb_status_kerja', array('order_by' => 'nm_status_kerja ASC'));
						if (!empty($d_status)) {
							foreach($d_status as $dataStatus) {
								if (isset($_POST['btnSimpan'])) {
									if ($_POST['selStatus'] == $dataStatus['kd_status_kerja']) {
										echo '<option value="'.$dataStatus['kd_status_kerja'].'" selected>'.$dataStatus['nm_status_kerja'].'</option>';
									} else {
										echo '<option value="'.$dataStatus['kd_status_kerja'].'">'.$dataStatus['nm_status_kerja'].'</option>';
									}
								} else {
									if ($detail['kd_status_kerja'] == $dataStatus['kd_status_kerja']) {
										echo '<option value="'.$dataStatus['kd_status_kerja'].'" selected>'.$dataStatus['nm_status_kerja'].'</option>';
									} else {
										echo '<option value="'.$dataStatus['kd_status_kerja'].'">'.$dataStatus['nm_status_kerja'].'</option>';
									}
								}
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idKatKerja">
				Kategori Kepegawaian<span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="idKatKerja" name="selKatKerja" <?php if(!isset($_POST['btnEdit'])) {echo 'disabled';} ?> required="required">
						<option value="">-- Kategori --</option>
						<?php
						$d_kat = $crud->read('tb_kat_pekerjaan', array('order_by' => 'nm_kat_pekerjaan ASC'));
						if (!empty($d_kat)) {
							foreach($d_kat as $dataKat) {
								if (isset($_POST['btnSimpan'])) {
									if ($_POST['selKatKerja'] == $dataKat['kd_kat_pekerjaan']) {
										echo '<option value="'.$dataKat['kd_kat_pekerjaan'].'" selected>'.$dataKat['nm_kat_pekerjaan'].'</option>';
									} else {
										echo '<option value="'.$dataKat['kd_kat_pekerjaan'].'">'.$dataKat['nm_kat_pekerjaan'].'</option>';
									}
								} else {
									if ($detail['kd_kat_pekerjaan'] == $dataKat['kd_kat_pekerjaan']) {
										echo '<option value="'.$dataKat['kd_kat_pekerjaan'].'" selected>'.$dataKat['nm_kat_pekerjaan'].'</option>';
									} else {
										echo '<option value="'.$dataKat['kd_kat_pekerjaan'].'">'.$dataKat['nm_kat_pekerjaan'].'</option>';
									}
								}
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTglMasuk">Tanggal Masuk</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<input type="text" id="idTglMasuk" name="txtTglMasuk" placeholder="dd-mm-yyyy" class="form-control dateRangePicker" value="<?php  if(isset($_POST['btnSimpan'])) {echo $_POST['txtTglMasuk'];} else {echo $detail['tgl_masuk'];} ?>" <?php if(!isset($_POST['btnEdit'])) {echo 'disabled';} ?> required="required">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idSubUnit">
				Sub Unit<span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="idSubUnit" name="selSubUnit" <?php if(!isset($_POST['btnEdit'])) {echo 'disabled';} ?> required="required">
						<option value="">-- SubUnit --</option>
						<?php
						$d_unit = $crud->read('tm_organisasi', array('order_by' => 'level ASC'));
						if (!empty($d_unit)) {
							foreach($d_unit as $unit) {
								if (isset($_POST['btnSimpan'])) {
									if ($_POST['selSubUnit'] == $unit['kd_organisasi']) {
										echo '<option value="'.$unit['kd_organisasi'].'" selected>'.$unit['nm_organisasi'].'</option>';
									} else {
										echo '<option value="'.$unit['kd_organisasi'].'">'.$unit['nm_organisasi'].'</option>';
									}
								} else {
									if ($detail['kd_organisasi'] == $unit['kd_organisasi']) {
										echo '<option value="'.$unit['kd_organisasi'].'" selected>'.$unit['nm_organisasi'].'</option>';
									} else {
										echo '<option value="'.$unit['kd_organisasi'].'">'.$unit['nm_organisasi'].'</option>';
									}
								}
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idLokasi">
				Lokasi<span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="idLokasi" name="selLokasi" <?php if(!isset($_POST['btnEdit'])) {echo 'disabled';} ?> required="required">
						<option value="">-- Lokasi --</option>
						<?php
						$d_lokasi = $crud->read('tb_lokasi', array('order_by' => 'id ASC'));
						if (!empty($d_lokasi)) {
							foreach($d_lokasi as $lokasi) {
								if (isset($_POST['btnSimpan'])) {
									if ($_POST['selSubUnit'] == $lokasi['kd_lokasi_perusahaan']) {
										echo '<option value="'.$lokasi['kd_lokasi_perusahaan'].'" selected>'.$lokasi['nm_lokasi_perusahaan'].'</option>';
									} else {
										echo '<option value="'.$lokasi['kd_lokasi_perusahaan'].'">'.$lokasi['nm_lokasi_perusahaan'].'</option>';
									}
								} else {
									if ($detail['kd_lokasi_perusahaan'] == $lokasi['kd_lokasi_perusahaan']) {
										echo '<option value="'.$lokasi['kd_lokasi_perusahaan'].'" selected>'.$lokasi['nm_lokasi_perusahaan'].'</option>';
									} else {
										echo '<option value="'.$lokasi['kd_lokasi_perusahaan'].'">'.$lokasi['nm_lokasi_perusahaan'].'</option>';
									}
								}
							}
						}
						?>
					</select>
				</div>
			</div>
			<hr />
			<div class="grey-header">
				<h5>Kontrak Kepegawaian</h5>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idKontrakMulai">Kontrak Mulai</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<input type="text" id="idKontrakMulai" name="txtKontrakMulai" value="<?php  if(isset($_POST['btnSimpan'])) {echo $_POST['txtKontrakMulai'];} else {(!empty($detail['tgl_mulai_kontrak']))?$mulai = $detail['tgl_mulai_kontrak']: $mulai = ''; echo $mulai;} ?>" placeholder="dd-mm-yyyy" class="form-control <?php if(isset($_POST['btnEdit'])) {echo 'dateRangePicker';} ?>" <?php if(!isset($_POST['btnEdit'])) {echo 'disabled';} ?>> 
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idKontrakHabis">Kontrak Habis</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<input type="text" id="idKontrakHabis" name="txtKontrakHabis" value="<?php  if(isset($_POST['btnSimpan'])) {echo $_POST['txtKontrakHabis'];} else {(!empty($detail['tgl_habis_kontrak']))?$habis = $detail['tgl_habis_kontrak']: $habis = ''; echo $habis;} ?>" placeholder="dd-mm-yyyy" class="form-control <?php if(isset($_POST['btnEdit'])) {echo 'dateRangePicker';} ?>" <?php if(!isset($_POST['btnEdit'])) {echo 'disabled';} ?>> 
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idDetailKontrak">Detail Kontrak</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<input type="text" id="idDetailKontrak" name="txtDetail" class="form-control" value="<?php  if(isset($_POST['btnSimpan'])) {echo $_POST['txtDetail'];} else {echo $detail['det_kontrak'];} ?>" <?php if(!isset($_POST['btnEdit'])) {echo 'disabled';} ?>> 
				</div>
			</div>
			<hr/>
			 
			
			
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
<?php echo $arrayJabatan; ?>
function dapatSpek(id){
	if (id == '') {
		document.getElementById('idSpesifikasi').value = '';
	} else {
		document.getElementById('idSpesifikasi').value = jabSpeksifikasi[id].spek;
	}
};
</script>