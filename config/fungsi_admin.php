<?php
function tipeAdmin($tipe) {
	if ($tipe == '0') {
		$tipe = 'Admin';
	} if ($tipe == '1') {
		$tipe = 'Karyawan';
	}
	
	return $tipe;
}

function statusAdmin($status) {
	if ($status == '0') {
		$status = 'Tidak Aktif';
	} if ($status == '1') {
		$status = 'Aktif';
	}
	
	return $status;
}