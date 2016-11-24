<?php
$tbl = 'tm_cuti';
$p_key = 'kd_cuti';
$var = 'Cuti'; // Yang diganti
$judul = 'Master Cuti'; // Yang diganti
$uri = 'halaman/modul_kalender/master_cuti/'; // Yang diganti
?>
 
<div class="content-panel">
	<div class="panel-heading">
		<h3><i class="fa fa-angle-right"></i> Data <small><?php echo $judul; ?></small></h3>
	</div>
</div>

<div class="clearfix"></div>

<!-- FORM -->
<div class="row" <?php echo 'style="display:none;"'; ?> id="form<?php echo $var; ?>">
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
							Nama Cuti<span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="hidden" id="idKdCuti<?php echo $var; ?>" name="txtKdCuti">
							<input type="text" id="idNama<?php echo $var; ?>" name="txtNama" class="form-control" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idBagian<?php echo $var; ?>">
							Nama Bagian<span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<select id="idNamaBagian<?php echo $var; ?>" name="selBagian" class="form-control" required="required">
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
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idJabatan<?php echo $var; ?>">
							Nama Jabatan<span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<select id="idJabatan<?php echo $var; ?>" name="selJabatan" class="form-control" required="required">
								<option value="">-- Pilih Jabatan --</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idThnPeriode<?php echo $var; ?>">
							Tahun Periode<span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" id="idThnPeriode<?php echo $var; ?>" name="txtThnPeriode" class="form-control" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idLamaCuti<?php echo $var; ?>">
							Lama Cuti<span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" id="idLamaCuti<?php echo $var; ?>" name="txtLamaCuti" class="form-control" required="required">
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
							<th style="width:10%;">Nama Cuti</th>
							<th style="width:5%;">Nama Bagian</th>
							<th style="width:5%;">Nama Jabatan</th>
							<th style="width:5%;">Tahun Periode</th>
							<th style="width:5%;">Jatah Cuti</th>
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
									<td><?php echo $row['nm_cuti']; ?></td>
									<td><?php echo namaBagian('../../../', $row['kd_bagian']); ?></td>
									<td><?php echo namaJabatan('../../../', $row['kd_jabatan']); ?></td>
									<td><?php echo $row['thn_periode']; ?></td>
									<td><?php echo $row['lama_cuti']; ?></td>
									<td align="center">
										<div class="btn-group">
											<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
												Opsi <span class="caret"></span>
											</button>
											<ul class="dropdown-menu" role="menu">
												<li><a href="?<?php echo $link; ?>&v=detail&id=<?php echo $row[$p_key]; ?>"><i class="fa fa-book"></i> Detail</a></li>
												<li class="divider"></li>
												<li><a href="javascript:void(0);" onclick="editForm('<?php echo $row[$p_key]; ?>')">
													<i class="fa fa-pencil"></i> Edit
												</a></li>
												<li><a href="javascript:void(0);" onclick="return confirm('Apakah anda yakin akan menghapus data?')?hapusData('hapus','<?php echo $row[$p_key]; ?>'):false;">
													<i class="fa fa-times"></i> Hapus
												</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<?php
							}
						} else {
							$jum = 8;
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