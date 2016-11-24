<?php
$tbl = 'tb_kpi';
$var = 'KPI'; // Yang diganti
$judul = 'KPI'; // Yang diganti
$uri = 'halaman/modul_kpi/komponen/'; // Yang diganti
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
							Nama Komponen KPI<span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="hidden" id="idKdKpi<?php echo $var; ?>" name="txtIdKpi">
							<input type="text" id="idNama<?php echo $var; ?>" name="txtNama" class="form-control" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idNilaiMin<?php echo $var; ?>">
							Nilai Min<span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" id="idNilaiMin<?php echo $var; ?>" name="txtNilaiMin" class="form-control" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idNilaiMax<?php echo $var; ?>">
							Nilai Max<span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" id="idNilaiMax<?php echo $var; ?>" name="txtNilaiMax" class="form-control" required="required">
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
				<table id="dataTable" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th style="width:1%;">No.</th>
							<th style="width:10%;">Nama Komponen</th>
							<th style="width:5%;">Nilai Min</th>
							<th style="width:5%;">Nilai Max</th>
							<th style="width:1%; text-align:center;">Opsi</th>
						</tr>
					</thead>
					<tbody id="tabelData<?php echo $var; ?>">
						<?php
						$no = 0;
						$hasil = $crud->read($tbl);
						
						if (!empty($hasil)) {
							foreach($hasil as $row) {
								$no++;
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $row['nm_komponen']; ?></td>
									<td><?php echo $row['nilai_min']; ?></td>
									<td><?php echo $row['nilai_max']; ?></td>
									<td align="center">
										<div class="btn-group">
											<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
												Opsi <span class="caret"></span>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li><a href="?<?php echo $link; ?>&v=detail&id=<?php echo $row['kd_kpi']; ?>"><i class="fa fa-book"></i> Detail</a></li>
												<li class="divider"></li>
												<li><a href="javascript:void(0);" onclick="editForm('<?php echo $row['kd_kpi']; ?>')">
													<i class="fa fa-pencil"></i> Edit
												</a></li>
												<li><a href="javascript:void(0);" onclick="return confirm('Apakah anda yakin akan menghapus data?')?hapusData('hapus','<?php echo $row['kd_kpi']; ?>'):false;">
													<i class="fa fa-times"></i> Hapus
												</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<?php
							}
						} else {
							$jum = 5;
							?>
							<tr>
								<td colspan="<?php echo $jum; ?>" align="center">Tidak ada data yang ditampilkan!</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
</div>

<?php
include_once 'scriptJs.php';