<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Se connecter</title>
    <link rel="stylesheet" type="text/css" href="inscription.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
<nav>
    <a href="accueil.php">
        <img src="images/Hélicramptés.png" alt="" class="logo" />
    </a>
    <ul>
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="propo.php">À propos</a></li>
        <li><a href="loginform.php">Login</a></li>
    </ul>
    <a href="panier.php">
        <img src="images/cart.png" alt="Panier" class="cart" />
    </a>
</nav>
<div class="container">
    <img src="Helicramptes.png" alt="Image">
    <div class="form-container">
        <form id="formulaire" action="bdd_signup.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Adresse e-mail</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre email">
                <small id="emailHelp" class="form-text text-muted">Votre adresse e-mail ne sera jamais divulguée.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mot de passe</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
            </div>
            <button type="submit" id="inscrire" class="btn btn-primary">S'inscrire</button>
        </form>
    </div>
    <footer class="footer">
        <p>© 2023 WoippyServices inc.</p>
    </footer>
</div>
</body>
</html>
