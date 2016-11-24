<?php
if (isset($_POST['btnUbahSetting'])) {
	$data = array($_POST['txtHeaderTitle'],
				$_POST['txtMainTitle'],
				$_POST['txtHomeTitle'],
				$_FILES['fileFavicon']['name'],
				$_FILES['fileBgImg']['name'],
				$_POST['txtLoginTitle'],
				$_POST['selThnMulai'],
				$_POST['txtFooterTitle']
				);
	
	$nm_set = array('header_title',
					'main_title',
					'home_title',
					'favicon',
					'bg_img',
					'login_title',
					'thn_mulai',
					'footer_title',
					);
	
	for($d = 0; $d < 8; $d++) {
		if (!empty($data[$d])) {
			if ($nm_set[$d] == 'favicon') {
				// cek file kosong apa tidak
				if (!empty($_FILES['fileFavicon']['name'])) {
					
					$favicon = $_FILES['fileFavicon']['name'];
					$up_favicon = move_uploaded_file($_FILES["fileFavicon"]["tmp_name"], "assets/img/" . $favicon);
					
					if ($up_favicon) {
						$fav_lama = 'assets/img/' . $_POST['txtFaviconLama'];
						
						$setting->nm_setting = 'favicon';
						$setting->setting = $favicon;
						
						$setting->ubahSetting();
						unlink($fav_lama);
					}
				}
			} if ($nm_set[$d] == 'bg_img') {
				// cek file kosong apa tidak
				if (!empty($_FILES['fileBgImg']['name'])) {
					
					$bg_img = $_FILES['fileBgImg']['name'];
					$up_bg = move_uploaded_file($_FILES["fileBgImg"]["tmp_name"], "assets/img/" . $bg_img);
					
					if ($up_bg) {
						$bg_lama = 'assets/img/' . $_POST['txtBgImgLama'];
						
						$setting->nm_setting = 'bg_img';
						$setting->setting = $bg_img;
						
						$setting->ubahSetting();
						unlink($bg_lama);
					}
				}
			} else {
				$setting->nm_setting = $nm_set[$d];
				$setting->setting = $data[$d];
				
				$setting->ubahSetting();
			}
		}
	}
	?>
	<script>
		alert('Berhasil Mengubah Setting Sistem!');
		window.location.assign('?p=setting');
	</script>
	<?php
}
?>
<div class="content-panel">
	<div class="panel-heading">
		<h3><i class="fa fa-angle-right"></i> Pengaturan Sistem <small>Sistem Web Reservasi Hotel</small></h3>
	</div>
</div>

<div class="clearfix"></div>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="form-panel">
			<div class="x_title">
				<h2>Form Setting</h2>
			</div>
			<div class="x_content">
				<br />
				<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data">

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
							Title Header
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php
							$setting->nm_setting = 'header_title';
							$setting->ambilSetting();
							?>
							<input type="text" name="txtHeaderTitle" placeholder="Title Header" class="form-control" value="<?php echo $setting->setting; ?>" class="form-control col-md-7 col-xs-12" autofocus>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
							Main Title
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php
							$setting->nm_setting = 'main_title';
							$setting->ambilSetting();
							?>
							<input type="text" id="first-name" placeholder="Main Title" name="txtMainTitle" value="<?php echo $setting->setting; ?>" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
							Home Title
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php
							$setting->nm_setting = 'home_title';
							$setting->ambilSetting();
							?>
							<input type="text" id="first-name" placeholder="Home Title" name="txtHomeTitle" value="<?php echo $setting->setting; ?>" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
							Favicon
						</label>
						<?php
						$setting->nm_setting = 'favicon';
						$setting->ambilSetting();
						?>
						<div class="col-md-8 col-sm-6 col-xs-12">
							<?php
							if (($setting->setting == '') or (!file_exists('assets/img/' . $setting->setting . ''))) {
								?>
								<img src="assets/img/ui-sam.jpg" width="100px" height="100px">
								<input type="hidden" name="txtFaviconLama" class="form-control" value="-">
								<?php
							} else {
								?>
								<img src="assets/img/<?php echo $setting->setting; ?>" width="100px" height="100px">
								<input type="hidden" name="txtFaviconLama" class="form-control" value="<?php echo $setting->setting; ?>">
								<?php
							}
							?>
							<span class="help-block" style="color:red;">*Kosongkan Favicon jika tidak diubah.</span>
						</div>
						<div class="col-md-6">
							<div class="col-sm-6 col-xs-12 pull-right">
								<input type="file" id="first-name" name="fileFavicon" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
							Gambar Background
						</label>
						<?php
						$setting->nm_setting = 'bg_img';
						$setting->ambilSetting();
						?>
						<div class="col-md-8 col-sm-6 col-xs-12">
							<?php
							if (($setting->setting == '') or (!file_exists('assets/img/' . $setting->setting . ''))) {
								?>
								<img src="assets/img/login-bg.jpg" width="100px" height="100px">
								<input type="hidden" name="txtBgImgLama" class="form-control" value="-">
								<?php
							} else {
								?>
								<img src="assets/img/<?php echo $setting->setting; ?>" width="100px" height="100px">
								<input type="hidden" name="txtBgImgLama" class="form-control" value="<?php echo $setting->setting; ?>">
								<?php
							}
							?>
							<span class="help-block" style="color:red;">*Kosongkan Gambar jika tidak diubah.</span>
						</div>
						<div class="col-md-6">
							<div class="col-sm-6 col-xs-12 pull-right">
								<input type="file" id="first-name" name="fileBgImg" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
							Login Title
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php
							$setting->nm_setting = 'login_title';
							$setting->ambilSetting();
							?>
							<input type="text" placeholder="Login Title" name="txtLoginTitle" value="<?php echo $setting->setting; ?>" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
							Tahun Mulai
						</label>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<?php
							$setting->nm_setting = 'thn_mulai';
							$setting->ambilSetting();
							?>
							<select id="first-name" required="required" name="selThnMulai" class="form-control col-md-7 col-xs-12">
								<?php
								$thn_mulai = 1900;
								$thn_now = date('Y'); 
								$thn_akhir = idate('Y', $thn_now);
								$jarak_thn = $thn_now - $thn_mulai;
								
								for ($i = 0; $i <= $jarak_thn; $i++) {
									$thn = 1900 + $i;
									
									if ($thn == $setting->setting) {
										echo '<option value="' . $thn . '" selected>' . $thn . '</option>';
									}
									echo '<option value="' . $thn . '">' . $thn . '</option>';
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
							Footer Title
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php
							$setting->nm_setting = 'footer_title';
							$setting->ambilSetting();
							?>
							<input type="text" id="first-name" required="required" placeholder="Footer Title" name="txtFooterTitle" value="<?php echo $setting->setting; ?>" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
							<button type="submit" class="btn btn-primary" name="btnUbahSetting">Ubah Setting</button>
							<button type="reset" class="btn btn-warning">Batal</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>