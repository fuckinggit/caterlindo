<?php
$tbl = 'tb_general_info';
$var = 'InformasiPerusahaan'; // Yang diganti
$judul = 'Informasi Perusahaan'; // Yang diganti
$uri = 'halaman/modul_admin/informasi_umum/'; // Yang diganti
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
				<button name="btnClose" id="btnClose" class="btn btn-info">Close</button>
			</div>
			<div class="x_title">
				<?php echo '<h2>Form '.$judul.'</h2>'; ?>
				<div id="idAlert<?php echo $var; ?>"></div>
			</div>
			<div class="x_content">
				<br />
				<form data-parsley-validate id="formInput<?php echo $var; ?>" class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data">
					
					<?php
					$dForms = $crud->read($tbl);
					if (!empty($dForms)) {
						foreach($dForms as $dForm) {
							if($dForm['nm_info'] != 'Kode_Provinsi' && $dForm['nm_info'] != 'Kode_Kota') {
								?>
								<div class="form-group">
									<label class="control-label col-md-2 col-sm-3 col-xs-12" for="id<?php echo $dForm['nm_info'].$var; ?>">
										<?php echo str_replace('_', ' ', $dForm['nm_info']); ?> <span class="required">*</span>
									</label>
									<div class="col-md-4 col-sm-6 col-xs-12">
										<input type="hidden" id="idKd<?php echo $dForm['nm_info'].$var; ?>" name="txtKd[]" disabled>
										<input type="text" id="id<?php echo $dForm['nm_info'].$var; ?>" name="txtNama[]" class="form-control" required="required" placeholder="<?php echo str_replace('_', ' ', $dForm['nm_info']); ?>" disabled>
									</div>
								</div>
								<?php
							} else {
								if($dForm['nm_info'] == 'Kode_Provinsi') {
									?>
									<div class="form-group">
										<label class="control-label col-md-2 col-sm-3 col-xs-12" for="id<?php echo $dForm['nm_info'].$var; ?>">
											<?php echo $dForm['nm_info']; ?>
										</label>
										<div class="col-md-4 col-sm-6 col-xs-12">
											<input type="hidden" id="idKd<?php echo $dForm['nm_info'].$var; ?>" name="txtKd[]" disabled>
											<select class="form-control" id="id<?php echo $dForm['nm_info'].$var; ?>" name="txtNama[]" required="required" disabled>
												<option value="">-- Provinsi --</option>
												<?php
												$d_provinsi = $crud->read('tm_prop');
												if(!empty($d_provinsi)){
													foreach($d_provinsi as $provinsi) {
														echo '<option value="' .$provinsi['fc_kdprop']. '">' .$provinsi['fv_nmprop']. '</option>';
													}
												}
												?>
											</select>
										</div>
									</div>
									<?php
								} else {
									?>
									<div class="form-group">
										<label class="control-label col-md-2 col-sm-3 col-xs-12" for="id<?php echo $dForm['nm_info'].$var; ?>">
											<?php echo $dForm['nm_info']; ?>
										</label>
										<div class="col-md-4 col-sm-6 col-xs-12">
											<input type="hidden" id="idKd<?php echo $dForm['nm_info'].$var; ?>" name="txtKd[]" disabled>
											<select class="form-control" id="id<?php echo $dForm['nm_info'].$var; ?>" name="txtNama[]" required="required" disabled>
												<option value="">-- Kota --</option>
											</select>
										</div>
									</div>
									<?php
								}
							}
						}
					}
					?>
				 
					<hr />
					<div class="ln_solid"></div>
					<div class="form-group">
						<div style="margin-bottom:2%; float:right; margin-right:2%;">
							<a href="javascript:void(0);" id="idBtnUbah" name="btnUbah" class="btn btn-warning">Ubah</a>
							<button type="submit" id="idBtnSimpan" name="btnSimpan" class="btn btn-primary">Simpan</button>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>

<?php
include_once 'scriptJs.php';