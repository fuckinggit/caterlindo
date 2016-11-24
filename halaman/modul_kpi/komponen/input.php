<?php
// Nilai min tidak boleh lebih dari nilai max
// Nilai max tidak boleh kurang dari nilai min
include_once '../../../config/koneksi.php';
include_once '../../../objects/class.crud.php';
include_once '../../../config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'tb_kpi';

$kode = $crud->buatID($tbl, array('select' => 'MAX(id), MAX(kd_kpi) as IDMax'), 'KPI');

switch ($_POST['txtNilaiMin']) {
	case $_POST['txtNilaiMin'] > $_POST['txtNilaiMax']:
		echo '<script>alert("Nilai min tidak boleh lebih dari nilai max");</script>';
	break;
	
	case $_POST['txtNilaiMax'] < $_POST['txtNilaiMin']:
		echo '<script>alert("Nilai max tidak boleh kurang dari nilai min");</script>';
	break;
	
	default:
		$data = array(
			'kd_kpi' => $kode,
			'nm_komponen' => $_POST['txtNama'],
			'nilai_min' => $_POST['txtNilaiMin'],
			'nilai_max' => $_POST['txtNilaiMax']
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