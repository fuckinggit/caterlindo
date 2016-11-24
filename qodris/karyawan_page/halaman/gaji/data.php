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
			if($_GET['modul']=='gaji'){
				$hasil = $crud->read('td_karyawan_gaji a,tm_gaji b',array('where'=>array('kd_karyawan'=>$kode),'where_kolom'=>array('a.kd_gaji'=>'b.kd_gaji')));
				echo json_encode($hasil);		
			}
			if($_GET['modul']=='total'){
				$result = "SELECT SUM(jml_gaji) as total FROM td_karyawan_gaji WHERE kd_karyawan = $kode";	
				$stmt= $db->prepare($result);
				$stmt->execute();
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				
				echo json_encode($row['total']);		
				}
			}
		}
	
?>