<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $db = Connexion();
        
        $productId = $_POST['product-id'];
        $imageFile = null;
        $bgImageFile = null;
        
        if (!empty($_FILES["product-image"]["name"])) {
            $targetDir = "images/";
            $imageFile = $targetDir . basename($_FILES["product-image"]["name"]);
            move_uploaded_file($_FILES["product-image"]["tmp_name"], $imageFile);
        }
        
        if (!empty($_FILES["product-bg-image"]["name"])) {
            $targetDir = "images/";
            $bgImageFile = $targetDir . basename($_FILES["product-bg-image"]["name"]);
            move_uploaded_file($_FILES["product-bg-image"]["tmp_name"], $bgImageFile);
        }
        
        $query = "UPDATE produit SET nom = :nom, prix = :prix, type = :type, stock = :stock, description = :description";
        
        if ($imageFile) {
            $query .= ", lienImage = :lienImage";
        }
        
        if ($bgImageFile) {
            $query .= ", lienBackground = :lienBackground";
        }
        
        $query .= " WHERE idproduit = :id";
        
        $stmt = $db->prepare($query);
        $stmt->bindParam(':nom', $_POST['product-name']);
        $stmt->bindParam(':prix', $_POST['product-price']);
        $stmt->bindParam(':type', $_POST['product-type']);
        $stmt->bindParam(':stock', $_POST['product-stock']);
        $stmt->bindParam(':description', $_POST['product-description']);
        $stmt->bindParam(':id', $productId);
        
        if ($imageFile) {
            $stmt->bindParam(':lienImage', $imageFile);
        }
        
        if ($bgImageFile) {
            $stmt->bindParam(':lienBackground', $bgImageFile);
        }
        
        $stmt->execute();
        
        echo json_encode(['status' => 'success']);
    } catch (Exception $e) {
        error_log('Erreur lors de la modification du produit: ' . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Erreur lors de la modification du produit']);
    }
}
?>
