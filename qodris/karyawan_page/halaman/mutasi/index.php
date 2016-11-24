<?php 
session_start();
?>
<div ng-app="myApp" ng-controller="mutasiCtrl">
	<div class="breadcrumbs" id="breadcrumbs">
		<script type="text/javascript">
			try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
		</script>
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="#">Home</a>
			</li>
			<li class="active">Mutasi Karyawan</li>
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
			<div class="widget-box widget-color-orange">
				<div class="widget-header">
					<h4 class="widget-title lighter smaller">Mutasi Karyawan</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main ">
						<div class="profile-user-info profile-user-info-striped">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th width="2%" class="center">#</th>
										<th class="center">Kode Mutasi</th>
										<th class="center">Tgl Mutasi</th>
										<th class="center">Nik</th>
										<th class="center">Bagian</th>
										<th class="center">Jabatan</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th width="2%" class="center">#</th>
										<th class="center">Kode Mutasi</th>
										<th class="center">Tgl Mutasi</th>
										<th class="center">Nik</th>
										<th class="center">Bagian</th>
										<th class="center">Jabatan</th>
									</tr>
								</tfoot>

								<tbody ng-init="getMutasi()">
									<tr ng-repeat="a in mutasi">
										<td class="center">{{$index + 1}}</td>
										<td>{{a.kd_mutasi}}</td>
										<td>{{a.tgl_mutasi}}</td>
										<td class="center">{{a.nik_karyawan}}</td>										 
										<td class="center">{{a.nm_bagian}}</td>										 
										<td class="center">{{a.nm_jabatan}}</td>										 
									</tr>
								</tbody>
							</table>
							<div class="profile-user-info profile-user-info-striped" ng-init="getStatus()">
								<div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Nik Saat ini</div>
													<div class="profile-info-value">
														<span>{{nik}}</span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Bagian Saat ini</div>
													<div class="profile-info-value">
														<span>{{bagian}}</span>
													</div>
												</div>
												<div class="profile-info-row">
													<div class="profile-info-name"> Jabatan Saat ini</div>
													<div class="profile-info-value">
														<span>{{jabatan}}</span>
													</div>
												</div>
								</div>			
							</div>
							<br/>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.row -->
	</div>
</div>
<script type="text/javascript" src="libs/js/angular/angular.min.js"></script>
<script type="text/javascript" src="halaman/mutasi/controller.js"></script>