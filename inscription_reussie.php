<?php
session_start();
header("refresh:2;url=accueil.php"); // Redirige après 1 seconde vers la page d'accueil
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Réussie</title>
    <link rel="stylesheet" href="inscription_reussie.css">
</head>
<body>
    <div class="container">
        <div class="message">
            <h1>Inscription Réussie !</h1>
            <p>Redirection...</p>
        </div>
    </div>
</body>
</html>
