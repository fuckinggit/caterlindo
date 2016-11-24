<?php
$deep = '../../../../';
$tbl = 'td_gaji';
$p_key = 'id';
$var = 'DetailGaji'; // Yang diganti
$judul = 'Detail Gaji'; // Yang diganti
$uri = 'halaman/modul_admin/gaji/detail/'; // Yang diganti
?>
 
<div class="content-panel">
	<div class="panel-heading">
		<h3><i class="fa fa-angle-right"></i> Data <small><?php echo $judul; ?></small></h3>
	</div>
</div>

<div class="clearfix"></div>

<!-- FORM -->
<div class="row" style="display:none;" id="form<?php echo $var; ?>">
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
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idNamaGaji<?php echo $var; ?>">
							Nama Gaji <span class="required"></span>
						</label>
						<div class="col-md-4 col-sm-6 col-xs-12">
							<input type="hidden" id="idKdDetail<?php echo $var; ?>" name="txtKdDetail" required="required">
							<input type="hidden" id="idKdGaji<?php echo $var; ?>" name="txtKdGaji" value="<?php echo $_GET['id']; ?>">
							<input type="text" id="idNamaGaji<?php echo $var; ?>" name="txtNamaGaji" class="form-control" value="<?php echo namaGaji($deep, $_GET['id']); ?>" placeholder="Nama Gaji" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idNamaBagian<?php echo $var; ?>">
							Nama Bagian <span class="required">*</span>
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<select id="idNamaBagian<?php echo $var; ?>" name="selBagian" class="form-control col-md-7 col-xs-12" required="required">
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
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idJml<?php echo $var; ?>">
							Jumlah Gaji (Rp) <span class="required">*</span>
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<input type="text" id="idJml<?php echo $var; ?>" required="required" placeholder="Jumlah Gaji (Rp)" name="txtJml" class="form-control col-md-7 col-xs-12">
						</div>
						<div id="idAlertJumlah" class="control-label col-md-7 col-sm-3 col-xs-12"></div>
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
			<div class="col-md-5 col-md-offset-7">
				<button type="submit" class="btn btn-primary pull-right" id="btnTambah<?php echo $var; ?>" name="btnTambah" style="margin-left:1%;">
					<i class="fa fa-plus"></i> Tambah Data
				</button>
				<a href="?<?php echo $link; ?>" class="btn btn-warning pull-right" style="margin-left:1%;">
					<i class="fa fa-arrow-left"></i> Kembali
				</a>
			</div>
			<div class="x_title">
				<h2><?php echo $judul; ?></h2>
				<h3><?php echo namaGaji($deep, $_GET['id']); ?></h3>
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