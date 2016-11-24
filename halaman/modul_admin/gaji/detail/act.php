<?php
$path = '../../../../';
$link = 'p=master_gaji_data&idmenu=2&idsubmenu=11';
include_once $path.'config/koneksi.php';
include_once $path.'objects/class.crud.php';
include_once $path.'config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'td_gaji';
$p_key = 'id';

if(isset($_POST['act']) && !empty($_POST['act'])){
	if($_POST['act'] == 'lihat'){
		?>
		<table id="dataTable" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th style="width:1%;">No.</th>
					<th style="width:10%;">Nama Gaji</th>
					<th style="width:10%;">Nama Bagian</th>
					<th style="width:10%;">Nama Jabatan</th>
					<th style="width:5%;">Jumlah Gaji (Rp)</th>
					<th style="width:1%; text-align:center;">Opsi</th>
				</tr>
			</thead>
			<tbody id="tabelData<?php echo $var; ?>">
				<?php
				$no = 0;
				$cons['where'] = array('kd_gaji' => $_POST['id']);
				$hasil = $crud->read($tbl, $cons);
				
				if (!empty($hasil)) {
					foreach($hasil as $row) {
						$no++;
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo namaGaji($path, $row['kd_gaji']); ?></td>
							<td><?php echo namaBagian($path, $row['kd_bagian']); ?></td>
							<td><?php echo namaJabatan($path, $row['kd_jabatan']); ?></td>
							<td><?php echo formatRupiah($row['nilai_gaji']); ?></td>
							<td align="center">
								<div class="btn-group">
									<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
										Opsi <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="javascript:void(0);" onclick="editForm('<?php echo $row[$p_key]; ?>','<?php echo $row['kd_bagian']; ?>','<?php echo $row['kd_jabatan']; ?>')">
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
		$kondisi['select'] = $p_key.' as IDMax';
		$kondisi['order_by'] = 'id DESC';
		$kode = $crud->autoId($tbl, $kondisi, 2, '');
		
		//Cek dulu
		$nm_gaji = namaGaji($path, $_POST['txtKdGaji']);
		$nm_bagian = namaBagian($path, $_POST['selBagian']);
		$nm_jabatan = namaJabatan($path, $_POST['selJabatan']);
		$cond['where'] = array('kd_bagian' => $_POST['selBagian'], 'kd_jabatan' => $_POST['selJabatan']);
		$cond['return_type'] = 'count';
		$qBag = $crud->read($tbl, $cond);
		
		if ($qBag > 0) {
			$err = '<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					  <strong>Error, Data Duplikasi!</strong> '.$nm_gaji.' Bagian : '.$nm_bagian.', Jabatan : '.$nm_jabatan.'.
					</div>';
		} else {
			$data = array(
				'kd_gaji' => $_POST['txtKdGaji'],
				'kd_bagian' => $_POST['selBagian'],
				'kd_jabatan' => $_POST['selJabatan'],
				'nilai_gaji' => $_POST['txtJml']
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
		$nm_gaji = namaGaji($path, $_POST['txtKdGaji']);
		$nm_bagian = namaBagian($path, $_POST['selBagian']);
		$nm_jabatan = namaJabatan($path, $_POST['selJabatan']);
		
		// Cek data update, apakah sama dengan data yang sudah ada
		$cUp['where'] = array('kd_bagian' => $_POST['selBagian'], 'kd_jabatan' => $_POST['selJabatan']);
		$cUp['where_not'] = array($p_key => $_POST['txtKdDetail']);
		$cUp['return_type'] = 'count';
		$dUp = $crud->read($tbl, $cUp);
		if ($dUp < 1) {
			$data = array(
				'kd_bagian' => $_POST['selBagian'],
				'kd_jabatan' => $_POST['selJabatan'],
				'nilai_gaji' => $_POST['txtJml']
			);
			$where = array($p_key => $_POST['txtKdDetail']);

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
		} else {
			$err = '<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					  <strong>Error, Data Duplikasi!</strong> '.$nm_gaji.' Bagian : '.$nm_bagian.', Jabatan : '.$nm_jabatan.'.
					</div>';
		}
		echo $err;
	}
}