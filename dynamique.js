$(document).ready(function(){
    $('#SignupFormBtn').click(function(){
        var email = $('#enterSignupEmail').val();
        var password = $('#enterSignupPassword').val();
        var confirmPassword = $('#confirmSignupPassword').val();

        if(password !== confirmPassword) {
            alert("Les mots de passe ne correspondent pas");
            return;
        }

        $.ajax({
            type: "POST",
            url: "inscription.php",
            data: {
                email: email,
                password: password
            },
            success: function(response) {
                if (response === 'success') {
                    window.location.href = 'inscription_reussie.php';
                } else {
                    $('#responseMessage').text(response);
                }
            },
            error: function() {
                $('#responseMessage').text("Erreur lors de l'inscription");
            }
        });
    });

    $('#loginFormBtn').click(function(){
        var email = $('#loginInputEmail').val();
        var password = $('#loginInputPassword').val();

        $.ajax({
            type: "POST",
            url: "loginform.php",
            data: {
                email: email,
                password: password
            },
            success: function(response) {
                if (response === 'success') {
                    window.location.href = 'accueil.php';
                } else {
                    $('#responseMessage').text(response);
                }
            },
            error: function() {
                $('#responseMessage').text("Erreur lors de la connexion");
            }
        });
    });

    $('#loginFormBtn').on('click', function() {
        const email = $('#loginInputEmail').val();
        const password = $('#loginInputPassword').val();

        $.ajax({
            url: 'loginform.php',
            type: 'POST',
            data: {
                email: email,
                password: password
            },
            success: function(response) {
                if (response.trim() === 'success') {
                    // Vider le panier en supprimant les éléments de la classe "card-container"
                    $('.card-container').remove();

                    // Redirection ou autre action après la connexion réussie
                    window.location.href = 'accueil.php';
                } else {
                    $('#responseMessage').text(response);
                }
            },
            error: function() {
                $('#responseMessage').text('Erreur de connexion.');
            }
        });
    });


});
