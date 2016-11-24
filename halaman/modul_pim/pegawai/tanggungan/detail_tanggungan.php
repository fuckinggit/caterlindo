<?php
if (isset($_POST['btnSimpan'])) {
	$data = array('kd_karyawan' => $_GET['id'],
		'nm_tanggungan' => $_POST['txtNama'],
		'tgl_lahir' => $_POST['txtTglLahir'],
		'hubungan' => $_POST['selHubungan']
	);
	$insert = $crud->create('td_karyawan_tanggungan', $data);
	
	if ($insert) {
		$err = '<div class="alert alert-success alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <strong>Berhasil!</strong> Berhasil menambah data.
		</div>';
	} else {
		$err = '<div class="alert alert-danger alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <strong>Error!</strong> Gagal menambah data, Kesalahan sistem!
		</div>';
	}
}

if(isset($_POST['btnHapus'])) {
	$delete = $crud->delete('td_karyawan_tanggungan', array('kd_karyawan' => $_GET['id'], 'id' => $_POST['idTabelDetail']));
	
	if ($delete) {
		$err = '<div class="alert alert-success alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <strong>Berhasil!</strong> Berhasil hapus data.
		</div>';
	} else {
		$err = '<div class="alert alert-danger alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <strong>Error!</strong> Gagal hapus data, Kesalahan sistem!
		</div>';
	}
}

if (isset($_POST['btnSimpanEdit'])) {
	$data = array('nm_tanggungan' => $_POST['txtNamaEdit'],
		'tgl_lahir' => $_POST['txtTglLahirEdit'],
		'hubungan' => $_POST['selHubunganEdit']
	);
	$where = array('id' => $_POST['txtId'], 'kd_karyawan' => $_GET['id']);
	$update = $crud->update('td_karyawan_tanggungan', $data, $where);
	
	if ($update) {
		$err = '<div class="alert alert-success alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <strong>Berhasil!</strong> Berhasil mengubah data.
		</div>';
	} else {
		$err = '<div class="alert alert-danger alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <strong>Error!</strong> Gagal mengubah data, Kesalahan sistem!
		</div>';
	}
}
?>

<div class="col-md-12 col-sm-12" id="formTambah" <?php if(!isset($_POST['btnSimpan']) || isset($_POST['btnSimpan'])) {echo 'style="display:none;"';}?>>
	<div class="grey-panel donut-chart">
		<div class="grey-header">
			<?php
			if (isset($_GET['menu'])) {
				$menu = $_GET['menu'];
				$judul = ucfirst(str_replace('_', ' ', $menu));
			} else {
				$judul = 'Data pribadi';
			}
			echo '<h5>Input '.$judul.'</h5>';
			?>
		</div>
		<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data" style="margin-left:15px; margin-right:15px">

			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idNama">
				Nama <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="idNama" name="txtNama" class="form-control" required="required">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idNama">
				Hubungan <span class="required">*</span>
				</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<select class="form-control" id="idJekel" name="selHubungan" required="required">
						<option value="">-- Hubungan --</option>
						<option value="0">Anak</option>
						<option value="1">Lainnya</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12">Tanggal Lahir</label>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<input type="text" id="dateRangePicker" name="txtTglLahir" class="form-control dateRangePicker"> 
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
	</div><!-- /grey-panel -->
</div>

