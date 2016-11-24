<?php
@session_start();
//error_reporting(0);

include('koneksi.php');
include('../objects/class.crud.php');

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);

if(isset($_POST['idNegara'])) {
	if($_POST['idNegara']<>'WNA'){
		echo '<option value="">-- Pilih Provinsi --</option>';
		$dataProp = $crud->read('tm_prop');
		if(!empty($dataProp)){
			foreach($dataProp as $propinsi) {
				extract($propinsi);

				echo '<option value="' .$fc_kdprop. '">' .$fv_nmprop. '</option>';
			}
		}
	}else{
	echo '<option value="">-- Tidak ada data --</option>';
	}
}

if(isset($_POST['selNegara'])) {
	echo '<option value="">-- Pilih Provinsi --</option>';
	if ($_POST['selNegara'] == 'WNI') {
		$dataProp = $crud->read('tm_prop');
		if(!empty($dataProp)){
			foreach($dataProp as $propinsi) {
				extract($propinsi);
				$_POST['selProvinsi']==$fc_kdprop?$sel='selected':$sel='';
				echo '<option value="' .$fc_kdprop. '" '.$sel.'>' .$fv_nmprop. '</option>';
			}
		}
	} else {
		if ($_POST['selNegara'] == 'WNA') {
			$_POST['selProvinsi']=='WNA'?$sel='selected':$sel='';
			echo '<option value="WNA" '.$sel.'>WNA</option>';
		}
	}
}