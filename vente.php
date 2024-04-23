<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Vente d'Hélicoptères</title>
  <link rel="stylesheet" type="text/css" href="vente.css">
</head>

<body>
  <header>
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
  </header>

  <section class="helicopters">
    <div class="container">
      <div class="helicopter">
        <img src="helicoptere1.png" alt="Hélicoptère 1">
        <div class="helicopter-info">
          <h3>Hélicoptère Airbus</h3>
          <p class="price">$8,000,000</p>
          <a href="helico1.php" class="btn">Descriptif</a>
        </div>
      </div>
      <div class="helicopter">
        <img src="helicoptere2.png" alt="Hélicoptère 2">
        <div class="helicopter-info">
          <h3>Hélicoptère Armée</h3>
          <p class="price">$30,000,000</p>
          <a href="helico2.php" class="btn">Descriptif</a>
        </div>
      </div>
      <div class="helicopter">
        <img src="helicoptere3.png" alt="Hélicoptère 3">
        <div class="helicopter-info">
          <h3>Hélicoptère de Secour</h3>
          <p class="price">$15,650,000</p>
          <a href="helico3.php" class="btn">Descriptif</a>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <p>&copy; 2023 HélicoVente. Tous droits réservés.</p>
  </footer>
</body>

</html>