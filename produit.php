<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="header.css" />
    <link rel="stylesheet" href="produit.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Produit</title>
    <style>
        .container {
            position: relative;
            min-height: 100vh; /* Utiliser la hauteur minimale complète de la fenêtre */
            width: 100vw; /* Utiliser la largeur complète de la fenêtre */
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center; /* Centrer verticalement */
            align-items: center; /* Centrer horizontalement */
            margin: 0;
            max-width: 100% !important;
            background-size: cover; /* Couvrir toute la fenêtre */
        }
    </style>
</head>
<body>
    <div class="container" id="product-container">
        <?php include 'header.php'; ?>
        <div class="content">
            <div class="product-card">
                <div class="image-container">
                    <img id="product-image" src="" alt="Product Image">
                </div>
                <div class="product-details">
                    <h1 id="item-name" class="product-title"></h1>
                    <p id="product-description" class="product-description"></p>
                    <p class="product-price"><strong>Prix :</strong> $<span id="item-price"></span></p>
                    <button id="addCartButton" class="btn btn-primary">Ajouter au panier</button>
                </div>
            </div>
        </div>
        <footer class="footer">
            <p>© 2023 Bladespin aircraft inc.</p>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="produitdynamique.js"></script>
</body>
</html>
