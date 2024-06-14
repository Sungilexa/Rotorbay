$(document).ready(function() {
    console.log('Panier dynamique JS chargé');
    updateCartDisplay();

    $(document).on('load', function() {
        updateCartDisplay();
    });

    $(document).on('click', '.remove-item', function() {
        let productName = $(this).data('name');
        updateCart(productName, 0);
    });

    $(document).on('change', '.update-quantity', function() {
        let productName = $(this).data('name');
        let newQuantity = $(this).val();
        console.log(`Mise à jour du produit ${productName} avec la nouvelle quantité ${newQuantity}`);
        updateCart(productName, newQuantity);
    });

    $('#caracalAddCart').click(function() {
        let productName = $(this).data('name');
        let productPrice = $(this).data('price');
        addToCart(productName, productPrice);
    });

    function updateCartDisplay() {
        console.log('Mise à jour de l\'affichage du panier...');
        $.ajax({
            url: 'panier.php',
            type: 'POST',
            data: {action: 'display'},
            success: function(response) {
                console.log('Réponse de la requête GET du panier:', response);
                let cartItems = JSON.parse(response);
                let cartHtml = '';
                let totalPrice = 0;
                for (let item in cartItems) {
                    let product = cartItems[item];
                    cartHtml += `
                        <tr>
                            <td class="p-4">
                                <div class="media align-items-center">
                                    <img src="images/${item.toLowerCase().replace(/ /g, '')}.jpg" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                                    <div class="media-body">
                                        <a href="#" class="d-block text-dark">${item}</a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-right font-weight-semibold align-middle p-4">${(product.price / 100).toFixed(2)} $</td>
                            <td class="align-middle p-4"><input type="number" class="form-control text-center update-quantity" data-name="${item}" value="${product.quantity}" min="1"></td>
                            <td class="text-right font-weight-semibold align-middle p-4">${(product.price * product.quantity / 100).toFixed(2)} $</td>
                            <td class="text-center align-middle px-0"><a href="#" class="shop-tooltip close float-none text-danger remove-item" data-name="${item}" title="Remove">×</a></td>
                        </tr>
                    `;
                    totalPrice += product.price * product.quantity;
                }
                $('#cart-items').html(cartHtml);
                $('#total-price').text((totalPrice / 100).toFixed(2) + ' $');

                if (totalPrice === 0) {
                    $('#cart-table-container').hide();
                    $('#empty-cart-message').show();
                } else {
                    $('#cart-table-container').show();
                    $('#empty-cart-message').hide();
                }
            },
            error: function(error) {
                console.log('Erreur:', error);
            }
        });
    }

    function updateCart(productName, newQuantity) {
        console.log(`Mise à jour du produit ${productName} avec la nouvelle quantité ${newQuantity}`);
        $.ajax({
            url: 'panier.php',
            type: 'POST',
            data: {
                name: productName,
                quantity: newQuantity,
                action: 'update'
            },
            success: function(response) {
                console.log('Panier mis à jour:', response);
                updateCartDisplay();
            },
            error: function(error) {
                console.log('Erreur:', error);
            }
        });
    }

    function addToCart(productName, productPrice) {
        $.ajax({
            url: 'panier.php',
            type: 'POST',
            data: {
                name: productName,
                price: productPrice,
                action: 'add'
            },
            success: function(response) {
                console.log('Produit ajouté au panier:', response);
                updateCartDisplay();
            },
            error: function(error) {
                console.log('Erreur:', error);
            }
        });
    }

    $('#checkout-button').click(function() {
        $.ajax({
            url: 'checkout.php',
            type: 'POST',
            data: {
                cart: JSON.stringify(cart)
            },
            success: function(response) {
                console.log('Commande passée:', response);
                cart = {};
                localStorage.removeItem('cart');
                renderCart();
                calculateTotalPrice();
            },
            error: function(error) {
                console.log('Erreur:', error);
            }
        });
    });

    function renderCart() {
        const cartItems = $('#cart-items');
        cartItems.empty();
        for (let id in cart) {
            const item = cart[id];
            const itemElement = $(`
                <tr>
                    <td class="p-4">
                        <div class="media d-flex align-items-center">
                            <img src="images/${item.image}" class="d-block ui-w-200 ui-bordered mr-3" alt="">
                            <div class="media-body">
                                <a href="${item.link}" class="d-block text-white">${item.name}</a>
                            </div>
                        </div>
                    </td>
                    <td class="text-right font-weight-semibold align-middle p-4 text-white">$${(item.price / 100).toFixed(2)}</td>
                    <td class="align-middle p-4"><input type="number" class="form-control text-center update-quantity" data-id="${id}" value="${item.quantity}" min="1"></td>
                    <td class="text-right font-weight-semibold align-middle p-4 text-white">$${(item.price * item.quantity / 100).toFixed(2)}</td>
                    <td class="text-center align-middle px-0"><a href="#" class="shop-tooltip close float-none text-danger remove-item" data-id="${id}" title="Remove">×</a></td>
                </tr>
            `);
            cartItems.append(itemElement);
        }

        // Assign event listeners for remove and update quantity buttons
        $('.remove-item').click(function() {
            const id = $(this).data('id');
            removeFromCart(id);
        });

        $('.update-quantity').change(function() {
            const id = $(this).data('id');
            const newQuantity = parseInt($(this).val());
            updateQuantity(id, newQuantity);
        });
    }
});
