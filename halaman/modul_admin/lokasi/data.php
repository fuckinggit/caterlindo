<?php
$tbl = 'tb_lokasi';
$var = 'LokasiPerusahaan'; // Yang diganti
$judul = 'Lokasi Perusahaan'; // Yang diganti
$uri = 'halaman/modul_admin/lokasi/'; // Yang diganti
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
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idNama<?php echo $var; ?>">
							Nama Lokasi Perusahaan<span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="hidden" name="txtKode" id="idKode<?php echo $var; ?>">
							<input type="text" id="idNama<?php echo $var; ?>" name="txtNama" class="form-control" placeholder="Nama Lokasi Perusahaan" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idNegara<?php echo $var; ?>">
							Negara <span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<select class="form-control" id="idNegara<?php echo $var; ?>" name="selNegara" onchange="pilihProvinsi(this.value)" required="required">
								<option value="">-- Pilih Negara --</option>
								<option value="WNI">WNI</option>
								<option value="WNA">WNA</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idProvinsi<?php echo $var; ?>">
							Provinsi <span class="required">*</span>
						</label>
							<div class="col-md-4 col-sm-12 col-xs-12">
								<select class="form-control" id="idProvinsi<?php echo $var; ?>" name="selProvinsi" onchange="pilihKota(this.value);" required="required">
									<option value="">-- Pilih Provinsi --</option>
								</select>
							</div>				
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idKota<?php echo $var; ?>">
							Kota <span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<select class="form-control" id="idKota<?php echo $var; ?>" name="selKota" required="required">
								<option value="">-- Pilih Kota --</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idKdPos<?php echo $var; ?>">
							Kode Pos <span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" id="idKdPos<?php echo $var; ?>" name="txtKdPos" class="form-control" placeholder="Kode Pos" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idAlamat<?php echo $var; ?>">
							Alamat <span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" id="idAlamat<?php echo $var; ?>" name="txtAlamat" class="form-control" placeholder="Alamat" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTelp<?php echo $var; ?>">
							No. Telp
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" id="idTelp<?php echo $var; ?>" name="txtTelp" placeholder="No. Telp" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idFax<?php echo $var; ?>">
							Fax 
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" id="idFax<?php echo $var; ?>" name="txtFax" placeholder="Fax" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idCat<?php echo $var; ?>">
							Catatan 
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<Textarea id="idCat<?php echo $var; ?>" class="form-control" placeholder="Catatan" name="txtCat"></Textarea>
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