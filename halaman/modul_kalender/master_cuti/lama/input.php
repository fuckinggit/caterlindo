<?php
include_once '../../../config/koneksi.php';
include_once '../../../objects/class.crud.php';
include_once '../../../config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'tm_cuti';
$p_key = 'kd_cuti';

$kode = $crud->buatID($tbl, array('select' => $p_key.' as IDMax', 'order_by' => $p_key.' DESC'), 'CTI');

$data = array(
	$p_key => $kode,
	'kd_bagian' => $_POST['selBagian'],
	'kd_jabatan' => $_POST['selJabatan'],
	'nm_cuti' => $_POST['txtNama'],
	'thn_periode' => $_POST['txtThnPeriode'],
	'lama_cuti' => $_POST['txtLamaCuti']
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