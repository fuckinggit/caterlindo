<?php
$tbl = 'tb_hari_libur';
$var = 'HariLibur'; // Yang diganti
$judul = 'Kalender Hari Libur'; // Yang diganti
$uri = 'halaman/modul_kalender/hari_libur/'; // Yang diganti
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
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTgl<?php echo $var; ?>">
							Tanggal Libur<span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="hidden" id="idKd<?php echo $var; ?>" name="txtKdLibur">
							<input type="text" id="idTgl<?php echo $var; ?>" name="txtTgl" class="form-control dateRangePicker" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idDeskripsi<?php echo $var; ?>">
							Deskripsi<span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<textarea id="idDeskripsi<?php echo $var; ?>" name="txtDeskripsi" class="form-control" required="required"></textarea>
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
							<th style="width:5%;">Tanggal Libur</th>
							<th style="width:10%;">Deskripsi Hari Libur</th>
							<th style="width:1%; text-align:center;">Opsi</th>
						</tr>
					</thead>
					<tbody id="tabelData<?php echo $var; ?>">
						<?php
						$no = 0;
						$result = "SELECT * FROM ".$tbl." WHERE SUBSTR(tgl_libur, 7, 4) = '".date('Y')."'";	
						$stmt= $db->prepare($result);
						$stmt->bindParam(1, $selTgl);
						$selTgl = date('Y');
						$stmt->execute();
						$jml_kolom = $stmt->rowCount();
						
						if ($jml_kolom > 0) {
							while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
								$no++;
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $row['tgl_libur']; ?></td>
									<td><?php echo $row['deskripsi']; ?></td>
									<td align="center">
										<div class="btn-group">
											<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
												Opsi <span class="caret"></span>
											</button>
											<ul class="dropdown-menu" role="menu">
												<!-- <li><a href="?<?php echo $link; ?>&v=detail&id=<?php echo $row['id']; ?>"><i class="fa fa-book"></i> Detail</a></li> -->
												<li><a href="javascript:void(0);" onclick="editForm('<?php echo $row['id']; ?>')">
													<i class="fa fa-pencil"></i> Edit
												</a></li>
												<li class="divider"></li>
												<li><a href="javascript:void(0);" onclick="return confirm('Apakah anda yakin akan menghapus data?')?hapusData('hapus','<?php echo $row['id']; ?>'):false;">
													<i class="fa fa-times"></i> Hapus
												</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<?php
							}
						} else {
							$jum = 4;
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