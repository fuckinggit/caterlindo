<?php
include_once '../../../config/koneksi.php';
include_once '../../../objects/class.crud.php';
include_once '../../../config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'tb_hari_kerja';
$var = 'HariKerja';
$j_coms = count($_POST['txtKdHari']);
$success = 0;
$fail = 0;

for ($i = 0; $i < $j_coms; $i++) {
	$data = array(
		'jm_kerja' => $_POST['selHari'][$i]
	);
	$where = array('id' => $_POST['txtKdHari'][$i]);

	$aksi = $crud->update($tbl, $data, $where);
		
	if ($aksi) {
		$success++;
	} else {
		$fail++;
	}
}

$err = '<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <strong>'.$success.' Data berhasil diubah!</strong> Data gagal diubah = '.$fail.'.
</div>';

echo $err;