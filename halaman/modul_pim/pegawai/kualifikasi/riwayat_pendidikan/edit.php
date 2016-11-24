<?php
include_once '../../../../../config/koneksi.php';
include_once '../../../../../objects/class.crud.php';
include_once '../../../../../config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'td_karyawan_riwayat_pendidikan';

$data = array(
	'kd_pendidikan' => $_POST['pendidikan'],
	'nm_institusi' => $_POST['institusi'],
	'program_studi' => $_POST['prodi'],
	'lama_studi' => $_POST['lamastudi'],
	'gpa' => $_POST['ipk'],
	'thn_mulai'=> $_POST['thnmasuk'],
	'thn_akhir'=> $_POST['thnlulus']
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
