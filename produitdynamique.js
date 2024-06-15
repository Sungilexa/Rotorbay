$(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);
    const productName = urlParams.get('productName');

    if (!productName) {
        $('.content').html('<div class="product-card"><p>Produit non trouvé.</p></div>');
        return;
    }

    $.ajax({
        url: 'getProductByName.php',
        type: 'GET',
        data: { productName: productName },
        success: function(data) {
            try {
                console.log('Réponse du serveur (JSON brut):', data);
                const productData = typeof data === "string" ? JSON.parse(data) : data;

                if (productData.error) {
                    console.error('Erreur:', productData.error);
                    $('.content').html('<div class="product-card"><p>' + productData.error + '</p></div>');
                } else {
                    $('#product-image').attr('src', productData.lienImage);
                    $('#item-name').text(productData.nom + ' - ' + productData.type);
                    $('#product-description').html(productData.description.replace(/\n/g, '<br>'));
                    $('#item-price').text(productData.prix);
                    $('#addCartButton').data('name', productData.nom).data('price', productData.prix);

                    // Set background image
                    $('#product-container').css('background-image', `linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.1)), url('${productData.lienBackground}')`);

                    // Disable add to cart button if out of stock
                    if (productData.stock <= 0) {
                        $('#addCartButton').prop('disabled', true).text('En rupture de stock');
                    }
                }
            } catch (e) {
                console.error('Erreur lors de l\'analyse du produit:', e);
                console.error('Données reçues:', data);
                $('.content').html('<div class="product-card"><p>Erreur lors de la récupération du produit.</p></div>');
            }
        },
        error: function(xhr, status, error) {
            console.error('Erreur lors de la récupération du produit:', error);
            console.error('Statut:', status);
            console.error('Réponse du serveur:', xhr.responseText);
            $('.content').html('<div class="product-card"><p>Erreur lors de la récupération du produit.</p></div>');
        }
    });

    $('#addCartButton').click(function() {
        const productName = $(this).data('name');
        const productPrice = $(this).data('price');

        $.ajax({
            url: 'panier.php',
            type: 'POST',
            data: {
                action: 'add',
                name: productName,
                price: productPrice
            },
            success: function(data) {
                try {
                    const response = typeof data === 'string' ? JSON.parse(data) : data;
                    if (response.status === 'success') {
                        console.log('Produit ajouté au panier!');
                    } else {
                        alert('Erreur lors de l\'ajout du produit au panier.');
                    }
                } catch (e) {
                    console.error('Erreur lors de l\'analyse de la réponse:', e);
                    console.error('Données reçues:', data);
                    alert('Erreur lors de l\'ajout du produit au panier.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de l\'ajout du produit au panier:', error);
                console.error('Statut:', status);
                console.error('Réponse du serveur:', xhr.responseText);
            }
        });
    });
});
