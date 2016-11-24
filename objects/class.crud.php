<?php
class Crud {
	private $koneksi;
	
	public function __construct($db) {
		$this->koneksi = $db;
	}
	
	public function buatID($nm_tabel, $conditions = array(), $uuid) {
		$sql = 'SELECT ';
        $sql .= array_key_exists("select",$conditions)?$conditions['select']:'*';
        $sql .= ' FROM '.$nm_tabel;
		if(array_key_exists("order_by",$conditions)){
            $sql .= ' ORDER BY '.$conditions['order_by']; 
        }
		
		$stmt = $this->koneksi->prepare($sql);
		
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
		
		$id_otomatis = $uuid.$hari.$bln.$thn.str_pad($angka, 6, '000', STR_PAD_LEFT);
		
		return $id_otomatis;
	}
	
	function autoId($nm_tabel, $conditions = array(), $panjang, $uuid) {
		$sql = 'SELECT ';
		$sql .= array_key_exists("select",$conditions)?$conditions['select']:'*';
		$sql .= ' FROM '.$nm_tabel;
		if(array_key_exists("order_by",$conditions)){
			$sql .= ' ORDER BY '.$conditions['order_by']; 
		}
		
		$stmt = $this->koneksi->prepare($sql);
		
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$num = $stmt->rowCount();
		
		if(array_key_exists('id_tgl', $conditions)){
			foreach($conditions['id_tgl'] as $key => $f_key) {
				if ($key == 'hari') {
					$hari_akhir = substr($row['IDMax'], $f_key[0], $f_key[1]);
				} elseif ($key == 'bulan') {
					$bln_akhir = substr($row['IDMax'], $f_key[0], $f_key[1]);
				} elseif ($key == 'tahun') {
					$thn_akhir = substr($row['IDMax'], $f_key[0], $f_key[1]);
				}
			}
			$hari = date('d');
			$bln = date('m');
			$thn = date('y');
			if ($num > 0 and $hari_akhir == $hari and $bln_akhir == $bln and $thn_akhir == $thn) {
				$IdMax = $row['IDMax'];
				$urutan = (int) substr($IdMax, 9, 6);
			} else {
				$urutan = 0;
			}
			
			$angka = $urutan + 1;
			
			$id_otomatis = $uuid.$hari.$bln.$thn.str_pad($angka, $panjang, '000', STR_PAD_LEFT);
		} else {
			if ($num > 0) {
				$IdMax = $row['IDMax'];
				$urutan = (int) $IdMax;
			} else {
				$urutan = 0;
			}
			
			$angka = $urutan + 1;
			
			$id_otomatis = $uuid.str_pad($angka, $panjang, '000', STR_PAD_LEFT);
		}
		
		return $id_otomatis;
	}
	
	public function create($nm_tabel,$data){
        if(!empty($data) && is_array($data)){
            $columns = '';
            $values  = '';
            $i = 0;
            
			/* if(!array_key_exists('created',$data)){
                $data['created'] = date("Y-m-d H:i:s");
            }
            if(!array_key_exists('modified',$data)){
                $data['modified'] = date("Y-m-d H:i:s");
            } */

            $columnString = implode(',', array_keys($data));
            $valueString = ":".implode(',:', array_keys($data));
            $sql = "INSERT INTO ".$nm_tabel." (".$columnString.") VALUES (".$valueString.")";
            $query = $this->koneksi->prepare($sql);
            foreach($data as $key=>$val){
                 $query->bindValue(':'.$key, $val);
            }
            $insert = $query->execute();
            return $insert?$this->koneksi->lastInsertId():false;
        }else{
            return false;
        }
    }
	
