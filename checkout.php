<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['email'])) {
        $db = Connexion();

        // Récupérer l'utilisateur
        $stmt = $db->prepare("SELECT idUtilisateur FROM utilisateur WHERE email = :email");
        $stmt->bindParam(':email', $_SESSION['email']);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $userId = $user['idUtilisateur'];

        // Récupérer le panier
        $cart = json_decode($_POST['cart'], true);
        $numFacture = substr(uniqid(), -8); // Générer un identifiant plus court
        $prixFacture = 0;
        $nomFacture = '';

        foreach ($cart as $item) {
            $prixFacture += $item['price'] * $item['quantity'];
            $nomFacture .= $item['quantity'] . ' x ' . $item['name'] . '; ';
        }

        // Insérer la commande dans la table facture
        $stmt = $db->prepare("INSERT INTO facture (nomFacture, numFacture, prixFacture, idUtilisateur) VALUES (:nomFacture, :numFacture, :prixFacture, :idUtilisateur)");
        $stmt->bindParam(':nomFacture', $nomFacture);
        $stmt->bindParam(':numFacture', $numFacture);
        $stmt->bindParam(':prixFacture', $prixFacture);
        $stmt->bindParam(':idUtilisateur', $userId);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Erreur lors de l\'insertion de la commande']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Utilisateur non connecté']);
    }
    exit();
}
?>
