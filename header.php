<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<link rel="stylesheet" type="text/css" href="header.css"> <!-- Inclure le CSS du header -->
<nav>
    <a href="accueil.php">
        <img src="images/Hélicramptés.png" alt="Logo" class="logo" />
    </a>
    <ul>
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="propo.php">À propos</a></li>
        <li><a href="catalogue.php">Catalogue</a></li>
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <li><a href="espace_admin.php">Espace Admin</a></li>
            <?php else: ?>
                <li><a href="espace_client.php">Espace client</a></li>
            <?php endif; ?>
            <li><a href="logout.php">Déconnexion</a></li>
            <li><a href="panier.php"><img src="images/cart.png" alt="Panier" class="cart" /></a></li>
        <?php else: ?>
            <li><a href="loginform.php">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>
