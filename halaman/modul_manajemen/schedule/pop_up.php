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
	
	
?>
<hr>
data pada access :
<hr>
<form action='' method='POST'>
	<?php echo $data_acc;?> <hr>
	<input type='submit' name='save' value='save'>
</form>
<hr>
			
	


			
	
	
	
