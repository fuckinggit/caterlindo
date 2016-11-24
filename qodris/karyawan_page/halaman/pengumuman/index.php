<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json;charset=UTF-8");
include_once "../../../config/koneksi.php";
include_once "../../../objects/class.crud.php";
$database = new Database();
$db = $database->getKoneksi();
$crud = new Crud($db);
	$query = $crud->read('tb_admin',array('where'=>array('kd_admin'=>$_SESSION['kd_admin'])));
	foreach($query as $row){
		extract($row);
	$kode = $kd_karyawan;
	}
				$result = "SELECT * FROM tm_pengumuman order by id desc limit 1";	
				$stmt= $db->prepare($result);
				$stmt->execute();
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$judul = $row['judul'];
					$isi = $row['isi'];
					$tgl = $row['tgl_turun'];
				}	
?>
<div class="pull-left alert alert-success no-margin">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>
	<i class="ace-icon fa fa-bullhorn bigger-120 blue"></i>
	<?php echo 'Pengumuman: '.$isi.'. Sidoarjo,'.$tgl; ?>
</div>