<?php
class Database {
 
    // Id login untuk database
    private $host = "localhost";
    private $db_name = "db_caterlindo_hrm";
    private $username = "root";
    private $password = "";
    //private $password = "";
	
	
    public $koneksi;
	
    // Mendapatkan koneksi untuk db
    public function getKoneksi(){
 
        $this->koneksi = null;
 
        try{
            $this->koneksi = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            //echo "Gagal untuk menyambungkan Database : " . $exception->getMessage();
			?>
			<script type="text/javascript">
				alert("Gagal untuk menyambungkan Database : <?php echo $exception->getMessage(); ?>");
			</script>
			<?php
        }
 
        return $this->koneksi;
    }
	
	public function getAcces(){
	$this->koneksi = null;
	$acc = "d:/HITFPTA_dataAbsensi2.mdb";
	if(!file_exists($acc)){
	 die("DB access tidak ditemukan!.");
	}

	$dbacc = new PDO("odbc:DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=".$acc."; Uid=; Pwd=ithITtECH;");
	} 
}