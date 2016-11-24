<?php 
session_start();
?>
<div ng-app="myApp" ng-controller="gajiCtrl">
	<div class="breadcrumbs" id="breadcrumbs">
		<script type="text/javascript">
			try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
		</script>
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="#">Home</a>
			</li>
			<li class="active">Slip Gaji</li>
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
					<h4 class="widget-title lighter smaller">Slip Gaji Bulan {{pmonth | date:'MMMM'}}
					</h4>
				</div>

				<div class="widget-body">
					<div class="widget-main ">
						<div class="profile-user-info profile-user-info-striped">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th width="2%" class="center">#</th>
										<th class="center">Komponen Gaji</th>
										<th class="center">Nilai</th>
										<th class="hidden-xs">Tipe Gaji</th>
									</tr>
								</thead>
								 
								<tbody ng-init="getGaji()">
									<tr ng-repeat="a in gaji">
										<td class="center">{{$index + 1}}</td>
										<td>{{a.nm_gaji}}</td>
										<td class="left">{{a.jml_gaji | currency:"Rp."}}</td>										 
										<td class="hidden-xs" ng-if="a.tipe_gaji == 0">Cash</td>										 
										<td class="hidden-xs" ng-if="a.tipe_gaji == 1">Transfer</td>										 
									</tr>
								</tbody>
								<tfoot>
									<tr ng-init="getTotal()">
										<th width="2%" class="center">#</th>
										<th class="center">Total</th>
										<th class="left" colspan="2">{{total | currency:"Rp."}}</th>
									</tr> 
								</tfoot> 
								 
								  
							</table>
							<table class="table table-striped table-bordered">
								<tbody ng-init="getTotal()">
									<th width="8%">Terbilang :</th>
									<th class="left" colspan="2">{{total | terbilang}} Rupiah.</th>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.row -->
	</div>
</div>
<script type="text/javascript" src="libs/js/angular/angular.min.js"></script>
<script type="text/javascript" src="halaman/gaji/controller.js"></script>