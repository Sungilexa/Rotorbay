<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Espace client</title>
    <link rel="stylesheet" type="text/css" href="espace_client.css"/>
</head>
<body>
<div class="container">
<nav>
    <a href="accueil.php">
        <img src="images/Hélicramptés.png" alt="" class="logo" />
    </a>
    <ul>
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="propo.php">À propos</a></li>
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
            <li><a href="espace_client.php">Espace client</a></li>
            <li><a href="logout.php">Deconnexion</a></li>
        <?php else: ?>
            <li><a href="loginform.php">Login</a></li>
        <?php endif; ?>
    </ul>
    <a href="panier.php">
        <img src="images/cart.png" alt="Panier" class="cart" />
    </a>
</nav>
</div>
<?php
if (isset($_SESSION['email'])) {
    echo '<div class="welcome-banner">Bienvenue sur votre espace, ' . $_SESSION['email'] . ' !</div>';
}
?>


</body>
</html>
