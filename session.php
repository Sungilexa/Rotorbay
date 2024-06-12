<?php
session_start();

// Définir la durée de vie de la session à 12 heures
ini_set('session.gc_maxlifetime', 12 * 60 * 60);
session_set_cookie_params(12 * 60 * 60);

// Vérifiez si la session est expirée
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 12 * 60 * 60)) {
    // Si la session a expiré, détruisez-la
    session_unset();
    session_destroy();
    // Rediriger vers la page de connexion
    header('Location: loginform.php');
    exit();
}

// Mettre à jour l'heure de la dernière activité
$_SESSION['LAST_ACTIVITY'] = time();
?>
