<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="panier.css">
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

    <div class="panier">
        <h2>Panier</h2>
        <form method="POST" action="paiement.php">
            <?php
            //Tableau des produits dans le panier
            $panier = [
                ['id' => 1, 'nom' => 'TIGRE <br> <br>', 'prix' => 120000000, 'image' => 'images/produit1.png', 'quantite' => 1],
                ['id' => 2, 'nom' => 'AIRBUS H145 <br> <br>', 'prix' => 25000000, 'image' => 'images/produit2.png', 'quantite' => 1],
                ['id' => 3, 'nom' => 'H160 <br> <br>', 'prix' => 65000000, 'image' => 'images/produit3.png', 'quantite' => 1]
            ];

            //Vérifier si une quantité a été mise à jour
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['modifier'])) {
                    foreach ($_POST['modifier'] as $produitId => $nouvelleQuantite) {
                        // Rechercher le produit dans le panier
                        foreach ($panier as &$item) {
                            if ($item['id'] == $produitId) {
                                $item['quantite'] = max(0, min(5, $nouvelleQuantite)); // Assurer que la quantité est entre 0 et 5
                                break;
                            }
                        }
                    }
                }
            }

            foreach ($panier as $item) {
                echo '<div id="item-' . $item['id'] . '" class="item">';
                echo '<img src="' . $item['image'] . '" alt="' . $item['nom'] . '" class="image-produit">';
                echo '<div class="details">';
                echo '<span class="nom">' . $item['nom'] . '</span>';
                echo '<span class="prix">' . $item['prix'] . ' €</span>';
                echo '<input type="number" name="modifier[' . $item['id'] . ']" value="' . $item['quantite'] . '" min="0" max="5">';
                echo '</div>';
                echo '</div>';
            }
            ?>
            <div class="total">
                <span>Total :</span>
                <span class="prix-total">
            <?php
            //Calculer le total du panier
            $total = 0;
            foreach ($panier as $item) {
                $total += $item['prix'] * $item['quantite'];
            }
            echo $total . ' €';
            ?>
          </span>
            </div>
            <button type="submit" name="valider" class="bouton-valider">Valider la commande</button>
        </form>
    </div>

    <footer class="footer">
        <p>© 2023 WoippyServices inc.</p>
    </footer>
</div>
</body>
</html>