	public function read($nm_tabel,$conditions = array()){
        $sql = 'SELECT ';
        $sql .= array_key_exists("select",$conditions)?$conditions['select']:'*';
        $sql .= ' FROM '.$nm_tabel;
        if(array_key_exists("where",$conditions)){
			$sql .= ' WHERE ';
			$i = 0;
			foreach($conditions['where'] as $key => $value){
				$pre = ($i > 0)?' AND ':'';
				$sql .= $pre.$key." = '".$value."'";
				$i++;
			}
			if (array_key_exists("where_not", $conditions)) {
				foreach($conditions['where_not'] as $key => $value){
					$pre = ($i > 0)?' AND ':'';
					$sql .= $pre.$key." != '".$value."'";
					$i++;
				}
			}
			if(array_key_exists("where_between",$conditions)) {
				$i = 0;
				$n = 0;
				foreach($conditions['where_between'] as $key => $values){
					$prn = ($n >= 0)?' AND ':'';
					$sql .= $prn.'(';
					$sql .= "'".$key."' BETWEEN ";
					$n++;
					foreach($values as $value) {
						$pre = ($i > 0)?' AND ':'';
						$sql .= $pre.$value;
						$i++;
					}
					$sql .= ")";
				}
			}
			if (array_key_exists("where_kolom", $conditions)) {
				foreach($conditions["where_kolom"] as $key => $value) {
					$pre = ($i > 0)?' AND ':'';
					$sql .= $pre.$key." = ".$value;
					$i++;
				}
			}
		}
		
		if(array_key_exists("where_not",$conditions) && !array_key_exists("where",$conditions)){
			$sql .= ' WHERE ';
			$i = 0;
			foreach($conditions['where_not'] as $key => $value){
				$pre = ($i > 0)?' AND ':'';
				$sql .= $pre.$key." != '".$value."'";
				$i++;
			}
			if(array_key_exists("where_between",$conditions)) {
				$i = 0;
				$n = 0;
				foreach($conditions['where_between'] as $key => $values){
					$prn = ($n >= 0)?' AND ':'';
					$sql .= $prn.'(';
					$sql .= "'".$key."' BETWEEN ";
					$n++;
					foreach($values as $value) {
						$pre = ($i > 0)?' AND ':'';
						$sql .= $pre.$value;
						$i++;
					}
					$sql .= ")";
				}
			}
			if (array_key_exists("where_kolom", $conditions)) {
				foreach($conditions["where_kolom"] as $key => $value) {
					$pre = ($i > 0)?' AND ':'';
					$sql .= $pre.$key." = ".$value;
					$i++;
				}
			}
		}
		
		if(array_key_exists("where_between",$conditions) && !array_key_exists("where",$conditions) && !array_key_exists("where_not",$conditions)){
			$sql .= ' WHERE ';
			$i = 0;
			foreach($conditions['where_between'] as $key => $values){
				$sql .= "('".$key."' BETWEEN ";
				foreach($values as $value) {
					$pre = ($i > 0)?' AND ':'';
					$sql .= $pre.$value;
					$i++;
				}
				$sql .= ")";
			}
			if (array_key_exists("where_kolom", $conditions)) {
				foreach($conditions["where_kolom"] as $key => $value) {
					$pre = ($i > 0)?' AND ':'';
					$sql .= $pre.$key." = ".$value;
					$i++;
				}
			}
		}
		
		if(array_key_exists("where_kolom",$conditions) && !array_key_exists("where_between",$conditions) && !array_key_exists("where",$conditions) && !array_key_exists("where_not",$conditions)){
			$sql .= ' WHERE ';
			$i = 0;
			foreach($conditions["where_kolom"] as $key => $value) {
				$pre = ($i > 0)?' AND ':'';
				$sql .= $pre.$key." = ".$value;
				$i++;
			}
		}
		
		/*if(array_key_exists("where_like", $conditions)) {
			$sql .= ' WHERE ';
			$i = 0;
			foreach($conditions['where_like'] as $key => $values) {
				$pre = ($i > 0)?' AND ':'';
				$sql .= $pre.$key." LIKE '%".$values."%'";
				//$exe = $query->execute(array($key => '%'.$values.'%'));
				$i++;
			}
			
		}*/
        
        if(array_key_exists("order_by",$conditions)){
            $sql .= ' ORDER BY '.$conditions['order_by']; 
        }
        
        if(array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
            $sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit']; 
        }elseif(!array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
            $sql .= ' LIMIT '.$conditions['limit']; 
        }
        
        $query = $this->koneksi->prepare($sql);
        $query->execute();
        
        if(array_key_exists("return_type",$conditions) && $conditions['return_type'] != 'all'){
            switch($conditions['return_type']){
                case 'count':
                    $data = $query->rowCount();
                    break;
                case 'single':
                    $data = $query->fetch(PDO::FETCH_ASSOC);
                    break;
                default:
                    $data = '';
            }
        }else{
            if($query->rowCount() > 0){
                $data = $query->fetchAll();
            }
        }
		return !empty($data)?$data:false;
		//return $sql;
    }
	
	public function update($nm_tabel,$data,$conditions){
        if(!empty($data) && is_array($data)){
            $colvalSet = '';
            $whereSql = '';
            $i = 0;
			
            /* if(!array_key_exists('modified',$data)){
                $data['modified'] = date("Y-m-d H:i:s");
            } */
			
            foreach($data as $key=>$val){
                $pre = ($i > 0)?', ':'';
                $colvalSet .= $pre.$key."='".$val."'";
                $i++;
            }
            if(!empty($conditions)&& is_array($conditions)){
                $whereSql .= ' WHERE ';
                $i = 0;
                foreach($conditions as $key => $value){
                    $pre = ($i > 0)?' AND ':'';
                    $whereSql .= $pre.$key." = '".$value."'";
                    $i++;
                }
            }
            $sql = "UPDATE ".$nm_tabel." SET ".$colvalSet.$whereSql;
            $query = $this->koneksi->prepare($sql);
            //$update = $query->execute();
            //return $sql?$query->rowCount():false;
			//return $sql;
			if($query->execute()){
				return true;
			}else{
				return false;
			}
        }else{
            return false;
        }
    }
	
	public function delete($nm_tabel,$conditions){
        $whereSql = '';
        if(!empty($conditions)&& is_array($conditions)){
            $whereSql .= ' WHERE ';
            $i = 0;
            foreach($conditions as $key => $value){
                $pre = ($i > 0)?' AND ':'';
                $whereSql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }
        $sql = "DELETE FROM ".$nm_tabel.$whereSql;
        $delete = $this->koneksi->exec($sql);
        return $delete?$delete:false;
    }
}