<?php 
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

function getEncodedUrl(){
	if( isset($_GET['decode']) ) {
		$urlEncoded = trim(strip_tags( $_GET['decode'] ));
		return $urlEncoded;
	}else{
		die();	
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

//debug stff
$urlEncoded = getEncodedUrl();
setRequest($urlEncoded);	
echo getDecodedUrl($urlEncoded);