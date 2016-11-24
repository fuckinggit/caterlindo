<?php
@session_start();
//error_reporting(0);

include('koneksi.php');
include('../objects/class.crud.php');

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);

if(isset($_POST['txtKdBagian'])) {
	$tbl = 'tb_karyawan';
	$p_key = 'kd_karyawan';
	
	if (isset($_POST['act'])) {
		if ($_POST['act'] == 'ubahBagian') {
			$where['where'] = array($p_key => $_POST['kdKaryawan']);
			$where['return_type'] = 'single';
			$kodeLama = $crud->read($tbl, $where);
			
			if (!empty($kodeLama)) {
				$thn = substr($kodeLama['nik_karyawan'], 3, 2);
				$kd = substr($kodeLama['nik_karyawan'], 6, 3);
				
				$nik = $_POST['txtKdBagian'].'.'.$thn.'.'.$kd;
			}
		} if ($_POST['act'] == 'ubahNik') {
			$where['where'] = array($p_key => $_POST['kdKaryawan']);
			$where['return_type'] = 'single';
			$kodeLama = $crud->read($tbl, $where);
			
			if (!empty($kodeLama)) {
				$thn = substr($kodeLama['nik_karyawan'], 3, 2);
				$kd = substr($kodeLama['nik_karyawan'], 6, 3);
				
				$nik = $_POST['txtKdBagian'].'.'.$thn.'.'.$kd;
			}
		}
	} else {
		$kondisi['select'] = $p_key.' as IDMax';
		$kondisi['order_by'] = 'id DESC';
		$kode = $crud->autoId($tbl, $kondisi, 3, '');
			
		$kd_bagian = $_POST['txtKdBagian'];
		$tahun = date('y');
		$nik = $kd_bagian.'.'.$tahun.'.'.$kode;
	}
	
	echo $nik;
}