<?php 

function getClientUrl(){
	if( isset($_POST['url']) & !empty($_POST['url']) ) {

		$clientURL = trim(strip_tags( $_POST['url'] ));
		return $clientURL;
	}
	else {
		die("URL INVÁLIDA");
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

//store the shorturl inside of database
function storeShortUrl($shortURL, $clientURL){

	$query = "INSERT INTO urls (shortURL, clientURL) VALUES ('$shortURL', '$clientURL')";
	$connection = new PDO("mysql:host=localhost;dbname=shortener", "root", ""); 
	$statment = $connection->prepare($query);
	$statment->execute();

}

$clientURL = getClientUrl();	
$shortURL = getRandomToken(5);
echo $shortURL;
storeShortUrl($shortURL, $clientURL);
