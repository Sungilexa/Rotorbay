<?php
include 'db_connection.php';

function handleFileUpload($file, $directory) {
    if (isset($file) && $file['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $file['tmp_name'];
        $fileName = uniqid() . '-' . basename($file['name']);
        $fileSize = $file['size'];
        $fileType = $file['type'];

        if ($fileSize > 10000000) { // 10 MB
            return ['status' => 'error', 'message' => 'Le fichier est trop volumineux.'];
        }

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($fileType, $allowedTypes)) {
            return ['status' => 'error', 'message' => 'Type de fichier non autorisé.'];
        }

        $destination = $directory . $fileName;
        if (move_uploaded_file($fileTmpPath, $destination)) {
            return ['status' => 'success', 'filePath' => $destination];
        } else {
            return ['status' => 'error', 'message' => 'Erreur lors du téléchargement du fichier.'];
        }
    }
    return ['status' => 'error', 'message' => 'Aucun fichier téléchargé.'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $db = Connexion();
        if (isset($_POST['action']) && $_POST['action'] === 'delete') {
            $stmt = $db->prepare("DELETE FROM produit WHERE idproduit = :id");
            $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
            $stmt->execute();
            echo json_encode(['status' => 'success']);
            exit;
        }

        $productId = $_POST['productId'] ?? null;
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $productType = $_POST['productType'];
        $productStock = $_POST['productStock'];
        $productDescription = $_POST['productDescription'];

        $productImage = isset($_FILES['productImage']) ? handleFileUpload($_FILES['productImage'], 'images/') : null;
        $productBgImage = isset($_FILES['productBgImage']) ? handleFileUpload($_FILES['productBgImage'], 'images/') : null;

        if ($productImage && $productImage['status'] === 'error' && $productImage['message'] !== 'Aucun fichier téléchargé.') {
            echo json_encode($productImage);
            exit;
        }

        if ($productBgImage && $productBgImage['status'] === 'error' && $productBgImage['message'] !== 'Aucun fichier téléchargé.') {
            echo json_encode($productBgImage);
            exit;
        }

        if (empty($productId)) {
            // Insert new product
            $stmt = $db->prepare("INSERT INTO produit (nom, prix, type, stock, description, lienImage, lienBackground) VALUES (:name, :price, :type, :stock, :description, :image, :background)");
            $stmt->bindParam(':name', $productName);
            $stmt->bindParam(':price', $productPrice);
            $stmt->bindParam(':type', $productType);
            $stmt->bindParam(':stock', $productStock);
            $stmt->bindParam(':description', $productDescription);
            $stmt->bindParam(':image', $productImage['filePath']);
            $stmt->bindParam(':background', $productBgImage['filePath']);
        } else {
            // Update existing product
            $sql = "UPDATE produit SET nom = :name, prix = :price, type = :type, stock = :stock, description = :description";
            if ($productImage && $productImage['status'] === 'success') {
                $sql .= ", lienImage = :image";
            }
            if ($productBgImage && $productBgImage['status'] === 'success') {
                $sql .= ", lienBackground = :background";
            }
            $sql .= " WHERE idproduit = :id";

            $stmt = $db->prepare($sql);
            $stmt->bindParam(':name', $productName);
            $stmt->bindParam(':price', $productPrice);
            $stmt->bindParam(':type', $productType);
            $stmt->bindParam(':stock', $productStock);
            $stmt->bindParam(':description', $productDescription);
            if ($productImage && $productImage['status'] === 'success') {
                $stmt->bindParam(':image', $productImage['filePath']);
            }
            if ($productBgImage && $productBgImage['status'] === 'success') {
                $stmt->bindParam(':background', $productBgImage['filePath']);
            }
            $stmt->bindParam(':id', $productId);
        }

        $stmt->execute();
        echo json_encode(['status' => 'success']);
    } catch (Exception $e) {
        error_log('Erreur lors de la gestion du produit: ' . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Erreur lors de la gestion du produit.']);
    }
}
?>
