<?php 
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

if( !isset($_GET['url']) ) {
	echo '';
	die();
}

$clientURL = mysql_real_escape_string($_GET['url']);
echo $clientURL . '<br>';



//Gera uma string aleatoria
function getRandomToken($size){
$str = 'abcdefghijlmnopkrstuvxzABCDEFGHIJLMNOPQRSTUVXZ';
	$token = ''; 
	for($i=0; $i<$size; $i++){
		$token .= $str[rand(1,46)];
 	}
 	$token = 'go.co/'.$token;
 	return $token;
}

$shortUrl = getRandomToken(5);

echo $shortUrl;

die();
@mysql_connect('localhost','root','');
$query = "INSERT INTO urls (tinurl, original) VALUES ('$shortUrl', '$clientURL')";
mysql_select_db('urls');
mysql_query($query);