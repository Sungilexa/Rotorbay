<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['productName'])) {
    try {
        $db = Connexion();
        $productName = $_GET['productName'];
        
        $stmt = $db->prepare("SELECT * FROM produit WHERE nom = :nom");
        $stmt->bindParam(':nom', $productName);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            echo json_encode($product);
        } else {
            echo json_encode(['error' => 'Produit non trouvé']);
        }
    } catch (Exception $e) {
        error_log('Erreur lors de la récupération du produit: ' . $e->getMessage());
        echo json_encode(['error' => 'Erreur lors de la récupération du produit']);
    }
} else {
    echo json_encode(['error' => 'Requête invalide']);
}
?>
