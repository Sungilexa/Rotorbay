<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="header.css" />
    <link rel="stylesheet" href="milmi24.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Produit</title>
</head>
<body>
    <div class="container">
        <?php include 'header.php'; ?>
        <div class="content">
            <div class="product-card">
                <div class="image-container">
                    <img src="images/milmi24.jpg" alt="Product Image">
                </div>
                <div class="product-details">
                    <h1 id="item-name" class="product-title">Mil Mi-24 "Hind" - Hélicoptère de Combat</h1>
                    <p class="product-description">Le Mil Mi-24, surnommé "Hind", est un hélicoptère de combat redoutable et polyvalent, capable de mener des missions d'attaque et de transport de troupes. Conçu pour être robuste et efficace, il est parfait pour les opérations militaires exigeantes.</p>
                    <ul class="product-specs">
                        <li><strong>Type :</strong> Hélicoptère de combat et de transport</li>
                        <li><strong>Moteurs :</strong> Deux Klimov TV3-117 (2 200 ch chacun)</li>
                        <li><strong>Vitesse maximale :</strong> 335 km/h</li>
                        <li><strong>Autonomie :</strong> 450 km</li>
                        <li><strong>Capacité :</strong> 8 soldats ou 4 brancards</li>
                        <li><strong>Armement :</strong>
                            <ul>
                                <li>Canon YakB-12.7 de 12,7 mm</li>
                                <li>Roquettes S-5, S-8, S-13</li>
                                <li>Missiles antichar 9M17P Scorpion (AT-2 Swatter)</li>
                            </ul>
                        </li>
                    </ul>
                    <p class="product-price"><strong>Prix :</strong> $<span id="item-price">12000000</span></p>
                    <button id="milmiAddCart" class="btn btn-primary">Ajouter au panier</button>
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
