<?php
include_once '../../../../config/koneksi.php';
include_once '../../../../objects/class.crud.php';
include_once '../../../../config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);

$data = array(
	'kd_gaji' => $_POST['selGaji'],
	'kd_karyawan' => $_POST['txtIdKaryawan'],
	'frekuensi' => $_POST['selFrekuensi'],
	'jml_gaji' => $_POST['jml'],
	'keterangan' => $_POST['catat'],
	'tipe_gaji' => $_POST['selTipe'],
	'kd_bank' => $_POST['selBank'],
	'no_rekening' => $_POST['norek']
);
$where = array('id' => $_POST['txtId']);

switch($_POST['jml']) {
	case $_POST['jml'] < $_POST['txtGajiMin'] :
		echo '<script>alert("Jumlah gaji tidak boleh kurang dari Range Minimal");</script>';
	break;
	case $_POST['jml'] > $_POST['txtGajiMax'] :
		echo '<script>alert("Jumlah gaji tidak boleh lebih dari Range Maximal");</script>';
	break;
	
	default:
		$aksi = $crud->update('td_karyawan_gaji', $data, $where);
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