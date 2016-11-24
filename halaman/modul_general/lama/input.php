<?php
// Tanggal mulai tidak boleh lebih dari tanggal akhir
// Tanggal akhir tidak boleh kurang dari tanggal mulai
// Tanggal reminder tidak boleh kurang dari tanggal mulai dan tanggal reminder tidak boleh lebih dari tanggal akhir.
include_once '../../config/koneksi.php';
include_once '../../objects/class.crud.php';
include_once '../../config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'tb_general_affair';

$kode = $crud->buatID($tbl, array('select' => 'MAX(id), MAX(kd_general) as IDMax'), 'GNA');
$url = strlen('assets/img/general_affair/');
$file = substr($_POST['txtAttachment'], $url);

switch ($_POST['txtTglMulai']) {
	case $_POST['txtTglMulai'] > $_POST['txtTglAkhir']:
		echo '<script>alert("Tanggal mulai terhitung tidak boleh lebih dari jatuh tempo");</script>';
	break;
	
	case $_POST['txtTglAkhir'] < $_POST['txtTglMulai']:
		echo '<script>alert("Tanggal jatuh tempo tidak boleh kurang dari tanggal mulai terhitung");</script>';
	break;
	
	switch ($_POST['selStatus']) {
		case $_POST['selStatus'] == '1':
			switch ($_POST['txtReminder']) {
				case $_POST['txtReminder'] < $_POST['txtTglMulai'] || $_POST['txtReminder'] > $_POST['txtTglAkhir']:
					echo '<script>alert(" Tanggal reminder tidak boleh kurang dari tanggal mulai dan tanggal reminder tidak boleh lebih dari tanggal akhir.");</script>';
				break;
			}
		break;
	}
	
	default:
		$data = array(
			'kd_general' => $kode,
			'nm_general' => $_POST['txtNama'],
			'tipe' => $_POST['selTipe'],
			'tgl_mulai' => $_POST['txtTglMulai'],
			'tgl_akhir' => $_POST['txtTglAkhir'],
			'status' => $_POST['selStatus'],
			'attachment' => $file,
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
		echo $err;
	break;
}