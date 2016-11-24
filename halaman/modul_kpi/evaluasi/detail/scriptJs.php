<script>
$(function() {
	var id = '<?php echo $_GET['id']; ?>';
	editForm(id);
	hitungScore(id);
});

function alertForm(data) {
	setTimeout(function(){
		$('#idAlert<?php echo $var; ?>').html(data).fadeOut(5000);
	}, 1000);
}

function editForm(id){
    $.ajax({
        type: 'POST',
        dataType:'JSON',
        url: '<?php echo $uri; ?>act.php',
        data: 'act=edit&id='+id,
        success:function(data){
			<?php
			$no = 0;
			$komponens = $crud->read('tb_kpi');
			if (!empty($komponens)) {
				foreach($komponens as $komponen) {
					extract($komponen);
					?>
					$('#id<?php echo $nm_komponen.$var; ?>').val(data.nilai[<?php echo $no; ?>]);
					<?php
					$no++;
				}
			}
			?>
        }
    });
}

function hitungScore(id) {
	$.ajax({
        type: 'POST',
        dataType:'html',
        url: '<?php echo $uri; ?>act.php',
        data: 'act=hitungScore&id='+id,
        success:function(data){
			$("#idTot<?php echo $var; ?>").val(data);
        }
    });
}

$(document).on('submit', '#formInput<?php echo $var; ?>', function() {
    $.post("<?php echo $uri; ?>act.php?act=input", $(this).serialize())
        .done(function(data) {
			$('#idAlert<?php echo $var; ?>').html(data).fadeOut(5000);
			hitungScore('<?php echo $_GET['id']; ?>');
        });
             
    return false;
});
</script>