<?php
// Form akan didapat dari data dinamis yang ada ditabel, kunci utama adalah kode master komponen itu dan kode karyawan.
$tbl = 'SELECT
			tb_karyawan.kd_karyawan,
			tb_karyawan.nm_karyawan,
			tb_bagian.nm_bagian
		FROM
			tb_karyawan
		INNER JOIN tb_bagian ON tb_bagian.kd_bagian = tb_karyawan.kd_bagian
		';
$p_key = 'kd_karyawan';
$var = 'Schedule'; // Yang diganti
$judul = 'Schedule'; // Yang diganti
$uri = 'halaman/modul_manajemen/schedule/'; // Yang diganti
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
				<form data-parsley-validate class="form-horizontal form-label-left" name="form1" id="formdata">
				
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idKaryawan<?php echo $var; ?>">
							Kode Karyawan<span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="hidden" id="idKd<?php echo $var; ?>" name="txtIdBagian">
							<input type="number" id="idKaryawan<?php echo $var; ?>" name="txtKaryawan" class="form-control" placeholder="" style="display: inline; width: 90%;" required="required">
						</div>
						
						
						
					</div>
					
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="bulan<?php echo $var; ?>">
							Bulan<span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<select class="form-control" name="bulan" required>
								<?php
									for ($i=1; $i <=12 ; $i++) { 
										echo "<option value='$i'>".$format->BulanIndo($i)."</option>";
									}
								?>
							</select>
							
						</div>
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="tahun<?php echo $var; ?>">
							Tahun<span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<select class="form-control" name="tahun" required>
								<option selected><?=date("Y")?></option>
								<?php
									for ($i=2050; $i >= 2000 ; $i--) { 
									echo "<option>$i</option>";
									}
								?>
							</select>
							
						</div>
					</div>
				 <div class="ln_solid"></div>
					<div class="form-group">
						<div style="margin-bottom:2%; float:left; margin-left:1%;">
							<button type="submit" id="proses" class="btn btn-info">Tampilkan</button>
						</div>
					</div>
					<hr />
					
					
				</form>
				<form id="form_akses" method="post">
				<div class="row" style="margin-top: 20px;">
					<span class="col-md-12">
						<h4 id="karyawan"></h4>
					</span>
					<div class="col-md-6" id="data_form">
					
					</div>
					<div id="tombol"></div>
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
	function ambil_nama(){
	   $nama='';
	  $sql_nama=mysql_query("select * from tb_karyawan");
	  while($data_nama=mysql_fetch_array($sql_nama)){
	  $nama.='"'.stripslashes($data_nama['kd_karyawan']).'",';
	  }
	  return(strrev(substr(strrev($nama),1)));
	}
?>
<?php
include_once 'scriptJs.php';