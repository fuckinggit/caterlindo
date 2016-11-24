<?php
include_once '../../../config/koneksi.php';
include_once '../../../objects/class.crud.php';
include_once '../../../config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 't_setup';
//multiple update
for($i=0;$i<5;$i++) {
$data = array(
	'fc_isi' => $_POST['fc_isi'][$i]	
);
$where = array(
	'fc_param' => $_POST['fc_param'][$i]
);

$aksi = $crud->update($tbl, $data, $where);
}

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

/* $nm_media = str_replace(' ', '-', $_FILES['fileAttach']['name']);
$asd = rand(0000,9999);
$foto = $asd.$nm_media;
$up_media = move_uploaded_file($_FILES["fileAttach"]["tmp_name"], "assets/img/general_affair/" . $foto);

switch ($up_media) {
	case !$up_media:
		$err = '<div class="alert alert-danger alert-dismissable">
				  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				  <strong>Error!</strong> Kesalahan pada proses upload foto.
				</div>';
	break;
	
	default:
		$data = array(
			'nm_general' => $_POST['txtNama'],
			'tipe' => $_POST['selTipe'],
			'tgl_mulai' => $_POST['txtTglMulai'],
			'tgl_akhir' => $_POST['txtTglAkhir'],
			'status' => $_POST['selStatus'],
			'attachment' => $foto,
			'kd_admin' => $_SESSION['kd_admin']
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
}
echo $err; */