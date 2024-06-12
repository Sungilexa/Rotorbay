$(document).ready(function() {
    // Generate a unique cart ID if not already present
    var cartId = localStorage.getItem("cartId");
    if (!cartId) {
        cartId = Date.now().toString(); // Unique ID based on timestamp
        localStorage.setItem("cartId", cartId);
    }

    // Cart object to store the items in the cart
    let cart = {};

    // Load cart from local storage if it exists
    if (localStorage.getItem("cart")) {
        cart = JSON.parse(localStorage.getItem("cart"));
        renderCart();
        calculateTotalPrice();
    }

    // Assign event listeners to the add to cart buttons on the product pages
    $('#caracalAddCart').click(function() {
        addToCart('H225M Caracal', 'caracalh225m.jpg', 22000000, 'h225mcaracal.php');
    });

    $('#milmiAddCart').click(function() {
        addToCart('Mil Mi-24 "Hind"', 'milmi24.jpg', 12000000, 'milmi24.php');
    });

    $('#sikorskyAddCart').click(function() {
        addToCart('Sikorsky S-92', 'sikorskys92.jpg', 27000000, 'sikorskys92.php');
    });

    // Function to add an item to the cart
    function addToCart(name, image, price, link) {
        const id = name.toLowerCase().replace(/ /g, '-').replace(/"/g, '');
        if (cart[id]) {
            cart[id].quantity += 1;
        } else {
            cart[id] = { name, image, price, quantity: 1, link };
        }
        localStorage.setItem("cart", JSON.stringify(cart));
        renderCart();
        calculateTotalPrice();
    }

    // Function to remove an item from the cart
    function removeFromCart(id) {
        delete cart[id];
        localStorage.setItem("cart", JSON.stringify(cart));
        renderCart();
        calculateTotalPrice();
    }

    // Function to update the quantity of an item in the cart
    function updateQuantity(id, newQuantity) {
        if (cart[id]) {
            cart[id].quantity = newQuantity;
            localStorage.setItem("cart", JSON.stringify(cart));
            renderCart();
            calculateTotalPrice();
        }
    }

    // Function to calculate the total price of the items in the cart
    function calculateTotalPrice() {
        let totalPrice = 0;
        for (let id in cart) {
            totalPrice += cart[id].price * cart[id].quantity;
        }
        $('#total-price').text(`$${(totalPrice / 100).toFixed(2)}`);
        return totalPrice;
    }

    // Function to render the cart UI
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

    // Clear cart button functionality
    $('#clear-cart').click(function() {
        cart = {};
        localStorage.setItem("cart", JSON.stringify(cart));
        renderCart();
        calculateTotalPrice();
    });

    // Checkout button functionality
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
});
