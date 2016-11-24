<?php
session_start();
include_once 'config/koneksi.php';
include_once 'config/setting.php';
include_once 'objects/tb_admin.php';

$database = new Database();
$db = $database->getKoneksi();

$setting = new Setting($db);
$admin = new Admin($db);

if (isset($_SESSION['kd_admin'])) {
	?>
	<script>
		window.location.assign("home.php");
	</script>
	<?php
} else {
	?>

	<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<?php
			$setting->nm_setting = 'favicon';
			$setting->ambilSetting();
			?>
			<link rel="shortcut icon" href='<?php echo "assets/img/" . $setting->setting . "";?>'>
			<meta name="description" content="">
			<meta name="author" content="Dashboard">
			<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
			
			<?php
			$setting->nm_setting = 'login_title';
			$setting->ambilSetting();
			?>
			<title><?php echo $setting->setting; ?></title>

			<!-- Bootstrap core CSS -->
			<link href="assets/css/bootstrap.css" rel="stylesheet">
			<!--external css-->
			<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

			<!-- Custom styles for this template -->
			<link href="assets/css/style.css" rel="stylesheet">
			<link href="assets/css/style-responsive.css" rel="stylesheet">

			<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
		</head>

		<body>
			<div id="login-page">
				<div class="container">
				
					<form method="POST" action="" enctype="multipart/form-data" class="form-login">
						<h2 class="form-login-heading">login administrator</h2>
						<div class="login-wrap">
							<input type="text" class="form-control" placeholder="Username" name="txtUsername" required="required" autofocus />
							<br />
							<input type="password" class="form-control" placeholder="Password" name="txtPassword" required="required" />
							<hr />
							<button type="submit" class="btn btn-theme btn-block" name="login"><i class="fa fa-lock"></i> Log in</button>
						</div>
					</form>
					
				</div>
			</div>
			
			<!-- js placed at the end of the document so the pages load faster -->
			<script src="assets/js/jquery.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>

			<!--BACKSTRETCH-->
			<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
			<script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
			<?php
			$setting->nm_setting = 'bg_img';
			$setting->ambilSetting();
	
			if ($setting->setting == '') {$bg = 'login-bg.jpg';}
			else {$bg = $setting->setting;}
			?>
			<script>
				$.backstretch("assets/img/<?php echo $bg; ?>", {speed: 500});
			</script>
		</body>
	</html>
	
	<?php
	if (isset($_POST['login'])) {		
		if ((empty($_POST['txtUsername'])) or (empty($_POST['txtPassword']))) {
			?>
			<script>
				alert('Maaf form login ada yang kosong');
				window.location.assign('index.php');
			</script>
			<?php
		} else {
			$admin->username = $_POST['txtUsername'];
			$admin->password = md5($_POST['txtPassword']);
			
			$stmt_adm = $admin->loginAdmin();
			
			$data_adm = $stmt_adm->fetch(PDO::FETCH_ASSOC);
			$num_adm = $stmt_adm->rowCount();
			
			if ($data_adm['status'] == '1') {
				if ($num_adm > 0) {
					$_SESSION['kd_admin'] = $data_adm['kd_admin'];
					$_SESSION['kd_karyawan'] = $data_adm['kd_karyawan'];
					$_SESSION['session_id'] = session_id();
					
					$admin->kd_admin = $data_adm['kd_admin'];
					$admin->session_id = session_id();
					
					$admin->updateSessionLogin();
					
					?>
					<script type="text/javascript">
						alert("Selamat datang <?php echo $data_adm['username']; ?>");
						window.location.assign("home.php");
					</script>
					<?php
				} else {
					?>
					<script>
						alert('Maaf data login tidak ada atau ID masih login!');
						window.location.assign('index.php');
					</script>
					<?php
				}
			} else {
				?>
				<script>
					alert('Maaf status login anda belum diaktifkan, hubungi admin!');
					window.location.assign('index.php');
				</script>
				<?php
			}
		}
	}
	
}