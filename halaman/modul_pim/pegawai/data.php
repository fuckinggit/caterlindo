<?php
if (isset($_GET['p'])) {
	if (isset($_GET['v'])) {
		
		$v = $_GET['v'];
		
		if ($v == 'detail') {
			include_once 'detail.php';
		}
	}
} if (!isset($_GET['v'])) {
	$tbl = 'tb_karyawan';
	$var = 'Pegawai'; // Yang diganti
	$judul = 'Pegawai'; // Yang diganti
	$uri = 'halaman/modul_pim/pegawai/'; // Yang diganti
	?>

	<div class="content-panel">
		<div class="panel-heading">
			<h3><i class="fa fa-angle-right"></i> Data <small><?php echo $judul; ?></small></h3>
		</div>
	</div>

	<div class="clearfix"></div>

	<!-- FORM -->
	<div class="row" <?php echo 'style="display:none;"'; ?> id="form<?php echo $var; ?>">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="form-panel">
				<div class="pull-right">
					<button name="btnClose" id="btnClose" class="btn btn-primary" onclick="hideForm()">Close</button>
				</div>
				<div class="x_title">
					<?php echo '<h2>Form '.$judul.'</h2>'; ?>
				</div>
				<div class="x_content">
					<br />
					<form data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data">
						
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idNamaBagian<?php echo $var; ?>">
								Nama Bagian <span class="required">*</span>
							</label>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<input type="hidden" id="idPegawai<?php echo $var; ?>" name="txtIdPegawai" readonly>
								<select id="idNamaBagian<?php echo $var; ?>" name="selBagian" class="form-control" required="required">
									<option value="">-- Pilih Bagian --</option>
									<?php
									$bagian = $crud->read('tb_bagian');
									if (!empty($bagian)) {
										foreach($bagian as $d_bagian) {
											echo '<option value="'.$d_bagian['kd_bagian'].'">'.$d_bagian['nm_bagian'].'</option>';
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idNamaJabatan<?php echo $var; ?>">
								Nama Jabatan <span class="required">*</span>
							</label>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<select id="idNamaJabatan<?php echo $var; ?>" name="selJabatan" class="form-control col-md-7 col-xs-12" required="required">
									<option value="">-- Pilih Jabatan --</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idNikPegawai<?php echo $var; ?>">
								NIK Karyawan <span class="required">*</span>
							</label>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<input type="text" id="idNikPegawai<?php echo $var; ?>" name="txtNikPegawai" class="form-control" placeholder="NIK Karyawan" required="required" readonly>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idNama<?php echo $var; ?>">
								Nama Karyawan <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="idNama<?php echo $var; ?>" name="txtNama" placeholder="Nama Karyawan" class="form-control" required="required">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idPhoto<?php echo $var; ?>">
								Pas Photo <span class="required">*</span>
							</label>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<input type="file" id="idPhoto<?php echo $var; ?>" name="fileFoto" class="form-control" required="required">
							</div>
						</div>
						
						<hr />
						<div class="x_title">
							<?php echo '<h2>Form Akun Pegawai</h2><br />'; ?>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idUsername<?php echo $var; ?>">
								Username <span class="required">*</span>
							</label>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<input type="hidden" id="idAdmin<?php echo $var; ?>" name="txtIdAdmin" class="form-control" readonly>
								<input type="text" id="idUsername<?php echo $var; ?>" placeholder="Username" name="txtUsername" class="form-control col-md-7 col-xs-12" required="required">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idPass<?php echo $var; ?>">
								Password <span class="required">*</span>
							</label>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<input type="password" id="idPass<?php echo $var; ?>" placeholder="Password" name="txtPassword" class="form-control col-md-7 col-xs-12" required="required">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12">
							</label>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<input type="password" id="idPassKonfirm<?php echo $var; ?>" placeholder="Konfirmasi Password" name="txtPassKonfirmasi" class="form-control col-md-7 col-xs-12" required="required">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idTipe<?php echo $var; ?>">
								Tipe Akun <span class="required">*</span>
							</label>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<select id="idTipe<?php echo $var; ?>" name="selTipeAdmin" class="form-control col-md-7 col-xs-12" required="required">
									<option value="">-- Pilih Tipe Akun --</option>
									<option value="0">Admin</option>
									<option value="1">Karyawan</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idStatus<?php echo $var; ?>">
								Status <span class="required">*</span>
							</label>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<select id="idStatus<?php echo $var; ?>" name="selStatusAdmin" class="form-control col-md-7 col-xs-12" required="required">
									<option value="">-- Pilih Status Akun --</option>
									<option value="1">Aktif</option>
									<option value="0">Tidak Aktif</option>
								</select>
							</div>
						</div>
					 
						<hr />
						<div class="ln_solid"></div>
						<div class="form-group">
							<div style="margin-bottom:2%; float:right; margin-right:2%;">
								<button type="submit" name="btnSimpan" class="btn btn-warning">Simpan</button>
							</div>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- DATA -->
	<div class="row" id="bacaData<?php echo $var; ?>">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="form-panel">
				<div class="pull-right">
					<button type="submit" class="btn btn-primary pull-left mb" id="btnTambah<?php echo $var; ?>" name="btnTambah" style="margin-left:1%;">
						<i class="fa fa-plus"></i> Tambah Data
					</button>
				</div>
				<div class="x_title">
					<h2><?php echo $judul; ?></h2>
					<div id="idAlert<?php echo $var; ?>"></div>
				</div>
				<div class="x_content">
					<div id="idImgLoader" align="middle" style="display:none;">
						<img src='assets/img/ajax_loader_bar.gif' />
					</div>
					<div id="tabelData<?php echo $var; ?>"></div>
				</div>
			</div>
		</div>
		
	</div>

	<?php
	include_once 'scriptJs.php';
}