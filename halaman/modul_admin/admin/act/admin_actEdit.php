<?php
/* 
** Logikane ngene, pas input dicek sek username e diubah gak trus dicek pisan password e diubah gak,
** carane cek username lama dan baru podo gak??
** lak gak podo, cek username baru wes enek sing gawe durung??
** lak durung enek sing gawe, data iso masuk!!!
** lak password diubah password karo konfirmasi password kudu podo
** lak podo data baru iso masuk!!!
** lak sing diubah username karo password yo dicek mneh
** username gak oleh podo, password karo konfirmasi kudu podo
** lagek data diinput ning tabel!!!

** lak data username karo password gak diubah
** langsung ae data edit dieksekusi!!!
*/

// Variabel data admin yang akan diedit
$admin->kd_admin = $_POST['txtIdAdmin'];
$admin->kd_karyawan = $_POST['txtKdKaryawan'];
$admin->username = $_POST['txtUsername'];
$admin->password = md5($_POST['txtPassword']);
$admin->tipe_admin = $_POST['selTipeAdmin'];
$admin->status = $_POST['selStatusAdmin'];
$admin->tgl_edit = date('d-m-Y');

$err_usrJum = $err_usrQry = '';
$err_passKnfr = $err_passQry = '';

// Jika Username diubah
if ($_POST['txtUsername'] != $_POST['txtUsernameLama']) {
	
	// Cek username ada yang sama tidak
	$jum_sama = $admin->cekUsernameId();
	
	// Jika ada yang sama keluarkan notifikasi, data tidak diubah!
	if ($jum_sama > 0) {
		
		$err_usrJum = '1';
		
		?>
		<script>
			alert('Username tidak boleh sama dengan username lain!');
		</script>
		<?php
	} else {
		
		// Jika tidak, ubah data username!
		$edit_username = $admin->actEditUsername();
		
		// Jika gagal munculkan peringatan untuk user!!!
		if ($edit_username) {
			?>
			<script>
				alert('Berhasil mengubah username admin!');
			</script>
			<?php
		} else {
			
			$err_usrQry = '1';
			
			?>
			<script>
				alert('Gagal mengubah username admin, KESALAHAN SISTEM!');
			</script>
			<?php
		}
	}
}

if ($err_usrJum == '' or $err_usrQry == '') {
	// Jika Password diubah
	if (!empty($_POST['txtPassword']) and !empty($_POST['txtPassKonfirmasi'])) {
		
		// Cek apakah password dan konfirmasi password sama
		if ($_POST['txtPassword'] == $_POST['txtPassKonfirmasi']) {
			
			// Jika password dan konfirmasi password sama, maka password bisa diubah!!!
			$edit_pass = $admin->actEditPassword();
			
			// Jika gagal munculkan peringatan untuk user!!!
			if ($edit_pass) {
				?>
				<script>
					alert('Berhasil mengubah password admin!');
				</script>
				<?php
			} else {
				
				$err_passQry = '1';
				
				?>
				<script>
					alert('Gagal mengubah password admin, KESALAHAN SISTEM!');
				</script>
				<?php
			}
		} else {
			
			// Jika password dan konfirmasi password tidak sama, maka munculkan peringatan untuk user!!!
			
			$err_passKnfr = '1';
			
			?>
			<script>
				alert('Password dan konfirmasi password tidak sama!');
			</script>
			<?php
		}
	}
}

if (($err_usrJum == '' or $err_usrQry == '') or ($err_passQry = '' or $err_passKnfr = '')) {
	// Memulai edit data admin
	if ($admin->actEditAdmin()) {
		
		// Jika berhasil mengubah data admin munculkan notifikasi sukses, dan kembali kehalaman data
		?>
		<script>
			alert('Berhasil mengubah data admin!');
			window.location.assign('?<?php echo $link; ?>');
		</script>
		<?php
	} else {
		
		// Jika gagal munculkan notifikasi gagal ubah data admin!!!
		?>
		<script>
			alert('Gagal Mengubah data admin, KESALAHAN SISTEM!');
		</script>
		<?php
	}
}