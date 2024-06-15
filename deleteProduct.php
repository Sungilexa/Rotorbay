<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    try {
        $db = Connexion();
        $stmt = $db->prepare("DELETE FROM produit WHERE idproduit = :id");
        $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
        $stmt->execute();
        
        echo json_encode(['status' => 'success']);
    } catch (Exception $e) {
        error_log('Erreur lors de la suppression du produit: ' . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Erreur lors de la suppression du produit']);
    }
}
?>
