<?php
$tbl = 'tb_general_affair';
$var = 'GeneralAffair'; // Yang diganti
$judul = 'General Affair'; // Yang diganti
$uri = 'halaman/modul_general/'; // Yang diganti
?>
 
<div class="content-panel">
	<div class="panel-heading">
		<h3><i class="fa fa-angle-right"></i> Data <small>General Affair</small></h3>
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
							Nama General Affair<span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="hidden" value="<?php echo $_SESSION['kd_admin']; ?>" name="txtKdAdmin">
							<input type="hidden" id="idKdGeneral<?php echo $var; ?>" name="txtIdGeneral">
							<input type="text" id="idNama<?php echo $var; ?>" name="txtNama" class="form-control" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTipe<?php echo $var; ?>">
							Tipe <span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<select class="form-control" id="idTipe<?php echo $var; ?>" name="selTipe" required="required">
								<option value="">-- Pilih Tipe --</option>
								<option value="Bangunan">Bangunan</option>
								<option value="Transportasi">Transportasi</option>
								<option value="Dokumen">Dokumen</option>
								<option value="Lain-Lain">Lain-Lain</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTglMulai<?php echo $var; ?>">
							Tanggal Mulai Terhitung <span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-6 col-xs-12">
							<input type="text" id="idTglMulai<?php echo $var; ?>" name="txtTglMulai" class="form-control dateRangePicker" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTglAkhir<?php echo $var; ?>">
							Jatuh Tempo <span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-6 col-xs-12">
							<input type="text" id="idTglAkhir<?php echo $var; ?>" name="txtTglAkhir" class="form-control dateRangePicker" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idStatus<?php echo $var; ?>">
							Notifikasi <span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<select class="form-control" id="idStatus<?php echo $var; ?>" name="selStatus" onchange="showReminder(this.value)" required="required">
								<option value="">-- Pilih Status --</option>
								<option value="0">Non-Aktif</option>
								<option value="1">Aktif</option>
							</select>
						</div>
					</div>
					<div id="idFormReminder" style="display:none;">
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idReminder<?php echo $var; ?>">
								Set Reminder
							</label>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<input type="text" id="idReminder<?php echo $var; ?>" name="txtReminder" class="form-control dateRangePicker">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idAttach<?php echo $var; ?>">
							Upload Scan Dokumen
						</label>
						<div class="col-md-4 col-sm-6 col-xs-12" id="idDivFile" style="display:none;">
							<img id="idFileAttachment" width="250px" height="400px">
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="cropHeaderWrapper">
								<input type="file" id="idFile" name="txtFileGa" class="form-control">
							</div><!-- /col-lg-6 -->
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
				<h2>General Affair</h2>
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
							<th style="width:10%;">General Affair</th>
							<th style="width:10%;">Tipe</th>
							<th style="width:10%;">Tgl Mulai Terhitung</th>
							<th style="width:10%;">Jatuh Tempo</th>
							<th style="width:10%">Status</th>
							<th style="width:5%; text-align:center;">Opsi</th>
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
									<td><?php echo $row['nm_general']; ?></td>
									<td><?php echo $row['tipe']; ?></td>
									<td><?php echo $row['tgl_mulai']; ?></td>
									<td><?php echo $row['tgl_akhir']; ?></td>
									<td><?php echo statusGeneral($row['status']); ?></td>
									<td align="center">
										<div class="btn-group">
											<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
												Opsi <span class="caret"></span>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li><a href="?<?php echo $link; ?>&v=detail&id=<?php echo $row['kd_general']; ?>"><i class="fa fa-book"></i> Detail</a></li>
												<li class="divider"></li>
												<li><a href="javascript:void(0);" onclick="editForm('<?php echo $row['kd_general']; ?>')">
													<i class="fa fa-pencil"></i> Edit
												</a></li>
												<li><a href="javascript:void(0);" onclick="return confirm('Apakah anda yakin akan menghapus data?')?hapusData('hapus','<?php echo $row['kd_general']; ?>'):false;">
													<i class="fa fa-times"></i> Hapus
												</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<?php
							}
						} else {
							$jum = 7;
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