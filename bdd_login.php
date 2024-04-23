<?php
require_once 'loginbdd.php';

$email = $_POST['email'];
$password = $_POST['password'];

$connexion = Connexion();

$stmt = $connexion->prepare("SELECT * FROM utilisateur WHERE email = :email AND password = :password");
$stmt->execute([
    ':email' => $email,
    ':password' => $password
]);

$user = $stmt->fetch();

if ($user) {
    session_start();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['logged_in'] = true;
    $_SESSION['email'] = $email;

    header("Location: accueil.php");
} else {
    header("Location: loginform.php?error=invalid_credentials");
}

?>
