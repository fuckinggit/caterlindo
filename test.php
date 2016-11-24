<?php

include "config/database.php";

	$S_acc = "select * from PersonalLog";
	//print_r($S_acc);
	$get_acc = $dbacc->query($S_acc);
			while($dt_acc = $get_acc->fetch()){
				$data_acc.=	"<hr />
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
			
			if($query){
				echo '<script language="javascript">';
				echo 'alert("Successful!")';
				echo '</script>';
				echo '<script language="javascript">';
				echo 'window.close();';
				echo 'window.opener.location.reload(true);';
				echo '</script>';
			}
				else {
				echo '<script language="javascript">';
				echo 'alert("Problem with database or something!")';
				echo '</script>'; 
			}
			
			
		}
	}
	
	$no=0;
	$S_sql = "select * from tab_absensi";
		$get_sql = $dbsql->query($S_sql);
			while($dt_sql = $get_sql->fetch()){
				$no++;
				$data_sql.=	"<tbody>
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
							 </tbody>
							";
			}
	
	
?>
<hr>
<h3>data pada access :</h3>
<hr>
<form action='' method='POST'>
	<div style="border: 1px solid #CCC; margin: 10px 0px; padding: 10px; width: auto; height: auto; background-color: #8a9ac5; text-align: left;">
	<?php echo $data_acc;?></div><hr>
	<html>
<head>
<style>
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
table { 
  width: 100%; 
  border-collapse: collapse; 
}
/* Zebra striping */
tr:nth-of-type(odd) { 
  background: #eee; 
}
th { 
  background: #333; 
  color: white; 
  font-weight: bold; 
}
td, th { 
  padding: 6px; 
  border: 1px solid #ccc; 
  text-align: left; 
}
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
	
	/*
	Label the data
	*/
	td:nth-of-type(1):before { content: "NO"; }
	td:nth-of-type(2):before { content: "PersonalLogID"; }
	td:nth-of-type(3):before { content: "TerminalID"; }
	td:nth-of-type(4):before { content: "FingerPrintID"; }
	td:nth-of-type(5):before { content: "DateLog"; }
	td:nth-of-type(6):before { content: "TimeLog"; }
	td:nth-of-type(7):before { content: "VerifyMode"; }
	td:nth-of-type(8):before { content: "FunctionKey"; }
	td:nth-of-type(9):before { content: "Edited"; }
	td:nth-of-type(10):before { content: "UserName"; }
	td:nth-of-type(11):before { content: "FlagAbsence"; }
	td:nth-of-type(12):before { content: "DateTime"; }
	td:nth-of-type(13):before { content: "EmployeeStatus"; }
	td:nth-of-type(14):before { content: "FunctionKeyEdited"; }
	td:nth-of-type(15):before { content: "PersonalLogStatus"; }
}

</style>
</head>
<body>
<input type='submit' name='save' value='save' class="button">

	
</form>
<div id="page-wrap">
<hr>
<h3>data pada sql :</h3>
<table>
<thead>
	<tr>
		<th>NO</th>
		<th>PersonalLogID</th>
		<th>TerminalID</th>
		<th>FingerPrintID</th>
		<th>DateLog</th>
		<th>TimeLog</th>
		<th>VerifyMode</th>
		<th>FunctionKey</th>
		<th>Edited</th>
		<th>UserName</th>
		<th>FlagAbsence</th>
		<th>DateTime</th>
		<th>EmployeeStatus</th>
		<th>FunctionKeyEdited</th>
		<th>PersonalLogStatus</th>
	</tr>
</thead>
<?php echo $data_sql;?>

</table>
</body>
</html>
<hr>			
 <script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }
   </script>
