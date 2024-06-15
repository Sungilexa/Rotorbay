<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $db = Connexion();
        
        $targetDir = "images/";
        $imageFile = $targetDir . basename($_FILES["product-image"]["name"]);
        $bgImageFile = $targetDir . basename($_FILES["product-bg-image"]["name"]);
        
        move_uploaded_file($_FILES["product-image"]["tmp_name"], $imageFile);
        move_uploaded_file($_FILES["product-bg-image"]["tmp_name"], $bgImageFile);
        
        $stmt = $db->prepare("INSERT INTO produit (nom, prix, type, stock, description, lienImage, lienBackground) VALUES (:nom, :prix, :type, :stock, :description, :lienImage, :lienBackground)");
        $stmt->bindParam(':nom', $_POST['product-name']);
        $stmt->bindParam(':prix', $_POST['product-price']);
        $stmt->bindParam(':type', $_POST['product-type']);
        $stmt->bindParam(':stock', $_POST['product-stock']);
        $stmt->bindParam(':description', $_POST['product-description']);
        $stmt->bindParam(':lienImage', $imageFile);
        $stmt->bindParam(':lienBackground', $bgImageFile);
        $stmt->execute();
        
        echo json_encode(['status' => 'success']);
    } catch (Exception $e) {
        error_log('Erreur lors de l\'ajout du produit: ' . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Erreur lors de l\'ajout du produit']);
    }
}
?>
