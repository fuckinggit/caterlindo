<?php
include_once '../../../../../config/koneksi.php';
include_once '../../../../../objects/class.crud.php';
include_once '../../../../../config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);
$tbl = 'tb_gaji';

$q = $_GET['q'];
$gaji = $crud->read($tbl, array('where' => array('kd_gaji' => $q), 'return_type' => 'single'));
if (!empty($gaji)) {
	?>
	Range Gaji:<span id="gajimin"><?php echo formatRupiah($gaji['min_gaji']); ?></span> sampai <span id="gajimax"><?php echo formatRupiah($gaji['max_gaji']); ?></span>
	<input type="hidden" value="<?php echo $gaji['min_gaji']; ?>" name="txtGajiMin">
	<input type="hidden" value="<?php echo $gaji['max_gaji']; ?>" name="txtGajiMax">
	<?php
}