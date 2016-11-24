<?php 
session_start();
?>
<div ng-app="myApp" ng-controller="Controller">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">{{msg}}</li>
						</ul><!-- /.breadcrumb -->

						  
					</div>


						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Halaman {{msg}}
								<!--<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>-->
							</h1>
						</div><!-- /.page-header -->

						<div class="row" >
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="clearfix">
									<!--includekan pengumuman disini-->
									<?php include "halaman/pengumuman/index.php"; ?>
								</div>
								<div class="hr dotted"></div>

								<div>
									<div id="user-profile-2" class="user-profile">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-18">
												<li class="active">
													<a data-toggle="tab" href="#profile">
														<i class="green ace-icon fa fa-user bigger-120"></i>
														Profile Karyawan
													</a>												
												</li>
												<li>
													<a data-toggle="tab" href="#kualifikasi">
														<i class="green ace-icon fa fa-book bigger-120"></i>
														Kualifikasi
													</a>												
												</li>
												<li>
													<a data-toggle="tab" href="#kontakDarurat">
														<i class="green ace-icon fa fa-book bigger-120"></i>
														Kontak Darurat
													</a>												
												</li>
												<li>
													<a data-toggle="tab" href="#tanggungan">
														<i class="green ace-icon fa fa-book bigger-120"></i>
														Tanggungan
													</a>												
												</li>												 
											</ul>

											<div class="tab-content no-border padding-24">
												<div id="profile" class="tab-pane in active" ng-init="getProfil()" >
													<div class="row" ng-repeat="x in names">
														<div class="col-xs-12 col-sm-3 center">
															<span class="profile-picture" ng-if="x.pas_foto != ''">
																<img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" ng-src="../assets/img/karyawan/{{x.pas_foto}}" style="width:180;height:200px;"/>
															</span>
															<span class="profile-picture" ng-if="x.pas_foto == ''">
																<span ng-if="x.jekel == 0">
																<img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="assets/avatars/profile-pic.jpg" style="width:180;height:200px;"/></span>
																<span ng-if="x.jekel == 1">
																<img class="editable img-responsive" alt="Alex's Avatar" id="avatar2" src="assets/avatars/avatar3.png" style="width:180;height:200px;" /></span>
															</span>
															
															<div class="space space-4"></div>
															<!--<a onclick="showForm()" class="btn btn-sm btn-block btn-primary">
																<i class="ace-icon fa fa-envelope-o bigger-110"></i>
																<span class="bigger-110">Edit</span>
															</a>-->
														</div><!-- /.col -->

														<div class="col-xs-12 col-sm-9">
																<div class="profile-user-info">
																<div class="profile-info-row">
																	<div class="profile-info-name"> Kode Karyawan </div>

																	<div class="profile-info-value">
																		<span>{{x.kd_karyawan}}</span>
																	</div>
																</div>
																<div class="profile-info-row">
																	<div class="profile-info-name"> NIK Karyawan </div>

																	<div class="profile-info-value">
																		<span>{{x.nik_karyawan}}</span>
																	</div>
																</div>
																<div class="profile-info-row">
																	<div class="profile-info-name"> Nama </div>

																	<div class="profile-info-value">
																		<span>{{x.nm_karyawan}}</span>
																	</div>
																</div>
																<div class="profile-info-row">
																	<div class="profile-info-name"> Jenis Kelamin </div>

																	<div class="profile-info-value">
																	<span ng-if="x.jekel == 0">Laki-Laki</span>
																	<span ng-if="x.jekel == 1">Perempuan</span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Alamat </div>

																	<div class="profile-info-value">
																		<i class="fa fa-map-marker light-orange bigger-110"></i>
																		<span>{{x.alamat_jalan_1}}</span>
																	</div>
																</div>
																<div class="profile-info-row">
																	<div class="profile-info-name"> Kode Pos </div>

																	<div class="profile-info-value">
																		<span>{{x.kdpos}}</span>
																	</div>
																</div>
																<div class="profile-info-row">
																	<div class="profile-info-name">Telp </div>

																	<div class="profile-info-value">
																		<span>{{x.telp_mobile}}</span>
																		<span>{{x.telp_rumah}}</span>
																	</div>
																</div>
																<div class="profile-info-row">
																	<div class="profile-info-name">Status</div>

																	<div class="profile-info-value">
																	<span ng-if="x.status_nikah == 0">Belum Menikah</span>
																	<span ng-if="x.status_nikah == 1">Menikah</span>
																	<span ng-if="x.status_nikah == 2">Cerai</span>
																	</div>
																</div>
																<div class="profile-info-row">
																	<div class="profile-info-name"> Email </div>

																	<div class="profile-info-value">
																		<i class="ace-icon fa fa-envelope-o bigger-110"></i>
																		<span>{{x.email_utama}} , {{x.email_lain}}</span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Tgl Masuk </div>

																	<div class="profile-info-value">
																		<span>{{x.tgl_masuk}}</span>
																	</div>
																</div>
															</div>

															<div class="hr hr-8 dotted"></div>
 
														</div><!-- /.col -->
													</div><!-- /.row -->
													<!--<div class="space-20"></div>-->
												</div><!-- /#home -->
												<!--Kualifikasi-->
											<div id="kualifikasi" class="tab-pane">
												<div class="profile-user-info profile-user-info-striped">
														<div class="widget-header widget-header-small">
																<h4 class="widget-title blue smaller">
																	<i class="ace-icon fa fa-rss orange"></i>
																	Riwayat Pendidikan
																</h4>
														</div>
													<div class="widget-box transparent"> 
														<div class="widget-body">
															<div class="widget-main">
																<div class="col-xs-12 col-sm-12">
																	<table class="table table-striped table-bordered">
															<thead>
																<tr>
																	<th class="center">#</th>
																	<th>Jenjang</th>
																	<th>Instansi</th>
																	<th>Prodi</th>
																	<th class="hidden-xs">Lama Studi</th>
																	<th>IPK</th>
																	<th class="hidden-xs">Thn Masuk</th>
																	<th class="hidden-xs">Lulus</th>
																</tr>
															</thead>

															<tbody ng-init="getPendidikan()">
																<tr ng-repeat="a in pendidikan">
																	<td class="center">{{$index + 1}}</td>
																	<td>{{a.lvl_pendidikan}}</td>
																	<td>{{a.nm_institusi}}</td>
																	<td>{{a.program_studi}}</td>
																	<td class="hidden-xs">{{a.lama_studi}}</td>
																	<td>{{a.gpa}}</td>
																	<td class="hidden-xs">{{a.thn_mulai}}</td>
																	<td class="hidden-xs">{{a.thn_akhir}}</td>
																</tr>
															</tbody>
														</table>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="hr hr-8 dotted"></div>
												<div class="profile-user-info profile-user-info-striped">
														<div class="widget-header widget-header-small">
																<h4 class="widget-title blue smaller">
																	<i class="ace-icon fa fa-briefcase orange"></i>
																	Pengalaman Kerja
																</h4>
														</div>
													<div class="widget-box transparent"> 
														<div class="widget-body">
															<div class="widget-main">
																<div class="col-xs-12 col-sm-12">
																	<table class="table table-striped table-bordered">
															<thead>
																<tr>
																	<th class="center">#</th>
																	<th>Perusahaan</th>
																	<th>Jabatan</th>
																	<th class="hidden-xs">Tgl Masuk</th>
																	<th>Tgl Keluar</th>
																	<th class="hidden-xs">Komentar</th>
																</tr>
															</thead>

															<tbody ng-init="getPengalaman()">
																<tr ng-repeat="b in pengalaman">
																	<td class="center">{{$index + 1}}</td>
																	<td>{{b.nm_perusahaan}}</td>
																	<td>{{b.nm_jabatan}}</td>
																	<td class="hidden-xs">{{b.tgl_masuk}}</td>
																	<td>{{b.tgl_keluar}}</td>
																	<td class="hidden-xs">{{b.komentar}}</td>
																</tr>
															</tbody>
														</table>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="hr hr-8 dotted"></div>
												<div class="profile-user-info profile-user-info-striped">
														<div class="widget-header widget-header-small">
																<h4 class="widget-title blue smaller">
																	<i class="ace-icon fa fa-cogs orange"></i>
																	Keahlian
																</h4>
														</div>
													<div class="widget-box transparent"> 
														<div class="widget-body">
															<div class="widget-main">
																<div class="col-xs-12 col-sm-12">
																	<table class="table table-striped table-bordered">
															<thead>
																<tr>
																	<th class="center">#</th>
																	<th>Keahlian</th>
																	<th>Selama</th>
																	<th class="hidden-xs">Deskripsi</th>
																	<th class="hidden-xs">Catatan</th>
																</tr>
															</thead>

															<tbody ng-init="getKeahlian()">
																<tr ng-repeat="d in keahlian">
																	<td class="center">{{$index + 1}}</td>
																	<td>{{d.nm_skill}}</td>
																	<td>{{d.thn_pengalaman}}</td>
																	<td class="hidden-xs">{{d.deskripsi}}</td>
																	<td class="hidden-xs">{{d.komentar}}</td>
																	 
																</tr>
															</tbody>
														</table>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="hr hr-8 dotted"></div>
												<div class="profile-user-info profile-user-info-striped">
														<div class="widget-header widget-header-small">
																<h4 class="widget-title blue smaller">
																	<i class="ace-icon fa fa-bullhorn orange"></i>
																	Bahasa
																</h4>
														</div>
													<div class="widget-box transparent"> 
														<div class="widget-body">
															<div class="widget-main">
																<div class="col-xs-12 col-sm-12">
														<table class="table table-striped table-bordered">
															<thead>
																<tr>
																	<th class="center">#</th>
																	<th>Bahasa</th>
																	<th>Keahlian</th>
																	<th>Kefasihan</th>
																	<th class="hidden-xs">Catatan</th>
																</tr>
															</thead>

															<tbody ng-init="getBahasa()">
																<tr ng-repeat="e in bahasa">
																	<td class="center">{{$index + 1}}</td>
																	<td>{{e.nm_bahasa}}</td>
																	<td ng-if="e.keterangan == 0">Menulis</td>
																	<td ng-if="e.keterangan == 1">Komunikasi</td>
																	<td ng-if="e.keterangan == 2">Membaca</td>
																	<td ng-if="e.kefasihan == 0">Buruk</td>
																	<td ng-if="e.kefasihan == 1">Cukup</td>
																	<td ng-if="e.kefasihan == 2">Baik</td>
																	<td ng-if="e.kefasihan == 3">Sangat Baik</td>
																	<td class="hidden-xs">{{e.komentar}}</td>
																	 
																</tr>
															</tbody>
														</table>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												
											</div><!-- /.row -->
											
											<div id="kontakDarurat" class="tab-pane">
												<div class="profile-user-info profile-user-info-striped">
														<div class="widget-header widget-header-small">
																<h4 class="widget-title blue smaller">
																	<i class="ace-icon fa fa-exclamation-circle orange"></i>
																	Kontak Darurat
																</h4>
														</div>
													<div class="widget-box transparent"> 
														<div class="widget-body">
															<div class="widget-main">
																<div class="col-xs-12 col-sm-12">
																	<table class="table table-striped table-bordered">
															<thead>
																<tr>
																	<th class="hidden-xs">#</th>
																	<th>Nama</th>
																	<th>Hubungan</th>
																	<th class="hidden-xs">Tlp Rumah</th>
																	<th>Tlp Hp</th>
																	<th class="hidden-xs">Tlp Kantor</th>
																</tr>
															</thead>

															<tbody ng-init="getDarurat()">
																<tr ng-repeat="f in darurat">
																	<td class="hidden-xs">{{$index + 1}}</td>
																	<td>{{f.nm_kontak_lain}}</td>
																	<td>{{f.hubungan}}</td>
																	<td class="hidden-xs">{{f.telp_rumah}}</td>
																	<td>{{f.telp_mobile}}</td>
																	<td class="hidden-xs">{{f.telp_kantor}}</td>
																</tr>
															</tbody>
														</table>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div><!-- /.row -->
											
