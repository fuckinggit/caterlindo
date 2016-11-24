<?php
include_once '../../../config/koneksi.php';

$database = new Database();
$db = $database->getKoneksi();

if($_GET['type'] == 'tb_karyawan'){
	$result = "SELECT
				kd_karyawan, nm_karyawan
			FROM
				$_GET[type]
			WHERE
				nm_karyawan LIKE :nm_karyawan
			AND kd_karyawan NOT IN (SELECT kd_karyawan FROM tb_admin)";
	
	$stmt= $db->prepare($result);
	$stmt->execute(array(':nm_karyawan' => '%'.$_GET['name_startsWith'].'%'));
	
	$data = array();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$name = $row['nm_karyawan'].'|'.$row['kd_karyawan'];
		array_push($data, $name);	
	}	
	echo json_encode($data);
}