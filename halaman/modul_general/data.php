<?php
$tbl = 'tb_general_affair';
$var = 'GeneralAffair'; // Yang diganti
$judul = 'General Affair'; // Yang diganti
$uri = 'halaman/modul_general/'; // Yang diganti
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
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idNama<?php echo $var; ?>">
							Nama General Affair<span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="hidden" value="<?php echo $_SESSION['kd_admin']; ?>" name="txtKdAdmin">
							<input type="hidden" id="idKdGeneral<?php echo $var; ?>" name="txtIdGeneral">
							<input type="text" id="idNama<?php echo $var; ?>" name="txtNama" class="form-control" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTipe<?php echo $var; ?>">
							Tipe <span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<select class="form-control" id="idTipe<?php echo $var; ?>" name="selTipe" required="required">
								<option value="">-- Pilih Tipe --</option>
								<?php
								$tipes = $crud->read('tb_tipe_ga');
								if (!empty($tipes)) {
									foreach($tipes as $tipe){
										echo '<option value="'.$tipe['id'].'">'.$tipe['tipe_ga'].'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTglMulai<?php echo $var; ?>">
							Tanggal Mulai Terhitung <span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-6 col-xs-12">
							<input type="text" id="idTglMulai<?php echo $var; ?>" name="txtTglMulai" class="form-control dateRangePicker" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTglAkhir<?php echo $var; ?>">
							Jatuh Tempo <span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-6 col-xs-12">
							<input type="text" id="idTglAkhir<?php echo $var; ?>" name="txtTglAkhir" class="form-control dateRangePicker" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idStatus<?php echo $var; ?>">
							Notifikasi <span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<select class="form-control" id="idStatus<?php echo $var; ?>" name="selStatus" onchange="showReminder(this.value)" required="required">
								<option value="">-- Pilih Status --</option>
								<option value="0">Non-Aktif</option>
								<option value="1">Aktif</option>
							</select>
						</div>
					</div>
					<div id="idFormReminder" style="display:none;">
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idReminder<?php echo $var; ?>">
								Set Reminder
							</label>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<input type="text" id="idReminder<?php echo $var; ?>" name="txtReminder" class="form-control dateRangePicker">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idAttach<?php echo $var; ?>">
							Upload Scan Dokumen
						</label>
						<div class="col-md-4 col-sm-6 col-xs-12" id="idDivFile" style="display:none;">
							<img id="idFileAttachment" width="250px" height="400px">
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="cropHeaderWrapper">
								<input type="file" id="idFile<?php echo $var; ?>" name="txtFileGa" class="form-control">
							</div><!-- /col-lg-6 -->
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