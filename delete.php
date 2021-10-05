<?php
include '_config/config.php';

$id = $resultatInscrit->id;

$requete = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$requete-> execute([$_GET['id']]);
$resultat = $requete->fetch(PDO::FETCH_OBJ);

if(!is_numeric($_GET['id'])){
	die('Merci de mettre un ncarte valide');
}

if($resultat === false){
	die('Cet Inscrit n\'existe pas');
}

else{
	$requete = $pdo->prepare("DELETE FROM users WHERE id = ?");

	$requete->execute([$_GET['id']]);

	header("Location: admin.php");
}


?>