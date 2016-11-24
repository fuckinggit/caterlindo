<?php
// Tanggal mulai tidak boleh lebih dari tanggal akhir
// Tanggal akhir tidak boleh kurang dari tanggal mulai
// Tanggal reminder tidak boleh kurang dari tanggal mulai dan tanggal reminder tidak boleh lebih dari tanggal akhir.
include_once '../../../config/koneksi.php';
include_once '../../../objects/class.crud.php';
include_once '../../../config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'tm_kota';
$query = $crud->read('tm_kota',array('order_by'=>'fc_id ASC'));
foreach($query as $row){
$id = $row['fc_id'];
}
$kode = $id + 1;
$data = array(
	'fc_kdprop' => $_POST['kode'],
	'fc_kdkota' => $kode,
	'fv_nmkota' => $_POST['nmkota']
);
$aksi = $crud->create($tbl,$data);

if ($aksi) {
	$err = '<div class="alert alert-success alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	  <strong>Berhasil!</strong> Aksi Input Berhasil.
	</div>';
} else {
	$err = '<div class="alert alert-danger alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	  <strong>Error!</strong> Gagal Input, Kesalahan sistem!
	</div>';
}
echo $err;