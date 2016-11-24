<?php
/* Begitu user input data, dicek username e sek */
$admin->username = $_POST['txtUsername'];
$cek_username = $admin->cekUserNameAdmin();

// Jika Username tidak ada data admin bisa diinput, selain itu zonk!!!
if ($cek_username < 1) {
	
	// Begitu username admin tidak sama
	// Langkah selanjutnya cek password dan konfirmasi password
	$pass = $_POST['txtPassword'];
	$konfirm_pass = $_POST['txtPassKonfirmasi'];
	
	if ($pass == $konfirm_pass) {
		if ($_POST['checkKaryawan'] == '1') {
			$dataKaryawan = $admin->kd_karyawan = $_POST['txtKdKaryawan'];
		} else {
			$dataKaryawan = $admin->kd_karyawan = '';
		}
		// Set variabel data admin
		$admin->kd_admin = $_POST['txtIdAdmin'];
		$dataKaryawan;
		$admin->username = $_POST['txtUsername'];
		$admin->password = md5($_POST['txtPassword']);
		$admin->tipe_admin = $_POST['selTipeAdmin'];
		$admin->status = $_POST['selStatusAdmin'];
		$admin->tgl_buat = date('d-m-Y');
		
		// Jika password dan konfirmasi sama maka inputkan data admin ketabel!
		if ($admin->actInputAdmin()) {
			?>
			<script>
				alert("Berhasil menambahkan data admin!!!");
				window.location.assign('?<?php echo $link; ?>');
			</script>
			<?php
		} else {
			?>
			<script>
				alert("Gagal menambahkan data admin!!!");
			</script>
			<?php
		}
	} else {
		?>
		<script>
			alert("Password dan konfirmasi password harus sama!!!");
		</script>
		<?php
	}
} else {
	?>
	<script>
		alert("Username Admin sudah dipakai, Gunakan Username lain!!!");
	</script>
	<?php
}