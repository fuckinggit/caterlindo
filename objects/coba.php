<?php
function read($nm_tabel,$conditions = array()){
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
	}
	
	if(array_key_exists("where_between",$conditions) && !array_key_exists("where",$conditions) && !array_key_exists("where_not",$conditions)){
		$sql .= ' WHERE (';
		$i = 0;
		foreach($conditions['where_between'] as $key => $values){
			$sql .= "'".$key."' BETWEEN ";
			foreach($values as $value) {
				$pre = ($i > 0)?' AND ':'';
				$sql .= $pre.$value;
				$i++;
			}
			$sql .= ")";
		}
	}
	
	if(array_key_exists("where_like", $conditions)) {
		$sql .= ' WHERE ';
		$i = 0;
		foreach($conditions['where_like'] as $key => $values) {
			$pre = ($i > 0)?' AND ':'';
			$sql .= $pre.$key." LIKE '".$values."'";
			$i++;
		}
	}
	
	if(array_key_exists("order_by",$conditions)){
		$sql .= ' ORDER BY '.$conditions['order_by']; 
	}
	
	if(array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
		$sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit']; 
	}elseif(!array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
		$sql .= ' LIMIT '.$conditions['limit']; 
	}
	
	//$query = $db->prepare($sql);
	//$query->execute();
	
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
		/*if($query->rowCount() > 0){
			$data = $query->fetchAll();
		}*/
	}
	//return !empty($data)?$data:false;
	return $sql;
}

echo read('tb_karyawan', array('where_like' => array('nik_karyawan' => '089')));