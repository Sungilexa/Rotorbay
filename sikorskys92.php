<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="header.css" />
    <link rel="stylesheet" href="sikorskys92.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Produit</title>
</head>
<body>
    <div class="container">
        <?php include 'header.php'; ?>
        <div class="content">
            <div class="product-card">
                <div class="image-container">
                    <img src="images/sikorskys92.jpg" alt="Product Image">
                </div>
                <div class="product-details">
                    <h1 id="item-name" class="product-title">Sikorsky S-92 - Hélicoptère Polyvalent de Transport</h1>
                    <p class="product-description">Le Sikorsky S-92 est un hélicoptère polyvalent de transport et de recherche et sauvetage, reconnu pour sa fiabilité et ses performances exceptionnelles. Conçu pour offrir un confort optimal et une grande sécurité, le S-92 est idéal pour les missions civiles et militaires.</p>
                    <ul class="product-specs">
                        <li><strong>Type :</strong> Hélicoptère de transport et de recherche et sauvetage</li>
                        <li><strong>Moteurs :</strong> Deux General Electric CT7-8A (2 520 ch chacun)</li>
                        <li><strong>Vitesse maximale :</strong> 306 km/h</li>
                        <li><strong>Autonomie :</strong> 999 km</li>
                        <li><strong>Capacité :</strong> 19 passagers</li>
                        <li><strong>Équipement :</strong>
                            <ul>
                                <li>Système de navigation avancé</li>
                                <li>Cabine spacieuse et modulable</li>
                                <li>Treuil de sauvetage</li>
                            </ul>
                        </li>
                    </ul>
                    <p class="product-price"><strong>Prix :</strong> $<span id="item-price">27000000</span></p>
                    <button id="sikorskyAddCart" class="btn btn-primary">Ajouter au panier</button>
                </div>
            </div>
        </div>
        <footer class="footer">
            <p>© 2023 Bladespin aircraft inc.</p>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="panierdynamique.js"></script>
</body>
</html>
