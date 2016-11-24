<?php
@session_start();
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
	echo '<option value="">-- Pilih Kota --</option>';
	if ($_POST['selProvinsi'] == 'WNA') {
		$_POST['selKota']=='WNA'?$sel='selected':$sel='';
		echo '<option value="WNA" '.$sel.'>WNA</option>';
	} else {
		$data = array('where' => array('fc_kdprop' => $_POST['selProvinsi']));
		
		$dataKota = $crud->read('tm_kota', $data);
		if(!empty($dataKota)){
			foreach($dataKota as $kota) {
				extract($kota);
				if ($_POST['selKota'] == $fc_kdkota) {$sel = 'selected';} else {$sel = '';}
				echo '<option value="' .$fc_kdkota. '" '.$sel.'>' .$fv_nmkota. '</option>';
			}
		}
	}
}