<?php
if (isset($_POST['btnSimpan'])) {
	$data = array('kd_karyawan' => $_GET['id'],
		'nm_kontak_lain' => $_POST['txtNamaKontak'],
		'hubungan' => $_POST['txtHubungan'],
		'telp_rumah' => $_POST['txtTelp1'],
		'telp_mobile' => $_POST['txtTelp2'],
		'telp_kantor' => $_POST['txtTelp3']
	);
	$insert = $crud->create('td_karyawan_kontak_lain', $data);
	
	if ($insert) {
		$err = '<div class="alert alert-success alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <strong>Berhasil!</strong> Berhasil menambah data kontak.
		</div>';
	} else {
		$err = '<div class="alert alert-danger alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <strong>Error!</strong> Gagal menambah data, Kesalahan sistem!
		</div>';
	}
}

if(isset($_POST['btnHapus'])) {
	$delete = $crud->delete('td_karyawan_kontak_lain', array('kd_karyawan' => $_GET['id'], 'id' => $_POST['idTabelDetail']));
	
	if ($delete) {
		$err = '<div class="alert alert-success alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <strong>Berhasil!</strong> Berhasil hapus data kontak.
		</div>';
	} else {
		$err = '<div class="alert alert-danger alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <strong>Error!</strong> Gagal hapus data, Kesalahan sistem!
		</div>';
	}
}

if (isset($_POST['btnSimpanEdit'])) {
	$data = array('nm_kontak_lain' => $_POST['txtNamaKontak'],
		'hubungan' => $_POST['txtHubungan'],
		'telp_rumah' => $_POST['txtTelp1'],
		'telp_mobile' => $_POST['txtTelp2'],
		'telp_kantor' => $_POST['txtTelp3']
	);
	$where = array('id' => $_POST['txtId'], 'kd_karyawan' => $_GET['id']);
	$update = $crud->update('td_karyawan_kontak_lain', $data, $where);
	
	if ($update) {
		$err = '<div class="alert alert-success alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <strong>Berhasil!</strong> Berhasil mengubah data kontak.
		</div>';
	} else {
		$err = '<div class="alert alert-danger alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <strong>Error!</strong> Gagal mengubah data, Kesalahan sistem!
		</div>';
	}
}
?>
<div class="col-md-12 col-sm-12" id="formTambahKontak" <?php if(!isset($_POST['btnSimpan']) || isset($_POST['btnSimpan'])) {echo 'style="display:none;"';}?>>
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
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idNamaKontak">
				Nama Kontak <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="idNamaKontak" name="txtNamaKontak" class="form-control" required="required">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idHubungan">
				Hubungan <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<input type="text" id="idHubungan" name="txtHubungan" class="form-control" required="required">
				</div>
			</div>
			<hr />
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTelp1">
					Telp Rumah <span class="required">*</span>
				</label>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<input type="text" id="idTelp1" name="txtTelp1" class="form-control" required="required">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTelp2">
					HP
				</label>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<input type="text" id="idTelp2" name="txtTelp2" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTelp3">
					Telp Kantor
				</label>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<input type="text" id="idTelp3" name="txtTelp3" class="form-control">
				</div>
			</div>
			
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
	$dataDetail = $crud->read('td_karyawan_kontak_lain', array('where' => array('kd_karyawan' => $_GET['id'], 'id' => $_POST['idTabelDetail']), 'return_type' => 'single'));
	if (!empty($dataDetail)) {
		?>
		<div class="col-md-12 col-sm-12" id="formEditKontak">
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
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idNamaKontak">
						Nama Kontak <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="idNamaKontak" name="txtNamaKontak" class="form-control" value="<?php echo $dataDetail['nm_kontak_lain']; ?>" required="required">
							<input type="hidden" name="txtId" value="<?php echo $_POST['idTabelDetail']; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idHubungan">
						Hubungan <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="idHubungan" name="txtHubungan" class="form-control" value="<?php echo $dataDetail['hubungan']; ?>" required="required">
						</div>
					</div>
					<hr />
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTelp1">
							Telp Rumah <span class="required">*</span>
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<input type="text" id="idTelp1" name="txtTelp1" class="form-control" value="<?php echo $dataDetail['telp_rumah']; ?>" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTelp2">
							HP
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<input type="text" id="idTelp2" name="txtTelp2" class="form-control" value="<?php echo $dataDetail['telp_mobile']; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="idTelp3">
							Telp Kantor
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<input type="text" id="idTelp3" name="txtTelp3" class="form-control" value="<?php echo $dataDetail['telp_kantor']; ?>">
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
		<button type="submit" class="btn btn-info pull-left mb" id="idTambahKontak" name="btnTambahKontak" onClick="showForm()" style="margin-left:1%;">
			<i class="fa fa-plus"></i> Tambah Data
		</button>
		<table class="table table-striped table-advanced table-hover">
			<thead>
				<tr>
					<th style="width:1%;">No.</th>
					<th style="width:10%;">Nama</th>
					<th style="width:15%;">Hubungan</th>
					<th style="width:10%;">Telp Rumah</th>
					<th style="width:10%;">Telp Mobile</th>
					<th style="width:5%;">Telp Kantor</th>
					<th style="width:10%; text-align:center;">Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 0;
				
				$hasil = $crud->read('td_karyawan_kontak_lain', array('where' => array('kd_karyawan' => $_GET['id'])));
				
				if (!empty($hasil)) {
					foreach($hasil as $row) {
						$no++;
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $row['nm_kontak_lain']; ?></td>
							<td><?php echo $row['hubungan']; ?></td>
							<td><?php echo $row['telp_rumah']; ?></td>
							<td><?php echo $row['telp_mobile']; ?></td>
							<td><?php echo $row['telp_kantor']; ?></td>
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
	$('#formTambahKontak').fadeIn(1000);
	$('#idTambahKontak').hide();
	$('#formEditKontak').hide();
}
</script>