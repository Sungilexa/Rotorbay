<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['productName'])) {
    try {
        $db = Connexion();
        $stmt = $db->prepare("SELECT lienImage FROM produit WHERE nom = :nom");
        $stmt->bindParam(':nom', $_GET['productName'], PDO::PARAM_STR);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($product) {
            echo json_encode($product);
        } else {
            echo json_encode(['error' => 'Produit non trouvé']);
        }
    } catch (Exception $e) {
        error_log('Erreur lors de la récupération de l\'image du produit: ' . $e->getMessage());
        echo json_encode(['error' => 'Erreur lors de la récupération de l\'image du produit']);
    }
} else {
    echo json_encode(['error' => 'Requête invalide']);
}
?>
