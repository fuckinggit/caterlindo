<script>
$(document).ready(function(){
	$('#btnUbah').hide(); 
});

function readonly() {
	var i;
	for (i = 0; i < 5; i++){
	document.getElementById("Id"+i).readOnly = true;
	}
} 
 
function alertForm(data) {
	setTimeout(function(){
		$('#idAlert').html(data).fadeOut(5000);
	}, 1000);
}

 function lihatData(){
    $('#tabelData').fadeOut('slow', function(){
		$.ajax({
			type: 'POST',
			url: '<?php echo $uri; ?>read.php',
			data: 'act=lihat&id=<?php echo $_GET['id']; ?>&'+$("#form").serialize(),
			success:function(html){
				$('#tabelData').html(html);
			}
		});
		$('#idImgLoader').hide();
		$('#tabelData').fadeIn('slow');
    });
}

$(document).on('submit', '#formInput', function() {
	$('#idImgLoader').show();
    $.post("<?php echo $uri; ?>input.php", $(this).serialize())
        .done(function(data) {
			reset();
            $('#form').slideUp(500, 'swing');
			$('#idAlert').html(data).fadeOut(5000);
            $('#bacaData').show();
			$('#btnTambah').fadeIn(1000);
			lihatData();
        });
             
    return false;
});

$(document).on('submit', '#formEdit', function() {
    $.post("<?php echo $uri; ?>edit.php", $(this).serialize())
        .done(function(data) {
			$('#idAlert').html(data).fadeOut(5000);
        });
    return false;
});

</script>