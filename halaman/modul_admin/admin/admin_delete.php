<?php
$admin->kd_admin = paramDecrypt($_GET['id']);

if ($admin->actDeleteAdmin()) {
	?>
	<script>
		alert('Berhasil Hapus Admin id = <?php echo paramDecrypt($_GET['id']); ?>!');
		window.location.assign('?<?php echo $link; ?>');
	</script>
	<?php
} else {
	?>
	<script>
		alert('Gagal Hapus Admin id = <?php echo paramDecrypt($_GET['id']); ?>!');
		window.location.assign('?<?php echo $link; ?>');
	</script>
	<?php
}