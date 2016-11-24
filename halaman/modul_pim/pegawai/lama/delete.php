<?php
/*
	- tb_karyawan
	- td_karyawan_bahasa
	- td_karyawan_cuti
	- td_karyawan_gaji
	- td_karyawan_keahlian
	- td_karyawan_kontak_lain
	- td_karyawan_pengalaman_kerja
	- td_karyawan_riwayat_pendidikan
	- td_karyawan_tanggungan
*/
$delete['tm'] = $crud->delete('tb_karyawan', array('kd_karyawan' => $_GET['id']));
$delete['td1'] = $crud->delete('td_karyawan_bahasa', array('kd_karyawan' => $_GET['id']));
$delete['td2'] = $crud->delete('td_karyawan_cuti', array('kd_karyawan' => $_GET['id']));
$delete['td3'] = $crud->delete('td_karyawan_gaji', array('kd_karyawan' => $_GET['id']));
$delete['td4'] = $crud->delete('td_karyawan_keahlian', array('kd_karyawan' => $_GET['id']));
$delete['td5'] = $crud->delete('td_karyawan_kontak_lain', array('kd_karyawan' => $_GET['id']));
$delete['td6'] = $crud->delete('td_karyawan_pengalaman_kerja', array('kd_karyawan' => $_GET['id']));
$delete['td7'] = $crud->delete('td_karyawan_riwayat_pendidikan', array('kd_karyawan' => $_GET['id']));
$delete['td8'] = $crud->delete('td_karyawan_tanggungan', array('kd_karyawan' => $_GET['id']));

if ($delete) {
	?>
	<script>
		alert('Berhasil Hapus Keryawan id = <?php echo $_GET['id']; ?>!');
		window.location.assign('?p=<?php echo $_GET['p']; ?>');
	</script>
	<?php
} else {
	?>
	<script>
		alert('Gagal Hapus Keryawan id = <?php echo $_GET['id']; ?>!');
		window.location.assign('?p=<?php echo $_GET['p']; ?>');
	</script>
	<?php
}