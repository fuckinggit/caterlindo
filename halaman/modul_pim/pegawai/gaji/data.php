<?php
// Form akan didapat dari data dinamis yang ada ditabel, kunci utama adalah kode master komponen itu dan kode karyawan.
$tbl = 'tm_gaji';
$p_key = 'kd_gaji';
$var = 'GajiPegawai'; // Yang diganti
$judul = 'Gaji Pegawai'; // Yang diganti
$uri = 'halaman/modul_pim/pegawai/gaji/'; // Yang diganti
?>
 
<div class="col-md-12 col-sm-12" style="display:none;" id="form<?php echo $var; ?>">
	<div class="grey-panel donut-chart">
		<div class="grey-header">
			<div style="float:right;">
				<button name="btnClose" id="btnClose" class="btn btn-primary" onclick="hideForm()">Close</button>
			</div>
			<?php echo '<h5>'.$judul.'</h5>'; ?>
		</div>
		<form data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data" style="margin-left:15px; margin-right:15px">
		
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idGaji<?php echo $var; ?>">
					Jenis Gaji<span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<input type="hidden" value="<?php echo $_GET['id']; ?>" name="txtKdGaji" id="idKdGaji<?php echo $var; ?>">
					<input type="hidden" value="<?php echo $_GET['id']; ?>" name="txtIdKaryawan" id="idKdKaryawan<?php echo $var; ?>">
					<select onchange="showGaji(this.value)" class="form-control" id="idGaji<?php echo $var; ?>" name="selGaji" required="required">
						<option value="">-- Jenis Gaji --</option>
						<?php
						$gaji = $crud->read('tm_gaji');
						if (!empty($gaji)) {
							foreach($gaji as $dGaji) {
								echo '<option value="'.$dGaji['kd_gaji'].'" >'.$dGaji['nm_gaji'].'</option>';
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idFrekuensi<?php echo $var; ?>">
					Frekuensi Gaji <span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="idFrekuensi<?php echo $var; ?>" name="selFrekuensi" required="required">
						<option value="">-- Frekuensi --</option>
						<option value="0">PerJam</option>
						<option value="1">Harian</option>
						<option value="2">Mingguan</option>
						<option value="3">Bulanan</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idJumlah<?php echo $var; ?>">
					Jumlah Gaji (Rp) <span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<input type="text" id="idJumlah<?php echo $var; ?>" name="txtJml" type="number" class="form-control" required="required">
				</div>
				<div style="float:left" id="idAlertJumlah"></div><br />
				<div style="float:left" id="idRangeGaji<?php echo $var; ?>"></div>
			</div>	
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idCatatan<?php echo $var; ?>">
					Catatan 
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<textarea id="idCatatan<?php echo $var; ?>" name="txtCatatan" class="form-control"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTipe<?php echo $var; ?>">
					Tipe Gaji 
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
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
					<button type="submit" name="btnSimpan" class="btn btn-warning">Simpan</button>
				</div>
			</div>
			
		</form>
	</div><!-- /grey-panel -->
</div>

<div class="col-md-12 col-sm-12 mb" id="bacaData">
	<div class="grey-panel donut-chart" style="margin-bottom:2%; float:right;">
		<div class="grey-header">
			<?php echo '<h5>'.$judul.'</h5>'; ?>
		</div>
		<div id="idAlert<?php echo $var; ?>"></div>
		<a href="javascript:void(0);" class="btn btn-info pull-left mb" id="btnTambah<?php echo $var; ?>" name="btnTambah" style="margin-left:1%;">
			<i class="fa fa-plus"></i> Tambah Data
		</a>
		<div class="x_content col-md-12">
			<div id="idImgLoader" align="middle" style="display:none;">
				<img src='assets/img/ajax_loader_bar.gif' />
			</div>
			<div id="tabelData<?php echo $var; ?>"></div>
		</div>
	</div><!-- /grey-panel -->
</div>

<?php
include_once 'scriptJs.php';