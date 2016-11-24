<?php
include_once 'objects/tb_admin.php';

$admin = new Admin($db);

$admin->id_admin = $_SESSION['kd_admin'];

$data_adm = $admin->detailAdmin();
?>

<body>

	<section id="container" >
		<!-- **********************************************************************************************************************************************************
		TOP BAR CONTENT & NOTIFICATIONS
		*********************************************************************************************************************************************************** -->
		<!--header start-->
		<header class="header black-bg">
			<div class="sidebar-toggle-box">
				<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
			</div>
			<!--logo start-->
			<?php
			$setting->nm_setting = 'main_title';
			$setting->ambilSetting();
			?>
			<a href="index.html" class="logo"><b><?php echo $setting->setting; ?></b></a>
			
			<div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
					<?php
					$hitung['where'] = array('status' => '1', 'status_reminder' => '1');
					$hitung['return_type'] = 'count';
					$jml = $crud->read('tb_general_affair', $hitung);
					(empty($jml))?$jml = '0':$jml = $jml;
					?>
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-exclamation-circle"></i> Notifikasi Sistem
                            <span class="badge bg-theme"><?php echo $jml; ?></span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
								<p class="green">Anda mempunyai <?php echo $jml; ?> notifikasi!</p>
                            </li>
							<?php
							$data['where'] = array('status' => '1', 'status_reminder' => '1');
							$notif = $crud->read('tb_general_affair', $data);
							
							if (!empty($notif)) {
								foreach($notif as $noti) {
									?>
									<li>
										<a href="?p=general_data&v=detail&id=<?php echo $noti['kd_general']; ?>">
											<span class="subject">
												<span class="from">General Affair</span>
												<span class="time"><?php echo $noti['tgl_reminder']; ?></span>
											</span>
											<span class="message">
												<?php echo $noti['nm_general']; ?> - Perlu diperbarui!<br />Sebelum Jatuh Tempo Tanggal <b><?php echo $noti['tgl_akhir']; ?></b>
											</span>
										</a>
									</li>
									<?php
								}
							}
							?>
                        </ul>
                    </li>
                    <!-- settings end -->
                </ul>
                <!--  notification end -->
            </div>
			
			<!--logo end-->
			<div class="top-menu">
				<ul class="nav pull-right top-menu">
					<?php
					$hasil = $crud->read('tb_hakaksesuser a,tb_menu b', array('where_kolom' => array('a.fc_idmenu' => 'b.fc_idmenu'), 'where' => array('b.fc_idmenu' => '6'), 'order_by' => 'fc_urutan ASC'));
					foreach($hasil as $baris){
						?>
						<li><a class="logout" href="<?php echo $baris['fc_link']; ?>"><?php echo $baris['fv_menu']; ?></a></li>
						<?php
					}
					?>
				</ul>
			</div>
		</header>
		<!--header end-->