<?php
// Form akan didapat dari data dinamis yang ada ditabel, kunci utama adalah kode master komponen itu dan kode karyawan.
$tbl = 'tb_karyawan';
$var = 'DetailKPI'; // Yang diganti
$judul = 'Evaluasi KPI'; // Yang diganti
$uri = 'halaman/modul_kpi/evaluasi/detail/'; // Yang diganti

$c_karyawan['where'] = array('kd_karyawan' => $_GET['id']);
$c_karyawan['return_type'] = 'single';
$detail = $crud->read($tbl, $c_karyawan);
if (!empty($detail)) {
	$nik = $detail['nik_karyawan'];
	$nama = $detail['nm_karyawan'];
	$jekel = jekel($detail['jekel']);
	$status = statusNikah($detail['status_nikah']);
	$telp = $detail['telp_rumah'];
}
?>
 
<div class="content-panel">
	<div class="panel-heading">
		<h3><i class="fa fa-angle-right"></i> Data <small><?php echo $judul; ?></small></h3>
	</div>
</div>

<div class="clearfix"></div>

<!-- FORM -->
<div class="row" id="form<?php echo $var; ?>">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-panel">
			<div class="pull-right">
				<a href="?<?php echo $link; ?>" name="btnClose" id="btnClose" class="btn btn-primary">Close</a>
			</div>
			<div class="x_title">
				<?php echo '<h2>Form Biodata '.$judul.'</h2>'; ?>
				<div id="idAlert<?php echo $var; ?>"></div>
			</div>
			<div class="x_content">
				<br />
				<form data-parsley-validate id="formInput<?php echo $var; ?>" class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data">
				
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idNik<?php echo $var; ?>">
							NIK Karyawan
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="hidden" id="idKdKaryawan<?php echo $var; ?>" name="txtKdKaryawan" value="<?php echo $_GET['id']; ?>">
							<input type="text" id="idNik<?php echo $var; ?>" name="txtNik" class="form-control" value="<?php echo $nik; ?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idNama<?php echo $var; ?>">
							Nama Karyawan
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" id="idNama<?php echo $var; ?>" name="txtNama" value="<?php echo $nama; ?>" class="form-control" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idJekel<?php echo $var; ?>">
							Jenis Kelamin
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" id="idJekel<?php echo $var; ?>" name="txtJekel" value="<?php echo $jekel; ?>" class="form-control" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idStatus<?php echo $var; ?>">
							Status Nikah
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" id="idStatus<?php echo $var; ?>" name="txtStatus" value="<?php echo $status; ?>" class="form-control" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTelp<?php echo $var; ?>">
							No Telp
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" id="idTelp<?php echo $var; ?>" name="txtTelp" value="<?php echo $telp; ?>" class="form-control" readonly>
						</div>
					</div>
				 
					<hr />
					
					<div class="x_title">
						<?php echo '<h2>Form Detail '.$judul.'</h2>'; ?>
					</div>
					<?php
					// Iki isi form teko tabel lho ya!!!
					$komponens = $crud->read('tb_kpi');
					if (!empty($komponens)) {
						foreach($komponens as $komponen) {
							extract($komponen);
							?>
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="id<?php echo $nm_komponen.$var; ?>">
									<?php echo $nm_komponen; ?>
								</label>
								<div class="col-md-4 col-sm-12 col-xs-12">
									<input type="hidden" id="idKd<?php echo $nm_komponen.$var; ?>" name="txt<?php echo $var; ?>[]" value="<?php echo $kd_kpi; ?>" readonly>
									<select id="id<?php echo $nm_komponen.$var; ?>" name="sel<?php echo $var; ?>[]" class="form-control" required="required">
										<option value="">-- Set Nilai --</option>
										<?php
										$c_comps['where'] = array('kd_kpi' => $kd_kpi);
										$d_comps = $crud->read('tb_kpi', $c_comps);
										if (!empty($d_comps)) {
											foreach($d_comps as $d_comp) {
												for($v = $d_comp['nilai_min']; $v <= $d_comp['nilai_max']; $v++) {
													echo '<option value="'.$v.'">'.$v.'</option>';
												}
											}
										}
										?>
									</select>
								</div>
							</div>
							<?php
						}
					}
					?>
					
					<hr />
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTot<?php echo $var; ?>">
								Total Score
							</label>
							<div class="col-md-4 col-sm-12 col-xs-12">
								<input type="text" id="idTot<?php echo $var; ?>" name="txtTotal" class="form-control" readonly>
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

<?php
include_once 'scriptJs.php';