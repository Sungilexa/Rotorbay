<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="propo.css"/>
    <title>Prendre un rendez-vous</title>
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
    <div class="content">
        <div class="address">
            <h2>Adresse :</h2>
            <p>42 Av. de Thionville, 57140 Woippy</p>
            <h2>Téléphone :</h2>
            <p>+330965321352</p>
            <h2>Email :</h2>
            <p>hélicramptés@woippyservices.com</p>
        </div>
        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1304.8897476319514!2d6.15926023533543!3d49.147810905443734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4794d93057e71b87%3A0x580b022fa1f095d!2s42%20Av.%20de%20Thionville%2C%2057140%20Woippy!5e0!3m2!1sfr!2sfr!4v1687122221213!5m2!1sfr!2sfr"
                width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <footer class="footer">
        <p>© 2023 WoippyServices inc.</p>
    </footer>
</div>
</body>
</html>
