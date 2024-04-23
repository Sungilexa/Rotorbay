<?php
require_once 'loginbdd.php';
$connexion = Connexion();
try {
    $stmt = $connexion->prepare("INSERT INTO utilisateurs (email, mot_de_passe) VALUES (:email, :password)");
    $stmt->bindParam(':email', $_POST["email"]);
    $stmt->bindParam(':password', $_POST["password"]);

    $stmt->execute();
    header("Location: confirmationsignup.php");
    exit();
}
catch(PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}
$connexion = null;
?>


