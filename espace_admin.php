<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['role'] !== 'admin') {
    header('HTTP/1.0 404 Not Found');
    echo "<head><title>404 Not Found</title><style>
    body { background-color: #fcfcfc; color: #333333; margin: 0; padding:0; }
    h1 { font-size: 1.5em; font-weight: normal; background-color: #9999cc; min-height:2em; line-height:2em; border-bottom: 1px inset black; margin: 0; }
    h1, p { padding-left: 10px; }
    code.url { background-color: #eeeeee; font-family:monospace; padding:0 2px;}
    </style>
    </head><body><h1>Not Found</h1><p>The requested resource <code class='url'>/espace_admin.php</code> was not found on this server.</p></body>";
    exit;
}

include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Admin</title>
    <link rel="stylesheet" href="espace_admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <?php include 'header.php'; ?>

    <div class="admin-content">
        <h1>Gestion des Produits</h1>
        <button class="btn btn-primary" id="add-product-btn">Ajouter un produit</button>
        <div class="catalogue">
            <div class="card-deck" id="product-cards">
                <!-- Les cartes de produit seront insérées ici dynamiquement -->
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>© 2023 Bladespin aircraft inc.</p>
    </footer>
</div>

<!-- Modale pour l'ajout et la modification des produits -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="product-form" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Ajouter un produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="product-id" name="productId">
                    <div class="mb-3">
                        <label for="product-name" class="form-label">Nom du produit</label>
                        <input type="text" class="form-control" id="product-name" name="productName" required>
                    </div>
                    <div class="mb-3">
                        <label for="product-price" class="form-label">Prix</label>
                        <input type="number" class="form-control" id="product-price" name="productPrice" required>
                    </div>
                    <div class="mb-3">
                        <label for="product-type" class="form-label">Type</label>
                        <input type="text" class="form-control" id="product-type" name="productType" required>
                    </div>
                    <div class="mb-3">
                        <label for="product-stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="product-stock" name="productStock" required>
                    </div>
                    <div class="mb-3">
                        <label for="product-description" class="form-label">Description</label>
                        <textarea class="form-control" id="product-description" name="productDescription" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="product-image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="product-image" name="productImage" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="product-bg-image" class="form-label">Image de fond</label>
                        <input type="file" class="form-control" id="product-bg-image" name="productBgImage" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary" id="save-product-btn">Enregistrer le produit</button>
                    <button type="button" class="btn btn-danger" id="delete-product-btn" style="display: none;">Supprimer le produit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="espace_admin.js"></script>
</body>
</html>
