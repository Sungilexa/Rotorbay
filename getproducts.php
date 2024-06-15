<?php
include 'db_connection.php';

try {
    $db = Connexion();
    $stmt = $db->prepare("SELECT * FROM produit");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($products);
} catch (Exception $e) {
    error_log('Erreur lors de la récupération des produits: ' . $e->getMessage());
    echo json_encode([]);
}
?>
