<?php
include_once 'koneksi.php';

function formatRupiah($angka) {
	$rp = 'Rp '.number_format($angka, 0, 0, '.').',-';
	
	return $rp;
}

function jekel($jekel) {
	if ($jekel == '0') {
		$jekel = 'Laki - Laki';
	} if ($jekel == '1') {
		$jekel = 'Perempuan';
	}
	
	return $jekel;
}

function statusNikah($status) {
	switch ($status) {
		case '0':
			$status = 'Belum Menikah';
		break;
		case '1':
			$status = 'Menikah';
		break;
		case '2':
			$status = 'Bercerai';
		break;
	}
	return $status;
}

function selHubTangunggan($nilai) {
	if ($nilai == '0') {
		$nilai = 'Anak';
	} if ($nilai == '1') {
		$nilai = 'Lainnya';
	}
	
	return $nilai;
}

function detFrekuensi($frek) {
	switch ($frek){
		case 0 : 
			$frek = "Perjam";
		break;
		case 1 : 
			$frek = "Harian";
		break;
		case 2 :
			$frek = "Mingguan";
		break;
		case 3 :
			$frek = "Bulanan";
		break;
	}
	return $frek;
}

function tipeGaji($gaji) {
	switch ($gaji){
		case 0 :
			$gaji = "Tunai";
		break;
		case 1 :
			$gaji = "Transfer";
		break;
	}
	return $gaji;
}

function statusGeneral($status) {
	switch ($status){
		case 0 :
			$status = "Non-Aktif";
		break;
		case 1 :
			$status = "Aktif";
		break;
	}
	return $status;
}

function namaGaji($deep, $gaji) {
	include_once $deep.'objects/class.crud.php';
	$database = new Database();
	$db = $database->getKoneksi();
	$crud = new Crud($db);
	
	$tbl = 'tm_gaji';
	$pKey = 'kd_gaji';
	$stmGaji['where'] = array($pKey => $gaji);
	$stmGaji['return_type'] = 'single';
	$qGaji = $crud->read($tbl, $stmGaji);
	if(!empty($qGaji)) {
		return $qGaji['nm_gaji'];
	} else {
		return false;
	}
}

function namaBagian($deep, $bagian) {
	include_once $deep.'objects/class.crud.php';
	$database = new Database();
	$db = $database->getKoneksi();
	$crud = new Crud($db);
	
	$tbl = 'tb_bagian';
	$pKey = 'kd_bagian';
	$stmBagian['where'] = array($pKey => $bagian);
	$stmBagian['return_type'] = 'single';
	$qBagian = $crud->read($tbl, $stmBagian);
	if(!empty($qBagian)) {
		return $qBagian['nm_bagian'];
	} else {
		return false;
	}
}

function namaJabatan($deep, $jabatan) {
	include_once $deep.'objects/class.crud.php';
	$database = new Database();
	$db = $database->getKoneksi();
	$crud = new Crud($db);
	
	$tbl = 'tb_jabatan';
	$pKey = 'kd_jabatan';
	$stmJabatan['where'] = array($pKey => $jabatan);
	$stmJabatan['return_type'] = 'single';
	$qJabatan = $crud->read($tbl, $stmJabatan);
	if(!empty($qJabatan)) {
		return $qJabatan['nm_jabatan'];
	} else {
		return false;
	}
}

function dapatKolom($deep, $vars = array(), $tbl, $nm_kolom) {
	include_once $deep.'objects/class.crud.php';
	$database = new Database();
	$db = $database->getKoneksi();
	$crud = new Crud($db);
	
	if(is_array($vars)) {
		$stmKolom['where'] = $vars;
		$stmKolom['return_type'] = 'single';
		$qKolom = $crud->read($tbl, $stmKolom);
		if(!empty($qKolom)) {
			return $qKolom[$nm_kolom];
		} else {
			return false;
		}
	}
}

function bulanRomawi($bulan) {
	switch($bulan){
		case $bulan == '01' :
			$bulan = 'I';
		break;
		case $bulan == '02' :
			$bulan = 'II';
		break;
		case $bulan == '03' :
			$bulan = 'III';
		break;
		case $bulan == '04' :
			$bulan = 'IV';
		break;
		case $bulan == '05' :
			$bulan = 'V';
		break;
		case $bulan == '06' :
			$bulan = 'VI';
		break;
		case $bulan == '07' :
			$bulan = 'VII';
		break;
		case $bulan == '08' :
			$bulan = 'VIII';
		break;
		case $bulan == '09' :
			$bulan = 'IX';
		break;
		case $bulan == '10' :
			$bulan = 'X';
		break;
		case $bulan == '11' :
			$bulan = 'XI';
		break;
		case $bulan == '12' :
			$bulan = 'XII';
		break;
	}
	
	return $bulan;
}