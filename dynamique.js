$(document).ready(function(){
    $('#SignupFormBtn').click(function(event){
        event.preventDefault();
        
        var email = $('#enterSignupEmail').val();
        var password = $('#enterSignupPassword').val();
        var confirmPassword = $('#confirmSignupPassword').val();

        if(password !== confirmPassword) {
            $('#responseMessage').text("Les mots de passe ne correspondent pas").addClass("alert alert-danger");
            return;
        }

        $.ajax({
            type: "POST",
            url: "inscription.php",
            data: {
                email: email,
                password: password,
                confirm_password: confirmPassword
            },
            success: function(response) {
                if (response.trim() === 'success') {
                    window.location.href = 'inscription_reussie.php';
                } else {
                    $('#responseMessage').text(response).addClass("alert alert-danger");
                }
            },
            error: function() {
                window.location.href = 'inscription_echec.php';
            }
        });
    });

    $('#loginFormBtn').click(function(event){
        event.preventDefault();
        
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
                if (response.trim() === 'success') {
                    window.location.href = 'accueil.php';
                } else {
                    $('#responseMessage').text(response).addClass("alert alert-danger");
                }
            },
            error: function() {
                $('#responseMessage').text("Erreur lors de la connexion").addClass("alert alert-danger");
            }
        });
    });
});
