<?php
$path = '../../';
$link = 'p=pegawai_data&idmenu=3';
include_once $path.'config/koneksi.php';
include_once $path.'objects/class.crud.php';
include_once $path.'config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'tb_general_affair';
$p_key = 'kd_general';

if(isset($_POST['act']) && !empty($_POST['act'])){
	if($_POST['act'] == 'lihat'){
		?>
		<table id="dataTable" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th style="width:1%;">No.</th>
					<th style="width:10%;">General Affair</th>
					<th style="width:10%;">File Attachment</th>
					<th style="width:10%;">Tipe</th>
					<th style="width:10%;">Tgl Mulai Terhitung</th>
					<th style="width:10%;">Jatuh Tempo</th>
					<th style="width:10%">Status</th>
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
							<td><?php echo $row['nm_general']; ?></td>
							<td><a href="<?php echo 'assets/img/general_affair/'.$row['attachment']; ?>"><?php echo $row['attachment']; ?></a></td>
							<td><?php echo dapatKolom($path, array('id' => $row['kd_tipe']), 'tb_tipe_ga', 'tipe_ga'); ?></td>
							<td><?php echo $row['tgl_mulai']; ?></td>
							<td><?php echo $row['tgl_akhir']; ?></td>
							<td><?php echo statusGeneral($row['status']); ?></td>
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
			$delete = $crud->delete($tbl, $condition);
			
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
		switch ($_POST['txtTglMulai']) {
			case $_POST['txtTglMulai'] > $_POST['txtTglAkhir']:
				$err = '<div class="alert alert-danger alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				  <strong>Error!</strong> Tanggal mulai terhitung tidak boleh lebih dari jatuh tempo!
				</div>';
			break;
			
			case $_POST['txtTglAkhir'] < $_POST['txtTglMulai']:
				$err = '<div class="alert alert-danger alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				  <strong>Error!</strong> Tanggal jatuh tempo tidak boleh kurang dari tanggal mulai terhitung!
				</div>';
			break;
			
			switch ($_POST['selStatus']) {
				case $_POST['selStatus'] == '1':
					switch ($_POST['txtReminder']) {
						case $_POST['txtReminder'] < $_POST['txtTglMulai'] || $_POST['txtReminder'] > $_POST['txtTglAkhir']:
							$err = '<div class="alert alert-danger alert-dismissable">
							  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							  <strong>Error!</strong> Tanggal reminder tidak boleh kurang dari tanggal mulai dan tanggal reminder tidak boleh lebih dari tanggal akhir.!
							</div>';
						break;
					}
				break;
			}
			
			default:
				$kondisi['select'] = $p_key.' as IDMax';
				$kondisi['order_by'] = 'id DESC';
				$kode = $crud->autoId($tbl, $kondisi, 5, '');
				
				$nm_media = str_replace(' ', '-', $_FILES['txtFileGa']['name']);
				$asd = rand(0000,9999);
				$foto = $asd.$nm_media;
				$up_media = move_uploaded_file($_FILES["txtFileGa"]["tmp_name"], $path."assets/img/general_affair/".$foto);
				
				$data = array(
					$p_key => $kode,
					'nm_general' => $_POST['txtNama'],
					'kd_tipe' => $_POST['selTipe'],
					'tgl_mulai' => $_POST['txtTglMulai'],
					'tgl_akhir' => $_POST['txtTglAkhir'],
					'status' => $_POST['selStatus'],
					'attachment' => $foto,
					'kd_admin' => $_POST['txtKdAdmin'],
					'tgl_reminder' => $_POST['txtReminder']
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
			break;
		}
		
		echo $err;
	} if ($_GET['act'] == 'actEdit') {
		$data = array(
			'nm_bahasa' => $_POST['txtNm']
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