<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json;charset=UTF-8");
include_once "../../../config/koneksi.php";
include_once "../../../objects/class.crud.php";
$database = new Database();
$db = $database->getKoneksi();
$crud = new Crud($db);
	$query = $crud->read('tb_admin',array('where'=>array('kd_admin'=>$_SESSION['kd_admin'])));
	foreach($query as $row){
		extract($row);
	$kode = $kd_karyawan;
	}
		if($_GET['act']=='lihat'){
			if($_GET['modul']=='profil'){
				$hasil = $crud->read('tb_karyawan',array('where'=>array('kd_karyawan'=>$kode)));
				echo json_encode($hasil);	
			}
			if($_GET['modul']=='pendidikan'){
				$hasil = $crud->read('td_karyawan_riwayat_pendidikan a,tb_pendidikan b',array('where'=>array('kd_karyawan'=>$kode),'where_kolom'=>array('a.kd_pendidikan'=>'b.kd_pendidikan')));
				echo json_encode($hasil);		
			}
			if($_GET['modul']=='pengalaman'){
				$hasil = $crud->read('td_karyawan_pengalaman_kerja',array('where'=>array('kd_karyawan'=>$kode)));
				echo json_encode($hasil);	
			}
			if($_GET['modul']=='keahlian'){
				$hasil = $crud->read('td_karyawan_keahlian a,tb_skill b',array('where'=>array('kd_karyawan'=>$kode),'where_kolom'=>array('a.kd_skill'=>'b.kd_skill')));
				echo json_encode($hasil);	
			}
			if($_GET['modul']=='bahasa'){
				$hasil = $crud->read('td_karyawan_bahasa a,tb_bahasa b',array('where'=>array('kd_karyawan'=>$kode),'where_kolom'=>array('a.kd_bahasa'=>'b.kd_bahasa')));
				echo json_encode($hasil);	
			}
			if($_GET['modul']=='darurat'){
				$hasil = $crud->read('td_karyawan_kontak_lain ',array('where'=>array('kd_karyawan'=>$kode)));
				echo json_encode($hasil);	
			}
			if($_GET['modul']=='tanggungan'){
				$hasil = $crud->read('td_karyawan_tanggungan ',array('where'=>array('kd_karyawan'=>$kode)));
				echo json_encode($hasil);	
			} 
		}
	
?>