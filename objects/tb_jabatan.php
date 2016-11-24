<?php
class Jabatan{
	private $koneksi;
	private $nm_tabel = "tb_jabatan";

	public $id;
	public $kd_jabatan;
	public $nm_jabatan;
	public $deskripsi;
	public $spesifikasi;
	public $catatan;

	public function __construct($db){
		$this->koneksi = $db;
	}

	function data_jabatan(){
		$query = "SELECT * FROM ".$this->nm_tabel."";
		$hasil = $this->koneksi->prepare($query);
		$hasil->execute();
		return $hasil;
	}
	
	function buatKode() {
			$query = "SELECT
						max(id),
						max(kd_jabatan) 
					AS
						IDMax
					FROM
						" . $this->nm_tabel . "";
			
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
			
			$kd_jabatan = "JBT".$hari.$bln.$thn.str_pad($angka, 6, '000', STR_PAD_LEFT);
			
			return $kd_jabatan;
	}
	
	function insert(){
		$query = "INSERT INTO ".$this->nm_tabel."
				  SET kd_jabatan = ?,
					  nm_jabatan = ?,
					  deskripsi  = ?,
					  spesifikasi = ?,
					  catatan = ?";
		$hasil = $this->koneksi->prepare($query);
		$hasil->bindParam(1,htmlspecialchars($this->kd_jabatan));
		$hasil->bindParam(2,htmlspecialchars($this->nm_jabatan));
		$hasil->bindParam(3,htmlspecialchars($this->deskripsi));
		$hasil->bindParam(4,htmlspecialchars($this->spesifikasi));
		$hasil->bindParam(5,htmlspecialchars($this->catatan));
		if ($hasil->execute()) {
			return true;
		}else{
			return false;
		}

	}

	function Delete(){
		$query = "DELETE FROM ".$this->nm_tabel." WHERE kd_jabatan = ?";
		$hasil = $this->koneksi->prepare($query);
		$hasil->bindParam(1,htmlspecialchars($this->kd_jabatan));
		if ($hasil->execute()) {
			return true;
		} else{
			return false;
		}
	}

	function Detail(){
		$query = "SELECT * FROM " . $this->nm_tabel . " where kd_jabatan = ?";
		$hasil = $this->koneksi->prepare($query);
		$hasil->bindParam(1, $this->kd_jabatan);
		$hasil->execute();
		$row = $hasil->fetch(PDO::FETCH_ASSOC);
		$this->kd_jabatan = $row['kd_jabatan'];
		$this->nm_jabatan = $row['nm_jabatan'];
		$this->deskripsi = $row['deskripsi'];
		$this->spesifikasi = $row['spesifikasi'];
		$this->catatan = $row['catatan'];
		return $hasil;
	}

	function Edit(){
		$query = "UPDATE ".$this->nm_tabel." SET nm_jabatan=?,deskripsi=?,spesifikasi=?,catatan=? where kd_jabatan=?";
		$hasil = $this->koneksi->prepare($query);
		$hasil->bindParam(1,htmlspecialchars($this->nm_jabatan));
		$hasil->bindParam(2,htmlspecialchars($this->deskripsi));
		$hasil->bindParam(3,htmlspecialchars($this->spesifikasi));
		$hasil->bindParam(4,htmlspecialchars($this->catatan));
		$hasil->bindParam(5,htmlspecialchars($this->kd_jabatan));
		if ($hasil->execute()) {
			return true;
		} else{
			return false;
		}
	}

}