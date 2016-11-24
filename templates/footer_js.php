		<script src="assets/js/chart-master/Chart.js"></script>
		<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
		<script src="assets/js/jquery.scrollTo.min.js"></script>
		<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
		
		<!--common script for all pages-->
		<script src="assets/js/common-scripts.js"></script>

		<!--script for this page-->
		<script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
		<script type="text/javascript" src="assets/js/gritter-conf.js"></script>
		
		<!-- Datatables -->
		<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		
		<!-- moment.js -->
		<script src="vendors/moment/moment.js"></script>
		
		<!-- DateRangePicker -->
		<script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
		
		<!-- Select2 -->
		<script src="vendors/select2/dist/js/select2.min.js"></script>
		
		<!-- DataTables -->
		<script>
			$('#dataTable').dataTable({
				"ordering" : false,
				"language" : {
					"lengthMenu" : "Tampilkan _MENU_ data",
					"zeroRecords" : "Maaf tidak ada data yang ditampilkan",
					"info" : "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
					"infoEmpty" : "Tidak ada data yang ditampilkan",
					"search" : "Cari :",
					"paginate": {
						"first":      '<span class="glyphicon glyphicon-fast-backward"></span>',
						"last":       '<span class="glyphicon glyphicon-fast-forward"></span>',
						"next":       '<span class="glyphicon glyphicon-forward"></span>',
						"previous":   '<span class="glyphicon glyphicon-backward"></span>'
					}
				}
			});
			var table = $('#dataTableServer').DataTable({
				"processing": true,
				"serverSide": true,
				"ordering" : false,
				"language" : {
					"lengthMenu" : "Tampilkan _MENU_ data",
					"zeroRecords" : "Maaf tidak ada data yang ditampilkan",
					"info" : "Menampilkan halaman _PAGE_ dari _PAGES_ halaman",
					"infoEmpty" : "Tidak ada data yang ditampilkan",
					"search" : "Cari :",
					"paginate": {
						"first":      '<span class="glyphicon glyphicon-fast-backward"></span>',
						"last":       '<span class="glyphicon glyphicon-fast-forward"></span>',
						"next":       '<span class="glyphicon glyphicon-forward"></span>',
						"previous":   '<span class="glyphicon glyphicon-backward"></span>'
					}
				},
				"ajax": "config/ssp_script.php",
				"columnDefs": [{
					"targets": -1,
					"data": null,
					"defaultContent": '<div class="btn-group"> \
											<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"> \
												Opsi <span class="caret"></span> \
											</button> \
											<ul class="dropdown-menu" role="menu"> \
												<li><a id="detail" href="#"><i class="fa fa-book"></i> Detail</a></li> \
												<li class="divider"></li> \
												<li><a id="edit" href="#"><i class="fa fa-pencil"></i> Edit</a></li> \
												<li><a id="delete" href="#"><i class="fa fa-times"></i> Delete</a></li> \
											</ul> \
										</div>'
				}], "columnDefs": [{
					"searchable": false,
					"orderable": false,
					"targets": 0
				}],
				"order": [[ 1, 'asc' ]]
			});
			
			table.on('order.dt search.dt', function () {
				table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
					cell.innerHTML = i+1;
				});
			}).draw();
			
			$('#dataTableServer tbody').on( 'click', '#detail', function () {
				var data = table.row( $(this).parents('tr') ).data();
				window.location.href = "?p=<?php echo $_GET['p']; ?>&v=detail&id="+ data[1];
			});
			$('#dataTableServer tbody').on( 'click', '#edit', function () {
				var data = table.row( $(this).parents('tr') ).data();
				window.location.href = "?p=<?php echo $_GET['p']; ?>&v=edit&id="+ data[1];
			});
			$('#dataTableServer tbody').on( 'click', '#delete', function () {
				var data = table.row( $(this).parents('tr') ).data();
				window.location.href = "?p=<?php echo $_GET['p']; ?>&v=delete&id="+ data[1];
			});
		</script>
		<!-- DataTables -->
		
		<!-- ANY JS -->
		<script type="text/javascript">
			$(function() {
				$( ".dateRangePickerPim" ).datepicker({
					dateFormat : 'yy-mm-dd',
					changeMonth: true,
					changeYear: true
				});
				$( ".dateRangePicker" ).datepicker({
					dateFormat : 'dd-mm-yy',
					changeMonth: true,
					changeYear: true
				});
				
				//Memanggil fungsi dari select2
				$(".select2").select2();
			});
		</script>
		<!-- ANY JS -->
		
		<script type="text/javascript">
		$('html').bind('keypress', function(event) {
			disableCtrlKeyCombination(event);
		});
		function disableCtrlKeyCombination(e){
			//list all CTRL + key combinations you want to disable
			var forbiddenKeys = new Array('a', 'n', 'c', 'x', 'v', 'j', 'u');
			var key;
			var isCtrl;
			if(window.event) {
				key = window.event.keyCode;     //IE
				if(window.event.ctrlKey)
					isCtrl = true;
				else
					isCtrl = false;
			} else {
				key = e.which;     //firefox
				if(e.ctrlKey)
					isCtrl = true;
				else
					isCtrl = false;
			}
			//if ctrl is pressed check if other key is in forbidenKeys array
			if(isCtrl) {
				for(i=0; i<forbiddenkeys.length; i++) {
					//case-insensitive comparation
					if(forbiddenKeys[i].toLowerCase() == String.fromCharCode(key).toLowerCase()) {
						alert('Key combination CTRL + '
							+String.fromCharCode(key)
							+' has been disabled.');
						return false;
					}
				}
			}
			return true;
		}
		</script>

	</body>
</html>