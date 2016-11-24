<?php
if (isset($_GET['p'])) {
	if (isset($_GET['v'])) {
		
		$v = $_GET['v'];
		
		if ($v == 'detail') {
			include_once 'detail/data.php';
		}
	} if (!isset($_GET['v'])) {
		$tbl = 'tb_karyawan';
		$var = 'EvaluasiKPI'; // Yang diganti
		$judul = 'Evaluasi KPI'; // Yang diganti
		$uri = 'halaman/modul_kpi/evaluasi/'; // Yang diganti
		?>

		<div class="content-panel">
			<div class="panel-heading">
				<h3><i class="fa fa-angle-right"></i> Data <small><?php echo $judul; ?></small></h3>
			</div>
		</div>

		<div class="clearfix"></div>

		<!-- DATA -->
		<div class="row" id="bacaData<?php echo $var; ?>">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="form-panel">
					<div class="x_title">
						<h2><?php echo $judul; ?></h2>
						<div id="idAlert<?php echo $var; ?>"></div>
					</div>
					<div class="x_content">
						<div id="idImgLoader" align="middle" style="display:none;">
							<img src='assets/img/ajax_loader_bar.gif' />
						</div>
						<div id="tabelData<?php echo $var; ?>"></div>
					</div>
				</div>
			</div>
			
		</div>

		<?php
		include_once 'scriptJs.php';
	}
}