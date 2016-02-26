<?php 
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

function getClientUrl(){
	if( isset($_GET['url']) ) {
		$clientURL = trim(strip_tags( $_GET['url'] ));
		return $clientURL;
	}
}

//generate one random token for shortness url
function getRandomToken($size){
	
	$str = 'abcdefghijlmnopkrstuvxzABCDEFGHIJLMNOPQRSTUVXZ';

	$token = ''; 
	for($i=0; $i<$size; $i++){
		$token .= $str[rand(1,46)];
 	}
 	$domain = 'localhost/';
 	$token = $domain.$token;
 	return $token;
}

//store url inside of database
function storeShortUrl($shortURL, $clientURL){

	$query = "INSERT INTO urls (shortURL, clientURL) VALUES ('$shortURL', '$clientURL')";
	$connection = new PDO("mysql:host=localhost;dbname=shortener", "root", ""); 
	$statment = $connection->prepare($query);
	$statment->execute();

}

$clientURL = getClientUrl();	
$shortURL = getRandomToken(5);
echo '<b>URL GERADA :</b>' . $shortURL;
storeShortUrl($shortURL, $clientURL);
