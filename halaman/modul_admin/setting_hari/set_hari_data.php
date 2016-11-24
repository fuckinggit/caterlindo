<?php
$tbl = 't_setup';
$var = 'SET_HARI'; // Yang diganti
$judul = 'Setting Hari Kerja'; // Yang diganti
$uri = 'halaman/modul_admin/setting_hari/'; // Yang diganti 
?>
 
<div class="content-panel mb">
	<div class="panel-heading">
		<h3><i class="fa fa-angle-right"></i> Data <small><?php echo $judul; ?></small></h3>
	</div>
	<div id="idAlert"></div>	
</div>

<div class="clearfix"></div>

<!-- FORM -->
<div class="row" id="form<?php echo $var; ?>">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-panel">
			<!--<div class="pull-right">
				<button name="btnClose" id="btnClose" class="btn btn-primary" onclick="hideForm()">Close</button>
			</div> --->
			<div class="x_title">
				<?php echo '<h2>Form '.$judul.'</h2>'; ?>
			</div>
			<div id="content" class="x_content">
				<br />
				<form data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data" id="formEdit">
						<?php
						$query = $crud->read($tbl);
							foreach($query as $hb){
								extract($hb);
						?>
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12">
									<?php echo $fv_keterangan; ?>
								</label>
								<div class="col-md-4 col-sm-12 col-xs-12">
									<input type="hidden" name="fc_param[]" value="<?php echo $fc_param;?>" class="form-control" >
									<input type="text" id="Id<?php echo $ID; ?>" name="fc_isi[]" value="<?php echo $fc_isi;?>" class="form-control">
								</div>
							</div>
						<?php  } ?>
					
					<hr />
					<div class="ln_solid"></div>
					<div class="form-group">
						<div style="margin-bottom:2%; float:right; margin-right:2%;">
							<button type="submit" name="btnSimpan" id="btnSimpan" class="btn btn-warning">Simpan</button>
							<button type="button" name="btnUbah" id="btnUbah" class="btn btn-warning">Ubah</button>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>
<?php
include_once 'scriptJs.php';