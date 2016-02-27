<?php 

function getEncodedUrl(){
	if( isset($_POST['url']) & !empty($_POST['url']) ) {
		$urlEncoded = trim(strip_tags( $_POST['url'] ));
		return $urlEncoded;
	}else{
		die('URL INVÁLIDA');	
	}
}

function getDecodedUrl($urlEncoded){

	$query = "SELECT * FROM urls WHERE shortURL = '$urlEncoded'";
	$connection = new PDO("mysql:host=localhost;dbname=shortener", "root", ""); 
	$statement = $connection->query($query);
	while ($object = $statement->fetch(PDO::FETCH_OBJ)) {
		//check the number of rows with rowcount or something like that
		return $object->clientURL;
	}
}

//store new request
function setRequest($urlEncoded){

	$query = "UPDATE urls SET requests = requests + 1 WHERE shortURL = '$urlEncoded'";
	$connection = new PDO("mysql:host=localhost;dbname=shortener", "root", ""); 
	$statement = $connection->query($query);
}


$urlEncoded = getEncodedUrl();
setRequest($urlEncoded);	
echo getDecodedUrl($urlEncoded);