<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue</title>
    <link rel="stylesheet" href="catalogue.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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

    <div class="catalogue">
      <h2>Catalogue des hélicoptères</h2>
        <div class="helico">
            <div class="image-container">
                <img src="images/produit1.png" alt="TIGRE" class="image-helico">
            </div>
            <div class="details">
                <span class="nom">TIGRE</span><br>
                <span class="prix">Prix: 120000000 €</span>
                <span class="description"><br>
                    Modèle : H225M Caracal<br>
                    Année : 2010<br>
                    Moteur : Turbomeca Makila 2A1<br>
                    Capacité : 10 passagers<br>
                    Autonomie : 1 325 km
                </span>
            </div>
            <div class="btnAddDiv">
                <label for="quantite">Quantité: </label>
                <input type="number" class="quantiteBtn" min="0" max="99" value="0">
                <button class="addPanierBtn" onclick="ajouterPanier()">Ajouter au panier</button>
            </div>
        </div>

        <div class="helico">
            <div class="image-container">
                <img src="images/produit2.png" alt="AIRBUS H145" class="image-helico">
            </div>
            <div class="details">
                <span class="nom">AIRBUS H145</span><br>
                <span class="prix">Prix: 25000000 €</span>
                <span class="description"><br>
                    Modèle : Falcon Airbus H145<br>
                    Année : 2022<br>
                    Moteur : Turbine XYZ-T2000<br>
                    Capacité : 4 passagers<br>
                    Autonomie : 500 km
                </span>
            </div>
            <div class="btnAddDiv">
                <label for="quantite">Quantité: </label>
                <input type="number" class="quantiteBtn" min="0" max="99" value="0">
                <button class="addPanierBtn" onclick="ajouterPanier()">Ajouter au panier</button>
            </div>
        </div>

        <div class="helico">
            <div class="image-container">
                <img src="images/produit3.png" alt="H160" class="image-helico">
            </div>
            <div class="details">
                <span class="nom">H160</span><br>
                <span class="prix">Prix: 65000000 €</span>
                <span class="description"><br>
                    Modèle : H160<br>
                    Année : 2023<br>
                    Moteur : Turbomeca Makila 2A1<br>
                    Capacité : 8 - 10 passagers<br>
                    Autonomie : 980 km
                </span>
            </div>
            <div class="btnAddDiv">
                <label for="quantite">Quantité: </label>
                <input type="number" class="quantiteBtn" min="0" max="99" value="0">
                <button class="addPanierBtn">Ajouter au panier</button>
            </div>
        </div>
    </div>

    <footer class="footer">
      <p>© 2023 WoippyServices inc.</p>
    </footer>
  </div>
<script src="dynamique.js"></script>
</body>
</html>
