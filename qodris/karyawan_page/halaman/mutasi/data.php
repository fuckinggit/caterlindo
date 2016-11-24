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
			if($_GET['modul']=='mutasi'){
				$hasil = $crud->read('td_karyawan_mutasi a,tb_bagian b,tb_jabatan c',array('where_kolom'=>array('a.kd_bagian'=>'b.kd_bagian','a.kd_jabatan'=>'c.kd_jabatan'),'where'=>array('kd_karyawan'=>$kode),));
				echo json_encode($hasil);		
			}
			if($_GET['modul']=='status'){
				$status = $crud->read('td_karyawan_mutasi a,tb_bagian b,tb_jabatan c',array('where_kolom'=>array('a.kd_bagian'=>'b.kd_bagian','a.kd_jabatan'=>'c.kd_jabatan'),'where'=>array('kd_karyawan'=>$kode),'order_by'=> 'a.id DESC','return_type'=>'single'));
				echo json_encode($status);		
			}
		}
	
?>