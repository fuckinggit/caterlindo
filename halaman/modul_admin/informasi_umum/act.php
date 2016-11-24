<?php
$path = '../../../';
$link = 'p=master_gaji_data&idmenu=2&idsubmenu=11';
include_once $path.'config/koneksi.php';
include_once $path.'objects/class.crud.php';
include_once $path.'config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'tb_general_info';
$p_key = 'id';

if(isset($_POST['act']) && !empty($_POST['act'])){
	if ($_POST['act'] == 'edit') {
        $detail = $crud->read($tbl);
		$hasil['kode'] = array();
		$hasil['nilai'] = array();
		if (!empty($detail)) {
			foreach($detail as $det) {
				$hasil['kode'][] .= $det['id'];
				$hasil['nilai'][] .= $det['ket'];
			}
		}
        echo json_encode($hasil);
	}
	exit;
}

if(isset($_GET['act']) && !empty($_GET['act'])){
	if ($_GET['act'] == 'input') {
		$success = 0;
		$fail = 0;
		$jum = count($_POST['txtKd']);
		for($i=0;$i<$jum;$i++) {
			$data = array(
				'ket' => $_POST['txtNama'][$i]
			);
			$where = array($p_key => $_POST['txtKd'][$i]);

			$aksi = $crud->update($tbl, $data, $where);
			if ($aksi) {$success++;} else {$fail++;}
		}
		if ($fail == 0) {
			$err = '<div class="alert alert-success alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					  <strong>Berhasil!</strong> Aksi Edit Berhasil.
					</div>';
		} else {
			$err = '<div class="alert alert-danger alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					  <strong>Ada Error!</strong> Data berhasil diubah = '.$success.' Data gagal diubah = '.$fail.'!
					</div>';
		}
		
		echo $err;
	} if ($_GET['act'] == 'actEdit') {
		switch ($_POST['txtMinJml']) {
			case $_POST['txtMinJml'] > $_POST['txtMaxJml']:
				echo '<script>alert("Jumlah Minimal tidak boleh lebih dari jumlah maximal");</script>';
			break;
			case $_POST['txtMaxJml'] < $_POST['txtMinJml']:
				echo '<script>alert("Jumlah Maximal tidak boleh lebih dari jumlah minimal");</script>';
			break;
			
			default:
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
				echo $err;
			break;
		}
	}
}