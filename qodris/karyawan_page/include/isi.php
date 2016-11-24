<?php 
$page = $_GET['p'];
$menu = $_GET['idmenu'];
$submenu = $_GET['idsubmenu'];

	switch($page){
		case('dashboard'):
		include "halaman/profil/index.php";
		break;	
		case('kpi'):
		include "halaman/kpi/index.php";
		break;
		case('gaji'):
		include "halaman/gaji/index.php";
		break;
		case('mutasi'):
		include "halaman/mutasi/index.php";
		break;
		case('logout'):
		include "logout.php";
		break;
		default:
		include "halaman/profil/index.php";
		break;
	}
?>