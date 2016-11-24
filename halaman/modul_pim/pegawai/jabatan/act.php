<?php
$path = '../../../../';
include_once $path.'config/koneksi.php';
include_once $path.'objects/class.crud.php';
include_once $path.'config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'tb_karyawan';
$p_key = 'kd_karyawan';

if(isset($_POST['act']) && !empty($_POST['act'])){
	if ($_POST['act'] == 'edit') {
		$data['where'] = array($p_key => $_POST['id']);
		$data['return_type'] = 'single';
		$detail = $crud->read($tbl, $data);
		echo json_encode($detail);
	}
	exit;
}
if(isset($_GET['act']) && !empty($_GET['act'])){
	if ($_GET['act'] == 'input') {
		$data = array(
			'nik_karyawan' => $_POST['txtNik'],
            'kd_unit' => $_POST['selSubUnit'],
			'kd_bagian' => $_POST['selBagian'],
            'kd_jabatan' => $_POST['selJabatan'],
			'kd_status_kerja' => $_POST['selStatus'],
            'kd_kat_pekerjaan' => $_POST['selKatKerja'],
            'tgl_masuk' => $_POST['txtTglMasuk'],
            'kd_lokasi_perusahaan' => $_POST['selLokasi'],
            'tgl_mulai_kontrak' => $_POST['txtKontrakMulai'],
            'tgl_habis_kontrak' => $_POST['txtKontrakHabis'],
            'det_kontrak' => $_POST['txtDetail']
		);
		$where = array($p_key => $_GET['id']);

		$aksi = $crud->update($tbl, $data, $where);

		if ($aksi) {
			$err = '<div class="alert alert-success alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			  <strong>Berhasil!</strong> Aksi Edit Berhasil.
			</div>';
		} else {
			$err = '<div class="alert alert-danger alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			  <strong>Error!</strong> Gagal Input, Kesalahan sistem!
			</div>';
		}
		echo $err;
	}
}