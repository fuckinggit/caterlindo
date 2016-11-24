<?php
// Ditambahi sak uwong gak oleh due gaji yg sama lebih dari satu
include_once '../../../../../config/koneksi.php';
include_once '../../../../../objects/class.crud.php';
include_once '../../../../../config/oop.fungsi.php';
$var = 'Bahasa';
$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'td_karyawan_bahasa';

$data = array(
	'kd_bahasa' => $_POST['bahasa'],
	'kd_karyawan' => $_POST['kd_karyawan'],
	'keterangan' => $_POST['keahlian'],
	'kefasihan' => $_POST['kefasihan'],
	'komentar' => $_POST['catatan']
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
