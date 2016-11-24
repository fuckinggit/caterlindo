<script>
$(document).ready(function(){
	lihatData();
	$('#idImgLoader').show();
});

function lihatData(){
    $('#tabelData<?php echo $var; ?>').fadeOut('slow', function(){
		$.ajax({
			type: 'POST',
			url: '<?php echo $uri; ?>act.php',
			data: 'act=lihat&id=<?php echo $_SESSION['kd_karyawan']; ?>',
			success:function(html){
				$('#tabelData<?php echo $var; ?>').html(html);
			}
		});
		$('#idImgLoader').hide();
		$('#tabelData<?php echo $var; ?>').fadeIn('slow');
    });
}
</script>