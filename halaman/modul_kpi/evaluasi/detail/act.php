<?php
include_once '../../../../config/koneksi.php';
include_once '../../../../objects/class.crud.php';
include_once '../../../../config/oop.fungsi.php';
include_once '../../../../config/link.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'td_karyawan_kpi';

if(isset($_POST['act']) && !empty($_POST['act'])){
	if ($_POST['act'] == 'edit') {
		$data['where'] = array('kd_karyawan'=>$_POST['id']);
        $detail = $crud->read($tbl, $data);
		$hasil['nilai'] = array();
		if (!empty($detail)) {
			foreach($detail as $det) {
				$hasil['nilai'][] .= $det['nilai'];
			}
		}
        echo json_encode($hasil);
	} if ($_POST['act'] == 'hitungScore') {
		$rKpis = $crud->read('td_karyawan_kpi', array('where' => array('kd_karyawan' => $_POST['id'])));
		if (!empty($rKpis)) {
			foreach ($rKpis as $rKpi) {
				$tot[] = $rKpi['nilai'];
			}
		}
		(!empty($tot))?$tot=$tot:$tot=array('');
		$jml = count($tot);
		$hasil = array_sum($tot);
		echo $hasil;
	}
    exit;
}

if (isset($_GET['act']) && !empty($_GET['act'])) {
	if ($_GET['act'] == 'input') {
		$j_coms = count($_POST['txtDetailKPI']);
		$success = 0;
		$fail = 0;

		for ($i = 0; $i < $j_coms; $i++) {
			$c_cek['where'] = array('kd_kpi' => $_POST['txtDetailKPI'][$i], 'kd_karyawan' => $_POST['txtKdKaryawan']);
			$c_cek['return_type'] = 'count';
			$cek = $crud->read($tbl, $c_cek);
			if ($cek > 0) {
				$data = array(
					'kd_karyawan' => $_POST['txtKdKaryawan'],
					'nilai' => $_POST['selDetailKPI'][$i]
				);
				$where = array('kd_kpi' => $_POST['txtDetailKPI'][$i]);

				$aksi = $crud->update($tbl, $data, $where);
			} else {
				$data = array(
					'kd_kpi' => $_POST['txtDetailKPI'][$i],
					'kd_karyawan' => $_POST['txtKdKaryawan'],
					'nilai' => $_POST['selDetailKPI'][$i]
				);
				$aksi = $crud->create($tbl,$data);
			}
			if ($aksi) {
				$success++;
			} else {
				$fail++;
			}
		}

		$err = '<div class="alert alert-success alert-dismissable">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		  <strong>'.$success.' Evaluasi Berhasil ditambahkan!</strong> Data gagal dievaluasi = '.$fail.'.
		</div>';

		echo $err;
	}
}