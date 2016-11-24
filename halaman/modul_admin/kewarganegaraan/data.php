<?php
$tbl = 'tm_prop';
$var = 'Kewarganegaraan'; // Yang diganti
$judul = 'Kewarganegaraan'; // Yang diganti
$uri = 'halaman/modul_admin/kewarganegaraan/'; // Yang diganti
?>

<div class="content-panel mb">
	<div class="panel-heading">
		<h3><i class="fa fa-angle-right"></i> Data <small><?php echo $judul; ?></small></h3>
		<div class="btn-group">
			<button style="margin-right:5px;float:left;" onclick="LihatProvinsi()" type="button" class="btn btn-info dropdown-toggle" >
				Data Provinsi
			</button>
			<button type="button" class="btn btn-info dropdown-toggle" onclick="LihatKota()">
				Data Kota
			</button>
		</div>
		<br/>
		<div id="idAlert<?php echo $var; ?>"></div>
	</div>
</div>

<!-- FORM -->
<div class="row" style="display:none;" id="form<?php echo $var; ?>">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-panel">
			<div class="pull-right">
				<button name="btnClose" id="btnClose" class="btn btn-primary" onclick="hideForm()">Close</button>
			</div>
			<div class="x_title">
				<?php echo '<h2>Form Provinsi</h2>'; ?>
			</div>
			<div class="x_content">
				<br />
				<form data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data">
					<input type="hidden" name="kode" id="kode<?php echo $var; ?>">
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="nama<?php echo $var; ?>">
							Provinsi<span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" id="nama<?php echo $var; ?>" name="nama" class="form-control" required="required">
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

<div class="row" style="display:none;" id="formKota">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-panel">
			<div class="pull-right">
				<button name="btnClose" id="btnClose" class="btn btn-primary" onclick="hideinKota()">Close</button>
			</div>
			<div class="x_title">
				<?php echo '<h2>Form Kota</h2>'; ?>
			</div>
			<div class="x_content">
				<br />
				<form data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data">
					<input type="hidden" name="kode" id="kodeprov">
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="provinsi">
							Provinsi
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" disabled id="provinsi" name="prov" class="form-control" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="kota">
							Kota<span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" id="kota" name="nmkota" class="form-control" required="required">
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

<div class="row" id="bacaData<?php echo $var; ?>">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-panel">
			<div class="pull-right">
				<button type="submit" class="btn btn-primary pull-left mb" id="btnTambah<?php echo $var; ?>" name="btnTambah" style="margin-left:1%;">
					<i class="fa fa-plus"></i> Tambah Data Provinsi
				</button>
			</div>
			<div class="x_title">
				<h2>Data Provinsi</h2>
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

<div class="row" id="bacaKota">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-panel">
			<div class="x_title">
				<h2>Data Kota</h2> 
				<div class="btn-group">
					<div style="margin-bottom:2%;"  class="col-md-12 col-sm-12 col-xs-12">
						<select class="form-control" id="idProvinsi" name="selProvinsi" onchange="pilihKotaTable(this.value);">
							<option value="">-- Pilih Provinsi --</option>
							<?php
							$d_provinsi = $crud->read('tm_prop');
							
							if(!empty($d_provinsi)){
								foreach($d_provinsi as $provinsi) {
								extract($provinsi);
									echo '<option value="' .$fc_kdprop. '">' .$fv_nmprop. '</option>';
								}
							}
							?>
						</select>
					</div>
				</div>
			</div>
			<div class="x_content">
				<div id="idImgLoader" align="middle" style="display:none;">
					<img src='assets/img/ajax_loader_bar.gif' />
				</div>
				<div id="bacaData2<?php echo $var; ?>"></div>
			</div>
		</div>
	</div>
</div>
<?php
include_once 'scriptJs.php';