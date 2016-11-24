<?php
include_once '../../../config/koneksi.php';
include_once '../../../objects/class.crud.php';
include_once '../../../config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);

if (isset($_POST['nik'])) {
	$q = $_POST['nik'];
	if(!empty($q)) {
		$nik = $crud->read('tb_karyawan', array('where' => array('nik_karyawan' => $q), 'return_type' => 'count'));
		if ($nik > 0) {
			echo '<font color="red"><b>Nik sudah dipakai!</b></font>';
		} else {
			echo '<font color="blue"><b>Nik bisa dipakai!</b></font>';
		}
	}
} else {
	echo '<font color="yellow"><b>Nik belum diisi!</b></font>';
}