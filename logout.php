<?php
session_start();

//réinitialiser la session
$_SESSION = array();
session_destroy();

header('Location: accueil.php');
exit;
?>