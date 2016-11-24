<?php
$path = '../../../../';
include_once $path.'config/koneksi.php';
include_once $path.'objects/class.crud.php';
include_once $path.'config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'td_karyawan_mutasi';
$p_key = 'kd_mutasi';

if(isset($_POST['act']) && !empty($_POST['act'])){
	if($_POST['act'] == 'lihat'){
		?>
		<table id="dataTable" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th style="width:1%;">No.</th>
					<th style="width:8%;">Kode Mutasi</th>
					<th style="width:10%;">NIK (Lama -> Baru)</th>
					<th style="width:10%;">Bagian (Lama -> Baru)</th>
					<th style="width:11%;">Jabatan (Lama -> Baru)</th>
					<th style="width:5%;">Tgl Mutasi</th>
					<!-- <th style="width:1%; text-align:center;">Opsi</th> -->
				</tr>
			</thead>
			<tbody id="tabelData">
				<?php
				$no = 0;
				$hasil = $crud->read($tbl, array('where'=>array('kd_karyawan'=>$_POST['id'])));
				$iconArrow = '<i class="fa fa-angle-double-right" aria-hidden="true" style="color:blue;"></i>';
				
				if (!empty($hasil)) {
					foreach($hasil as $row) {
						$no++;
						$bagian_lama = dapatKolom($path, array('kd_bagian'=>$row['bagian_lama']), 'tb_bagian', 'nm_bagian');
						$bagian_baru = dapatKolom($path, array('kd_bagian'=>$row['bagian_baru']), 'tb_bagian', 'nm_bagian');
						$jabatan_lama = dapatKolom($path, array('kd_jabatan'=>$row['jabatan_lama']), 'tb_jabatan', 'nm_jabatan');
						$jabatan_baru = dapatKolom($path, array('kd_jabatan'=>$row['jabatan_lama']), 'tb_jabatan', 'nm_jabatan');
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $row['kd_mutasi']; ?></td>
							<td><?php echo $row['nik_lama'].' '.$iconArrow.' '.$row['nik_baru']; ?></td>
							<td><?php echo $bagian_lama.' '.$iconArrow.' '.$bagian_baru; ?></td>
							<td><?php echo $jabatan_lama.' '.$iconArrow.' '.$jabatan_baru; ?></td>
							<td><?php echo $row['tgl_mutasi']; ?></td>
							<!-- <td align="center">
								<div class="btn-group">
									<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
										Opsi <span class="caret"></span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="?<?php echo $link; ?>&v=detail&id=<?php echo $row[$p_key]; ?>"><i class="fa fa-book"></i> Detail</a></li>
										<li><a href="javascript:void(0);" onclick="editForm('<?php echo $row[$p_key]; ?>')">
											<i class="fa fa-pencil"></i> Edit
										</a></li>
										<li class="divider"></li>
										<li><a href="javascript:void(0);" onclick="return confirm('Apakah anda yakin akan menghapus data?')?hapusData('hapus','<?php echo $row[$p_key]; ?>'):false;">
											<i class="fa fa-times"></i> Hapus
										</a></li>
									</ul>
								</div>
							</td> -->
						</tr>
						<?php
					}
				}
				?>
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
	} if ($_POST['act'] == 'dataKini') {
		$data['where'] = array('kd_karyawan' => $_POST['id']);
		$data['return_type'] = 'single';
		$detail = $crud->read('tb_karyawan', $data);
		$detail['spesifikasi'] = dapatKolom($path, array('kd_jabatan'=>$detail['kd_jabatan']), 'tb_jabatan', 'spesifikasi');
		if (!empty($detail['spesifikasi'])) {
			$detail['spesifikasi'] = $detail['spesifikasi'];
		} else {
			$detail['spesifikasi'] = '-';
		}
		echo json_encode($detail);
	}
	exit;
}

if(isset($_GET['act']) && !empty($_GET['act'])){
	if ($_GET['act'] == 'input') {
		// Dapatkan data karyawan lama untuk dimutasi
		$cDLama['where'] = array('kd_karyawan' => $_POST['txtKdKaryawan']);
		$cDLama['return_type'] = 'single';
		$dLama = $crud->read('tb_karyawan', $cDLama);
		if (!empty($dLama)) {
			// Input ke mutasi
			// Lihat apakah sudah ada data ditabel atau belum
			$jum = $crud->read($tbl, array('return_type' => 'count'));
			if ($jum > 0) {
				// Dapatkan kd_terakhir dulu
				$kdAkhir = $crud->read($tbl, array('order_by' => 'id DESC', 'return_type' => 'single'));
				if (!empty($kdAkhir)) {
					// String tahun yang digunakan untuk pembanding
					$thnAkhir = substr($kdAkhir[$p_key], -4);
				}

				// Jika tahun tidak sama maka increment akan kembali keawal, selain itu increment akan dijumlahkan
				if ($thnAkhir != date('Y')) {
					$kode = '001/HRD-CAT/SK/'.bulanRomawi(date('m')).'/'.date('Y');
				} else {
					$kondisi['select'] = $p_key.' as IDMax';
					$kondisi['order_by'] = 'id DESC';
					$kode = $crud->autoId($tbl, $kondisi, 3, '');
					$kode = $kode.'/HRD-CAT/SK/'.bulanRomawi(date('m')).'/'.date('Y');
				}
			} else {
				$kode = '001/HRD-CAT/SK/'.bulanRomawi(date('m')).'/'.date('Y');
			}
		
			$dataMutasi = array(
				'kd_mutasi' => $kode,
				'kd_karyawan' => $dLama['kd_karyawan'],
				'nik_lama' => $dLama['nik_karyawan'],
				'nik_baru' => $_POST['txtNik'],
				'bagian_lama' => $dLama['kd_bagian'],
				'jabatan_lama' => $dLama['kd_jabatan'],
				'bagian_baru' => $_POST['selBagian'],
				'jabatan_baru' => $_POST['selJabatan'],
				'tgl_mutasi' => date('d-m-Y')
			);
			$inputMutasi = $crud->create($tbl,$dataMutasi);
			
			// Jika berhasil input data ketabel mutasi, ubah nik, kd_bagian, kd_jabatan, jika gagal kembalikan alert error! 
			if ($inputMutasi) {
				$dataBaru = array(
					'nik_karyawan' => $_POST['txtNik'],
					'kd_jabatan' => $_POST['selJabatan'],
					'kd_bagian' => $_POST['selBagian']
				);
				$where = array('kd_karyawan' => $_POST['txtKdKaryawan']);
				$inputbaru = $crud->update('tb_karyawan', $dataBaru, $where);
				
				// Jika berhasil input data karyawan, maka data lama akan diupdate
				if ($inputbaru) {
					$err = '<div class="alert alert-success alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					  <strong>Berhasil!</strong> Aksi Mutasi Berhasil.
					</div>';
				} else {
					$err = '<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					  <strong>Error!</strong> Gagal ubah data karyawan, Kesalahan sistem!
					</div>';
				}
			} else {
				$err = '<div class="alert alert-danger alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				  <strong>Error!</strong> Gagal Input ketabel mutasi karyawan, Kesalahan sistem!
				</div>';
			}
		}
		
		echo $err;
	}
}