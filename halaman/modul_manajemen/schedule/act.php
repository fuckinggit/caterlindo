<?php
$path = '../../../';
include_once $path.'config/koneksi.php';
include_once $path.'objects/class.crud.php';
include_once $path.'config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'SELECT
			tb_karyawan.kd_karyawan,
			tb_karyawan.nm_karyawan,
			tb_bagian.nm_bagian
		FROM
			tb_karyawan
		INNER JOIN tb_bagian ON tb_bagian.kd_bagian = tb_karyawan.kd_bagian
		';
$p_key = 'kd_karyawan';

if(isset($_POST['act']) && !empty($_POST['act'])){
	if($_POST['act'] == 'lihat'){
		?>
		<table id="dataTable" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th style="width:1%;">No.</th>
					<th style="width:10%;">Kode Karyawan</th>
					<th style="width:10%;">Nama Karyawan</th>
					<th style="width:10%;">Nama Bagian</th>
					<th style="width:1%; text-align:center;">Opsi</th>
				</tr>
			</thead>
			<tbody id="tabelData<?php echo $var; ?>">
				<?php
				$stmt = $db->prepare($tbl);
				$stmt->execute();
				$no = 0;
				
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					$no++;
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $row['kd_karyawan']; ?></td>
						<td><?php echo $row['nm_karyawan']; ?></td>
						<td><?php echo $row['nm_bagian']; ?></td>
						<td align="center">
							<div class="btn-group">
								<button type="submit" class="btn btn-primary pull-left mb" id="btnTambah<?php echo $var; ?>" name="btnTambah" style="margin-left:1%;">
								Lihat Schedule
								</button>
							</div>
						</td>
					</tr>
					<?php
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

		$data = array(
			$p_key => $kode,
			'nm_bagian' => $_POST['txtNama']
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
			'nm_bagian' => $_POST['txtNama']
		);
		$where = array($p_key => $_POST['txtIdBagian']);

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