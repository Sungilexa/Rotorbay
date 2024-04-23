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
    <title>Se connecter</title>
    <link rel="stylesheet" type="text/css" href="loginform.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
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
    <img src="Helicramptes.png" alt="Image">
    <div class="form-container">
        <form action="bdd_login.php" method="post">
            <div class="mailDiv">
                <label for="exampleInputEmail1">Adresse e-mail</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre email">
                <small id="emailHelp" class="form-text text-muted">Votre adresse e-mail ne sera jamais divulguée.</small>
            </div>
            <div class="passDiv">
                <label for="exampleInputPassword1">Mot de passe</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
            </div>
            <div class="submitDiv">
                <button type="submit" class="btn btn-primary" id="loginFormBtn">Se connecter</button>

            </div>
        </form>
        <span class="msgPasInscrit">Pas encore inscrit ? Inscrivez-vous <a href="inscription.php">ici</a></span>
</div>
</div>
    <footer class="footer">
        <p>© 2023 WoippyServices inc.</p>
    </footer>
</div>
</body>
</html>
