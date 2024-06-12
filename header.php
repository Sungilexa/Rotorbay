<?php
include 'session.php';
?>
<nav>
    <a href="accueil.php">
        <img src="images/Hélicramptés.png" alt="Logo" class="logo" />
    </a>
    <ul>
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="propo.php">À propos</a></li>
        <li><a href="catalogue.php">Catalogue</a></li>
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
            <li><a href="espace_client.php">Espace client</a></li>
            <li><a href="logout.php">Déconnexion</a></li>
            <li><a href="panier.php"><img src="images/cart.png" alt="Panier" class="cart" /></a></li>
        <?php else: ?>
            <li><a href="loginform.php">Login</a></li>
        <?php endif; ?>
    </ul>
</nav>