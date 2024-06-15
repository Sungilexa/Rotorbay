$(document).ready(function() {
    function updateCartDisplay(cart) {
        const $cartItems = $('#cart-items');
        const $totalPrice = $('#total-price');
        $cartItems.empty();
        let totalPrice = 0;

        if ($.isEmptyObject(cart)) {
            $('#cart-table').hide();
            $('#empty-cart-message').show();
        } else {
            $('#cart-table').show();
            $('#empty-cart-message').hide();

            $.each(cart, function(productName, productDetails) {
                if (productDetails && productDetails.price && productDetails.quantity) {
                    const productPrice = parseFloat(productDetails.price); // Convert to number
                    const productTotal = productPrice * productDetails.quantity;
                    totalPrice += productTotal;

                    // Récupérer l'image et le type du produit depuis la base de données
                    $.ajax({
                        url: 'getProductByName.php',
                        type: 'GET',
                        data: { productName: productName },
                        success: function(response) {
                            const productData = typeof response === 'string' ? JSON.parse(response) : response;
                            const imageSrc = productData.lienImage ? productData.lienImage : 'images/default.png'; // Image par défaut si pas d'image
                            const productType = productData.type ? productData.type : '';

                            const cartRow = `
                                <tr>
                                    <td class="product-details py-3 px-4">
                                        <img id="productImage" src="${imageSrc}" alt="${productName}">
                                        <span class="product-name">${productName} - ${productType}</span>
                                    </td>
                                    <td class="text-right py-3 px-4">${productPrice.toFixed(2)}$</td>
                                    <td class="text-center py-3 px-4">
                                        <input type="number" class="form-control text-center update-quantity" data-name="${productName}" value="${productDetails.quantity}">
                                    </td>
                                    <td class="text-right py-3 px-4">${productTotal.toFixed(2)}$</td>
                                    <td class="text-center align-middle py-3 px-0">
                                        <a href="#" class="remove-product" data-name="${productName}"><i class="ion ion-md-trash"></i></a>
                                    </td>
                                </tr>
                            `;
                            $cartItems.append(cartRow);
                        },
                        error: function(xhr, status, error) {
                            console.error('Erreur lors de la récupération du produit:', error);
                        }
                    });
                } else {
                    console.error(`Invalid product details for ${productName}:`, productDetails);
                }
            });
        }

        $totalPrice.text(totalPrice.toFixed(2) + '$');
    }

    function fetchCart() {
        $.ajax({
            url: 'panier.php',
            type: 'POST',
            data: { action: 'display' },
            success: function(data) {
                console.log('Réponse du serveur (brute):', data); // Afficher la réponse brute
                try {
                    const response = typeof data === 'string' ? JSON.parse(data) : data;
                    if (response.status === 'success') {
                        updateCartDisplay(response.cart);
                    } else {
                        console.error('Erreur lors de la récupération du panier:', response.message);
                    }
                } catch (e) {
                    console.error('Erreur lors de l\'analyse du JSON:', e);
                }
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de la récupération du panier:', error);
            }
        });
    }

    function updateCart(productName, quantity) {
        $.ajax({
            url: 'panier.php',
            type: 'POST',
            data: {
                action: 'update',
                name: productName,
                quantity: quantity
            },
            success: function(data) {
                console.log('Réponse du serveur (brute):', data); // Afficher la réponse brute
                try {
                    const response = typeof data === 'string' ? JSON.parse(data) : data;
                    if (response.status === 'success') {
                        updateCartDisplay(response.cart);
                    } else {
                        console.error('Erreur lors de la mise à jour du panier:', response.message);
                    }
                } catch (e) {
                    console.error('Erreur lors de l\'analyse du JSON:', e);
                }
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de la mise à jour du panier:', error);
            }
        });
    }

    $(document).on('change', '.update-quantity', function() {
        const productName = $(this).data('name');
        const newQuantity = $(this).val();
        updateCart(productName, newQuantity);
    });

    $(document).on('click', '.remove-product', function(e) {
        e.preventDefault();
        const productName = $(this).data('name');
        updateCart(productName, 0);
    });

    $('#checkout-button').click(function() {
        $.ajax({
            url: 'panier.php',
            type: 'POST',
            data: {
                action: 'checkout'
            },
            success: function(data) {
                console.log('Réponse du serveur (brute):', data); // Afficher la réponse brute
                try {
                    const response = typeof data === 'string' ? JSON.parse(data) : data;
                    if (response.status === 'success') {
                        alert('Facture créée avec succès');
                        fetchCart(); // Re-fetch the cart to reflect the empty cart
                    } else {
                        alert(response.message || 'Erreur lors de la création de la facture');
                    }
                } catch (e) {
                    console.error('Erreur lors de l\'analyse du JSON:', e);
                }
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de la création de la facture:', error);
                alert('Erreur lors de la création de la facture');
            }
        });
    });

    fetchCart();
});
