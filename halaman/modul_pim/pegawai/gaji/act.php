<?php
$path = '../../../../';
$link = 'p=master_gaji_data&idmenu=2&idsubmenu=11';
include_once $path.'config/koneksi.php';
include_once $path.'objects/class.crud.php';
include_once $path.'config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'td_karyawan_gaji';
$p_key = 'id';

if(isset($_POST['act']) && !empty($_POST['act'])){
	if($_POST['act'] == 'lihat'){
		?>
		<table id="" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th style="width:1%;">No.</th>
					<th style="width:8%;">Nama Gaji</th>
					<th style="width:7%;">Frekuensi Gaji</th>
					<th style="width:5%;">Jumlah Gaji</th>
					<th style="width:5%;">Keterangan</th>
					<th style="width:7%;">Tipe Gaji</th>
					<th style="width:1%; text-align:center;">Opsi</th>
				</tr>
			</thead>
			<tbody id="tabelData<?php echo $var; ?>">
				<?php
				$no = 0;
				$hasil = $crud->read($tbl, array('where'=>array('kd_karyawan'=>$_POST['id'])));
				
				if (!empty($hasil)) {
					foreach($hasil as $row) {
						$no++;
						$jml[] = $row['jml_gaji'];
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo dapatKolom($path, array('kd_gaji'=>$row['kd_gaji']), 'tm_gaji', 'nm_gaji'); ?></td>
							<td><?php echo detFrekuensi($row['frekuensi']); ?></td>
							<td><?php echo formatRupiah($row['jml_gaji']); ?></td>
							<td><?php echo $row['keterangan']; ?></td>
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
				(!empty($jml))?$jml=$jml:$jml=array('');
				?>
				<tfoot>
					<tr>
						<th style="text-align:center;"><?php echo $no+1; ?></th>
						<th colspan="2" style="text-align:center;">Total Gaji</th>
						<th style="text-align:center;"><?php echo formatRupiah(array_sum($jml));?></th>
						<th colspan="3" style="text-align:center;"></th>
					</tr>
				</tfoot>
			</tbody>
		</table>
		
		<script>
			$('#dataTable').dataTable({
				"paging":   false,
				"ordering" : false,
				"language" : {
					"lengthMenu" : "Tampilkan _MENU_ data",
					"zeroRecords" : "Maaf tidak ada data yang ditampilkan!",
					"info" : "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
					"infoEmpty" : "Tidak ada data yang ditampilkan",
					"search" : "Cari :",
					"paginate": {
						"first":      '<span class="glyphicon glyphicon-fast-backward"></span>',
						"last":       '<span class="glyphicon glyphicon-fast-forward"></span>',
						"next":       '<span class="glyphicon glyphicon-forward"></span>',
						"previous":   '<span class="glyphicon glyphicon-backward"></span>'
					}
				}
			});
		</script>
		<?php
		//include_once $path.'config/dataTable.php';
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
		// Set nama
		$nm_gaji = dapatKolom($path, array('kd_gaji'=>$_POST['selGaji']), 'tm_gaji', 'nm_gaji');
		$nm_karyawan = dapatKolom($path, array('kd_karyawan'=>$_POST['txtIdKaryawan']), 'tb_karyawan', 'nm_karyawan');
		// Lihat data gaji karyawan
		$condKar['where'] = array('kd_gaji' => $_POST['selGaji'], 'kd_karyawan' => $_POST['txtIdKaryawan']);
		$condKar['return_type'] = 'count';
		$jmlGaji = $crud->read($tbl, $condKar);
		
		if ($jmlGaji < 1) {
			$data = array(
				'kd_gaji' => $_POST['selGaji'],
				'kd_karyawan' => $_POST['txtIdKaryawan'],
				'frekuensi' => $_POST['selFrekuensi'],
				'jml_gaji' => $_POST['txtJml'],
				'keterangan' => $_POST['txtCatatan'],
				'tipe_gaji' => $_POST['selTipe']
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
		} else {
			$err = '<div class="alert alert-danger alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			  <strong>Error!</strong> '.$nm_karyawan.' sudah memiliki '.$nm_gaji.'!
			</div>';
		}
		
		echo $err;
	} if ($_GET['act'] == 'actEdit') {
		// Set nama
		$nm_gaji = dapatKolom($path, array('kd_gaji'=>$_POST['selGaji']), 'tm_gaji', 'nm_gaji');
		$nm_karyawan = dapatKolom($path, array('kd_karyawan'=>$_POST['txtIdKaryawan']), 'tb_karyawan', 'nm_karyawan');
		// Lihat data gaji karyawan
		$condKar['where'] = array('kd_gaji' => $_POST['selGaji'], 'kd_karyawan' => $_POST['txtIdKaryawan']);
		$condKar['where_not'] = array($p_key => $_POST['txtKdGaji']);
		$condKar['return_type'] = 'count';
		$jmlGaji = $crud->read($tbl, $condKar);
		
		if ($jmlGaji < 1) {
			$data = array(
				'kd_gaji' => $_POST['selGaji'],
				'kd_karyawan' => $_POST['txtIdKaryawan'],
				'frekuensi' => $_POST['selFrekuensi'],
				'jml_gaji' => $_POST['txtJml'],
				'keterangan' => $_POST['txtCatatan'],
				'tipe_gaji' => $_POST['selTipe']
			);
			$where = array($p_key => $_POST['txtKdGaji']);

			$aksi = $crud->update($tbl, $data, $where);

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
		} else {
			$err = '<div class="alert alert-danger alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			  <strong>Error!</strong> '.$nm_karyawan.' sudah memiliki '.$nm_gaji.'!
			</div>';
		}
		
		echo $err;
	}
}