<?php
include 'db_connection.php'; // Inclure le fichier contenant la fonction Connexion

// Définir les paramètres des cookies de session avant de démarrer la session
session_set_cookie_params(12 * 60 * 60); // Définir un cookie de session qui expire après 12 heures

// Démarrer la session si elle n'est pas déjà active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo 'Passwords do not match';
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_ARGON2ID);

    try {
        $db = Connexion();
        $stmt = $db->prepare("INSERT INTO utilisateur (email, password) VALUES (:email, :password)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->execute();

        // Connexion automatique de l'utilisateur
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $db->lastInsertId(); // Ajouter user_id à la session
        $_SESSION['email'] = $email;
        $_SESSION['cart'] = []; // Initialiser le panier pour l'utilisateur

        // Regénérer l'ID de session pour des raisons de sécurité
        session_regenerate_id(true);

        echo 'success';
        exit();
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
        exit();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S'inscrire</title>
    <link rel="stylesheet" type="text/css" href="inscription.css" />
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
            <form id="signupForm" method="post">
                <div class="mailDiv">
                    <label for="enterSignupEmail">Adresse e-mail</label>
                    <input type="email" name="email" class="form-control" id="enterSignupEmail" aria-describedby="emailHelp" placeholder="Entrez votre email" required>
                    <small id="emailHelp" class="form-text text-muted">Votre adresse e-mail ne sera jamais divulguée.</small>
                </div>
                <div class="passDiv">
                    <label for="enterSignupPassword">Mot de passe</label>
                    <input type="password" name="password" class="form-control" id="enterSignupPassword" placeholder="Mot de passe" required>
                </div>
                <div class="passDiv">
                    <label for="confirmSignupPassword">Confirmez votre mot de passe</label>
                    <input type="password" name="confirm_password" class="form-control" id="confirmSignupPassword" placeholder="Confirmez votre mot de passe" required>
                </div>
                <div class="submitDiv">
                    <button type="submit" class="btn btn-primary" id="SignupFormBtn">S'inscrire</button>
                </div>
                <div id="responseMessage"></div>
            </form>
            <span class="msgDejaInscrit">Déjà inscrit ? Connectez-vous <a href="loginform.php">ici</a></span>
        </div>
    </div>
    <footer class="footer">
        <p>© 2023 Bladespin aircraft inc.</p>
    </footer>
</div>
</body>
</html>
