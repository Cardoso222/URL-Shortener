<!DOCTYPE html>
<html>
<head>
	<title>URL - Shortener</title>
	<script src="../js/jquery.1.12.0.min.js"></script>
</head>
<body>

	<input type="text" maxlength="255" id="url">
	<input type="radio" name="handle" id="handle" value="decode" > Decode 
	<input type="radio" name="handle" id="handle" value="encode"> Encode 
	<br><input id="button" type="submit" value="go">
	<div id="div1"></div>
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
			success: function(result){
				$("#div1").html(result);
			}});
	}); 
</script>