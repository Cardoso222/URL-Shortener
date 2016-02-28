<!DOCTYPE html>
<html>
<head>
	<title>URL - Shortener</title>
	<script src="../assets/js/jquery.1.12.0.min.js"></script>
</head>
<body>
	<h1>URL - Shortener</h1>		
	<input type="text" maxlength="255" id="url">
	<input type="radio" name="handle" id="handle" value="decode" > Decode 
	<input type="radio" name="handle" id="handle" value="encode"> Encode 
	<input id="button" type="submit" value="go">
	<div id="result" style="margin-top:5%"></div>
	<img src="../assets/img/loading.gif" style="display: none; height: 146px; margin-top: -60px;" id="loadimage">
</body>
</html>

<script type="text/javascript">

	$("#button").click(function(){
		url = $('#url').val();
		handle = $("input[name='handle']:checked").val();
		if(handle == 'encode'){
			var reference = 'URLencoder.php';
		}else{
			reference = 'URLdecoder.php';
		}
		$.ajax({
			url: "../controllers/"+reference, 
			type: 'POST',
			data:{url : url},
			beforeSend: function(){
				$("#result").html('');
				$('#loadimage').css('display','block');
			},
			success: function(result){
				$('#loadimage').css('display','none');
				$("#result").html(JSON.parse(result));
			}});
	}); 
</script>