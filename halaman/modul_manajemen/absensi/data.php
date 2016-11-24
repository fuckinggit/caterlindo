<?php
// Form akan didapat dari data dinamis yang ada ditabel, kunci utama adalah kode master komponen itu dan kode karyawan.
$tbl = 'tb_karyawan';
$p_key = 'kd_karyawan';
$var = 'Absensi'; // Yang diganti
$judul = 'Absensi'; // Yang diganti
$uri = 'halaman/modul_manajemen/absensi/'; // Yang diganti

$tbl2 = 'tab_absensi_new';
$p_key = 'kd_karyawan';
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
				<?php echo '<h2>Detail '.$judul.' Karyawan</h2>'; ?>
			</div>
			<div class="x_content">
				<br />
				<form data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data">
				
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idNama<?php echo $var; ?>">
							Nama Karyawan<span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="hidden" id="idKd<?php echo $var; ?>" name="txtId">
							<input type="text" id="idNama<?php echo $var; ?>" name="txtNama" class="form-control" placeholder="Nama Bagian" readonly="">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idNama<?php echo $var; ?>">
							Bagian<span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="hidden" id="idKd<?php echo $var; ?>" name="txtId">
							<select id="idBagian<?php echo $var; ?>" name="selBagian" class="form-control" readonly="">
								<option value="">-- Pilih Unit --</option>
								<?php
								$units = $crud->read('tb_bagian');
								if (!empty($units)) {
									foreach($units as $unit) {
										echo '<option value="'.$unit['kd_bagian'].'">'.$unit['nm_bagian'].'</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div style="margin-bottom:2%; float:right; margin-right:2%;">
							<a href="#" type="button" class="btn btn-warning" onClick="toggle();">
							<i class="fa fa-chevron-circle-down"></i>&nbsp;Lihat Detail
							</a>
						</div>
					</div>
		<!-- FORM TANGGAL-->	
				</form>
				
				<form id="hidethis<?php echo $var; ?>" style="display:none">
				 <?php $bln = date('m'); ?>
                      <form class="form-inline" role="form">
                           <div class="form-group m-r-20">
							  <label class="m-r-10">Bulan</label>
							  <select class="form-control" name="bulan">
								<option value="<?=$bln?>"><?=$format->BulanIndo($bln)?></option>
								<?php
								  for ($i=1; $i <=12 ; $i++) { 
									echo "<option value='$i'>".$format->BulanIndo($i)."</option>";
								  }
								?>
							  </select>
						  </div>
						  <div class="form-group m-r-20">
							  <label class="m-r-10">Tahun</label>
							  <select class="form-control" name="tahun">
								  <option selected><?=date("Y")?></option>
								<?php
								  for ($i=2050; $i >= 2000 ; $i--) { 
									echo "<option>$i</option>";
								  }
								?>
							  </select>
						  </div>
						  <div class="form-group m-r-20">
						  <button type="submit" class="btn btn-info" id="btn-cetak" >Filter Data</button>
						  </div>
				<table border="1" id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>No.Karyawan</th>
						<th>Nama</th>
						<th>Tanggal Absensi</th>
						<th>Shift</th>
						<th>Jadwal Masuk</th>
						<th>Jam Masuk</th>
						<th>Status Masuk</th>
						<th>Keterangan Masuk</th>
						<th>Jadwal Keluar</th>
						<th>Jam Keluar</th>
						<th>Status Keluar</th>
						<th>Keterangan Keluar</th>
					</tr>
				</thead>
				<tbody>
				
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					
				</tbody>
				</table>
                      </form>
				
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
				<button type="submit" onclick="importData()" class="btn btn-primary pull-left mb" style="margin-left:1%;"><i class="fa fa-indent"></i>&nbsp;Import Data</button>
				
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
<script>$(document).ready(function(){
    $('#myTable').DataTable();
});

function importData() {
  sUrl="test.php"; features = 'toolbar=no, left=350,top=100, ' + 
  'directories=no, status=no, menubar=no, ' + 
  'scrollbars=no, resizable=no';
  window.open(sUrl,"winChild",features);
}
</script>
<?php
include_once 'scriptJs.php';