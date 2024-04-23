<?php
require_once 'loginbdd.php';
$connexion = Connexion();


if (!$connexion) {
    die("La connexion à la base de données a échoué: " . $connexion->errorInfo());
}


$quantiteTigre = $_POST['quantiteTigre'];
$quantiteH145 = $_POST['quantiteH145'];
$quantiteH160 = $_POST['quantiteH160'];



$query = "INSERT INTO panier (nombreTigre, nombreH145, nombreH160, idutilisateur) VALUES (:quantiteTigre, :quantiteH145, :quantiteH160, 1)";

$stmt = $connexion->prepare($query);
$stmt->bindValue(':quantiteTigre', $quantiteTigre, PDO::PARAM_INT);
$stmt->bindValue(':quantiteH145', $quantiteH145, PDO::PARAM_INT);
$stmt->bindValue(':quantiteH160', $quantiteH160, PDO::PARAM_INT);

if ($stmt->execute()) {
    echo "helicos ok";
} else {
    echo "Erreur: " . $connexion->errorInfo();
}

// Fermeture du statement et de la connexion
$stmt->closeCursor();
$connexion = null;
?>
