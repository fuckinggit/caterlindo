<?php
// Form akan didapat dari data dinamis yang ada ditabel, kunci utama adalah kode master komponen itu dan kode karyawan.
$tbl = 'tb_jabatan';
$p_key = 'kd_jabatan';
$var = 'Jabatan'; // Yang diganti
$judul = 'Jabatan'; // Yang diganti
$uri = 'halaman/modul_admin/jabatan/'; // Yang diganti
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
			<div class="x_content">
				<br />
				<form data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data">
					
					<div id="formJabatan<?php echo $var; ?>">
						<?php echo '<h2>Form '.$judul.'</h2>'; ?>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idNamaUnit<?php echo $var; ?>">
								Nama Unit <span class="required">*</span>
							</label>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<input type="hidden" id="idKdJabatan<?php echo $var; ?>" name="txtKdJabatan" required="required">
								<select id="idNamaUnit<?php echo $var; ?>" name="selUnit" class="form-control" required="required"autofocus>
									<option value="">-- Pilih Unit --</option>
									<?php
									$units = $crud->read('tb_unit');
									if (!empty($units)) {
										foreach($units as $unit) {
											echo '<option value="'.$unit['kd_unit'].'">'.$unit['nm_unit'].'</option>';
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idNamaBagian<?php echo $var; ?>">
								Nama Bagian <span class="required">*</span>
							</label>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<select id="idNamaBagian<?php echo $var; ?>" name="selBagian" class="form-control" required="required">
									<option value="">-- Pilih Bagian --</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idNamaJabatan<?php echo $var; ?>">
								Nama Jabatan <span class="required">*</span>
							</label>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<input type="text" id="idNamaJabatan<?php echo $var; ?>" required="required" placeholder="Nama Jabatan" name="txtNmJabatan" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idDeskripsi<?php echo $var; ?>">
								Deskripsi <span class="required"></span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea class="form-control" id="idDeskripsi<?php echo $var; ?>" name="txtDeskripsi" placeholder="Deskripsi" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idSpesifikasi<?php echo $var; ?>">
								Spesifikasi <span class="required"></span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea class="form-control" id="idSpesifikasi<?php echo $var; ?>" name="txtSpesifikasi" placeholder="Spesifikasi" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idCatatan<?php echo $var; ?>">
								Catatan <span class="required"></span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea class="form-control" id="idCatatan<?php echo $var; ?>" name="txtCatatan" placeholder="Catatan" rows="5"></textarea>
							</div>
						</div>
						
						<hr />
						<div class="ln_solid"></div>
						<div class="form-group">
							<div style="margin-bottom:2%; float:right; margin-right:2%;">
								<a href="javascript:void(0);" id="idBtnLanjut<?php echo $var; ?>" name="btnLanjut" class="btn btn-info">Lanjut <i class="fa fa-angle-double-right"></i></a>
							</div>
						</div>
					</div>
					
					<div id="formGaji<?php echo $var; ?>" style="display:none;">
						<h2 class="mb">Komponen Gaji</h2>
						<div class="alert alert-success">
							<b>Peringatan!</b> Jika jabatan tidak mempunyai tunjangan jabatan form boleh tidak diisi.
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idGaji<?php echo $var; ?>">
								Pilih Gaji <span class="required"></span>
							</label>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<select id="idGaji<?php echo $var; ?>" name="selGaji" class="form-control">
									<option value="">-- Pilih Gaji --</option>
									<?php
									$gajis = $crud->read('tm_gaji');
									if (!empty($gajis)) {
										foreach($gajis as $gaji) {
											echo '<option value="'.$gaji['kd_gaji'].'">'.$gaji['nm_gaji'].'</option>';
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idFrekuensi<?php echo $var; ?>">
								Frekuensi Gaji <span class="required"></span>
							</label>
							<div class="col-md-3 col-sm-12 col-xs-12">
								<select class="form-control" id="idFrekuensi<?php echo $var; ?>" name="selFrekuensi">
									<option value="">-- Frekuensi --</option>
									<option value="0">PerJam</option>
									<option value="1">Harian</option>
									<option value="2">Mingguan</option>
									<option value="3">Bulanan</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idJmlGaji<?php echo $var; ?>">
								Jumlah Gaji <span class="required"></span>
							</label>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<input type="text" id="idJmlGaji<?php echo $var; ?>" name="txtJmlGaji" class="form-control" placeholder="Jumlah Gaji">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTipe<?php echo $var; ?>">
								Tipe Gaji <span class="required"></span>
							</label>
							<div class="col-md-3 col-sm-12 col-xs-12">
								<select class="form-control" id="idTipe<?php echo $var; ?>" name="selTipe" required="required">
									<option value="">-- Tipe Gaji --</option>
									<option value="0">Tunai</option>
									<option value="1">Transfer</option>
								</select>
							</div>
						</div>
						
						<hr />
						<div class="ln_solid"></div>
						<div class="form-group">
							<div style="margin-bottom:2%; float:right; margin-right:2%;">
								<a href="javascript:void(0);" id="idBtnKembali<?php echo $var; ?>" name="btnKembali" class="btn btn-danger"><i class="fa fa-angle-double-left"></i> Kembali</a>
								<button type="submit" name="btnSimpan" class="btn btn-warning">Simpan</button>
							</div>
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