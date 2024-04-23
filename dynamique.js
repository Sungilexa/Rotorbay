$(document).ready(function() {
    $('.addPanierBtn').click(function() {
        $('.helico').each(function() {
            const quantite = parseInt($(this).find('.quantiteBtn').val());
            const nomHelico = $(this).find('.nom').text();
            const data = {
                nomHelico: nomHelico,
                quantite: quantite
            };
            $.ajax({
                url: 'savePanier.php',
                method: 'POST',
                data: {
                    quantiteTigre: quantiteTigre,
                    quantiteH145: quantiteH145,
                    quantiteH160: quantiteH160
                },
                success: function(response) {
                    console.log('Données envoyées avec succès !');
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });

        });
    });
});
