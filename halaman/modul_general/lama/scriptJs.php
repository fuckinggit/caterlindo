<script>
$(document).ready(function(){
	lihatData();
	$('#idImgLoader').show();
	$("#idDivFile").hide();
});

var croppicHeaderOptions = {
	//uploadUrl:'img_save_to_file.php',
	cropData:{
		"dummyData":1,
		"dummyData2":"asdas"
	},
	cropUrl:'halaman/modul_general/cropImg.php',
	outputUrlId:'cropOutput',
	modal:false,
	processInline:true,
	loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
	onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
	onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
	onImgDrag: function(){ console.log('onImgDrag') },
	onImgZoom: function(){ console.log('onImgZoom') },
	onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
	onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
	onReset:function(){ console.log('onReset') },
	onError:function(errormessage){ console.log('onError:'+errormessage) }
}	
var croppic = new Croppic('croppic', croppicHeaderOptions);

function reset() {
	document.getElementById("idNama<?php echo $var; ?>").value = '';
	document.getElementById("idTipe<?php echo $var; ?>").value = '';
	document.getElementById("idTglMulai<?php echo $var; ?>").value = '';
	document.getElementById("idTglAkhir<?php echo $var; ?>").value = '';
	document.getElementById("idStatus<?php echo $var; ?>").value = '';
	document.getElementById("idReminder<?php echo $var; ?>").value = '';
	//document.getElementById("idAttach<?php echo $var; ?>").value = '';
}

function removeAtt() {
	document.getElementById("idNama<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idTipe<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idTglMulai<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idTglAkhir<?php echo $var; ?>").removeAttribute("required");
	document.getElementById("idStatus<?php echo $var; ?>").removeAttribute("required");
}

function alertForm(data) {
	setTimeout(function(){
		$('#idAlert<?php echo $var; ?>').html(data).fadeOut(5000);
	}, 1000);
}

function showReminder(status) {
	if (status == '0') {
		$('#idFormReminder').slideUp();
	} if (status == '1') {
		$('#idFormReminder').slideDown();
	} else {
		$('#idFormReminder').slideUp();
	}
}

$(document).on('click', '#btnTambah<?php echo $var; ?>', function(){
	$('#form<?php echo $var; ?>').slideUp();
	$("#idDivFile").fadeOut();
	reset();
	document.getElementsByTagName("form")[0].setAttribute("id", "formInput<?php echo $var; ?>");
	$('#form<?php echo $var; ?>').fadeIn(1000);
	$('#btnTambah<?php echo $var; ?>').hide();
	$('#bacaData<?php echo $var; ?>').hide();
});

function hideForm() {
	// Fungsi Paten
	reset();
	$('#form<?php echo $var; ?>').slideUp();
	$('#btnTambah<?php echo $var; ?>').fadeIn(1000);
	$('#bacaData<?php echo $var; ?>').fadeIn(1000);
	removeAtt();
}

function lihatData(){
    $('#tabelData<?php echo $var; ?>').fadeOut('slow', function(){
		$.ajax({
			type: 'POST',
			url: '<?php echo $uri; ?>read.php',
			data: 'act=lihat&id=<?php echo $_GET['id']; ?>&'+$("#form<?php echo $var; ?>").serialize(),
			success:function(html){
				$('#tabelData<?php echo $var; ?>').html(html);
			}
		});
		$('#idImgLoader').hide();
		$('#tabelData<?php echo $var; ?>').fadeIn('slow');
    });
}

function urlExists(url) {
    var http = new XMLHttpRequest();
    http.open('HEAD', url);
    http.send();
    return http.status!=404;
}

$(document).on('submit', '#formInput<?php echo $var; ?>', function() {
	$('#idImgLoader').show();
    $.post("<?php echo $uri; ?>input.php", $(this).serialize())
        .done(function(data) {
			reset();
            $('#form<?php echo $var; ?>').slideUp(500, 'swing');
			$('#idAlert<?php echo $var; ?>').html(data).fadeOut(5000);
            $('#bacaData<?php echo $var; ?>').show();
			$('#btnTambah<?php echo $var; ?>').fadeIn(1000);
			lihatData();
        });
             
    return false;
});

function editForm(id){
	document.getElementsByTagName("form")[0].setAttribute("id", "formEdit<?php echo $var; ?>");
    $.ajax({
        type: 'POST',
        dataType:'JSON',
        url: '<?php echo $uri; ?>read.php',
        data: 'act=edit&id='+id,
        success:function(data){
			$('#form<?php echo $var; ?>').slideUp(500, 'swing');
            $('#form<?php echo $var; ?>').slideDown(500);
			
            $('#idKdGeneral<?php echo $var; ?>').val(data.kd_general);
            $('#idNama<?php echo $var; ?>').val(data.nm_general);
            $('#idTipe<?php echo $var; ?>').val(data.tipe);
            $('#idTglMulai<?php echo $var; ?>').val(data.tgl_mulai);
            $('#idTglAkhir<?php echo $var; ?>').val(data.tgl_akhir);
            $('#idStatus<?php echo $var; ?>').val(data.status);
            $('#cropOutput').val(data.attachment);
			$("#idDivFile").show();
			if (data.attachment != '') {
				$("#idFileAttachment").attr("src", "assets/img/general_affair/"+data.attachment);
			} if (urlExists("assets/img/general_affair/"+data.attachment) && data.attachment == '') {
				$("#idFileAttachment").attr("src", "assets/img/js/croppic/assets/img/placeholder.png");
			}
			
			if (data.status == '1') {
				$('#idFormReminder').show();
				$('#idReminder<?php echo $var; ?>').val(data.tgl_reminder);
			}
        }
    });
}

$(document).on('submit', '#formEdit<?php echo $var; ?>', function() {
    $.post("<?php echo $uri; ?>edit.php", $(this).serialize())
        .done(function(data) {
			reset();
			$('#form<?php echo $var; ?>').slideUp(500, 'swing');
			$('#idAlert<?php echo $var; ?>').html(data).fadeOut(5000);
            $('#bacaData<?php echo $var; ?>').show();
			$('#btnTambah<?php echo $var; ?>').fadeIn(1000);
			lihatData();
        });
    return false;
});

function hapusData(act,id) {
	$.post("<?php echo $uri; ?>read.php", { id: id, act: act })
		.done(function(data){
			$('#idAlert<?php echo $var; ?>').html(data).fadeOut(5000);
			$('#bacaData<?php echo $var; ?>').show();
			lihatData();
		});
}
</script>