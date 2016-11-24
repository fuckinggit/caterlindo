<?php
// Form akan didapat dari data dinamis yang ada ditabel, kunci utama adalah kode master komponen itu dan kode karyawan.
$tbl = 'tb_karyawan';
$p_key = 'kd_karyawan';
$var = 'Jabatan'; // Yang diganti
$judul = 'Jabatan Kerja'; // Yang diganti
$uri = 'halaman/modul_pim/pegawai/jabatan/'; // Yang diganti
?>

<!-- FORM -->
<div class="col-md-12 col-sm-12 mb">
	<div class="grey-panel donut-chart">
		<div class="grey-header mb">
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
		<div id="idAlert<?php echo $var; ?>" class="col-md-12"></div>
		<div class="pull-right mb">
			<a href="javascript:void(0);" id="idBtnClose" class="btn btn-info" style="margin:1px 10px 1px 1px;">Close</a>
		</div>
		<form id="formInput<?php echo $var; ?>" class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data" style="margin-left:15px; margin-right:15px">
			
			
			<div class="form-group col-md-12">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idSubUnit<?php echo $var; ?>">
				Sub Unit<span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="idSubUnit<?php echo $var; ?>" name="selSubUnit">
						<option value="">-- SubUnit --</option>
						<?php
						$d_unit = $crud->read('tb_unit');
						if (!empty($d_unit)) {
							foreach($d_unit as $unit) {
								echo '<option value="'.$unit['kd_unit'].'">'.$unit['nm_unit'].'</option>';
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group col-md-12">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idBagian<?php echo $var; ?>">
					Bagian<span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="idBagian<?php echo $var; ?>" name="selBagian">
						<option value="">-- Bagian --</option>
					</select>
				</div>
			</div>
			<div class="form-group col-md-12">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idNik<?php echo $var; ?>">
					NIK<span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<input type="text" id="idNik<?php echo $var; ?>" name="txtNik" class="form-control" readonly>
				</div>
			</div>
			<div class="form-group col-md-12">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idJabatan<?php echo $var; ?>">
					Nama Jabatan<span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="idJabatan<?php echo $var; ?>" name="selJabatan">
						<option value="">-- Nama Jabatan --</option>
					</select>
				</div>
			</div>
			<div class="form-group col-md-12">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idSpesifikasi<?php echo $var; ?>">
					Spesifikasi<span class="required">*</span>
				</label>
				<div class="col-md-8 col-sm-6 col-xs-12">
					<input type="text" id="idSpesifikasi<?php echo $var; ?>" name="txtSpesifikasi" class="form-control" readonly>
				</div>
			</div>
			<div class="form-group col-md-12">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idStatus<?php echo $var; ?>">
					Status Kepegawaian<span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="idStatus<?php echo $var; ?>" name="selStatus">
						<option value="">-- Status --</option>
						<?php
						$d_status = $crud->read('tb_status_kerja', array('order_by' => 'nm_status_kerja ASC'));
						if (!empty($d_status)) {
							foreach($d_status as $dataStatus) {
								echo '<option value="'.$dataStatus['kd_status_kerja'].'">'.$dataStatus['nm_status_kerja'].'</option>';
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group col-md-12">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idKatKerja<?php echo $var; ?>">
				Kategori Kepegawaian<span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="idKatKerja<?php echo $var; ?>" name="selKatKerja">
						<option value="">-- Kategori --</option>
						<?php
						$d_kat = $crud->read('tb_kat_pekerjaan', array('order_by' => 'nm_kat_pekerjaan ASC'));
						if (!empty($d_kat)) {
							foreach($d_kat as $dataKat) {
								echo '<option value="'.$dataKat['kd_kat_pekerjaan'].'">'.$dataKat['nm_kat_pekerjaan'].'</option>';
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group col-md-12">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTglMasuk<?php echo $var; ?>">Tanggal Masuk</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<input type="text" id="idTglMasuk<?php echo $var; ?>" name="txtTglMasuk" placeholder="yyyy-mm-dd" class="form-control dateRangePickerPim">
				</div>
			</div>
			<div class="form-group col-md-12">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idLokasi<?php echo $var; ?>">
				Lokasi<span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="idLokasi<?php echo $var; ?>" name="selLokasi">
						<option value="">-- Lokasi --</option>
						<?php
						$d_lokasi = $crud->read('tb_lokasi', array('order_by' => 'id ASC'));
						if (!empty($d_lokasi)) {
							foreach($d_lokasi as $lokasi) {
								echo '<option value="'.$lokasi['kd_lokasi_perusahaan'].'">'.$lokasi['nm_lokasi_perusahaan'].'</option>';
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="grey-header col-md-12">
				<h5>Kontrak Kepegawaian</h5>
			</div>
			<div class="form-group col-md-12">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idKontrakMulai<?php echo $var; ?>">Kontrak Mulai</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<input type="text" id="idKontrakMulai<?php echo $var; ?>" name="txtKontrakMulai" placeholder="yyyy-mm-dd" class="form-control dateRangePickerPim"> 
				</div>
			</div>
			<div class="form-group col-md-12">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idKontrakHabis<?php echo $var; ?>">Kontrak Habis</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<input type="text" id="idKontrakHabis<?php echo $var; ?>" name="txtKontrakHabis" placeholder="yyyy-mm-dd" class="form-control dateRangePickerPim"> 
				</div>
			</div>
			<div class="form-group col-md-12">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idDetailKontrak<?php echo $var; ?>">Detail Kontrak</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<input type="text" id="idDetailKontrak<?php echo $var; ?>" name="txtDetail" class="form-control"> 
				</div>
			</div>
			
			<div class="ln_solid"></div>
			<div class="form-group">
				<div style="margin-bottom:2%; float:right; margin-right:2%;">
					<a href="javascript:void(0);" id="idBtnEdit" name="btnEdit" class="btn btn-primary">Edit</a>
					<button type="submit" id="idBtnSimpan" name="btnSimpan" class="btn btn-warning">Simpan</button>
				</div>
			</div>
		</form>
	</div><!-- /grey-panel -->
</div>

<?php
include_once 'scriptJs.php';