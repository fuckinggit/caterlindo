<?php
if (isset($_GET['p'])) {
	$p = $_GET['p'];
	
	// Menu Modul Admin->Manajemen User
	if ($p == 'admin_data') {$isi = 'admin_data'; include 'halaman/modul_admin/admin/' . $isi . '.php';}
	
	// Menu Modul Admin->Jabatan
	if ($p == 'unit_data' || $p == 'bagian_data' || $p == 'jabatan_data' || $p == 'gaji_data' || $p == 'status_data' || $p == 'kategori_data' || $p == 'shift_data') {
		if ($p == 'unit_data') {$isi = 'data'; include 'halaman/modul_admin/unit/' . $isi . '.php';}
		if ($p == 'bagian_data') {$isi = 'data'; include 'halaman/modul_admin/bagian/' . $isi . '.php';}
		if ($p == 'jabatan_data') {$isi = 'data'; include 'halaman/modul_admin/jabatan/' . $isi . '.php';}
		if ($p == 'status_data'){$isi = 'data'; include 'halaman/modul_admin/status_kerja/' . $isi . '.php';}
		if ($p == 'kategori_data'){$isi = 'data'; include 'halaman/modul_admin/kategori_pekerjaan/'. $isi .'.php';}
		if ($p == 'shift_data'){$isi = 'shift_data'; include 'halaman/modul_admin/kategori_pekerjaan/'. $isi .'.php';}
	}
	
	// Menu Modul Admin->Manajamen Gaji
	if ($p == 'master_gaji_data') {
		if ($p == 'master_gaji_data') {$isi = 'data'; include 'halaman/modul_admin/gaji/master/' . $isi . '.php';}
	}
	
	// Menu Modul Admin->Perusahaan
	if ($p == 'informasi_data' || $p == 'lokasi_data' || $p == 'struktur_data') {
		if ($p == 'informasi_data') {$isi = 'data'; include 'halaman/modul_admin/informasi_umum/'. $isi .'.php';}
		if ($p == 'lokasi_data') {$isi = 'data'; include 'halaman/modul_admin/lokasi/'. $isi .'.php';}
	}
	
	// Menu Modul Admin->Kualifikasi
	if ($p == 'keahlian_data' || $p == 'pendidikan_data' || $p == 'sertifikat_data' || $p == 'bahasa_data' || $p == 'membership_data') {
		if ($p == 'keahlian_data') {$isi = 'data'; include 'halaman/modul_admin/keahlian/'. $isi .'.php';}
		if ($p == 'pendidikan_data') {$isi = 'data'; include 'halaman/modul_admin/pendidikan/'. $isi .'.php';}
		if ($p == 'sertifikat_data') {$isi = 'data'; include 'halaman/modul_admin/sertifikat/'. $isi .'.php';}
		if ($p == 'bahasa_data') {$isi = 'data'; include 'halaman/modul_admin/bahasa/'. $isi .'.php';}
		if ($p == 'membership_data') {$isi = 'data'; include 'halaman/modul_admin/membership/'. $isi .'.php';}
	}
	
	// Menu Modul Admin->Kewarganegaraan
	if ($p == 'kewarganegaraan_data') {$isi = 'data'; include 'halaman/modul_admin/kewarganegaraan/' . $isi . '.php';}
	
	//Menu Modul Admin->Tipe General Affair 
	if ($p == 'tipe_general_data') {$isi = 'data'; include 'halaman/modul_admin/tipe_generalaffair/' . $isi . '.php';}
	
	//Menu Modul Admin->Setting Hari kerja 
	if ($p == 'setting_hari_data') {$isi = 'set_hari_data'; include 'halaman/modul_admin/setting_hari/' . $isi . '.php';}
	
	// Menu Modul Admin->Setting
	/* if ($p == 'keahlian_data' || $p == 'pendidikan_data' || $p == 'sertifikat_data' || $p == 'bahasa_data' || $p == 'membership_data') {
		if ($p == 'keahlian_data') {$isi = 'keahlian_data'; include 'halaman/modul_admin/keahlian/'. $isi .'.php';}
		if ($p == 'pendidikan_data') {$isi = 'pendidikan_data'; include 'halaman/modul_admin/pendidikan/'. $isi .'.php';}
		if ($p == 'sertifikat_data') {$isi = 'sertifikat_data'; include 'halaman/modul_admin/sertifikat/'. $isi .'.php';}
		if ($p == 'bahasa_data') {$isi = 'bahasa_data'; include 'halaman/modul_admin/bahasa/'. $isi .'.php';}
		if ($p == 'membership_data') {$isi = 'membership_data'; include 'halaman/modul_admin/membership/'. $isi .'.php';}
	} */
	
	// Menu Modul PIM->Data Pegawai
	if ($p == 'pegawai_data') {
		if ($p == 'pegawai_data') {$isi = 'data'; include 'halaman/modul_pim/pegawai/'. $isi .'.php';}
	}
	
	// Menu Modul Kalender
	if ($p == 'master_cuti_data' || $p == 'laporan_cuti_data' || $p == 'hari_kerja_data' || $p == 'hari_libur_data') {
		if ($p == 'master_cuti_data') {$isi = 'data'; include 'halaman/modul_kalender/master_cuti/'. $isi .'.php';}
		if ($p == 'laporan_cuti_data') {$isi = 'data'; include 'halaman/modul_kalender/laporan_cuti/'. $isi .'.php';}
		if ($p == 'hari_kerja_data') {$isi = 'data'; include 'halaman/modul_kalender/hari_kerja/'. $isi .'.php';}
		if ($p == 'hari_libur_data') {$isi = 'data'; include 'halaman/modul_kalender/hari_libur/'. $isi .'.php';}
	}
	
	// Menu Modul KPI
	if ($p == 'komponen_data' || $p == 'evaluasi_data') {
		if ($p == 'komponen_data') {$isi = 'data'; include 'halaman/modul_kpi/komponen/'. $isi .'.php';}
		if ($p == 'evaluasi_data') {$isi = 'data'; include 'halaman/modul_kpi/evaluasi/'. $isi .'.php';}
	}
	
	// Profil
	if ($p == 'profil_data') {
		include 'halaman/profil/' . $p . '.php';
	}
	
	// Contoh
	if ($p == 'contoh') {
		if ($p == 'contoh') {$isi = 'data'; include 'halaman/modul_contoh/contoh_crud/'. $isi .'.php';}
	}
	
	// General Affair
	if ($p == 'general_data') {
		if ($p == 'general_data') {$isi = 'data'; include 'halaman/modul_general/'. $isi .'.php';}
	}
	
	// Modul Manajamen Karyawan
	if ($p == 'absensi' || $p == 'schedule' || $p == 'contoh') {
		if ($p == 'absensi') {$isi = 'data'; include 'halaman/modul_manajemen/absensi/'. $isi .'.php';}
		if ($p == 'schedule') {$isi = 'data'; include 'halaman/modul_manajemen/schedule/'. $isi .'.php';}
	}
	
	// Dashboard, Setting, Logout
	if ($p == 'dashboard' or $p == 'logout' or $p == 'setting') {
		include 'halaman/' . $p . '.php';
	}
} else {
	include 'halaman/dashboard.php';	
}