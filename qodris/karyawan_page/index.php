<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');
//error_reporting(0);

if (isset($_SESSION['kd_admin']) or isset($_SESSION['session_id'])) {
	include_once '../config/koneksi.php';
	include_once '../config/link.php';
	include_once '../config/encryption/function.php';
	include_once '../config/fungsi_admin.php';
	include_once '../config/setting.php';
	include_once '../config/oop.fungsi.php';
	include_once '../objects/class.crud.php';
	include_once '../objects/tb_admin.php';

	$database = new Database();
	$db = $database->getKoneksi();
	
	$crud = new Crud($db);
	$setting = new Setting($db);
	$admin = new Admin($db);
	
	$admin->kd_admin = $_SESSION['kd_admin'];
	$admin->session_id = $_SESSION['session_id'];
	
	$stmt_adm = $admin->cekSession();
	$num_adm = $stmt_adm->rowCount();
	
	if ($num_adm > 0) {
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>PT.CATERLINDO</title>

		<meta name="description" content="3 styles with inline editable feature" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/css/font-awesome.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.css" />
		<link rel="stylesheet" href="assets/css/jquery.gritter.css" />
		<link rel="stylesheet" href="assets/css/select2.css" />
		<link rel="stylesheet" href="assets/css/datepicker.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-editable.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<!--navbar content-->
		<?php include_once "include/navbar.php"; ?>
		<!--end of navbar-->
		<!--side bar content-->
		<?php include_once "include/sidebar.php"; ?>
		<!--end of sidebar-->
		<?php include_once "dashboard.php"; ?>
		<!--Main content-->
		<!--footer-->
		<?php
		include_once "include/footer.php";
		?>
 
		
		
		</div><!-- /.main-container -->
		<!--js script-->
		
		<?php include_once "scriptJs.php"; ?>

	</body>
</html>
<?php
} if ($num_adm < 1) {
		?>
		<script>
			alert('ID anda login dari komputer lain!');
			window.location.assign('../index.php');
		</script>
		<?php
		
		unset($_SESSION['kd_admin']);
		unset($_SESSION['session_id']);
	}
} else {
	?>
	<script>
		alert('Maaf Anda harus login dahulu!');
		window.location.assign('../index.php');
	</script>
	<?php
}
?>