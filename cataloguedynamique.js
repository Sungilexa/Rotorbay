$(document).ready(function() {
    $.ajax({
        url: 'getProducts.php',
        type: 'GET',
        success: function(data) {
            try {
                const products = typeof data === 'string' ? JSON.parse(data) : data;

                if (products.length > 0) {
                    products.forEach(function(product) {
                        const stockStatus = product.stock > 0 ? '🟢 En stock' : '🔴 En rupture de stock';
                        const prix = parseFloat(product.prix.replace(/,/g, '')); // Convertir le prix en nombre
                        const productCard = `
                            <div class="card text-center">
                                <a href="produit.php?productName=${encodeURIComponent(product.nom)}">
                                    <div class="card-header">
                                        ${stockStatus}
                                    </div>
                                    <img class="card-img-top" src="${product.lienImage}" alt="Card image">
                                    <div class="card-body">
                                        <p class="card-text text-muted">${product.type}</p>
                                        <h5 class="card-title">${product.nom}</h5>
                                        <div class="card-footer">
                                            ${!isNaN(prix) ? prix.toFixed(2) + '$' : 'N/A'}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        `;
                        $('#product-cards').append(productCard);
                    });
                } else {
                    $('#product-cards').html('<p>Aucun produit trouvé.</p>');
                }
            } catch (e) {
                console.error('Erreur lors de l\'analyse des produits:', e);
                console.error('Données reçues:', data);
                $('#product-cards').html('<p>Erreur lors de la récupération des produits.</p>');
            }
        },
        error: function(xhr, status, error) {
            console.error('Erreur lors de la récupération des produits:', error);
            console.error('Statut:', status);
            console.error('Réponse du serveur:', xhr.responseText);
            $('#product-cards').html('<p>Erreur lors de la récupération des produits.</p>');
        }
    });
});
