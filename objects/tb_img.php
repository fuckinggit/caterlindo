<?php
class Image {
	//koneksi db dan nama tabel
	private $koneksi;
	private $nm_tabel = "tb_img";
	
	public $id_img;
	public $id_parent;
	public $nm_img;
	
	public function __construct($db) {
		$this->koneksi = $db;
	}
	
	function buatIdImg() {
		$query = "SELECT
					id,
					id_img
				AS
				IDMax
				FROM
					tb_img
				ORDER BY id
				DESC LIMIT 1
				";
		
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
		
		$id_img = "IMG".$hari.$bln.$thn.str_pad($angka, 6, '000', STR_PAD_LEFT);
		
		return $id_img;
	}
	
	function actInputImg() {
		$query = "INSERT INTO
					" . $this->nm_tabel . "
				SET
					id_img = :id_img,
					id_parent = :id_parent,
					nm_img = :nm_img
				";
		
		$stmt = $this->koneksi->prepare($query);
		
		$stmt->bindParam(':id_img', $this->id_img);
		$stmt->bindParam(':id_parent', $this->id_parent);
		$stmt->bindParam(':nm_img', $this->nm_img);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	function dataImage() {
		$query = "SELECT
					*
				FROM
					" . $this->nm_tabel . "
				WHERE
					id_parent = ?
				";
		
		$stmt = $this->koneksi->prepare($query);
		
		$stmt->bindParam(1, $this->id_parent);
		
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->id_img = $row['id_img'];
		$this->id_parent = $row['id_parent'];
		$this->nm_img = $row['nm_img'];
		
		return $stmt;
	}
	
	function actEditImage() {
		$query = "UPDATE
					" . $this->nm_tabel . "
				SET
					nm_img = :nm_img
				WHERE
					id_img = :id_img
				AND
					id_parent = :id_parent
				";
		
		$stmt = $this->koneksi->prepare($query);
		
		$stmt->bindParam(':id_img', $this->id_img);
		$stmt->bindParam(':id_parent', $this->id_parent);
		$stmt->bindParam(':nm_img', $this->nm_img);
		
		$stmt->execute();
		
		return $stmt;
	}
	
	function actDeleteImage() {
		$query = "DELETE FROM
					" . $this->nm_tabel . "
				WHERE
					id_parent = :id_parent
				";
				
		$stmt = $this->koneksi->prepare($query);
		
		$stmt->bindParam(':id_parent', $this->id_parent);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}