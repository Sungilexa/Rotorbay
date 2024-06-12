<?php
session_start();

// Réinitialiser le panier
$_SESSION['cart'] = [];

// Réinitialiser la session
$_SESSION = array();
session_destroy();

header('Location: accueil.php');
exit;
?>