<div class="hr hr-8 dotted"></div>
												
												<div id="tanggungan" class="tab-pane">
												<div class="profile-user-info profile-user-info-striped">
														<div class="widget-header widget-header-small">
																<h4 class="widget-title blue smaller">
																	<i class="ace-icon fa fa-users orange"></i>
																	Tanggungan
																</h4>
														</div>
													<div class="widget-box transparent"> 
														<div class="widget-body">
															<div class="widget-main">
																<div class="col-xs-12 col-sm-12">
																	<table class="table table-striped table-bordered">
															<thead>
																<tr>
																	<th class="hidden-xs">#</th>
																	<th>Nama</th>
																	<th>Hubungan</th>
																	<th class="hidden-xs">Tgl Lahir</th>
																</tr>
															</thead>

															<tbody ng-init="getTanggungan()">
																<tr ng-repeat="g in tanggungan">
																	<td class="hidden-xs">{{$index + 1}}</td>
																	<td>{{g.nm_tanggungan}}</td>
																	<td ng-if="g.hubungan == 0">Anak</td>
																	<td ng-if="g.hubungan == 1">Lainnya</td>
																	<td class="hidden-xs">{{g.tgl_lahir}}</td>
																	
																</tr>
															</tbody>
														</table>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="hr hr-8 dotted"></div>											
												</div><!-- /#home -->
											</div>
										</div>
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
</div>
<script type="text/javascript" src="libs/js/angular/angular.min.js"></script>
<script type="text/javascript" src="halaman/profil/controller.js"></script>