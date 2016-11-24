<?php
try{
$dbsql = new PDO('mysql:host=localhost;dbname=db_caterlindo_hrm','root','');

//$dbsql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $exception){
	print "Koneksi sql Gagal :". $exception->getMessage()."<br />";
	die();
}

$acc = $_SERVER['DOCUMENT_ROOT']."/caterlindo/HITFPTA_dataAbsensi.mdb";
if(!file_exists($acc)){
 die("DB access tidak ditemukan!.");
}

$dbacc = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=".$acc."; Uid=; Pwd=ithITtECH;");

?>