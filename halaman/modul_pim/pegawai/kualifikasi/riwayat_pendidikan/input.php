<?php
// Ditambahi sak uwong gak oleh due gaji yg sama lebih dari satu
include_once '../../../../../config/koneksi.php';
include_once '../../../../../objects/class.crud.php';
include_once '../../../../../config/oop.fungsi.php';
$var = 'RiwayatPendidikan';
$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'td_karyawan_riwayat_pendidikan';

$data = array(
	'kd_pendidikan' => $_POST['pendidikan'],
	'kd_karyawan' => $_POST['kd_karyawan'],
	'nm_institusi' => $_POST['institusi'],
	'program_studi' => $_POST['prodi'],
	'lama_studi' => $_POST['lamastudi'],
	'gpa' => $_POST['ipk'],
	'thn_mulai'=> $_POST['thnmasuk'],
	'thn_akhir'=> $_POST['thnlulus']
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
