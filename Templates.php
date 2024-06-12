<!-- Template d'une page : -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="header.css" />
    <link rel="stylesheet" href="template.css"/>
    <title>Template</title>
</head>
<body>
    <div class="container">
        <?php include 'header.php'; ?>
        <div class="content">
            <!-- Ajouter le contenu spécifique ici -->
        </div>
        <footer class="footer">
            <p>© 2023 Bladespin aircraft inc.</p>
        </footer>
    </div>
</body>
</html>

*,
*::before,
*::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    outline: none;
    font-family: 'Tw Cen MT', sans-serif;
}

html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

body {
    font-style: sans-serif;
}

a {
    text-decoration: none;
}

a:hover {
    text-decoration: none;
}

.container {
    position: relative;
    min-height: 100vh; /* Utiliser la hauteur minimale complète de la fenêtre */
    width: 100vw; /* Utiliser la largeur complète de la fenêtre */
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.1)), url('images/backgroundmilmi.jpg') no-repeat center center;
    background-size: cover; /* Couvrir toute la fenêtre */
    padding: 0;
    display: flex;
    flex-direction: column;
    justify-content: center; /* Centrer verticalement */
    align-items: center; /* Centrer horizontalement */
    margin: 0;
    max-width: 100% !important;
  }

.content {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 20px; /* Ajout de l'espace vertical entre les éléments */
    width: 100%;
}

.footer {
    padding: 20px;
    text-align: center;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
}

.footer p {
    margin: 0;
    color: #ffffff;
    font-size: 14px;
}


<!-- -------------------------------------------------------------------------------- -->

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="header.css" />
    <link rel="stylesheet" href="template.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Produit</title>
</head>
<body>
    <div class="container">
        <?php include 'header.php'; ?>
        <div class="content">
            <div class="product-card">
                <div class="image-container">
                    <img src="images/product_image.jpg" alt="Product Image">
                </div>
                <div class="product-details">
                    <h1 class="product-title">Nom du Produit</h1>
                    <p class="product-description">Description détaillée du produit. Incluez toutes les spécifications et informations pertinentes pour aider les clients à prendre une décision éclairée.</p>
                    <button class="btn btn-primary">Ajouter au panier</button>
                </div>
            </div>
        </div>
        <footer class="footer">
            <p>© 2023 Bladespin aircraft inc.</p>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>


*,
*::before,
*::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    outline: none;
    font-family: 'Tw Cen MT', sans-serif;
}

html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

body {
    font-style: sans-serif;
}

a {
    text-decoration: none;
}

a:hover {
    text-decoration: none;
}

.container {
    position: relative;
    min-height: 100vh; /* Utiliser la hauteur minimale complète de la fenêtre */
    width: 100vw; /* Utiliser la largeur complète de la fenêtre */
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.1)), url('images/backgroundmilmi.jpg') no-repeat center center;
    background-size: cover; /* Couvrir toute la fenêtre */
    padding: 0;
    display: flex;
    flex-direction: column;
    justify-content: center; /* Centrer verticalement */
    align-items: center; /* Centrer horizontalement */
    margin: 0;
    max-width: 100% !important;
  }

.content {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 20px; /* Ajout de l'espace vertical entre les éléments */
    width: 100%;
}

.footer {
    padding: 20px;
    text-align: center;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
}

.footer p {
    margin: 0;
    color: #ffffff;
    font-size: 14px;
}

.product-card {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    background-color: rgba(255, 255, 255, 0.9);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    width: 100%;
    margin: 20px;
}

.image-container {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 20px;
}

.image-container img {
    max-width: 100%;
    max-height: 400px;
    border-radius: 10px;
}

.product-details {
    flex: 2;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.product-title {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 10px;
    text-align: justify;
}

.product-description {
    flex-grow: 1;
    font-size: 1rem;
    margin-bottom: 20px;
    text-align: justify;
}

.btn {
    align-self: flex-end;
}

