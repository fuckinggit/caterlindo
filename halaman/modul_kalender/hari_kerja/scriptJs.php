<script>
$(document).ready(function(){
	var id = '1';
	editForm(id);
	$('#idImgLoader').show();
	$('#idBtnSimpan').hide();
	$('#btnClose').hide();
});

function alertForm(data) {
	setTimeout(function(){
		$('#idAlert<?php echo $var; ?>').html(data).fadeOut(5000);
	}, 1000);
}

function removeAtt() {
	<?php
	$komponens = $crud->read('tb_hari_kerja');
	if (!empty($komponens)) {
		foreach($komponens as $komponen) {
			extract($komponen);
			?>
			document.getElementById("id<?php echo ucfirst($nm_hari).$var; ?>").removeAttribute("disabled");
			<?php
		}
	}
	?>
}

function setAtt() {
	<?php
	$komponens = $crud->read('tb_hari_kerja');
	if (!empty($komponens)) {
		foreach($komponens as $komponen) {
			extract($komponen);
			?>
			document.getElementById("id<?php echo ucfirst($nm_hari).$var; ?>").setAttribute("disabled", "disabled");
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

$(document).on('submit', '#formInput<?php echo $var; ?>', function() {
	$('#idImgLoader').show();
    $.post("<?php echo $uri; ?>input.php", $(this).serialize())
        .done(function(data) {
			setAtt();
			$('#idBtnUbah').slideDown();
			$('#idBtnSimpan').hide();
			$('#btnClose').slideUp();
			$('#idAlert<?php echo $var; ?>').html(data).fadeOut(5000);
        });
             
    return false;
});

function editForm(id){
    $.ajax({
        type: 'POST',
        dataType:'JSON',
        url: '<?php echo $uri; ?>read.php',
        data: 'act=edit&id='+id,
        success:function(data){
			<?php
			$no = 0;
			$komponens = $crud->read('tb_hari_kerja');
			if (!empty($komponens)) {
				foreach($komponens as $komponen) {
					extract($komponen);
					?>
					$('#id<?php echo ucfirst($nm_hari).$var; ?>').val(data.jm_kerja[<?php echo $no; ?>]);
					<?php
					$no++;
				}
			}
			?>
        }
    });
}
</script>