<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="accueil.css" />
		<title>Page d'accueil</title>
	</head>
	<body>
		<div class="container">
            <nav>
                <a href="accueil.php">
                    <img src="images/Rotorbay.png" alt="" class="logo" />
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
			<section class="site-container">
				<p>Bienvenue sur le site de</p>
				<h1>ROTORBAY</h1>
				<h4>En apesanteur, venez profiter du savoir-faire des ingénieurs Rotorbay...</h4>

				<div class="row">
					<a href="contact.php">Prendre rendez-vous</a>
					<a href="catalogue.php">Voir les Hélicoptères  <span>&#x27f6</span></a>
					<span>
          Venez découvrir nos hélicoptères d'exception<br />
            Dans une ambiance unique propre à Rotorbay
					</span>
        </div>
			</section>

			<footer class="footer">
				<p>© 2023 Bladespin services inc.</p>
			</footer>
		    </div>
	</body>
</html>
