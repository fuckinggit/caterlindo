<?php
class Setting {
	private $koneksi;
	private $nm_tabel = "tb_setting";
	
	public $id_setting;
	public $nm_setting;
	public $setting;
	
	public function __construct($db) {
		$this->koneksi = $db;
	}
	
	function ambilSetting() {
		$query = "SELECT
					*
				FROM
					" . $this->nm_tabel . "
				WHERE
					nm_setting = ?
				";
		
		$stmt = $this->koneksi->prepare($query);
		
		$stmt->bindParam(1, $this->nm_setting);
		
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->setting = $row['setting'];
		 
		return $stmt;
	}
	
	function ubahSetting() {
		$query = "UPDATE
					" . $this->nm_tabel . "
				SET
					setting = ?
				WHERE
					nm_setting = ?
				";
		
		$stmt = $this->koneksi->prepare($query);
		
		$stmt->bindParam(1, $this->setting);
		$stmt->bindParam(2, $this->nm_setting);
		
		$stmt->execute();
		
		return $stmt;
	}
	
	function delUnusedImg() {
		
		$karyawan_fotos = glob("assets/img/karyawan/*.*");
		$p_karyawan = strlen("assets/img/karyawan/");
		
		$general_fotos = glob("assets/img/general_affair/*.*");
		$p_general = strlen("assets/img/general_affair/");
		
		foreach ($karyawan_fotos as $karyawan_foto) {
			$foto = substr($karyawan_foto, $p_karyawan);
			
			$query = "SELECT pas_foto FROM tb_karyawan WHERE pas_foto = '$foto'";
			
			$stmt = $this->koneksi->prepare($query);
			
			$stmt->execute();
			
			$num = $stmt->rowCount();
			
			if ($num == 0) {
				unlink($karyawan_foto);
			}
		}
		
		foreach ($general_fotos as $general_foto) {
			$foto = substr($general_foto, $p_general);
			
			$query = "SELECT attachment FROM tb_general_affair WHERE attachment = '$foto'";
			
			$stmt = $this->koneksi->prepare($query);
			
			$stmt->execute();
			
			$num = $stmt->rowCount();
			
			if ($num == 0) {
				unlink($general_foto);
			}
		}
	}
	
	function setReminder() {
		$query = "UPDATE
					tb_general_affair
				SET
					status_reminder = ?
				WHERE
					kd_general = ?
				";
		
		$stmt = $this->koneksi->prepare($query);
		$stmt->bindParam(1, $this->nm_setting);
		$stmt->bindParam(2, $this->id_setting);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}