<?php
include_once 'objects/tb_admin.php';
include_once 'objects/tb_img.php';

$admin = new Admin($db);

$admin->kd_admin = $_SESSION['kd_admin'];

$data_adm = $admin->detailAdmin();
$kd_karyawan = $admin->kd_karyawan;
$level = $admin->tipe_admin;
?>

<!-- **********************************************************************************************************************************************************
MAIN SIDEBAR MENU
*********************************************************************************************************************************************************** -->
<!--sidebar start-->
<aside>
	<div id="sidebar"  class="nav-collapse ">
		<!-- sidebar menu start-->
		<ul class="sidebar-menu" id="nav-accordion">
			<p class="centered">
				<a href="?p=profil_data">
					<?php
					$dir = 'assets/img/karyawan/';
					$conds['where'] = array('kd_karyawan' => $kd_karyawan);
					$conds['return_type'] = 'single';
					$foto = $crud->read('tb_karyawan', $conds);
					if (!empty($foto) and (file_exists($dir.$foto['pas_foto']))) {
						echo '<img src="'.$dir.$foto['pas_foto'].'" class="img-circle" width="60">';
					} else {
						echo '<img src="assets/img/no-user-image.png" class="img-circle" width="60">';
					}
					?>
				</a>
			</p>
			<h5 class="centered"><?php echo $admin->username; ?>  </h5>
			<?php
			$urut = 0;
			$hasil = $crud->read('tb_hakaksesuser a,tb_menu b', array('where'=>array('fc_lvluser' => $level),'where_kolom' => array('a.fc_idmenu' => 'b.fc_idmenu'), 'order_by' => 'fc_urutan ASC'));
			foreach($hasil as $baris){
				$urut++;
				extract($baris);
				$idmenu = $fc_idmenu;
				if ($fc_link != 'javascript:;') {
					?>
					<li <?php ($urut == 1)?$mt ='class="mt"':$mt = ''; echo $mt; ?>>
						<a href="<?php echo $fc_link; ?>" <?php if($_GET['p'] == substr($fc_link, 3)) {echo 'class="active"';} ?>>
							<i class="<?php echo $fv_class; ?>"></i>
							<span><?php echo $fv_menu; ?></span>
						</a>
					</li>
					<?php
				} else {
					?>
					<li <?php ($urut == 1)?$mt ='class="sub-menu mt"':$mt = 'class="sub-menu"'; echo $mt; ?>>
						<a href="<?php echo $fc_link; ?>" <?php if($_GET['idmenu'] == $idmenu) {echo 'class="active"';} ?>>
							<i class="<?php echo $fv_class; ?>"></i>
							<span><?php echo $fv_menu; ?></span>
						</a>
						<ul class="sub">
							<?php
							// Jika Link submenu bukan javascript
							$submenu = $crud->read('tb_submenu', array('where' => array('fc_idmenu' => $idmenu), 'order_by' => 'fc_urutan ASC'));
							foreach($submenu as $sm) {
								if ($sm['fc_link'] != 'javascript:;') {
									?>
									<li <?php if($_GET['p'] == substr($sm['fc_link'], 3)) {echo 'class="active"';} ?>>
										<a href="<?php echo $sm['fc_link'].'&idmenu='.$idmenu; ?>">
											<?php echo $sm['fv_menu']; ?>
										</a>
									</li>
									<?php
								} else {
									// Jika Link submenu merupakan javascript
									?>
									<li class="sub-menu">
										<a href="<?php echo $sm['fc_link']; ?>" <?php if($_GET['idsubmenu'] == $sm['fc_idsubmenu']) {echo 'class="active"';} ?>>
											<?php echo $sm['fv_menu']; ?>
										</a>
										<?php
										$subsubmenu = $crud->read('tb_subsubmenu', array('where' => array('fc_idsubmenu' => $sm['fc_idsubmenu']), 'order_by' => 'fc_urutan ASC'));
										foreach ($subsubmenu as $ssm) {
											?>
											<ul class="sub">
												<li <?php if($_GET['p'] == substr($ssm['fc_link'], 3)) {echo 'class="active"';} ?>>
													<a href="<?php echo $ssm['fc_link'].'&idmenu='.$idmenu.'&idsubmenu='.$sm['fc_idsubmenu']; ?>">
														<?php echo $ssm['fv_menu']; ?>
													</a>
												</li>
											</ul>
											<?php
										}
										?>
									</li>
									<?php
								}
							}
							?>
						</ul>
					</li>
					<?php
				}
			}
			?>
		</ul>
		<!-- sidebar menu end-->
	</div>
</aside>
<!--sidebar end-->