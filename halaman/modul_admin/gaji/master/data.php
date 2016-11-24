<?php
if (isset($_GET['p'])) {
	if (isset($_GET['v'])) {
		
		$v = $_GET['v'];
		
		if ($v == 'detail') {
			include_once 'halaman/modul_admin/gaji/detail/data.php';
		}
	}
} if (!isset($_GET['v'])) {
	// Form akan didapat dari data dinamis yang ada ditabel, kunci utama adalah kode master komponen itu dan kode karyawan.
	$tbl = 'tm_gaji';
	$p_key = 'kd_gaji';
	$var = 'MasterGaji'; // Yang diganti
	$judul = 'Master Gaji'; // Yang diganti
	$uri = 'halaman/modul_admin/gaji/master/'; // Yang diganti
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
								Nama Gaji <span class="required">*</span>
							</label>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<input type="hidden" id="idKdGaji<?php echo $var; ?>" name="txtKdGaji" required="required">
								<input type="text" id="idNamaGaji<?php echo $var; ?>" name="txtNamaGaji" class="form-control" required="required" placeholder="Nama Gaji" autofocus>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idMinJml<?php echo $var; ?>">
								Jumlah Minimal (Rp) <span class="required">*</span>
							</label>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<input type="text" id="idMinJml<?php echo $var; ?>" required="required" placeholder="Jumlah Minimal (Rp)" name="txtMinJml" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-3 col-xs-12" for="idMaxJml<?php echo $var; ?>">
								Jumlah Maximal (Rp) <span class="required">*</span>
							</label>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<input type="text" id="idMaxJml<?php echo $var; ?>" required="required" placeholder="Jumlah Maximal (Rp)" name="txtMaxJml" class="form-control col-md-7 col-xs-12">
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
}