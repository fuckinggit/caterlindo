<?php
//$_SESSION['err'] = '';
/* $link_utama = '?p='.$_GET['p'].'&v='.$_GET['v'].'&id='.$_GET['id'].'';
if (!isset($_GET['menu'])) {$link = '?p='.$_GET['p'].'&v='.$_GET['v'].'&id='.$_GET['id'].'';}
if (isset($_GET['menu'])) {$link = '?p='.$_GET['p'].'&v='.$_GET['v'].'&id='.$_GET['id'].'&menu='.$_GET['menu'].'';} */

$detail = $crud->read('tb_karyawan', array('where' => array('kd_karyawan' => $_GET['id']), 'return_type'=>'single'));
if(!empty($detail)){
	?>
	<div class="content-panel">
		<div class="panel-heading">
			<div class="pull-right">
				<a href="?<?php echo $link; ?>" name="btnClose" id="btnClose" class="btn btn-primary">Close</a>
			</div>
			<h3><i class="fa fa-angle-right"></i> Data <?php echo $judul; ?> <small>Detail <?php echo $judul; ?></small></h3>
		</div>
	</div>

	<div class="clearfix"></div>

	<div class="row">
		<!-- samping kiri -->
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="form-panel">
				<div class="row">									
					<div class="col-lg-3 col-md-3 col-sm-3 mb">
						<!-- gambar atas -->
						<a href="#tak_klik_form_edit foto">
							<div style="margin-bottom:5px;" class="content-panel pn">
								<div id="profile-02">
									<div class="user">
										<?php
										($detail['pas_foto'] == '' or empty($detail['pas_foto']))?$foto = 'assets/img/no-user-image.png':$foto = 'assets/img/karyawan/'.$detail['pas_foto'];
										?>
										<img src="<?php echo $foto; ?>" class="img-circle" width="150">
										<h4><?php echo $detail['nm_karyawan']; ?></h4>
									</div>
								</div>
							</div>
						</a>
						
						<!-- list bawah -->
						<div class="steps">
							<a href="?<?php echo $link.'&v='.$_GET['v'].'&id='.$_GET['id'].'&menu=data_pribadi'; ?>">
								<label for='op1' <?php if (!isset($_GET['menu']) || (isset($_GET['menu']) && $_GET['menu'] == 'data_pribadi')) {echo 'class="active"';} ?>>Data Pribadi</label>
							</a>
							<a href="?<?php echo $link.'&v='.$_GET['v'].'&id='.$_GET['id'].'&menu=kontak_pribadi'; ?>">
								<label for='op2' <?php if ($_GET['menu'] == 'kontak_pribadi') {echo 'class="active"';} ?>>Kontak Pribadi</label>
							</a>
							<a href="?<?php echo $link.'&v='.$_GET['v'].'&id='.$_GET['id'].'&menu=kontak_darurat'; ?>">
								<label for='op3' <?php if ($_GET['menu'] == 'kontak_darurat') {echo 'class="active"';} ?>>Kontak Darurat</label>
							</a>
							<a href="?<?php echo $link.'&v='.$_GET['v'].'&id='.$_GET['id'].'&menu=tanggungan'; ?>">
								<label for='op4' <?php if ($_GET['menu'] == 'tanggungan') {echo 'class="active"';} ?>>Tanggungan</label>
							</a>
							<a href="?<?php echo $link.'&v='.$_GET['v'].'&id='.$_GET['id'].'&menu=jabatan'; ?>">
								<label for='op5' <?php if ($_GET['menu'] == 'jabatan') {echo 'class="active"';} ?>>Jabatan</label>
							</a>
							<a href="?<?php echo $link.'&v='.$_GET['v'].'&id='.$_GET['id'].'&menu=mutasi'; ?>">
								<label for='op5' <?php if ($_GET['menu'] == 'mutasi') {echo 'class="active"';} ?>>Mutasi</label>
							</a>
							<a href="?<?php echo $link.'&v='.$_GET['v'].'&id='.$_GET['id'].'&menu=gaji'; ?>">
								<label for='op6' <?php if ($_GET['menu'] == 'gaji') {echo 'class="active"';} ?>>Gaji</label>
							</a>
							<a href="?<?php echo $link.'&v='.$_GET['v'].'&id='.$_GET['id'].'&menu=kualifikasi'; ?>">
								<label for='op7' <?php if ($_GET['menu'] == 'kualifikasi') {echo 'class="active"';} ?>>Kualifikasi</label>
							</a>
						</div>
					</div>
					
					<div class="col-lg-9 col-md-9 col-sm-9 mb" style="margin-left:-15px; width:76%;">
						<div class="row">
						
							<!-- Bagian yang berubah dalam form -->
							<?php
							if (!isset($_GET['menu']) || (isset($_GET['menu']) && $_GET['menu'] == 'data_pribadi')) {
								include_once 'data_pribadi/detail_data_pribadi.php';
							} if ($_GET['menu'] == 'kontak_pribadi') {
								include_once 'kontak_pribadi/detail_kontak_pribadi.php';
							} if ($_GET['menu'] == 'kontak_darurat') {
								include_once 'kontak_darurat/detail_kontak_darurat.php';
							} if ($_GET['menu'] == 'tanggungan') {
								include_once 'tanggungan/detail_tanggungan.php';
							} if ($_GET['menu'] == 'jabatan') {
								include_once 'jabatan/data.php';
							} if ($_GET['menu'] == 'mutasi') {
								include_once 'mutasi/data.php';
							} if ($_GET['menu'] == 'gaji') {
								include_once 'gaji/data.php';
							} if ($_GET['menu'] == 'kualifikasi') {
								include_once 'kualifikasi/detail_kualifikasi.php';
							}
							?>
							<!-- Bagian yang berubah dalam form -->
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- akhir samping kiri panel -->				
	</div>
	<?php
}