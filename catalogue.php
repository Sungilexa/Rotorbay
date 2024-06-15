<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue</title>
    <link rel="stylesheet" href="catalogue.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <?php include 'header.php'; ?>

    <div class="catalogue">
      <h3>Catalogue des hélicoptères</h3>
      <div class="card-deck" id="product-cards">
        <!-- Les cartes de produit seront insérées ici dynamiquement -->
      </div>
    </div>
        
    <footer class="footer">
        <p>© 2023 Bladespin aircraft inc.</p>
    </footer>
  </div>
<script src="cataloguedynamique.js"></script>
</body>
</html>
