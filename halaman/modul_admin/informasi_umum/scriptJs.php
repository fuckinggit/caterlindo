<?php
$cIdProp['where'] = array('id' => '11');
$cIdProp['return_type'] = 'single';
$qIdProp = $crud->read($tbl, $cIdProp);
if (!empty($qIdProp)){$idProp = $qIdProp['nm_info']; $ketProp = $qIdProp['ket'];}

$cIdKota['where'] = array('id' => '12');
$cIdKota['return_type'] = 'single';
$qIdKota = $crud->read($tbl, $cIdKota);
if (!empty($qIdKota)){$idKota = $qIdKota['nm_info']; $ketKota = $qIdKota['ket'];}
?>
<script>
$(document).ready(function(){
	editForm();
	pilihKota(<?php echo $ketProp.','.$ketKota; ?>);
	$('#idBtnSimpan').hide();
	$('#btnClose').hide();
});

function removeAtt() {
	<?php
	$komponens = $crud->read($tbl);
	if (!empty($komponens)) {
		foreach($komponens as $komponen) {
			extract($komponen);
			?>
			document.getElementById("idKd<?php echo $nm_info.$var; ?>").removeAttribute("disabled");
			document.getElementById("id<?php echo $nm_info.$var; ?>").removeAttribute("disabled");
			<?php
		}
	}
	?>
}

function setAtt() {
	<?php
	$komponens = $crud->read($tbl);
	if (!empty($komponens)) {
		foreach($komponens as $komponen) {
			extract($komponen);
			?>
			document.getElementById("id<?php echo $nm_info.$var; ?>").setAttribute("disabled", "disabled");
			<?php
		}
	}
	?>
}

$(document).on('click', '#idBtnUbah', function(){
	removeAtt();
	$('#idBtnUbah').hide();
	$('#idBtnSimpan').slideDown();
	$('#btnClose').slideDown();
});

$(document).on('click', '#btnClose', function(){
	setAtt();
	$('#idBtnUbah').slideDown();
	$('#idBtnSimpan').hide();
	$('#btnClose').slideUp();
});

$(document).on('change', '#id<?php echo $idProp.$var; ?>', function(){
	var kd_prop = document.getElementById("id<?php echo $idProp.$var; ?>").value;
	pilihKota(kd_prop);
});

function pilihKota(kd_provinsi, kd_kota){
	$.ajax({
		type: "POST",
		dataType: "html",
		url: "config/selectKotaProvinsi.php",
		data: "selProvinsi="+kd_provinsi+"&selKota="+kd_kota,
		success: function(msg){
			if(msg == ''){
				document.getElementById("id<?php echo $idKota.$var; ?>").innerHTML='<option value="">-- Kota --</option>';
			}
			else{
				document.getElementById("id<?php echo $idKota.$var; ?>").innerHTML=msg;
			}
		}
	});
};

$(document).on('submit', '#formInput<?php echo $var; ?>', function() {
    $.post("<?php echo $uri; ?>act.php?act=input", $(this).serialize())
        .done(function(data) {
			setAtt();
			$('#idBtnUbah').slideDown();
			$('#idBtnSimpan').hide();
			$('#btnClose').slideUp();
			$('#idAlert<?php echo $var; ?>').html(data);
        });
             
    return false;
});

function editForm(){
    $.ajax({
        type: 'POST',
        dataType:'JSON',
        url: '<?php echo $uri; ?>act.php',
        data: 'act=edit',
        success:function(data){
			<?php
			$no = 0;
			$komponens = $crud->read($tbl);
			if (!empty($komponens)) {
				foreach($komponens as $komponen) {
					extract($komponen);
					?>
					$('#idKd<?php echo $nm_info.$var; ?>').val(data.kode[<?php echo $no; ?>]);
					$('#id<?php echo $nm_info.$var; ?>').val(data.nilai[<?php echo $no; ?>]);
					<?php
					$no++;
				}
			}
			?>
        }
    });
}
</script>