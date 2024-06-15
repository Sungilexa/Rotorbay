<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include 'db_connection.php';

function saveCartToDatabase($userId, $cart) {
    try {
        $db = Connexion();
        $stmt = $db->prepare("SELECT * FROM panier WHERE idutilisateur = :userId");
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $existingCart = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingCart) {
            if (empty($cart)) {
                $stmt = $db->prepare("DELETE FROM panier WHERE idPanier = :cartId");
                $stmt->bindParam(':cartId', $existingCart['idPanier'], PDO::PARAM_INT);
                $stmt->execute();
            } else {
                $stmt = $db->prepare("UPDATE panier SET produits = :products WHERE idPanier = :cartId");
                $products = json_encode($cart);
                $stmt->bindParam(':products', $products, PDO::PARAM_STR);
                $stmt->bindParam(':cartId', $existingCart['idPanier'], PDO::PARAM_INT);
                $stmt->execute();
            }
        } else {
            if (!empty($cart)) {
                $stmt = $db->prepare("INSERT INTO panier (idutilisateur, produits) VALUES (:userId, :products)");
                $products = json_encode($cart);
                $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
                $stmt->bindParam(':products', $products, PDO::PARAM_STR);
                $stmt->execute();
            }
        }
    } catch (Exception $e) {
        error_log('Erreur lors de la sauvegarde du panier en base de données: ' . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Erreur lors de la sauvegarde du panier en base de données']);
        exit;
    }
}

function loadCartFromDatabase($userId) {
    try {
        $db = Connexion();
        $stmt = $db->prepare("SELECT * FROM panier WHERE idutilisateur = :userId");
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $cart = $stmt->fetch(PDO::FETCH_ASSOC);

        return $cart ? json_decode($cart['produits'], true) : [];
    } catch (Exception $e) {
        error_log('Erreur lors du chargement du panier depuis la base de données: ' . $e->getMessage());
        return [];
    }
}

function createInvoice($userId, $cart) {
    try {
        $db = Connexion();
        $totalPrice = 0;
        $description = '';

        foreach ($cart as $productName => $product) {
            $stmt = $db->prepare("SELECT stock FROM produit WHERE nom = :nom");
            $stmt->bindParam(':nom', $productName);
            $stmt->execute();
            $productData = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$productData || $product['quantity'] > $productData['stock']) {
                echo json_encode(['status' => 'error', 'message' => 'Stock insuffisant pour le produit: ' . $productName]);
                exit;
            }

            $totalPrice += $product['price'] * $product['quantity'];
            $description .= "$productName: {$product['quantity']} x {$product['price']} $\n";

            // Update stock
            $newStock = $productData['stock'] - $product['quantity'];
            $stmt = $db->prepare("UPDATE produit SET stock = :stock WHERE nom = :nom");
            $stmt->bindParam(':stock', $newStock, PDO::PARAM_INT);
            $stmt->bindParam(':nom', $productName, PDO::PARAM_STR);
            $stmt->execute();
        }

        $invoiceName = 'Facture_' . uniqid();
        $invoiceNumber = uniqid();

        $stmt = $db->prepare("INSERT INTO facture (descriptionFacture, numFacture, prixFacture, idutilisateur) VALUES (:descriptionFacture, :numFacture, :prixFacture, :userId)");
        $stmt->bindParam(':descriptionFacture', $description, PDO::PARAM_STR);
        $stmt->bindParam(':numFacture', $invoiceNumber, PDO::PARAM_STR);
        $stmt->bindParam(':prixFacture', $totalPrice, PDO::PARAM_INT);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $stmt = $db->prepare("DELETE FROM panier WHERE idutilisateur = :userId");
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        $_SESSION['cart'] = [];
    } catch (Exception $e) {
        error_log('Erreur lors de la création de la facture: ' . $e->getMessage());
        echo json_encode(['status' => 'error', 'message' => 'Erreur lors de la création de la facture: ' . $e->getMessage()]);
        exit;
    }
}

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: loginform.php');
    exit;
}

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Utilisateur non identifié']);
    exit;
}

$userId = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    
    if ($action === 'checkout') {
        createInvoice($userId, $_SESSION['cart']);
        echo json_encode(['status' => 'success', 'message' => 'Facture créée avec succès']);
        exit;
    }

    if (isset($_POST['name']) && isset($_POST['price'])) {
        $productName = $_POST['name'];
        $productPrice = $_POST['price'];
    }

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    switch ($action) {
        case 'add':
            if (isset($productName) && isset($_SESSION['cart'][$productName])) {
                $_SESSION['cart'][$productName]['quantity']++;
            } else if (isset($productName)) {
                $_SESSION['cart'][$productName] = [
                    'price' => $productPrice,
                    'quantity' => 1
                ];
            }
            break;

        case 'update':
            if (isset($_POST['name']) && isset($_POST['quantity'])) {
                $productName = $_POST['name'];
                $newQuantity = $_POST['quantity'];
                if ($newQuantity == 0) {
                    unset($_SESSION['cart'][$productName]);
                } else {
                    $_SESSION['cart'][$productName]['quantity'] = $newQuantity;
                }
            }
            break;
    }

    // Update the cart with prices to ensure the response contains full product details
    $updatedCart = $_SESSION['cart'];
    foreach ($updatedCart as $name => $details) {
        if (!isset($details['price'])) {
            $updatedCart[$name]['price'] = isset($productPrice) ? $productPrice : 0;
        }
    }

    saveCartToDatabase($userId, $_SESSION['cart']);
    echo json_encode(['status' => 'success', 'cart' => $updatedCart]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'display') {
    echo json_encode(isset($_SESSION['cart']) ? $_SESSION['cart'] : []);
    exit;
}

$_SESSION['cart'] = loadCartFromDatabase($userId);
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="panier.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <?php include 'header.php'; ?>

    <div class="content">
        <div class="container px-3 my-5 clearfix">
            <div class="card">
                <div class="card-header">
                    <h2>Shopping Cart</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="cart-table-container">
                        <table class="table table-bordered m-0" id="cart-table">
                            <thead>
                                <tr>
                                    <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="Clear cart" id="clear-cart"><i class="ion ion-md-trash"></i></a></th>
                                </tr>
                            </thead>
                            <tbody id="cart-items">
                                <!-- Cart items will be dynamically inserted here -->
                            </tbody>
                        </table>
                    </div>
                    <div id="empty-cart-message" class="empty-cart-message" style="display:none;">
                        Votre panier est vide !
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                        <div class="text-right mt-4 mr-5">
                            <label class="text-muted font-weight-normal m-0">Total price</label>
                            <div class="text-large"><strong id="total-price">$0</strong></div>
                        </div>
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3" onclick="window.location.href='catalogue.php';">Back to shopping</button>
                        <button type="button" class="btn btn-lg btn-primary mt-2" id="checkout-button">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>© 2023 Bladespin aircraft inc.</p>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script type="text/JavaScript" src="panierdynamique.js"></script>
</body>
</html>
