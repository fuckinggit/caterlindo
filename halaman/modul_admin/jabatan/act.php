<?php
$path = '../../../';
include_once $path.'config/koneksi.php';
include_once $path.'objects/class.crud.php';
include_once $path.'config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'tb_jabatan';
$p_key = 'kd_jabatan';

if(isset($_POST['act']) && !empty($_POST['act'])){
	if($_POST['act'] == 'lihat'){
		?>
		<table id="dataTable" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th style="width:1%;">No.</th>
					<th style="width:10%;">Sub Unit</th>
					<th style="width:10%;">Bagian</th>
					<th style="width:10%;">Jabatan</th>
					<th style="width:15%;">Gaji Tunjangan</th>
					<th style="width:10%;">Jumlah Tunjangan</th>
					<th style="width:10%;">Tipe Pembayaran</th>
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
							<td><?php echo dapatKolom($path, array('kd_unit' => $row['kd_unit']), 'tb_unit', 'nm_unit'); ?></td>
							<td><?php echo dapatKolom($path, array('kd_bagian' => $row['kd_bagian']), 'tb_bagian', 'nm_bagian'); ?></td>
							<td><?php echo $row['nm_jabatan'];?></td>
							<td><?php echo dapatKolom($path, array('kd_gaji' => $row['kd_gaji']), 'tm_gaji', 'nm_gaji'); ?></td>
							<td><?php echo formatRupiah($row['jml_gaji']); ?></td>
							<td><?php echo tipeGaji($row['tipe_gaji']); ?></td>
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
		(empty($_POST['txtDeskripsi']) or $_POST['txtDeskripsi'] == '')?$deskripsi='-':$deskripsi=$_POST['txtDeskripsi'];
		(empty($_POST['txtSpesifikasi']) or $_POST['txtSpesifikasi'] == '')?$spesifikasi='-':$spesifikasi=$_POST['txtSpesifikasi'];
		(empty($_POST['txtCatatan']) or $_POST['txtCatatan'] == '')?$catatan='-':$catatan=$_POST['txtCatatan'];

		$data = array(
			$p_key => $kode,
			'kd_unit' => $_POST['selUnit'],
			'kd_bagian' => $_POST['selBagian'],
			'nm_jabatan' => $_POST['txtNmJabatan'],
			'deskripsi' => $deskripsi,
			'spesifikasi' => $spesifikasi,
			'catatan' => $catatan,
			'kd_gaji' => $_POST['selGaji'],
			'frekuensi' => $_POST['selFrekuensi'],
			'tipe_gaji' => $_POST['selTipe'],
			'jml_gaji' => $_POST['txtJmlGaji']
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
			'kd_bagian' => $_POST['selBagian'],
			'nm_jabatan' => $_POST['txtNmJabatan'],
			'deskripsi' => $_POST['txtDeskripsi'],
			'spesifikasi' => $_POST['txtSpesifikasi'],
			'catatan' => $_POST['txtCatatan']
		);
		$where = array($p_key => $_POST['txtKdJabatan']);

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