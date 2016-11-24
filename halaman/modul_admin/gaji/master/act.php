<?php
$path = '../../../../';
$link = 'p=master_gaji_data&idmenu=2&idsubmenu=11';
include_once $path.'config/koneksi.php';
include_once $path.'objects/class.crud.php';
include_once $path.'config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'tm_gaji';
$p_key = 'kd_gaji';

if(isset($_POST['act']) && !empty($_POST['act'])){
	if($_POST['act'] == 'lihat'){
		?>
		<table id="dataTable" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th style="width:1%;">No.</th>
					<th style="width:10%;">Nama Gaji</th>
					<th style="width:5%;">Jumlah Minimal (Rp)</th>
					<th style="width:5%;">Jumlah Maximal (Rp)</th>
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
							<td><?php echo $row['nm_gaji']; ?></td>
							<td><?php echo formatRupiah($row['min_gaji']); ?></td>
							<td><?php echo formatRupiah($row['max_gaji']); ?></td>
							<td align="center">
								<div class="btn-group">
									<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
										Opsi <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<!-- <li><a href="?<?php echo $link; ?>&v=detail&id=<?php echo $row[$p_key]; ?>"><i class="fa fa-book"></i> Detail</a></li> -->
										<li><a href="javascript:void(0);" onclick="editForm('<?php echo $row[$p_key]; ?>')">
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
			$delete['tm_gaji'] = $crud->delete($tbl,$condition);
			$delete['td_karyawan_gaji'] = $crud->delete('td_karyawan_gaji',$condition);
			
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

		if ($_POST['txtMinJml'] > $_POST['txtMaxJml']) {
			$err = '<div class="alert alert-danger alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			  <strong>Error!</strong> Jumlah Minimal = '.formatRupiah($_POST['txtMinJml']).' tidak boleh lebih dari jumlah maximal = '.formatRupiah($_POST['txtMaxJml']).'
			</div>';
		} else {
			$data = array(
				$p_key => $kode,
				'nm_gaji' => $_POST['txtNamaGaji'],
				'min_gaji' => $_POST['txtMinJml'],
				'max_gaji' => $_POST['txtMaxJml']
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
		}
		echo $err;
	} if ($_GET['act'] == 'actEdit') {
		if ($_POST['txtMinJml'] > $_POST['txtMaxJml']) {
			$err = '<div class="alert alert-danger alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			  <strong>Error!</strong> Jumlah Minimal = '.formatRupiah($_POST['txtMinJml']).' tidak boleh lebih dari jumlah maximal = '.formatRupiah($_POST['txtMaxJml']).'
			</div>';
		} else {
			$data = array(
				'nm_gaji' => $_POST['txtNamaGaji'],
				'min_gaji' => $_POST['txtMinJml'],
				'max_gaji' => $_POST['txtMaxJml']
			);
			$where = array($p_key => $_POST['txtKdGaji']);

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
		}
		echo $err;
	}
}