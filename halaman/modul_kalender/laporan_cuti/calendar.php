<?php
include_once '../../../config/koneksi.php';
include_once '../../../objects/class.crud.php';
include_once '../../../config/oop.fungsi.php';

$database = new Database();
$db = $database->getKoneksi();

$crud = new Crud($db);

function days_in_month($month, $year) {
	if($month!=2) {
		if($month==4||$month==6||$month==9||$month==11)
			return 30;
		else
			return 31;
	}
	else
		return $year%4==""&&$year%100!="" ? 29 : 28;
}
 
global $bulan;
$bulan = array(1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember');
$hari = array(1 => 'Senin', 2 => 'Selasa', 3 => 'Rabu', 4 => 'Kamis', 5 => 'Jumat', 6 => 'Sabtu', 7 => 'Minggu');

/* function hariLibur($v){
	if ($v === "2"){
		return "Fido";
	}
	return $v;
} */

function render_calendar($this_year) {
	$database = new Database();
	$db = $database->getKoneksi();
	$crud = new Crud($db);
	
	if($this_year==null)
		$this_year = date('Y');
	$day_of_the_month = date('N', strtotime('1 January '.$this_year));
	for($i=1;$i<=12;$i++) {
		if($i == date('m')){$lihat = ''; $cur = 'current';} else {$lihat = 'style="display:none;"'; $cur = '';}
		if($i == 1){$awal = 'first';} else {$awal='';}
		if($i == 12){$akhir = 'last';} else {$akhir='';}
		echo "<div class='".$awal."".$akhir."".$cur."' ".$lihat."><table class='table table-bordered' id='idTableCalendar'>
			<h2>
				".$GLOBALS['bulan'][$i]."-".$this_year."
			</h2>
			<thead>
				<tr>
					<th>Senin</th>
					<th>Selasa</th>
					<th>Rabu</th>
					<th>Kamis</th>
					<th>Jum'at</th>
					<th>Sabtu</th>
					<th>Minggu</th>
				</tr>
			</thead>
			<tbody>
				<tr>";
		for($n=1;$n<$day_of_the_month;$n++)
			echo "<td></td>\n";
		$days = days_in_month($i, $this_year);
		$day = 0;
		while($day<$days) {
			if($day_of_the_month==8) {
				echo ($day == 0 ? "" : "</tr>\n") . "<tr>\n";
				$day_of_the_month = 1;
			}
			if(strlen(($day+1)) < 2) {$dHari='0'.($day+1);} else {$dHari = ($day+1);}
			// Tanda untuk hari sekarang
			if ($i == date('m') && ($day+1) == date('d') && $this_year == date('Y')) {$mDay = 'background-color:#a1a1f5;';} else {$mDay = '';}
			
			// Tanda untuk hari kerja
			$stmHKerja['where'] = array('id' => $day_of_the_month);
			$stmHKerja['return_type'] = 'single';
			$rHKerja = $crud->read('tb_hari_kerja', $stmHKerja);
			if (!empty($rHKerja)) {
				if ($rHKerja['jm_kerja'] == '2') {
					$wDay = 'background-color:#93ff91;';
					$wTitle = 'Libur Kerja';
					$wDis = 'disabled';
				} else {
					if ($rHKerja['jm_kerja'] == '1') {
						$wDay = 'background-color:#f5e200;';
						$wTitle = 'Setengah Hari Kerja';
						$wDis = '';
					} else {
						$wDay = '';
						$wTitle = '';
						$wDis = '';
					}
				}
			}
			
			// Tanda untuk hari libur
			$tgl = $dHari."-".$i."-".$this_year;
			$stmHLibur['where'] = array('tgl_libur' => $tgl);
			$stmHLibur['return_type'] = 'single';
			$rHLibur = $crud->read('tb_hari_libur', $stmHLibur);
			if (!empty($rHLibur)) {
				$hDay = 'background-color:#ff3f3f;';
				$hTitle = $rHLibur['deskripsi'];
				($wDis == '')?$hDis = 'disabled':$hDis = '';
			} else {
				$hDay = '';
				$hTitle = '';
				$hDis = '';
			}
			
			echo "<td style=\"text-align:center; ".$mDay.$wDay.$hDay."\">
					<label class='checkbox-inline' title='".$wTitle.' '.$hTitle."'>
						<input type='checkbox' name='chkHari' value='".$dHari."-".$i."-".$this_year."' ".$wDis.$hDis.">
						" . $dHari . "
					</label>
				</td>\n";
			$day_of_the_month++;
			$day++;
		}
		echo "</tr>
			</tbody>
		</table></div>\n";
	}
}

render_calendar(date('Y'));