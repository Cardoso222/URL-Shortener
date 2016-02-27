<?php 
require_once('../models/db.php');

function getEncodedUrl(){
	if( isset($_POST['url']) & !empty($_POST['url']) ) {
		$urlEncoded = trim(strip_tags( $_POST['url'] ));
		return $urlEncoded;
	}else{
		die('Please give one correct url');	
	}
}

function getDecodedUrl($urlEncoded){

	$query = "SELECT * FROM urls WHERE shortURL = '$urlEncoded'";
	$connection = Database::connect(); 
	$statement = $connection->query($query);
	if($statement->rowCount() > 0){
		while ($object = $statement->fetch(PDO::FETCH_OBJ)) {
			return $object->clientURL;
		}
	}else{
		return "can't find this url in our database =/";
	}
}

//store new request
function setRequest($urlEncoded){

	$query = "UPDATE urls SET requests = requests + 1 WHERE shortURL = '$urlEncoded'";
	$connection = Database::connect(); 
	$statement = $connection->query($query);
}


$urlEncoded = getEncodedUrl();
setRequest($urlEncoded);	
echo getDecodedUrl($urlEncoded);
