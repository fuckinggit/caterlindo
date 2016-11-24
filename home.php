<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
// error_reporting(0);

if (isset($_SESSION['kd_admin']) or isset($_SESSION['session_id'])) {
	include_once 'config/koneksi.php';
	include_once 'config/link.php';
	include_once 'config/encryption/function.php';
	include_once 'config/fungsi_admin.php';
	include_once 'config/setting.php';
	include_once 'config/oop.fungsi.php';
	include_once 'objects/class.crud.php';
	include_once 'objects/tb_admin.php';
	include_once 'config/format.php';
	include_once 'config/timezone_helper.php';
	include_once 'config/PHPExcel.php';
    
	$database = new Database();
	$db = $database->getKoneksi();
	
	$crud = new Crud($db);
	$setting = new Setting($db);
	$admin = new Admin($db);
	$format = new Format($db);
	
	$admin->kd_admin = $_SESSION['kd_admin'];
	$admin->session_id = $_SESSION['session_id'];
	
	$stmt_adm = $admin->cekSession();
	$num_adm = $stmt_adm->rowCount();
	
	if ($num_adm > 0) {
	
		$setting->delUnusedImg();
		
		$r_ga = $crud->read('tb_general_affair');
		if (!empty($r_ga)) {
			foreach($r_ga as $d_ga) {
				// value 0,1,2
				$setting->id_setting = $d_ga['kd_general'];
				if (strtotime(date('d-m-Y')) < strtotime($d_ga['tgl_mulai'])) {
					$setting->nm_setting = '0';
				} else {
					if (strtotime(date('d-m-Y')) >= strtotime($d_ga['tgl_reminder'])) {
						$setting->nm_setting = '1';
					} else {
						if (strtotime(date('d-m-Y')) > strtotime($d_ga['tgl_akhir'])) {
							$setting->nm_setting = '2';
						}
					}
				}
				//echo strtotime(date('d-m-Y')).' >= '.strtotime($d_ga['tgl_reminder']).'<br />';
				//echo $setting->nm_setting.'<br />';
				$setting->setReminder();
			}
		}
		
		include_once 'templates/head.php';
		include_once 'templates/top_nav.php';
		include_once 'templates/sidebar_menu.php';
		?>
		<!--main content start-->
		<section id="main-content">
			<section class="wrapper site-min-height">
				<?php
				include_once 'templates/isi.php';
				?>
			</section>
		</section>
		<!-- /page content -->
		<?php
		include_once 'templates/footer.php';
		include_once 'templates/footer_js.php';
	} if ($num_adm < 1) {
		?>
		<script>
			alert('ID anda login dari komputer lain!');
			window.location.assign('index.php');
		</script>
		<?php
		
		unset($_SESSION['kd_admin']);
		unset($_SESSION['session_id']);
	}
} else {
	?>
	<script>
		alert('Maaf Anda harus login dahulu!');
		window.location.assign('index.php');
	</script>
	<?php
}