<?php
$tbl = 'tb_hari_kerja';
$var = 'HariKerja'; // Yang diganti
$judul = 'Setting Hari Kerja'; // Yang diganti
$uri = 'halaman/modul_kalender/hari_kerja/'; // Yang diganti
?>
 
<div class="content-panel">
	<div class="panel-heading">
		<h3><i class="fa fa-angle-right"></i> Data <small><?php echo $judul; ?></small></h3>
	</div>
</div>

<div class="clearfix"></div>

<!-- FORM -->
<div class="row" <?php //echo 'style="display:none;"'; ?> id="form<?php echo $var; ?>">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-panel">
			<div class="pull-right">
				<button name="btnClose" id="btnClose" class="btn btn-primary">Close</button>
			</div>
			<div class="x_title">
				<?php echo '<h2>Form '.$judul.'</h2>'; ?>
				<div id="idAlert<?php echo $var; ?>"></div>
			</div>
			<div class="x_content">
				<br />
				<form data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data" id="formInput<?php echo $var; ?>">
					
					<?php
					$f_hari = $crud->read($tbl, array('order_by' => 'id ASC'));
					if (!empty($f_hari)) {
						foreach ($f_hari as $form) {
							?>
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="id<?php echo ucfirst($form['nm_hari']).$var; ?>">
									<?php echo ucfirst($form['nm_hari']); ?><span class="required">*</span>
								</label>
								<div class="col-md-4 col-sm-12 col-xs-12">
									<input type="hidden" id="idKdHari<?php echo $form['nm_hari'].$var; ?>" name="txtKdHari[]" value="<?php echo $form['id']; ?>">
									<select id="id<?php echo ucfirst($form['nm_hari']).$var; ?>" name="selHari[]" class="form-control" required="required" disabled>
										<option value="">-- Pilih Setting --</option>
										<option value="0">Full Day</option>
										<option value="1">Half Day</option>
										<option value="2">Hari Libur Kerja</option>
									</select>
								</div>
							</div>
							<?php
						}
					}
					?>
				 
					<hr />
					<div class="ln_solid"></div>
					<div class="form-group">
						<div style="margin-bottom:2%; float:right; margin-right:2%;">
							<a href="javascript:void(0);" id="idBtnUbah" name="btnUbah" class="btn btn-info">Ubah</a>
							<button type="submit" id="idBtnSimpan" name="btnSimpan" class="btn btn-warning">Simpan</button>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>

<?php
include_once 'scriptJs.php';