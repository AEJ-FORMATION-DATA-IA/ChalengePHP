<?php 

$host = "localhost";
$user = "root";
$pass = null;
$name = "users";

try{

	$pdo = new PDO("mysql:host={$host};dbname={$name};charset=utf8", $user, $pass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

	//echo "connexion etablit a la base de données users avec succès";

} 
catch(PDOException $e){
	echo "impossible de se connecter à la base de données !" . $e->getMessage();
}

?>