<?php
if (isset($_POST['btnEdit'])) {
	$dataDetail = $crud->read('td_karyawan_tanggungan', array('where' => array('kd_karyawan' => $_GET['id'], 'id' => $_POST['idTabelDetail']), 'return_type' => 'single'));
	if (!empty($dataDetail)) {
		?>
		<div class="col-md-12 col-sm-12" id="formEdit">
			<div class="grey-panel donut-chart">
				<div class="grey-header">
					<?php
					if (isset($_GET['menu'])) {
						$menu = $_GET['menu'];
						$judul = ucfirst(str_replace('_', ' ', $menu));
					} else {
						$judul = 'Data pribadi';
					}
					echo '<h5>Edit '.$judul.'</h5>';
					?>
				</div>
				<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data" style="margin-left:15px; margin-right:15px">

					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idNama">
						Nama <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="idNama" name="txtNamaEdit" class="form-control" value="<?php echo $dataDetail['nm_tanggungan']; ?>" required="required">
							<input type="hidden" name="txtId" value="<?php echo $_POST['idTabelDetail']; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idNama">
						Hubungan <span class="required">*</span>
						</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<select class="form-control" id="idJekel" name="selHubunganEdit" required="required">
								<option value="">-- Hubungan --</option>
								<?php if ($dataDetail['hubungan'] == '0') {echo 'selected';} ?>
								<option value="0"<?php if ($dataDetail['hubungan'] == '0') {echo 'selected';} ?>>Anak</option>
								<option value="1"<?php if ($dataDetail['hubungan'] == '1') {echo 'selected';} ?>>Lainnya</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">Tanggal Lahir</label>
						<div class="col-md-4 col-sm-12 col-xs-12">
							<input type="text" id="dateRangePicker" name="txtTglLahirEdit" class="form-control" value="<?php echo $dataDetail['tgl_lahir']; ?>"> 
						</div>
					</div>
					
					<div class="ln_solid"></div>
					<div class="form-group">
						<div style="margin-bottom:2%; float:right; margin-right:2%;">
							<button type="submit" name="btnSimpanEdit" class="btn btn-warning">Simpan</button>
						</div>
					</div>
				</form>
			</div><!-- /grey-panel -->
		</div>
		<?php
	}
}
?>

<div class="col-md-12 col-sm-12 mb">
	<div class="grey-panel donut-chart" style="margin-bottom:2%; float:right;">
		<div class="grey-header">
			<?php
			if (isset($_GET['menu'])) {
				$menu = $_GET['menu'];
				$judul = ucfirst(str_replace('_', ' ', $menu));
			} else {
				$judul = 'Data pribadi';
			}
			echo '<h5>'.$judul.'</h5>';
			?>
		</div>
		<?php if (isset($_POST['btnSimpan']) || isset($_POST['btnHapus']) || isset($_POST['btnSimpanEdit'])) {echo $err;} ?>
		<button type="submit" class="btn btn-info pull-left mb" id="idTambah" name="btnTambah" onClick="showForm()" style="margin-left:1%;">
			<i class="fa fa-plus"></i> Tambah Data
		</button>
		<table class="table table-striped table-advanced table-hover">
			<thead>
				<tr>
					<th style="width:1%;">No.</th>
					<th style="width:10%;">Nama</th>
					<th style="width:15%;">Hubungan</th>
					<th style="width:10%;">Tgl Lahir</th>
					<th style="width:10%; text-align:center;">Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 0;
				
				$hasil = $crud->read('td_karyawan_tanggungan', array('where' => array('kd_karyawan' => $_GET['id'])));
				
				if (!empty($hasil)) {
					foreach($hasil as $row) {
						$no++;
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $row['nm_tanggungan']; ?></td>
							<td><?php echo selHubTangunggan($row['hubungan']); ?></td>
							<td><?php echo $row['tgl_lahir']; ?></td>
							<td align="center">
								<form method="POST" action="" enctype="multipart/form-data">
									<input type="hidden" name="idTabelDetail" value="<?php echo $row['id']; ?>">
									<button type="submit" class="btn btn-warning" title="Edit Data" id="idBtnEdit" name="btnEdit"><i class="fa fa-pencil"></i></button>
									<button class="btn btn-danger" title="Hapus Data" name="btnHapus"><i class="fa fa-times"></i></button>
								</form>
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
		
	</div><!-- /grey-panel -->
</div>

<script>
function showForm() {
	$('#formTambah').fadeIn(1000);
	$('#idTambah').hide();
	$('#formEdit').hide();
}
</script>