<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paiement</title>
  <link rel="stylesheet" href="paiement.css">
</head>
<body>
  <div class="container">
      <nav>
          <a href="accueil.php">
              <img src="images/Hélicramptés.png" alt="" class="logo" />
          </a>
          <ul>
              <li><a href="accueil.php">Accueil</a></li>
              <li><a href="propo.php">À propos</a></li>
              <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                  <li><a href="espace_client.php">Espace client</a></li>
                  <li><a href="logout.php">Deconnexion</a></li>
              <?php else: ?>
                  <li><a href="loginform.php">Login</a></li>
              <?php endif; ?>
          </ul>
          <a href="panier.php">
              <img src="images/cart.png" alt="Panier" class="cart" />
          </a>
      </nav>

    <div class="paiement">
      <h2>Paiement</h2>
      <p>Commande validée avec succès!</p>
    </div>

    <footer class="footer">
      <p>© 2023 WoippyServices inc.</p>
    </footer>
  </div>
</body>
</html>
