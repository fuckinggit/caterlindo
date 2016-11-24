<?php
include_once '../../../config/koneksi.php';
include_once '../../../objects/class.crud.php';
include_once '../../../config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'tb_hari_kerja';

if(isset($_POST['act']) && !empty($_POST['act'])){
	if ($_POST['act'] == 'edit') {
        $detail = $crud->read($tbl);
		$hasil['jm_kerja'] = array();
		if (!empty($detail)) {
			foreach($detail as $det) {
				$hasil['jm_kerja'][] .= $det['jm_kerja'];
			}
		}
        echo json_encode($hasil);
	}
    exit;
}