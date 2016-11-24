<?php
$path = '../../../';
$link = 'p=master_gaji_data&idmenu=2&idsubmenu=11';
include_once $path.'config/koneksi.php';
include_once $path.'objects/class.crud.php';
include_once $path.'config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'tb_lokasi';
$p_key = 'kd_lokasi_perusahaan';

if(isset($_POST['act']) && !empty($_POST['act'])){
	if($_POST['act'] == 'lihat'){
		?>
		<table id="dataTable" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th style="width:1%;">No.</th>
					<th style="width:10%;">Perusahaan</th>
					<th style="width:10%;">Negara</th>
					<th style="width:10%;">Provinsi</th>
					<th style="width:10%;">Kota</th>
					<th style="width:10%;">Kode Pos</th>
					<th style="width:10%;">Alamat</th>
					<th style="width:10%;">Telp</th>
					<th style="width:10%;">Fax</th>
					<th style="width:10%;">Catatan</th>
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
							<td><?php echo $row['nm_lokasi_perusahaan']; ?></td>
							<td><?php echo $row['kd_negara'];?></td>
							<td>
								<?php
								if ($row['kd_provinsi'] != 'WNA') {
									echo dapatKolom($path, array('fc_kdprop' => $row['kd_provinsi']), 'tm_prop', 'fv_nmprop');
								} else {
									echo $row['kd_provinsi'];
								}
								?>
							</td>
							<td>
								<?php
								if ($row['kd_provinsi'] != 'WNA') {
									echo dapatKolom($path, array('fc_kdprop' => $row['kd_provinsi'], 'fc_kdkota' => $row['kd_kota']), 'tm_kota', 'fv_nmkota');
								} else {
									echo $row['kd_kota'];
								}
								?>
							</td>
							<td><?php echo $row['kd_pos']; ?></td>
							<td><?php echo $row['alamat']; ?></td>
							<td><?php echo $row['no_telp']; ?></td>
							<td><?php echo $row['no_fax']; ?></td>
							<td><?php echo $row['catatan']; ?></td>
							<td align="center">
								<div class="btn-group">
									<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
										Opsi <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<!-- <li><a href="?<?php echo $link; ?>&v=detail&id=<?php echo $row[$p_key]; ?>"><i class="fa fa-book"></i> Detail</a></li> -->
										<li><a href="javascript:void(0);" onclick="editForm('<?php echo $row[$p_key]; ?>', '<?php echo $row['kd_negara']; ?>', '<?php echo $row['kd_provinsi']; ?>', '<?php echo $row['kd_kota']; ?>')">
											<i class="fa fa-pencil"></i> Edit
										</a></li>
										<li class="divider"></li>
										<li><a href="javascript:void(0);" onclick="return confirm('Apakah anda yakin akan menghapus data?')?hapusData('hapus','<?php echo $row[$p_key]; ?>'):false;">
											<i class="fa fa-times"></i> Hapus
										</a></li>
									</ul>
								</div>
							</td>
						</tr>
						<?php
					}
				}
				?>
			</tbody>
		</table>
		<?php
		include_once $path.'config/dataTable.php';
	} if ($_POST['act'] == 'edit') {
		$data['where'] = array($p_key => $_POST['id']);
		$data['return_type'] = 'single';
		$detail = $crud->read($tbl, $data);
		echo json_encode($detail);
	} if ($_POST['act'] == 'hapus'){
		if(!empty($_POST['id'])){
			$condition = array($p_key => $_POST['id']);
			$delete = $crud->delete($tbl,$condition);
			
			if ($delete) {
				$err = '<div class="alert alert-success alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				  <strong>Berhasil!</strong> Aksi Hapus Berhasil.
				</div>';
			} else {
				$err = '<div class="alert alert-danger alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				  <strong>Error!</strong> Gagal Hapus, Kesalahan sistem!
				</div>';
			}

			echo $err;
		}
	}
	exit;
}

if(isset($_GET['act']) && !empty($_GET['act'])){
	if ($_GET['act'] == 'input') {
		// Jumlah Minimal tidak boleh lebih dari jumlah maximal
		// Jumlah Maximal tidak boleh lebih dari jumlah minimal
		$kondisi['select'] = $p_key.' as IDMax';
		$kondisi['order_by'] = 'id DESC';
		$kode = $crud->autoId($tbl, $kondisi, 2, '');

		$data = array(
			$p_key => $kode,
			'nm_lokasi_perusahaan' => $_POST['txtNama'],
			'kd_negara' => $_POST['selNegara'],
			'kd_provinsi' => $_POST['selProvinsi'],
			'kd_kota' => $_POST['selKota'],
			'alamat' => $_POST['txtAlamat'],
			'kd_pos' => $_POST['txtKdPos'],
			'no_telp' => $_POST['txtTelp'],
			'no_fax' => $_POST['txtFax'],
			'catatan' => $_POST['txtCat']
		);
		$aksi = $crud->create($tbl,$data);

		if ($aksi) {
			$err = '<div class="alert alert-success alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			  <strong>Berhasil!</strong> Aksi Input Berhasil.
			</div>';
		} else {
			$err = '<div class="alert alert-danger alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			  <strong>Error!</strong> Gagal Input, Kesalahan sistem!
			</div>';
		}
		echo $err;
	} if ($_GET['act'] == 'actEdit') {
		$data = array(
			'nm_lokasi_perusahaan' => $_POST['txtNama'],
			'kd_negara' => $_POST['selNegara'],
			'kd_provinsi' => $_POST['selProvinsi'],
			'kd_kota' => $_POST['selKota'],
			'alamat' => $_POST['txtAlamat'],
			'kd_pos' => $_POST['txtKdPos'],
			'no_telp' => $_POST['txtTelp'],
			'no_fax' => $_POST['txtFax'],
			'catatan' => $_POST['txtCat']
		);
		$where = array($p_key => $_POST['txtKode']);

		$aksi = $crud->update($tbl, $data, $where);
		if ($aksi) {
			$err = '<div class="alert alert-success alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			  <strong>Berhasil!</strong> Aksi Edit Berhasil.
			</div>';
		} else {
			$err = '<div class="alert alert-danger alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			  <strong>Error!</strong> Gagal Edit, Kesalahan sistem!
			</div>';
		}
		echo $err;
	}
}