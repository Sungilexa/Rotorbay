<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $db = Connexion();
        $stmt = $db->prepare("SELECT * FROM utilisateur WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Connexion réussie
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $user['idutilisateur'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role']; // Ajouter le rôle de l'utilisateur à la session
            $_SESSION['cart'] = []; // Initialiser le panier pour l'utilisateur

            // Regénérer l'ID de session pour des raisons de sécurité
            session_regenerate_id(true);

            // Rediriger vers l'accueil
            echo 'success';
        } else {
            echo 'Invalid email or password';
        }
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Se connecter</title>
    <link rel="stylesheet" type="text/css" href="loginform.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="dynamique.js"></script> <!-- Inclure le fichier dynamique.js -->
</head>
<body>
<div class="container">
    <?php include 'header.php'; ?>
    <div class="content">
        <div class="form-container">
            <form id="loginForm" method="post">
                <div class="mailDiv">
                    <label for="loginInputEmail">Adresse e-mail</label>
                    <input type="email" name="email" class="form-control" id="loginInputEmail" aria-describedby="emailHelp" placeholder="Entrez votre email">
                    <small id="emailHelp" class="form-text text-muted">Votre adresse e-mail ne sera jamais divulguée.</small>
                </div>
                <div class="passDiv">
                    <label for="loginInputPassword">Mot de passe</label>
                    <input type="password" name="password" class="form-control" id="loginInputPassword" placeholder="Mot de passe">
                </div>
                <div class="submitDiv">
                    <button type="submit" class="btn btn-primary" id="loginFormBtn">Se connecter</button>
                </div>
            </form>
            <span class="msgPasInscrit">Pas encore inscrit ? Inscrivez-vous <a href="inscription.php">ici</a></span>
            <div id="responseMessage"></div>
        </div>
    </div>
    <footer class="footer">
        <p>© 2023 Bladespin aircraft inc.</p>
    </footer>
</div>
</body>
</html>
