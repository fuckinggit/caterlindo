<?php
include_once '../../config/koneksi.php';
include_once '../../objects/class.crud.php';
include_once '../../config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'tb_general_affair';

$url = strlen('assets/img/general_affair/');
$file = substr($_POST['txtAttachment'], $url);

switch ($_POST['txtTglMulai']) {
	case $_POST['txtTglMulai'] > $_POST['txtTglAkhir']:
		echo '<script>alert("Tanggal mulai terhitung tidak boleh lebih dari jatuh tempo");</script>';
	break;
	
	case $_POST['txtTglAkhir'] < $_POST['txtTglMulai']:
		echo '<script>alert("Tanggal jatuh tempo tidak boleh kurang dari tanggal mulai terhitung");</script>';
	break;
	
	case $_POST['txtReminder'] < $_POST['txtTglMulai'] || $_POST['txtReminder'] > $_POST['txtTglAkhir']:
		echo '<script>alert(" Tanggal reminder tidak boleh kurang dari tanggal mulai dan tanggal reminder tidak boleh lebih dari tanggal akhir.");</script>';
	break;
	
	default:
		$data = array(
			'nm_general' => $_POST['txtNama'],
			'tipe' => $_POST['selTipe'],
			'tgl_mulai' => $_POST['txtTglMulai'],
			'tgl_akhir' => $_POST['txtTglAkhir'],
			'status' => $_POST['selStatus'],
			'kd_admin' => $_POST['txtKdAdmin'],
			'attachment' => $file,
			'tgl_reminder' => $_POST['txtReminder']
		);
		$where = array('kd_general' => $_POST['txtIdGeneral']);

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