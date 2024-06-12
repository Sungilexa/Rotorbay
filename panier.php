<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="panier.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <?php include 'header.php'; ?>

    <div class="content">
        <div class="container px-3 my-5 clearfix">
            <div class="card">
                <div class="card-header">
                    <h2>Shopping Cart</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="cart-table-container">
                        <table class="table table-bordered m-0" id="cart-table">
                            <thead>
                                <tr>
                                    <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                                    <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="Clear cart" id="clear-cart"><i class="ion ion-md-trash"></i></a></th>
                                </tr>
                            </thead>
                            <tbody id="cart-items">
                                <!-- Cart items will be dynamically inserted here -->
                            </tbody>
                        </table>
                    </div>
                    <div id="empty-cart-message" class="empty-cart-message" style="display:none;">
                        Votre panier est vide !
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                        <div class="text-right mt-4 mr-5">
                            <label class="text-muted font-weight-normal m-0">Total price</label>
                            <div class="text-large"><strong id="total-price">$0</strong></div>
                        </div>
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3" onclick="window.location.href='catalogue.php';">Back to shopping</button>
                        <button type="button" class="btn btn-lg btn-primary mt-2" id="checkout-button">Checkout</button>
                    </div>
                </div>
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
