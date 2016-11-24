<?php
class Admin {
	//koneksi db dan nama tabel
	private $koneksi;
	private $nm_tabel = "tb_admin";
	
	public $id;
	public $kd_admin;
	public $tipe_admin;
	public $kd_karyawan;
	public $username;
	public $password;
	public $status;
	public $tgl_buat;
	public $tgl_edit;
	public $session_id;
	
	public function __construct($db) {
		$this->koneksi = $db;
	}
	
	function loginAdmin() {
		
		$query = "SELECT
					*
				FROM
					" . $this->nm_tabel . "
				WHERE
					username = ?
				AND
					password = ?
				";
				
		$stmt = $this->koneksi->prepare( $query );
		
		$stmt->bindParam(1, $this->username);
		$stmt->bindParam(2, $this->password);
		
		$stmt->execute();

		return $stmt;
	}
	
	function updateSessionLogin() {
		$query = "UPDATE
					" . $this->nm_tabel . "
				SET
					session_id = ?
				WHERE
					kd_admin = ?
				";
		
		$stmt = $this->koneksi->prepare( $query );
		
		$stmt->bindParam(1, $this->session_id);
		$stmt->bindParam(2, $this->kd_admin);
		
		$stmt->execute();

		return $stmt;
	}
	
	function cekSession() {
		$query = "SELECT
					*
				FROM
					" . $this->nm_tabel . "
				WHERE
					kd_admin = ?
				AND session_id = ?
				";
		
		$stmt = $this->koneksi->prepare( $query );
		
		$stmt->bindParam(1, $this->kd_admin);
		$stmt->bindParam(2, $this->session_id);
		
		$stmt->execute();

		return $stmt;
	}
	
	function detailAdmin() {
		$query = "SELECT
					*
				FROM
					" . $this->nm_tabel . "
				WHERE
					kd_admin = ?
				";
				
		$stmt = $this->koneksi->prepare($query);
		
		$stmt->bindParam(1, $this->kd_admin);
		
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->kd_admin = $row['kd_admin'];
		$this->kd_karyawan = $row['kd_karyawan'];
		$this->username = $row['username'];
		$this->password = $row['password'];
		$this->status = $row['status'];
		$this->tipe_admin = $row['tipe_admin'];
		
		return $stmt;
	}
	
	function dataAdmin() {
		$query = "SELECT
					*
				FROM
					" . $this->nm_tabel . "
				";
				
		$stmt = $this->koneksi->prepare( $query );
		
		$stmt->execute();
		 
		return $stmt;
	}
	
	function dataAdminBukanSaya() {
		$query = "SELECT
					*
				FROM
					" . $this->nm_tabel . "
				WHERE
					kd_admin != ?
				";
				
		$stmt = $this->koneksi->prepare( $query );
		
		$stmt->bindParam(1, $this->kd_admin);
		
		$stmt->execute();
		 
		return $stmt;
	}
	
	function buatIdAdmin() {
		$query = "SELECT
					kd_admin
				AS
					IDMax
				FROM
					" . $this->nm_tabel . "
				ORDER BY
					id DESC";
		
		// Menyiapkan query
		$stmt = $this->koneksi->prepare($query);
		
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$num = $stmt->rowCount();
		$hari_akhir = substr($row['IDMax'], 3, 2);
		$bln_akhir = substr($row['IDMax'], 5, 2);
		$thn_akhir = substr($row['IDMax'], 7, 2);
		$hari = date('d');
		$bln = date('m');
		$thn = substr(date('Y'), 2, 2);
		
		if ($num > 0 and $hari_akhir == $hari and $bln_akhir == $bln and $thn_akhir == $thn) {
			$IdMax = $row['IDMax'];
			$urutan = (int) substr($IdMax, 9, 6);
		} else {
			$urutan = 0;
		}
		
		$angka = $urutan + 1;
		
		$kd_admin = "ADM".$hari.$bln.$thn.str_pad($angka, 6, '000', STR_PAD_LEFT);
		
		return $kd_admin;
	}
	
	function actInputAdmin() {
		$query = "INSERT INTO
					" . $this->nm_tabel . "
				SET
					kd_admin = :kd_admin,
					kd_karyawan = :kd_karyawan,
					tipe_admin = :tipe_admin,
					username = :username,
					password = :password,
					status = :status,
					tgl_buat = :tgl_buat
				";
				
		$stmt = $this->koneksi->prepare($query);
		
		$stmt->bindParam(':kd_admin', $this->kd_admin);
		$stmt->bindParam(':kd_karyawan', $this->kd_karyawan);
		$stmt->bindParam(':tipe_admin', $this->tipe_admin);
		$stmt->bindParam(':username', $this->username);
		$stmt->bindParam(':password', $this->password);
		$stmt->bindParam(':status', $this->status);
		$stmt->bindParam(':tgl_buat', $this->tgl_buat);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	function cekUserNameAdmin() {
		$query = "SELECT
					*
				FROM
					" . $this->nm_tabel . "
				WHERE
					username = ?
				";
				
		$stmt = $this->koneksi->prepare($query);
		
		$stmt->bindParam(1, $this->username);
		
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$num = $stmt->rowCount();
		
		return $num;
	}
	
	function cekUsernameId() {
		$query = "SELECT
					*
				FROM
					" . $this->nm_tabel . "
				WHERE
					kd_admin != ?
				AND
					username = ?
				";
				
		$stmt = $this->koneksi->prepare($query);
		
		$stmt->bindParam(1, $this->kd_admin);
		$stmt->bindParam(2, $this->username);
		
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$num = $stmt->rowCount();
		
		return $num;
	}
	
	function actDeleteAdmin() {
		$query = "DELETE FROM
					" . $this->nm_tabel . "
				WHERE
					kd_admin = :kd_admin
				";
				
		$stmt = $this->koneksi->prepare($query);
		
		$stmt->bindParam(':kd_admin', $this->kd_admin);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	function actEditAdmin() {
		$query = "UPDATE
					" . $this->nm_tabel . "
				SET
					kd_karyawan = :kd_karyawan,
					tipe_admin = :tipe_admin,
					status = :status,
					tgl_edit = :tgl_edit
				WHERE
					kd_admin = :kd_admin
				";
				
		$stmt = $this->koneksi->prepare($query);
		
		$stmt->bindParam(':kd_admin', $this->kd_admin);
		$stmt->bindParam(':kd_karyawan', $this->kd_karyawan);
		$stmt->bindParam(':tipe_admin', $this->tipe_admin);
		$stmt->bindParam(':status', $this->status);
		$stmt->bindParam(':tgl_edit', $this->tgl_edit);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	function actEditUsername() {
		$query = "UPDATE
					" . $this->nm_tabel . "
				SET
					username = :username
				WHERE
					kd_admin = :kd_admin
				";
				
		$stmt = $this->koneksi->prepare($query);
		
		$stmt->bindParam(':kd_admin', $this->kd_admin);
		$stmt->bindParam(':username', $this->username);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	function actEditPassword() {
		$query = "UPDATE
					" . $this->nm_tabel . "
				SET
					password = :password
				WHERE
					kd_admin = :kd_admin
				";
				
		$stmt = $this->koneksi->prepare($query);
		
		$stmt->bindParam(':kd_admin', $this->kd_admin);
		$stmt->bindParam(':password', $this->password);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}