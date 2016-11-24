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
		$setting->nm_setting = 'header_title';
		$setting->ambilSetting();
		?>
		<title><?php echo $setting->setting; ?></title>

		<!-- Bootstrap core CSS -->
		<link href="assets/css/bootstrap.css" rel="stylesheet">
		<!--external css-->
		<link href="assets/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
		<link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
		<link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    

		<!-- Custom styles for this template -->
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/style-responsive.css" rel="stylesheet">
		
		<!-- DataTables -->
		<link rel="stylesheet" href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" />
		
		<!-- DateRangePicker -->
		<link rel="stylesheet" href="vendors/bootstrap-daterangepicker/daterangepicker.css" />
		
		<!-- Select2 -->
		<link rel="stylesheet" href="vendors/select2/dist/css/select2.css" type="text/css" />
		
		<!-- Croppic -->
		<link href="assets/js/croppic/assets/css/croppic.css" rel="stylesheet" />
		
		<!-- jQueryUI -->
		<link href="assets/js/jQueryUI/jquery-ui.css" rel="stylesheet" />
		
		<!-- Full Calendar -->
		<link href="assets/js/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
		
		<script type="text/javascript" language="javascript" src="//cdn.datatables.net/responsive/1.0.0/js/dataTables.responsive.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/1.0.0/css/dataTables.responsive.css">
		
		<?php
		$setting->nm_setting = 'bg_img';
		$setting->ambilSetting();
		$dir = 'assets/img/'.$setting->setting;
		
		if (($setting->setting == '') or (!file_exists($dir))) {
			?>
			<style type="text/css">
				body {
					background: #f2f2f2;
					background-size: 100% 100%;
					background-attachment: fixed;
				}
				#profile-02 {
					background: url(../img/profile-02.jpg) no-repeat center top;
				}
			</style>
			<?php
		}
		else {
			$bg = $setting->setting;
			?>
			<style type="text/css">
				body {
					background-image: url("assets/img/<?php echo $bg; ?>");
					background-size: 100% 100%;
					background-attachment: fixed;
				}
				#profile-02 {
					background: url("assets/img/<?php echo $bg; ?>") no-repeat center top;
					background-size: 100% 100%;
				}
			</style>
			<?php
		}
		?>
		
		<!-- js placed at the end of the document so the pages load faster -->
		<!-- <script src="assets/js/jquery.js"></script> -->
		<script src="assets/js/jquery-2.1.3.min.js"></script>
		<script src="assets/js/jQueryUI/jquery-ui.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<!-- Croppic -->
		<script src="assets/js/croppic/croppic.min.js"></script>
		<script src="assets/js/fullcalendar/fullcalendar.min.js"></script>
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>