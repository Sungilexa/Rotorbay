$(document).ready(function() {
    function fetchProducts() {
        $.ajax({
            url: 'getproducts.php',
            type: 'GET',
            success: function(data) {
                const products = JSON.parse(data);
                const productCards = $('#product-cards');
                productCards.empty();

                products.forEach(product => {
                    const stockStatus = product.stock > 0 ? '🟢 En stock' : '🔴 En rupture de stock';
                    const card = `
                        <div class="card">
                            <img src="${product.lienImage}" class="card-img-top" alt="${product.nom}">
                            <div class="card-body">
                                <h5 class="card-title">${product.nom}</h5>
                                <p class="card-text">${product.description}</p>
                                <p class="card-text"><strong>${product.prix}$</strong></p>
                                <p class="card-text">${stockStatus}</p>
                                <button class="btn btn-primary editProductBtn" data-id="${product.idproduit}">Modifier</button>
                            </div>
                        </div>
                    `;
                    productCards.append(card);
                });
            }
        });
    }

    $('#add-product-btn').click(function() {
        $('#productModalLabel').text('Ajouter un produit');
        $('#product-form')[0].reset();
        $('#product-id').val('');
        $('#save-product-btn').text('Enregistrer le produit');
        $('#delete-product-btn').hide();
        $('#productModal').modal('show');
    });

    $(document).on('click', '.editProductBtn', function() {
        const productId = $(this).data('id');
        $.ajax({
            url: 'getProductById.php',
            type: 'GET',
            data: { id: productId },
            success: function(data) {
                const product = JSON.parse(data);
                $('#productModalLabel').text('Modifier le produit');
                $('#product-id').val(product.idproduit);
                $('#product-name').val(product.nom);
                $('#product-price').val(product.prix);
                $('#product-type').val(product.type);
                $('#product-stock').val(product.stock);
                $('#product-description').val(product.description);
                $('#save-product-btn').text('Modifier');
                $('#delete-product-btn').show().data('id', product.idproduit);
                $('#productModal').modal('show');
            }
        });
    });

    $('#product-form').submit(function(event) {
        event.preventDefault();
        const formData = new FormData(this);

        // Vérifiez si les champs d'image sont vides
        if (!$('#product-image').val()) {
            formData.delete('productImage');
        }
        if (!$('#product-bg-image').val()) {
            formData.delete('productBgImage');
        }

        $.ajax({
            url: 'manage_product.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                const res = JSON.parse(response);
                if (res.status === 'success') {
                    $('#productModal').modal('hide');
                    fetchProducts();
                } else {
                    alert(res.message);
                }
            }
        });
    });

    $('#delete-product-btn').click(function() {
        if (confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')) {
            const productId = $(this).data('id');
            $.ajax({
                url: 'manage_product.php',
                type: 'POST',
                data: { action: 'delete', id: productId },
                success: function(response) {
                    const res = JSON.parse(response);
                    if (res.status === 'success') {
                        $('#productModal').modal('hide');
                        fetchProducts();
                    } else {
                        alert(res.message);
                    }
                }
            });
        }
    });

    fetchProducts();
});
