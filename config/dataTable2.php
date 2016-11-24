<script>
$('#dataTable').dataTable({
	"ordering" : false,
	"language" : {
		"lengthMenu" : "Tampilkan _MENU_ data",
		"zeroRecords" : "Maaf tidak ada data yang ditampilkan!",
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
</script>