<?php
//@session_start();
//error_reporting(0);

include('koneksi.php');
include('../objects/class.crud.php');

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);

if(isset($_POST['id_provinsi'])) {
	echo '<option value="">-- Pilih Kota --</option>';

	$data = array('where' => array('kd_provinsi' => $_POST['id_provinsi']));

	$dataKota = $crud->read('tm_kota', $data);
	if(!empty($dataKota)){
		foreach($dataKota as $kota) {
			extract($kota);

			echo '<option value="' .$kd_kota. '">' .$nm_kota. '</option>';
		}
	}
}

if(isset($_POST['selProvinsi'])) {
	echo '<option value="">-- Kota --</option>';

	$data = array('where' => array('fc_kdprop' => $_POST['selProvinsi']));

	$dataKota = $crud->read('tm_kota', $data);
	if(!empty($dataKota)){
		foreach($dataKota as $kota) {
			extract($kota);

			echo '<option value="' .$fc_kdkota. '">' .$fv_nmkota. '</option>';
		}
	}
}

if(isset($_POST['kd_bagian'])) {
	echo '<option value="">-- Pilih Jabatan --</option>';

	$data = array('where' => array('kd_bagian' => $_POST['kd_bagian']));

	$dataBagian = $crud->read('tb_jabatan', $data);
	if(!empty($dataBagian)){
		foreach($dataBagian as $bagian) {
			extract($bagian);
			$_POST['kd_jabatan'] == $kd_jabatan?$sel = 'selected':$sel='';
			echo '<option value="' .$kd_jabatan. '" '. $sel .'>' .$nm_jabatan. '</option>';
		}
	}
}

if(isset($_POST['act']) && !empty($_POST['act'])) {
	$act = $_POST['act'];
	if ($act == 'dapatSpek') {
		$data = array('where' => array('kd_jabatan' => $_POST['kd_jabatan']), 'return_type' => 'single');
		$dataJabatan = $crud->read('tb_jabatan', $data);
		if(!empty($dataJabatan)){
			echo $dataJabatan['spesifikasi'];
		}
	} if ($act == 'pilihBagian') {
		if(isset($_POST['kd_unit']) && !empty($_POST['kd_unit'])) {
			echo '<option value="">-- Pilih Bagian --</option>';

			$data = array('where' => array('kd_unit' => $_POST['kd_unit']));

			$dataBagian = $crud->read('tb_bagian', $data);
			if(!empty($dataBagian)){
				foreach($dataBagian as $bagian) {
					extract($bagian);
					$_POST['kodeBag'] == $kd_bagian?$sel = 'selected':$sel='';
					echo '<option value="' .$kd_bagian. '" '. $sel .'>' .$nm_bagian. '</option>';
				}
			}
		}
	}
}