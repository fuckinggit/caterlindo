<?php
include_once '../../../../config/koneksi.php';
include_once '../../../../objects/class.crud.php';
include_once '../../../../config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);

if (isset($_POST['kd_gaji'])) {
	$q = $_POST['kd_gaji'];
	if(!empty($q)) {
		$gaji = $crud->read('tm_gaji', array('where' => array('kd_gaji' => $q), 'return_type' => 'single'));
		if (!empty($gaji)) {
			$gajiMin = $gaji['min_gaji'];
			$gajiMax = $gaji['max_gaji'];
			
			switch($_POST['gaji']) {
				case $_POST['gaji'] < $gajiMin:
					echo '<font color="red"><b>Gaji tidak boleh kurang dari gaji minimal!</b></font> Min = '.formatRupiah($gajiMin).' Max = '.formatRupiah($gajiMax).'';
				break;
				case $_POST['gaji'] > $gajiMax:
					echo '<font color="red"><b>Gaji tidak boleh lebih dari gaji maximal!</b></font> Min = '.formatRupiah($gajiMin).' Max = '.formatRupiah($gajiMax).'';
				break;
				
				default:
					echo '<font color="blue"><b>Gaji bisa dipakai!</b></font>';
				break;
			}
		}
	}
}