<?php
include_once '../../../../../config/koneksi.php';
include_once '../../../../../objects/class.crud.php';
include_once '../../../../../config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'td_karyawan_pengalaman_kerja';

$data = array(
	'nm_perusahaan' => $_POST['idperusahaan'],
	'nm_jabatan' => $_POST['jabatan'],
	'tgl_masuk' => $_POST['tglmasuk'],
	'tgl_keluar' => $_POST['tglkeluar'],
	'komentar' => $_POST['komentar']
);
$where = array('id' => $_POST['kode']);
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
