<?php

include "config/database.php";

	$S_acc = "select * from PersonalLog";
	//print_r($S_acc);
	$get_acc = $dbacc->query($S_acc);
			while($dt_acc = $get_acc->fetch()){
				$data_acc.=	"
								<input type='text' name='TerminalID[$dt_acc[PersonalLogID]]' value='$dt_acc[TerminalID]'>
								<input type='text' name='FingerPrintID[$dt_acc[PersonalLogID]]' value='$dt_acc[FingerPrintID]'>
								<input type='text' name='DateLog[$dt_acc[PersonalLogID]]' value='$dt_acc[DateLog]'>
								<input type='text' name='TimeLog[$dt_acc[PersonalLogID]]' value='$dt_acc[TimeLog]'>
								<input type='text' name='VerifyMode[$dt_acc[PersonalLogID]]' value='$dt_acc[VerifyMode]'><br />
								<br /><input type='text' name='FunctionKey[$dt_acc[PersonalLogID]]' value='$dt_acc[FunctionKey]'>
								<input type='text' name='Edited[$dt_acc[PersonalLogID]]' value='$dt_acc[Edited]'>
								<input type='text' name='UserName[$dt_acc[PersonalLogID]]' value='$dt_acc[UserName]'>
								<input type='text' name='FlagAbsence[$dt_acc[PersonalLogID]]' value='$dt_acc[FlagAbsence]'><br />
								<br /><input type='text' name='DateTime[$dt_acc[PersonalLogID]]' value='$dt_acc[DateTime]'>
								<input type='text' name='EmployeeStatus[$dt_acc[PersonalLogID]]' value='$dt_acc[EmployeeStatus]'>
								<input type='text' name='FunctionKeyEdited[$dt_acc[PersonalLogID]]' value='$dt_acc[FunctionKeyEdited]'>
								<input type='text' name='PersonalLogStatus[$dt_acc[PersonalLogID]]' value='$dt_acc[PersonalLogStatus]'><br />
								<input type='hidden' name='PersonalLogID[]' value='$dt_acc[PersonalLogID]'><br>
								
							";
			}
			
		if($_REQUEST['save']!=''){
		$terminal= $_REQUEST['TerminalID'];
		$finger= $_REQUEST['FingerPrintID'];
		$date= $_REQUEST['DateLog'];
		$time= $_REQUEST['TimeLog'];
		$verify= $_REQUEST['VerifyMode'];
		$key= $_REQUEST['FunctionKey'];
		$edit= $_REQUEST['Edited'];
		$username= $_REQUEST['UserName'];
		$flash	 = $_REQUEST['FlagAbsence'];
		$datetime	 = $_REQUEST['DateTime'];
		$status	 = $_REQUEST['EmployeeStatus'];
		$function	 = $_REQUEST['FunctionKeyEdited'];
		$log	 = $_REQUEST['PersonalLogStatus'];
		$personal= $_REQUEST['PersonalLogID'];
		
		$jml=count($personal);
		for($n=0;$n<$jml;$n++){
			$personalne	 =$personal[$n];
			$terminalne	 =$terminal[$personalne];
			$fingerne	 =$finger[$personalne];
			$datene	 	 =$date[$personalne];
			$timene	 	 =$time[$personalne];
			$verifyne	 =$verify[$personalne];
			$keyne	 	 =$key[$personalne];
			$editne	 	 =$edit[$personalne];
			$userne	 	 =$username[$personalne];
			$flashne	 =$flash[$personalne];
			$datetimene	 =$datetime[$personalne];
			$statusne	 =$status[$personalne];
			$functionne	 =$function[$personalne];
			$logne	 	 =$log[$personalne];
			//echo "$namane ";
			$query = $dbsql -> prepare("REPLACE into tab_absensi set PersonalLogID='$personalne',TerminalID='$terminalne',FingerPrintID='$fingerne',DateLog='$datene',TimeLog='$timene',VerifyMode='$verifyne',FunctionKey='$keyne',Edited='$editne', UserName='$userne', FlagAbsence='$flashne', DateTime='$datetimene',EmployeeStatus='$statusne', FunctionKeyEdited='$functionne',PersonalLogStatus='$logne'");
			$query -> execute();
		}
	}
	
	$no=0;
	$S_sql = "select * from tab_absensi";
		$get_sql = $dbsql->query($S_sql);
			while($dt_sql = $get_sql->fetch()){
				$no++;
				$data_sql.=	"
								<tr>
									<td>$no</td>
									<td>$dt_sql[PersonalLogID]</td>
									<td>$dt_sql[TerminalID]</td>
									<td>$dt_sql[FingerPrintID]</td>
									<td>$dt_sql[DateLog]</td>
									<td>$dt_sql[TimeLog]</td>
									<td>$dt_sql[VerifyMode]</td>
									<td>$dt_sql[FunctionKey]</td>
									<td>$dt_sql[Edited]</td>
									<td>$dt_sql[UserName]</td>
									<td>$dt_sql[FlagAbsence]</td>
									<td>$dt_sql[DateTime]</td>
									<td>$dt_sql[EmployeeStatus]</td>
									<td>$dt_sql[FunctionKeyEdited]</td>
									<td>$dt_sql[PersonalLogStatus]</td>
								<tr>
							";
			}
	
	
?>
<hr>
data pada access :
<hr>
<form action='' method='POST'>
	<?php echo $data_acc;?> <hr>
	<input type='submit' name='save' value='save'>
</form>
<hr>
data pada sql :
<table border='1' padding='0' cellspacing='0'>
	<tr>
		<td>NO</td>
		<td>PersonalLogID</td>
		<td>TerminalID</td>
		<td>FingerPrintID</td>
		<td>DateLog</td>
		<td>TimeLog</td>
		<td>VerifyMode</td>
		<td>FunctionKey</td>
		<td>Edited</td>
		<td>UserName</td>
		<td>FlagAbsence</td>
		<td>DateTime</td>
		<td>EmployeeStatus</td>
		<td>FunctionKeyEdited</td>
		<td>PersonalLogStatus</td>
	</tr>
	<?php echo $data_sql;?>
</table>
<hr>			
	
