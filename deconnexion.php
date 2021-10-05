<?php 
session_start();
unset($_SESSION['inscritConnecte']);
session_destroy();
header('Location: connexion.php');
?>