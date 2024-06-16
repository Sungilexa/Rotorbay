<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="header.css" />
    <link rel="stylesheet" href="accueil.css" />
    <title>Page d'accueil</title>
</head>
<body>
    <div class="container">
        <?php include 'header.php'; ?>
        
        <section class="site-container">
            <p>Bienvenue sur le site de</p>
            <h1>ROTORBAY</h1>
            <h4>En apesanteur, venez profiter du savoir-faire des ingénieurs Rotorbay...</h4>
            <div class="row">
                <a href="catalogue.php">Voir les Hélicoptères  <span>&#x27f6</span></a>
                <span>
                    Venez découvrir nos hélicoptères d'exception<br />
                    Dans une ambiance unique propre à Rotorbay
                </span>
            </div>
        </section>
        <footer class="footer">
            <p>© 2023 Bladespin aircraft inc.</p>
        </footer>
    </div>
</body>
</html>
