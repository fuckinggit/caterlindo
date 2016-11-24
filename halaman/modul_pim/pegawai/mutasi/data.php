<?php
// Form akan didapat dari data dinamis yang ada ditabel, kunci utama adalah kode master komponen itu dan kode karyawan.
$tbl = 'td_karyawan_mutasi';
$p_key = 'kd_mutasi';
$var = 'Mutasi'; // Yang diganti
$judul = 'Mutasi Pegawai'; // Yang diganti
$uri = 'halaman/modul_pim/pegawai/mutasi/'; // Yang diganti
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
		
			<div class="form-group col-md-12">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idBagian<?php echo $var; ?>">
					Bagian<span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<input type="hidden" id="idKdKaryawan<?php echo $var; ?>" name="txtKdKaryawan" value="<?php echo $_GET['id']; ?>">
					<select class="form-control" id="idBagian<?php echo $var; ?>" name="selBagian" required="required">
						<option value="">-- Bagian --</option>
						<?php
						$d_bagian = $crud->read('tb_bagian', array('order_by' => 'id ASC'));
						if (!empty($d_bagian)) {
							foreach($d_bagian as $dataBagian) {
								echo '<option value="'.$dataBagian['kd_bagian'].'">'.$dataBagian['nm_bagian'].'</option>';
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group col-md-12">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idNik<?php echo $var; ?>">
					NIK
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
					Spesifikasi
				</label>
				<div class="col-md-8 col-sm-6 col-xs-12">
					<input type="text" id="idSpesifikasi<?php echo $var; ?>" name="txtSpesifikasi" class="form-control" readonly>
				</div>
			</div>
			
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
		<a href="javascript:void(0);" class="btn btn-warning pull-left mb" id="btnTambah<?php echo $var; ?>" name="btnTambah" style="margin-left:1%;">
			<i class="fa fa-recycle"></i> Mutasi Karyawan
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