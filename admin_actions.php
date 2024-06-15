<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php';

function handleImageUpload($fileKey, $destinationDir) {
    if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES[$fileKey]['tmp_name'];
        $fileName = $_FILES[$fileKey]['name'];
        $destinationPath = $destinationDir . $fileName;
        if (move_uploaded_file($fileTmpPath, $destinationPath)) {
            return $destinationPath;
        }
    }
    return null;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($_GET['action'] === 'fetch') {
        $db = Connexion();
        $stmt = $db->query("SELECT * FROM produit");
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($products);
        exit;
    }

    if ($_GET['action'] === 'fetchById' && isset($_GET['id'])) {
        $db = Connexion();
        $stmt = $db->prepare("SELECT * FROM produit WHERE idproduit = :id");
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($product);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = Connexion();

    if ($_POST['action'] === 'add') {
        $lienImage = handleImageUpload('lienImage', 'images/');
        $lienBackground = handleImageUpload('lienBackground', 'images/');
        
        $stmt = $db->prepare("INSERT INTO produit (nom, prix, type, stock, lienImage, lienBackground) VALUES (:nom, :prix, :type, :stock, :lienImage, :lienBackground)");
        $stmt->bindParam(':nom', $_POST['nom']);
        $stmt->bindParam(':prix', $_POST['prix']);
        $stmt->bindParam(':type', $_POST['type']);
        $stmt->bindParam(':stock', $_POST['stock']);
        $stmt->bindParam(':lienImage', $lienImage);
        $stmt->bindParam(':lienBackground', $lienBackground);
        $stmt->execute();
        exit;
    }

    if ($_POST['action'] === 'update' && isset($_POST['idproduit'])) {
        $lienImage = handleImageUpload('lienImage', 'images/');
        $lienBackground = handleImageUpload('lienBackground', 'images/');

        $stmt = $db->prepare("UPDATE produit SET nom = :nom, prix = :prix, type = :type, stock = :stock, lienImage = IF(:lienImage IS NULL, lienImage, :lienImage), lienBackground = IF(:lienBackground IS NULL, lienBackground, :lienBackground) WHERE idproduit = :id");
        $stmt->bindParam(':id', $_POST['idproduit']);
        $stmt->bindParam(':nom', $_POST['nom']);
        $stmt->bindParam(':prix', $_POST['prix']);
        $stmt->bindParam(':type', $_POST['type']);
        $stmt->bindParam(':stock', $_POST['stock']);
        $stmt->bindParam(':lienImage', $lienImage);
        $stmt->bindParam(':lienBackground', $lienBackground);
        $stmt->execute();
        exit;
    }

    if ($_POST['action'] === 'delete' && isset($_POST['id'])) {
        $stmt = $db->prepare("DELETE FROM produit WHERE idproduit = :id");
        $stmt->bindParam(':id', $_POST['id']);
        $stmt->execute();
        exit;
    }
}
?>
