<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="contact.css" />
		<title>Prendre un rendez-vous</title>
	</head>
	<body>
		<div class="container">
        <?include 'session.php';?>
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
      <div class="contact-form">
  <h2>Contactez-nous</h2>
  <form action="process.php" method="POST">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>

    <label for="message">Message :</label>
    <textarea id="message" name="message" required></textarea>

    <input type="submit" value="Envoyer">
  </form>
</div>

			<footer class="footer">
				<p>© 2023 WoippyServices inc.</p>
			</footer>
		    </div>
	</body>
</html>
