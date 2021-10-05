<?php
	//fonction pour verifier si connecte 
function inscritConnecte (): bool{
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}
	return !empty($_SESSION['inscritConnecte']);
}

function connexion_forced ():void  {
	if (!inscritConnecte()) {
		session_destroy();
		header('Location: ../client.php');

	}
}
?>