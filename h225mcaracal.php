<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="header.css" />
    <link rel="stylesheet" href="h225mcaracal.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Produit</title>
</head>
<body>
    <div class="container">
        <?php include 'header.php'; ?>
        <div class="content">
            <div class="product-card">
                <div class="image-container">
                    <img src="images/caracalh225m.jpg" alt="Product Image">
                </div>
                <div class="product-details">
                    <h1 id="item-name" class="product-title">H225M Caracal - Hélicoptère de Transport et de Combat</h1>
                    <p class="product-description">Le H225M Caracal est un hélicoptère de transport et de combat multifonctionnel, conçu pour des missions exigeantes. Connu pour sa robustesse et sa polyvalence, le Caracal est idéal pour les opérations militaires, de recherche et sauvetage, ainsi que pour le transport tactique.</p>
                    <ul class="product-specs">
                        <li><strong>Type :</strong> Hélicoptère de transport et de combat</li>
                        <li><strong>Moteurs :</strong> Deux moteurs Turbomeca Makila 2A1 (1 776 ch chacun)</li>
                        <li><strong>Vitesse maximale :</strong> 324 km/h</li>
                        <li><strong>Autonomie :</strong> 857 km</li>
                        <li><strong>Capacité :</strong> 28 soldats ou 5 670 kg de charge utile</li>
                        <li><strong>Équipement :</strong>
                            <ul>
                                <li>Systèmes de contre-mesures électroniques</li>
                                <li>Systèmes de communication avancés</li>
                                <li>Capacité d'emport de charges lourdes</li>
                            </ul>
                        </li>
                    </ul>
                    <p class="product-price"><strong>Prix :</strong> $<span id="item-price">22000000</span></p>
                    <button id="caracalAddCart" class="btn btn-primary">Ajouter au panier</button>
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
